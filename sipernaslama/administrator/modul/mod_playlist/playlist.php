<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_playlist/aksi_playlist.php";
switch($_GET['act']){

  default:
  echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Semua Playlist</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=playlist&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                     <tr>		
                    	<th style='width:20px'>No</th>
                    	<th style='width:70px'>Gambar</th>
                    	<th>Judul Playlist</th>
                    	<th style='width:50px'>Action</th>
                     </tr>
                   </thead>
                   <tbody>";
	
                	   if ($_SESSION['leveluser']=='admin'){
                        $tampil = mysqli_query($koneksi, "SELECT * FROM playlist ORDER BY id_playlist DESC");
                	   }else{
                        $tampil=mysqli_query($koneksi, "SELECT * FROM playlist WHERE username='$_SESSION[namauser]' ORDER BY id_playlist  DESC");
                     }
                    $no=1;
                    while ($r=mysqli_fetch_array($tampil)){
                       echo "<tr>
                              <td>$no</td>
                              <td><center><img width=50 src='../img_playlist/kecil_$r[gbr_playlist]'></center></td>
                              <td>$r[jdl_playlist]</td>
                              <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=playlist&act=edit&id=$r[id_playlist]'><span class='glyphicon glyphicon-edit'></span></a>
                                  <a class='btn btn-danger btn-xs' title='Delete Data' href='?module=playlist&hapus=$r[id_playlist]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </td>
                            </tr>";	
                       $no++;
                     }

                    if (isset($_GET['hapus'])){
                      if ($_SESSION['level']=='admin'){
                        mysqli_query($koneksi, "DELETE FROM playlist where id_playlist='$_GET[hapus]'");
                      }else{
                        mysqli_query($koneksi, "DELETE FROM playlist where id_playlist='$_GET[hapus]' AND username='$_SESSION[namauser]'");
                      }
                       echo "<script>document.location='?module=playlist';</script>";
                    }
    echo "</body></table>";
  break;
  
  case "tambah":
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Playlist Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=playlist&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Judul Playlist</th><td><input type='text' class='form-control' name='jdl_playlist' required></td></tr>
                    <tr><th scope='row'>Gambar</th>                   <td><input type=file  class='form-control' name='fupload'></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
              </div>
            </div>
          </div>
          <div style='clear:both'></div>"; 
  break;
  
  case "edit":
    $r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM playlist WHERE id_playlist='$_GET[id]'"));
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Playlist</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=playlist&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type=hidden name=id value='$r[id_playlist]'>
                    <tr><th width='120px' scope='row'>Judul Playlist</th><td><input type='text' class='form-control' name='jdl_playlist' value='$r[jdl_playlist]' required></td></tr>
                    <tr><th scope='row'>Ganti Foto</th>                   <td><input type=file  class='form-control' name='fupload'>";
                                                                    if ($r['gbr_playlist']!=''){ echo "Gambar Saat ini : <a target='_BLANK' href='../img_playlist/$r[gbr_playlist]'>$r[gbr_playlist]</a>"; } echo "</td></tr>
                    <tr><th width='120px' scope='row'>Aktif</th>    <td>"; if ($r['aktif']=='Y'){ echo "<input type=radio name='aktif' value='Y' checked>Ya <input type=radio name='aktif' value='N'>Tidak"; }else{ echo "<input type=radio name='aktif' value='Y'>Ya <input type=radio name='aktif' value='N' checked>Tidak"; }  echo "</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
              </div>
            </div>
          </div>
          <div style='clear:both'></div>";
  break;
  }
  }else{
     echo akses_salah();
}
}
?>