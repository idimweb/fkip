<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
  include "../../../config/koneksi.php";
  $module=$_GET['module'];
  $act=$_GET['act'];

  // Update cara pembelian
  if ($module=='alamat' AND $act=='update'){
    mysqli_query($koneksi, "UPDATE mod_alamat SET alamat = '$_POST[alamat]' WHERE id_alamat     = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
  }
    
}


