<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

    $aksi="modul/mod_kategori/aksi_kategori.php";
    switch($_GET['act']){

      default:
      echo "<div class='col-xs-12'>  
                  <div class='box'>
                    <div class='box-header'>
                      <h3 class='box-title'>Semua Kategori</h3>
                      <a class='pull-right btn btn-primary btn-sm' href='?module=kategori&act=tambah'>Tambahkan Data</a>
                    </div>
                    <div class='box-body'>
                      <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                          <tr>
                           <th style='width:20px'>No</th>
                           <th>Nama Kategori</th>
                           <th>Link</th>
                      	   <th>Posisi</th>
                      	   <th>Aktif</th>
                           <th style='width:50px'>Action</th>
                          </tr>
                        </thead>
                        <tbody>";
                    if ($_SESSION['leveluser']=='admin'){
                      $tampil = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                    }else{
                      $tampil=mysqli_query($koneksi, "SELECT * FROM kategori WHERE username='$_SESSION[namauser]' ORDER BY id_kategori DESC");
                    }
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                     echo "<tr> 
                            <td>$no</td>
                            <td>$r[nama_kategori]</td>
                            <td>kategori-$r[id_kategori]-$r[kategori_seo].html</td>
                            <td><center>$r[sidebar]</center></td>
                            <td><center>$r[aktif]</center></td>
                            <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=kategori&act=edit&id=$r[id_kategori]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=kategori&act=hapus&id=$r[id_kategori]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                            </td>
                        </tr>";
                    $no++;
                    }
              echo "</tbody></table> ";
      break;    
      
      // Form Tambah Kategori
      case "tambah":
        echo "<div class='col-md-12'>
                  <div class='box box-info'>
                    <div class='box-header with-border'>
                      <h3 class='box-title'>Tambah Kategori Baru</h3>
                    </div>
                  <div class='box-body'>
                  <form class='form-horizontal' role='form' method=POST action='$aksi?module=kategori&act=input' enctype='multipart/form-data'>
                    <div class='col-md-12'>
                      <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr><th width='120px' scope='row'>Nama Kategori</th>    <td><input type='text' class='form-control' name='nama_kategori' required></td></tr>
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
      
      // Form Edit Kategori  
      case "edit":
      $r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$_GET[id]'"));
          echo "<div class='col-md-12'>
                  <div class='box box-info'>
                    <div class='box-header with-border'>
                      <h3 class='box-title'>Edit Kategori</h3>
                    </div>
                  <div class='box-body'>
                  <form class='form-horizontal' role='form' method=POST action='$aksi?module=kategori&act=update' enctype='multipart/form-data'>
                    <div class='col-md-12'>
                      <table class='table table-condensed table-bordered'>
                      <tbody>
                        <input type='hidden' value='$r[id_kategori]' name='id'>
                        <tr><th width='120px' scope='row'>Nama Kategori</th>    <td><input type='text' class='form-control' name='nama_kategori' value='$r[nama_kategori]' required></td></tr>
                        <tr><th width='120px' scope='row'>Posisi</th>    <td><input type='number' class='form-control' name='posisi' value='$r[sidebar]' required></td></tr>
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