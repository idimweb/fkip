 <div class="row">
     <div class="task-widget2">
         <div class="task-image">
             <img src="<?= base_url('assets/template') ?>/plugins/images/task.jpg" alt="task" class="img-responsive">
             <div class="task-image-overlay"></div>
             <div class="task-detail">
                 <h2 class="font-light text-white m-b-0"><?= $this->config->item('selamat_datang') ?></h2>
                 <small class="font-normal text-white m-t-5"><?= $this->config->item('deskripsi') ?></small>
             </div>
             <div class="task-add-btn">
                 <a href="<?= base_url('notulen_detail/tambah') ?>" title="Tambah Kegiatan Detail" class="btn btn-success">+</a>
             </div>
         </div>
     </div>

     <br />
     <br />

     <div class="row">
         <div class="col-md-6 col-sm-12 col-xs-12">
             <div class="white-box">
                 <h3 class="box-title">Jumlah Peserta dan Kegiatan per Bulan </h3>
                 <ul class="list-inline text-right">
                     <li>
                         <h5><i class="fa fa-circle text-info m-r-5"></i>Jumlah Peserta</h5>
                     </li>
                     <li>
                         <h5><i class="fa fa-circle text-warning m-r-5"></i>Jumlah Kegiatan</h5>
                     </li>
                 </ul>
                 <div id="total"></div>
             </div>
         </div>
         <div class="col-md-6 col-sm-12 col-xs-12">
             <div class="white-box">
                 <?php
                    // echo $kalender;
                    ?>
             </div>
         </div>
     </div>



 </div>
 </div>


 <script type="text/javascript">
     $(function() {

         "use strict";

         Morris.Area({
             element: 'total',
             data: [

                 <?php foreach ($total->result_array() as $agen_by) : ?> {
                         bulan: '<?= $agen_by['date_created'] ?>',
                         peserta: <?= $agen_by['jumlah_peserta'] ?>,
                         kegiatan: <?= $agen_by['jumlah_kegiatan'] ?>,
                     },
                 <?php endforeach; ?>

             ],
             xkey: 'bulan',
             ykeys: ['peserta', 'kegiatan'],
             labels: ['peserta', 'kegiatan'],
             pointSize: 3,
             fillOpacity: 0,
             pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
             behaveLikeLine: true,
             gridLineColor: '#e0e0e0',
             lineWidth: 1,
             hideHover: 'auto',
             lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
             resize: true


         });


     });
 </script>