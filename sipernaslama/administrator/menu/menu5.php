<?php
$cek=umenu_akses("?module=logo",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){ 
echo "<li><a href='?module=logo'><i class='fa fa-circle-o'> </i> Logo Website</a></li>";
}

$cek=umenu_akses("?module=templates",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=templates'><i class='fa fa-circle-o'> </i> Template Website</a></li>";
}

$cek=umenu_akses("?module=background",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=background'><i class='fa fa-circle-o'> </i> Background Website</a></li>";}
?>
