<div class="modal fade" id="modal_not" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="width: 20%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class='form-horizontal form-bordered'>
          <div class='form-body'>
            <div class="form-group">
              <div class='col-md-9'>
                <div class="modal-body">
                  <h3>YAKIN MENGHAPUS?</h3>
                </div>
              </div>
            </div>
            <hr>
          </div>
          <?php
          foreach ($notulen_detail as $data) :
          ?>


            <input type="text" name="id_not_detail" value="<?php echo $data->id_not_detail; ?>" />
            <input type="text" name="jumlah" value="<?php echo $data->jumlah; ?>" />

          <?php
          endforeach;
          ?>
          <input type="text" name="id_peserta" value="<?= $id_peserta ?>" />


          <div class='form-actions'>
            <div class='row'>
              <div class='col-md-12'>
                <div class='row'>
                  <div class='col-md-offset-3 col-md-9'>
                    <input type="submit" class="btn btn-danger" name="submit" value="Hapus" />
                    <!-- <button type="submit" class="btn btn-info" name="submit"><i class='fa fa-check'></i><?php echo $button ?></button> -->
                    <a href="<?php echo site_url('notulen_detail') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


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