<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<h3 class="mt-3"><?= $title ?></h3>
	<hr>
	<div class="row justify-content-center">
		<div class="col-md-auto mx-auto" style="min-height: 50vh;">
			<div class="card shadow rounded my-5">
				<?php
				foreach ($semester as $sem) : ?>
					<div class="card-body">
						<form action="" method="post">
							<input type="hidden" name="key" class="form-control" value='<?= $sem['semester_id'] ?>'>
							<div class="form-group mb-1">
								<label for="semesterID">Semester ID</label>
								<input type="text" class="form-control" name="semester_id" id="semesterID" placeholder="1,2,3..." value='<?= $sem['semester_id'] ?>' disabled>
								<?= form_error('semester_id') ?>
							</div>

							<div class="form-group mb-1">
								<label for="semester">Semester</label>
								<input type="text" name='semester' class="form-control" id="semester" placeholder="One,Two,..." value='<?= $sem['semester'] ?>' required>
								<?= form_error('semester') ?>
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
