
<div class='row'>
<div class='col-md-12'>
<div class='panel panel-info'>
<div class='panel-heading'><?= ucfirst($judul) ?></div>
<div class='panel-wrapper collapse in' aria-expanded='true'>
    <div class='panel-body'>
        <form action="<?php echo $action; ?>" method="post" class='form-horizontal form-bordered'>
            <div class='form-body'>
               ** ) Harap Isikan data yang di butuhkan pada form.

            <div class="form-group">
                <label for="varchar" class='control-label col-md-3'><b>Nama<?php echo form_error('nama_asistensi') ?></b></label>
                <div class='col-md-9'>
                    <input type="text" class="form-control" name="nama_asistensi" id="nama_asistensi" placeholder="Nama" value="<?php echo $nama_asistensi; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="varchar" class='control-label col-md-3'><b>Bidang<?php echo form_error('bidang') ?></b></label>
                <div class='col-md-9'>
                    <input type="text" class="form-control" name="bidang" id="jabatan" placeholder="Bidang" value="<?php echo $bidang; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="varchar" class='control-label col-md-3'><b>No HP<?php echo form_error('nohp') ?></b></label>
                <div class='col-md-9'>
                    <input type="text" class="form-control" name="nohp" id="nohp" placeholder="No HP" value="<?php echo $nohp; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="varchar" class='control-label col-md-3'><b>Email<?php echo form_error('email') ?></b></label>
                <div class='col-md-9'>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                </div>
            </div>
            <input type="hidden" name="id_asistensi" value="<?php echo $id_asistensi; ?>" />



            <div class='form-actions'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='row'>
                            <div class='col-md-offset-3 col-md-9'>
                               <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button>
                               <a href="<?php echo site_url('asistensi') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


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
