<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<h3 class="my-2">
		<span class="fa fa-upload"></span>
		<?= $title ?>
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
	<div class="row justify-content-center">
		<div class="col-md-auto mx-auto">
			<div class="card shadow rounded">
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group mb-1">
							<label for="subject">Subject</label>
							<select name="subject" id="subject" class="form-control">
								<option value="">- Select Subject</option>
								<?php
								foreach ($subject as $sub) { ?>
									<option value="<?= url_title($sub['subject'], '-', true); ?>"><?= $sub['subject'] ?></option>
								<?php } ?>
							</select>
							<?= form_error('subject') ?>
						</div>

						<!-- <div class="form-group mb-1">
							<label for="branch">Branch</label>
							<select name="branch" id="branch" class="form-control">
								<option value="">- Select Branch</option>
								<?php
								foreach ($branch as $br) { ?>
									<option value="<?= $br['branch_id'] ?>"><?= $br['branch'] ?></option>
								<?php } ?>
							</select>
							<?= form_error('branch') ?>
						</div> -->

						<div class="form-group mb-1">
							<label for="note">Note</label>
							<input type="text" name='note' class="form-control" id="note" placeholder="Upload Note">
							<?= form_error('note') ?>
						</div>


						<div class="form-group mb-1">
							<label for="file">File</label>
							<input type="file" name="file" id="file" class="form-control">
							<?= form_error('file') ?>
						</div>

						<div class="form-row my-2 justify-content-end">
							<button type="submit" class="btn btn-primary" name="submit">
								<span class="fa fa-plus"></span>
								Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>
