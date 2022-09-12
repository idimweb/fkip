<?php
if (trim($_SESSION['leveluser'])=='admin'){
  echo "<a style='color:#000' href='media.php?module=berita'>
          <div class='col-md-3 col-sm-6 col-xs-12'>
            <div class='info-box'>
              <span class='info-box-icon bg-aqua'><i class='fa fa-book'></i></span>
              <div class='info-box-content'>
                <span class='info-box-text'>Berita</span>";
                $jmla = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM berita"));
                echo "<span class='info-box-number'>$jmla</span>
              </div>
            </div>
          </div>
          </a>

          <a style='color:#000' href='media.php?module=halamanstatis'>
          <div class='col-md-3 col-sm-6 col-xs-12'>
            <div class='info-box'>
              <span class='info-box-icon bg-green'><i class='fa fa-file'></i></span>
              <div class='info-box-content'>
                <span class='info-box-text'>Halaman</span>";
                $jmlb = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM halamanstatis"));
                echo "<span class='info-box-number'>$jmlb</span>
              </div>
            </div>
          </div>
          </a>

          <a style='color:#000' href='media.php?module=agenda'>
          <div class='col-md-3 col-sm-6 col-xs-12'>
            <div class='info-box'>
              <span class='info-box-icon bg-yellow'><i class='fa fa-files-o'></i></span>
              <div class='info-box-content'>
                <span class='info-box-text'>Agenda</span>";
                $jmlc = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM agenda"));
                echo "<span class='info-box-number'>$jmlc</span>
              </div>
            </div>
          </div>
          </a>

          <a style='color:#000' href='media.php?module=user'>
          <div class='col-md-3 col-sm-6 col-xs-12'>
            <div class='info-box'>
              <span class='info-box-icon bg-red'><i class='fa fa-users'></i></span>
              <div class='info-box-content'>
                <span class='info-box-text'>Users</span>";
                $jmld = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM users"));
                echo "<span class='info-box-number'>$jmld</span>
              </div>
            </div>
          </div>
          </a>

      <div class='col-md-7'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Application Buttons</h3>
        </div>
        <div class='box-body'>
          <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda 
              atau pilih ikon-ikon pada Control Panel di bawah ini : </p>
          <a href=media.php?module=identitas class='btn btn-app'><i class='fa fa-th'></i> Identitas</a>
          <a href=media.php?module=menu class='btn btn-app'><i class='fa fa-th-large'></i> Menu</a>
          <a href=media.php?module=berita class='btn btn-app'><i class='fa fa-television'></i> Berita</a>
          <a href=media.php?module=kategori class='btn btn-app'><i class='fa fa-bars'></i> Kategori</a>
          <a href=media.php?module=komentar class='btn btn-app'><i class='fa fa-comments'></i> Komentar</a>
          <a href=media.php?module=katajelek class='btn btn-app'><i class='fa fa-bell-slash'></i> Sensor</a>
          <a href=media.php?module=agenda class='btn btn-app'><i class='fa fa-calendar-minus-o'></i> Agenda</a>
          <a href=media.php?module=album class='btn btn-app'><i class='fa fa-camera-retro'></i> Album</a>
          <a href=media.php?module=galerifoto class='btn btn-app'><i class='fa fa-camera'></i> Gallery</a>
          <a href=media.php?module=poling class='btn btn-app'><i class='fa fa-bar-chart-o'></i> Polling</a>
          <a href=media.php?module=video class='btn btn-app'><i class='fa fa-play'></i> Video</a>
          <a href=media.php?module=iklanatas class='btn btn-app'><i class='fa fa-file-image-o'></i> Ads Atas</a>
          <a href=media.php?module=pasangiklan class='btn btn-app'><i class='fa fa-file-image-o'></i> Ads Sidebar</a>
          <a href=media.php?module=iklantengah class='btn btn-app'><i class='fa fa-file-image-o'></i> Ads Tengah</a>
          <a href=media.php?module=hubungi class='btn btn-app'><span class='badge bg-yellow'>$jumHub</span><i class='fa fa-envelope'></i> Pesan</a>
          <a href=media.php?module=logo class='btn btn-app'><i class='fa fa-circle-thin'></i> Logo</a>
          <a href=media.php?module=templates class='btn btn-app'><i class='fa fa-file'></i> Template</a>
          <a href=media.php?module=background class='btn btn-app'><i class='fa fa-circle'></i> Background</a>
          <a href=media.php?module=halamanstatis class='btn btn-app'><i class='fa fa-file-text'></i> Halaman</a>
          <a href=media.php?module=alamat class='btn btn-app'><i class='fa fa-bed'></i> Alamat</a>
          <a href=media.php?module=ym class='btn btn-app'><i class='fa fa-yahoo'></i> YM</a>
          <a href=media.php?module=download class='btn btn-app'><i class='fa fa-download'></i> Download</a>
          <a href=media.php?module=user class='btn btn-app'><i class='fa fa-users'></i> Users</a>
        </div>
      </div>
   </div>

   <section class='col-lg-5 connectedSortable'>";
      include "grafik.php";
    echo "</section>";

}else{
    echo "<div class='col-md-6'>
          <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Selamat Datang di Halaman $users[level]</h3>
            </div>
            <div class='box-body'>
              <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola Tulisan anda pada web ini, berikut informasi akun anda saat ini : </p>
              <dl class='dl-horizontal'>
                <dt>Username</dt>
                <dd>$users[username]</dd>

                <dt>Password</dt>
                <dd>***********</dd>

                <dt>Nama Lengkap</dt>
                <dd>$users[nama_lengkap]</dd>

                <dt>Alamat Email</dt>
                <dd>$users[email]</dd>

                <dt>No. Telpon</dt>
                <dd>$users[no_telp]</dd>

                <dt>Level</dt>
                <dd>$users[level]</dd>

                <dt>Hak Akses</dt>
                <dd>"; 
                    $hakakses = mysqli_query($koneksi, "SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$users[id_session]'");
                    while($mod1=mysqli_fetch_array($hakakses)){
                        echo "<a href='$mod1[link]'>$mod1[nama_modul]</a>, ";
                    }
                echo "</dd>
              </dl>
              <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-info'></i> Info Penting!</h4>
                Diharapkan informasi akun sesuai dengan identitas pada Kartu Pengenal anda, Untuk Mengubah informasi Profile anda klik <a href='?module=user&act=edit&id=$_SESSION[sessid]'>disini</a>.
              </div>
            </div>
          </div>
        </div>

        <section class='col-lg-6 connectedSortable'>";
        $feedlist = new rss('https://members.phpmu.com/forum.xml'); /* Ubah link feed disini dengan link feed Anda */
        echo $feedlist->display(5,"Forum Swarakalibata"); /* Angka 7 digunakan untuk menampilkan jumlah artikel */
    echo "</section>";
}