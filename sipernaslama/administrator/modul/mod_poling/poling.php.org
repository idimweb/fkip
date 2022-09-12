<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_poling/aksi_poling.php";
switch($_GET['act']){

  default:
  echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Data Polling</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=poling&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>    
                        <th width='20px'>No</th>
                      	<th>Pilihan</th>
                      	<th>Status</th>
                      	<th>Rating</th>
                      	<th>Aktif</th>
                      	<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                    if ($_SESSION['leveluser']=='admin'){
                      $tampil = mysqli_query($koneksi, "SELECT * FROM poling ORDER BY id_poling DESC");
                    }else{
                      $tampil = mysqli_query($koneksi, "SELECT * FROM poling WHERE username='$_SESSION[namauser]' ORDER BY id_poling DESC");
                    }
                  
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                     echo "<tr>
                             <td>$no</td>
                             <td>$r[pilihan]</td>
                             <td>$r[status]</td>
                             <td align=center><center>$r[rating]</center></td>
                             <td align=center><center>$r[aktif]</center></td>
                             
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='?module=poling&act=edit&id=$r[id_poling]'><span class='glyphicon glyphicon-edit'></span></a>
                              </center></td>
                            </tr>";		
                      $no++;
                      }
                  echo "</tbody></table> ";
  break;   

  case "tambah":
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Polling</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=poling&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Content</th>  <td><input type='text' class='form-control' name='pilihan' required></td></tr>
                    <tr><th scope='row'>Status</th>                 <td><input type=radio name='status' value='Jawaban' checked>Jawaban &nbsp; <input type=radio name='status' value='Pertanyaan'>Pertanyaan </td></tr>
                    <tr><th scope='row'>Aktif</th>                  <td><input type='radio' name='aktif' value='Y'> Ya &nbsp; <input type='radio' name='aktif' value='N' checked> Tidak</td></tr>
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
  $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM poling WHERE id_poling='$_GET[id]'"));
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Polling</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=poling&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type=hidden name=id value='$r[id_poling]'>
                    <tr><th width='120px' scope='row'>Content</th>  <td><input type='text' class='form-control' name='pilihan' value='$r[pilihan]' required></td></tr>
                    <tr><th scope='row'>Status</th>                 <td>"; if ($r['status']=='Jawaban'){ echo "<input type=radio name='status' value='Jawaban' checked>Jawaban &nbsp; <input type=radio name='status' value='Pertanyaan'>Pertanyaan"; }else{ echo "<input type=radio name='status' value='Jawaban'>Jawaban &nbsp; <input type=radio name='status' value='Pertanyaan' checked>Pertanyaan"; }echo ";</td></tr>
                    <tr><th scope='row'>Aktif</th>                  <td>"; if ($r['aktif']=='Y'){ echo "<input type='radio' name='aktif' value='Y' checked> Ya &nbsp; <input type='radio' name='aktif' value='N'> Tidak"; }else{ echo "<input type='radio' name='aktif' value='Y'> Ya &nbsp; <input type='radio' name='aktif' value='N' checked> Tidak"; } echo "</td></tr>
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