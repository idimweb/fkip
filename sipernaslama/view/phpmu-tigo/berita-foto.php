			
						<div class="full-width">
							<div class="block">
								<div class="block-title">
									<a href="index.html" class="right">Back to homepage</a>
									<h2>Semua Berita Foto</h2>
								</div>
								<div class="block-content">
									<div class="map-border">
										<ul class="article-block-big">
												<?php 
													$hot = mysqli_query($koneksi, "SELECT * FROM album ORDER BY id_album DESC LIMIT 25"); 
													$no = 1;
													while($h=mysqli_fetch_array($hot)){ 	
													 $tgl = tgl_indo($h['tgl_posting']);
														echo "<li style='width:222px'>
																<div style='overflow:hidden; height:143px;' class='article-photo'>
																	<a href='album-$h[id_album]-$h[album_seo].html' class='hover-effect'>";
																		if ($h['gbr_album'] ==''){
																			echo "<a class='hover-effect' href='album-$h[id_album]-$h[album_seo].html'><img style='width:215px' src='foto_berita/no-image.jpg' alt='' /></a>";
																		}else{
																			echo "<a class='hover-effect' href='album-$h[id_album]-$h[album_seo].html'><img style='width:215px' src='img_album/$h[gbr_album]' alt='' /></a>";
																		}
																echo "</a>
																</div>
																<div class='article-content'>
																	<h4><a href='album-$h[id_album]-$h[album_seo].html'>$h[jdl_album]</a> - <span style='font-size:14px; color:#8a8a8a'>$h[hits_album] view</span></h4>
																	<span class='meta'>
																		<a href='album-$h[id_album]-$h[album_seo].html'><span class='icon-text'>&#128340;</span>$h[jam], $tgl</a>
																	</span>
																</div>
															  </li>";
													}
												?>
											</ul>
									</div>
								</div>
							</div>

						</div>