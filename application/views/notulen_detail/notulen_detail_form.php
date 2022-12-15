<div class='row'>
  <div class='col-md-12'>
    <div class='panel panel-info'>
      <div class='panel-heading'><?= ucfirst($judul) ?></div>
      <div class='panel-wrapper collapse in' aria-expanded='true'>
        <div class='panel-body'>
          <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class='form-horizontal form-bordered'>
            <div class='form-body'>
              ** ) Harap Isikan data yang di butuhkan pada form.
              <br /><br /><br /><br />
              <div class="form-group">
                <label for="int" class='control-label col-md-3'><b>Bidang<?php echo form_error('id_notulen') ?></b></label>
                <div class='col-md-9'>
                  <?php
                  if ($this->session->level == 'hdp') {
                  ?>
                    <input type="text" class="form-control" value="Tim Kerja Humas dan Promosi" readonly />
                    <input type="hidden" name="id_notulen" value="27">

                  <?php
                  } elseif ($this->session->level == 'ia') {
                  ?>

                    <input type="text" class="form-control" value="Tim Kerja Implementasi AIK" readonly />
                    <input type="hidden" name="id_notulen" value="28">

                  <?php } elseif ($this->session->level == 'kda') {
                  ?>

                    <input type="text" class="form-control" value="Tim Kerja Kemahasiswaan dan Alumni" readonly />
                    <input type="hidden" name="id_notulen" value="29">

                  <?php } elseif ($this->session->level == 'kndi') {
                  ?>

                    <input type="text" class="form-control" value="Tim Kerja Kerjasama Nasional dan Internasional" readonly />
                    <input type="hidden" name="id_notulen" value="30">

                  <?php } elseif ($this->session->level == 'ppdp') {
                  ?>

                    <input type="text" class="form-control" value="Tim Kerja Pengembangan Pendidikan dan Pembelajaran" readonly />
                    <input type="hidden" name="id_notulen" value="31">

                  <?php } elseif ($this->session->level == 'ps') {
                  ?>

                    <input type="text" class="form-control" value="Tim Kerja Pengembangan SDM" readonly />
                    <input type="hidden" name="id_notulen" value="32">

                  <?php } elseif ($this->session->level == 'pkrpdp') {
                  ?>

                    <input type="text" class="form-control" value="Tim Kerja Percepatan kinerja riset, Pengabdian dan Publikasi" readonly />
                    <input type="hidden" name="id_notulen" value="33">

                  <?php } elseif ($this->session->level == 'ta') {
                  ?>

                    <input type="text" class="form-control" value="Tim Akreditasi" readonly />
                    <input type="hidden" name="id_notulen" value="34">

                  <?php } elseif ($this->session->level == 'pgpaud') {
                  ?>

                    <input type="text" class="form-control" value="(S1) Pendidikan Guru Pendidikan Anak Usia DIni" readonly />
                    <input type="hidden" name="id_notulen" value="9">

                  <?php } elseif ($this->session->level == 'pgsd') {
                  ?>

                    <input type="text" class="form-control" value="(S1) Pendidikan Guru Sekolah Dasar" readonly />
                    <input type="hidden" name="id_notulen" value="10">

                  <?php } elseif ($this->session->level == 'pbio') {
                  ?>

                    <input type="text" class="form-control" value="(S1) Pendidikan Biologi" readonly />
                    <input type="hidden" name="id_notulen" value="11">

                  <?php } elseif ($this->session->level == 'pfis') {
                  ?>

                    <input type="text" class="form-control" value="(S1) Pendidikan Fisika" readonly />
                    <input type="hidden" name="id_notulen" value="12">

                  <?php } elseif ($this->session->level == 'pmat') {
                  ?>

                    <input type="text" class="form-control" value="(S1) Pendidikan Matematika" readonly />
                    <input type="hidden" name="id_notulen" value="13">

                  <?php } elseif ($this->session->level == 'ppkn') {
                  ?>

                    <input type="text" class="form-control" value="(S1) Pendidikan Pancasila dan Kewarganegaraan" readonly />
                    <input type="hidden" name="id_notulen" value="14">

                  <?php } elseif ($this->session->level == 'pbi') {
                  ?>

                    <input type="text" class="form-control" value="(S1) Pendidikan Bahasa Inggris" readonly />
                    <input type="hidden" name="id_notulen" value="15">

                  <?php } elseif ($this->session->level == 'pbsi') {
                  ?>

                    <input type="text" class="form-control" value="(S1) Pendidikan dan Sastra Indonesia" readonly />
                    <input type="hidden" name="id_notulen" value="16">

                  <?php } elseif ($this->session->level == 'bk') {
                  ?>

                    <input type="text" class="form-control" value="(S1) Bimbingan Konseling" readonly />
                    <input type="hidden" name="id_notulen" value="17">

                  <?php } elseif ($this->session->level == 'pvto') {
                  ?>

                    <input type="text" class="form-control" value="Pendidikan Vokasional Teknik Otomotif" readonly />
                    <input type="hidden" name="id_notulen" value="18">

                  <?php } elseif ($this->session->level == 'pvte') {
                  ?>

                    <input type="text" class="form-control" value="Pendidikan Vokasional Teknik Elektronika" readonly />
                    <input type="hidden" name="id_notulen" value="19">

                  <?php } elseif ($this->session->level == 'ppg') {
                  ?>

                    <input type="text" class="form-control" value="Program Profesi Guru" readonly />
                    <input type="hidden" name="id_notulen" value="20">

                  <?php } elseif ($this->session->level == 'mpmat') {
                  ?>

                    <input type="text" class="form-control" value="Magister Pendidikan Matematika" readonly />
                    <input type="hidden" name="id_notulen" value="21">

                  <?php } elseif ($this->session->level == 'mpbi') {
                  ?>

                    <input type="text" class="form-control" value="Magister Pendidikan Bahasa Inggris" readonly />
                    <input type="hidden" name="id_notulen" value="22">

                  <?php } elseif ($this->session->level == 'mpfis') {
                  ?>

                    <input type="text" class="form-control" value="Magister Pendidikan Fisika" readonly />
                    <input type="hidden" name="id_notulen" value="23">

                  <?php } elseif ($this->session->level == 'mp') {
                  ?>

                    <input type="text" class="form-control" value="Magister Manajemen Pendidikan" readonly />
                    <input type="hidden" name="id_notulen" value="24">

                  <?php } elseif ($this->session->level == 'mpgv') {
                  ?>

                    <input type="text" class="form-control" value="Magister Pendidikan Guru Vokasi" readonly />
                    <input type="hidden" name="id_notulen" value="25">

                  <?php } elseif ($this->session->level == 'mbk') {
                  ?>

                    <input type="text" class="form-control" value="Magister Bimbingan Konseling" readonly />
                    <input type="hidden" name="id_notulen" value="26">

                  <?php } elseif ($this->session->level == 'admin') { ?>


                    <input type="text" class="form-control" id="id_notulen" placeholder="Cari Data Bidang..." />
                    <div class="nilai_notulen"></div>

                  <?php } ?>

                </div>
              </div>
              <div class="form-group">
                <label for="varchar" class='control-label col-md-3'><b>Nama Program/Kegiatan<?php echo form_error('issue') ?></b></label>
                <div class='col-md-9'>
                  <textarea class="form-control" name="issue" id="issue" placeholder="Program/Kegiatan"><?php echo $issue; ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <?php
                if (($this->session->level != 'hdp') && ($this->session->level != 'ia') && ($this->session->level != 'kda') && ($this->session->level != 'kndi') && ($this->session->level != 'ppdp') && ($this->session->level != 'ps') && ($this->session->level != 'pkrpdp') && ($this->session->level != 'ta')) {
                ?>
                  <label for="int" class='control-label col-md-3'><b>Anggota FKIP<?php echo form_error('id_anggota[]') ?></b></label>

                  <div class='col-md-9'>
                    <div class="modal-body">
                      <?php
                      if (($this->session->level == 'admin') || ($this->session->level == 'user')) {

                      ?>
                        <table class="table" id="example">

                        <?php
                      } else {
                        ?>
                          <table class="table" id="">
                          <?php
                        }
                          ?>

                          <thead>
                            <tr>
                              <th width="80px">No</th>
                              <th>Peserta</th>
                              <th>Jabatan</th>
                              <th>Prodi</th>
                              <th width="200px">Kehadiran</th>
                            </tr>
                          </thead>
                          <?php
                          $no = 1;
                          foreach ($anggota as $ang) :
                          ?>
                            <?php
                            if ($this->session->level == 'bk' && $ang->prodi == 'BK') {
                            ?>
                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php
                            } elseif ($this->session->level == 'mp' && $ang->prodi == 'MP') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'mpbi' && $ang->prodi == 'MPBI') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'mpfis' && $ang->prodi == 'MPFIS') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'mpgv' && $ang->prodi == 'MPGV') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'mpmat' && $ang->prodi == 'MPMAT') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'pbi' && $ang->prodi == 'PBI') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'pbio' && $ang->prodi == 'PBIO') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'pbsi' && $ang->prodi == 'PBSI') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'pfis' && $ang->prodi == 'PFIS') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'pgpaud' && $ang->prodi == 'PGPAUD') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'pgsd' && $ang->prodi == 'PGSD') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'pmat' && $ang->prodi == 'PMAT') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'ppg' && $ang->prodi == 'PPG') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'ppkn' && $ang->prodi == 'PPKN') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'pvte' && $ang->prodi == 'PVTE') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'pvto' && $ang->prodi == 'PVTO') {
                            ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } elseif ($this->session->level == 'admin') { ?>

                              <tr>
                                <td>
                                  <?php echo $no++ ?>
                                </td>

                                <td>
                                  <?php echo $ang->nama ?>
                                </td>
                                <td>
                                  <?php echo $ang->jabatan ?>
                                </td>
                                <td>
                                  <?php echo $ang->prodi ?>
                                </td>

                                <td>
                                  <input type='checkbox' id='id_anggota' name='id_anggota[]' value='<?php echo $ang->id_anggota ?>' />
                                </td>
                              </tr>

                            <?php } ?>

                          <?php endforeach; ?>
                          <tfoot>
                            <tr>
                              <th width="80px">No</th>
                              <th>Peserta</th>
                              <th>Jabatan</th>
                              <th>Prodi</th>
                              <th width="200px">Kehadiran</th>
                            </tr>
                          </tfoot>
                          </table>
                    </div>
                  </div>
              </div>
            <?php }
            ?>

            <?php
            if (($this->session->level == 'user') || ($this->session->level == 'admin') || ($this->session->level == 'hdp') || ($this->session->level == 'ia') || ($this->session->level == 'kda') || ($this->session->level == 'kndi') || ($this->session->level == 'ppdp') || ($this->session->level == 'ps') || ($this->session->level == 'pkrpdp') || ($this->session->level == 'ta')) {
            ?>
              <div class="form-group">
                <label for="int" class='control-label col-md-3'><b>Peserta Tim Kerja<?php echo form_error('id_asistensi[]') ?></b></label>
                <div class='col-md-9'>
                  <div class="modal-body">
                    <?php
                    if (($this->session->level == 'admin') || ($this->session->level == 'user')) {

                    ?>
                      <table class="table" id="example2">

                      <?php
                    } else {
                      ?>
                        <table class="table" id="">
                        <?php
                      }
                        ?>
                        <thead>
                          <tr>
                            <th width="80px">No</th>
                            <th>Peserta</th>
                            <th>Tim Kerja</th>
                            <th width="200px">Kehadiran</th>
                          </tr>
                        </thead>
                        <!-- humas dan promosi -->
                        <?php
                        $no = 1;
                        foreach ($asistensi as $ang) :
                        ?>
                          <?php
                          if ($this->session->level == 'hdp' && $ang->bidang == 'Humas dan Promosi') {
                          ?>
                            <tr>
                              <td>
                                <?php echo $no++ ?>
                              </td>

                              <td>
                                <?php echo $ang->nama_asistensi ?>
                              </td>
                              <td>
                                <?php echo $ang->bidang ?>
                              </td>
                              <td>
                                <input type='checkbox' id='id_asistensi' name='id_asistensi[]' value='<?php echo $ang->id_asistensi ?>' />
                              </td>
                            </tr>

                          <?php
                          } elseif ($this->session->level == 'ia' && $ang->bidang == 'Implementasi AIK') {
                          ?>

                            <tr>
                              <td>
                                <?php echo $no++ ?>
                              </td>

                              <td>
                                <?php echo $ang->nama_asistensi ?>
                              </td>
                              <td>
                                <?php echo $ang->bidang ?>
                              </td>
                              <td>
                                <input type='checkbox' id='id_asistensi' name='id_asistensi[]' value='<?php echo $ang->id_asistensi ?>' />
                              </td>
                            </tr>

                          <?php } elseif ($this->session->level == 'kda' && $ang->bidang == 'Kemahasiswaan dan Alumni') {
                          ?>

                            <tr>
                              <td>
                                <?php echo $no++ ?>
                              </td>

                              <td>
                                <?php echo $ang->nama_asistensi ?>
                              </td>
                              <td>
                                <?php echo $ang->bidang ?>
                              </td>
                              <td>
                                <input type='checkbox' id='id_asistensi' name='id_asistensi[]' value='<?php echo $ang->id_asistensi ?>' />
                              </td>
                            </tr>

                          <?php } elseif ($this->session->level == 'kndi' && $ang->bidang == 'Kerjasama Nasional dan Internasional') {
                          ?>

                            <tr>
                              <td>
                                <?php echo $no++ ?>
                              </td>

                              <td>
                                <?php echo $ang->nama_asistensi ?>
                              </td>
                              <td>
                                <?php echo $ang->bidang ?>
                              </td>
                              <td>
                                <input type='checkbox' id='id_asistensi' name='id_asistensi[]' value='<?php echo $ang->id_asistensi ?>' />
                              </td>
                            </tr>

                          <?php } elseif ($this->session->level == 'ppdp' && $ang->bidang == 'Pengembangan Pendidikan dan Pembelajaran') {
                          ?>

                            <tr>
                              <td>
                                <?php echo $no++ ?>
                              </td>

                              <td>
                                <?php echo $ang->nama_asistensi ?>
                              </td>
                              <td>
                                <?php echo $ang->bidang ?>
                              </td>
                              <td>
                                <input type='checkbox' id='id_asistensi' name='id_asistensi[]' value='<?php echo $ang->id_asistensi ?>' />
                              </td>
                            </tr>

                          <?php } elseif ($this->session->level == 'ps' && $ang->bidang == 'Pengembangan SDM') {
                          ?>

                            <tr>
                              <td>
                                <?php echo $no++ ?>
                              </td>

                              <td>
                                <?php echo $ang->nama_asistensi ?>
                              </td>
                              <td>
                                <?php echo $ang->bidang ?>
                              </td>
                              <td>
                                <input type='checkbox' id='id_asistensi' name='id_asistensi[]' value='<?php echo $ang->id_asistensi ?>' />
                              </td>
                            </tr>

                          <?php } elseif ($this->session->level == 'pkrpdp' && $ang->bidang == 'Percepatan kinerja riset, Pengabdian dan Publikasi') {
                          ?>

                            <tr>
                              <td>
                                <?php echo $no++ ?>
                              </td>

                              <td>
                                <?php echo $ang->nama_asistensi ?>
                              </td>
                              <td>
                                <?php echo $ang->bidang ?>
                              </td>
                              <td>
                                <input type='checkbox' id='id_asistensi' name='id_asistensi[]' value='<?php echo $ang->id_asistensi ?>' />
                              </td>
                            </tr>

                          <?php } elseif ($this->session->level == 'ta' && $ang->bidang == 'Tim Akreditasi') {
                          ?>

                            <tr>
                              <td>
                                <?php echo $no++ ?>
                              </td>

                              <td>
                                <?php echo $ang->nama_asistensi ?>
                              </td>
                              <td>
                                <?php echo $ang->bidang ?>
                              </td>
                              <td>
                                <input type='checkbox' id='id_asistensi' name='id_asistensi[]' value='<?php echo $ang->id_asistensi ?>' />
                              </td>
                            </tr>

                          <?php } elseif ($this->session->level == 'admin') { ?>
                            <tr>
                              <td>
                                <?php echo $no++ ?>
                              </td>

                              <td>
                                <?php echo $ang->nama_asistensi ?>
                              </td>
                              <td>
                                <?php echo $ang->bidang ?>
                              </td>
                              <td>
                                <input type='checkbox' id='id_asistensi' name='id_asistensi[]' value='<?php echo $ang->id_asistensi ?>' />
                              </td>
                            </tr>

                          <?php } ?>

                        <?php endforeach; ?>
                        <!-- humas dan promosi -->
                        <tfoot>
                          <tr>
                            <th width="80px">No</th>
                            <th>Peserta</th>
                            <th>Tim Kerja</th>
                            <th width="200px">Kehadiran</th>
                          </tr>
                        </tfoot>
                        </table>
                  </div>
                </div>
              </div>
            <?php } ?>

            <div class="form-group">
              <label for="varchar" class='control-label col-md-3'><b>Peserta Lainya<?php echo form_error('nama_lainya[]') ?></b></label>
              <div class='col-md-6'>
                <table class="table">
                  <tbody id="viewTable">

                  </tbody>
                </table>

                <br>
                <hr>
                <button id="openTable" type="button" class="btn btn-success" name="button"><b>Tambah Data</b> </button>
                <button id="" type="button" class="hapusBaris btn btn-danger" name="button" onclick="ConfirmDelete()">Hapus Data </button>
              </div>
            </div>
            <div class="form-group">
              <div id="result" style="display:none" class="text-danger">
                <p>Harus ceklist dulu di kolom Hapus</p>
              </div>
            </div>

            <!-- <div class="form-group">
              <label for="varchar" class='control-label col-md-3'><b>Tanggal Mulai<?php echo form_error('tanggal_mulai') ?></b></label>
              <div class='col-md-3'>
                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Due Dete" value="<?php echo date("Y-m-d"); ?>" />
              </div>
              <label for="varchar" class='control-label col-md-3'><b> Sampai <?php echo form_error('tanggal_selesai') ?></b></label>
              <div class='col-md-3'>
                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Due Dete" value="<?php echo date("Y-m-d"); ?>" />
              </div>
            </div> -->

            <div class="form-group">
              <label for="varchar" class='control-label col-md-3'><b>Tanggal Mulai<?php echo form_error('tanggal_mulai') ?></b></label>
              <div class='col-md-3'>
                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Due Dete" value="<?php echo date("Y-m-d"); ?>" onchange="updateEndDate()" />

              </div>
              <label for="varchar" class='control-label col-md-3'><b> Sampai <?php echo form_error('tanggal_selesai') ?></b></label>
              <div class='col-md-3'>
                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Due Dete" value="<?php echo date("Y-m-d"); ?>" />
              </div>
            </div>

            <!-- waktu -->

            <div class="form-group">
              <label for="varchar" class='control-label col-md-3'><b>Waktu Mulai<?php echo form_error('waktu_mulai') ?></b></label>
              <div class='col-md-3'>
                <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai" placeholder="" value="<?= date("H:i", strtotime('waktu_mulai')); ?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="varchar" class='control-label col-md-3'><b>Waktu Berakhir<?php echo form_error('waktu_selesai') ?></b></label>
              <div class='col-md-3'>
                <input type="time" class="form-control" name="waktu_selesai" id="waktu_selesai" placeholder="" value="<?= date("H:i", strtotime('waktu_selesai')); ?>" />
              </div>
            </div>

            <div class="form-group">
              <label for="varchar" class='control-label col-md-3'><b>Tempat<?php echo form_error('tempat') ?></b></label>
              <div class='col-md-2'>
                <input type="radio" name="lokasi" onclick="lok()" value="Daring" checked> Daring<br>
              </div>
              <div class='col-md-2'>
                <input type="radio" name="lokasi" onclick="lok()" value="Dekanat"> Luring<br>
              </div>
              <div class='col-md-2'>
                <input type="radio" name="lokasi" onclick="lok()" value="Isi nama tempat"> Daring dan Luring<br>
              </div>
              <div class='col-md-2'>
                <input type="text" class="form-control" name="tempat" id="tempat" value="Daring" placeholder="Tempat" />
              </div>
            </div>

            <div class="form-group">
              <label for="varchar" class='control-label col-md-3'><b>Jenis Kegiatan<?php echo form_error('jenis_kegiatan') ?></b></label>
              <div class='col-md-9'>
                <!-- <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks" value="<?php echo $remarks; ?>" /> -->
                <select class="form-control" name="jenis_kegiatan" id="jenis_kegiatan" required="">
                  <option value="Rapat">Rapat</option>
                  <option value="Pendampingan">Pendampingan</option>
                  <option value="Pembinaan">Pembinaan</option>
                  <option value="Webinar">Webinar</option>
                  <option value="Seminar">Seminar</option>
                  <option value="Workshop">Workshop</option>
                  <option value="Pelatihan">Pelatihan</option>
                  <option value="FGD">FGD</option>
                  <option value="Kunjungan">Kunjungan</option>
                  <option value="Tamu">Tamu</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="varchar" class='control-label col-md-3'><b>Catatan<?php echo form_error('catatan') ?></b></label>

              <div class='col-md-9'>
                <input type="file" class="form-control" name="catatan" id="catatan" placeholder="" value="" />
              </div>
            </div>
            <input type="hidden" name="id_not_detail" value="" />

            <div class='form-actions'>
              <div class='row'>
                <div class='col-md-12'>
                  <div class='row'>
                    <div class='col-md-offset-3 col-md-9'>
                      <input type="submit" class="btn btn-info" name="submit" value="Upload" />
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
</div>

