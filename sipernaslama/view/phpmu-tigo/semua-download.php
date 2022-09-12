						<div class="main-page left">
							<div class="single-block">
								<div class="content-block main left">
									
									<div class="block">
										<div class="block-title" style="background: #bf4b37;">
											<a href="index.php" class="right">Back to Homepage</a>
											<h2>Semua daftar / List File Download</h2>
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
													<table class='table-download' style='font-weight:bold; border:1px solid #e3e3e3;' width='100%'>
														<tr style='background:#8a8a8a'>
															<th style='border:1px dotted #cecece; padding-left:5px; padding-top:7px; padding-bottom:7px;'>No</th>
															<th style='border:1px dotted #cecece; padding-left:5px; padding-top:7px; padding-bottom:7px;'>Nama File</th>
															<th style='border:1px dotted #cecece; padding-left:5px; padding-top:7px; padding-bottom:7px;'>Hits</th>
															<th style='border:1px dotted #cecece; padding-left:5px; width:70px'></th>
														</tr>
														
														<?php
															$p      = new Paging5;
															$batas  = 15;
															$posisi = $p->cariPosisi($batas);
															$tampil = mysqli_query($koneksi, "SELECT * FROM download ORDER BY id_download DESC LIMIT $posisi,$batas");
															$no = $posisi+1;
															while($r=mysqli_fetch_array($tampil)){
															if(($no % 2)==0){ $warna="#ffffff";}
															else{ $warna="#E1E1E1"; }
															$tgl=tgl_indo($r[tgl_posting]);
												
																echo "<tr bgcolor=$warna><td style='border:1px dotted #cecece; padding-left:5px; padding-top:7px; padding-bottom:7px;'>$no</td>
																	  <td style='border:1px dotted #cecece; padding-left:5px; padding-top:7px; padding-bottom:7px;'>$r[judul]</td>
																	  <td style='border:1px dotted #cecece; padding-left:5px; padding-top:7px; padding-bottom:7px;'>$r[hits] Kali</td>
																	  <td style='border:1px dotted #cecece; padding-left:5px; padding-top:7px; padding-bottom:7px;'>
																	  <a style='color:fff; text-decoration:underline; color:blue' href='include/downlot.php?file=$r[nama_file]'>Download</a></td></tr>";
															$no++;
															}
															
															$jmldata = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM download"));
															$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
															$linkHalaman = $p->navHalaman(anti_injection($_GET[haldownload]), $jmlhalaman);
															echo "</table>";
														?>
															<div class="pagination">
																<?php echo $linkHalaman ?>
															</div>
													</div>
												</div>
												
												<?php
													$iklandetail=mysqli_query($koneksi, "SELECT * FROM iklantengah where id_iklantengah='7'");
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