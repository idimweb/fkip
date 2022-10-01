
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
                <label for="varchar" class='control-label col-md-3'><b>Nama<?php echo form_error('nama') ?></b></label>
                <div class='col-md-9'>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="varchar" class='control-label col-md-3'><b>Jabatan<?php echo form_error('jabatan') ?></b></label>
                <div class='col-md-9'>
                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
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
            <input type="hidden" name="id" value="<?php echo $id; ?>" />



            <div class='form-actions'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='row'>
                            <div class='col-md-offset-3 col-md-9'>
                               <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button>
                               <a href="<?php echo site_url('anggota') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


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
