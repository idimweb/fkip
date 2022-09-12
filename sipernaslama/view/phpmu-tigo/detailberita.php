<?php
$cekberita = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as jml FROM berita where judul_seo='".anti_injection($_GET['judul'])."'"));
if ($cekberita[jml]=='0' OR is_numeric($_GET['judul'])){
	echo "<script>document.location='index.php';</script>";
}else{
	$detail=mysqli_query($koneksi, "SELECT * FROM berita 
										left join users on berita.username=users.username
											left join kategori on berita.id_kategori=kategori.id_kategori
												where berita.status='Y' AND judul_seo='".anti_injection($_GET['judul'])."' ");
	$d   = mysqli_fetch_array($detail);
	$tgl = tgl_indo($d[tanggal]);
	$baca = $d[dibaca]+1;	
	mysqli_query($koneksi, "UPDATE berita SET dibaca=$d[dibaca]+1 WHERE judul_seo='".anti_injection($_GET['judul'])."'");
	$total_komentar = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM komentar WHERE id_berita = '".anti_injection($d['id_berita'])."' AND aktif='Y'"));
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

								<h1><?php echo "<b>$d[judul]</b> <br><span style='font-size:14px; color:blue'>$d[sub_judul]</span>"; ?></h1>
								<div class="author">
									<span class="hover-effect left">
									<?php $test = md5(strtolower(trim($d['email']))); 
										echo "<img src='http://www.gravatar.com/avatar/$test.jpg?s=100'/>";
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
												if ($d['gambar'] !=''){
													echo "<img style='width:890px;' src='foto_berita/$d[gambar]' alt='$d[judul]' /></a>
														  <center><p><i><b>Keterangan Gambar :</b> $d[keterangan_gambar]</i></p></center><br>";
												}
											?>
											
											</span></p>
											
											<div class="shortcode-content">

												<div class="paragraph-row">
													<div class="column3">
														<h3 class="highlight-title">Berita Populer</h3>
														<ul>
															<?php 
																$random2 = mysqli_query($koneksi, "SELECT * FROM berita 
																								left join users on berita.username=users.username
																									left join kategori on berita.id_kategori=kategori.id_kategori
																										order by dibaca DESC LIMIT 5");

																while ($r2 = mysqli_fetch_array($random2)){
																	$tglr2 = tgl_indo($r2['tanggal']);
																	echo "<li><a href='berita-$r2[judul_seo].html'>$r2[judul]</a></li>";
																}
															?>
														</ul>
														<h3 class="highlight-title">Berita Terkait</h3>
														<ul>
															<?php
																  $pisah_kata  = explode(",",$d[tag]);
																  $jml_katakan = (integer)count($pisah_kata);

																  $jml_kata = $jml_katakan-1; 
																  $ambil_id = substr($d[id_berita],0,4);

																  $cari = "SELECT * FROM berita WHERE (id_berita<'$ambil_id') and (id_berita!='$ambil_id') and (" ;
																  for ($i=0; $i<=$jml_kata; $i++){
																  $cari .= "tag LIKE '%$pisah_kata[$i]%'";
																  if ($i < $jml_kata ){
																  $cari .= " OR ";}}
																  $cari .= ") ORDER BY id_berita DESC LIMIT 5";

																  $hasil  = mysqli_query($koneksi, $cari);
																  while($h=mysqli_fetch_array($hasil)){
																	$komen1 = "SELECT * FROM komentar WHERE id_berita = '".$h['id_berita']."'";
																	$komentar1 = mysqli_query($koneksi, $komen1);
																	$total_komentar1 = mysqli_num_rows($komentar1);
																  echo "<li><a href=berita-$h[judul_seo].html>$h[judul]</a><a href='#' class='h-comment'>$total_komentar1</a></li>";}      
																  mysqli_query($koneksi, "UPDATE berita SET dibaca=$d[dibaca]+1 WHERE judul_seo='".anti_injection($_GET['judul'])."'");
															?>
														</ul>
													</div>
													<div class="column9">
														<?php 
															echo "$d[isi_berita]
																	<div class='fb-like'  data-href='$iden[url]/berita-$d[judul_seo].html' 
																		data-send='false'  data-width='600' data-show-faces='false'>
																	</div> <br><br>"; 
															
															
															if ($d['youtube']!=''){
																  echo "<h4>Video Terkait:</h4>
																  <iframe width='100%' height='350' src='$d[youtube]' frameborder='0' allowfullscreen></iframe>
																  <div class='garis'></div><br/>";
															}
														?>
													</div>
												</div>

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
														<strong>TAGS:</strong>
														<?php
															$tags = (explode(",",$d[tag]));
															$hitung = count($tags);
															for ($x=0; $x<=$hitung; $x++) {
																if ($tags[$x] == ''){
																}else{
																	echo "<a href='tag-$tags[$x].html'>$tags[$x]</a>";
																}
															}
															
														?>
													</div>
													
												</div>

											</div>

										</div>
										
										<?php
										$iklandetail=mysqli_query($koneksi, "SELECT * FROM iklantengah where id_iklantengah='4'");
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
												<div class="fb-comments" data-href="<?php echo $iden[url].'/berita-'.$d[judul_seo].'.html'; ?>" data-width="855" data-numposts="5" data-colorscheme="light"></div> 
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
													echo "Ada $total_komentar Komentar untuk Berita Ini"; 
												?>
											</h2>
										</div>
										<div class="block-content">

											<div class="comment-block">
												
												<ol class="comments">
													<li>
														<?php
															$komentar = mysqli_query($koneksi, "SELECT * FROM komentar where id_berita='$d[id_berita]' AND aktif='Y' order by id_komentar");
															$no = 1;
															while ($kka = mysqli_fetch_array($komentar)){
																$tgl = tgl_indo($kka['tgl']);
																$isian=nl2br($kka['isi_komentar']); 
																$isikan=sensor($isian); 
																$komentarku = autolink($isikan);
																
																if(($no % 2)==0){ $warna="#ffffff;"; }else{ $warna="#e3e3e3"; }
																$test = md5(strtolower(trim($kka['email'])));	
																
																echo "<div style='background:$warna' class='commment-content'>
																		<div class='user-avatar'>
																			<a href='#' class='hover-effect'>";
																				if ($kka[email] == ''){
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
										
												<form action="include/simpankomentar.php" method="POST" onSubmit="return validasi(this)" id="form_komentar">
													<input type="hidden" name='id' value='<?php echo "$d[id_berita]"; ?>'>
													<p class="contact-form-user">
														<label for="c_name">Nickname<span class="required">*</label>
														<input type="text" placeholder="Nickname" id="nama" name='nama_komentar' class="required"/>
														
													</p>
													<p class="contact-form-email">
														<label for="c_email">E-mail<span class="required">*</span></label>
														<input type="text" name='email' placeholder="E-mail" id="email" class="required"/>
													</p>
													<p class="contact-form-webside">
														<label for="c_webside">Website</label>
														<input type="text" name='url' placeholder="Website" class="required"/>
													</p>
													<p class="contact-form-message">
														<label for="c_message">Comment<span class="required">*</span></label>
														<textarea name='isi_komentar' placeholder="Your message.." class="required"></textarea>
													</p>
													<p class="contact-form-message">
														<label for="c_message">
														<img src='include/captcha.php'><br></label>
														<input name='kode' maxlength=6 type="text" class="required" placeholder="Masukkkan kode di sebelah kiri..">
													</p>
													<p><input type="submit" name="Submit" class="styled-button" value="Post a Comment"/></p>
												</form>
												
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
<?php } ?>