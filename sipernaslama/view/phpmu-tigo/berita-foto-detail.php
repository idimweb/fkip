<?php
	mysqli_query($koneksi, "UPDATE album SET hits_album='$hits' where id_album='".anti_injection($_GET['ald'])."'");
	$d   = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from album,users where id_album='".anti_injection($_GET['ald'])."'"));
	$tgl = tgl_indo($d['tgl_posting']);
	$hits = $d['hits_album']+1;
?>	
						<div class="main-page left">
							<div class="single-block">
								<div class="content-block main left">
									
									<div class="block">
										<div class="block-title" style="background: #bf4b37;">
											<a href="#" class="right"><?php echo "$hits view"; ?></a>
											<h2><?php echo "$d[jdl_album]"; ?></h2>
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
													<div class="block-content">
														<?php 
															echo "$d[keterangan]
															<ul class='article-block-big'>"; 
															  $p      = new Paging13;
															  $batas  = 1;
															  $posisi = $p->cariPosisi($batas);
															  $g = mysqli_query($koneksi, "SELECT * FROM gallery WHERE id_album='".anti_injection($_GET['ald'])."' ORDER BY id_gallery DESC LIMIT $posisi,$batas");
															  $ada = mysqli_num_rows($g);
															  if ($ada > 0){
																$no = $posisi+1;
																while ($h = mysqli_fetch_array($g)) {
																$keterangan = nl2br($h['keterangan']);
																	echo "<li style='width:100%; margin-left:-13px'>
																			<div class='article-photo'>
																				<h3>$no. $h[jdl_gallery]</h3>
																						<img class='jslghtbx-thmb' style='width:87%' title='$h[jdl_gallery]' src='img_galeri/$h[gbr_gallery]' alt='$h[jdl_gallery]' data-jslghtbx='img_galeri/$h[gbr_gallery]' data-jslghtbx-group='group3' data-jslghtbx-caption='$h[keterangan]' /><br>
																				<p>$keterangan</p>
																			</div>
																		  </li>";
																	$no++;
																}
															  }else{
																	echo "<div style='color:red; text-align:center; margin-top:12%; margin-bottom:12%;'><h4>Belum ada foto untuk berita pada halaman ini.</h4></div>";
															  }
															  
															$jmldata     = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM gallery WHERE id_album='".anti_injection($_GET['ald'])."'"));
															$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
															$linkHalaman = $p->navHalaman(anti_injection($_GET['halfotoberita']), $jmlhalaman);
														echo "</ul>
															<div class='pagination'>
																$linkHalaman
															</div>
													</div>"; 
													?>
													</div>
												</div><br>
												
												<?php
													$iklandetail=mysqli_query($koneksi, "SELECT * FROM iklantengah where id_iklantengah='6'");
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
															echo "<a href='#'>$d[nama_lengkap] - $d[hari], $tgl - $d[jam] WIB</a>";	
														?>
													</div>
												</div>
											</div>
										</div>
									<div id="fb-root"></div>
										<script>(function(d, s, id) {
										  var js, fjs = d.getElementsByTagName(s)[0];
										  if (d.getElementById(id)) return;
										  js = d.createElement(s); js.id = id;
										  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
										  fjs.parentNode.insertBefore(js, fjs);
										}(document, 'script', 'facebook-jssdk'));</script>
										<div id="viewcomment" class="block-title">
											<a href="#writecomment" class="right">Write a Facebook Comment</a>
											<h2>
												Tuliskan Komentar anda dari account Facebook
											</h2>
										</div>
										<div class="block-content">
											<div class="comment-block">
												<div class="fb-comments" data-href="<?php echo $iden[url].'/play-'.$d[id_video].'-'.$d[video_seo].'.html'; ?>" data-width="855" data-numposts="5" data-colorscheme="light"></div> 
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>