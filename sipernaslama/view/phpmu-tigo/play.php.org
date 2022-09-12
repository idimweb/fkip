<?php
  $detail=mysqli_query($koneksi, "SELECT * FROM video,users,playlist WHERE users.username=video.username 
							AND   video.id_playlist=playlist.id_playlist AND id_video='".anti_injection($_GET['id'])."'");
  $d   = mysqli_fetch_array($detail);
  $tgl = tgl_indo($d[tanggal]);
  $lihat = $d[dilihat]+1;
  $keterangan = nl2br($d[keterangan]);
	
  mysqli_query($koneksi, "UPDATE video SET dilihat=$d[dilihat]+1 
              WHERE id_video='$_GET[id]'");
			  
	$komen3 = "SELECT * FROM komentarvid WHERE id_video = '".anti_injection($_GET['id'])."' AND aktif='Y'";
	$komentar3 = mysqli_query($koneksi, $komen3);
	$total_komentar = mysqli_num_rows($komentar3);
?>	
						<div class="full-width">
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
										<div class="clear-float"></div>
									</div>
									<div>
										<a href="javascript:printArticle();" class="small-button"><span class="icon-text">&#59158;</span>&nbsp;&nbsp;Print this article</a>
										<a href="#" class="small-button"><span class="icon-text">&#9993;</span>&nbsp;&nbsp;Send e-mail</a>
									</div>
								</div>

								<h1><?php echo "<b>Video - $d[jdl_video]</b>"; ?></h1>
								<div class="author">
									<span class="hover-effect left">
									<?php $test = md5(strtolower(trim($d['email']))); 
										echo "<img src=\"http://www.gravatar.com/avatar/".$test.".jpg?s=100&d=".$_GET['d']."\" />";
									?>
									</span>
									<div class="a-content">
										<span>By <b><?php echo "$d[nama_lengkap]"; ?></b></span>
										<span class="meta"><?php echo "$tgl, $d[jam] WIB"; ?><span class="tag" style="background-color: #2a8ece;"><a href="<?php echo "kategori-$d[id_kategori]-$d[kategori_seo].html"; ?>"><?php echo "$d[nama_kategori]"; ?></a></span></span>
									</div>
								</div>
							</div>

						</div>

						<div class="main-page left">
							<div class="single-block">
								<div class="content-block main left">
									
									<div class="block">
										<div class="block-content">
												
											<p><span style="height:10%; overflow:hidden; background:none;" class="hover-effect">
											<?php
												if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $d['youtube'], $match)) {
	                                                echo "<iframe width='855px' height='500px' id='ytplayer' type='text/html'
	                                                    src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
	                                                    frameborder='0' allowfullscreen></iframe>";
	                                            } 	
											?>
											
											</span></p>
											<div class="shortcode-content">
												<div class="paragraph-row">
													<div class="column3">
														<h3 class="highlight-title">Random Video</h3>
														<ul>
															<?php 
																$random2 = mysqli_query($koneksi, "SELECT * FROM video order by RAND() DESC LIMIT 5");
																while ($r2 = mysqli_fetch_array($random2)){
																	echo "<li><a href='play-$r2[id_video]-$r2[video_seo].html'>$r2[jdl_video]</a></li>";
																}
															?>
														</ul>
													</div>
													<div class="column9">
														<?php 
															echo "$keterangan"; 
														?>
													</div>
												</div>
											</div>
										</div>
										<?php 
										$iklandetail=mysqli_query($koneksi, "SELECT * FROM iklantengah where id_iklantengah='5'");
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
										<?php
										if ($total_komentar == 0){ 
										}else{ 
										?>	
										<div id="viewcomment" class="block-title">
											<a href="#writecomment" class="right">Write a comment</a>
											<h2>
												<?php 
													echo "Ada $total_komentar Komentar untuk Video Ini"; 
												?>
											</h2>
										</div>
										<div class="block-content">

											<div class="comment-block">
												
												<ol class="comments">
													<li>
														<?php
															$komentar = mysqli_query($koneksi, "SELECT * FROM komentarvid where id_video='".anti_injection($d['id_video'])."' AND aktif='Y' order by id_komentar");
															$no = 1;
															while ($kka = mysqli_fetch_array($komentar)){
																$tgl = tgl_indo($kka['tgl']);
																$isian=nl2br($kka['isi_komentar']); 
																$isikan=sensor($isian); 
																$komentarku = autolink($isikan);
																
																if(($no % 2)==0){ $warna="#ffffff;"; }else{ $warna="#e3e3e3"; }
																$test = md5(strtolower(trim($kka['url'])));	
																
																echo "<div style='background:$warna' class='commment-content'>
																		<div class='user-avatar'>
																			<a href='#' class='hover-effect'>";
																				if ($kka[url] == ''){
																					echo "<img class='setborder' src='foto_user/blank.png'/>";
																				}else{
																					echo "<img class='setborder' src=\"http://www.gravatar.com/avatar/".$test.".jpg?s=100&d=".$_GET['d']."\" />";
																				}
																			echo "</a>
																		</div>
																		<strong class='user-nick'><a href='$kka[url]'>$kka[nama_komentar]</a></strong>
																		<span class='time-stamp'>$tgl, $kka[jam_komentar] WIB</span>
																		<div class='comment-text'>
																			<p>$komentarku</p>
																		</div>
																	  </div>";
																$no++;
															}
														?>
													</li>
													
												</ol>

											</div>

										</div>
										<?php } ?>
										<div class="block-title">
											<a href="#viewcomment" class="right">View all comments</a>
											<h2>Write a comment</h2>
										</div>
										<div class="block-content">
											<div id="writecomment">
										
												<form action="include/simpankomentarvid.php" method="POST" onSubmit="return validasi(this)" id="form_komentar">
													<input type="hidden" name='id' value='<?php echo "$d[id_video]"; ?>'>
													<p class="contact-form-user">
														<label for="c_name">Nickname<span class="required">*</label>
														<input type="text" placeholder="Nickname" id="nama" name='nama_komentar' class="required"/>
														
													</p>
													<p class="contact-form-email">
														<label for="c_email">E-mail<span class="required">*</span></label>
														<input type="text" name='url' placeholder="E-mail" id="email" class="required"/>
													</p>
													<p class="contact-form-message">
														<label for="c_message">Comment<span class="required">*</span></label>
														<textarea name='isi_komentar' placeholder="Your message.." class="required"></textarea>
													</p>
													<p class="contact-form-message">
														<label for="c_message">
														<img src='include/captcha.php'><br></label>
														<input name='kode' maxlength=6 type="text" value="" size="30" class="required" placeholder="Masukkkan kode di sebelah kiri..">
													</p>
													<p><input type="submit" name="Submit" class="styled-button" value="Post a Comment"/></p>
												</form>
												
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>