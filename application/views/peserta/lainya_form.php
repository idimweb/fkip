
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
                      <label for="varchar" class='control-label col-md-3'><b>Nama Tamu/Peserta Lainya</b></label>
                      <div class='col-md-6'>
                        <table class="table">
                          <tbody id="viewTable">
                            <tr>
                              <td colspan="2">
                                <input type="text" class="form-control" name="nama_lainya[]" id="nama_lainya" placeholder="Ketik nama" data-role="" value="<?php echo $nama_lainya; ?>" />
                              </td>
                            </tr>
                          </tbody>
                        </table>

                        <br><hr>
                        <button id="openTable" type="button" class="btn btn-success" name="button"><b>Tambah Data</b> </button>
                        <button id="" type="button" class="hapusBaris btn btn-danger" name="button" onclick="ConfirmDelete()">Hapus Data </button>
                      </div>
                    </div>
                    <div class="form-group">
                      <div id="result" style="display:none" class="text-danger">
                        <p>Harus ceklist dulu di kolom Hapus</p>
                      </div>
                    </div>
                    <input type="hidden" name="id_lainya" value="" />

                    <div class='form-actions'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class='row'>
                                    <div class='col-md-offset-3 col-md-9'>
                                     <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button>
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

<!-- tambah data -->

<script>
  $(document).ready(function() {
    $("#openTable").click(function() {
      $("#viewTable").append("<tr><td colspan='2'><input type='text' class='form-control' name='nama_lainya[]' id='nama_lainya' placeholder='Ketik nama' data-role='' value='' /> \
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
  var lokasi = document.forms[0];
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
