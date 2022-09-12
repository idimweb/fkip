<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"><br>	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><br>	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script><br>	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6"> <br>                            <h3><strong>Multiple Insert Dengan Codeigniter</strong></h3>
				<?php echo form_open('blog/insert'); ?>
					<div class="form-group">
				      <label for="nama">Nama Product:</label>
				      <input type="text" class="form-control" id="nama" placeholder="Enter nama" name="nama_product">
				    </div>
				    <div class="form-group">
				      <label for="price">Price:</label>
				      <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
				    </div>
				    <div class="form-group">
				    	<?php foreach($color as $row){ ?>
						    <input type="checkbox" id="color" name="color[]" value="<?php echo $row->id ?>"> <?php echo ucfirst($row->nama_color) ?>
						<?php } ?>
				    </div>
					<button type="submit" class="btn btn-primary">Save</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</body>
</html>
