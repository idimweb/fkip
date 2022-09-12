					<div class="main-content">
						<div class="main-page left">
							<div class="double-block">
								<div class="content-block main left">
									
									<div class="block">
										<div class="block-title" style="background:orange;">

											<a href="index.php" class="right">Back to homepage</a>											
												<?php if ($_GET[halplaylist] == ''){ ?>
												<h2>Daftar Semua Agenda</h2>
											<?php }else{ ?>
												<h2>Daftar Semua Agenda "<?php echo " - Page. ".anti_injection($_GET[halagenda]); ?>"</h2>
											<?php } ?>		
										</div>
										<div class="block-content">
											<?php
											  $p      = new Paging4;
											  $batas  = 8;
											  $posisi = $p->cariPosisi($batas);
											  
											  $sql = mysqli_query($koneksi, "SELECT * FROM agenda a JOIN users b ON a.username=b.username ORDER BY a.id_agenda DESC LIMIT $posisi,$batas");		 
											  while($r=mysqli_fetch_array($sql)){
											  $tgl_posting = tgl_indo($r['tgl_posting']);
											  $tgl_mulai   = tgl_indo($r['tgl_mulai']);
											  $tgl_selesai = tgl_indo($r['tgl_selesai']);
											  $baca = $r['dibaca']+1;
												  $judull = substr($r['tema'],0,33); 
												  $isi_agenda =(strip_tags($r['isi_agenda'])); 
												  $isi = substr($isi_agenda,0,280); 
												  $isi = substr($isi_agenda,0,strrpos($isi," "));
												  
												  echo "<div class='article-big'>
															<div class='article-photo'>";
															if ($r['gambar']==''){
																echo "<img width='210px' height='150px' src='foto_berita/small_no-image.jpg'>";
															}else{
																echo "<img width='210px' height='150px' src='foto_agenda/$r[gambar]'>";
															}	
															echo "</div>
															<div class='article-content'>
																<h2><a title='$r[tema]' href='agenda-$r[tema_seo].html'>$judull</a></h2>
																<span class='meta'>
																	<a href='agenda-$r[tema_seo].html'><span class='icon-text'>&#128100;</span>$r[nama_lengkap]</a>
																	<a href='agenda-$r[tema_seo].html'><span class='icon-text'>&#128340;</span>$tgl_posting - $baca view</a>
																</span>
																<p>$isi . . .</p>
																<span class='meta'>
																	<a href='agenda-$r[tema_seo].html' class='more'>See More<span class='icon-text'>&#9656;</span></a>
																</span>
															</div>
														</div>";
												  $no++;
											  }
											
											$jmldata     = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM agenda"));
											$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
											$linkHalaman = $p->navHalaman(anti_injection($_GET[halagenda]), $jmlhalaman);
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