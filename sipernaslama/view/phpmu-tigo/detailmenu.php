<?php
	$cekhal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as jml FROM halamanstatis where judul_seo='".anti_injection($_GET['halaman'])."'"));
	if ($cekhal[jml]=='0' OR is_numeric($_GET['judul'])){
		echo "<script>document.location='index.php';</script>";
	}
	$detail=mysqli_query($koneksi, "SELECT * FROM halamanstatis where judul_seo='".anti_injection($_GET['halaman'])."'");
	$d   = mysqli_fetch_array($detail);
?>	
						<div class="main-page left">
							<div class="single-block">
								<div class="content-block main left">
									
									<div class="block">
										<div class="block-title" style="background: #bf4b37;">
											<a href="index.php" class="right">Back to homepage</a>
											<h2><?php echo "$d[judul]"; ?></h2>
										</div>
										<div class="block-content">
											<div class="shortcode-content">

												<div class="paragraph-row">
													<div class="column3">
														<h3 class="highlight-title">Berita Foto Populer</h3>
														<ul class="article-block">
															<?php 
																$random2 = mysqli_query($koneksi, "SELECT * FROM album order by hits_album DESC LIMIT 5");
																while ($r2 = mysqli_fetch_array($random2)){
																	$tglr2 = tgl_indo($r2['tgl_posting']);
																	echo "<li>
																			<div class='article-photo'>";
																				if ($r2[gbr_album] ==''){
																					echo "<a href='album-$r2[id_album]-$r2[album_seo].html' class='hover-effect'><img style='width:59px; height:42px;' src='foto_berita/small_no-image.jpg' alt='' /></a>";
																				}else{
																					echo "<a href='album-$r2[id_album]-$r2[album_seo].html' class='hover-effect'><img style='width:59px; height:42px;' src='img_album/$r2[gbr_album]' alt='' /></a>";
																				}
																			echo "</div>
																			<div class='article-content'>
																				<h4><a href='album-$r2[id_album]-$r2[album_seo].html'>$r2[jdl_album]</a></h4>
																				<span class='meta'>
																					<a href='album-$r2[id_album]-$r2[album_seo].html'><span class='icon-text'>&#128340;</span>$r2[jam], $tglr2</a>
																				</span>
																			</div>
																	</li>";
																}
															?>
														</ul>
														
													</div>
													<div class="column9">
														<?php 
															if (trim($d[gambar])!=''){
																echo "<img style='width:100%' src='foto_statis/$d[gambar]'>";
															}
															if ($d[isi_halaman]==''){
																echo "<center style='padding:15%; font-weight:bold; color:red'>Maaf, Belum ada Informasi pada Halaman ini.</center>"; 
															}else{
																echo "$d[isi_halaman]";
															} 
														?>
													</div>
												</div><br>
												<?php
													$iklandetail=mysqli_query($koneksi, "SELECT * FROM iklantengah where id_iklantengah='9'");
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