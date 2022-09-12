<?php
  error_reporting(0);
?>
<!DOCTYPE HTML>
<html lang = "en">
	<head>
		<title><?php include "include/mu_title.php"; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="index, follow">
		<meta name="description" content="<?php include "include/mu_description.php"; ?>">
		<meta name="keywords" content="<?php include "include/mu_keywords.php"; ?>">
		<meta name="author" content="phpmu.com">
		<meta http-equiv="imagetoolbar" content="no">
		<meta name="language" content="Indonesia">
		<meta name="revisit-after" content="7">
		<meta name="webcrawlers" content="all">
		<meta name="rating" content="general">
		<meta name="spiders" content="all">
		<?php
			$c = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM background")); 
			$iden = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas")); 
			if ($_GET['module']=='detailberita') { 
			  $d = mysqli_fetch_array(mysqli_query($koneksi, "SELECT gambar FROM berita where judul_seo='".anti_injection($_GET[judul])."'"));
			  echo "<meta property=\"og:url\" content=\"$iden[url]/berita-$_GET[judul].html\" >";
			     if (!empty($d[gambar])){
			      	echo "<meta property=\"og:image\" content=\"$iden[url]/foto_berita/small_$d[gambar]\" >";
			     }
			}
		?>
		<link rel="shortcut icon" href="favicon.png" />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />
		<link rel="stylesheet" href="<?php echo "$f[folder]/background/lightbox.css" ?>">
		<link type="text/css" rel="stylesheet" href="<?php echo "$f[folder]/background/$c[gambar]/reset.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$f[folder]/background/$c[gambar]/main-stylesheet.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$f[folder]/background/$c[gambar]/lightbox.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$f[folder]/background/$c[gambar]/shortcode.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$f[folder]/background/$c[gambar]/fonts.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$f[folder]/background/$c[gambar]/gambars.css" ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo "$f[folder]/background/$c[gambar]/responsive.css" ?>" />
		<link rel="stylesheet" href="<?php echo "$f[folder]"; ?>/lightbox/lightbox.css">

	</head>

	<body>
	<div class='demo-settings'></div>
		<div class="boxed">		
			<div class="header">
				<?php include "header.php"; ?>
			</div>
			
			<div class="content">
				<div class="wrapper">				
					<div class="breaking-news">
						<span class="the-title">Breaking News</span>
						<ul>
							<?php
							  $terkini=mysqli_query($koneksi, "SELECT * FROM berita where status='Y' ORDER BY id_berita  DESC LIMIT 10");
							  while($te=mysqli_fetch_array($terkini)){
								echo "<li><a href='berita-$te[judul_seo].html'>$te[judul]</a></li>";
							  }
							?>
						</ul>
					</div>

					<div class="main-content">

						<?php
							if ($_GET['module']=='home'){ 
						?>
							<div class="main-page left">
								<div class="double-block">

									<div class="content-block main right">
										<?php include "content.php"; ?>		
									</div>
									
									<div class="content-block left">
										<?php include "sidebar_kiri.php"; ?>
									</div>
								</div>
							</div>
							<div class="main-sidebar right">
								<?php include "sidebar_kanan.php"; ?>
							</div>
							
						<?php
							}elseif ($_GET['module']=='detailberita'){
								include "detailberita.php";
									echo "<div class='main-sidebar right'>";
										include "sidebar_kanan_berita.php"; 
									echo "</div>";
							
							}elseif ($_GET['module']=='konsultasi'){
								include "konsultasi.php";
									echo "<div class='main-sidebar right'>";
										include "sidebar_kanan_berita.php"; 
									echo "</div>";
							
							}elseif ($_GET['module']=='detailkategori'){
								include "detailkategori.php";
								
							}elseif ($_GET['module']=='hasilcari'){
								include "hasilcari.php";
								
							}elseif ($_GET['module']=='semuaplaylist'){
								include "semuaplaylist.php";
								
							}elseif ($_GET['module']=='semuaagenda'){
								include "semua-agenda.php";
								
							}elseif ($_GET['module']=='detailagenda'){
								include "semua-agenda-detail.php";
									echo "<div class='main-sidebar right'>";
										include "sidebar_kanan_statis.php"; 
									echo "</div>";
								
							}elseif ($_GET['module']=='detailtag'){
								include "detailtag.php";
								
							}elseif ($_GET['module']=='detailmenu'){
								include "detailmenu.php";
									echo "<div class='main-sidebar right'>";
										include "sidebar_kanan_statis.php"; 
									echo "</div>";
								
							}elseif ($_GET['module']=='register'){
								include "register.php";
									echo "<div class='main-sidebar right'>";
										include "sidebar_kanan_statis.php"; 
									echo "</div>";
								
							}elseif ($_GET['module']=='siswa'){
								include "siswa.php";
									echo "<div class='main-sidebar right'>";
										include "sidebar_kanan_statis.php"; 
									echo "</div>";
								
							}elseif ($_GET['module']=='pegawai'){
								include "pegawai.php";
									echo "<div class='main-sidebar right'>";
										include "sidebar_kanan_statis.php"; 
									echo "</div>";
								
							}elseif ($_GET['module']=='hasilpoling'){
								include "polling-hasil.php";
									echo "<div class='main-sidebar right'>";
										include "sidebar_kanan_statis.php"; 
									echo "</div>";
								
							}elseif ($_GET['module']=='lihatpoling'){
								include "polling-lihat.php";
									echo "<div class='main-sidebar right'>";
										include "sidebar_kanan_statis.php"; 
									echo "</div>";
								
							}elseif ($_GET['module']=='detailalbum'){
								include "berita-foto-detail.php";
									echo "<div class='main-sidebar right'>";
										include "sidebar_kanan_statis.php"; 
									echo "</div>";
								
							}elseif ($_GET['module']=='hubungikami'){
								include "hubungi.php";
								
							}elseif ($_GET['module']=='hubungiaksi'){
								include "hubungiaksi.php";
								
							}elseif ($_GET['module']=='semuaalbum'){
								include "berita-foto.php";
								
							}elseif ($_GET['module']=='epaper'){
								include "epaper-list.php";
								
							}elseif ($_GET['module']=='detailepaper'){
								include "epaper-detail.php";
								
							}elseif ($_GET['module']=='play'){
								include "play.php";
								echo "<div class='main-sidebar right'>";
										include "sidebar_video.php"; 
								echo "</div>";
								
							}elseif ($_GET['module']=='hasilcari'){
								include "hasilcari.php";
								
							}elseif ($_GET['module']=='indeksberita'){
								include "indexs-berita.php";
								
							}elseif ($_GET['module']=='semuadownload'){
								include "semua-download.php";
								echo "<div class='main-sidebar right'>";
										include "sidebar_kanan_statis.php"; 
								echo "</div>";
							}
						?>
						<div class="clear-float"></div>
					</div>
				</div>
			</div>

			<footer>
				<div class="footer">
					<?php include "footer.php"; ?>
				</div>
			</footer>
			<?php
			  // Statistik user
			  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
			  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
			  $waktu   = time(); // 
			  $s = mysqli_query($koneksi, "SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
			  if(mysqli_num_rows($s) == 0){
					mysqli_query($koneksi, "INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
			  }else{
					mysqli_query($koneksi, "UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
			  }
			?>
		</div>

		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo "$f[folder]/jscript/jquery-1.11.3.min.js" ?>"></script>
		<script type="text/javascript" src="<?php echo "$f[folder]/jscript/jquery-latest.min.js" ?>"></script>
		<script type="text/javascript" src="<?php echo "$f[folder]/jscript/theme-scripts.js" ?>"></script>
		<script type="text/javascript" src="<?php echo "$f[folder]/jscript/turn.js" ?>"></script>
		<script type="text/javascript" src="<?php echo "$f[folder]/jscript/validasi.js"; ?>"></script>
		
</body>
</html>