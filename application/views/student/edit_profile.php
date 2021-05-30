<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<h3 class="mt-3"></h3>
	<hr>
	<div class="row justify-content-center">
		<div class="col-md-auto mx-auto">
			<div class="card shadow rounded">
				<?php
				foreach ($student as $std) : ?>
					<div class="card-body">
						<form action="" method="post">
							<input type="hidden" name="key" class="form-control" value='<?= $std['student_id'] ?>'>
							<div class="form-group mb-1">
								<label for="studentID">Student ID</label>
								<input type="text" class="form-control" name="student_id" id="studentID" placeholder="Student ID" value='<?= $std['student_id'] ?>' disabled>
								<?= form_error('student_id') ?>
							</div>

							<div class="form-group mb-1">
								<div class="form-row ">
									<div class="col-md-6">
										<?= form_error('first_name') ?>
										<label for="firstName">First name</label>
										<input type="text" name='first_name' class="form-control " id="firstName" placeholder="First Name" value='<?= $std['first_name'] ?>' required>
										<div class="valid-feedback">

										</div>
									</div>
									<div class="col-md-6">
										<label for="lastName">Last name</label>
										<input type="text" name='last_name' class="form-control " id="lastName" placeholder="Last name" value='<?= $std['last_name'] ?>' required>
										<div class="valid-feedback">
											Looks good! <?= form_error('last_name') ?>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group mb-1">
								<label for="gender">Gender</label>
								<div class="form-row">
									<?php
									$gender = ['male', 'female'];
									foreach ($gender as $gen) :
										$check = ($std['gender'] == ucfirst($gen)) ? "checked" : ""; ?>
										<div class="col">
											<div class=" custom-control custom-radio">
												<input type="radio" id="<?= $gen ?>" name="gender" value="<?= ucfirst($gen) ?>" class="custom-control-input" <?= $check ?>>
												<label class="custom-control-label" for="<?= $gen ?>"><?= ucfirst($gen) ?></label>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
								<?= form_error('gender') ?>
							</div>

							<div class="form-group mb-1">
								<label for="telp">Contact No</label>
								<input type="tel" class="form-control" name="contact_no" id="contact_no" placeholder="E.g 0123-4567-7890" value='<?= $std['contact_no'] ?>' required>
								<?= form_error('contact_no') ?>
							</div>

							<div class="form-group mb-1">
								<label for="address">Address</label>
								<textarea name="address" class="form-control" id="address" placeholder='E.g 15th Street Avenue'><?= $std['address'] ?></textarea>
								<?= form_error('address') ?>
							</div>

							<div class="form-group mb-1">
								<label for="branch">Branch</label>
								<select name="branch" id="branch" class="form-control">
									<option value="">- Select Branch</option>
									<?php
									foreach ($branch as $br) {
										$check = ($br['branch_id'] == $std['branch']) ? 'selected' : ''; ?>
										<option value="<?= $br['branch_id'] ?>" <?= $check ?>><?= $br['branch'] ?></option>
									<?php } ?>
								</select>
								<?= form_error('branch') ?>
							</div>

							<div class="form-group mb-1">
								<label for="enrollNo">Enroll No</label>
								<input type="number" name='enroll_no' min='0' class="form-control " id="enrolNo" placeholder="Enroll" value='<?= $std['enroll_no'] ?>' required>
								<?= form_error('enroll_no') ?>
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
