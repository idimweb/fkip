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
                 <h3 class="box-title">Jumlah Seluruh Peserta dan Kegiatan di FKIP UAD </h3>
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
                 <h3 class="box-title">Tabel Jumlah Kegiatan dan Peserta per Bulan </h3>
                 <table class="table">
                     <thead>
                         <?php
                            if (($this->session->level != 'admin') && ($this->session->level != 'user')) {
                            ?>
                             <tr>
                                 <th>Bulan</th>
                                 <th>Tahun</th>
                                 <th>Jumlah Peserta</th>
                                 <th>Jumlah Kegiatan</th>
                             </tr>
                         <?php } elseif (($this->session->level == 'admin') || ($this->session->level == 'user')) { ?>
                             <tr>
                                 <th>Tahun</th>
                                 <th>Jumlah Peserta</th>
                                 <th>Jumlah Kegiatan</th>
                                 <th>Prodi/Bidang</th>
                                 <th>Lihat Peserta</th>
                             </tr>
                         <?php } ?>
                     </thead>

                     <?php
                        if (($this->session->level != 'admin') && ($this->session->level != 'user')) {
                        ?>
                         <tbody>
                             <?php foreach ($tabel_total_per->result_array() as $row) : ?>
                                 <?php
                                    if (($this->session->level == 'hdp') && ($row['agenda'] == 'Tim Kerja Humas dan Promosi')) {
                                    ?>
                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>

                                     </tr>

                                 <?php
                                    } elseif (($this->session->level == 'ia') && ($row['agenda'] == 'Tim Kerja Implementasi AIK')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'kda') && ($row['agenda'] == 'Tim Kerja Kemahasiswaan dan Alumni')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'kndi') && ($row['agenda'] == 'Tim Kerja Kerjasama Nasional dan Internasional')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'ppdp') && ($row['agenda'] == 'Tim Kerja Pengembangan Pendidikan dan Pembelajaran')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'ps') && ($row['agenda'] == 'Tim Kerja Pengembangan SDM')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'pkrpdp') && ($row['agenda'] == 'Tim Kerja Percepatan kinerja riset, Pengabdian dan Publikasi')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'ta') && ($row['agenda'] == 'Tim Akreditasi')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'pgpaud') && ($row['agenda'] == '(S1) Pendidikan Guru Pendidikan Anak Usia DIni')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'pgsd') && ($row['agenda'] == '(S1) Pendidikan Guru Sekolah Dasar')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'pbio') && ($row['agenda'] == '(S1) Pendidikan Biologi')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'pfis') && ($row['agenda'] == '(S1) Pendidikan Fisika')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'pmat') && ($row['agenda'] == '(S1) Pendidikan Matematika')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'ppkn') && ($row['agenda'] == '(S1) Pendidikan Pancasila dan Kewarganegaraan')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'pbi') && ($row['agenda'] == '(S1) Pendidikan Bahasa Inggris')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'pbsi') && ($row['agenda'] == '(S1) Pendidikan dan Sastra Indonesia')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'bk') && ($row['agenda'] == '(S1) Bimbingan Konseling')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'pvto') && ($row['agenda'] == 'Pendidikan Vokasional Teknik Otomotif')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'pvte') && ($row['agenda'] == 'Pendidikan Vokasional Teknik Elektronika')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'ppg') && ($row['agenda'] == 'Program Profesi Guru')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'mpmat') && ($row['agenda'] == 'Magister Pendidikan Matematika')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'mpbi') && ($row['agenda'] == 'Magister Pendidikan Bahasa Inggris')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'mpfis') && ($row['agenda'] == 'Magister Pendidikan Fisika')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'mp') && ($row['agenda'] == 'Magister Manajemen Pendidikan')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'mpgv') && ($row['agenda'] == 'Magister Pendidikan Guru Vokasi')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } elseif (($this->session->level == 'mbk') && ($row['agenda'] == 'Magister Bimbingan Konseling')) {
                                    ?>

                                     <tr>
                                         <td><?php echo $row['bulan']; ?></td>
                                         <td><?php echo $row['tahun']; ?></td>
                                         <td><?php echo $row['jumlah_peserta']; ?></td>
                                         <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     </tr>

                                 <?php } ?>

                             <?php endforeach; ?>
                         </tbody>


                     <?php } elseif (($this->session->level == 'admin') || ($this->session->level == 'user')) { ?>
                         <tbody>
                             <?php foreach ($tabel_total->result_array() as $row) : ?>
                                 <tr>
                                     <td><?php echo $row['tahun']; ?></td>
                                     <td><?php echo $row['jumlah_peserta']; ?></td>
                                     <td><?php echo $row['jumlah_kegiatan']; ?></td>
                                     <td><?php echo $row['agenda']; ?></td>
                                     <td>
                                         <a href="<?php echo site_url('welcome/peserta_bidang/' . encrypt_url($row['id_notulen'])); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                                     </td>
                                 </tr>
                             <?php endforeach; ?>
                         </tbody>
                     <?php } ?>


                 </table>
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

                 <?php foreach ($total->result_array() as $agen_by) :
                        if (($this->session->level != 'admin') && ($this->session->level != 'user')) {
                    ?> {
                             bulan: '<?= $agen_by['tanggal_mulai'] ?>',
                             peserta: <?= $agen_by['jumlah_peserta'] ?>,
                             kegiatan: <?= $agen_by['jumlah_kegiatan'] ?>,
                         },
                     <?php
                        } elseif (($this->session->level == 'admin') || ($this->session->level == 'user')) {
                        ?> {
                             bulan: '<?= $agen_by['tanggal_mulai'] ?>',
                             peserta: <?= $agen_by['jumlah_peserta'] ?>,
                             kegiatan: <?= $agen_by['jumlah_kegiatan'] ?>,
                         },
                 <?php
                        }
                    endforeach;
                    ?>

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