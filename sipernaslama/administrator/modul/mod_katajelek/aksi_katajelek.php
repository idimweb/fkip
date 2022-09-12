<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
	
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus Kata Jelek
if ($module=='katajelek' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM katajelek WHERE id_jelek='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input kata jelek
elseif ($module=='katajelek' AND $act=='input'){
  mysqli_query($koneksi, "INSERT INTO katajelek(kata,username,ganti) VALUES('$_POST[kata]','$_SESSION[namauser]','$_POST[ganti]')");
  header('location:../../media.php?module='.$module);
}

// Update kata jelek
elseif ($module=='katajelek' AND $act=='update'){
  mysqli_query($koneksi, "UPDATE katajelek SET kata = '$_POST[kata]', ganti='$_POST[ganti]' WHERE id_jelek = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
