<div class='row'>
  <div class='col-md-12'>
    <div class='panel panel-info'>
      <div class='panel-heading'><?= ucfirst($judul) ?></div>
      <div class='panel-wrapper collapse in' aria-expanded='true'>
        <div class='panel-body'>
          <?= $this->session->flashdata('message') ?>
          <form action="<?php echo $action; ?>" method="post" class='form-horizontal form-bordered' enctype="multipart/form-data">
            <div class='form-body'>
              ** ) Harap Isikan data yang di butuhkan pada form.
              <br /><br /><br /><br />

              <div class="form-group">
                <label for="agenda" class='control-label col-md-3'><b>Agenda<?php echo form_error('agenda') ?></b></label>

                <div class='col-md-9'>
                  <textarea class="form-control" rows="3" name="agenda" id="agenda" placeholder="Agenda"><?php echo $agenda; ?></textarea>
                </div>
              </div>

              <input type="hidden" name="id_notulen" value="<?php echo $id_notulen; ?>" />
              <div class='form-actions'>
                <div class='row'>
                  <div class='col-md-12'>
                    <div class='row'>
                      <div class='col-md-offset-3 col-md-9'>
                        <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button>
                        <a href="<?php echo site_url('notulen') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


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
</div>