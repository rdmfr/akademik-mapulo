<?php
if (!isset($this->session->user['level'])) {
	redirect('/home');
} else if ($this->session->user['level'] != 'faculty') {
	$this->session->set_flashdata('message', 'Forbidden, You don\'t have access to this');
	// redirect('/home');
}
?>
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
	<div class="btn-group mb-2 filter">
		<a role="button" class="btn btn-info dt-buton mb-2" href="<?= base_url() ?>faculty/result/add">Add</a>
		<!-- </div> -->
		<!-- <div class="col align-self-center"> -->
		<button class="btn btn-outline-info btn-sm dt-buton mb-2 btn-gro" data-toggle="collapse" data-target="#filter" aria-expanded="true">
			<span class="fa fa-angle-down"></span></button>
	</div>
	<form action="" class="collapse show mb-1" method="get" id="filter">
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
			<button type="submit" class="btn btn-outline-info">Filter</button>
		</div>
	</form>
	<!-- </div> -->
	<div class="table-responsive">
		<table class="table table-bordered table-hover dt-responsive" id="resultTable">
			<thead>
				<tr>
					<th>Result ID</th>
					<th>Student ID</th>
					<th>Student</th>
					<!-- <th>Semester</th> -->
					<th>Subject</th>
					<th>Year</th>
					<th>Branch</th>
					<th>Score</th>
					<!-- <th>Action</th> -->
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($result as $res) : ?>
					<tr>
						<td><?= $res['result_id']; ?></td>
						<td><?= $res['student_id']; ?></td>
						<td><?= $res['student']; ?></td>
						<!-- <td><?= $res['semester']; ?></td> -->
						<td><?= $res['subject']; ?></td>
						<td><?= $res['year']; ?></td>
						<td><?= $res['branch']; ?></td>
						<td><?= $res['score']; ?></td>
						<!-- <td>
							<a role="button" class="btn btn-info sendEmail" href='<?= base_url() ?>staff/result/send/email?id=<?= $res['result_id']; ?>'>Send Result</a>
							<a role="button" href="<?= base_url() ?>staff/result/update?id=<?= $res['result_id']; ?>" class="btn btn-info">Update</a>
							<a role="button" href="<?= base_url() ?>staff/result/delete?id=<?= $res['result_id']; ?>" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-outline-danger">Delete</a>
						</td> -->
					</tr>
				<?php
				endforeach;
				?>
			</tbody>
		</table>
		<script>
			$('#manageData').DataTable({
				dom: 'frtip',
			});
		</script>
	</div>
</main>
