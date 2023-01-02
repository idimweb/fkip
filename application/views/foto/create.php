<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data</title>
</head>

<body>
    <h1>Tambah Data</h1>
    <form action="<?php echo base_url('foto/store'); ?>" method="post" enctype="multipart/form-data">
        <label for="id_not_detail">id_not_detail</label><br>
        <input type="text" name="id_not_detail" id="id_not_detail"><br><br>

        <label for="foto">foto</label><br>
        <input type="file" name="foto[]" id="foto" multiple><br><br>

        <input type="submit" value="Simpan">
    </form>
</body>

</html>