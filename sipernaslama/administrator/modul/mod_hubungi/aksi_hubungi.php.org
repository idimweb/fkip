<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus hubungi
if ($module=='hubungi' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM hubungi WHERE id_hubungi='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
}
