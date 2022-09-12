
							
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
										<a href="<?php echo"$fb"; ?>" class="social-icon"><i class="number">Likes!</i><span class="facebook">Facebook</span></a>
										<a href="<?php echo"$tw"; ?>" class="social-icon"><i class="number">Follows!</i><span class="twitter">Twitter</span></a>
										<a href="<?php echo"$go"; ?>" class="social-icon"><i class="number">Connect!</i><span class="google">Google+</span></a>
										<a href="<?php echo"$lk"; ?>" class="social-icon"><i class="number">Find us!</i><span class="linkedin">Linkedin</span></a>
									</div>
									<p>Ikuti kami di facebook, twitter, Google+, Linkedin dan dapatkan informasi terbaru dari kami disana.</p>
								</div>
							<!-- END .widget -->
							</div>

							<!-- BEGIN .widget -->
							<div class="widget">
								<h3>Video Terbaru</h3>
								<div class="latest-galleries">
									<?php
									  $hari_ini=date("Ymd");
									  $sebelum=mktime(0, 0, 0, date("m"), date("d") - 7, date("Y"));    
									  $tgl_sebelumnya=date("Ymd", $sebelum);							  
									  $terkini2=mysqli_query($koneksi, "select * from video ORDER BY id_video DESC LIMIT 5"); 				   
									  while($d=mysqli_fetch_array($terkini2)){
									  $baca = $d[dilihat]+1;
									  $tgl = tgl_indo($d['tanggal']);
									  $judul = substr($d[jdl_video],0,35);
									  echo "<div class='gallery-widget'>
												<div class='gallery-photo' rel='hover-parent'>
													<a href='#' class='slide-left icon-text'>&#59229;</a>
													<a href='#' class='slide-right icon-text'>&#59230;</a>
													<ul>
														<li>";
															if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $d['youtube'], $match)) {
				                                                echo "<iframe width='100%' height='210' id='ytplayer' type='text/html'
				                                                    src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
				                                                    frameborder='0' allowfullscreen></iframe>";
				                                            } 
														echo "</li>
													</ul>
												</div>
												<div class='gallery-content'>
													<h4><a href=play-$d[id_video]-$d[video_seo].html title='$d[jdl_video]'>$judul . . .</a></h4>
													<span class='meta'>
														<span class='right'>$d[hari], $tgl - Dilihat $baca Kali</span>
														<a href='play-$d[id_video]-$d[video_seo].html'><span class='icon-text'>&#59212;</span>Lihat Video</a>
													</span>
												</div>
											</div>";
									  }
									?>
								</div>
								<a href="<?php echo "semua-playlist.html"; ?>" class="more">View All Video</a>
							<!-- END .widget -->
							</div>
						