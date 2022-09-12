<?php
  session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
  
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Input templates
if ($module=='templates' AND $act=='input'){
  mysqli_query($koneksi, "INSERT INTO templates(judul,
                                                username,
                                                pembuat,
                                                folder) 
                                        VALUES('$_POST[judul]', 
                                               '$_SESSION[namauser]',
                                               '$_POST[pembuat]',
                                               '$_POST[folder]')");
  header('location:../../media.php?module='.$module);
}

// Update templates
elseif ($module=='templates' AND $act=='update'){
  mysqli_query($koneksi, "UPDATE templates SET judul  = '$_POST[judul]',
                                    pembuat= '$_POST[pembuat]',
                                    folder = '$_POST[folder]'
                              WHERE id_templates = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}

// Aktifkan templates
elseif ($module=='templates' AND $act=='aktifkan'){
  $query1=mysqli_query($koneksi, "UPDATE templates SET aktif='Y' WHERE id_templates='$_GET[id]'");
  $query2=mysqli_query($koneksi, "UPDATE templates SET aktif='N' WHERE id_templates!='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
