<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus iklanatas
if ($module=='iklanatas' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM iklanatas WHERE id_iklanatas='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input iklanatas
elseif ($module=='iklanatas' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    Uploadiklanatas ($nama_file);
    mysqli_query($koneksi, "INSERT INTO iklanatas(judul,
    	                                  username,
                                        url,
                                        tgl_posting,
                                        gambar) 
                                VALUES('$_POST[judul]',
    							                     '$_SESSION[namauser]',
                                       '$_POST[url]',
                                       '$tgl_sekarang',
                                       '$nama_file')");
  }else{
    mysqli_query($koneksi, "INSERT INTO iklanatas(judul,
	                                     username,
                                       tgl_posting,
                                       url) 
                                VALUES('$_POST[judul]',
    							                     '$_SESSION[namauser]',
                                       '$tgl_sekarang',
                                       '$_POST[url]')");
  }
  header('location:../../media.php?module='.$module);
}

// Update iklanatas
elseif ($module=='iklanatas' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi, "UPDATE iklanatas SET judul = '$_POST[judul]',
                                   url = '$_POST[url]' WHERE id_iklanatas = '$_POST[id]'");
  }else{
	$data_gambar = mysqli_query($koneksi, "SELECT gambar FROM iklanatas WHERE id_iklanatas='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);
	@unlink('../../../foto_iklanatas/'.$r['gambar']);
	@unlink('../../../foto_iklanatas/'.'small_'.$r['gambar']);
	Uploadiklanatas ($nama_file);
    mysqli_query($koneksi, "UPDATE iklanatas SET judul = '$_POST[judul]',
                                   url       = '$_POST[url]',
                                   gambar    = '$nama_file' WHERE id_iklanatas = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
}
?>
