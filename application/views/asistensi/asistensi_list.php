<div class='row'>
    <div class='col-sm-12'>
        <div class="session_flasdata"> <?= $this->session->userdata('message') ?></div>
        <div class='white-box'>
            <h3 class='box-title m-b-0'><?= $judul ?></h3>
            <p class='text-muted m-b-30'>Tabel Data <?= $judul ?></p>
            <div class='table-responsive'>
                <?php echo anchor(site_url('asistensi/tambah'), 'Tambah Data', 'class="btn btn-primary"'); ?>

                <br /><br />
                <table class="table" id="datatables2">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Nama</th>
                            <th>Bidang</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <!-- humas dan promosi -->
                    <?php
                    $no = 1;
                    foreach ($data_asistensi as $ang) :
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>asistensi/edit/<?= $ang->id_asistensi ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="<?= base_url() ?>asistensi/hapus/<?= $ang->id_asistensi ?>" class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>asistensi/edit/<?= $ang->id_asistensi ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="<?= base_url() ?>asistensi/hapus/<?= $ang->id_asistensi ?>" class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>asistensi/edit/<?= $ang->id_asistensi ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="<?= base_url() ?>asistensi/hapus/<?= $ang->id_asistensi ?>" class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>asistensi/edit/<?= $ang->id_asistensi ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="<?= base_url() ?>asistensi/hapus/<?= $ang->id_asistensi ?>" class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>asistensi/edit/<?= $ang->id_asistensi ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="<?= base_url() ?>asistensi/hapus/<?= $ang->id_asistensi ?>" class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>asistensi/edit/<?= $ang->id_asistensi ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="<?= base_url() ?>asistensi/hapus/<?= $ang->id_asistensi ?>" class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>asistensi/edit/<?= $ang->id_asistensi ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="<?= base_url() ?>asistensi/hapus/<?= $ang->id_asistensi ?>" class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>asistensi/edit/<?= $ang->id_asistensi ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="<?= base_url() ?>asistensi/hapus/<?= $ang->id_asistensi ?>" class="btn btn-danger btn-xs edit">Hapus</a>
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
                                    <?= $ang->prodi ?>
                                </td>
                                <td>
                                    <?= $ang->email ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>asistensi/edit/<?= $ang->id_asistensi ?>" class="btn btn-success btn-xs edit">Edit</a>
                                    <a href="<?= base_url() ?>asistensi/hapus/<?= $ang->id_asistensi ?>" class="btn btn-danger btn-xs edit">Hapus</a>
                                </td>
                            </tr>

                        <?php } ?>

                    <?php endforeach; ?>
                    <!-- humas dan promosi -->
                    <tfoot>
                        <tr>
                            <th width="80px">No</th>
                            <th>Nama</th>
                            <th>Bidang</th>
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
                            <th>Bidang</th>
                            <th>Prodi</th>
                            <th>Email</th>
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
                                "url": "asistensi/json",
                                "type": "POST"
                            },
                            columns: [{
                                    "data": "id_asistensi",
                                    "orderable": false
                                }, {
                                    "data": "nama_asistensi"
                                }, {
                                    "data": "bidang"
                                }, {
                                    "data": "prodi"
                                }, {
                                    "data": "email"
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
                                window.location.href = '<?= base_url('asistensi/hapus/') ?>' + n;
                            });
                    }
                </script>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#datatables2').DataTable();
                    });
                </script>
            </div>
        </div>
    </div>
</div>