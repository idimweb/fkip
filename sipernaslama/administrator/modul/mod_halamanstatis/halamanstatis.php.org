<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){
  $aksi="modul/mod_halamanstatis/aksi_halamanstatis.php";

  switch($_GET['act']){
  default:

echo "<div class='col-xs-12'>  
        <div class='box'>
          <div class='box-header'>
            <h3 class='box-title'>Halaman Baru</h3>
            <a class='pull-right btn btn-primary btn-sm' href='?module=halamanstatis&act=tambah'>Tambahkan Data</a>
          </div>
          <div class='box-body'>
            <table id='example1' class='table table-bordered table-striped'>
              <thead>
                <tr>
                  <th style='width:20px'>No</th>
                  <th>Judul</th>
                  <th>Link</th>
                  <th>Tgl Posting</th>
                  <th style='width:70px'>Action</th>
                </tr>
              </thead>
              <tbody>";
              $no = 1;
              if ($_SESSION['leveluser']=='admin'){
                $tampil = mysqli_query($koneksi, "SELECT * FROM halamanstatis ORDER BY id_halaman DESC");
              }else{
                $tampil=mysqli_query($koneksi, "SELECT * FROM halamanstatis WHERE username='$_SESSION[namauser]' ORDER BY id_halaman DESC");
              }
              while($row=mysqli_fetch_array($tampil)){
              $tgl_posting=tgl_indo($row['tgl_posting']);
              echo "<tr><td>$no</td>
                        <td>$row[judul]</td>
                        <td><a target='_BLANK' href='../hal-$row[judul_seo].html'>hal-$row[judul_seo].html</a></td>
                        <td>$tgl_posting</td>
                        <td><center>
                          <a class='btn btn-success btn-xs' title='Edit Data' href='?module=halamanstatis&act=edit&id=$row[id_halaman]'><span class='glyphicon glyphicon-edit'></span></a>
                          <a class='btn btn-danger btn-xs' title='Delete Data' href='?module=halamanstatis&hapus=$row[id_halaman]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                        </center></td>
                    </tr>";
                $no++;
                if (isset($_GET['hapus'])){
                  if ($_SESSION['leveluser']=='admin'){
                    mysqli_query($koneksi, "DELETE FROM halamanstatis where id_halaman='$_GET[hapus]'");
                  }else{
                    mysqli_query($koneksi, "DELETE FROM halamanstatis where id_halaman='$_GET[hapus]' AND username='$_SESSION[namauser]'");
                  }
                   echo "<script>document.location='?module=halamanstatis';</script>";
                }
              }

            echo "</tbody>
          </table>
        </div>
      </div>
    </div>";
  break;    
	  
  case "tambah":
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Halaman Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Judul</th>   <td><input type='text' class='form-control' name='judul'></td></tr>
                    <tr><th scope='row'>Isi Halaman</th>                 <td><textarea id='editor1' class='form-control' name='isi_halaman'></textarea></td></tr>
                    <tr><th scope='row'>Gambar</th>                    <td><input type='file' class='form-control' name='fupload'></td></tr>
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
   $r = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]'"));
   echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Halaman</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=halamanstatis&act=update' enctype='multipart/form-data'>
                <input type=hidden name=id value=$r[id_halaman]>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Judul</th>   <td><input type='text' class='form-control' name='judul' value='$r[judul]'></td></tr>
                    <tr><th scope='row'>Isi Halaman</th>                 <td><textarea id='editor1' class='form-control' name='isi_halaman'>$r[isi_halaman]</textarea></td></tr>
                    <tr><th scope='row'>Ganti Gambar</th>                    <td><input type='file' class='form-control' name='fupload'>";
                                        if ($r['gambar']!=''){ echo "Lihat Gambar Saat ini : <a target='_BLANK' href='../foto_statis/$r[gambar]'>$r[gambar]</a>"; } echo "</td></tr>
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
   }
}