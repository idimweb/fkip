<?php
$cek=umenu_akses("?module=berita",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=berita'><i class='fa fa-circle-o'> </i> Berita</a></li>";
}

$cek=umenu_akses("?module=kategori",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=kategori'><i class='fa fa-circle-o'> </i> Kategori Berita </a></li>";
}

$cek=umenu_akses("?module=tag",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=tag'><i class='fa fa-circle-o'> </i> Tag Berita</a></li>";
}

$cek=umenu_akses("?module=komentar",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=komentar'><i class='fa fa-circle-o'> </i> Komentar Berita</a></li>";
}

$cek=umenu_akses("?module=katajelek",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=katajelek'><i class='fa fa-circle-o'> </i> Sensor Komentar</a></li>";
}

$cek=umenu_akses("?module=album",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=album'><i class='fa fa-circle-o'> </i> Berita Foto</a></li>";
}
$cek=umenu_akses("?module=galerifoto",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=galerifoto'><i class='fa fa-circle-o'> </i> Galeri Berita Foto</a></li>";
}


?>
