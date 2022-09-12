<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

  $aksi="modul/mod_galerifoto/aksi_galerifoto.php";
  switch($_GET['act']){

   default:
  
  echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Gallery Berita Foto</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=galerifoto&act=tambah'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>	
                       <th><center>Foto</center></th>
                       <th>Judul Foto</th>
                       <th>Album</th>
                       <th style='width:50px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>";
	
                    if ($_SESSION['leveluser']=='admin'){
                      $tampil = mysqli_query($koneksi, "SELECT * FROM gallery,album WHERE gallery.id_album=album.id_album ORDER BY id_gallery DESC");
                    }else{
                      $tampil = mysqli_query($koneksi, "SELECT * FROM gallery,album WHERE gallery.id_album=album.id_album AND gallery.username='$_SESSION[namauser]' ORDER BY id_gallery DESC");
                    }
                   $no = 1;
                   while($r=mysqli_fetch_array($tampil)){
                   echo "<tr> 
                           <td><center><img src='../img_galeri/kecil_$r[gbr_gallery]' width=50></center></td>
                           <td>$r[jdl_gallery]</td>
                           <td>$r[jdl_album]</td>
                           <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=galerifoto&act=edit&id=$r[id_gallery]'><span class='glyphicon glyphicon-edit'></span></a>
                               <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=galerifoto&act=hapus&id=$r[id_gallery]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                           </td>
                        </tr>";
                     $no++;
                   }
                  echo "</tbody></table> ";
    break;    

   case "tambah":
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Foto Gallery Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=galerifoto&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Judul Foto</th>    <td><input type='text' class='form-control' name='jdl_gallery' required></td></tr>
                    <tr><th scope='row'>Album</th>               <td><select name='album' class='form-control' required>
                                                                            <option value='' selected>- Pilih Album -</option>";
                                                                            $tampil=mysqli_query($koneksi, "SELECT * FROM album ORDER BY jdl_album");
                                                                               while($p=mysqli_fetch_array($tampil)){
                                                                               echo "<option value=$p[id_album]>$p[jdl_album]</option>";
                                                                            }
                    echo "</select></td></tr>
                    <tr><th scope='row'>Keterangan</th>             <td><textarea id='editor1' class='form-control' name='keterangan' style='height:260px' required></textarea></td></tr>
                    <tr><th scope='row'>Gambar</th>                 <td><input type='file' class='form-control' name='fupload'></td></tr>
                    
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
    $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM gallery WHERE id_gallery='$_GET[id]'"));
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Update Foto Gallery</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=galerifoto&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type=hidden name=id value=$r[id_gallery]>
                    <tr><th width='120px' scope='row'>Judul Foto</th>    <td><input type='text' class='form-control' name='jdl_gallery' value='$r[jdl_gallery]' required></td></tr>
                    <tr><th scope='row'>Album</th>               <td><select name='album' class='form-control' required>
                                                                            <option value='' selected>- Pilih Album -</option>";
                                                                            $tampil=mysqli_query($koneksi,"SELECT * FROM album ORDER BY jdl_album");
                                                                               while($p=mysqli_fetch_array($tampil)){
                                                                              if ($r['id_album']==$p['id_album']){
                                                                                echo "<option value='$p[id_album]' selected>$p[jdl_album]</option>";
                                                                              }else{
                                                                                echo "<option value='$p[id_album]'>$p[jdl_album]</option>";
                                                                              }
                                                                            }
                    echo "</select></td></tr>
                    <tr><th scope='row'>Keterangan</th>             <td><textarea id='editor1' class='form-control' name='keterangan' style='height:260px' required>$r[keterangan]</textarea></td></tr>
                    <tr><th scope='row'>Ganti Foto</th>                 <td><input type='file' class='form-control' name='fupload'>";
                                                                    if ($r['gbr_gallery']!=''){ echo "Gambar Saat ini : <a target='_BLANK' href='../img_galeri/$r[gbr_gallery]'>$r[gbr_gallery]</a>"; } echo "</td></tr>
                    
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
