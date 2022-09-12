<?php
session_start();
error_reporting(0);
include "../config/koneksi.php";
include "../config/library.php";

$nama_komentar = anti_injection($_POST['nama_komentar']);
$url = anti_injection($_POST['url']);
$email = anti_injection($_POST['email']);
$isi_komentar = anti_injection($_POST['isi_komentar']);
$kode=trim($_POST['kode']);
$zali=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM berita,komentar WHERE komentar.id_berita=berita.id_berita"));
  
if (empty($nama_komentar)){
  echo "Anda belum mengisikan NAMA<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif (empty($isi_komentar)){
  echo "Anda belum mengisikan KOMENTAR<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif (strlen($isi_komentar) > 1000) {
  echo "KOMENTAR Anda kepanjangan, dikurangin atau dibagi jadi beberapa bagian.<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif (empty($kode)){
  echo "Anda belum mengisikan Kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif($_POST['kode']!=$_SESSION['captcha_session']){
  echo "Kode Yang Anda Masukkan Belum Cocok<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
echo "<script>window.alert('Kode Yang Anda Masukkan Belum Cocok.');
				window.location='javascript:history.go(-1)'</script>";
}else{
// Mengatasi input komentar tanpa spasi
  $split_text = explode(" ",$isi_komentar);
  $split_count = count($split_text);
  $max = 57;

  for($i = 0; $i <= $split_count; $i++){
    if(strlen($split_text[$i]) >= $max){
      for($j = 0; $j <= strlen($split_text[$i]); $j++){
        $char[$j] = substr($split_text[$i],$j,1);
        if(($j % $max == 0) && ($j != 0)){
          $v_text .= $char[$j] . ' ';
        }else{
          $v_text .= $char[$j];
        }
      }
    }else{
      $v_text .= " " . $split_text[$i] . " ";
    }
  }

    $sql = mysqli_query($koneksi, "INSERT INTO komentar(nama_komentar,
                                                        url,
                                                        isi_komentar,
                                                        id_berita,
                                                        tgl,
                                                        jam_komentar,
                                                        email) 
                                                VALUES('$nama_komentar',
                                                       '$url',
                                                       '$v_text',
                                                       '$_POST[id]',
                                                       '$tgl_sekarang',
                                                       '$jam_sekarang',
                                                       '$email')");
						
$roww=mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita='$_POST[id]'");
$row = mysqli_fetch_array($roww);
    echo "<meta http-equiv='refresh' content='0; url=../berita-$row[judul_seo].html'>";
}
?>
