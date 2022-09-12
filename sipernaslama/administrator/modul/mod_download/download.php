<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_download/aksi_download.php";
switch($_GET['act']){

  default:
  echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Semua File Download</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=download&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th width='20px'>No</th>
                      	<th>Judul</th>
                      	<th>Nama File</th>
                      	<th>Kategori</th>
                      	<th width='50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                    if ($_SESSION['leveluser']=='admin'){
                      $tampil = mysqli_query($koneksi, "SELECT * FROM download ORDER BY id_download DESC");
                    }else{
                      $tampil=mysqli_query($koneksi, "SELECT * FROM download WHERE username='$_SESSION[namauser]' ORDER BY id_download DESC");
                    }
                  
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                	  $tgl=tgl_indo($r['tgl_posting']);

                       echo "<tr> 
                              <td><center>$no</center></td>
                              <td>$r[judul]</td>
                              <td><a target='_BLANK' href='../include/downlot.php?file=$r[nama_file]'>$r[nama_file]</a></td>
                              <td>$r[nama_kategori_download]</td>
                              <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=download&act=edit&id=$r[id_download]'><span class='glyphicon glyphicon-edit'></span></a>
                                  <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=download&act=hapus&id=$r[id_download]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </td>
                            </tr>";
                        $no++;
                      }
             echo "</tbody></table> ";
  break; 

  case "tambah":
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah File Download Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=download&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='judul' required></td></tr>
                    <tr><th scope='row'>Cari File</th>                 <td><input type='file' class='form-control' name='fupload'></td></tr>
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
  $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM download WHERE id_download='$_GET[id]'"));
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit File Download</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=download&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type=hidden name=id value=$r[id_download]>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='judul' value='$r[judul]' required></td></tr>
                    <tr><th scope='row'>Ganti File</th>              <td><input type='file' class='form-control' name='fupload'>";
                                                                    if ($r['nama_file']!=''){ echo "File Saat ini : <a target='_BLANK' href='../downlot.php?file=$r[nama_file]'>$r[nama_file]</a>"; } echo "</td></tr>
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
