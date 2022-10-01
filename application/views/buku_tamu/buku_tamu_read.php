<div class='row'>
	<div class='col-sm-12'>
		<?= $this->session->userdata('message') ?>
		<div class='white-box'>
			<h3 class='box-title m-b-0'><?= ucfirst($judul) ?></h3>
			<div class='table-responsive'>

				<table class="table">
					<tr>
						<td>Penerima</td>
						<td><?php echo $penerima; ?></td>
					</tr>
					<tr>
						<td>Keperluan</td>
						<td><?php echo $keperluan; ?></td>
					</tr>
					<tr>
						<td>Nama Peserta/Tamu</td>
						<td><?php echo $nama_peserta; ?></td>
					</tr>
					<tr>
						<td>Instansi Peserta/Tamu</td>
						<td><?php echo $instansi_peserta; ?></td>
					</tr>
					<tr>
						<td>No. HP Peserta/Tamu</td>
						<td><?php echo $no_hp_peserta; ?></td>
					</tr>
					<tr>
						<td>Jabatan Peserta/Tamu</td>
						<td><?php echo $jabatan_peserta; ?></td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td><?php echo $tanggal; ?></td>
					</tr>
					<tr>
						<td></td>
						<td><a href="<?php echo site_url('buku_tamu') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>