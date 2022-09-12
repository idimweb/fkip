<?php
session_start();
error_reporting(0);
if (trim($_SESSION['leveluser'])==''){
  echo "<script>document.location='index.php';</script>";
}else{
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";

function user_akses($mod,$id){
  $link = "?module=".$mod;
  global $koneksi;
  $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'"));
  return $cek;
}

function umenu_akses($link,$id){
  global $koneksi;
  $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'"));
  return $cek;
}

function akses_salah(){
  $pesan = "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Maaf Anda tidak berhak mengakses halaman ini</center>";
  $pesan.= "<meta http-equiv='refresh' content='2;url=media.php?module=home'>";
  return $pesan;
}

$jumHub = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM hubungi WHERE dibaca='N'"));
$users= mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users where username='".$_SESSION['namauser']."'"));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WELCOME ADMINISTRATOR</title>
    <meta name="author" content="phpmu.com">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <style type="text/css"> .files{ position:absolute; z-index:2; top:0; left:0; filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; opacity:0; background-color:transparent; color:transparent; } </style>
    <script type="text/javascript" src="assets/plugins/jQuery/jquery-1.12.3.min.js"></script>
    <script language="javascript" type="text/javascript"> 
      var maxAmount = 160;
      function textCounter(textField, showCountField) {
        if (textField.value.length > maxAmount) {
          textField.value = textField.value.substring(0, maxAmount);
        }else{ 
          showCountField.value = maxAmount - textField.value.length;
        }
      }
      
    </script>
    <script src="../ckeditor/ckeditor.js"></script>
    <style type="text/css">
      .checkbox-scroll { border:1px solid #ccc; width:100%; height: 114px; padding-left:8px; overflow-y: scroll; }
    </style>
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
          <?php include "header.php"; ?>
      </header>

      <aside class="main-sidebar">
          <?php include "menu.php"; ?>
      </aside>

      <div class="content-wrapper">
      <?php if ($_GET['module']=='home'){ ?>
        <div class='alert alert-warning alert-dismissible fade in' role='alert' style='border-radius:0px; margin-bottom:0px'>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <a href="https://members.phpmu.com/" style="margin-right:10px; text-decoration:none;">Haloo Selamat datang di halaman administrator, Saat ini anda menggunakan CMS Swarakalibata</a>
          <a target='_BLANK' class="btn btn-default btn-sm" href="https://members.phpmu.com/" style="color: rgb(243, 156, 18);">Swarakalibata V.3.3</a>
        </div>
      <?php } ?>
        
        <section class="content-header">
          <h1> Dashboard <small>Control panel </small> </h1>
        </section>

        <section class="content">
            <?php include "content.php"; ?>
        </section>
        <div style='clear:both'></div>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
          <?php include "footer.php"; ?>
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="assets/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>

    <!-- Bootstrap WYSIHTML5 -->
    <script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>

<script>
  $(function () { 
    $("#example1").DataTable({
      "scrollX": false
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollX": false
    });
  });
</script>
<script>
  $(function () {
    $(".textarea").wysihtml5();
  });

  CKEDITOR.replace('editor1' ,{
      filebrowserImageBrowseUrl : '../kcfinder'
  });
</script>
<script type="text/javascript">
    $('.datepicker').datepicker();
    $('#rangepicker').daterangepicker();
</script>
  </body>
</html>
<?php } ?>