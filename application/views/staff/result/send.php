<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<h3 class="my-2">
		<span class="fa fa-database"></span>
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
	<form action="" class="" method="get" id="filter">
		<div class="form-inline">
			<div class="input-group justify-content-between mx-1">
				<label for="selectsubject">Subject </label>
				<select name="subject" class='form-control form-control-sm ml-2' id="selectsubject">
					<option value="">- Select Subject</option>
					<?php foreach ($subject as $sub) :
						$check = ($this->input->get('subject') == $sub['subject_id']) ? "selected" : "" ?>
						<option value="<?= $sub['subject_id'] ?>" <?= $check ?>><?= $sub['subject'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="input-group justify-content-between mx-1">
				<label for="selectbranch">Branch</label>
				<select name="branch" class='form-control form-control-sm ml-2' id="selectbranch">
					<option value="">- Select Branch</option>
					<?php foreach ($branch as $br) :
						$check = ($this->input->get('branch') == $br['branch_id']) ? "selected" : "" ?>
						<option value="<?= $br['branch_id'] ?>" <?= $check ?>><?= $br['branch'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="input-group justify-content-between mx-1">
				<label for="selectsemester">Semester </label>
				<select name="semester" class='form-control form-control-sm ml-2' id="selectsemester">
					<?php foreach ($semester as $sem) :
						$check = ($this->input->get('semester') == $sem['semester_id']) ? "selected" : ""; ?>
						<option value="<?= $sem['semester_id'] ?>" <?= $check ?>><?= $sem['semester'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="input-group justify-content-between mx-1">
				<label for="selectyear">Year </label>
				<select name="year" class='form-control form-control-sm ml-2' id="selectyear">
					<?php
					for ($i = date('Y'); $i > (date('Y') - 50); $i--) {
						$check = ($i == $res['year']) ? 'selected' : ''; ?>
						<option value="<?= $i ?>" <?= $check ?>><?= $i ?></option>
					<?php } ?>
				</select>
			</div>
			<button type="submit" class="btn btn-outline-info">Filter</button>
		</div>
	</form>
	<!-- </div> -->
	<div class="table-responsive">
		<table class="table table-bordered table-hover dt-responsive" id="manageData">
			<thead>
				<tr>
					<th>Student ID</th>
					<th>Student</th>
					<th>Score</th>
					<th>Send Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($result as $res) : ?>
					<tr>
						<td><?= $res['student_id']; ?></td>
						<td><?= $res['student']; ?></td>
						<td>
							<span class="studentScore">
								<?= $res['score']; ?>
							</span>
							<span class="studentEmail" hidden><?= $res['email'] ?></span>
						</td>
						<td>
							<div class="btn-group">
								<!-- <a href="tel:+<?= $res['contact_no'] ?>" role='button' class="btn btn-secondary">SMS</a> -->
								<a role="button" class="btn btn-info sendEmail" href='<?= base_url() ?>staff/result/send/email?id=<?= $res['result_id']; ?>'>Send Email</a>
							</div>
						</td>
					</tr>
				<?php
				endforeach;
				?>
			</tbody>
		</table>
	</div>
</main>
