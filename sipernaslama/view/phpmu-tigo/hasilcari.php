					<div class="main-content">
						<div class="main-page left">
							<div class="double-block">
								<div class="content-block main left">
									
									<div class="block">
										<div class="block-title" style="background: #2182b4;">
											<?php
												$sq = mysqli_query($koneksi, "SELECT nama_kategori from kategori where id_kategori='".anti_injection($_GET['kt'])."'");
												$n = mysqli_fetch_array($sq);
											?>
											<a href="index.php" class="right">Back to homepage</a>
												<h2>Hasil Pencarian Berita</h2>
										</div>
										<div class="block-content">
											<?php
											  $kata = trim(anti_injection($_POST['kata']));
											  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);
											  $pisah_kata = explode(" ",$kata);
											  $jml_katakan = (integer)count($pisah_kata);
											  $jml_kata = $jml_katakan-1;
											  $cari = "SELECT * FROM berita WHERE " ;
											  for ($i=0; $i<=$jml_kata; $i++){
											  $cari .= "isi_berita LIKE '%$pisah_kata[$i]%' or judul LIKE '%$pisah_kata[$i]%'";
											  if ($i < $jml_kata ){
											  $cari .= " OR "; } }
											  $cari .= " ORDER BY id_berita DESC LIMIT 5";
											  $hasil  = mysqli_query($koneksi, $cari);
											  $ketemu = mysqli_num_rows($hasil);
											  if ($ketemu > 0){
											  echo "<center><p>Ditemukan <span class style=\"color:#EA1C1C;\">$ketemu berita teratas </span>dengan kata <font style='background-color:#EA1C1C'>
													<class style=\"color:#fff;\">$kata</font> :</p></center><hr>"; 
											  
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
											  echo "<center style='margin-top:20%; margin-bottom:20%'>Tidak ditemukan Berita dengan Keyword <b style='color:red'>$kata</b>.</center>"; 
											}
										?>

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