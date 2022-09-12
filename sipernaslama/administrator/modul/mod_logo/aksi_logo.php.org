<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
  
  include "../../../config/koneksi.php";
  include "../../../config/fungsi_thumb.php";

  $module=$_GET['module'];
  $act=$_GET['act'];

  // Update Logo
  if ($module=='logo' AND $act=='update'){
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file   = $_FILES['fupload']['name'];

    UploadLogo($nama_file);
    mysqli_query($koneksi, "UPDATE logo SET gambar = '$nama_file' WHERE id_logo = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
  }
}
?>
