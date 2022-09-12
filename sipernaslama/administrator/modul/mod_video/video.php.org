<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

	function GetCheckboxes($table, $key, $Label, $Nilai='') {
    global $koneksi;
    $s = "select * from $table order by nama_tag";
    $r = mysqli_query($koneksi,$s);
    $_arrNilai = explode(',', $Nilai);
    $str = '';
    while ($w = mysqli_fetch_array($r)) {
      $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
      $str .= "<span style='display:block;'><input type=checkbox name='".$key."[]' value='$w[$key]' $_ck> $w[$Label] </span>";
    }
    return $str;
  }
	
$aksi="modul/mod_video/aksi_video.php";
switch($_GET['act']){

  default:
  echo "<div class='col-xs-12'>  
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Semua Video</h3>
              <a class='pull-right btn btn-primary btn-sm' href='?module=video&act=tambah'>Tambahkan Data</a>
            </div>
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'>
                <thead>
                  <tr>	
                    <th width='20px'>No</th>
                  	<th>Judul Video</th>
                  	<th>Tgl. Posting</th>
                  	<th>Playlist</th>
                  	<th width='50px'>Action</th>
                  </tr>
                </thead>
                <tbody>";

                if ($_SESSION['leveluser']=='admin'){
                  $tampil = mysqli_query($koneksi, "SELECT * FROM video a JOIN playlist b ON a.id_playlist=b.id_playlist ORDER BY a.id_video DESC");
                }else{
                  $tampil = mysqli_query($koneksi, "SELECT * FROM video a JOIN playlist b ON a.id_playlist=b.id_playlist WHERE a.username='$_SESSION[namauser]' ORDER BY a.id_video DESC");
                } 

                $no = 1;
                while($r=mysqli_fetch_array($tampil)){
                $tgl_posting=tgl_indo($r['tanggal']);
                   echo "<tr><td><center>$no</center></td>
                             <td><a target='_BLANK' href='../play-$r[id_video]-$r[video_seo].html'>$r[jdl_video]</a></td>
                             <td>$tgl_posting</td>
                             <td>$r[jdl_playlist]</td>
                             <td><a class='btn btn-success btn-xs' title='Edit Data' href='?module=video&act=edit&id=$r[id_video]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='$aksi?module=video&act=hapus&id=$r[id_video]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
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
                  <h3 class='box-title'>Tambah Video Baru</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=video&act=input' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Judul Video</th>    <td><input type='text' class='form-control' name='jdl_video' required></td></tr>
                    <tr><th scope='row'>Playlist</th>               <td><select name='playlist' class='form-control' required>
                                                                            <option value='' selected>- Pilih Playlist -</option>";
                                                                            $tampil=mysqli_query($koneksi,"SELECT * FROM playlist ORDER BY jdl_playlist");
                                                                             while($r=mysqli_fetch_array($tampil)){
                                                                               echo "<option value=$r[id_playlist]>$r[jdl_playlist]</option></p>";
                                                                             }
                    echo "</select></td></tr>
                    <tr><th scope='row'>keterangan</th>             <td><textarea id='editor1' class='form-control' name='keterangan' style='height:260px' required></textarea></td></tr>
                    <tr><th scope='row'>Gambar</th>                 <td><input type='file' class='form-control' name='fupload'></td></tr>
                    <tr><th scope='row'>Link Youtube</th>          <td><input type='text' class='form-control' name='youtube' placeholder='Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU'></td></tr>";
                    // <tr><th scope='row'>Video File</th>          <td><input type='file' class='form-control' name='fupload2' placeholder='Tipe video harus MP4/FLV'></td></tr>
                    echo "<tr><th scope='row'>Tag</th>                    <td><div class='checkbox-scroll'>";
                                                                          $tagvid = mysqli_query($koneksi,"SELECT * FROM tagvid ORDER BY tag_seo");
                                                                          while ($t=mysqli_fetch_array($tagvid)){
                                                                              echo "<span style='display:block;'><input type=checkbox value='$t[tag_seo]' name=tag_seo[]> $t[nama_tag]</span> ";
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
    
    case "edit":
    $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM video WHERE id_video='$_GET[id]'"));
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Video</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=video&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type=hidden name=id value=$r[id_video]>
                    <tr><th width='120px' scope='row'>Judul Video</th>    <td><input type='text' class='form-control' name='jdl_video' value='$r[jdl_video]' required></td></tr>
                    <tr><th scope='row'>Playlist</th>               <td><select name='playlist' class='form-control' required>
                                                                            <option value='' selected>- Pilih Playlist -</option>";
                                                                            $tampil=mysqli_query($koneksi,"SELECT * FROM playlist ORDER BY jdl_playlist");
                                                                            while($w=mysqli_fetch_array($tampil)){
                                                                              if ($r['id_playlist']==$w['id_playlist']){
                                                                                 echo "<option value=$w[id_playlist] selected>$w[jdl_playlist]</option>";}
                                                                              else{
                                                                                 echo "<option value=$w[id_playlist]>$w[jdl_playlist]</option></p> ";
                                                                              }
                                                                            }
                    echo "</select></td></tr>
                    <tr><th scope='row'>Keterangan</th>             <td><textarea id='editor1' class='form-control' name='keterangan' style='height:260px' required>$r[keterangan]</textarea></td></tr>
                    <tr><th scope='row'>Gambar</th>                 <td><input type='file' class='form-control' name='fupload'>";
                                                                    if ($r['gbr_video']!=''){ echo "Gambar Saat ini : <a target='_BLANK' href='../img_video/$r[gbr_video]'>$r[gbr_video]</a>"; } echo "</td></tr>
                    <tr><th scope='row'>Link Youtube</th>           <td><input type='text' class='form-control' name='youtube' value='$r[youtube]' placeholder='Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU'>";
                                                                    if ($r['youtube']!=''){ 
                                                                      if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $r['youtube'], $match)) {
                                                                        echo "<iframe width='250' height='170' id='ytplayer' type='text/html'
                                                                            src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
                                                                            frameborder='0' allowfullscreen></iframe>";
                                                                      } 
                                                                    } echo "</td></tr>";
                     // <tr><th scope='row'>Video File</th>          <td><input type='file' class='form-control' name='fupload2' placeholder='Tipe video harus MP4/FLV'>";
                                                                    // if ($r['video']!=''){ echo "<video width='250' height='170' controls> <source src='../img_video/$r[video]' type='video/mp4'> </video>"; } echo "</td></tr>
                    echo "<tr><th scope='row'>Tag</th>                    <td><div class='checkbox-scroll'>";
                                                                          $tampiltag = GetCheckboxes('tagvid', 'tag_seo', 'nama_tag', $r['tagvid']);
                                                                          echo "<span style='display:block;'> $tampiltag &nbsp; &nbsp; &nbsp;</span>
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
?>