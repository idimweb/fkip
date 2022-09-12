<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
  
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus poling
if ($module=='poling' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM poling WHERE id_poling='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input poling
elseif ($module=='poling' AND $act=='input'){
  mysqli_query($koneksi, "INSERT INTO poling(pilihan,
                                  status, 
							                    username,
                                  aktif) 
	                       VALUES('$_POST[pilihan]',
	                              '$_POST[status]',
							                  '$_SESSION[namauser]',
                                '$_POST[aktif]')");
  header('location:../../media.php?module='.$module);
}

// Update poling
elseif ($module=='poling' AND $act=='update'){
  mysqli_query($koneksi, "UPDATE poling SET pilihan = '$_POST[pilihan]',
                                 status  = '$_POST[status]',
                                 aktif   = '$_POST[aktif]'  
                          WHERE id_poling = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
