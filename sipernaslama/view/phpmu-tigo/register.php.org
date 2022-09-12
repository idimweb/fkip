<script type="text/javascript">
	function validasireg(form){
		if (form.a.value == ""){ alert("Anda belum mengisikan Username"); form.a.focus(); return (false); }							
		if (form.b.value == ""){ alert("Anda belum mengisikan Password"); form.b.focus(); return (false); }									
		if (form.c.value == ""){ alert("Anda belum menuliskan Nama Lengkap"); form.c.focus(); return (false); }
		if (form.d.value == ""){ alert("Anda belum menuliskan Email"); form.d.focus(); return (false); }
		if (form.e.value == ""){ alert("Anda belum menuliskan No Telpon"); form.e.focus(); return (false); }																		
	  return (true);
	}
</script>	
<?php 
if (isset($_POST[daftar])){
  $username = anti_injection($_POST[a]);
  $password = anti_injection($_POST[b]);
  $namalengkap = anti_injection($_POST[c]);
  $email = anti_injection($_POST[d]);
  $notelp = anti_injection($_POST[e]);

  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $data=md5($password);
  $pass=hash("sha512",$data);
  
  // Apabila ada foto yang diupload
  if (!empty($lokasi_file)){
  	if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
      echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
          window.location=('register.html')</script>";
    }else{
	    UploadUser2($nama_file_unik);
	  	mysqli_query($koneksi, "INSERT INTO users(username,
	                                 password,
	                                 nama_lengkap,
	                                 email, 
	                                 no_telp,
									 foto,
									 level,
	                                 id_session) 
		                       VALUES('$username',
	                                '$pass',
	                                '$namalengkap',
	                                '$email',
	                                '$notelp',
									'$nama_file_unik',
									'kontributor',
	                                '$pass')");
	}
  }else{
  	mysqli_query($koneksi, "INSERT INTO users(username,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
                                 level,
                                 id_session) 
	                       VALUES('$username',
                                '$pass',
                                '$namalengkap',
                                '$email',
                                '$notelp',
								'kontributor',
                                '$pass')");
  }

  mysqli_query($koneksi, "INSERT INTO users_modul SET id_session='$pass',id_modul='18'");

  $_SESSION[namauser]     = $_POST[a];
  $_SESSION[namalengkap]  = $_POST[c];
  $_SESSION[email] 	  	  = $_POST[d];
  $_SESSION[passuser]     = $pass;
  $_SESSION[sessid]       = $pass;
  $_SESSION[leveluser]    = 'kontributor';

  echo "<script>document.location='administrator/media.php?module=home';</script>";
}
?>
						<div class="main-page left">
							<div class="single-block">
								<div class="content-block main left">
									
									<div class="block">
										<div class="block-title" style="background: #bf4b37;">
											<a href="index.php" class="right">Back to homepage</a>
											<h2>Pendaftaran untuk Kontributor Artikel</h2>
										</div>
										<div class="block-content">
											<div class="shortcode-content">
													<div class="column12">
														<div  id="writecomment">
														<form action="" method="POST" enctype='multipart/form-data' onSubmit="return validasireg(this)">
															<p class="contact-form-user">
																<label for="c_name">Username<span class="required">*</span></label>
																<input type="text" placeholder="Nickname" name='a' style='width:40%' id="c_name" />
															</p>
															<p class="contact-form-user">
																<label for="c_name">Password<span class="required">*</span></label>
																<input type="text" placeholder="Password" name='b' style='width:40%' id="c_name" />
															</p>
															<p class="contact-form-user">
																<label for="c_name">Nama Lengkap<span class="required">*</span></label>
																<input type="text" placeholder="Nama Lengkap" name='c' style='width:90%' id="c_name" />
															</p>
															<p class="contact-form-email">
																<label for="c_email">E-mail<span class="required">*</span></label>
																<input type="text" placeholder="E-mail" name='d' style='width:90%' id="c_email" />
															</p>
															<p class="contact-form-email">
																<label for="c_email">No Telpon<span class="required">*</span></label>
																<input type="text" placeholder="No Telpon" name='e' id="c_email" />
															</p>
															<p class="contact-form-email">
																<label for="c_email">Foto<span class="required">*</span></label>
																<input type="file" name='fupload' id="c_email" />
															</p>
															<p><br><input type="submit" class="styled-button" name='daftar' value="Daftar Sekarang!" /></p>
														</form>
														</div>
													</div>
												</div><br>
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
												</div>
											</div>

										</div>

									</div>
								</div>
							</div>
						</div>