									<div class="block">
										<div style='margin-left:14px' class="featured-block">
											<?php
												$cekslide = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM berita WHERE headline='Y' AND berita.status='Y'"));
												if ($cekslide > 0){
												  include "slide.php";
												}
											?>	
										</div>
									</div>
									
									<div class="block">
										<div class="block-title">
											<a href="indeks-berita.html" class="right">+ Indexs Berita</a>
											<h2>Berita Utama</h2>
										</div>
										<div class="block-content">
											<ul class="article-block-big">
												<?php 
													$hot = mysqli_query($koneksi, "SELECT * FROM berita left join users on berita.username=users.username
																left join kategori on berita.id_kategori=kategori.id_kategori
																	WHERE utama='Y' AND berita.status='Y' ORDER BY id_berita DESC LIMIT 6"); 
													$no = 1;
													while($h=mysqli_fetch_array($hot)){ 	
													$komen1 = "SELECT * FROM komentar WHERE id_berita = '".$h['id_berita']."'";
													$komentar1 = mysqli_query($koneksi, $komen1);
													$total_komentar1 = mysqli_num_rows($komentar1);
													 $tgl = tgl_indo($h['tanggal']);
														echo "<li style='width:187px'>
																<div class='article-photo'>
																	<a href='berita-$h[judul_seo].html' class='hover-effect'>";
																		if ($h[gambar] ==''){
																			echo "<a class='hover-effect' href='berita-$h[judul_seo].html'><img style='height:110px; width:210px' src='foto_berita/no-image.jpg' alt='' /></a>";
																		}else{
																			echo "<a class='hover-effect' href='berita-$h[judul_seo].html'><img style='height:110px; width:210px' src='foto_berita/$h[gambar]' alt='' /></a>";
																		}
																echo "</a>
																</div>
																<div class='article-content'>
																	<h4><a href='berita-$h[judul_seo].html'>$h[judul]</a><a href='berita-$h[judul_seo].html' class='h-comment'>$total_komentar1</a></h4>
																	<span class='meta'>
																		<a href='berita-$h[judul_seo].html'><span class='icon-text'>&#128340;</span>$h[jam], $tgl</a>
																	</span>
																</div>
															  </li>";
													}
												?>
											</ul>
										</div>
									</div>
									
									<?php
										$tengah1=mysqli_query($koneksi, "SELECT * FROM iklantengah where id_iklantengah='1'");
										$ia=mysqli_fetch_array($tengah1);
											echo "<a href='$ia[url]' target='_blank'>";
												$string = $ia['gambar'];
												if ($ia['gambar'] == ''){
												}else{
													if(preg_match("/swf\z/i", $string)) {
														echo "<embed style='margin-top:-10px' src='foto_iklantengah/$ia[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
													} else {
														echo "<img style='margin-top:-10px; margin-bottom:5px' width='100%' src='foto_iklantengah/$ia[gambar]' title='$ia[judul]' />";
													}
												}
											echo "</a>";
									?>
											
									
									<div class="block">
									<?php
										$random = mysqli_query($koneksi, "SELECT * FROM kategori where sidebar='1'"); 
										$r = mysqli_fetch_array($random);	
									?>
										<div class="block-title">
											<a href="kategori-<?php echo "$r[id_kategori]-$r[kategori_seo]"; ?>.html" class="right">Semua Artikel dari kategori ini </a>
											<h2>Berita kategori <?php echo "$r[nama_kategori]"; ?></h2>
										</div>
										<div class="block-content">
											<?php 
												$random1 = mysqli_query($koneksi, "SELECT * FROM berita 
																			left join users on berita.username=users.username
																				left join kategori on berita.id_kategori=kategori.id_kategori
																					where berita.id_kategori='$r[id_kategori]' AND berita.status='Y' order by id_berita DESC LIMIT 1");
												$r1 = mysqli_fetch_array($random1);				
												$tglr = tgl_indo($r1['tanggal']);
												$isi_berita = strip_tags($r1['isi_berita']); 
												$isi = substr($isi_berita,0,250); 
												$isi = substr($isi_berita,0,strrpos($isi," "));
												
												$komen1 = "SELECT * FROM komentar WHERE id_berita = '".$r1['id_berita']."'";
												$komentar1 = mysqli_query($koneksi, $komen1);
												$total_komentar1 = mysqli_num_rows($komentar1);
											
												if (mysqli_num_rows($random1) > 0){
													echo "<div class='wide-article'>
														<div class='article-photo'>";
															if ($r1[gambar] ==''){
																echo "<a class='hover-effect' href='berita-$r1[judul_seo].html'><img style='width:160px; height:117px;' src='foto_berita/small_no-image.jpg' alt='' /></a>";
															}else{
																echo "<a class='hover-effect' href='berita-$r1[judul_seo].html'><img style='width:160px; height:117px;' src='foto_berita/small_$r1[gambar]' alt='' /></a>";
															}
													echo "</div>
													
														<div class='article-content'>
															<h2><a href='berita-$r1[judul_seo].html'>$r1[judul]</a><a href='berita-$r1[judul_seo].html' class='h-comment'>$total_komentar1</a></h2>
															<span class='meta'>
																<a href='berita-$r1[judul_seo].html'><span class='icon-text'>&#128340;</span>$r1[jam], $tglr - Oleh : $r1[nama_lengkap]</a>
															</span>
															<p>$isi . . .</p>
														</div>
													</div>";
												}
											?>

											<div class="paragraph-row">
												
												<!-- BEGIN .column6 -->
												<div class="column6">
													<ul class="article-block">
														<?php 
															$random2 = mysqli_query($koneksi, "SELECT * FROM berita 
																			left join users on berita.username=users.username
																				left join kategori on berita.id_kategori=kategori.id_kategori
																					where berita.id_kategori='$r[id_kategori]' AND berita.status='Y' order by id_berita DESC LIMIT 1,5");

															while ($r2 = mysqli_fetch_array($random2)){
															$komen1 = "SELECT * FROM komentar WHERE id_berita = '".$r2['id_berita']."'";
															$komentar1 = mysqli_query($koneksi, $komen1);
															$total_komentar1 = mysqli_num_rows($komentar1);
															$tglr2 = tgl_indo($r2['tanggal']);
																echo "<li>
																		<div class='article-photo'>";
																			if ($r2[gambar] ==''){
																				echo "<a class='hover-effect' href='berita-$r2[judul_seo].html'><img style='width:59px; height:42px' src='foto_berita/small_no-image.jpg' alt='small_no-image.jpg' /></a>";
																			}else{
																				echo "<a class='hover-effect' href='berita-$r2[judul_seo].html'><img style='width:59px; height:42px' src='foto_berita/small_$r2[gambar]' alt='$r2[gambar]' /></a>";
																			}
																	echo "</div>
																		<div class='article-content'>
																			<h4><a href='berita-$r2[judul_seo].html'>$r2[judul]</a><a href='berita-$r2[judul_seo].html' class='h-comment'>$total_komentar1</a></h4>
																			<span class='meta'>
																				<a href='berita-$r2[judul_seo].html'><span class='icon-text'>&#128340;</span>$r2[jam], $tglr2</a>
																			</span>
																		</div>
																	</li>";
															}
														?>
													</ul>
												<!-- END .column6 -->
												</div>
												
												<!-- BEGIN .column6 -->
												<div class="column6">
													<ul class="article-block">
														<?php 
															$random2x = mysqli_query($koneksi, "SELECT * FROM berita 
																			left join users on berita.username=users.username
																				left join kategori on berita.id_kategori=kategori.id_kategori
																					where berita.id_kategori='$r[id_kategori]' AND berita.status='Y' order by id_berita DESC LIMIT 6,5");

															while ($r2x = mysqli_fetch_array($random2x)){
															$komen1 = "SELECT * FROM komentar WHERE id_berita = '".$r2x['id_berita']."'";
															$komentar1 = mysqli_query($koneksi, $komen1);
															$total_komentar1 = mysqli_num_rows($komentar1);
															$tglr2 = tgl_indo($r2x['tanggal']);
																echo "<li>
																		<div class='article-photo'>";
																			if ($r2x[gambar] ==''){
																				echo "<a class='hover-effect' href='berita-$r2x[judul_seo].html'><img style='width:59px; height:42px' src='foto_berita/small_no-image.jpg' alt='small_no-image.jpg' /></a>";
																			}else{
																				echo "<a class='hover-effect' href='berita-$r2x[judul_seo].html'><img style='width:59px; height:42px' src='foto_berita/small_$r2x[gambar]' alt='$r2x[gambar]' /></a>";
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
													</ul>
												<!-- END .column6 -->
												</div>

											</div>

										</div>
									</div>
									
									<?php
										$tengah2=mysqli_query($koneksi, "SELECT * FROM iklantengah where id_iklantengah='2'");
										$ia2=mysqli_fetch_array($tengah2);
											echo "<a href='$ia2[url]' target='_blank'>";
												$string = $ia2['gambar'];
												if ($ia2['gambar'] == ''){
												}else{
													if(preg_match("/swf\z/i", $string)) {
														echo "<embed style='margin-top:-10px' src='foto_iklantengah/$ia2[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
													} else {
														echo "<img style='margin-top:-10px; margin-bottom:5px' width='100%' src='foto_iklantengah/$ia2[gambar]' title='$ia2[judul]' />";
													}
												}
											echo "</a>";
									?>
									
									<div class="block">
									<?php
										$randomm = mysqli_query($koneksi, "SELECT * FROM kategori where sidebar='2'"); 
										$rm = mysqli_fetch_array($randomm);
										
									?>
										<div class="block-title" style="background: #2182b4;">
											<a href="kategori-<?php echo "$rm[id_kategori]-$rm[kategori_seo]"; ?>.html" class="right">Semua Artikel dari kategori ini </a>
											<h2>Berita kategori <?php echo "$rm[nama_kategori]"; ?></h2>
										</div>
										<div class="block-content">
											<?php 
												$random1m = mysqli_query($koneksi, "SELECT * FROM berita 
																			left join users on berita.username=users.username
																				left join kategori on berita.id_kategori=kategori.id_kategori
																					where berita.id_kategori='$rm[id_kategori]' AND berita.status='Y' order by id_berita DESC LIMIT 1");
												$r1m = mysqli_fetch_array($random1m);				
												$tglr = tgl_indo($r1m['tanggal']);
												$isi_berita = strip_tags($r1m['isi_berita']); 
												$isi = substr($isi_berita,0,250); 
												$isi = substr($isi_berita,0,strrpos($isi," "));
												
												$komen1z = "SELECT * FROM komentar WHERE id_berita = '".$r1m['id_berita']."'";
												$komentar1z = mysqli_query($koneksi, $komen1z);
												$total_komentar1z = mysqli_num_rows($komentar1z);

												if (mysqli_num_rows($random1m) > 0){
													echo "<div class='wide-article'>
														<div class='article-photo'>";
															if ($r1m[gambar] ==''){
																echo "<a class='hover-effect' href='berita-$r1m[judul_seo].html'><img style='width:160px; height:117px;' src='foto_berita/small_no-image.jpg' alt='' /></a>";
															}else{
																echo "<a class='hover-effect' href='berita-$r1m[judul_seo].html'><img style='width:160px; height:117px;' src='foto_berita/small_$r1m[gambar]' alt='' /></a>";
															}
													echo "</div>
													
														<div class='article-content'>
															<h2><a href='berita-$r1m[judul_seo].html'>$r1m[judul]</a><a href='berita-$r1m[judul_seo].html' class='h-comment'>$total_komentar1z</a></h2>
															<span class='meta'>
																<a href='berita-$r1m[judul_seo].html'><span class='icon-text'>&#128340;</span>$r1m[jam], $tglr - Oleh : $r1[nama_lengkap]</a>
															</span>
															<p>$isi . . .</p>
														</div>
													</div>";
												}
											
											?>

											<div class="paragraph-row">
												
												<!-- BEGIN .column6 -->
												<div class="column6">
													<ul class="article-block">
														<?php 
															$random2m = mysqli_query($koneksi, "SELECT * FROM berita 
																			left join users on berita.username=users.username
																				left join kategori on berita.id_kategori=kategori.id_kategori
																					where berita.id_kategori='$rm[id_kategori]' AND berita.status='Y' order by id_berita DESC LIMIT 1,5");

															while ($r2m = mysqli_fetch_array($random2m)){
															$komen1 = "SELECT * FROM komentar WHERE id_berita = '".$r2m['id_berita']."'";
															$komentar1 = mysqli_query($koneksi, $komen1);
															$total_komentar1 = mysqli_num_rows($komentar1);
															$tglr2 = tgl_indo($r2m['tanggal']);
																echo "<li>
																		<div class='article-photo'>";
																			if ($r2m[gambar] ==''){
																				echo "<a class='hover-effect' href='berita-$r2m[judul_seo].html'><img style='width:59px; height:42px' src='foto_berita/small_no-image.jpg' alt='small_no-image.jpg' /></a>";
																			}else{
																				echo "<a class='hover-effect' href='berita-$r2m[judul_seo].html'><img style='width:59px; height:42px' src='foto_berita/small_$r2m[gambar]' alt='$r2m[gambar]' /></a>";
																			}
																	echo "</div>
																		<div class='article-content'>
																			<h4><a href='berita-$r2m[judul_seo].html'>$r2m[judul]</a><a href='berita-$r2m[judul_seo].html' class='h-comment'>$total_komentar1</a></h4>
																			<span class='meta'>
																				<a href='berita-$r2m[judul_seo].html'><span class='icon-text'>&#128340;</span>$r2m[jam], $tglr2</a>
																			</span>
																		</div>
																	</li>";
															}
														?>
													</ul>
												<!-- END .column6 -->
												</div>
												
												<!-- BEGIN .column6 -->
												<div class="column6">
													<ul class="article-block">
														<?php 
															$random2xm = mysqli_query($koneksi, "SELECT * FROM berita 
																			left join users on berita.username=users.username
																				left join kategori on berita.id_kategori=kategori.id_kategori
																					where berita.id_kategori='$rm[id_kategori]' AND berita.status='Y' order by id_berita DESC LIMIT 6,5");

															while ($r2xm = mysqli_fetch_array($random2xm)){
															$komen1 = "SELECT * FROM komentar WHERE id_berita = '".$r2xm['id_berita']."'";
															$komentar1 = mysqli_query($koneksi, $komen1);
															$total_komentar1 = mysqli_num_rows($komentar1);
															$tglr2 = tgl_indo($r2xm['tanggal']);
																echo "<li>
																		<div class='article-photo'>";
																			if ($r2xm[gambar] ==''){
																				echo "<a class='hover-effect' href='berita-$r2xm[judul_seo].html'><img style='width:59px; height:42px' src='foto_berita/small_no-image.jpg' alt='small_no-image.jpg' /></a>";
																			}else{
																				echo "<a class='hover-effect' href='berita-$r2xm[judul_seo].html'><img style='width:59px; height:42px' src='foto_berita/small_$r2xm[gambar]' alt='$r2xm[gambar]' /></a>";
																			}
																	echo "</div>
																		<div class='article-content'>
																			<h4><a href='berita-$r2xm[judul_seo].html'>$r2xm[judul]</a><a href='berita-$r2xm[judul_seo].html' class='h-comment'>$total_komentar1</a></h4>
																			<span class='meta'>
																				<a href='berita-$r2xm[judul_seo].html'><span class='icon-text'>&#128340;</span>$r2xm[jam], $tglr2</a>
																			</span>
																		</div>
																	</li>";
															}
														?>
													</ul>
												<!-- END .column6 -->
												</div>

											</div>

										</div>
									</div>
									
									<?php
										$tengah3=mysqli_query($koneksi, "SELECT * FROM iklantengah where id_iklantengah='3'");
										$ia3=mysqli_fetch_array($tengah3);
											echo "<a href='$ia3[url]' target='_blank'>";
												$string = $ia3['gambar'];
												if ($ia3['gambar'] == ''){
												}else{
													if(preg_match("/swf\z/i", $string)) {
														echo "<embed style='margin-top:-10px' src='foto_iklantengah/$ia3[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
													} else {
														echo "<img style='margin-top:-10px; margin-bottom:5px' width='100%' src='foto_iklantengah/$ia3[gambar]' title='$ia3[judul]' />";
													}
												}
											echo "</a>";
									?>
									
									<div class="block">
										<div class="block-title" style="background: #dd8229;">
											<a href="#" class="right">Beberapa Berita Pilihan</a>
											<h2>Berita Pilihan Redaksi</h2>
										</div>
										<div class="block-content">
											<ul class="article-block-big">
												<?php 
													$pilihan = mysqli_query($koneksi, "SELECT * FROM berita left join users on berita.username=users.username
																left join kategori on berita.id_kategori=kategori.id_kategori
																	WHERE berita.aktif='Y' AND berita.status='Y' ORDER BY id_berita DESC LIMIT 6"); 
													while($pi=mysqli_fetch_array($pilihan)){ 
															$komen1 = "SELECT * FROM komentar WHERE id_berita = '".$pi['id_berita']."'";
															$komentar1 = mysqli_query($koneksi, $komen1);
															$total_komentar1 = mysqli_num_rows($komentar1);
													 $tgl = tgl_indo($pi['tanggal']);
														echo "<li>
																<div class='article-photo'>
																	<a href='berita-$pi[judul_seo].html' class='hover-effect'>";
																		if ($pi[gambar] ==''){
																			echo "<a class='hover-effect' href='berita-$pi[judul_seo].html'><img style='height:110px; width:210px' src='foto_berita/no-image.jpg' alt='' /></a>";
																		}else{
																			echo "<a class='hover-effect' href='berita-$pi[judul_seo].html'><img style='height:110px; width:210px' src='foto_berita/$pi[gambar]' alt='' /></a>";
																		}
																echo "</a>
																</div>
																<div class='article-content'>
																	<h4><a href='berita-$pi[judul_seo].html'>$pi[judul]</a><a href='berita-$pi[judul_seo].html' class='h-comment'>$total_komentar1</a></h4>
																	<span class='meta'>
																		<a href='berita-$pi[judul_seo].html'><span class='icon-text'>&#128340;</span>$pi[jam], $tgl</a>
																	</span>
																</div>
															  </li>";
													}
												?>
											</ul>
										</div>
									</div>