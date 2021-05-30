<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="min-height: 80vh;">
	<h3 class="my-2">
		<span class="fa fa-list-alt"></span>
		<?= $title ?>
	</h3>
	</h3>
	</h3>
	<hr>
	<?php
	if (isset($this->session->message)) : ?>
		<div class="alert alert-info" role="alert">
			<?= $this->session->message; ?>
			<button type="button" class="close" data-dismiss='alert' aria-label="close">
				<span aria-hidden="true">&times;</span></button>
		</div>
	<?php
	endif;
	?>
	<div class="container-fluid">
		<!-- <div class="row"> -->
		<ul class="list-group">
			<?php
			foreach ($subject as $sub) {
				/* material list */
				$directory = './assets/uploads/study/' . url_title($sub['subject'], '-', true);
				$list_file = [];
				if (is_dir($directory)) {
					$n = 0; ?>
					<li class="list-group-item btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#listMaterial<?= $sub['subject_id'] ?>" aria-expanded="false" aria-controls="listMaterial<?= $sub['subject_id'] ?>">
						<?= $sub['subject'] ?>
					</li>
					<div id="listMaterial<?= $sub['subject_id'] ?>" class="collapse" aria-labelledby="heading<?= $sub['subject_id'] ?>">
						<ul class="list-group-flush">
							<?php
							foreach (scandir($directory) as $entry) {
								if ($entry == '.' || $entry == '..') {
									continue;
								}
								$materi_name = explode('_', $entry); ?>
								<ul class='list-group'>
									<li class='list-group-item list-group-item-action d-flex justify-content-between'>
										<a href='<?= base_url() . 'assets/uploads/study/' . url_title($sub['subject'], '-', true) . "/$entry" ?>' download='<?= ucwords(join(' ', $materi_name)) ?>'>
											<?= ucwords(join(' ', $materi_name)) ?>
										</a>
									</li>
								</ul>
							<?php
								$n++;
							}
							?>
						</ul>
					</div>
			<?php }
			} ?>
		</ul>
	</div>
</main>
