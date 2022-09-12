<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_sekilasinfo/aksi_sekilasinfo.php";
switch($_GET['act']){

  default:
  echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Sekilas Info</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=sekilasinfo&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>    
                      	<th width='20px'>No</th>
                      	<th>Info</th>
                      	<th>Posting</th>
                      	<th width='50px'>Action</th>
                      </tr>
          				  </thead>
          				  <tbody>";
          			    $tampil=mysqli_query($koneksi, "SELECT * FROM sekilasinfo ORDER BY id_sekilas DESC");
          			    $no=1;
          			    while ($r=mysqli_fetch_array($tampil)){
          			      $tgl=tgl_indo($r['tgl_posting']);
          			      echo "<tr><td>$no</td>
          			                <td>$r[info]</td>
          			                <td>$tgl</td>
          							<td><center>
          			                  <a class='btn btn-success btn-xs' title='Edit Data' href='?module=sekilasinfo&act=edit&id=$r[id_sekilas]'><span class='glyphicon glyphicon-edit'></span></a>
          			                  <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=sekilasinfo&act=hapus&id=$r[id_sekilas]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
          			                </center></td>
          						</tr>";
          			    	$no++;
              			}
              		echo "</tbody></table>";
    break;
  
  case "tambah":
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Sekilas Info</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=sekilasinfo&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Info</th>             <td><textarea class='form-control' name='info' style='height:260px' required></textarea></td></tr>
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
   $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM sekilasinfo WHERE id_sekilas='$_GET[id]'"));
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Sekilas Info</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=sekilasinfo&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type='hidden' name='id' value='$r[id_sekilas]'>
                    <tr><th width='120px' scope='row'>Info</th>             <td><textarea class='form-control' name='info' style='height:260px' required>$r[info]</textarea></td></tr>
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
