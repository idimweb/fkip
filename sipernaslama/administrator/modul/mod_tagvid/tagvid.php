<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

  $aksi="modul/mod_tagvid/aksi_tagvid.php";
  switch($_GET['act']){

  // Tampil tag
  default:
echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Semua Tag Video</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=tagvid&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                       <th style='width:20px'>No</th>
                       <th>Nama Tag</th>
                       <th>Link</th>
                       <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>";
                  if ($_SESSION['leveluser']=='admin'){
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tagvid ORDER BY id_tag DESC");
                  }else{
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tagvid WHERE username='$_SESSION[namauser]' ORDER BY id_tag DESC");
                  }

                  $no = 1;
                  while($r=mysqli_fetch_array($tampil)){
                     echo "<tr> 
                            <td><center>$no</center></td>
                            <td>$r[nama_tag]</td>
                            <td>tag-$r[tag_seo].html</td>
                            <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=tagvid&act=edit&id=$r[id_tag]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=tagvid&act=hapus&id=$r[id_tag]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
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
                  <h3 class='box-title'>Tambah Tag Video Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=tagvid&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Nama Tag</th>    <td><input type='text' class='form-control' name='nama_tag' required></td></tr>
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
  
  // Form Edit tag  
  case "edit":
    $r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tagvid WHERE id_tag='$_GET[id]'"));
 echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Tag Video</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=tagvid&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' value='$r[id_tag]' name='id'>
                    <tr><th width='120px' scope='row'>Nama Tag</th>    <td><input type='text' class='form-control' name='nama_tag' value='$r[nama_tag]' required></td></tr>
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