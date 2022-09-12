<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{

  include "../../../config/koneksi.php";
  include "../../../config/fungsi_thumb.php";

  $module=$_GET['module'];
  $act=$_GET['act'];

  // Update Background
  if ($module=='background' AND $act=='update'){
    mysqli_query($koneksi, "UPDATE background SET gambar = '$_POST[utama]'");
    header('location:../../media.php?module='.$module);
  }
}

