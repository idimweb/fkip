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
                                    <?php
                                    if ($this->session->level == 'hdp') {
                                    ?>
                                        <input type="text" class="form-control" name="bidang" value="Humas dan Promosi" readonly />

                                    <?php
                                    } elseif ($this->session->level == 'ia') {
                                    ?>

                                        <input type="text" class="form-control" name="bidang" value="Implementasi AIK" readonly />

                                    <?php } elseif ($this->session->level == 'kda') {
                                    ?>

                                        <input type="text" class="form-control" name="bidang" value="Kemahasiswaan dan Alumni" readonly />

                                    <?php } elseif ($this->session->level == 'kndi') {
                                    ?>

                                        <input type="text" class="form-control" name="bidang" value="Kerjasama Nasional dan Internasional" readonly />

                                    <?php } elseif ($this->session->level == 'ppdp') {
                                    ?>

                                        <input type="text" class="form-control" name="bidang" value="Pengembangan Pendidikan dan Pembelajaran" readonly />

                                    <?php } elseif ($this->session->level == 'ps') {
                                    ?>

                                        <input type="text" class="form-control" name="bidang" value="Pengembangan SDM" readonly />

                                    <?php } elseif ($this->session->level == 'pkrpdp') {
                                    ?>

                                        <input type="text" class="form-control" name="bidang" value="Percepatan kinerja riset, Pengabdian dan Publikasi" readonly />

                                    <?php } elseif ($this->session->level == 'ta') {
                                    ?>

                                        <input type="text" class="form-control" name="bidang" value="Tim Akreditasi" readonly />

                                    <?php } elseif ($this->session->level == 'riset') {
                                    ?>

                                        <input type="text" class="form-control" name="bidang" value="Tim Riset Memahami Karakteristik Mahasiswa FKIP" readonly />

                                    <?php } elseif ($this->session->level == 'admin') { ?>

                                        <label class="col-sm-2 control-label no-padding-right"> <?php echo form_error('bidang') ?></label>
                                        <select class="form-control" name="bidang" required="">
                                            <option value="Humas Dan Promosi">Humas Dan Promosi</option>
                                            <option value="Implementasi AIK">Implementasi AIK</option>
                                            <option value="Kemahasiswaan dan Alumni">Kemahasiswaan dan Alumni</option>
                                            <option value="Kerjasama Nasional dan Internasional">Kerjasama Nasional dan Internasional</option>
                                            <option value="Pengembangan Pendidikan dan Pembelajaran">Pengembangan Pendidikan dan Pembelajaran</option>
                                            <option value="Pengembangan SDM">Pengembangan SDM </option>
                                            <option value="Percepatan kinerja riset, Pengabdian dan Publikasi">Percepatan kinerja riset, Pengabdian dan Publikasi</option>
                                            <option value="Tim Akreditasi">Tim Akreditasi</option>
                                            <option value="Tim Riset Memahami Karakteristik Mahasiswa FKIP">Tim Riset Memahami Karakteristik Mahasiswa FKIP</option>
                                        </select>

                                    <?php } ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Prodi<?php echo form_error('prodi') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="prodi" id="prodi" placeholder="Prodi" value="<?php echo $prodi; ?>" />
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