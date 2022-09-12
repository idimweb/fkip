									<div class="block">
										<h2 style='color: #dd8229;border-bottom: 2px solid #dd8229;' class="list-title">Sekilas Info</h2>
										<ul class="article-block">
											<?php 
												$sekilas = mysqli_query($koneksi, "SELECT * FROM sekilasinfo ORDER BY id_sekilas DESC LIMIT 2");
												while ($r2x = mysqli_fetch_array($sekilas)){
													$tglr2 = tgl_indo($r2x['tgl_posting']);
													echo "<li>
															<div class='article-photo'>";
																if ($r2x[gambar] ==''){
																	echo "<a href='#' class='hover-effect'><img style='width:59px; height:42px;' src='foto_info/small_no-image.jpg' alt='' /></a>";
																}else{
																	echo "<a href='#' class='hover-effect'><img style='width:59px; height:42px;' src='foto_info/small_$r2x[gambar]' alt='' /></a>";
																}
															echo "</div>
															<div class='article-content'>
																<h4><a href='#'>$r2x[info]</a></h4>
																<span class='meta'>
																	<a href='#'><span class='icon-text'>&#128340;</span>$tglr2</a>
																</span>
															</div>
														  </li>";
												}
											?>
										</ul>
									</div>
									
									<div class="block">
										<h2 class="list-title" style="color: #c42b20;border-bottom: 2px solid #c42b20;">Berita Foto</h2>
										<?php
											$col = 2;
											$album= mysqli_query($koneksi, "SELECT jdl_album, album.id_album, gbr_album, album_seo,  
													COUNT(gallery.id_gallery) as jumlah FROM album LEFT JOIN gallery 
														ON album.id_album=gallery.id_album WHERE album.aktif='Y' GROUP BY id_album ORDER BY rand() DESC LIMIT 6");
										echo "<table width=100%><tr>";
										$hitung = 0;          
										while($w=mysqli_fetch_array($album)){
										  $jdl_album=($w[jdl_album]);
										  if ($hitung >= $col) {
												 echo "</tr><tr>";
												$hitung = 0;
											}
											$hitung++;
										  echo "<td>
										  <a href=album-$w[id_album]-$w[album_seo].html><center> <img style='padding:3px; border:1px solid #e3e3e3; border-radius:2px' src='img_album/kecil_$w[gbr_album]' width=95% height=80 title='$w[jdl_album] - (Ada $w[jumlah] foto)'> </center></a></td>";
										  }
										  echo "</tr></table>";

										?>
									</div>
									
									<div class="block">
										<h2 class="list-title" style="color: #2277c6;border-bottom: 2px solid #2277c6;">Jejak Pendapat</h2>
										<?php
										  $tanya=mysqli_query($koneksi, "SELECT * FROM poling WHERE aktif='Y' and status='Pertanyaan'");
										  $t=mysqli_fetch_array($tanya);
										  echo " <div style='color:#000; font-weight:bold;'>$t[pilihan] <br><br></div>";
										  echo "<form method=POST action='hasil-poling.html'>";
											  $poling=mysqli_query($koneksi, "SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
											  while ($p=mysqli_fetch_array($poling)){
											  echo "<input class=marginpoling type=radio name=pilihan value='$p[id_poling]'/>
													<class style=\"color:#666;font-size:12px;\">&nbsp;&nbsp;$p[pilihan]<br />";}
											  echo "<br><center><input style='width: 110px; padding:2px' type=submit class=simplebtn value='PILIH' />
										  </form>
										  <a href=lihat-poling.html>
										  <input style='width: 110px; padding:2px;' type=button class=simplebtn value='LIHAT HASIL' /></a></center>";
										?>
									</div>
									
									<div class="block">
										<?php
										if (isset($_GET[play])){
											echo "<h2 class='list-title' style='color: #2277c6;border-bottom: 2px solid #2277c6;'>Video Terpopuler <i style='color:red; font-size:14px;'>(Hot)</i></h2>";
											$sql   = "SELECT * FROM video,users,playlist WHERE users.username=video.username 
															AND video.id_playlist=playlist.id_playlist ORDER BY dilihat DESC LIMIT 2";		 
											  $hasil = mysqli_query($koneksi, $sql);
											  while($r=mysqli_fetch_array($hasil)){
												echo "<a title='$r[jdl_video]' href='play-$r[id_video]-$r[video_seo].html' class='more'>Play Video - Full Page</a>";
															if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $r['youtube'], $match)) {
				                                                echo "<iframe width='100%' height='150' id='ytplayer' type='text/html'
				                                                    src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
				                                                    frameborder='0' allowfullscreen></iframe>";
				                                            } 
														echo "<br>";
											  }
											  
										}elseif (isset($_GET[kt])){
											$randomhx = mysqli_query($koneksi, "SELECT * FROM kategori where id_kategori='$_GET[kt]'"); 
											$rhx = mysqli_fetch_array($randomhx);	
										?>
										<h2 class="list-title" style="color: #2277c6;border-bottom: 2px solid #2277c6;">Berita <?php echo "$rhx[nama_kategori]"; ?></h2>
										<ul class="article-block">
											<?php 
												$random2hx = mysqli_query($koneksi, "SELECT * FROM berita 
																				left join users on berita.username=users.username
																					left join kategori on berita.id_kategori=kategori.id_kategori
																						where berita.id_kategori='$rhx[id_kategori]' AND berita.status='Y' order by dibaca DESC LIMIT 5");

												while ($r2x = mysqli_fetch_array($random2hx)){
													$komen1 = "SELECT * FROM komentar WHERE id_berita = '".$r2x['id_berita']."'";
													$komentar1 = mysqli_query($koneksi, $komen1);
													$total_komentar1 = mysqli_num_rows($komentar1);
													$tglr2 = tgl_indo($r2x['tanggal']);
													echo "<li>
															<div class='article-photo'>";
																if ($r2x[gambar] ==''){
																	echo "<a href='berita-$r2x[judul_seo].html' class='hover-effect'><img style='width:59px; height:42px;' src='foto_berita/small_no-image.jpg' alt='' /></a>";
																}else{
																	echo "<a href='berita-$r2x[judul_seo].html' class='hover-effect'><img style='width:59px; height:42px;' src='foto_berita/small_$r2x[gambar]' alt='' /></a>";
																}
															echo "</div>
															<div class='article-content'>
																<h4><a href='berita-$r2x[judul_seo].html'>$r2x[judul]</a><a href='berita-$r2x[judul_seo].html' class='h-comment'>$total_komentar1 - <b style='color:Red'>$r2x[dibaca] view</b></a></h4>
																<span class='meta'>
																	<a href='berita-$r2x[judul_seo].html'><span class='icon-text'>&#128340;</span>$r2x[jam], $tglr2</a>
																</span>
															</div>
														  </li>";
												}
											?>
										</ul>
											<a href="<?php echo "kategori-$rhx[id_kategori]-$rhx[kategori_seo].html"; ?>" class="more">Read More</a>
										<?php }else { ?>
											<h2 class="list-title" style="color: #2277c6;border-bottom: 2px solid #2277c6;">Berita Populer</h2>
											<ul class="article-block">
												<?php 
													$random2hx = mysqli_query($koneksi, "SELECT * FROM berita 
																					left join users on berita.username=users.username
																						left join kategori on berita.id_kategori=kategori.id_kategori where berita.status='Y'
																							order by dibaca DESC LIMIT 5");

													while ($r2x = mysqli_fetch_array($random2hx)){
														$komen1 = "SELECT * FROM komentar WHERE id_berita = '".$r2x['id_berita']."'";
														$komentar1 = mysqli_query($koneksi, $komen1);
														$total_komentar1 = mysqli_num_rows($komentar1);
														$tglr2 = tgl_indo($r2x['tanggal']);
														echo "<li>
																<div class='article-photo'>";
																	if ($r2x[gambar] ==''){
																		echo "<a href='berita-$r2x[judul_seo].html' class='hover-effect'><img style='width:59px; height:42px;' src='foto_berita/small_no-image.jpg' alt='' /></a>";
																	}else{
																		echo "<a href='berita-$r2x[judul_seo].html' class='hover-effect'><img style='width:59px; height:42px;' src='foto_berita/small_$r2x[gambar]' alt='' /></a>";
																	}
																echo "</div>
																<div class='article-content'>
																	<h4><a href='berita-$r2x[judul_seo].html'>$r2x[judul]</a><a href='berita-$r2x[judul_seo].html' class='h-comment'>$total_komentar1 - <b style='color:Red'>$r2x[dibaca] view</b></a></h4>
																	<span class='meta'>
																		<a href='berita-$r2x[judul_seo].html'><span class='icon-text'>&#128340;</span>$r2x[jam], $tglr2</a>
																	</span>
																</div>
															  </li>";
													}
												?>
											</ul>
											<a href="<?php echo "kategori-$rhx[id_kategori]-$rhx[kategori_seo].html"; ?>" class="more">Read More</a>
										<?php } ?>
									</div>
									
									<div class="block">
										<div class="banner">
											<?php
											  $pasangiklan=mysqli_query($koneksi, "SELECT * FROM pasangiklan where id_pasangiklan='1'");
											  while($b=mysqli_fetch_array($pasangiklan)){
												$string = $b['gambar'];
												if(preg_match("/swf\z/i", $string)) {
													echo "<embed src='foto_pasangiklan/$b[gambar]' width=250 height=210 quality='high' type='application/x-shockwave-flash'>";
												} else {
													echo "<a href='$b[url]' target='_blank'><img style='width:250px;' src='foto_pasangiklan/$b[gambar]' alt='$b[judul]' /></a>
														  <a href='$b[url]' class='ad-link'><span class='icon-text'>&#9652;</span>$b[judul]<span class='icon-text'>&#9652;</span></a>";
												}
											  }
											?>
										</div>
									</div>