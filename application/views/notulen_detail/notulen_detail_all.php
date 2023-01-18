<div class='row'>
  <div class='col-sm-12'>
    <?= $this->session->userdata('message') ?>
    <div class='white-box'>
      <h3 class='box-title m-b-0'><?= $judul ?></h3>
      <p class='text-muted m-b-30'>Tabel Data <?= $judul ?></p>
      <div class='table-responsive'>
        <div class="form-group">
          <!-- <label for="varchar" class='control-label col-md-3'><b>Bulan</b></label> -->
          <div class='col-md-9'>
            <?php
            if (($this->session->level == 'admin') || ($this->session->level == 'user')) {
            ?>

              <table class="table" id="datatables">
                <thead>
                  <tr>
                    <th colspan="5">Jumlah Peserta Rapat FKIP</th>
                  </tr>
                  <tr>
                    <th width="80px">No</th>
                    <th>Bulan</th>
                    <th>Anggota FKIP</th>
                    <th>Tim Kerja</th>
                    <th>Lainya</th>
                    <th>Tahun</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $no = 1;
                  foreach ($jumlah_peserta as $data) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <?php
                      if ($data->bulan == 1) {
                        $data->bulan = "Januari";
                      } elseif ($data->bulan == 2) {
                        $data->bulan = "Februari";
                      } elseif ($data->bulan == 3) {
                        $data->bulan = "Maret";
                      } elseif ($data->bulan == 4) {
                        $data->bulan = "April";
                      } elseif ($data->bulan == 5) {
                        $data->bulan = "Mei";
                      } elseif ($data->bulan == 6) {
                        $data->bulan = "Juni";
                      } elseif ($data->bulan == 7) {
                        $data->bulan = "Juli";
                      } elseif ($data->bulan == 8) {
                        $data->bulan = "Agustus";
                      } elseif ($data->bulan == 9) {
                        $data->bulan = "September";
                      } elseif ($data->bulan == 10) {
                        $data->bulan = "Oktober";
                      } elseif ($data->bulan == 11) {
                        $data->bulan = "November";
                      } elseif ($data->bulan == 12) {
                        $data->bulan = "Desember";
                      }
                      ?>
                      <td><?php echo $data->bulan; ?></td>
                      <td><?php echo $data->anggota; ?></td>
                      <td><?php echo $data->asistensi; ?></td>
                      <td><?php echo $data->lainya; ?></td>
                      <td><?php echo $data->tahun; ?></td>
                    </tr>



                  <?php $no++;
                  } ?>
                <tfoot>
                  <th width="80px">No</th>
                  <th>Bulan</th>
                  <th>Anggota FKIP</th>
                  <th>Tim Kerja</th>
                  <th>Lainya</th>
                  <th>Tahun</th>
                </tfoot>
              </table>

              <table class="table" id="datatables2">
                <thead>
                  <tr>
                    <th colspan="5">Jumlah Total Peserta</th>
                  </tr>
                  <tr>
                    <th width="80px">No</th>
                    <th>Bulan</th>
                    <th>Jumlah Kegiatan/Agenda</th>
                    <th>Total Peserta</th>
                    <th>Tahun</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $no = 1;
                  // $sql = "SELECT MONTH(date_created) AS bulan, SUM(jumlah) as jumlah_peserta, COUNT(*) AS jumlah_bulanan FROM notulen_detail GROUP BY MONTH(date_created);";
                  // $query = $this->db->query($sql);
                  foreach ($bulan_tahun as $data) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <?php
                      if ($data->bulan == 1) {
                        $data->bulan = "Januari";
                      } elseif ($data->bulan == 2) {
                        $data->bulan = "Februari";
                      } elseif ($data->bulan == 3) {
                        $data->bulan = "Maret";
                      } elseif ($data->bulan == 4) {
                        $data->bulan = "April";
                      } elseif ($data->bulan == 5) {
                        $data->bulan = "Mei";
                      } elseif ($data->bulan == 6) {
                        $data->bulan = "Juni";
                      } elseif ($data->bulan == 7) {
                        $data->bulan = "Juli";
                      } elseif ($data->bulan == 8) {
                        $data->bulan = "Agustus";
                      } elseif ($data->bulan == 9) {
                        $data->bulan = "September";
                      } elseif ($data->bulan == 10) {
                        $data->bulan = "Oktober";
                      } elseif ($data->bulan == 11) {
                        $data->bulan = "November";
                      } elseif ($data->bulan == 12) {
                        $data->bulan = "Desember";
                      }
                      ?>
                      <td><?php echo $data->bulan; ?></td>
                      <td><?php echo $data->jumlah_bulanan; ?></td>
                      <td><?php echo $data->jumlah_peserta; ?></td>
                      <td><?php echo $data->tahun; ?></td>
                    </tr>



                  <?php $no++;
                  } ?>
                <tfoot>
                  <th width="80px">No</th>
                  <th>Bulan</th>
                  <th>Jumlah Kegiatan/Agenda</th>
                  <th>Total Peserta</th>
                  <th>Tahun</th>
                </tfoot>
              </table>

              <hr />
          </div>
        </div>

        <table class="table" id="datatables3">
          <thead>
            <tr>
              <th colspan="5">Daftar Seluruh Kegiatan</th>
            </tr>
            <tr>
              <th width="80px">No</th>
              <th>Nama Program/Kegiatan</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Jam</th>
              <th>Tempat</th>
              <th>Jumlah Peserta</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach ($notulen_detail as $data) {
            ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?php echo $data->issue; ?></td>
                <td><?php echo $data->tanggal_mulai; ?></td>
                <td><?php echo $data->tanggal_selesai; ?></td>
                <td><?php echo $data->waktu_mulai; ?></td>
                <td><?php echo $data->tempat; ?></td>
                <td><?php echo $data->jumlah; ?></td>
              </tr>

            <?php
                $no++;
              } ?>
          </tbody>
          <tfoot>
            <tr>
              <th width="80px">No</th>
              <th>Nama Program/Kegiatan</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Jam</th>
              <th>Tempat</th>
              <th>Jumlah Peserta</th>
            </tr>
          </tfoot>

        </table>

      <?php } ?>
      <br>
      <?php
      if (($this->session->level == 'user') || ($this->session->level == 'admin') || ($this->session->level == 'hdp') || ($this->session->level == 'ia') || ($this->session->level == 'kda') || ($this->session->level == 'kndi') || ($this->session->level == 'ppdp') || ($this->session->level == 'ps') || ($this->session->level == 'pkrpdp') || ($this->session->level == 'ta') || ($this->session->level == 'riset')) {
      ?>
        <br>
        <h3>Data Tim Kerja</h3>

        <table class="table" id="asis">
          <thead>
            <tr>
              <th width="80px">No</th>
              <th>Nama</th>
              <th>Bidang</th>
              <th>Prodi</th>
              <th>Email</th>
              <th width="200px">Action</th>
            </tr>
          </thead>
          <!-- humas dan promosi -->
          <?php
          $no = 1;
          foreach ($asistensi as $ang) :
          ?>
            <?php
            if ($this->session->level == 'hdp' && $ang->bidang == 'Humas dan Promosi') {
            ?>
              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama_asistensi ?>
                </td>
                <td>
                  <?php echo $ang->bidang ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_asistensi);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_asistensi/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
                <!-- <td>

                <?php
                echo encrypt_url($ang->id_asistensi);
                ?>
              </td> -->
              </tr>

            <?php
            } elseif ($this->session->level == 'ia' && $ang->bidang == 'Implementasi AIK') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama_asistensi ?>
                </td>
                <td>
                  <?php echo $ang->bidang ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_asistensi);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_asistensi/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'kda' && $ang->bidang == 'Kemahasiswaan dan Alumni') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama_asistensi ?>
                </td>
                <td>
                  <?php echo $ang->bidang ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_asistensi);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_asistensi/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'kndi' && $ang->bidang == 'Kerjasama Nasional dan Internasional') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama_asistensi ?>
                </td>
                <td>
                  <?php echo $ang->bidang ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_asistensi);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_asistensi/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'ppdp' && $ang->bidang == 'Pengembangan Pendidikan dan Pembelajaran') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama_asistensi ?>
                </td>
                <td>
                  <?php echo $ang->bidang ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_asistensi);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_asistensi/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'ps' && $ang->bidang == 'Pengembangan SDM') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama_asistensi ?>
                </td>
                <td>
                  <?php echo $ang->bidang ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_asistensi);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_asistensi/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'pkrpdp' && $ang->bidang == 'Percepatan kinerja riset, Pengabdian dan Publikasi') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama_asistensi ?>
                </td>
                <td>
                  <?php echo $ang->bidang ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_asistensi);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_asistensi/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'ta' && $ang->bidang == 'Tim Akreditasi') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama_asistensi ?>
                </td>
                <td>
                  <?php echo $ang->bidang ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_asistensi);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_asistensi/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'riset' && $ang->bidang == 'Tim Riset Memahami Karakteristik Mahasiswa FKIP') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama_asistensi ?>
                </td>
                <td>
                  <?php echo $ang->bidang ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_asistensi);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_asistensi/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif (($this->session->level == 'admin') || ($this->session->level == 'user')) { ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama_asistensi ?>
                </td>
                <td>
                  <?php echo $ang->bidang ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_asistensi);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_asistensi/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } ?>

          <?php endforeach; ?>
          <!-- humas dan promosi -->
          <tfoot>
            <tr>
              <th width="80px">No</th>
              <th>Nama</th>
              <th>Bidang</th>
              <th>Prodi</th>
              <th>Email</th>
              <th width="200px">Action</th>
            </tr>
          </tfoot>
        </table>

      <?php } ?>

      <?php
      if (($this->session->level != 'hdp') && ($this->session->level != 'ia') && ($this->session->level != 'kda') && ($this->session->level != 'kndi') && ($this->session->level != 'ppdp') && ($this->session->level != 'ps') && ($this->session->level != 'pkrpdp') && ($this->session->level != 'ta')) {
      ?>

        <h3>Data Anggota FKIP UAD</h3>

        <table class="table" id="angg">
          <thead>
            <tr>
              <th width="80px">No</th>
              <th>Nama</th>
              <th>jabatan</th>
              <th>Prodi</th>
              <th>Email</th>
              <th width="200px">Action</th>
            </tr>
          </thead>
          <!-- humas dan promosi -->
          <?php
          $no = 1;
          foreach ($anggota as $ang) :
          ?>
            <?php
            if ($this->session->level == 'bk' && $ang->prodi == 'BK') {
            ?>
              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php
            } elseif ($this->session->level == 'mp' && $ang->prodi == 'MP') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'lab' && $ang->prodi == 'Laboratorium') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'mpbi' && $ang->prodi == 'MPBI') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'mpfis' && $ang->prodi == 'MPFIS') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'mpgv' && $ang->prodi == 'MPGV') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'mpmat' && $ang->prodi == 'MPMAT') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'pbi' && $ang->prodi == 'PBI') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'pbio' && $ang->prodi == 'PBIO') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'pbsi' && $ang->prodi == 'PBSI') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'pfis' && $ang->prodi == 'PFIS') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'pgpaud' && $ang->prodi == 'PGPAUD') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'pgsd' && $ang->prodi == 'PGSD') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'pmat' && $ang->prodi == 'PMAT') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'ppg' && $ang->prodi == 'PPG') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'ppkn' && $ang->prodi == 'PPKN') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'pvte' && $ang->prodi == 'PVTE') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif ($this->session->level == 'pvto' && $ang->prodi == 'PVTO') {
            ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } elseif (($this->session->level == 'admin') || ($this->session->level == 'user')) { ?>

              <tr>
                <td>
                  <?php echo $no++ ?>
                </td>

                <td>
                  <?php echo $ang->nama ?>
                </td>
                <td>
                  <?php echo $ang->jabatan ?>
                </td>
                <td>
                  <?= $ang->prodi ?>
                </td>
                <td>
                  <?= $ang->email ?>
                </td>
                <td>
                  <?php
                  $text = encrypt_url($ang->id_anggota);
                  ?>
                  <a href="<?php echo site_url('notulen_detail/aktiv_anggota/' . $text); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php } ?>

          <?php endforeach; ?>
          <!-- humas dan promosi -->
          <tfoot>
            <tr>
              <th width="80px">No</th>
              <th>Nama</th>
              <th>jabatan</th>
              <th>Prodi</th>
              <th>Email</th>
              <th width="200px">Action</th>
            </tr>
          </tfoot>
        </table>

      <?php } ?>

      </div>
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatables').DataTable();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatables2').DataTable();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#angg').DataTable();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#asis').DataTable();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatables3').DataTable();
    });
  </script>