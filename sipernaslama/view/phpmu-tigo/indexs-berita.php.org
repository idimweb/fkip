

						<!-- BEGIN .main-page -->
						<div class="main-page full-width">

							<!-- BEGIN .content-block -->
							<div class="content-block main">
								
								<div class="block">
									<div class="block-title">
										<a href="index.html" class="right">Back to homepage</a>
										<h2><?php 
												echo "<form action='indeks-berita.html' method='POST'>";
												echo "Lihat Indeks Tangggal &nbsp; &nbsp; &nbsp;<select name='tanggal' class='select'>";
												
													for($n=1; $n<=31; $n++){
														$tgls = date("d");
														if ($_POST['tanggal']==$n){
															echo "<option value='$n' selected>$n</option>";
														}elseif ($tgls == $n){
															echo "<option value='$n' selected>$n</option>";
														}else{
															echo "<option value='$n'>$n</option>";
														}
													}
														echo "</select>
														<select name='bulan' class='select'> ";
														$bln = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
												if (isset($_POST['filter'])){	
													$b = $_POST['bulan'];
													echo "<option value='$_POST[bulan]' selected>$bln[$b]</option>";
												}												
													for($n=1; $n<=12; $n++){
														$blns = date('m');
														if ($blns == $n){
															echo "<option value='$n' selected>$bln[$n]</option>";
														}else{
															echo "<option value='$n'>$bln[$n]</option>";
														}
													}
														echo "</select>
														<select name='tahun' class='select'> ";
												if (isset($_POST['filter'])){	
													echo "<option value='$_POST[tahun]' selected>$_POST[tahun]</option>";
												}
													$year = date("Y");
													for($n=2008; $n<=$year; $n++){ 
														if ($year == $n){
															echo "<option value='$n' selected>$n</option>";
														}else{
															echo "<option value='$n'>$n</option>";
														}
													} 											
														echo "</select>
														<input style='padding:0px 6px 0px 6px;' type='submit' name='filter' value='Lihat Indeks'>";
											  echo "</form>";
											?>
										</h2>
									</div>
									<div style='width:97%' class="block-content archive">

									<?php  
									$warna = array("red","blue","red","purple","orange","black","yellow","red","blue","green");
											$col = 5;
											$terkini=mysqli_query($koneksi, "SELECT * FROM kategori");
											$ada = mysqli_num_rows($terkini);
										if ($ada > 0) {
												  echo "<table><tr>";
												  $cnt = 0;
												
											while ($t=mysqli_fetch_array($terkini)){
												if (isset($_POST['filter'])){
													$bulan = strlen($_POST['bulan']);
													$tanggal = strlen($_POST['tanggal']);
																	
													if ($bulan <= 1){
														$bulann = '0'.$_POST['bulan'];
													}else{
														$bulann = $_POST['bulan'];
													}
																	
													if ($tanggal <= 1){
														$tanggall = '0'.$_POST['tanggal'];
													}else{
														$tanggall = $_POST['tanggal'];
													}
													$fil = $_POST['tahun'].'-'.$bulann.'-'.$tanggall;
													$jumlah = mysqli_query($koneksi, "SELECT * FROM berita where id_kategori='$t[id_kategori]' AND tanggal='".anti_injection($fil)."' AND status='Y'");
													$total = mysqli_num_rows($jumlah);
												}else{
													$indexsekarang = date("Y-m-d");
													$jumlah = mysqli_query($koneksi, "SELECT * FROM berita where id_kategori='$t[id_kategori]' AND tanggal='$indexsekarang' AND status='Y'");
													$total = mysqli_num_rows($jumlah);
												}
												if ($total >= 1){	
													
													if ($cnt >= $col) {
													  echo "</tr><tr>";
													  $cnt = 0;
													}
													$cnt++;

												echo "<td style='padding:5px; width:230px'> <div class='block'>
																<h2 style='color:$warna[$cnt]' class='list-title'>$t[nama_kategori]</h2>
																
																<ul class='article-list'>";
																if (isset($_POST['filter'])){
																	$bulan = strlen($_POST['bulan']);
																	$tanggal = strlen($_POST['tanggal']);
																	
																	if ($bulan <= 1){
																		$bulann = '0'.$_POST['bulan'];
																	}else{
																		$bulann = $_POST['bulan'];
																	}
																	
																	if ($tanggal <= 1){
																		$tanggall = '0'.$_POST['tanggal'];
																	}else{
																		$tanggall = $_POST['tanggal'];
																	}
																	$fil = $_POST['tahun'].'-'.$bulann.'-'.$tanggall;
																	$sql=mysqli_query($koneksi, "SELECT * FROM berita where  AND status='Y' AND id_kategori='".anti_injection($t['id_kategori'])."' AND tanggal='".anti_injection($fil)."' order by id_berita DESC LIMIT 5");
																	while ($r=mysqli_fetch_array($sql)){
																		$tgll = tgl_indo($r['tanggal']);
																		$tglpake = substr($tgll,0,6); 
																		$judul = substr($r['judul'],0,40); 
																		$komen1 = "SELECT * FROM komentar WHERE id_berita = '".anti_injection($r['id_berita'])."'";
																		$komentar1 = mysqli_query($koneksi, $komen1);
																		$total_komentar1 = mysqli_num_rows($komentar1);
																		echo "<li><a title='$r[judul]' href='berita-$r[judul_seo].html'>$judul,..</a><a href='berita-$r[judul_seo].html' class='h-comment'>$total_komentar1</a><span class='meta-date'>$tglpake</span></li>";
																	}
																}else{
																	$now = date("Y-m-d");
																	$sql=mysqli_query($koneksi, "SELECT * FROM berita where berita.status='Y' AND id_kategori='".anti_injection($t['id_kategori'])."' order by id_berita DESC LIMIT 5");
																	while ($r=mysqli_fetch_array($sql)){
																		$tgll = tgl_indo($r['tanggal']);
																		$tglpake = substr($tgll,0,6); 
																		$judul = substr($r['judul'],0,40); 
																		$komen1 = "SELECT * FROM komentar WHERE id_berita = '".anti_injection($r['id_berita'])."'";
																		$komentar1 = mysqli_query($koneksi, $komen1);
																		$total_komentar1 = mysqli_num_rows($komentar1);
																		echo "<li><a title='$r[judul]' href='berita-$r[judul_seo].html'>$judul,..</a><a href='berita-$r[judul_seo].html' class='h-comment'>$total_komentar1</a><span class='meta-date'>$tglpake</span></li>";
																	}
																}
																
																echo "</ul>
																<a href='kategori-$t[id_kategori]-$t[kategori_seo].html' class='more'>Read More</a>
															</div>
													</td>";
												}else{

												}
											}
												  echo "</tr></table>";
												  
										}
									?>
									</div>
								</div>

							<!-- END .content-block -->
							</div>

						<!-- END .main-page -->
						</div>


