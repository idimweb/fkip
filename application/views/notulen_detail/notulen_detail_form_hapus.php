<div class='row'>
  <div class='col-md-12'>
    <div class='white-box'>
      <div class='panel-heading'><?= ucfirst($judul) ?></div>
      <?= $this->session->userdata('message') ?>
      <div class='panel-wrapper collapse in' aria-expanded='true'>
        <div class='panel-body'>
          <div class='form-body'>
            ** ) Hapus data peserta yang tidak sesuai.
            <br /><br /><br /><br />

            <div class="form-group">
              <!-- <label for="int" class='control-label col-md-3'><b>Data Peserta Yang Sudah Hadir</b></label> -->
              <div class='col-md-9'>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <th>
                        Anggota
                      </th>
                      <th>
                        Angka Konfirmasi Hapus
                      </th>
                      <?php
                      $no = 1;
                      foreach ($detail as $item1) {
                        if ($item1->nama != NULL) {

                      ?>
                          <tr>
                            <td><?php echo $item1->nama; ?></td>
                            <td>
                              <?= $item1->id_peserta ?>
                            </td>
                            <td><a href="#" data-toggle="modal" data-target="#modal_anggota" class="btn btn-danger">Hapus Peserta</a></td>
                          </tr>

                      <?php
                        }
                        $no++;
                      }
                      ?>
                      <th>
                        Asistensi
                      </th>
                      <?php
                      $no = 1;
                      foreach ($detail as $item1) {
                        if ($item1->nama_asistensi != NULL) {

                      ?>
                          <tr>
                            <td><?php echo $item1->nama_asistensi; ?></td>
                            <td>
                              <?= $item1->id_peserta ?>
                            </td>
                            <td><a href="#" data-toggle="modal" data-target="#modal_asistensi" class="btn btn-danger">Hapus Peserta</a></td>
                          </tr>

                      <?php
                        }
                        $no++;
                      }
                      ?>
                      <th>
                        Tamu
                      </th>
                      <?php
                      $no = 1;
                      foreach ($detail as $item1) {
                        if ($item1->first_name != NULL) {

                      ?>
                          <tr>
                            <td><?php echo $item1->first_name . ' ' . $item1->last_name; ?></td>
                            <td>
                              <?= $item1->id_peserta ?>
                            </td>
                            <td><a href="#" data-toggle="modal" data-target="#modal_tamu" class="btn btn-danger">Hapus Peserta</a></td>
                          </tr>

                      <?php
                        }
                        $no++;
                      }
                      ?>
                      <th>
                        Staf
                      </th>
                      <?php
                      $no = 1;
                      foreach ($detail as $item1) {
                        if ($item1->nama_staf != NULL) {
                      ?>
                          <tr>
                            <td><?php echo $item1->nama_staf; ?></td>
                            <td>
                              <?= $item1->id_peserta ?>
                            </td>
                            <td><a href="#" data-toggle="modal" data-target="#modal_staf" class="btn btn-danger">Hapus Peserta</a></td>
                          </tr>

                      <?php
                        }
                        $no++;
                      }
                      ?>
                      <th>
                        Tamu/Lainya
                      </th>
                      <?php
                      $no = 1;
                      foreach ($detail as $item1) {
                        if ($item1->nama_lainya != NULL) {
                      ?>
                          <tr>
                            <td><?php echo $item1->nama_lainya; ?></td>
                            <td>
                              <?= $item1->id_peserta ?>
                            </td>
                            <td><a href="#" data-toggle="modal" data-target="#modal_lainya" class="btn btn-danger">Hapus Peserta</a></td>
                          </tr>

                      <?php
                        }
                        $no++;
                      }
                      ?>
                      <tr>
                        <td>Jumlah Peserta <?php echo " | " . $item1->jumlah; ?></td>
                        <td></td>

                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <hr>

            <?php
            foreach ($notulen_detail as $data) :
            ?>

              <input type="hidden" name="id_not_detail" value="<?php echo $data->id_not_detail; ?>" />
              <input type="hidden" name="jumlah" value="<?php echo $data->jumlah; ?>" />

            <?php
            endforeach;
            ?>

            <div class='form-actions'>
              <div class='row'>
                <div class='col-md-12'>
                  <div class='row'>
                    <div class='col-md-offset-3 col-md-9'>
                      <a href="<?php echo base_url('notulen_detail/tampilDetail/' . $data->id_not_detail); ?>" class="btn btn-default"><i class='fa fa-share'></i>Kembali</a>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- modal anggota -->
  <div class="modal fade" id="modal_anggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 20%" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class='panel-heading'><?= ucfirst($judul_anggota) ?></div>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="<?php echo $action_anggota; ?>" method="post" enctype="multipart/form-data" class='form-horizontal form-bordered'>
            <div class='form-body'>
              <div class="form-group">
                <div class='col-md-12'>
                  <div class="modal-body">
                    <h3>Masukan Angka Konfirmasi Hapus</h3>
                    <input type="text" class="text-center" name="id_peserta" value="" />
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <?php
            foreach ($notulen_detail as $data) :
            ?>


              <input type="hidden" name="id_not_detail" value="<?php echo $data->id_not_detail; ?>" />
              <input type="hidden" name="jumlah" value="<?php echo $data->jumlah; ?>" />

            <?php
            endforeach;
            ?>


            <div class='form-actions'>
              <div class='row'>
                <div class='col-md-12'>
                  <div class='row'>
                    <div class='col-md-offset-3 col-md-9'>
                      <input type="submit" class="btn btn-danger" name="submit" value="Hapus" />
                      <a href="<?php echo site_url('notulen_detail/hapus_peserta/' . $data->id_not_detail) ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- modal asistensi -->

  <div class="modal fade" id="modal_asistensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 20%" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class='panel-heading'><?= ucfirst($judul_asistensi) ?></div>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="<?php echo $action_asistensi; ?>" method="post" enctype="multipart/form-data" class='form-horizontal form-bordered'>
            <div class='form-body'>
              <div class="form-group">
                <div class='col-md-12'>
                  <div class="modal-body">
                    <h3>Masukan Angka Konfirmasi Hapus</h3>
                    <input type="text" class="text-center" name="id_peserta" value="" />
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <?php
            foreach ($notulen_detail as $data) :
            ?>


              <input type="hidden" name="id_not_detail" value="<?php echo $data->id_not_detail; ?>" />
              <input type="hidden" name="jumlah" value="<?php echo $data->jumlah; ?>" />

            <?php
            endforeach;
            ?>
            <div class='form-actions'>
              <div class='row'>
                <div class='col-md-12'>
                  <div class='row'>
                    <div class='col-md-offset-3 col-md-9'>
                      <input type="submit" class="btn btn-danger" name="submit" value="Hapus" />
                      <a href="<?php echo site_url('notulen_detail/hapus_peserta/' . $data->id_not_detail) ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- modal tamu -->

  <div class="modal fade" id="modal_tamu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 20%" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class='panel-heading'><?= ucfirst($judul_tamu) ?></div>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="<?php echo $action_tamu; ?>" method="post" enctype="multipart/form-data" class='form-horizontal form-bordered'>
            <div class='form-body'>
              <div class="form-group">
                <div class='col-md-12'>
                  <div class="modal-body">
                    <h3>Masukan Angka Konfirmasi Hapus</h3>
                    <input type="text" class="text-center" name="id_peserta" value="" />
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <?php
            foreach ($notulen_detail as $data) :
            ?>


              <input type="hidden" name="id_not_detail" value="<?php echo $data->id_not_detail; ?>" />
              <input type="hidden" name="jumlah" value="<?php echo $data->jumlah; ?>" />

            <?php
            endforeach;
            ?>

            <div class='form-actions'>
              <div class='row'>
                <div class='col-md-12'>
                  <div class='row'>
                    <div class='col-md-offset-3 col-md-9'>
                      <input type="submit" class="btn btn-danger" name="submit" value="Hapus" />
                      <a href="<?php echo site_url('notulen_detail/hapus_peserta/' . $data->id_not_detail) ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- modal staf -->

  <div class="modal fade" id="modal_staf" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 20%" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class='panel-heading'><?= ucfirst($judul_staf) ?></div>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="<?php echo $action_staf; ?>" method="post" enctype="multipart/form-data" class='form-horizontal form-bordered'>
            <div class='form-body'>
              <div class="form-group">
                <div class='col-md-12'>
                  <div class="modal-body">
                    <h3>Masukan Angka Konfirmasi Hapus</h3>
                    <input type="text" class="text-center" name="id_peserta" value="" />
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <?php
            foreach ($notulen_detail as $data) :
            ?>


              <input type="hidden" name="id_not_detail" value="<?php echo $data->id_not_detail; ?>" />
              <input type="hidden" name="jumlah" value="<?php echo $data->jumlah; ?>" />

            <?php
            endforeach;
            ?>

            <div class='form-actions'>
              <div class='row'>
                <div class='col-md-12'>
                  <div class='row'>
                    <div class='col-md-offset-3 col-md-9'>
                      <input type="submit" class="btn btn-danger" name="submit" value="Hapus" />
                      <a href="<?php echo site_url('notulen_detail/hapus_peserta/' . $data->id_not_detail) ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- modal lainya -->

  <div class="modal fade" id="modal_lainya" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 20%" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class='panel-heading'><?= ucfirst($judul_lainya) ?></div>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="<?php echo $action_lainya; ?>" method="post" enctype="multipart/form-data" class='form-horizontal form-bordered'>
            <div class='form-body'>
              <div class="form-group">
                <div class='col-md-12'>
                  <div class="modal-body">
                    <h3>Masukan Angka Konfirmasi Hapus</h3>
                    <input type="text" class="text-center" name="id_peserta" value="" />
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <?php
            foreach ($notulen_detail as $data) :
            ?>


              <input type="hidden" name="id_not_detail" value="<?php echo $data->id_not_detail; ?>" />
              <input type="hidden" name="jumlah" value="<?php echo $data->jumlah; ?>" />

            <?php
            endforeach;
            ?>

            <div class='form-actions'>
              <div class='row'>
                <div class='col-md-12'>
                  <div class='row'>
                    <div class='col-md-offset-3 col-md-9'>
                      <input type="submit" class="btn btn-danger" name="submit" value="Hapus" />
                      <a href="<?php echo site_url('notulen_detail/hapus_peserta/' . $data->id_not_detail) ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example2').DataTable();
    });
  </script>

  <!-- asistensi -->

  <!-- tambah data -->

  <!-- Radio Lokasi -->

  <script type="text/javascript">
    var url = "<?php echo base_url(); ?>";

    function hapus(id) {
      var r = confirm("Do you want to delete this?")
      if (r == true)
        window.location = url + "user/deleteuser/" + id;
      else
        return false;
    }
  </script>

  <!-- hapus lainya -->

  <script type="text/javascript">
    var url = "<?php echo base_url(); ?>";

    function hapus(id) {
      var r = confirm("Do you want to delete this?")
      if (r == true)
        window.location = url + "notulen_detail/hapus_lainya/" + id;
      else
        return false;
    }
  </script>