<script type="text/javascript">
  $(function() {
    <?php if ($this->uri->segment(2) == 'edit') : ?>
      var id = <?= $id_notulen ?>;
      $.ajax({
        url: '<?= base_url('notulen_detail/get_detail_json') ?>',
        data: 'id_notulen=' + id,
        type: 'post',
        chace: false,
        dataType: 'json',
        success: function(data) {
          $('.nilai_notulen').html('<hr /><input type="hidden" name="data_notulen" value="' + data.id_notulen + '"><input type="text" class="form-control" value="' + data.nama_agenda + '" readonly>');
        },
        error: function(data) {
          swal('error', 'server not response', 'error');
        }
      });
    <?php else : ?>
      $('.nilai_notulen').html('<div class="alert alert-danger">Silahkan pilih data Bidang</div>');
    <?php endif; ?>
    $('#id_notulen').click(function() {
      $('#modal_not').modal('show');
    });
  });
</script>

<div class="modal fade" id="modal_not" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="width: 80%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table" id="datatables">
          <thead>
            <tr>
              <th width="80px">No</th>
              <th>Agenda</th>
              <th>Created By</th>
              <th width="200px">Action</th>
            </tr>
          </thead>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };

    var t = $("#datatables").DataTable({
      initComplete: function() {
        var api = this.api();
        $('#datatables input')
          .off('.DT')
          .on('keyup.DT', function(e) {
            if (e.keyCode == 13) {
              api.search(this.value).draw();
            }
          });
      },
      oLanguage: {
        sProcessing: "loading..."
      },
      processing: true,
      serverSide: true,
      ajax: {
        "url": "<?= base_url('notulen_detail/json_notulen') ?>",
        "type": "POST"
      },
      columns: [{
          "data": "id_notulen",
          "orderable": false
        }, {
          "data": "agenda"
        }, {
          "data": "nama_user"
        },
        {
          "data": "action",
          "orderable": false,
          "className": "text-center"
        }
      ],
      order: [
        [0, 'desc']
      ],
      rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        var index = page * length + (iDisplayIndex + 1);
        $('td:eq(0)', row).html(index);
      }
    });
  });

  /*pilih agenda*/
  function pilih_agenda(n) {
    $.ajax({
      url: '<?= base_url('notulen_detail/get_detail_json') ?>',
      data: 'id_notulen=' + n,
      type: 'post',
      chace: false,
      dataType: 'json',
      success: function(data) {
        $('.nilai_notulen').html('<hr /><input type="hidden" name="id_notulen" value="' + data.id_notulen + '"><input type="text" class="form-control" value="' + data.nama_agenda + '" readonly>');
        $('#modal_not').modal('hide');
        // Tambahkan kode ini
        var nama_agenda = data.nama_agenda;

        // Gunakan variabel ini di bawah ini
        console.log(nama_agenda);
      },
      error: function(data) {
        swal('error', 'Data tidak respons', 'error');
      }
    })

  }
