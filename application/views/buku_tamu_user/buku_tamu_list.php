<div class='row'>
    <div class='col-sm-12'>
     <div class="session_flasdata"> <?= $this->session->userdata('message') ?></div>
     <div class='white-box'>
        <h3 class='box-title m-b-0'><?= $judul ?></h3>
        <p class='text-muted m-b-30'>Tabel Data <?= $judul ?></p>
        <div class='table-responsive'>
            <br /><br />
            <table class="table" id="datatables">
                <thead>
                    <tr>
                        <th width="80px">No</th>
                        <th>Keperluan</th>
                        <th>Penerima Tamu</th>
                        <th>Nama Tamu</th>
                        <th>Instansi</th>
                        <th>No. HP</th>
                        <th>Jabatan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

            </table>

            <script type="text/javascript">
                $(document).ready(function() {
                    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                    {
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
                        ajax: {"url": "buku_tamu_user/json", "type": "POST"},
                        columns: [
                        {
                            "data": "id_buku_tamu",
                            "orderable": false
                        },{"data": "keperluan"},{"data": "penerima"},{"data": "nama_peserta"},{"data": "instansi_peserta"},{"data": "no_hp_peserta"},{"data": "jabatan_peserta"},{"data": "tanggal"},

                        ],
                        order: [[0, 'desc']],
                        rowCallback: function(row, data, iDisplayIndex) {
                            var info = this.fnPagingInfo();
                            var page = info.iPage;
                            var length = info.iLength;
                            var index = page * length + (iDisplayIndex + 1);
                            $('td:eq(0)', row).html(index);
                        }
                    });
                });

                function hapus(n){
                   swal({
                       title: 'Konfirmasi Hapus',
                       text: 'Apakah Anda Yakin Untuk Menghapus Data Ini?',
                       type: 'warning',
                       showCancelButton: true,
                       confirmButtonClass: 'btn-danger',
                       confirmButtonText: 'Ya',
                       closeOnConfirm: false
                   },
                   function(){
                      swal('Hapus Data', 'Data Berhasil Di Hapus', 'success');
                      window.location.href='<?= base_url('buku_tamu/hapus/') ?>'+n;
                    });
               }
            </script>
        </div>
    </div>
</div>
</div>
