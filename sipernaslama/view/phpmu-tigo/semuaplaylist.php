					<div class="main-content">
						<div class="main-page left">
							<div class="double-block">
								<div class="content-block main left">
									
									<div class="block">
										<div class="block-title" style="background:purple;">

											<a href="index.php" class="right">Back to homepage</a>											
												<?php if ($_GET[halplaylist] == ''){ ?>
												<h2>Daftar Semua Video</h2>
											<?php }else{ ?>
												<h2>Daftar Semua Video "<?php echo " - Page. ".anti_injection($_GET[halplaylist]); ?>"</h2>
											<?php } ?>		
										</div>
										<div class="block-content">
											<?php
											  $p      = new Paging10;
											  $batas  = 8;
											  $posisi = $p->cariPosisi($batas);
											  
											  $sql   = "SELECT * FROM video,users,playlist WHERE users.username=video.username 
															AND video.id_playlist=playlist.id_playlist ORDER BY id_video DESC LIMIT $posisi,$batas";		 
											  $hasil = mysqli_query($koneksi, $sql);
											  $jumlah = mysqli_num_rows($hasil);
												
											if ($jumlah > 0){
											  $no = 1;
											  while($r=mysqli_fetch_array($hasil)){
												  $tgl = tgl_indo($r[tanggal]);
												  $lihat = $r[dilihat]+1;
												  $judull = substr($r[jdl_video],0,33); 
												  $isi_berita =(strip_tags($r[keterangan])); 
												  $isi = substr($isi_berita,0,280); 
												  $isi = substr($isi_berita,0,strrpos($isi," "));
												  $komen = "SELECT * FROM komentarvid WHERE id_video = '".$r['id_video']."'";
												  $komentar = mysqli_query($koneksi, $komen);
												  $total_komentar = mysqli_num_rows($komentar);	
												  
												  echo "<div class='article-big'>
															<div class='article-photo'>";
															if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $r['youtube'], $match)) {
				                                                echo "<iframe width='210' height='150' id='ytplayer' type='text/html'
				                                                    src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
				                                                    frameborder='0' allowfullscreen></iframe>";
				                                            } 
														echo "</div>
															<div class='article-content'>
																<h2><a title='$r[jdl_video]' href='play-$r[id_video]-$r[video_seo].html'>$judull</a><a href='berita-$r[judul_seo].html' class='h-comment'>$total_komentar</a></h2>
																<span class='meta'>
																	<a href='play-$r[id_video]-$r[video_seo].html'><span class='icon-text'>&#128100;</span>$r[nama_lengkap]</a>
																	<a href='play-$r[id_video]-$r[video_seo].html'><span class='icon-text'>&#128340;</span>$r[jam], $tgl</a>
																</span>
																<p>$isi . . .</p>
																<span class='meta'>
																	<a href='play-$r[id_video]-$r[video_seo].html' class='more'>Watch This Video<span class='icon-text'>&#9656;</span></a>
																</span>
															</div>
														</div>";
												  $no++;
											  }
											}else{
											  echo "Belum ada berita pada kategori ini."; 
											}
											
											$jmldata     = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM video"));
											$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
											$linkHalaman = $p->navHalaman(anti_injection($_GET[halplaylist]), $jmlhalaman);
										?>
											<div class="pagination">
												<?php echo $linkHalaman ?>
											</div>

										</div>
									</div>

								</div>

								<div class="content-block right">
									<?php include "sidebar_kiri_kategori.php"; ?>
								</div>
							</div>

						</div>
						
						<div class="main-sidebar right">
							<?php include "sidebar_kanan_kategori.php"; ?>
						</div>

						<div class="clear-float"></div>

					</div>
					
				<!-- END .wrapper -->
				</div>
				
			</div>