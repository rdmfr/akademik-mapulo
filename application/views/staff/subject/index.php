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
	<a role="button" class="btn btn-info mb-2" href="<?= base_url() ?>staff/subject/add">Add</a>
	<div class="table-responsive">
		<table class="table table-bordered table-hover dt-responsive" id="manageData">
			<thead>
				<tr>
					<th>Subject ID</th>
					<th>Subject</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($subject as $sub) : ?>
					<tr>
						<td><?= $sub['subject_id']; ?></td>
						<td><?= $sub['subject']; ?></td>
						<td>
							<a role="button" href="<?= base_url() ?>staff/subject/update?id=<?= $sub['subject_id']; ?>" class="btn btn-info">Update</a>
							<a role="button" href="<?= base_url() ?>staff/subject/delete?id=<?= $sub['subject_id']; ?>" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-outline-danger">Delete</a>
						</td>
					</tr>
				<?php
				endforeach;
				?>
			</tbody>
		</table>
	</div>
</main>
