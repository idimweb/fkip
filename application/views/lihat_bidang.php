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

              <?php
              foreach ($bidang->result_array() as $row) {
              ?>
                <h3>Peserta<?= $row['nama_agenda'] ?></h3>
              <?php
                $id = $row['id_asistensi'];
                break;
              } ?>


              <?php
              if (isset($id) == NULL) {
              ?>
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="5">Jumlah Peserta</th>
                    </tr>
                    <tr>
                      <th width="80px">No</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($prodi->result_array() as $row) {
                    ?>

                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['jumlah'] ?></td>
                      </tr>

                    <?php $no++;
                    } ?>
                  </tbody>
                </table>

              <?php
              } else { ?>
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="5">Jumlah Peserta</th>
                    </tr>
                    <tr>
                      <th width="80px">No</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($bidang->result_array() as $row) {
                    ?>

                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['nama_asistensi'] ?></td>
                        <td><?= $row['jumlah'] ?></td>
                      </tr>

                    <?php $no++;
                    } ?>
                  </tbody>
                </table>
              <?php } ?>



              <hr />
          </div>
        </div>

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
      $('#angg').DataTable();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#asis').DataTable();
    });
  </script>