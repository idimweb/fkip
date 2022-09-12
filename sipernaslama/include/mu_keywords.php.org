<?php
if (isset($_GET['judul'])){
   $sql = mysqli_query($koneksi, "select judul from berita where judul_seo='".anti_injection($_GET[judul])."'");
  $j   = mysqli_fetch_array($sql);
	echo "$j[tag]";
}
else{
      $sql2 = mysqli_query($koneksi, "select meta_keyword from identitas LIMIT 1");
      $j2   = mysqli_fetch_array($sql2);
		  echo "$j2[meta_keyword]";
}
?>
