
<div class='row'>
<div class='col-md-12'>
    <div class='panel panel-info'>
        <div class='panel-heading'><?= ucfirst($judul) ?></div>
        <div class='panel-wrapper collapse in' aria-expanded='true'>
            <div class='panel-body'>
              <form action="<?php echo base_url();?>import/add" method="post" enctype="multipart/form-data" class='form-horizontal form-bordered'>
                    <div class='form-body'>
                     ** ) Harap Isikan data yang di butuhkan pada form.
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
</div>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">

      </div>
    </div>
  </div>

  <div class='row'>
      <div class='col-sm-12'>
       <div class="session_flasdata"> <?= $this->session->userdata('message') ?></div>
       <div class='white-box'>
          <h3 class='box-title m-b-0'><?= $judul ?></h3>
          <p class='text-muted m-b-30'>Tabel Data <?= $judul ?></p>
          <div class='table-responsive'>
              <?php echo anchor(site_url('import/tambah'), 'Tambah Data', 'class="btn btn-primary"'); ?>

              <br /><br />
              <table class="table" id="datatables">
                  <thead>
                      <tr>
                          <th width="80px">No</th>
                          <th>Nama</th>
                          <th width="200px">Action</th>
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
                          ajax: {"url": "import/json", "type": "POST"},
                          columns: [
                          {
                              "data": "id",
                              "orderable": false
                          },{"data": "first_name"},
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
                        window.location.href='<?= base_url('import/hapus/') ?>'+n;
                      });
                 }
              </script>
          </div>
      </div>
  </div>
  </div>
