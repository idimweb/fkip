<?php
error_reporting(0);
session_start();
include "../config/koneksi.php";
include "../config/library.php";

$nama_komentar = antiinjection($_POST['nama_komentar']);
$isi_komentar = antiinjection($_POST['isi_komentar']);
$url = antiinjection($_POST['url']);
$kode=trim($_POST['kode']);

if (empty($_POST['nama_komentar'])){
  echo "Anda belum mengisikan NAMA<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif (empty($_POST['isi_komentar'])){
  echo "Anda belum mengisikan KOMENTAR<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}elseif (strlen($_POST['isi_komentar']) > 1000) {
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

  $sql = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO komentarvid(nama_komentar,
                                              url,
                                              isi_komentar,
                                              id_video,
                                              tgl,
                                              jam_komentar) 
                                      VALUES('$nama_komentar',
                                             '$url',
                                             '$v_text',
                                             '$_POST[id]',
                                             '$tgl_sekarang',
                                             '$jam_sekarang')");
$roww=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM video WHERE id_video='$_POST[id]'");
$row = mysqli_fetch_array($roww);
    echo "<meta http-equiv='refresh' content='0; url=play-$_POST[id]-$row[video_seo].html'>";
}
?>
