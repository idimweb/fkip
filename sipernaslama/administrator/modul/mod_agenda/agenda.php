<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_agenda/aksi_agenda.php";
switch($_GET['act']){

  default:
 echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Semua Berita</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=agenda&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>  
                        <th width='20px'>No</th>
                      	<th>Tema</th>
                      	<th>Tgl. Mulai</th>
                      	<th>Tgl. Selesai</th>
                      	<th width='50px'>Action</th>
                      </tr>
                     </thead>
                     <tbody>";

                    if ($_SESSION['leveluser']=='admin'){
                      $tampil=mysqli_query($koneksi, "SELECT * FROM agenda ORDER BY id_agenda DESC");
                    }else{
                      $tampil=mysqli_query($koneksi, "SELECT * FROM agenda WHERE username='$_SESSION[namauser]' ORDER BY id_agenda DESC");
                    }

                    $no = $posisi+1;
                    while ($r=mysqli_fetch_array($tampil)){
                      $tgl_mulai   = tgl_indo($r['tgl_mulai']);
                      $tgl_selesai = tgl_indo($r['tgl_selesai']);
                    
                   echo "<tr>
                            <td><center>$no</center></td>
                            <td>$r[tema]</td>
                            <td>$tgl_mulai</td>
                            <td>$tgl_selesai</td>
                            <td><center>
                              <a class='btn btn-success btn-xs' title='Edit Data' href='?module=agenda&act=edit&id=$r[id_agenda]'><span class='glyphicon glyphicon-edit'></span></a>
                              <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=agenda&act=hapus&id=$r[id_agenda]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
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
                  <h3 class='box-title'>Tambah Agenda Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=agenda&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Tema</th>    <td><input type='text' class='form-control' name='tema' required></td></tr>
                    <tr><th scope='row'>Isi Agenda</th>             <td><textarea id='editor1' class='form-control' name='isi_agenda' style='height:260px' required></textarea></td></tr>
                    <tr><th scope='row'>Gambar</th>                 <td><input type='file' class='form-control' name='fupload'></td></tr>
                    <tr><th scope='row'>Tempat</th>              <td><input type='text' class='form-control' name='tempat'></td></tr>

                    <tr><th scope='row'>Jam <small>s/d</small> Selesai</th><td><input type='text' class='form-control' name='jam'></td></tr>
                      <tr><th scope='row'>Tgl <small>s/d</small> Selesai</th><td><input type='text' class='form-control' id='rangepicker' name='tgl_mulai'></td></tr>
                      <tr><th scope='row'>Pengirim</th>             <td><input type='text' class='form-control' name='pengirim'></td></tr>

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
    $edit = mysqli_query($koneksi, "SELECT * FROM agenda WHERE id_agenda='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
    $exx = explode('-',$r['tgl_mulai']);
    $exy = explode('-',$r['tgl_selesai']);
    $mulai = $exx[1].'/'.$exx[2].'/'.$exx[0];
    $selesai = $exy[1].'/'.$exy[2].'/'.$exy[0];
    $tanggalmulaiselesai = $mulai.' - '.$selesai;

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Agenda</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=agenda&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type=hidden name=id value=$r[id_agenda]>
                    <tr><th width='120px' scope='row'>Tema</th>    <td><input type='text' class='form-control' name='tema' value='$r[tema]' required></td></tr>
                    <tr><th scope='row'>Isi Agenda</th>             <td><textarea id='editor1' class='form-control' name='isi_agenda' style='height:260px' required>$r[isi_agenda]</textarea></td></tr>
                    <tr><th scope='row'>Gambar</th>                 <td><input type='file' class='form-control' name='fupload'>";
                                                                    if ($r['gambar']!=''){ echo "Gambar Saat ini : <a target='_BLANK' href='../foto_agenda/$r[gambar]'>$r[gambar]</a>"; } echo "</td></tr>
                    
                    <tr><th scope='row'>Tempat</th>              <td><input type='text' class='form-control' name='tempat' value='$r[tempat]'></td></tr>
                    <tr><th scope='row'>Jam <small>s/d</small> Selesai</th><td><input type='text' class='form-control' name='jam' value='$r[jam]'></td></tr>
                    <tr><th scope='row'>Tgl <small>s/d</small> Selesai</th><td><input type='text' class='form-control' id='rangepicker' name='tgl_mulai' value='$tanggalmulaiselesai'></td></tr>
                    <tr><th scope='row'>Pengirim</th>             <td><input type='text' class='form-control' name='pengirim' value='$r[pengirim]'></td></tr>

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