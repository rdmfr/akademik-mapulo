<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<h3 class="mt-3"><?= $title ?></h3>
	<hr>
	<div class="row justify-content-center">
		<div class="col-md-auto mx-auto" style="min-height: 50vh;">
			<div class="card shadow rounded my-5">
				<?php
				foreach ($result as $res) : ?>
					<div class="card-body">
						<form action="" method="post">
							<input type="hidden" name="key" class="form-control" value='<?= $res['result_id'] ?>'>
							<!-- <div class="form-group mb-1">
							<label for="result_id">Result ID</label>
							<input type="text" class="form-control" name="result_id" id="subject_ID" placeholder="Result ID" required>
							<div class="text-danger text-small"><?= form_error('result_id') ?></div>
						</div> -->

							<div class="form-group mb-1">
								<label for="semester">Semester</label>
								<select name="semester" id="semester" class="form-control">
									<option value="">- Select Semester</option>
									<?php
									foreach ($semester as $sem) {
										$check = ($sem['semester_id'] == $res['semester']) ? 'selected' : ''; ?>
										<option value="<?= $sem['semester_id'] ?>" <?= $check ?>><?= $sem['semester'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group mb-1">
								<label for="subject">Subject</label>
								<select name="subject" id="subject" class="form-control">
									<option value="">- Select Subject</option>
									<?php
									foreach ($subject as $sub) {
										$check = ($sub['subject_id'] == $res['subject']) ? 'selected' : ''; ?>
										<option value="<?= $sub['subject_id'] ?>" <?= $check ?>><?= $sub['subject'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group mb-1">
								<label for="year">Year</label>
								<select name="year" id="year" class="form-control">
									<option value="">- Select Year</option>
									<?php
									for ($i = date('Y'); $i > (date('Y') - 50); $i--) {
										$check = ($i == $res['year']) ? 'selected' : ''; ?>
										<option value="<?= $i ?>" <?= $check ?>><?= $i ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group mb-1">
								<label for="branch">Branch</label>
								<select name="branch" id="branch" class="form-control">
									<option value="">- Select Branch</option>
									<?php
									foreach ($branch as $br) {
										$check = ($br['branch_id'] == $res['branch']) ? 'selected' : ''; ?>
										<option value="<?= $br['branch_id'] ?>" <?= $check ?>><?= $br['branch'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group mb-1">
								<label for="student">Student</label>
								<select name="student" id="student" class="form-control">
									<option value="">- Select Student</option>
									<?php
									foreach ($student as $st) {
										$check = ($st['student_id'] == $res['student_id']) ? 'selected' : ''; ?>
										<option value="<?= $st['student_id'] ?>" <?= $check ?>><?= "$st[first_name] $st[last_name]" ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group mb-1">
								<label for="score">Score</label>
								<input type="number" name="score" class='form-control' id="score" min=0 max=100 value='<?= $res['score'] ?>' required>
							</div>

							<div class=" form-row my-2 justify-content-end">
								<button type="submit" class="btn btn-primary" name="submit">
									<span class="fa fa-pencil-alt"></span>
									Update</button>
							</div>
						</form>

					</div>
				<?php
				endforeach; ?>
			</div>
		</div>
	</div>
</main>
