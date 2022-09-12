<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_ym/aksi_ym.php";
switch($_GET['act']){

  default:
  echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Yahoo Messenger</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=ym&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th width='20px'>No</th>
                      	<th>Nama</th>
                      	<th>Username</th>
                      	<th>YM Icon</th>
                      	<th width='50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>";	 
	 	 		  
                    if ($_SESSION['leveluser']=='admin'){
                      $tampil = mysqli_query($koneksi, "SELECT * FROM mod_ym ORDER BY id DESC");
                    }else{
                      $tampil = mysqli_query($koneksi, "SELECT * FROM mod_ym WHERE username='$_SESSION[namauser]' ORDER BY id DESC");
                    }	
                	
                    $no=1;
                    while ($r=mysqli_fetch_array($tampil)){
                     echo "<tr> 
                            <td><center>$no</center></td>
                            <td>$r[nama]</td>
                            <td>$r[username]</td>
                            <td>$r[ym_icon]</td>
                            <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=ym&act=edit&id=$r[id]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=ym&act=hapus&id=$r[id]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                            </td>
                          </tr>";		
                       $no++;
                    }
          echo "</tbody></table>";
    break;
  
  case "tambah":
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah YM Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=ym&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Nama Tampil</th>    <td><input type='text' class='form-control' name='nama' required></td></tr>
                    <tr><th width='120px' scope='row'>Username </th>    <td><input type='text' class='form-control' name='username' required></td></tr>
                    <tr><th width='120px' scope='row'>Icon </th>    <td><input type='text' class='form-control' name='icon' required></td></tr>
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
    $r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mod_ym WHERE id='$_GET[id]'"));
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit YM</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=ym&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type=hidden name=id value='$r[id]'>
                    <tr><th width='120px' scope='row'>Nama Tampil</th>    <td><input type='text' class='form-control' name='nama' value='$r[nama]' required></td></tr>
                    <tr><th width='120px' scope='row'>Username </th>    <td><input type='text' class='form-control' name='username' value='$r[username]' required></td></tr>
                    <tr><th width='120px' scope='row'>Icon </th>    <td><input type='text' class='form-control' name='icon' value='$r[ym_icon]' required></td></tr>
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
//kurawal akhir hak akses module
} else {
	echo akses_salah();
}
}
?>
