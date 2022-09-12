<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  $aksi="modul/mod_users/aksi_users.php";
  switch($_GET['act']){

  default:
  if ($_SESSION['leveluser']=='admin'){
  echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Semua Users</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=user&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                       <th width='20px'>No</th> 
                       <th>Username</th> 
                       <th>Nama Lengkap</th> 
                       <th>Email</th>
                       <th>Foto</th>
                       <th>Blokir</th> 
                       <th>Level</th> 
                       <th width='50px'>Action</th>
                      </tr> 
                     </thead>
                     <tbody>";

    if ($_SESSION['leveluser']=='admin'){
      $tampil = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id_session DESC");
    }else{
      $tampil = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$_SESSION[namauser]'");
    }
  
    $no = 1;
    while($r=mysqli_fetch_array($tampil)){
     echo "<tr> 
             <td width=50><center>$no</center></td>
             <td>$r[username]</td>
             <td>$r[nama_lengkap]</td>
             <td><a href=mailto:$r[email]>$r[email]</a></td>";
          	   if (empty($r['foto'])){
          			echo "<td><center><img class='img-thumbnail img-circle' src='../foto_user/blank.png' width=50></center></td>";
          	   }else{
          			echo "<td><center><img class='img-thumbnail img-circle' src='../foto_user/small_$r[foto]' width=50></center></td>";
          	   }
      echo "<td align=center><center>$r[blokir]</center></td>
            <td align=center>$r[level]</td>
            <td valign=middle><a class='btn btn-success btn-xs' title='Edit Data' href='?module=user&act=edit&id=$r[id_session]'><span class='glyphicon glyphicon-edit'></span></a></td> 
          </tr> ";
      $no++; 
    }
	
   echo "</tbody></table> ";
   }
   break;

  
  case "tambah":
  if ($_SESSION['leveluser']=='admin'){
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah User Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=user&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Username</th> <td><input type='text' class='form-control' name='username' required></td></tr>
                    <tr><th scope='row'>Password</th>               <td><input type='password' class='form-control' name='password'></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>           <td><input type='text' class='form-control' name='nama_lengkap'></td></tr>
                    <tr><th scope='row'>Alamat Email</th>                  <td><input type='email' class='form-control' name='email'></td></tr>
                    <tr><th scope='row'>No Telpon</th>           <td><input type='text' class='form-control' name='no_telp'></td></tr>
                    <tr><th scope='row'>Upload Foto</th>                 <td><input type='file' class='form-control' name='fupload'></td></tr>
                    
                    <tr><th scope='row'>Akses Modul</th>                    <td><div class='checkbox-scroll'>";
                                                                            $qrMod = mysqli_query($koneksi, "SELECT * FROM modul WHERE publish='Y' AND status='user'");
                                                                             while($mod=mysqli_fetch_array($qrMod)){
                                                                               echo "<span style='display:block'><input name='modul[]' type='checkbox' value='$mod[id_modul]' /> $mod[nama_modul]</span> ";
                                                                             }
                    echo "</div></td></tr>
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
   }
   break;
    
   case "edit":
   $r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users WHERE id_session='$_GET[id]'"));
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Profile User</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=user&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type=hidden name=id value=$r[id_session]>
                  <input type=hidden name=blokir value='$r[blokir]'>
                    <tr><th width='120px' scope='row'>Username</th> <td><input type='text' class='form-control' name='username' value='$r[username]' disabled></td></tr>
                    <tr><th scope='row'>Password</th>               <td><input type='password' class='form-control' name='password'></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>           <td><input type='text' class='form-control' name='nama_lengkap' value='$r[nama_lengkap]'></td></tr>
                    <tr><th scope='row'>Alamat Email</th>           <td><input type='email' class='form-control' name='email' value='$r[email]'></td></tr>
                    <tr><th scope='row'>No Telpon</th>              <td><input type='number' class='form-control' name='no_telp' value='$r[no_telp]'></td></tr>
                    <tr><th scope='row'>Ganti Foto</th>                   <td><input type='file' class='form-control' name='fupload'>";
                                                                    if ($r['foto']!=''){ echo "Foto Saat ini : <a target='_BLANK' href='../foto_user/$r[foto]'>$r[foto]</a>"; }else{ echo "Foto Saat ini : <a target='_BLANK' href='../foto_user/blank.png'>blank.png</a>"; } echo "</td></tr>";
                    
                    if ($_SESSION['leveluser']=='admin'){
                      echo "<tr><th scope='row'>Blokir Login</th>           <td>"; if ($r['blokir']=='Y'){ echo "<input type='radio' name='blokir' value='Y' checked> Ya &nbsp; <input type='radio' name='blokir' value='N'> Tidak"; }else{ echo "<input type='radio' name='blokir' value='Y'> Ya &nbsp; <input type='radio' name='blokir' value='N' checked> Tidak"; } echo "</td></tr>
                      <tr><th scope='row'>Tambah Akses</th>            <td><div class='checkbox-scroll'>";
                                                                      $qrMod = mysqli_query($koneksi, "SELECT * FROM modul WHERE publish='Y' AND status='user'");
                                                                      while($mod=mysqli_fetch_array($qrMod)){
                                                                         echo "<span style='display:block'><input name='modul[]' type='checkbox' value='$mod[id_modul]' /> $mod[nama_modul]</span> "; 
                                                                      }
                                                                             
                      echo "</div></td></tr>
                      <tr><th scope='row'>Hak Akses</th>            <td><div class='checkbox-scroll'>"; 
                                                                    $qrMod1 = mysqli_query($koneksi, "SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$_GET[id]'");
                                                                    while($mod1=mysqli_fetch_array($qrMod1)){
                                                                        echo "<span style='display:block'> <a href='$aksi?module=user&act=hapusmodule&id=$mod1[id_umod]&sessid=$_GET[id]'>x</a> $mod1[nama_modul]</span> ";
                                                                    }
                      echo "</div></td></tr>";  
                    }
                  echo "</tbody>
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
}
?>