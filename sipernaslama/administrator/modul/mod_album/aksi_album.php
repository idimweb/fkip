<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus album
if ($module=='album' AND $act=='hapus'){
  $data=mysqli_fetch_array(mysqli_query($koneksi, "SELECT gambar FROM album WHERE id_album='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysqli_query($koneksi, "DELETE FROM album WHERE id_album='$_GET[id]'");
     unlink("../../../img_album/$data[gambar]");   
     unlink("../../../img_album/kecil_$data[gambar]");   
  }else{
     mysqli_query($koneksi, "DELETE FROM album WHERE id_album='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
  mysqli_query($koneksi, "DELETE FROM album WHERE id_album='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input album
elseif ($module=='album' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

 $album_seo = seo_title($_POST['jdl_album']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
	UploadAlbum($nama_file_unik,'../../../img_album/',300,120);
   mysqli_query($koneksi, "INSERT INTO album(jdl_album,
                                             album_seo,
									                           keterangan,
                        										 username,
                        										 tgl_posting,
                        										 jam,
                        										 hari,
                                             gbr_album) 
                                    VALUES('$_POST[jdl_album]',
                                           '$album_seo',
                    								       '$_POST[keterangan]',
                    									     '$_SESSION[namauser]',
                    										   '$tgl_sekarang',
                    											 '$jam_sekarang',
                    											 '$hari_ini',
                                           '$nama_file_unik')");
  header('location:../../media.php?module='.$module);
  }else{
     mysqli_query($koneksi, "INSERT INTO album(jdl_album,
                                    album_seo,
            									      username,
            										    tgl_posting,
            											  jam,
            											  hari,
									                  keterangan) 
                            VALUES('$_POST[jdl_album]',
                                   '$album_seo',
              								     '$_SESSION[namauser]',
              									   '$tgl_sekarang',
              									   '$jam_sekarang',
              										 '$hari_ini',
              								     '$_POST[keterangan]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update album
elseif ($module=='album' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $album_seo = seo_title($_POST['jdl_album']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysqli_query($koneksi, "UPDATE album SET jdl_album     = '$_POST[jdl_album]',
                                  album_seo     = '$album_seo', 
								                  keterangan    = '$_POST[keterangan]',
                                  aktif         ='$_POST[aktif]' WHERE id_album = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }else{    
	$data_gbr_album= mysqli_query($koneksi, "SELECT gbr_album FROM album WHERE id_album='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gbr_album);
	@unlink('../../../img_album/'.$r['gbr_album']);
	@unlink('../../../img_album/'.'kecil_'.$r['gbr_album']);
  UploadAlbum($nama_file_unik,'../../../img_album/',300,120);
	
	 mysqli_query($koneksi, "UPDATE album SET jdl_album  = '$_POST[jdl_album]',
                                   album_seo = '$album_seo',
								                   keterangan  = '$_POST[keterangan]',  
                                   gbr_album    = '$nama_file_unik', 
                                   aktif='$_POST[aktif]'    
                             WHERE id_album = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
	}
    
  }

}

