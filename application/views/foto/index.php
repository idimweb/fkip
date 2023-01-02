<!-- Display status message -->
<?php echo !empty($statusMsg) ? '<p class="status-msg">' . $statusMsg . '</p>' : ''; ?>

<!-- File upload form -->
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Choose Files</label>
        <input type="file" class="form-control" name="files[]" multiple />
    </div>
    <div class="form-group">
        <input class="form-control" type="submit" name="fileSubmit" value="UPLOAD" />
    </div>
</form>

<!-- Display uploaded images -->

<h3>Uploaded Files/Images</h3>
<div class="container">
    <div class="row">
        <table>
            <?php for ($i = 0; $i < count($files); $i += 3) : ?>
                <tr>
                    <td>
                        <?php if (isset($files[$i])) : ?>
                            <img src="<?php echo base_url('assets/uploads/file/' . $files[$i]['file_name']); ?>" width="200" height="200">
                            <p>Uploaded On <?php echo date("j M Y", strtotime($files[$i]['uploaded_on'])); ?></p>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (isset($files[$i + 1])) : ?>
                            <img src="<?php echo base_url('assets/uploads/file/' . $files[$i + 1]['file_name']); ?>" width="200" height="200">
                            <p>Uploaded On <?php echo date("j M Y", strtotime($files[$i + 1]['uploaded_on'])); ?></p>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (isset($files[$i + 2])) : ?>
                            <img src="<?php echo base_url('assets/uploads/file/' . $files[$i + 2]['file_name']); ?>" width="200" height="200">
                            <p>Uploaded On <?php echo date("j M Y", strtotime($files[$i + 2]['uploaded_on'])); ?></p>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endfor; ?>
        </table>



    </div>
</div>