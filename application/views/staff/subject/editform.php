<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<h3 class="mt-3"><?= $title ?></h3>
	<hr>
	<div class="row justify-content-center">
		<div class="col-md-auto mx-auto" style="min-height: 50vh;">
			<div class="card shadow rounded my-5">
				<?php
				foreach ($subject as $sub) : ?>
					<div class="card-body">
						<form action="" method="post">
							<input type="hidden" name="key" class="form-control" value='<?= $sub['subject_id'] ?>'>
							<div class="form-group mb-1">
								<label for="subjectID">Subject ID</label>
								<input type="text" class="form-control" name="subject_id" id="subjectID" placeholder="Subject ID" value='<?= $sub['subject_id'] ?>' disabled>
								<?= form_error('subject_id') ?>
							</div>

							<div class="form-group mb-1">
								<label for="subject">Subject</label>
								<input type="text" class="form-control" name='subject' id="subject" placeholder="Subject Name" value='<?= $sub['subject'] ?>' required>
								<?= form_error('subject') ?>
								<div class="valid-feedback">
								</div>
							</div>

							<div class="form-row my-2 justify-content-end">
								<button type="submit" class="btn btn-primary" name="submit">Update</button>
							</div>
						</form>

					</div>
				<?php
				endforeach; ?>
			</div>
		</div>
	</div>
</main>
