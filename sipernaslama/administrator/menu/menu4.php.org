<?php
$cek=umenu_akses("?module=iklanatas",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=iklanatas'><i class='fa fa-circle-o'> </i> Iklan Atas </a></li>";
}

$cek=umenu_akses("?module=iklantengah",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=iklantengah'><i class='fa fa-circle-o'> </i> Iklan Home</a></li>";
}

$cek=umenu_akses("?module=pasangiklan",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=pasangiklan'><i class='fa fa-circle-o'> </i> Iklan SideBar</a></li>";
}

?>
