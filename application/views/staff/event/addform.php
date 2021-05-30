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
	<div class="row">
		<div class="col-md-auto">
			<form class="needs-validation" action="" method="post">
				<div class="form-group mb-1">
					<label for="name">Event Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Event name">
					<?= form_error('name') ?>
				</div>

				<!-- <div class="form-group mb-1">
					<div class="form-row"></div>
					<label for="author">Author</label>
					<input type="text" name="author" id="author" class="form-control" placeholder="Your name">
					<?= form_error('author') ?>
				</div> -->

				<div class="form-row">
					<div class="form-group mb-1">
						<label for="first_date">First Date</label>
						<input type="date" name="first_date" id="first_date" class="form-control form-control-sm" placeholder="Your name">
						<?= form_error('first_date') ?>
					</div>
					<div class="form-group mb-1" id="last_date">
						<label for="last_date">Last Date</label>
						<input type="date" name="last_date" class="form-control form-control-sm" placeholder="Your name">
						<?= form_error('last_date') ?>
					</div>
				</div>

				<div class="form-group mb-1">
					<input type="checkbox" id="samedays">Samedays</input>
				</div>

				<script>
					$('#samedays').click((e) => {
						$('#last_date').toggle();
					});
				</script>

				<div class="form-group mb-1">
					<label for="desc">Description</label>
					<input type="text" name='desc' class="form-control" id="desc" placeholder="Event Description">
					<?= form_error('desc') ?>
				</div>

				<div class="form-row my-2 justify-content-end">
					<button type="submit" class="btn btn-primary" name="submit">
						<span class="fa fa-plus"></span>
						Add</button>
				</div>
			</form>
		</div>
	</div>
</main>
