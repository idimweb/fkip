<?php
	$detail=mysqli_query($koneksi, "SELECT * FROM agenda,users  WHERE tema_seo='".anti_injection($_GET['tema'])."'");
	$d   = mysqli_fetch_array($detail);
	$tgl_posting   = tgl_indo($d[tgl_posting]);
	$tgl_mulai   = tgl_indo($d[tgl_mulai]);
	$tgl_selesai = tgl_indo($d[tgl_selesai]);
	$isi_agenda=nl2br($d[isi_agenda]);
	$baca = $d[dibaca]+1;
								  
								  mysqli_query($koneksi, "UPDATE agenda  SET dibaca='$baca'  WHERE tema_seo='".anti_injection($_GET['tema'])."'");
?>	
						<div class="main-page left">
							<div class="single-block">
								<div class="content-block main left">
									
									<div class="block">
										<div class="block-title" style="background: #bf4b37;">
											<a href="index.php" class="right">Back to homepage</a>
											<h2><?php echo "$d[tema]"; ?></h2>
										</div>
										<div class="block-content">
											<div class="shortcode-content">
												<div class="paragraph-row">
													<div class="column3">
														<h3 class="highlight-title">Agenda Populer</h3>
														<ul class="article-block">
															<?php 
																$random2 = mysqli_query($koneksi, "SELECT * FROM agenda order by dibaca DESC LIMIT 5");

																while ($r2 = mysqli_fetch_array($random2)){
																	$tglr2 = tgl_indo($r2['tgl_posting']);
																	echo "<li>
																			<div class='article-photo'>";
																				if ($r2[gambar] ==''){
																					echo "<a href='agenda-$r2[tema_seo].html' class='hover-effect'><img style='width:59px; height:42px;' src='foto_berita/small_no-image.jpg' alt='$r2[tema]' /></a>";
																				}else{
																					echo "<a href='agenda-$r2[tema_seo].html' class='hover-effect'><img style='width:59px; height:42px;' src='foto_agenda/$r2[gambar]' alt='$r2[tema]' /></a>";
																				}
																			echo "</div>
																			<div class='article-content'>
																				<h4><a href='agenda-$r2[tema_seo].html'>$r2[tema]</a></h4>
																				<span class='meta'>
																					<a href='agenda-$r2[tema_seo].html'><span class='icon-text'>&#128340;</span> $tglr2</a>
																				</span>
																			</div>
																	</li>";
																}
															?>
														</ul>
														
														<h3 class="highlight-title">Berita Populer</h3>
														<ul class="article-block">
															<?php 
																$random2 = mysqli_query($koneksi, "SELECT * FROM berita 
																								left join users on berita.username=users.username
																									left join kategori on berita.id_kategori=kategori.id_kategori
																										order by dibaca DESC LIMIT 3");

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
															echo "<img width='100%' src='foto_agenda/$d[gambar]'>
																  <hr>
																  <table>
																  <tr><td width=65px><b>Tema</b><br><br></td> <td width=15px> : </td> 		<td>$d[isi_agenda]<br><br></td></tr>
																  <tr><td><b>Tanggal</b></td> 	<td> : </td> <td>$tgl_mulai s/d $tgl_selesai</td></tr>
																  <tr><td><b>Tempat</b></td> 	<td> : </td> <td>$d[tempat]</td></tr>
																  <tr><td><b>Jam</b></td> 	<td> : </td> <td>$d[jam]</td></tr>
																  </table><br><br>";
														?>
													</div>
												</div>
												<?php
													$iklandetail=mysqli_query($koneksi, "SELECT * FROM iklantengah where id_iklantengah='8'");
													$id=mysqli_fetch_array($iklandetail);
														echo "<a href='$id[url]' target='_blank'>";
															$string = $id['gambar'];
															if ($id['gambar'] == ''){
															}else{
																if(preg_match("/swf\z/i", $string)) {
																	echo "<embed style='margin-top:-10px' src='foto_iklantengah/$id[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
																} else {
																	echo "<img style='margin-top:-10px; margin-bottom:5px' width='100%' src='foto_iklantengah/$id[gambar]' title='$id[judul]' />";
																}
															}
														echo "</a>";
												?>
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