<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
  
session_start();
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus modul
if ($module=='modul' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM modul WHERE id_modul='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input modul
elseif ($module=='modul' AND $act=='input'){
  // Cari angka urutan terakhir
  $u=mysqli_query($koneksi, "SELECT urutan FROM modul ORDER by urutan DESC");
  $d=mysqli_fetch_array($u);
  $urutan=$d['urutan']+1;
  
  // Input data modul
  mysqli_query($koneksi, "INSERT INTO modul(nama_modul,
                                username,
                                 link,
                                 publish,
                                 aktif,
                                 status,
                                 urutan) 
	                       VALUES('$_POST[nama_modul]',
						                    '$_SESSION[namauser]',
                                '$_POST[link]',
                                '$_POST[publish]',
                                '$_POST[aktif]',
                                '$_POST[status]',
                                '$urutan')");
  header('location:../../media.php?module='.$module);
}

// Update modul
elseif ($module=='modul' AND $act=='update'){
  mysqli_query($koneksi, "UPDATE modul SET nama_modul = '$_POST[nama_modul]',
                                link       = '$_POST[link]',
                                publish    = '$_POST[publish]',
                                aktif      = '$_POST[aktif]',
                                status     = '$_POST[status]',
                                urutan     = '$_POST[urutan]'  
                          WHERE id_modul   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
