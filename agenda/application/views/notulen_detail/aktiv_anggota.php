<div class="row">
	<div class="task-widget2">
		<div class="task-image">
			<img src="<?= base_url('assets/template') ?>/plugins/images/task.jpg" alt="task" class="img-responsive">
			<div class="task-image-overlay"></div>
			<div class="task-detail">
				<h2 class="font-light text-white m-b-0"><?= $this->config->item('selamat_datang') ?></h2>
				<small class="font-normal text-white m-t-5"><?= $this->config->item('deskripsi') ?></small>
			</div>
			<div class="task-add-btn">
				<a href="<?= base_url('Crud_create') ?>" class="btn btn-success">+</a>
			</div>
		</div>
	</div>

	<br />
	<br />

	<div class="row">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="white-box">
				<h3 class="box-title">Grafik Aktivitas <?= $nama; ?></h3>
				<ul class="list-inline text-right">
					<!-- <li>
                         <h5><i class="fa fa-circle text-info m-r-5"></i>open by agenda</h5>
                     </li> -->
					<li>
						<h5><i class="fa fa-circle text-info m-r-5"></i>Jumlah Kegiatan per Bulan</h5>
					</li>
				</ul>
				<div id="aktiv_anggota"></div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="white-box">
				<h3 class="box-title">Data <?= $nama; ?> </h3>
				<ul class="list-inline text-right">
					<!-- <li>
                         <h5><i class="fa fa-circle text-info m-r-5"></i>open by agenda</h5>
                     </li> -->
					<li>
						<h5><i class="fa fa-circle text-info m-r-5"></i>Data Peserta</h5>
					</li>
					<table class="table">
						<tr>
							<td>Nama</td>
							<td><?php echo $nama; ?></td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td><?php echo $jabatan; ?></td>
						</tr>
						<tr>
							<td>No. HP</td>
							<td><?php echo $nohp; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $email; ?></td>
						</tr>

						<tr>
							<td></td>
							<td><a href="<?php echo site_url('buku_tamu') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td>
						</tr>
					</table>
				</ul>
				<div id="umum"></div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(function() {

		"use strict";

		Morris.Area({
			element: 'aktiv_anggota',
			data: [

				<?php foreach ($hasil->result_array() as $dataqr) : ?> {
						bulan: '<?= $dataqr['date_created'] ?>',
						jumlah: <?= $dataqr['jumlah'] ?>,
					},
				<?php endforeach; ?>
			],
			xkey: 'bulan',
			ykeys: ['jumlah'],
			labels: ['jumlah'],
			pointSize: 3,
			fillOpacity: 0,
			pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
			behaveLikeLine: true,
			gridLineColor: '#e0e0e0',
			lineWidth: 1,
			hideHover: 'auto',
			lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
			resize: true

		});

	});
</script>