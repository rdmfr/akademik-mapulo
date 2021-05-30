<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<h3 class="mt-3"><?= $title ?></h3>
	<hr>
	<?php
	if (isset($this->session->message)) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $this->session->message; ?>
			<button type="button" class="close" data-dismiss='alert' aria-label="close">
				<span aria-hidden="true">&times;</span></button>
		</div>
	<?php
	endif;
	?>
	<div class="row justify-content-center">
		<div class="col-md-auto mx-auto">
			<div class="card shadow rounded">
				<?php foreach ($pengaduan as $row) : ?>
					<div class="card-header">
						<div class="card-img-top"><img src="<?= base_url() ?>assets/uploads/<?= $row['foto'] ?>" alt="foto" class="img-thumbnail"></div>
						<h6 class="card-subtitle my-2 text-muted"><?= $row['tgl_pengaduan'] ?></h6>
					</div>
					<div class="card-body">
						<h5 class="card-title">Isi Laporan :</h5>
						<div class="card-text"><?= $row['isi_laporan'] ?></div>
					</div>
				<?php
				endforeach; ?>
			</div>
		</div>
		<div class="col-md-auto mx-auto mt-3">
			<div class="card shadow rounded">
				<div class="card-header">
					<h5>Tanggapan</h5>
				</div>
				<ul class="list-group list-group-flush">
					<?php foreach ($tanggapan as $tanggap) : ?>
						<li class="list-group-item"><?= "$tanggap[nama_petugas] [$tanggap[tgl_tanggapan]] :" ?>
							<p><?= $tanggap['tanggapan'] ?></p>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
</main>
