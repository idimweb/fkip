<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

  $base_url = $_SERVER['HTTP_HOST'];
  $iden=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas"));

$aksi="modul/mod_hubungi/aksi_hubungi.php";
switch($_GET['act']){

  default:
  echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Pesan Masuk</h3>

                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr> 
                        <th width='20px'>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th width='50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $no = 1;
                    $tampil=mysqli_query($koneksi, "SELECT * FROM hubungi ORDER BY id_hubungi DESC");
                    while ($r=mysqli_fetch_array($tampil)){
                      $tgl=tgl_indo($r['tanggal']);
                  	  if($r['dibaca']=='N'){ $bold ='bold'; }else{ $bold ='none'; }
                      echo "<tr> 
                              <td><center>$no</center></td>
                          	  <td>$r[nama]</td>
                          	  <td><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>$r[email]</a></td>
                          	  <td>$r[subjek]</td>
                          	  <td>$tgl</a></td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='?module=hubungi&act=balasemail&id=$r[id_hubungi]'><span class='glyphicon glyphicon-send'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=hubungi&act=hapus&id=$r[id_hubungi]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                            </tr>";
                        $no++;
                    }
              echo "</tbody></table>";
    break;

  case "balasemail":
  $r = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'"));
	mysqli_query($koneksi, "UPDATE hubungi SET dibaca='Y' WHERE id_hubungi='$_GET[id]'");

  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Sekilas Info</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='?module=hubungi&act=kirimemail' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Nama Pengirim</th>  <td><input type='text' class='form-control' name='pengirim' value='$r[nama]' readonly='on'></td></tr>
                    <tr><th width='120px' scope='row'>Email Pengirim</th> <td><input type='text' class='form-control' name='email' value='$r[email]' readonly='on'></td></tr>
                    <tr><th width='120px' scope='row'>Subjek Pesan</th>   <td><input type='text' class='form-control' name='subjek' value='$r[subjek]' readonly='on'></td></tr>
                    <tr><th scope='row'>Isi Pesan</th>                    <td><textarea class='form-control' name='pesan' style='height:120px'  readonly='on'>$r[pesan]</textarea></td></tr>
                    <tr><th scope='row'>Balas Pesan</th>                    <td><textarea id='editor1' class='form-control' name='balas' style='height:120px'></textarea></td></tr>
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
	 
  case "kirimemail":
  $dari = "From: $iden[nama_website] <".$iden['email'].">\n" . 
  "MIME-Version: 1.0\n" . 
  "Content-type: text/html; charset=iso-8859-1";
    $message         = $_POST['pesan']." <br><hr><br> ".$_POST['balas'];
    mail($_POST['email'],$_POST['subjek'],$message,$dari);
    echo "<script>window.alert('Email sukses Dikirimkan ke $_POST[email]!');
                                  window.location=('?module=hubungi')</script>";
  break;
  }
  }else{
     echo akses_salah();
}
}
