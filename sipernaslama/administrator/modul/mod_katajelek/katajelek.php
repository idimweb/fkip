<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_katajelek/aksi_katajelek.php";
switch($_GET['act']){

  // Tampil Kata Jelek
  default:
   echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Semua Kata Jelek</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=katajelek&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>	 
                        <th style='width:20px'>No</th>
                        <th>Kata Jelek</th>
                        <th>Ganti Jadi</th>
                        <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>";
    
                   if ($_SESSION['leveluser']=='admin'){
                      $tampil = mysqli_query($koneksi, "SELECT * FROM katajelek ORDER BY id_jelek DESC");
                	 }else{
                      $tampil=mysqli_query($koneksi, "SELECT * FROM katajelek WHERE username='$_SESSION[namauser]' ORDER BY id_jelek DESC");
                   }
	 
                    $no=1;
                    while ($r=mysqli_fetch_array($tampil)){
                    echo "<tr> 
                            <td>$no</td>
                            <td>$r[kata]</td>
                            <td>$r[ganti]</td>
                            <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=katajelek&act=edit&id=$r[id_jelek]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=katajelek&act=hapus&id=$r[id_jelek]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
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
                  <h3 class='box-title'>Tambah Kata Jelek Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=katajelek&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Kata Jelek</th>    <td><input type='text' class='form-control' name='kata' required></td></tr>
                    <tr><th width='120px' scope='row'>Ganti Jadi</th>    <td><input type='text' class='form-control' name='ganti' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
              </div>
            </div>
          </div>";  
   break;
  
  case "edit":
    $r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM katajelek WHERE id_jelek='$_GET[id]'"));
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Kata Jelek</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=katajelek&act=update' enctype='multipart/form-data'>
              <input type=hidden name=id value='$r[id_jelek]'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Kata Jelek</th>    <td><input type='text' class='form-control' name='kata' value='$r[kata]' required></td></tr>
                    <tr><th width='120px' scope='row'>Ganti Jadi</th>    <td><input type='text' class='form-control' name='ganti' value='$r[ganti]' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
              </div>
            </div>
          </div>";  
  break;
  }
  }else{
     echo akses_salah();
}
}
?>