						<div class="main-page left">
							<div class="single-block">
								<div class="content-block main left">
									
									<div class="block">
										<div class="block-title" style="background: #bf4b37;">
											<a href="index.php" class="right">Back to homepage</a>
											<h2>Hasil Persentasi / Perhitungan Poling</h2>
										</div>
										<div class="block-content">
											<div class="shortcode-content">

												<div class="paragraph-row">
													<div class="column3">
														<h3 class="highlight-title">Berita Populer</h3>
														<ul class="article-block">
															<?php 
																$random2 = mysqli_query($koneksi, "SELECT * FROM berita 
																								left join users on berita.username=users.username
																									left join kategori on berita.id_kategori=kategori.id_kategori
																										order by dibaca DESC LIMIT 5");

																while ($r2 = mysqli_fetch_array($random2)){
																	$tglr2 = tgl_indo($r2['tanggal']);
																	echo "<li><div class='article-photo'>";
																				if ($r2[gambar] ==''){
																					echo "<a href='berita-$r2[judul_seo].html' class='hover-effect'><img style='width:59px; height:42px;' src='foto_berita/small_no-image.jpg' alt='$r2[judul]' /></a>";
																				}else{
																					echo "<a href='berita-$r2[judul_seo].html' class='hover-effect'><img style='width:59px; height:42px;' src='foto_berita/$r2[gambar]' alt='$r2[judul]' /></a>";
																				}
																			echo "</div>
																			<div class='article-content'>
																				<h4><a href='berita-$r2[judul_seo].html'>$r2[judul]</a></h4>
																				<span class='meta'>
																					<a href='berita-$r2[judul_seo].html'><span class='icon-text'>&#128340;</span> $tglr2</a>
																				</span>
																			</div>
																	</li>";
																}
															?>
														</ul>
														
													</div>
													<div class="column9">
														<?php
														  if (isset($_COOKIE["poling"])) {
															  echo "<center style='margin-top:19%; margin-bottom:19%; color:red'><h4>Maaf, anda sudah pernah melakukan pemilihan terhadap jajak pendapat sebelumnya!!!!. <br>
																	Lihat Hasil Poling untuk Saat ini disini : <a href='lihat-poling.html'>Lihat Hasil Poling</a></center></h4>";
														  
														  }else{
															  setcookie("poling", "sudah poling", time() + 3600 * 24);
															  $u=mysqli_query($koneksi, "UPDATE poling SET rating=rating+1 WHERE id_poling='".anti_injection($_POST['pilihan'])."'");
															  echo "<center style='margin-top:5%;'><h4>Terima kasih atas partisipasi anda mengikuti polling kami</h4></center><br/>";
															  
															  echo "<table width=100% style='border: 0pt dashed #CCC;padding: 10px;'>";
															  $jml=mysqli_query($koneksi, "SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
															  $j=mysqli_fetch_array($jml);  
															  $jml_vote=$j[jml_vote];  
															  $sql=mysqli_query($koneksi, "SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");  
															  while ($s=mysqli_fetch_array($sql)){ 	
															  $prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
															  $gbr_vote   = $prosentase * 3;
															  echo "<tr><td width=240>
																			<b>$s[pilihan]  <span class style=\"color:#EA1C1C;\">($s[rating])</span></b></td><td> 
																			<img src=$f[folder]/background/images/red.jpg width=$gbr_vote width='200' height='18' border=0> 
																			<span class style=\"color:#EA1C1C;\"><b>$prosentase % </b></span><hr style='margin:3px 0px 3px 0px'>
																		</td>
																	</tr>";}
															  echo "</table>
															  <br/><h4>Jumlah Pemilih: <class style=\"color:#EA1C1C;\">$jml_vote</h4>";
														  }
							   
													    ?>
													</div>
												</div>
												<div class="article-title">
													<div class="share-block right">
														<div>
															<div class="share-article left">
																<span>Social media</span>
																<strong>Share this article</strong>
															</div>
															<div class="left">
																<script language="javascript">
																document.write("<a href='http://www.facebook.com/share.php?u=" + document.URL + " ' target='_blank' class='custom-soc icon-text'>&#62220;</a> <a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62217;</a> <a href='https://plus.google.com/share?url=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62223;</a>");
																</script>
																<a href="#" class="custom-soc icon-text">&#62232;</a>
																<a href="#" class="custom-soc icon-text">&#62226;</a>
															</div>
														</div>
														
													</div>

													<div style="margin-top:0px" class="article-tags tag-cloud">
														<strong>Author : </strong>
														<?php
															$aeu=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users where level='admin'"));
																	echo "<a href='#'>$aeu[nama_lengkap] - $aeu[no_telp]</a>";	
														?>
													</div>
												</div>

											</div>

										</div>

									</div>
								</div>
							</div>
						</div>