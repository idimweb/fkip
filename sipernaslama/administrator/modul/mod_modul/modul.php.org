<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_modul/aksi_modul.php";
switch($_GET['act']){
  // Tampil Modul
  default:
  echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Semua Modul</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=modul&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <div class='alert alert-info'>- Apabila PUBLISH = Y, maka Modul ditampilkan di halaman pengunjung. <br />
                  - Apabila AKTIF = Y, maka Modul ditampilkan di halaman administrator pada daftar menu yang berada di bagian kiri.</div>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>Urutan</th>
                        <th>Nama Modul</th>
                        <th>Link</th>
                        <th>Publish</th>
                        <th>Aktif</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>";
		  
                      if ($_SESSION['leveluser']=='admin'){
                        $tampil = mysqli_query($koneksi, "SELECT * FROM modul ORDER BY urutan DESC");
                      }else{
                        $tampil = mysqli_query($koneksi, "SELECT * FROM modul WHERE username='$_SESSION[namauser]' ORDER BY urutan DESC");
                      }
                    
                    while ($r=mysqli_fetch_array($tampil)){
                      $no=$r['urutan'];
                     echo "<tr>
                             <td width=70><center>$no</center></td>
                             <td>$r[nama_modul]</td>
                             <td><a href=$r[link]>$r[link]</a></td>
                             <td align=center>$r[publish]</td>
                             <td align=center>$r[aktif]</td>
                             <td>$r[status]</td>
                  	         <td><center>
                              <a class='btn btn-success btn-xs' title='Edit Data' href='?module=modul&act=edit&id=$r[id_modul]'><span class='glyphicon glyphicon-edit'></span></a>
                              <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=modul&act=hapus&id=$r[id_modul]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                            </center></td>
                          </tr>"; 
                    }
        echo "</tbody></table>";
  break;

  case "tambah":
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Modul Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=modul&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Nama Modul</th><td><input type='text' class='form-control' name='nama_modul' required></td></tr>
                    <tr><th scope='row'>Link</th>                   <td><input type='text' class='form-control' name='link'></td></tr>
                    <tr><th scope='row'>Publish</th>                <td><input type='radio' name='publish' value='Y' checked> Ya &nbsp; <input type='radio' name='publish' value='N'> Tidak</td></tr>
                    <tr><th scope='row'>Aktif</th>                  <td><input type='radio' name='aktif' value='Y' checked> Ya &nbsp; <input type='radio' name='aktif' value='N'> Tidak</td></tr>
                    <tr><th scope='row'>Status</th>           <td><input type='radio' name='status' value='admin' checked> Admin &nbsp; <input type='radio' name='status' value='user'> User</td></tr>
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
  $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM modul WHERE id_modul='$_GET[id]'"));
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Modul</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=modul&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type=hidden name=id value='$r[id_modul]'>
                    <tr><th width='120px' scope='row'>Nama Modul</th><td><input type='text' class='form-control' name='nama_modul' value='$r[nama_modul]' required></td></tr>
                    <tr><th scope='row'>Link</th>                   <td><input type='text' class='form-control' name='link' value='$r[link]'></td></tr>
                    <tr><th scope='row'>Publish</th>                <td>"; if ($r['publish']=='Y'){ echo "<input type='radio' name='publish' value='Y' checked> Ya &nbsp; <input type='radio' name='publish' value='N'> Tidak"; }else{ echo "<input type='radio' name='publish' value='Y'> Ya &nbsp; <input type='radio' name='publish' value='N' checked> Tidak"; } echo "</td></tr>
                    <tr><th scope='row'>Aktif</th>                  <td>"; if ($r['aktif']=='Y'){ echo "<input type='radio' name='aktif' value='Y' checked> Ya &nbsp; <input type='radio' name='aktif' value='N'> Tidak"; }else{ echo "<input type='radio' name='aktif' value='Y'> Ya &nbsp; <input type='radio' name='aktif' value='N' checked> Tidak"; } echo "</td></tr>
                    <tr><th scope='row'>Status</th>                 <td>"; if ($r['status']=='admin'){ echo "<input type='radio' name='status' value='admin' checked> Admin &nbsp; <input type='radio' name='status' value='user'> User"; }else{ echo "<input type='radio' name='status' value='admin'> Admin &nbsp; <input type='radio' name='status' value='user' checked> User"; } echo "</td></tr>
                    <tr><th scope='row'>Urutan</th>                 <td><input type='text' class='form-control' name='urutan' value='$r[urutan]'></td></tr>
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