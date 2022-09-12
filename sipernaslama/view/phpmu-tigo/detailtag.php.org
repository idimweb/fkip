					<div class="main-content">
						<div class="main-page left">
							<div class="double-block">
								<div class="content-block main left">
									
									<div class="block">
										<div class="block-title" style="background: orange;">
											<?php
												$sq = mysqli_query($koneksi, "SELECT nama_tag, tag_seo from tag where tag_seo='".anti_injection($_GET['idt'])."'");
												$n = mysqli_fetch_array($sq);
											?>
											<a href="index.php" class="right">Back to homepage</a>
											
											<?php if (anti_injection($_GET[haltag]) == ''){ ?>
												<h2>Berita Tags "<?php echo "$n[nama_tag]"; ?>"</h2>
											<?php }else{ ?>
												<h2>Berita Tags "<?php echo "$n[nama_tag] - Page. $_GET[haltag]"; ?>"</h2>
											<?php } ?>
											
										</div>
										<div class="block-content">
											<?php
											  $p      = new Pagingt;
											  $batas  = 8;
											  $posisi = $p->cariPosisi($batas);
											  
											  $sql   = "SELECT * FROM berita 
															left join users on berita.username=users.username WHERE tag LIKE '%".anti_injection($_GET['idt'])."%' 
																	ORDER BY id_berita DESC LIMIT $posisi,$batas";		 
											  $hasil = mysqli_query($koneksi, $sql);
											  $jumlah = mysqli_num_rows($hasil);
												
											if ($jumlah > 0){
											  $no = 1;
											  while($r=mysqli_fetch_array($hasil)){
												  $pasang = $warna[$no];
												  $tgl = tgl_indo($r[tanggal]);
												  $baca = $r[dibaca]+1;	
												  $isi_berita =(strip_tags($r[isi_berita])); 
												  $isi = substr($isi_berita,0,220); 
												  $isi = substr($isi_berita,0,strrpos($isi," ")); 
												  
												  $judul = substr($r[judul],0,33); 
												  $komen = "SELECT * FROM komentar WHERE id_berita = '".$r['id_berita']."'";
												  $komentar = mysqli_query($koneksi, $komen);
												  $total_komentar = mysqli_num_rows($komentar);	
												  
												  echo "<div class='article-big'>
															<div style='height:120px; background:#e3e3e3; overflow:hidden' class='article-photo'>
																<a href='berita-$r[judul_seo].html' class='hover-effect'>";
																	if ($r[gambar] == ''){
																		echo "<img style='width:210px;' src='foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
																	}else{
																		echo "<img style='width:210px;' src='foto_berita/$r[gambar]' alt='$r[gambar]' /></a>";
																	}
																echo "</a>
															</div>
															<div class='article-content'>
																<h2><a title='$r[judul]' href='berita-$r[judul_seo].html'>$judul...</a><a href='berita-$r[judul_seo].html' class='h-comment'>$total_komentar</a></h2>
																<span class='meta'>
																	<a href='berita-$r[judul_seo].html'><span class='icon-text'>&#128100;</span>$r[nama_lengkap]</a>
																	<a href='berita-$r[judul_seo].html'><span class='icon-text'>&#128340;</span>$r[jam], $tgl</a>
																</span>
																<p>$isi . . .</p>
																<span class='meta'>
																	<a href='berita-$r[judul_seo].html' class='more'>Read Full Article<span class='icon-text'>&#9656;</span></a>
																</span>
															</div>
														</div>";
												  $no++;
											  }
											}else{
											  echo "Belum ada berita pada kategori ini."; 
											}
											
											$jmldata     = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM berita WHERE tag='".anti_injection($n['tag_seo'])."'"));
											$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
											$linkHalaman = $p->navHalaman(anti_injection($_GET[haltag]), $jmlhalaman);
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