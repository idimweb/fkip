<div class='row'>
  <div class='col-sm-12'>
    <?= $this->session->userdata('message') ?>
    <div class='white-box'>
      <h3 class='box-title m-b-0'><?= ucfirst($judul) ?></h3>
      <div class='table-responsive'>

        <table class="table">
          <!-- <tr><td>Id Notulen</td><td><?php echo $id_notulen; ?></td></tr> -->

          <?php

          foreach ($hasil as $a) {
            $agenda = $a->issue;
            $tanggal_mulai = $a->tanggal_mulai;
            $tanggal_selesai = $a->tanggal_selesai;
            $waktu_mulai = $a->waktu_mulai;
            $waktu_selesai = $a->waktu_selesai;
            $status = $a->status;
            $tempat = $a->tempat;
            $nama_file = $a->catatan;
            $foto = $a->foto;
          }
          ?>
          <tr>
            <td>Nama Agenda</td>
            <td><?php echo $agenda; ?></td>
            <td></td>
          </tr>
          <tr>
            <td>Tanggal Mulai</td>
            <td><?php echo $tanggal_mulai; ?></td>
            <td></td>
          </tr>
          <tr>
            <td>Tanggal Selesai</td>
            <td><?php echo $a->tanggal_selesai; ?></td>
            <td></td>
          </tr>
          <tr>
            <td>Jam Mulai</td>
            <td><?php echo $a->waktu_mulai; ?></td>
            <td></td>
          </tr>
          <tr>
            <td>Jam Selesai</td>
            <td><?php echo $a->waktu_selesai; ?></td>
            <td></td>
          </tr>
          <tr>
            <td>Status</td>
            <td><?php echo $a->status; ?></td>
            <td></td>
          </tr>
          <tr>
            <td>Tempat</td>
            <td><?php echo $a->tempat; ?></td>
            <td></td>
          </tr>
          <tr>
            <td>Catatan</td>
            <td><a href=" <?= base_url('assets/uploads/file/' . $nama_file)  ?>" class="text-right btn btn-success" target="_blank">Klik Untuk Download <?php echo $nama_file; ?></a></td>
          </tr>
          <tr>

            <td><a href="<?php echo base_url('notulen_detail/edit/' . encrypt_url($a->id_not_detail)); ?>" class="btn btn-info">Edit Detail</a></td>

          </tr>
          <tr>
            <td>Foto</td>
            <td><img src="<?= base_url('assets/uploads/file/' . $foto)  ?>" width="200" /></td>
            <td><a href="<?php echo base_url('notulen_detail/edit_foto/' . encrypt_url($a->id_not_detail)); ?>" class="btn btn-info">Edit Foto</a></td>
          </tr>

          <tr>
            <td>Jumlah Peserta</td>
            <td><?php echo $hasil[0]->jumlah; ?></td>
          </tr>

          <tr>
            <th>Daftar Hadir</th>
          </tr>
          <tr>

            <td>

              <a href="<?php echo base_url('notulen_detail/edit_peserta/' . encrypt_url($a->id_not_detail)); ?>" class="btn btn-info">Tambah Peserta</a>

            </td>
            <td>

              <a href="<?php echo base_url('notulen_detail/hapus_peserta/' . encrypt_url($a->id_not_detail)); ?>" class="btn btn-danger">Hapus Peserta</a>

            </td>
            <td><a href="<?php echo site_url('notulen_detail') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td>
          </tr>
          <th>
            Anggota FKIP UAD
          </th>
          <th></th>
          <tbody>
            <?php
            foreach ($hasil as $item1) {
              if ($item1->nama != NULL) {
                # code...
            ?>
                <tr>
                  <td><?php echo $item1->nama; ?></td>
                </tr>

            <?php
              }
            }
            ?>
            <th>
              TIM KERJA
            </th>
            <?php
            foreach ($hasil as $item1) {
              if ($item1->nama_asistensi != NULL) {
                # code...
            ?>
                <tr>
                  <td><?php echo $item1->nama_asistensi; ?></td>
                </tr>

            <?php
              }
            }
            ?>

            <th>
              LAINYA
            </th>
            <?php
            foreach ($hasil as $item1) {
              if ($item1->nama_lainya != NULL) {
                # code...
            ?>
                <tr>
                  <td><?php echo $item1->nama_lainya; ?></td>
                </tr>

            <?php
              }
            }
            ?>
          </tbody>
          <tr>

          </tr>
        </table>
      </div>
    </div>
  </div>
</div>