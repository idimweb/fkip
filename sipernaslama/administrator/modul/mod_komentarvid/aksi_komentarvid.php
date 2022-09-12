<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
	
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus komentar Video
if ($module=='komentarvid' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM komentarvid WHERE id_komentar='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Update komentar Video
elseif ($module=='komentarvid' AND $act=='update'){
  mysqli_query($koneksi, "UPDATE komentarvid SET nama_komentar = '$_POST[nama_komentar]',
                                   url           = '$_POST[url]', 
                                   isi_komentar  = '$_POST[isi_komentar]', 
                                   aktif         = '$_POST[aktif]' WHERE id_komentar   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
