<?php
$cek=umenu_akses("?module=identitas",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=identitas'><i class='fa fa-circle-o'> </i> Identitas Website</a></li>"; 
}

$cek=umenu_akses("?module=menu",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=menu'><i class='fa fa-circle-o'> </i> Menu Website</a></li>";
}

$cek=umenu_akses("?module=halamanstatis",$_SESSION['sessid']);
if($cek==1 OR $_SESSION['leveluser']=='admin'){
echo "<li><a href='?module=halamanstatis'><i class='fa fa-circle-o'></i> Halaman Baru</a></li>";
}

?>
