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
                 <a href="<?= base_url('Crud_create') ?>" class="btn btn-success">+</a>
             </div>
         </div>
     </div>

     <br />
     <br />

     <div class="row">
         <!-- <div class="col-md-6 col-sm-12 col-xs-12">
             <div class="white-box">
                 <h3 class="box-title">Jumlah Partisipasi Tamu per Tiga Bulan </h3>

                 <div id="triwulan"></div>
             </div>
         </div> -->
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
     </div>



 </div>
 </div>


 <script type="text/javascript">
     $(function() {

         "use strict";

         // Dashboard 1 Morris-chart

         //  Morris.Area({
         //      element: 'morris-area-chart',
         //      data: [

         //          <?php foreach ($agenda_by_status->result_array() as $agen_by) : ?> {
         //                  period: '<?= $agen_by['date_created'] ?>',
         //                  open: <?= $agen_by['open'] ?>,
         //                  closed: <?= $agen_by['closed'] ?>,
         //              },
         //          <?php endforeach; ?>

         //      ],
         //      xkey: 'period',
         //      ykeys: ['open', 'closed'],
         //      labels: ['open', 'closed'],
         //      pointSize: 3,
         //      fillOpacity: 0,
         //      pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      behaveLikeLine: true,
         //      gridLineColor: '#e0e0e0',
         //      lineWidth: 1,
         //      hideHover: 'auto',
         //      lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      resize: true

         //  });

         //  Morris.Bar({
         //      element: 'triwulan',
         //      data: [
         //          <?php foreach ($triwulan1->result_array() as $agen_by) : ?> {
         //                  period: '<?= $agen_by['tahun'] ?>',
         //                  tri1: <?= $agen_by['triwulan1'] ?>,
         //              },
         //          <?php endforeach; ?>
         //          <?php foreach ($triwulan2->result_array() as $agen_by) : ?> {
         //                  period: '<?= $agen_by['tahun'] ?>',
         //                  tri2: <?= $agen_by['triwulan2'] ?>,
         //              },
         //          <?php endforeach; ?>
         //          <?php foreach ($triwulan3->result_array() as $agen_by) : ?> {
         //                  period: '<?= $agen_by['tahun'] ?>',
         //                  tri3: <?= $agen_by['triwulan3'] ?>,
         //              },
         //          <?php endforeach; ?>
         //          <?php foreach ($triwulan4->result_array() as $agen_by) : ?> {
         //                  period: '<?= $agen_by['tahun'] ?>',
         //                  tri4: <?= $agen_by['triwulan4'] ?>,
         //              },
         //          <?php endforeach; ?>
         //      ],
         //      xkey: 'period',
         //      ykeys: ['tri1', 'tri2', 'tri3', 'tri4'],
         //      labels: ['Januari - Maret', 'April - Juni', 'Juli - September', 'Oktober - Desember'],
         //      pointSize: 3,
         //      fillOpacity: 0,
         //      //  pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      behaveLikeLine: true,
         //      gridLineColor: '#e0e0e0',
         //      lineWidth: 1,
         //      hideHover: 'auto',
         //      lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      resize: true
         //  });




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

         //  Morris.Area({
         //      element: 'umum',
         //      data: [

         //          <?php foreach ($umum->result_array() as $dataqr) : ?> {
         //                  bulan: '<?= $dataqr['date_created'] ?>',
         //                  jumlah: <?= $dataqr['jumlah_peserta'] ?>,
         //              },
         //          <?php endforeach; ?>
         //      ],
         //      xkey: 'bulan',
         //      ykeys: ['jumlah'],
         //      labels: ['jumlah'],
         //      pointSize: 3,
         //      fillOpacity: 0,
         //      pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      behaveLikeLine: true,
         //      gridLineColor: '#e0e0e0',
         //      lineWidth: 1,
         //      hideHover: 'auto',
         //      lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      resize: true

         //  });

         //  Morris.Area({
         //      element: 'aik',
         //      data: [

         //          <?php foreach ($aik->result_array() as $dataqr) : ?> {
         //                  bulan: '<?= $dataqr['date_created'] ?>',
         //                  jumlah: <?= $dataqr['jumlah_peserta'] ?>,
         //              },
         //          <?php endforeach; ?>
         //      ],
         //      xkey: 'bulan',
         //      ykeys: ['jumlah'],
         //      labels: ['jumlah'],
         //      pointSize: 3,
         //      fillOpacity: 0,
         //      pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      behaveLikeLine: true,
         //      gridLineColor: '#e0e0e0',
         //      lineWidth: 1,
         //      hideHover: 'auto',
         //      lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      resize: true

         //  });

         //  Morris.Area({
         //      element: 'litbang',
         //      data: [

         //          <?php foreach ($litbang->result_array() as $dataqr) : ?> {
         //                  bulan: '<?= $dataqr['date_created'] ?>',
         //                  jumlah: <?= $dataqr['jumlah_peserta'] ?>,
         //              },
         //          <?php endforeach; ?>
         //      ],
         //      xkey: 'bulan',
         //      ykeys: ['jumlah'],
         //      labels: ['jumlah'],
         //      pointSize: 3,
         //      fillOpacity: 0,
         //      pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      behaveLikeLine: true,
         //      gridLineColor: '#e0e0e0',
         //      lineWidth: 1,
         //      hideHover: 'auto',
         //      lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      resize: true

         //  });

         //  Morris.Area({
         //      element: 'khusus',
         //      data: [

         //          <?php foreach ($khusus->result_array() as $dataqr) : ?> {
         //                  bulan: '<?= $dataqr['date_created'] ?>',
         //                  jumlah: <?= $dataqr['jumlah_peserta'] ?>,
         //              },
         //          <?php endforeach; ?>
         //      ],
         //      xkey: 'bulan',
         //      ykeys: ['jumlah'],
         //      labels: ['jumlah'],
         //      pointSize: 3,
         //      fillOpacity: 0,
         //      pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      behaveLikeLine: true,
         //      gridLineColor: '#e0e0e0',
         //      lineWidth: 1,
         //      hideHover: 'auto',
         //      lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      resize: true

         //  });

         //  Morris.Area({
         //      element: 'akademik',
         //      data: [

         //          <?php foreach ($akademik->result_array() as $dataqr) : ?> {
         //                  bulan: '<?= $dataqr['date_created'] ?>',
         //                  jumlah: <?= $dataqr['jumlah_peserta'] ?>,
         //              },
         //          <?php endforeach; ?>
         //      ],
         //      xkey: 'bulan',
         //      ykeys: ['jumlah'],
         //      labels: ['jumlah'],
         //      pointSize: 3,
         //      fillOpacity: 0,
         //      pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      behaveLikeLine: true,
         //      gridLineColor: '#e0e0e0',
         //      lineWidth: 1,
         //      hideHover: 'auto',
         //      lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      resize: true

         //  });

         //  Morris.Area({
         //      element: 'kerjasama',
         //      data: [

         //          <?php foreach ($kerjasama->result_array() as $dataqr) : ?> {
         //                  bulan: '<?= $dataqr['date_created'] ?>',
         //                  jumlah: <?= $dataqr['jumlah_peserta'] ?>,
         //              },
         //          <?php endforeach; ?>
         //      ],
         //      xkey: 'bulan',
         //      ykeys: ['jumlah'],
         //      labels: ['jumlah'],
         //      pointSize: 3,
         //      fillOpacity: 0,
         //      pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      behaveLikeLine: true,
         //      gridLineColor: '#e0e0e0',
         //      lineWidth: 1,
         //      hideHover: 'auto',
         //      lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      resize: true

         //  });

         //  Morris.Area({
         //      element: 'bukutamu',
         //      data: [

         //          <?php foreach ($bukutamu->result_array() as $dataqr) : ?> {
         //                  bulan: '<?= $dataqr['date_created'] ?>',
         //                  jumlah: <?= $dataqr['jumlah_peserta'] ?>,
         //              },
         //          <?php endforeach; ?>
         //      ],
         //      xkey: 'bulan',
         //      ykeys: ['jumlah'],
         //      labels: ['jumlah'],
         //      pointSize: 3,
         //      fillOpacity: 0,
         //      pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      behaveLikeLine: true,
         //      gridLineColor: '#e0e0e0',
         //      lineWidth: 1,
         //      hideHover: 'auto',
         //      lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      resize: true

         //  });

         //  Morris.Area({
         //      element: 'ptki',
         //      data: [

         //          <?php foreach ($ptki->result_array() as $dataqr) : ?> {
         //                  bulan: '<?= $dataqr['date_created'] ?>',
         //                  jumlah: <?= $dataqr['jumlah_peserta'] ?>,
         //              },
         //          <?php endforeach; ?>
         //      ],
         //      xkey: 'bulan',
         //      ykeys: ['jumlah'],
         //      labels: ['jumlah'],
         //      pointSize: 3,
         //      fillOpacity: 0,
         //      pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      behaveLikeLine: true,
         //      gridLineColor: '#e0e0e0',
         //      lineWidth: 1,
         //      hideHover: 'auto',
         //      lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      resize: true

         //  });

         //  Morris.Area({
         //      element: 'riset',
         //      data: [

         //          <?php foreach ($riset->result_array() as $dataqr) : ?> {
         //                  bulan: '<?= $dataqr['date_created'] ?>',
         //                  jumlah: <?= $dataqr['jumlah_peserta'] ?>,
         //              },
         //          <?php endforeach; ?>
         //      ],
         //      xkey: 'bulan',
         //      ykeys: ['jumlah'],
         //      labels: ['jumlah'],
         //      pointSize: 3,
         //      fillOpacity: 0,
         //      pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      behaveLikeLine: true,
         //      gridLineColor: '#e0e0e0',
         //      lineWidth: 1,
         //      hideHover: 'auto',
         //      lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
         //      resize: true

         //  });




     });
 </script>