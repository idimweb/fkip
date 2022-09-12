<?php
session_start();
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
  //cek hak akses user
  $cek=user_akses($_GET['module'],$_SESSION['sessid']);
  if($cek==1 OR $_SESSION['leveluser']=='admin'){

$aksi="modul/mod_background/aksi_background.php";
switch($_GET['act']){

  default: 
	echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Semua Background</h3>

                </div>
                <div class='box-body'>
                  <table class='table table-bordered table-striped'>
                    <thead>
                      <tr>	  
					   <th>Background Terpasang</th>
					   <th width='50px'>Action</th>
					  </tr>
				   </thead>
				   <tbody>";
				   	$no=1;
				    $r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM background ORDER BY id_background DESC"));
				    echo "<tr><td>"; 
						if ($r['gambar'] == '1'){
							echo "<form method=POST action=$aksi?module=background&act=update>";
							echo "<span class='block'><input type=radio name='utama' value='1' checked><b style='color:Red'> Red </b> &nbsp; &nbsp;</span>
								  <input type=radio name='utama' value='2'><b style='color:green'> Green</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='3'><b style='color:blue'> Blue</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='4'><b style='color:orange'> Orange</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='5'><b style='color:#a4028f'> Purple</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='6'><b style='color:#fe3e82'> Pink</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='7'><b style='color:#02967c'> Toska</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='8'><b style='color:#000000'> Black</b> &nbsp; &nbsp;";
						}elseif ($r['gambar'] == '2'){
							echo "<form method=POST action=$aksi?module=background&act=update>";
							echo "<span class='block'><input type=radio name='utama' value='1'><b style='color:Red'> Red </b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='2' checked><b style='color:green'> Green</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='3'><b style='color:blue'> Blue</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='4'><b style='color:orange'> Orange</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='5'><b style='color:#a4028f'> Purple</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='6'><b style='color:#fe3e82'> Pink</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='7'><b style='color:#02967c'> Toska</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='8'><b style='color:#000000'> Black</b> &nbsp; &nbsp;";
						}elseif ($r['gambar'] == '3'){
							echo "<form method=POST action=$aksi?module=background&act=update>";
							echo "<input type=radio name='utama' value='1'><b style='color:Red'> Red </b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='2'><b style='color:green'> Green</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='3' checked><b style='color:blue'> Blue</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='4'><b style='color:orange'> Orange</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='5'><b style='color:#a4028f'> Purple</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='6'><b style='color:#fe3e82'> Pink</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='7'><b style='color:#02967c'> Toska</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='8'><b style='color:#000000'> Black</b> &nbsp; &nbsp;";
						}elseif ($r['gambar'] == '4'){
							echo "<form method=POST action=$aksi?module=background&act=update>";
							echo "<input type=radio name='utama' value='1'><b style='color:Red'> Red </b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='2'><b style='color:green'> Green</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='3'><b style='color:blue'> Blue</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='4' checked><b style='color:orange'> Orange</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='5'><b style='color:#a4028f'> Purple</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='6'><b style='color:#fe3e82'> Pink</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='7'><b style='color:#02967c'> Toska</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='8'><b style='color:#000000'> Black</b> &nbsp; &nbsp;";
						}elseif ($r['gambar'] == '5'){
							echo "<form method=POST action=$aksi?module=background&act=update>";
							echo "<input type=radio name='utama' value='1'><b style='color:Red'> Red </b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='2'><b style='color:green'> Green</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='3'><b style='color:blue'> Blue</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='4'><b style='color:orange'> Orange</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='5' checked><b style='color:#a4028f'> Purple</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='6'><b style='color:#fe3e82'> Pink</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='7'><b style='color:#02967c'> Toska</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='8'><b style='color:#000000'> Black</b> &nbsp; &nbsp;";
						}elseif ($r['gambar'] == '6'){
							echo "<form method=POST action=$aksi?module=background&act=update>";
							echo "<input type=radio name='utama' value='1'><b style='color:Red'> Red </b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='2'><b style='color:green'> Green</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='3'><b style='color:blue'> Blue</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='4'><b style='color:orange'> Orange</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='5'><b style='color:#a4028f'> Purple</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='6' checked><b style='color:#fe3e82'> Pink</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='7'><b style='color:#02967c'> Toska</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='8'><b style='color:#000000'> Black</b> &nbsp; &nbsp;";
						}elseif ($r['gambar'] == '7'){
							echo "<form method=POST action=$aksi?module=background&act=update>";
							echo "<input type=radio name='utama' value='1'><b style='color:Red'> Red </b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='2'><b style='color:green'> Green</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='3'><b style='color:blue'> Blue</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='4'><b style='color:orange'> Orange</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='5'><b style='color:#a4028f'> Purple</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='6'><b style='color:#fe3e82'> Pink</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='7' checked><b style='color:#02967c'> Toska</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='8'><b style='color:#000000'> Black</b> &nbsp; &nbsp;";
						}else{
							echo "<form method=POST action=$aksi?module=background&act=update>";
							echo "<input type=radio name='utama' value='1'><b style='color:Red'> Red </b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='2'><b style='color:green'> Green</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='3'><b style='color:blue'> Blue</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='4'><b style='color:orange'> Orange</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='5'><b style='color:#a4028f'> Purple</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='6'><b style='color:#fe3e82'> Pink</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='7'><b style='color:#02967c'> Toska</b> &nbsp; &nbsp;
								  <input type=radio name='utama' value='8' checked><b style='color:#000000'> Black</b> &nbsp; &nbsp;";
						}
						echo "</td>
		
							   <td><center><input class='btn btn-sm btn-primary' type='submit' name='simpan' class='button' value='Update'></center></td>
							  </tr>";
    				echo "</form></table>";
    break;
  }
  }else{
     echo akses_salah();
}
}
