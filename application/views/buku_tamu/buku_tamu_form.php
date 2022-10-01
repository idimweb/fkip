
<div class='row'>
<div class='col-md-12'>
    <div class='panel panel-info'>
        <div class='panel-heading'><?= ucfirst($judul) ?></div>
        <div class='panel-wrapper collapse in' aria-expanded='true'>
            <div class='panel-body'>
                <form action="<?php echo $action; ?>" method="post" class='form-horizontal form-bordered'>
                    <div class='form-body'>
                     ** ) Harap Isikan data yang di butuhkan pada form.
                     <br /><br /><br /><br />
                    <div class="form-group">
                        <label for="varchar" class='control-label col-md-3'><b>Penerima Tamu<?php echo form_error('penerima') ?></b></label>
                        <div class='col-md-9'>
                            <input type="text" class="form-control" name="penerima" id="PIC" placeholder="Penerima Tamu.." data-role="tagsinput" value="<?php echo $penerima; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="varchar" class='control-label col-md-3'><b>Keperluan<?php echo form_error('keperluan') ?></b></label>
                        <div class='col-md-9'>
                            <textarea class="form-control" name="keperluan" id="keperluan" placeholder="Keperluan" value=""><?php echo $keperluan; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="varchar" class='control-label col-md-3'><b>Tamu/Peserta</b></label>
                      <div class='col-md-6'>
                        <table class="table">
                          <tbody id="viewTable">
                            <tr>
                              <td colspan="2">
                                <input type="text" class="form-control" name="nama_peserta[]" id="participan" placeholder="Nama" data-role="" value="<?php echo $nama_peserta; ?>" />
                              </td>
                              <td colspan="2">
                                <input type="text" class="form-control" name="instansi_peserta[]" id="participan" placeholder="instansi" data-role="" value="<?php echo $instansi_peserta; ?>" />
                              </td>
                              <td colspan="2">
                                <input type="tel" class="form-control" name="no_hp_peserta[]" id="participan" placeholder="No. HP" data-role="" value="<?php echo $no_hp_peserta; ?>" />
                              </td>
                              <td colspan="2">
                                <input type="text" class="form-control" name="jabatan_peserta[]" id="participan" placeholder="Jabatan" data-role="" value="<?php echo $jabatan_peserta; ?>" />
                              </td>
                            </tr>
                          </tbody>
                        </table>

                        <br><hr>
                        <button id="openTable" type="button" class="btn btn-success" name="button">Tambah Data </button>
                        <button id="" type="button" class="hapusBaris btn btn-danger" name="button" onclick="ConfirmDelete()">Hapus Data </button>
                      </div>
                    </div>
                    <div class="form-group">
                      <div id="result" style="display:none" class="text-danger">
                        <p>Harus ceklist dulu di kolom Hapus</p>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="varchar" class='control-label col-md-3'><b>Tanggal Tamu Datang<?php echo form_error('tanggal') ?></b></label>
                        <div class='col-md-3'>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="" value="<?php echo $tanggal; ?>" />
                        </div>
                    </div>
                    <input type="hidden" name="id_buku_tamu" value="<?php echo $id_buku_tamu; ?>" />

                    <div class='form-actions'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class='row'>
                                    <div class='col-md-offset-3 col-md-9'>
                                     <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button>
                                     <a href="<?php echo site_url('buku_tamu') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


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
  $(function(){
    <?php if($this->uri->segment(2) == 'edit'): ?>
      var id= <?= $id_notulen ?>;
      $.ajax({
        url:'<?= base_url('notulen_detail/get_detail_json') ?>',
        data:'id_notulen='+id,
        type:'post',
        chace:false,
        dataType:'json',
        success:function(data){
        $('.nilai_notulen').html('<hr /><input type="hidden" name="data_notulen" value="'+data.id_notulen+'"><input type="text" class="form-control" value="'+data.nama_agenda+'" readonly>');
        },error:function(data){
         swal('error','server not response','error');
        }
      });
    <?php else: ?>
    $('.nilai_notulen').html('<div class="alert alert-danger">Silahkan pilih data notulen</div>');
    <?php endif; ?>
    $('#id_notulen').click(function(){
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
                    <th>Dibuat Oleh</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Berakhir</th>
                    <th>Tanggal</th>
                    <th>Tempat</th>
                    <th width="200px">Pilihan</th>
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
            ajax: {"url": "<?= base_url('notulen_detail/json_notulen') ?>", "type": "POST"},
            columns: [
            {
                "data": "id_notulen",
                "orderable": false
            },{"data": "agenda"},{"data": "nama_user"},{"data": "start_time"},{"data": "end_time"},{"data": "date_create"},{"data": "place"},
            {
                "data" : "action",
                "orderable": false,
                "className" : "text-center"
            }
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

 /*pilih agenda*/
    function pilih_agenda(n){
      $.ajax({
         url : '<?= base_url('buku_tamu/get_detail_json') ?>',
         data :'id_notulen='+n,
         type:'post',
         chace:false,
         dataType:'json',
         success:function(data){
           $('.nilai_notulen').html('<hr /><input type="hidden" name="id_notulen" value="'+data.id_notulen+'"><input type="text" class="form-control" value="'+data.nama_agenda+'" readonly>');
           $('#modal_not').modal('hide');
         },error:function(data){
             swal('error','Data tidak respons','error');
         }
      })

    }
</script>

<!-- tambah data -->

<!-- tambah data -->

<script>
  $(document).ready(function() {
    $("#openTable").click(function() {
      $("#viewTable").append("<tr><td colspan='2'><input type='text' class='form-control' name='nama_peserta[]' id='participan' placeholder='Nama' data-role='' value='' /> \
      <td colspan='2'><input type='text' class='form-control' name='instansi_peserta[]' id='participan' placeholder='Instansi' data-role='' value='' /> \
      <td colspan='2'><input type='tel' class='form-control' name='no_hp_peserta[]' id='participan' placeholder='No. HP' data-role='' value='' /> \
      <td colspan='2'><input type='text' class='form-control' name='jabatan_peserta[]' id='participan' placeholder='Jabatan' data-role='' value='' /> \
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
