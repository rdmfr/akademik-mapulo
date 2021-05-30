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
	<a role="button" class="btn btn-info mb-2" href="<?= base_url() ?>staff/student/add">Add</a>
	<div class="table-responsive">
		<table class="table table-bordered table-hover dt-responsive" id="manageData">
			<thead>
				<tr>
					<th>Student ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Password</th>
					<th>Gender</th>
					<th>Contact No</th>
					<th>Address</th>
					<th>Branch</th>
					<th>Enroll No</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($student as $std) : ?>
					<tr>
						<td><?= $std['student_id']; ?></td>
						<td><?= $std['first_name']; ?> <?= $std['last_name']; ?></td>
						<td><?= $std['email']; ?></td>
						<td><?= $std['password']; ?></td>
						<td><?= $std['gender']; ?></td>
						<td><?= $std['contact_no']; ?></td>
						<td><?= $std['address']; ?></td>
						<td><?= $std['branch']; ?></td>
						<td><?= $std['enroll_no']; ?></td>
						<td>
							<a role="button" href="<?= base_url() ?>staff/student/update?id=<?= $std['student_id']; ?>" class="btn btn-info">Update</a>
							<a role="button" href="<?= base_url() ?>staff/student/delete?id=<?= $std['student_id']; ?>" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-outline-danger">Delete</a>
						</td>
					</tr>
				<?php
				endforeach;
				?>
			</tbody>
		</table>
	</div>
</main>
