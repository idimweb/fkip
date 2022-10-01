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

            <table class="table">
              <thead>
                <tr>
                  <th colspan="5">Jumlah Peserta</th>
                </tr>
                <tr>
                  <th width="80px">No</th>
                  <th>Bulan</th>
                  <th>Anggota</th>
                  <th>Asistensi</th>
                  <th>Staf</th>
                  <th>Tamu</th>
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
                    <td><?php echo $data->staf; ?></td>
                    <td><?php echo $data->tamu; ?></td>
                    <td><?php echo $data->lainya; ?></td>
                    <td><?php echo $data->tahun; ?></td>
                  </tr>



                <?php $no++;
                } ?>
            </table>

            <table class="table">
              <thead>
                <tr>
                  <th colspan="5">Jumlah Total</th>
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
            </table>

            <hr />
          </div>
        </div>

        <table class="table" id="datatables">
          <thead>
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
        <br>

        <h3>Data Pengurus Majelis Diktilitbang PPM</h3>

        <table class="table" id="angg">
          <thead>
            <tr>
              <th width="80px">No</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($anggota as $data) {
            ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?php echo $data->nama; ?></td>
                <td><?php echo $data->jabatan; ?></td>
                <td>
                  <a href="<?php echo base_url('notulen_detail/aktiv_anggota/' . $data->id_anggota); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php
              $no++;
            } ?>
          </tbody>
          <tfoot>
            <tr>
              <th width="80px">No</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
          </tfoot>

        </table>

        <h3>Data Asistensi Majelis Diktilitbang PPM</h3>

        <table class="table" id="asis">
          <thead>
            <tr>
              <th width="80px">No</th>
              <th>Nama</th>
              <th>Bidang</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($asistensi as $data) {
            ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?php echo $data->nama_asistensi; ?></td>
                <td><?php echo $data->bidang; ?></td>
                <td>
                  <a href="<?php echo base_url('notulen_detail/aktiv_asistensi/' . $data->id_asistensi); ?>" target="_blank" class="btn btn-info"><i class="fa fa-bar-chart"></i> Lihat Aktivitas</a>
                </td>
              </tr>

            <?php
              $no++;
            } ?>
          </tbody>
          <tfoot>
            <tr>
              <th width="80px">No</th>
              <th>Nama</th>
              <th>Bidang</th>
              <th>Aksi</th>
            </tr>
          </tfoot>

        </table>
      </div>
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
    $('#angg').DataTable();
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#asis').DataTable();
  });
</script>