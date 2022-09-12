<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{

include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus iklantengah
if ($module=='iklantengah' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM iklantengah WHERE id_iklantengah='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input iklantengah
elseif ($module=='iklantengah' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file   = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    Uploadiklantengah($nama_file_unik);
  mysqli_query($koneksi, "INSERT INTO iklantengah(judul,
                                      username,
                                      url,
                                      tgl_posting,
                                      gambar) 
                              VALUES('$_POST[judul]',
  							                     '$_SESSION[namauser]',
                                     '$_POST[url]',
                                     '$tgl_sekarang',
                                     '$nama_file_unik')");
  header('location:../../media.php?module='.$module);
  }else{
  mysqli_query($koneksi, "INSERT INTO iklantengah(judul,
                                  	  username,
                                      tgl_posting,
                                      url) 
                              VALUES('$_POST[judul]',
  							                     '$_SESSION[namauser]',
                                     '$tgl_sekarang',
                                     '$_POST[url]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update iklantengah
elseif ($module=='iklantengah' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 


  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
 mysqli_query($koneksi, "UPDATE iklantengah SET judul = '$_POST[judul]',
                                                url   = '$_POST[url]' WHERE id_iklantengah = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }else{
	$data_gambar = mysqli_query($koneksi, "SELECT gambar FROM iklantengah WHERE id_iklantengah='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../foto_iklantengah/'.$r['gambar']);
	@unlink('../../../foto_iklantengah/'.'small_'.$r['gambar']);
    Uploadiklantengah($nama_file_unik,'../../../foto_iklantengah/',300,120);
    mysqli_query($koneksi, "UPDATE iklantengah SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]',
                                   gambar    = '$nama_file_unik' WHERE id_iklantengah = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
}
}
?>
