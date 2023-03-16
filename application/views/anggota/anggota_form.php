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
                                <label for="varchar" class='control-label col-md-3'><b>Prodi<?php echo form_error('prodi') ?></b></label>
                                <div class='col-md-9'>
                                    <?php
                                    if ($this->session->level == 'bk') {
                                    ?>
                                        <input type="text" class="form-control" name="prodi" value="BK" readonly />

                                    <?php
                                    } elseif ($this->session->level == 'mp') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="MP" readonly />

                                    <?php } elseif ($this->session->level == 'mpbi') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="MPBI" readonly />

                                    <?php } elseif ($this->session->level == 'mpfis') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="MPFIS" readonly />

                                    <?php } elseif ($this->session->level == 'mpgv') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="MPGV" readonly />

                                    <?php } elseif ($this->session->level == 'mpmat') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="MPMAT" readonly />

                                    <?php } elseif ($this->session->level == 'pbi') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="PBI" readonly />

                                    <?php } elseif ($this->session->level == 'pbio') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="PBIO" readonly />

                                    <?php } elseif ($this->session->level == 'pbsi') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="PBSI" readonly />

                                    <?php } elseif ($this->session->level == 'pfis') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="PFIS" readonly />

                                    <?php } elseif ($this->session->level == 'pgpaud') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="PGPAUD" readonly />

                                    <?php } elseif ($this->session->level == 'pgsd') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="PGSD" readonly />

                                    <?php } elseif ($this->session->level == 'pmat') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="PMAT" readonly />

                                    <?php } elseif ($this->session->level == 'ppg') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="PPG" readonly />

                                    <?php } elseif ($this->session->level == 'ppkn') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="PPKN" readonly />

                                    <?php } elseif ($this->session->level == 'pvte') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="PVTE" readonly />

                                    <?php } elseif ($this->session->level == 'pvto') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="PVTO" readonly />

                                    <?php } elseif ($this->session->level == 'mbk') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="MBK" readonly />

                                    <?php } elseif ($this->session->level == 'lab') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="Laboratorium" readonly />

                                    <?php } elseif ($this->session->level == 'Senat') {
                                    ?>

                                        <input type="text" class="form-control" name="prodi" value="Senat" readonly />

                                    <?php } elseif ($this->session->level == 'admin') { ?>

                                        <label class="col-sm-2 control-label no-padding-right"> <?php echo form_error('prodi') ?></label>
                                        <select class="form-control" name="prodi" required="">
                                            <option value="DEKANAT">DEKANAT</option>
                                            <option value="BK">BK</option>
                                            <option value="PBI">PBI</option>
                                            <option value="PBSI">PBSI</option>
                                            <option value="PMAT">PMAT</option>
                                            <option value="PFIS">PFIS</option>
                                            <option value="PPKN">PPKN</option>
                                            <option value="PBIO">PBIO</option>
                                            <option value="PGSD">PGSD</option>
                                            <option value="PGPAUD">PGPAUD</option>
                                            <option value="PVTO">PVTO</option>
                                            <option value="PVTE">PVTE</option>
                                            <option value="PPG">PPG</option>
                                            <option value="MBK">MBK</option>
                                            <option value="MPMAT">MPMAT</option>
                                            <option value="MP">MP</option>
                                            <option value="MPBI">MPBI</option>
                                            <option value="MPFIS">MPFIS</option>
                                            <option value="MPGV">MPGV</option>
                                        </select>

                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Email<?php echo form_error('email') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                                </div>
                            </div>
                            <input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>" />



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