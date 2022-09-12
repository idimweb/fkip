<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
  
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Tag
if ($module=='tag' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM tag WHERE id_tag='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input tag
elseif ($module=='tag' AND $act=='input'){
  $tag_seo = seo_title($_POST['nama_tag']);
  mysqli_query($koneksi, "INSERT INTO tag(nama_tag,
                                      username,
                                      tag_seo) 
                               VALUES('$_POST[nama_tag]',
                                      '$_SESSION[namauser]',
                                      '$tag_seo')");
  header('location:../../media.php?module='.$module);
}

// Update tag
elseif ($module=='tag' AND $act=='update'){
  $tag_seo = seo_title($_POST['nama_tag']);
  mysqli_query($koneksi, "UPDATE tag SET nama_tag = '$_POST[nama_tag]', 
                                         tag_seo='$tag_seo' WHERE id_tag = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
