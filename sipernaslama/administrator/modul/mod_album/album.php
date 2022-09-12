<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_album/aksi_album.php";
switch($_GET['act']){
  default:
  echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Album Berita Foto</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=album&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>	
                       <th>Foto</th>
                       <th>Judul Berita Foto</th>
                       <th>Link</th>
                       <th>Aktif</th>
                       <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                    if ($_SESSION['leveluser']=='admin'){
                      $tampil = mysqli_query($koneksi, "SELECT * FROM album ORDER BY id_album DESC");
                    }else{
                      $tampil=mysqli_query($koneksi, "SELECT * FROM album WHERE username='$_SESSION[namauser]' ORDER BY id_album DESC");
                    }
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr> 
                           <td><center><img src='../img_album/kecil_$r[gbr_album]' width=50></center></td>
                           <td>$r[jdl_album]</td>
                           <td>album-$r[id_album]-$r[album_seo].html</td>
                           <td><center>$r[aktif]</center></td>
                           <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=album&act=edit&id=$r[id_album]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='?module=album&hapus=$r[id_album]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                           </td>
                          </tr>";  
                    }

                    if (isset($_GET['hapus'])){
                      if ($_SESSION['leveluser']=='admin'){
                        mysqli_query($koneksi, "DELETE FROM album where id_album='$_GET[hapus]'");
                      }else{
                        mysqli_query($koneksi, "DELETE FROM album where id_album='$_GET[hapus]' AND username='$_SESSION[namauser]'");
                      }
                       echo "<script>document.location='?module=album';</script>";
                    }
                echo "</tbody></table>";
  break;    
 
  case "tambah":
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Album Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=album&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Judul Album</th><td><input type='text' class='form-control' name='jdl_album' required></td></tr>
                    <tr><th scope='row'>Keterangan</th>               <td><textarea id='editor1' class='form-control' name='keterangan' style='height:260px'></textarea></td></tr>
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
    $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM album WHERE id_album='$_GET[id]' AND username='$_SESSION[namauser]'"));
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Album</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=album&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type=hidden name=id value='$r[id_album]'>
                    <tr><th width='120px' scope='row'>Judul Album</th><td><input type='text' class='form-control' name='jdl_album' value='$r[jdl_album]' required></td></tr>
                    <tr><th scope='row'>Keterangan</th>               <td><textarea id='editor1' class='form-control' name='keterangan' style='height:260px'>$r[keterangan]</textarea></td></tr>
                    <tr><th scope='row'>Ganti Foto</th>                   <td><input type=file  class='form-control' name='fupload'>";
                                                                    if ($r['gbr_album']!=''){ echo "Gambar Saat ini : <a target='_BLANK' href='../img_album/$r[gbr_album]'>$r[gbr_album]</a>"; } echo "</td></tr>
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

