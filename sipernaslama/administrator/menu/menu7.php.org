<?php
$cek=umenu_akses("?module=user",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){ 
echo "<li><a href='?module=user'><i class='fa fa-circle-o'> </i> Manajemen User</a></li>";
}

$cek=umenu_akses("?module=modul",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){ 
echo "<li><a href='?module=modul'><i class='fa fa-circle-o'> </i> Manajemen Modul</a></li>";
}

?>