</script>

<!-- peserta -->

<script type="text/javascript">
  $(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };

    var t = $("#datatables2").DataTable({
      initComplete: function() {
        var api = this.api();
        $('#datatables2 input')
          .off('.DT')
          .on('keyup.DT', function(e) {
            if (e.keyCode == 13) {
              api.search(this.value).draw();
            }
          });
      },
      oLanguage: {
        sProcessing: "loading..."
      },
      processing: true,
      serverSide: true,
      ajax: {
        "url": "<?= base_url('anggota/json_checkbox') ?>",
        "type": "POST"
      },
      columns: [{
          "data": "id_anggota",
          "orderable": false
        }, {
          "data": "nama"
        }, {
          "data": "jabatan"
        },
        {
          "data": "action",
          "orderable": false,
          "className": "text-center"
        }
      ],
      order: [
        [0, 'desc']
      ],
      rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        var index = page * length + (iDisplayIndex + 1);
        $('td:eq(0)', row).html(index);
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
      "pageLength": 100
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example2').DataTable({
      "pageLength": 100
    });
  });
</script>

<!-- asistensi -->

<script type="text/javascript">
  $(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };

    var t = $("#datatables3").DataTable({
      initComplete: function() {
        var api = this.api();
        $('#datatables3 input')
          .off('.DT')
          .on('keyup.DT', function(e) {
            if (e.keyCode == 13) {
              api.search(this.value).draw();
            }
          });
      },
      oLanguage: {
        sProcessing: "loading..."
      },
      processing: true,
      serverSide: true,
      ajax: {
        "url": "<?= base_url('asistensi/json_checkbox') ?>",
        "type": "POST"
      },
      columns: [{
          "data": "id_asistensi",
          "orderable": false
        }, {
          "data": "nama_asistensi"
        }, {
          "data": "bidang"
        },
        {
          "data": "action",
          "orderable": false,
          "className": "text-center"
        }
      ],
      order: [
        [0, 'desc']
      ],
      rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        var index = page * length + (iDisplayIndex + 1);
        $('td:eq(0)', row).html(index);
      }
    });
  });
