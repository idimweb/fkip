<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{

include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];
$id=$_POST['id'];

// Hapus YM
if ($module=='ym' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM mod_ym WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input YM
elseif ($module=='ym' AND $act=='input'){
  mysqli_query($koneksi, "INSERT INTO mod_ym(nama,
  											 username,
  											 ym_icon) 
  									 VALUES('$_POST[nama]',
  									 		'$_POST[username]',
  									 		'$_POST[icon]')");
  header('location:../../media.php?module='.$module);
}

// Update YM
elseif ($module=='ym' AND $act=='update'){
  mysqli_query($koneksi, "UPDATE mod_ym SET nama='$_POST[nama]',
  											username='$_POST[username]',
  											ym_icon='$_POST[icon]' WHERE id = '$id'");
  header('location:../../media.php?module='.$module);
}
}
?>
