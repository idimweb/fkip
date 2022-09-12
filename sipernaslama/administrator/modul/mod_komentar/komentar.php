<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_komentar/aksi_komentar.php";
switch($_GET['act']){

  // Tampil Komentar
  default:
   echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Semua Komentar Berita</h3>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama</th>
                        <th>Komentar</th>
                        <th>Aktif</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>";
                    $tampil=mysqli_query($koneksi, "SELECT * FROM berita,komentar WHERE komentar.id_berita=berita.id_berita ORDER BY id_komentar DESC");
                    $no = 1;
                    while ($r=mysqli_fetch_array($tampil)){
                      $isi_komentar =(strip_tags($r['isi_komentar'])); 
                      $isi = substr($isi_komentar,0,90); 
                      $isi = substr($isi_komentar,0,strrpos($isi," ")); 

                      echo "<tr> 
                              <td>$no</td>
                              <td><a href='../berita-$r[judul_seo].html#$r[id_komentar]' target='blank'>$r[nama_komentar]</a></td>
                              <td>$isi,..</td>
                              <td><center>$r[aktif]</center></td>
                              <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=komentar&act=edit&id=$r[id_komentar]'><span class='glyphicon glyphicon-edit'></span></a>
                                  <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=komentar&act=hapus&id=$r[id_komentar]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </td>
                            </tr>";
                      $no++;
                    }
                  echo "</tbody></table>";
    break;
  
  case "edit":
  $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM komentar WHERE id_komentar='$_GET[id]'"));
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Komentar</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=komentar&act=update' enctype='multipart/form-data'>
                <input type=hidden name=id value=$r[id_komentar]>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Nama</th>    <td><input type='text' class='form-control' name='nama_komentar' value='$r[nama_komentar]' required></td></tr>
                    <tr><th scope='row'>Website</th>              <td><input type='text' class='form-control' name='url' value='$r[url]'></td></tr>
                    <tr><th scope='row'>Komentar</th>             <td><textarea class='form-control' name='isi_komentar' style='height:260px' required>$r[isi_komentar]</textarea></td></tr>
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