<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

function GetCheckboxes($table, $key, $Label, $Nilai='') {
  global $koneksi;
  $r = mysqli_query($koneksi, "SELECT * FROM $table order by nama_tag");
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysqli_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<span style='display:block;'><input type=checkbox name='".$key."[]' value='$w[$key]' $_ck>$w[$Label] </span>";
  }
  return $str;
}

$aksi="modul/mod_berita/aksi_berita.php";
switch($_GET['act']){
 default:
 echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Semua Berita</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='?module=berita&act=tambahberita'>Tambahkan Data</a>
                </div>
                <div class='box-body'>
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Judul Berita</th>
                        <th>Tgl Posting</th>
                        <th>Status</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $no = 1;
                    if ($_SESSION['leveluser']=='admin'){
                      $tampil = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id_berita DESC");
                    }else{
                      $tampil=mysqli_query($koneksi, "SELECT * FROM berita WHERE username='$_SESSION[namauser]' ORDER BY id_berita DESC");
                    }
                    while($row=mysqli_fetch_array($tampil)){
                    $tgl_posting = tgl_indo($row['tanggal']);
                    if ($row['status']=='Y'){ $status = "<span style='color:green'>Published</span>"; }else{ $status = "<span style='color:red'>Unpublished</span>"; }
                    echo "<tr><td>$no</td>
                              <td>$row[judul]</td>
                              <td>$tgl_posting</td>
                              <td>$status</td>
                              <td><center>
                                <a class='btn btn-primary btn-xs' title='Publish Data' href='?module=berita&publish=$row[id_berita]&status=$row[status]'><span class='glyphicon glyphicon-ok'></span></a>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='?module=berita&act=editberita&id=$row[id_berita]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='?module=berita&hapus=$row[id_berita]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }

                    if (isset($_GET['hapus'])){
                      if ($_SESSION['leveluser']=='admin'){
                        mysqli_query($koneksi, "DELETE FROM berita where id_berita='$_GET[hapus]'");
                      }else{
                        mysqli_query($koneksi, "DELETE FROM berita where id_berita='$_GET[hapus]' AND username='$_SESSION[namauser]'");
                      }
                       echo "<script>document.location='?module=berita';</script>";
                    }

                    if (isset($_GET['publish'])){
                        if ($_GET['status']=='N'){ $publish = 'Y'; }else{ $publish = 'N'; }
                        mysqli_query($koneksi, "UPDATE berita SET status='$publish' where id_berita='$_GET[publish]'");
                        echo "<script>document.location='?module=berita';</script>";
                    }

                  echo "</tbody>
                </table>
              </div>
            </div>
          </div>";
 
  break;    

  case "tambahberita":
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Berita Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=berita&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='judul' required></td></tr>
                    <tr><th scope='row'>Sub Judul</th>              <td><input type='text' class='form-control' name='sub_judul'></td></tr>
                    <tr><th scope='row'>Video Youtube</th>          <td><input type='text' class='form-control' name='youtube' placeholder='Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU'></td></tr>
                    <tr><th scope='row'>Kategori</th>               <td><select name='kategori' class='form-control' required>
                                                                            <option value='' selected>- Pilih Kategori -</option>";
                                                                            $tampil=mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori");
                                                                            while($r=mysqli_fetch_array($tampil)){
                                                                              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>"; 
                                                                            }
                    echo "</select></td></tr>
                    <tr><th scope='row'>Headline</th>               <td><input type='radio' name='headline' value='Y'> Ya &nbsp; <input type='radio' name='headline' value='N' checked> Tidak</td></tr>
                    <tr><th scope='row'>Pilihan Redaksi</th>        <td><input type='radio' name='aktif' value='Y'> Ya &nbsp; <input type='radio' name='aktif' value='N' checked> Tidak</td></tr>
                    <tr><th scope='row'>Berita Utama</th>           <td><input type='radio' name='utama' value='Y'> Ya &nbsp; <input type='radio' name='utama' value='N' checked> Tidak</td></tr>
                    <tr><th scope='row'>Isi Berita</th>             <td><textarea id='editor1' class='form-control' name='isi_berita' style='height:260px' required></textarea></td></tr>
                    <tr><th scope='row'>Gambar</th>                 <td><input type='file' class='form-control' name='fupload'></td></tr>
                    <tr><th scope='row'>Ket. Gambar</th>            <td><input type='text' class='form-control' name='keterangan_gambar'></td></tr>
                    <tr><th scope='row'>Tag</th>                    <td><div class='checkbox-scroll'>";
                                                                            $tampiltag = mysqli_query($koneksi, "SELECT * FROM tag ORDER BY tag_seo");
                                                                            while ($tag=mysqli_fetch_array($tampiltag)){
                                                                                echo "<span style='display:block;'><input type=checkbox value='$tag[tag_seo]' name=tag_seo[]> $tag[nama_tag] &nbsp; &nbsp; &nbsp;</span>";
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
   break;
    
    
  case "editberita":
  $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita='$_GET[id]'"));
  echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Berita</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=berita&act=update' enctype='multipart/form-data'>
                <input type=hidden name=id value=$r[id_berita]>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='judul' value='$r[judul]' required></td></tr>
                    <tr><th scope='row'>Sub Judul</th>              <td><input type='text' class='form-control' name='sub_judul' value='$r[sub_judul]'></td></tr>
                    <tr><th scope='row'>Video Youtube</th>          <td><input type='text' class='form-control' name='youtube' value='$r[youtube]' placeholder='Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU'></td></tr>
                    <tr><th scope='row'>Kategori</th>               <td><select name='kategori' class='form-control' required>
                                                                            <option value='' selected>- Pilih Kategori -</option>";
                                                                            $tampil=mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori");
                                                                            while($w=mysqli_fetch_array($tampil)){
                                                                                if ($r['id_kategori']==$w['id_kategori']){
                                                                                   echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
                                                                                }else{
                                                                                   echo "<option value=$w[id_kategori]>$w[nama_kategori]</option> </p> ";
                                                                                }
                                                                            }
                    echo "</select></td></tr>
                    <tr><th scope='row'>Headline</th>               <td>"; if ($r['headline']=='Y'){ echo "<input type='radio' name='headline' value='Y' checked> Ya &nbsp; <input type='radio' name='headline' value='N'> Tidak"; }else{ echo "<input type='radio' name='headline' value='Y'> Ya &nbsp; <input type='radio' name='headline' value='N' checked> Tidak"; } echo "</td></tr>
                    <tr><th scope='row'>Pilihan Redaksi</th>        <td>"; if ($r['aktif']=='Y'){ echo "<input type='radio' name='aktif' value='Y' checked> Ya &nbsp; <input type='radio' name='aktif' value='N'> Tidak"; }else{ echo "<input type='radio' name='aktif' value='Y'> Ya &nbsp; <input type='radio' name='aktif' value='N' checked> Tidak"; } echo "</td></tr>
                    <tr><th scope='row'>Berita Utama</th>           <td>"; if ($r['utama']=='Y'){ echo "<input type='radio' name='utama' value='Y' checked> Ya &nbsp; <input type='radio' name='utama' value='N'> Tidak"; }else{ echo "<input type='radio' name='utama' value='Y'> Ya &nbsp; <input type='radio' name='utama' value='N' checked> Tidak"; } echo "</td></tr>
                    <tr><th scope='row'>Isi Berita</th>             <td><textarea id='editor1' class='form-control' name='isi_berita' style='height:260px' required>$r[isi_berita]</textarea></td></tr>
                    <tr><th scope='row'>Gambar</th>                 <td><input type='file' class='form-control' name='fupload'>";
                                                                    if ($r['gambar']!=''){ echo "Gambar Saat ini : <a target='_BLANK' href='../foto_berita/$r[gambar]'>$r[gambar]</a>"; } echo "</td></tr>
                    
                    <tr><th scope='row'>Ket. Gambar</th>            <td><input type='text' class='form-control' name='keterangan_gambar' value='$r[keterangan_gambar]'></td></tr>
                    <tr><th scope='row'>Tag</th>                    <td><div class='checkbox-scroll'>";
                                                                            $tampiltag = GetCheckboxes('tag', 'tag_seo', 'nama_tag', $r['tag']);
                                                                            echo "$tampiltag
                    </div></td></tr>
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
