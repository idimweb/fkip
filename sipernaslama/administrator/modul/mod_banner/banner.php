<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_banner/aksi_banner.php";
switch($_GET['act']){

  default:
   echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Iklan Banner</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=banner&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>      
                       <th style='width:20px'>No</th>
                       <th>Judul</th>
                       <th>URL</th>
                       <th>Tgl. Posting</th>
                       <th style='width:50px'>Action</th>
                      </tr>
                      </thead>
                       <tbody>";
      
                    if ($_SESSION['leveluser']=='admin'){
                      $tampil = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY id_banner DESC");
                    }else{
                      $tampil=mysqli_query($koneksi, "SELECT * FROM banner WHERE username='$_SESSION[namauser]' ORDER BY id_banner DESC");
                    }
                    
                    $no=1;
                    while ($r=mysqli_fetch_array($tampil)){
                    $tgl=tgl_indo($r['tgl_posting']);
                     echo "<tr>
                             <td>$no</td>
                             <td>$r[judul]</td>
                             <td><a href=$r[url] target=_blank>$r[url]</a></td>
                             <td>$tgl</td>
                             <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=banner&act=edit&id=$r[id_banner]'><span class='glyphicon glyphicon-edit'></span></a>
                                 <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=banner&act=hapus&id=$r[id_banner]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                             </td>
                           </tr>";
                      $no++;
                    }
                    echo "</body></table>";
    break;
  
  case "tambah":
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Iklan Banner</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=banner&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Judul Iklan</th><td><input type='text' class='form-control' name='judul' required></td></tr>
                    <tr><th scope='row'>URL Iklan</th><td><input type='text' class='form-control' name='url' required></td></tr>
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
  $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM banner WHERE id_banner='$_GET[id]'"));
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Iklan Banner</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=banner&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type=hidden name=id value=$r[id_banner]>
                    <tr><th width='120px' scope='row'>Judul Iklan</th><td><input type='text' class='form-control' name='judul' value='$r[judul]' required></td></tr>
                    <tr><th scope='row'>URL Iklan</th><td><input type='text' class='form-control' name='url' value='$r[url]' required></td></tr>
                    <tr><th scope='row'>Gambar</th>                   <td><input type=file  class='form-control' name='fupload'>";
                                                                    if ($r['gambar']!=''){ echo "Gambar Saat ini : <a target='_BLANK' href='../foto_banner/$r[gambar]'>$r[gambar]</a>"; } echo "</td></tr>
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
