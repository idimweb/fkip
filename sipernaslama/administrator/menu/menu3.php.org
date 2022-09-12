<?php
$cek=umenu_akses("?module=video",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=video'><i class='fa fa-circle-o'> </i> Video</a></li>";
}

$cek=umenu_akses("?module=playlist",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=playlist'><i class='fa fa-circle-o'> </i> Playlist Video</a></li>";
}

$cek=umenu_akses("?module=tagvid",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=tagvid'><i class='fa fa-circle-o'> </i> Tag Video</a></li>";
}

$cek=umenu_akses("?module=komentarvid",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=komentarvid'><i class='fa fa-circle-o'> </i> Komentar Video</a></li>";
}

?>
