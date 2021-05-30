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
	<!-- </div> -->
	<a href="<?= base_url() ?>student/material/list" role="button" class="btn btn-success">List Material</a>
	<div class="table-responsive">
		<table class="table table-bordered table-hover dt-responsive" id="studentResult">
			<thead>
				<tr>
					<th>No</th>
					<th>Score</th>
					<th>Subject</th>
					<th>Branch</th>
					<th>Semester</th>
					<th>Year</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($result as $res) : ?>
					<tr>
						<td><?= $no++; ?></td>
						<?php
						$status = '';
						if ($res['score'] >= 90) {
							$status = 'bg-primary';
						} else if ($res['score'] >= 80) {
							$status = 'bg-success';
						} else if ($res['score'] >= 50) {
							$status = 'bg-danger';
						}
						?>
						<td class='text-white <?= $status ?>'><?= $res['score']; ?></td>
						<td><?= $res['subject']; ?></td>
						<td><?= $res['branch']; ?></td>
						<td><?= $res['semester']; ?></td>
						<td><?= $res['year']; ?></td>
					</tr>
				<?php
				endforeach;
				?>
			</tbody>
		</table>
		<script>
			$(document).ready(function() {
				$("#studentResult").DataTable({
					dom: 'frtip',
				})
			})
		</script>
	</div>
</main>
