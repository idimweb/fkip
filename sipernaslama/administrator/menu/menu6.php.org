<?php
$cek=umenu_akses("?module=agenda",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=agenda'><i class='fa fa-circle-o'> </i> Agenda</a></li>";
}

$cek=umenu_akses("?module=sekilasinfo",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=sekilasinfo'><i class='fa fa-circle-o'> </i> Sekilas Info</a></li>";
}

$cek=umenu_akses("?module=poling",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=poling'><i class='fa fa-circle-o'> </i> Jajak Pendapat</a></li>";
}

$cek=umenu_akses("?module=ym",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=ym'><i class='fa fa-circle-o'> </i> Yahoo Messanger</a></li>";
}

$cek=umenu_akses("?module=download",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=download'><i class='fa fa-circle-o'> </i> Download Area</a></li>";
}

$cek=umenu_akses("?module=alamat",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=alamat'><i class='fa fa-circle-o'> </i> Alamat Kontak</a></li>";}

$cek=umenu_akses("?module=hubungi",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=hubungi'><i class='fa fa-circle-o'> </i> Pesan Masuk</a></li>";
}

?>
