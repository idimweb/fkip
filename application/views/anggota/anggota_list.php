<div class='row'>
    <div class='col-sm-12'>
        <div class="session_flasdata"> <?= $this->session->userdata('message') ?></div>
        <div class='white-box'>
            <h3 class='box-title m-b-0'><?= $judul ?></h3>
            <p class='text-muted m-b-30'>Tabel <?= $judul ?></p>
            <div class='table-responsive'>
                <?php echo anchor(site_url('anggota/tambah'), 'Tambah Data', 'class="btn btn-primary"'); ?>

                <br /><br />
                <table class="table" id="datatables">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Prodi</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>

                </table>

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
            </div>
        </div>
    </div>
</div>