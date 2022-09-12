							<div class="widget">
								<?php
									$pasangiklan=mysqli_query($koneksi, "SELECT * FROM pasangiklan where id_pasangiklan='2'");
									while($b=mysqli_fetch_array($pasangiklan)){
										$string = $b['gambar'];
										if ($b['gambar'] == ''){
										}else{
											if(preg_match("/swf\z/i", $string)) {
												echo "<embed src='foto_pasangiklan/$b[gambar]' width=300 height=250 quality='high' type='application/x-shockwave-flash'>";
											} else {
												echo "<a href='$b[url]' target='_blank'><img style='width:300px;' src='foto_pasangiklan/$b[gambar]' alt='$b[judul]' /></a>
													   <a href='$b[url]' class='ad-link'><span class='icon-text'>&#9652;</span>$b[judul]<span class='icon-text'>&#9652;</span></a>";
											}
										}
									}
								?>
							</div>
							
							<!-- BEGIN .widget -->
							<div class="widget">
								<h3>Temukan juga kami di</h3>
								<div class="widget-social">
									<div class="social-bar">
									<?php
									$sosmedd = mysqli_query($koneksi, "SELECT * FROM identitas");
									$ssd = mysqli_fetch_array($sosmedd);
									$pecahd = explode(",", $ssd[facebook]);
									$fb = $pecahd[0];
									$tw = $pecahd[1];
									$go = $pecahd[2];
									$lk = $pecahd[3];
								?>
										<a target="_BLANK" href="<?php echo"$fb"; ?>" class="social-icon"><span class="facebook">Facebook</span></a>
										<a target="_BLANK" href="<?php echo"$tw"; ?>" class="social-icon"><span class="twitter">Twitter</span></a>
										<a target="_BLANK" href="<?php echo"$go"; ?>" class="social-icon"><span class="google">Google+</span></a>
										<a target="_BLANK" href="<?php echo"$lk"; ?>" class="social-icon"><span class="linkedin">Linkedin</span></a>
									</div>
									<p>Ikuti kami di facebook, twitter, Google+, Linkedin dan dapatkan informasi terbaru dari kami disana.</p>
								</div>
							<!-- END .widget -->
							</div>
							
							<!-- BEGIN .widget -->
							<div class="widget">
								<h3>Berita Terbaru</h3>
								<div class="widget-articles">
									<ul>
										<li>
											<?php 
												$terbaru = mysqli_query($koneksi, "SELECT * FROM berita 
																				left join users on berita.username=users.username
																					left join kategori on berita.id_kategori=kategori.id_kategori where  berita.status='Y'
																						order by berita.id_berita DESC LIMIT 6");

												while ($r2x = mysqli_fetch_array($terbaru)){
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
																<h4><a href='berita-$r2x[judul_seo].html'>$r2x[judul]</a><a href='berita-$r2x[judul_seo].html' class='h-comment'>$total_komentar1</a></h4>
																<span class='meta'>
																	<a href='berita-$r2x[judul_seo].html'><span class='icon-text'>&#128340;</span>$r2x[jam], $tglr2</a>
																</span>
															</div>
														  </li>";
												}
											?>
										</li>
									</ul>
								</div>
							<!-- END .widget -->
							</div>
							
							<!-- BEGIN .widget -->
							<div class="widget">
								<h3>Komentar Terakhir</h3>
								<div class="widget-comments">
									<ul>
										<?php
											$komentar = mysqli_query($koneksi, "SELECT * FROM komentar where aktif='Y' order by id_komentar DESC LIMIT 4");
											while ($r = mysqli_fetch_array($komentar)){
												$tgl = tgl_indo($r['tgl']);
												$isi_komentar = strip_tags($r['isi_komentar']); 
												$isi = substr($isi_komentar,0,100); 
												$isi = substr($isi_komentar,0,strrpos($isi," "));
												$test = md5(strtolower(trim($r['email'])));
												$berita = mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita =$r[id_berita]");
												$b = mysqli_fetch_array($berita);
												echo "<li>
													<div class='comment-photo'>
														<span class='hover-effect'>";
															if ($r[email] == ''){
																echo "<img style='width:50px; height:50px;' src='foto_user/blank.png' alt='avatar-1' />";
															}else{
																echo "<img style='width:50px; height:50px;' src=\"http://www.gravatar.com/avatar/".$test.".jpg?s=100&d=".$_GET['d']."\" />";
															}
														echo "</span>
													</div>
													<div class='comment-content'>
														<h3>$r[nama_komentar]</h3>
														<p>$isi ...</p>
														<span class='meta'>
															<a href='berita-$b[judul_seo].html'><span class='icon-text'>&#59212;</span>View Article</a>
														</span>
													</div>
												 </li>";
											}
											
										?>
										
									</ul>
								</div>
							<!-- END .widget -->
							</div>
							</div>