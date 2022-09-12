<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

  $aksi="modul/mod_logo/aksi_logo.php";
  switch($_GET['act']){

  default:
   echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Logo Website</h3>
                </div>
                <div class='box-body'>
                  <table class='table table-bordered table-striped'>
                    <thead>
                      <tr>   
                        <th>Logo Terpasang</th>
                        <th width='30px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                  $no=1;
                  $tampil=mysqli_query($koneksi, "SELECT * FROM logo ORDER BY id_logo DESC");
                  while ($r=mysqli_fetch_array($tampil)){
                  echo "<tr> 
                          <td><img class='img-thumbnail' width='300' src='../logo/$r[gambar]'></td>
                          <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=logo&act=edit&id=$r[id_logo]'><span class='glyphicon glyphicon-edit'></span></a></td>
                        </tr>";
                  }
                  echo "</tbody></table>";
  break;
  

  case "edit":
  $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM logo WHERE id_logo='$_GET[id]'"));
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Logo</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=logo&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type=hidden name=id value=$r[id_logo]>
                    <tr><th width='120px' scope='row'>Ganti Logo</th>  <td><input type=file  class='form-control' name='fupload'>
                                                                       <img class='img-thumbnail' src='../logo/$r[gambar]' width='300'></td></tr>
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