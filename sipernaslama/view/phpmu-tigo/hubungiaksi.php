<div class='main-column-wrapper'>
  <div class='main-column-left'>
 
  <?php
  
  echo "
  <div class='blog-style-1'>
  <div class='post-title'>
  <b>Hubungi Kami</b>
  </div>";       
  
  $nama=anti_injection($_POST[nama]);
  $email=anti_injection($_POST[email]);
  $pesan=anti_injection($_POST[pesan]);
  
  $iden=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas"));
echo "<center style='margin-top:5%; margin-bottom:5%;'>";
if(empty($nama)) {
			echo 'Anda belum mengisikan Nama Anda<br/> ';
			$err = TRUE;
		}
		if(empty($email)) {
			echo 'Anda belum mengisikan Alamat Email<br/> ';
			$err = TRUE;
		}
		if(empty($pesan)) {
			echo 'Anda belum mengisikan Pesan anda pada form Pesan.<br/> ';
			$err = TRUE;
		}
echo "<center>";
		if($err) {
			echo'<a href="javascript:history.go(-1)"><b>Ulangi Lagi</b><br/>';
		} elseif(!$err) {
	$ip      = $_SERVER['REMOTE_ADDR'];
  mysqli_query($koneksi, "INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$nama',
                               '$email',
                               'Ip Pengirim : $ip',
                               '$pesan',
                               '$tgl_sekarang')");
				
  $kepada = "$iden[email]"; 
   $judul = "Ada Pesan di $iden[nama_website]";
   $header = "MIME-Version: 1.0" . "\r\n";
   $header .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
   $header .= 'From: '.$nama.' <'.$email.'>'. "\r\n";
   $pesan = "Baru saja ada yang kirim pesan di : $iden[url]\n"; 
   $pesan .= "Isi Pesan : $pesan"; 
   mail($kepada,$judul,$pesan,$header); 

     echo "<script>window.alert('Your message was sent successfully. Thanks.');
				window.location='hubungi-kami.html'</script>";
	
   echo "</div>
    </div>";  
}	
  ?>