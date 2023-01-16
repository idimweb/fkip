<div class='row'>
    <div class='col-md-12'>
        <div class='panel panel-info'>
            <div class='panel-heading'><?= ucfirst($judul) ?></div>
            <div class='panel-wrapper collapse in' aria-expanded='true'>
                <div class='panel-body'>
                    <form action="<?php echo base_url(); ?>import/add" method="post" enctype="multipart/form-data" class='form-horizontal form-bordered'>
                        <div class='form-body'>
                            ** ) Harap Isikan data prodi yang sesuai contoh : <b>BK, MBK, PBI, MPBI</b>.
                            <p>
                                Berikut template untuk import excel

                            </p>
                            <a href="<?= base_url('assets/uploads/excel/Template.xlsx') ?>" class="btn btn-info btn-xs" style='color:#fff'>Klik Untuk Download Template</a>
                            <br /><br /><br /><br />
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Upload excel file :</b></label>
                                <div class='col-md-9'>
                                    <input type="file" name="uploadFile" value="" /><br><br>
                                    <input type="submit" name="submit" value="Upload" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class='row'>
    <div class='col-sm-12'>
        <div class="session_flasdata"> <?= $this->session->userdata('message') ?></div>
        <div class='white-box'>
            <h3 class='box-title m-b-0'><?= $judul ?></h3>
            <p class='text-muted m-b-30'>Tabel <?= $judul ?></p>
            <div class='table-responsive'>
                <?php echo anchor(site_url('anggota/tambah'), 'Tambah Data', 'class="btn btn-primary"'); ?>

                <br /><br />
                <table class="table" id="datatables2">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Nama</th>
                            <th>jabatan</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <!-- humas dan promosi -->
                    <?php
                    $no = 1;
                    foreach ($data_anggota as $ang) :
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
                                </td>
                            </tr>

                        <?php } elseif ($this->session->level == 'mbk' && $ang->prodi == 'MBK') {
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
                                </td>
                            </tr>

                        <?php } elseif ($this->session->level == 'lab' && $ang->prodi == 'Laboratorium') {
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
                                </td>
                            </tr>

                        <?php } elseif (($this->session->level == 'admin') || ($this->session->level == 'user')) { ?>

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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <?php
                                    $text = encrypt_url($ang->id_anggota);
                                    ?>
                                    <a href="<?= base_url() ?>anggota/edit/<?= $text ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="#" onclick='javasciprt: return hapus(<?= $ang->id_anggota ?>)' class="btn btn-danger btn-xs edit">Hapus</a>
                                </td>
                            </tr>

                        <?php } ?>

                    <?php endforeach; ?>
                    <!-- humas dan promosi -->
                    <tfoot>
                        <tr>
                            <th width="80px">No</th>
                            <th>Nama</th>
                            <th>jabatan</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th width="200px">Action</th>
                        </tr>
                    </tfoot>
                </table>
                <!-- <table class="table" id="datatables">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Prodi</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>

                </table> -->

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
                                "url": "anggota/json",
                                "type": "POST"
                            },
                            columns: [{
                                    "data": "id_anggota",
                                    "orderable": false
                                }, {
                                    "data": "nama"
                                }, {
                                    "data": "jabatan"
                                }, {
                                    "data": "prodi"
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

                    function hapus(n) {
                        swal({
                                title: 'Konfirmasi Hapus',
                                text: 'Apakah Anda Yakin Untuk Menghapus Data Ini?',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonClass: 'btn-danger',
                                confirmButtonText: 'Ya',
                                closeOnConfirm: false
                            },
                            function() {
                                swal('Hapus Data', 'Data Berhasil Di Hapus', 'success');
                                window.location.href = '<?= base_url('anggota/hapus/') ?>' + n;
                            });
                    }
                </script>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#datatables2').DataTable();
                    });
                </script>
                <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function() {
                            $(this).remove();
                        })
                    }, 3000);
                </script>
            </div>
        </div>
    </div>
</div>