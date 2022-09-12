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

// Hapus video
if ($module=='video' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM video WHERE id_video='$_GET[id]'"); 
  header('location:../../media.php?module='.$module);
}

// Input video
elseif ($module=='video' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $lokasi_file2    = $_FILES['fupload2']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $nama_file2     = $_FILES['fupload2']['name'];
  $acak           = rand(000000,999999);
  
  $nama_file_unik 	= $acak.$nama_file; 
  $nama_file_unik2	= $acak.$nama_file2;
  
  if (!empty($_POST['tag_seo'])){
    $tag_seo = $_POST['tag_seo'];
    $tagvid=implode(',',$tag_seo);
  }
  $video_seo      = seo_title($_POST['jdl_video']);

  // Apabila ada gambar yang diupload
  if (!empty($nama_file)){
    UploadVideo($nama_file_unik);
  	if(!empty($nama_file2)){
  		UploadVideo2($nama_file_unik2);
      mysqli_query($koneksi, "INSERT INTO video(jdl_video,
                                      video_seo,
                                      id_playlist,
                    									username,
                    									jam,
                                      tanggal,
                                      hari,
  									                  tagvid,
                                      keterangan,
  									                  youtube,
                                      gbr_video,
  									                  video) 
                              VALUES('$_POST[jdl_video]',
                                     '$video_seo',
                                     '$_POST[playlist]',
                  								   '$_SESSION[namauser]',
                  								   '$jam_sekarang',
                                     '$tgl_sekarang',
                                     '$hari_ini',
  								                   '$tagvid',
                                     '$_POST[keterangan]',
  								                   '$_POST[youtube]',
                                     '$nama_file_unik',
  								                   '$nama_file_unik2')");
  	}elseif(empty($nama_file2)){
  		mysqli_query($koneksi, "INSERT INTO video(jdl_video,
                                      video_seo,
                                      id_playlist,
  									                  username,
  									                  jam,
                                      tanggal,
                                      hari,
  									                  tagvid,
                                      keterangan,
  									                  youtube,
                                      gbr_video) 
                              VALUES('$_POST[jdl_video]',
                                     '$video_seo',
                                     '$_POST[playlist]',
                  								   '$_SESSION[namauser]',
                  								   '$jam_sekarang',
                                     '$tgl_sekarang',
                                     '$hari_ini',
  								                   '$tagvid',
                                     '$_POST[keterangan]',
  								                   '$_POST[youtube]',
                                     '$nama_file_unik')");
	 }
	}else{
	  if(!empty($nama_file2)){
			UploadVideo2($nama_file_unik2);
      mysqli_query($koneksi, "INSERT INTO video(jdl_video,
                                    video_seo,
                                    id_playlist,
									                  username,
									                  jam,
                                    tanggal,
                                    hari,
									                  tagvid,
                                    keterangan,
                  									youtube,
                  									video) 
                            VALUES('$_POST[jdl_video]',
                                   '$video_seo',
                                   '$_POST[playlist]',
                								   'rere2',
                								   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini',
								                   '$tagvid',
                                   '$_POST[keterangan]',
                								   '$_POST[youtube]',
                								   '$nama_file_unik2')");
	  }elseif(empty($nama_file2)){
      mysqli_query($koneksi, "INSERT INTO video(jdl_video,
                                    video_seo,
                                    id_playlist,
									                  username,
									                  jam,
                                    tanggal,
                                    hari,
                  									tagvid,
                  									youtube,
                                    keterangan) 
                            VALUES('$_POST[jdl_video]',
                                   '$video_seo',
                                   '$_POST[playlist]',
                								   'rere3',
                								   '$jam_sekarang',
                                   '$tgl_sekarang',
                                   '$hari_ini',
                								   '$tagvid',
                								   '$_POST[youtube]',
                                   '$_POST[keterangan]')");
	  }
  }
  $jml=count($tag_seo);
  for($i=0;$i<$jml;$i++){
    mysqli_query($koneksi, "UPDATE tagvid SET count=count+1 WHERE tag_seo='$tag_seo[$i]'");
  }
  header('location:../../media.php?module='.$module);
}

// Update video
elseif ($module=='video' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $lokasi_file2    = $_FILES['fupload2']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $nama_file2     = $_FILES['fupload2']['name'];
  $acak           = rand(000000,999999);
 
  $nama_file_unik 	= $acak.$nama_file; 
  $nama_file_unik2	= $acak.$nama_file2;
  if (!empty($_POST['tag_seo'])){
    $tag_seo = $_POST['tag_seo'];
    $tagvid=implode(',',$tag_seo);
  }
  
  $video_seo      = seo_title($_POST['jdl_video']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
  if(!empty($lokasi_file2)){
    UploadVideo2($nama_file_unik2);
    $data_video = mysqli_query($koneksi, "SELECT video FROM video WHERE id_video='$_POST[id]'");
  	$d   	= mysqli_fetch_array($data_video);	
  	@unlink('../../../img_video/'.$d['video']);
    mysqli_query($koneksi, "UPDATE video SET jdl_video  = '$_POST[jdl_video]',
                                   video_seo   = '$video_seo', 
                                   id_playlist = '$_POST[playlist]',
                                   keterangan  = '$_POST[keterangan]',
                								   youtube		= '$_POST[youtube]',
                								   tagvid         = '$tagvid',
                								   video		= '$nama_file_unik2' WHERE id_video   = '$_POST[id]'");
	  }elseif(empty($lokasi_file2)){
		mysqli_query($koneksi, "UPDATE video SET jdl_video  = '$_POST[jdl_video]',
                                   video_seo   = '$video_seo', 
                                   id_playlist = '$_POST[playlist]',
                								   tagvid         = '$tagvid',
                								   youtube		= '$_POST[youtube]',
                                   keterangan  = '$_POST[keterangan]' WHERE id_video   = '$_POST[id]'");
	  }
  }else{

  UploadVideo($nama_file_unik);
	if(!empty($lokasi_file2)){
	UploadVideo2($nama_file_unik2);
  mysqli_query($koneksi, "UPDATE video SET jdl_video  = '$_POST[jdl_video]',
                                 video_seo   = '$video_seo', 
                                 id_playlist = '$_POST[playlist]',
                                 keterangan  = '$_POST[keterangan]',
              								   tagvid         = '$tagvid',
              								   youtube		= '$_POST[youtube]',  
                                 gbr_video      = '$nama_file_unik',
								                 video		= '$nama_file_unik2' WHERE id_video   = '$_POST[id]'");
	}elseif(empty($lokasi_file2)){
  $data_gambar = mysqli_query($koneksi, "SELECT gbr_video FROM video WHERE id_video='$_POST[id]'");
	$r    	= mysqli_fetch_array($data_gambar);	
	@unlink('../../../img_video/'.'kecil_'.$r['gbr_video']);
	@unlink('../../../img_video/'.$r['gbr_video']);

	
	
	mysqli_query($koneksi, "UPDATE video SET jdl_video  = '$_POST[jdl_video]',
                                 video_seo   = '$video_seo', 
                                 id_playlist = '$_POST[playlist]',
              								   tagvid         = '$tagvid',
              								   youtube		= '$_POST[youtube]',
                                 keterangan  = '$_POST[keterangan]',  
                                 gbr_video      = '$nama_file_unik' WHERE id_video   = '$_POST[id]'");
	}
  }
  header('location:../../media.php?module='.$module);
}
}
?>