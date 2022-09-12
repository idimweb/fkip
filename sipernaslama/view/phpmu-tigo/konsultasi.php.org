					<?php if ($_GET[reply] == ''){ 
						$stat = 'Pertanyaan';
					}else{ 
						$stat = 'Jawaban';
					} 
					
					 if ($_GET[aksi]=='hapus'){
						mysqli_query($koneksi, "DELETE FROM tbl_comment where id_komentar='".anti_injection($_GET['id'])."'");
							echo "<script>window.alert('Sukses Hapus Pertanyaan.');
								window.location='konsultasi.html'</script>";
					 }
					?>
						<div id='form' class="main-page left">
							<div class="single-block">
								<div class="content-block main left">
									<div class="block">
										<div class="block-title">
											<h2>Tuliskan <?php echo "$stat"; ?> Anda Pada Form Dibawah Ini</h2>
										</div>
										<div class="block-content">
											<div id="writecomment">
												
												<form action="" method="POST" onSubmit="return validasi(this)" id="form_komentar">
													<input type="hidden" name='id' value='<?php echo "$d[id_berita]"; ?>'>
													<p class="contact-form-user">
														<label for="c_name">Nama Anda<span class="required">*</label>
														<input type="text" placeholder="Nama Anda" id="nama" value='<?php echo "$_SESSION[namalengkap]"; ?>' name='nama_komentar' class="required"/>
														
													</p>
													<p class="contact-form-email">
														<label for="c_email">E-mail<span class="required">*</span></label>
														<input type="text" name='email' placeholder="Alamat E-mail" id="email" value='<?php echo "$_SESSION[email]"; ?>' class="required"/>
													</p>

													<?php 
														$tanya = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tbl_comment  where id_komentar='".anti_injection($_GET['reply'])."'"));
														if ($_GET[reply] != ''){  
															echo "<p>
																	<label for='c_email'><b>Pertanyaan</b><span class='required'></span></label>
																	<div style='margin-left:8px;'>$tanya[isi_pesan] ? </div>
																  </p>";
														}
													?>

													<p class="contact-form-message">
														<label for="c_message"><?php echo "$stat"; ?><span class="required">*</span></label>
														<textarea name='isi_komentar' placeholder="Tuliskan <?php echo "$stat"; ?> Anda.." class="required"></textarea>
													</p>
													<?php if ($_GET[reply] == ''){ ?>
														<p><input type="submit" name="submit" class="styled-button" value="Kirimkan Pertanyaan"/></p>
													<?php }else{ ?>
														<p><input type="submit" name="submit" class="styled-button" value="Kirimkan Balasan"/></p>
													<?php } ?>
												</form>
											</div>
										</div>
										
										<div id="viewcomment" class="block-title">
											<h2>
												<?php 
													$total = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_comment  where reply='0'"));
													echo "Total Ada $total Pertanyaan"; 
													
													if (isset($_POST[submit])){
														$tanggal = date("Y-m-d");
														$jam = date("H:i:s");
														if ($_GET['reply'] != ''){
															$reply = anti_injection($_GET['reply']);
														}else{
															$reply = 0;
														}
														
														  mysqli_query($koneksi, "INSERT INTO tbl_comment (reply, 
																			nama_lengkap, 
																			alamat_email,
																			isi_pesan,
																			tanggal_komentar,
																			jam_komentar)
																		VALUES ('$reply',
																			'".anti_injection($_POST[nama_komentar])."',
																			'".anti_injection($_POST[email])."',
																			'".anti_injection($_POST[isi_komentar])."',
																			'$tanggal',
																			'$jam')");
															if ($_GET['reply'] != ''){								   
																echo "<script>window.alert('Sukses Kirimkan Komentar Balasan.');
																	window.location='konsultasi.html#reply$_GET[reply]'</script>";
															}else{
																echo "<script>window.alert('Sukses Kirimkan Pertanyaan.');
																	window.location='konsultasi.html'</script>";
															}
													}
												?>
											</h2>
										</div>
										<div class="block-content">
											<div class="comment-block">
												<ol class="comments">
													<li>
														<?php
															$komentar = mysqli_query($koneksi, "SELECT * FROM tbl_comment  where reply='0' order by id_komentar DESC");
															$no = 1;
															while ($kka = mysqli_fetch_array($komentar)){
																$tgl = tgl_indo($kka['tanggal_komentar']);
																$isian=nl2br($kka['isi_pesan']); 
																$isikan=sensor($isian); 
																$komentarku = autolink($isikan);
																
																if(($no % 2)==0){ $warna="#ffffff;"; }else{ $warna="#e3e3e3"; }
																$test = md5(strtolower(trim($kka['alamat_email'])));	
																
																echo "<div id='reply$kka[id_komentar]' style='background:$warna' class='commment-content'>
																		<div class='user-avatar'>
																			<a href='#' class='hover-effect'>";
																				if ($kka[alamat_email] == ''){
																					echo "<img class='setborder' src='foto_user/blank.png'/>";
																				}else{
																					echo "<img class='setborder' src=\"http://www.gravatar.com/avatar/".$test.".jpg?s=100&d=".$_GET['d']."\" />";
																				}
																			echo "</a>
																		</div>
																		<strong class='user-nick'><a href='#'>$kka[nama_lengkap]</a></strong>
																		<span class='time-stamp'>$tgl, $kka[jam_komentar] WIB</span>
																		<div class='comment-text'>
																			<p>$komentarku</p>";
																			if ($_SESSION[leveluser]!=''){
																				echo "<a class='button' style='background:#bf0000; color:#ffffff; float:right' href='administrator/logout.php'>Logout</a> 
																				      <a class='button' style='background:#29b332; color:#ffffff; float:right' href='media.php?module=konsultasi&aksi=hapus&id=$kka[id_komentar]'>Hapus</a> 
																				      <a class='button' style='background:#6cd43f; color:#ffffff; float:right' href='reply-konsultasi-$kka[id_komentar].html#form'>Berikan Jawaban</a>";
																			}
																			
																		echo "</div><div style='clear:both'></div>";
																		
																		$reply = mysqli_query($koneksi, "SELECT * FROM tbl_comment where reply='".anti_injection($kka['id_komentar'])."'");
																		  while ($r = mysqli_fetch_array($reply)){
																		  	$testt = md5(strtolower(trim($r['alamat_email'])));	
																		  	$tgll = tgl_indo($r['tanggal_komentar']);
																			echo "<div style='background:$warna; margin-top:0px; margin-left:40px;'>
																					<h4 style='background:lightgreen; color:#fff; margin-bottom:5px; padding:4px'>
																						Dibalas Oleh : $r[nama_lengkap], Pada : $tgll, $kka[jam_komentar] WIB  
																					</h4>
																					<div class='user-avatar'>
																						<a href='#' class='hover-effect'>";
																							if ($r[alamat_email] == ''){
																								echo "<img class='setborder' src='foto_user/blank.png'/>";
																							}else{
																								echo "<img class='setborder' src=\"http://www.gravatar.com/avatar/".$testt.".jpg?s=100&d=".$_GET['d']."\" />";
																							}
																						echo "</a>
																					</div>
																					<div style='padding:left:10px'>
																					<i style='color:red;'>$r[alamat_email]</i> - 
																					$r[isi_pesan]
																					</div><div style='clear:both'></div>
																				  </div>";
																		  }	
																	  echo "</div>";
																$no++;
															}
														?>
													</li>
													
												</ol>

											</div>

										</div>
									</div>
								</div>
							</div>
						</div>