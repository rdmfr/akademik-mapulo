<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<h3 class="mt-3"><?= $title ?></h3>
	<hr>
	<div class="row justify-content-center">
		<div class="col-md-auto mx-auto" style="min-height: 50vh;">
			<div class="card shadow rounded my-5">
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group mb-1">
							<label for="semesterID">Semester ID</label>
							<input type="text" class="form-control" name="semester_id" id="semesterID" placeholder="1,2,3..." required>
							<?= form_error('semester_id') ?>
						</div>

						<div class="form-group mb-1">
							<label for="semester">Semester</label>
							<input type="text" name='semester' class="form-control" id="semester" placeholder="One,Two,..." required>
							<?= form_error('semester') ?>
							<div class="valid-feedback">
							</div>
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