</script>

<!-- tambah data -->

<script>
  $(document).ready(function() {
    $("#openTable").click(function() {
      $("#viewTable").append("<tr><td colspan='2'><input type='text' class='form-control' name='nama_lainya[]' id='participan' placeholder='Ketik nama' data-role='' value='' /> \
      </td><td><input type='checkbox'  id='' name='hapus'></td>");

    });

    var result = document.getElementById("result");
    $(".hapusBaris").click(function() {
      $("table tbody").find('input[name="hapus"]').each(function() {
        if ($(this).is(":checked")) {
          $(this).parents("tr").remove();
          result.style.display = "none";
        } else if ($(this).is(":not(:checked)")) {
          // $("#result").html("Checkbox is unchecked.");
          result.style.display = "block";
        }
      });
    });

  });
</script>

<!-- Radio Lokasi -->

<script>
  function lok() {
    var lokasi = document.getElementsByName("lokasi");
    var txt = "";
    var i;
    for (i = 0; i < lokasi.length; i++) {
      if (lokasi[i].checked) {
        txt = txt + lokasi[i].value + " ";
      }
    }
    document.getElementById("tempat").value = txt;
  }
</script>

<!-- js tanggal selesai mengikuti tanggal mulai -->

<script>
  function updateEndDate() {
    var start = document.getElementById('tanggal_mulai').value;
    document.getElementById('tanggal_selesai').value = start;
  }
</script>