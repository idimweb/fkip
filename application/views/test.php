<!DOCTYPE html>
<html>

<head>
    <title>Multiple Image Upload</title>
</head>

<body>
    <h1>Multiple Image Upload</h1>
    <form method="post" action="<?php echo base_url('controller/upload_images') ?>" enctype="multipart/form-data">
        <input type="file" name="images[]" multiple>
        <input type="submit" value="Upload">
    </form>
</body>

</html>