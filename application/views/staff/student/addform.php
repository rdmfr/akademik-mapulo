<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<h3 class="mt-3"><?= $title ?></h3>
	<hr>
	<div class="row justify-content-center">
		<div class="col-md-auto mx-auto">
			<div class="card shadow rounded">
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group mb-1">
							<label for="studentID">Student ID</label>
							<input type="text" class="form-control" name="student_id" id="studentID" placeholder="Student ID" required>
							<?= form_error('student_id') ?>
						</div>

						<div class="form-group mb-1">
							<div class="form-row ">
								<div class="col-md-6">
									<?= form_error('first_name') ?>
									<label for="firstName">First name</label>
									<input type="text" name='first_name' class="form-control" id="firstName" placeholder="First Name" required>
									<div class="valid-feedback">

									</div>
								</div>
								<div class="col-md-6">
									<label for="lastName">Last name</label>
									<input type="text" name='last_name' class="form-control" id="lastName" placeholder="Last name" required>
									<div class="valid-feedback">
										Looks good! <?= form_error('last_name') ?>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group mb-1">
							<label for="gender">Gender</label>
							<div class="form-row">
								<div class="col">
									<div class=" custom-control custom-radio">
										<input type="radio" name="gender" class="custom-control-input" id="genderMale" value="Male">
										<label class="custom-control-label" for="genderMale">Male</label>
									</div>
								</div>
								<div class="col">
									<div class=" custom-control custom-radio">
										<input type="radio" name="gender" class="custom-control-input" id="genderFemale" value="Female">
										<label class="custom-control-label" for="genderFemale">Female</label>
									</div>
								</div>
							</div>
							<?= form_error('gender') ?>
						</div>

						<div class="form-group mb-1">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" id="password" placeholder="E.g me@mail.com" required>
							<?= form_error('email') ?>
						</div>

						<div class="form-group mb-1">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
							<?= form_error('password') ?>
						</div>

						<div class="form-group mb-1">
							<label for="telp">Contact No</label>
							<input type="tel" class="form-control" name="contact_no" id="contact_no" placeholder="E.g 0123-4567-7890" required>
							<?= form_error('contact_no') ?>
						</div>

						<div class="form-group mb-1">
							<label for="address">Address</label>
							<textarea name="address" class="form-control" id="address" placeholder='E.g 15th Street Avenue'></textarea>
							<?= form_error('address') ?>
						</div>

						<div class="form-group mb-1">
							<label for="branch">Branch</label>
							<select name="branch" id="branch" class="form-control">
								<option value="">- Select Branch</option>
								<?php
								foreach ($branch as $br) { ?>
									<option value="<?= $br['branch_id'] ?>"><?= $br['branch'] ?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group mb-1">
							<label for="enrollNo">Enroll No</label>
							<input type="number" name='enroll_no' min='0' class="form-control" id="enrolNo" placeholder="Enroll" required>
							<?= form_error('enroll_no') ?>
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
