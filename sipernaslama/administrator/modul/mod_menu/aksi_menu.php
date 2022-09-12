<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
  
include "../../../config/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];

  if ($module=='menu' AND $act=='hapus'){
    mysqli_query($koneksi, "DELETE FROM menu WHERE id='$_GET[id]'");
    header('location:../../media.php?module='.$module);
  }

  elseif ($module=='menu' AND $act=='input'){
    mysqli_query($koneksi, "INSERT INTO menu(id_parent,
                                  nama_menu,
                                  link,
								                 position,
								                 urutan)
                          VALUES('$_POST[id_parent]',
                                 '$_POST[nama_menu]',
                                 '$_POST[link]',
							                   '$_POST[position]',
							                   '$_POST[urutan]')");
    header('location:../../media.php?module='.$module);
  }

  elseif ($module=='menu' AND $act=='update'){
    mysqli_query($koneksi, "UPDATE menu SET id_parent  = '$_POST[id_parent]',
                                   nama_menu = '$_POST[nama_menu]',
                                   link  = '$_POST[link]',
                								   aktif = '$_POST[aktif]',
                								   position = '$_POST[position]',
                								   urutan = '$_POST[urutan]' WHERE id_menu = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
  }
}
?>