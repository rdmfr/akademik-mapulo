<div class="container mt-auto">
	<?php
	if (isset($this->session->message)) : ?>
		<div class="alert alert-<?= $this->session->status ?>" role="alert" id="alert">
			<?= $this->session->message; ?>
			<button type="button" class="close" data-dismiss='alert' aria-label="close">
				<span aria-hidden="true">&times;</span></button>
		</div>
	<?php
	endif;
	?>
	<div class="content mt-5">
		<div class="container justify-content-center">
			<div class="row justify-content-center">
				<img src="<?= base_url() ?>assets/img/univ.jpg" alt="Image" class="img-fluid" width='300px' height="300px">
				<div class="col-md-6">
					<div class="mb-4">
						<h3 class='text-center'>Sign In</h3>
					</div>
					<form action="" method="post" class="">
						<div class="form-group-item first">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" name="email" required>
							<?= form_error('email', '<div class="text-danger"><small>', '</small></div>') ?>
						</div>
						<div class="form-group-item last mb-4">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" required>
							<?= form_error('password', '<div class="text-danger"><small>', '</small></div>') ?>
						</div>
						<button type="submit" name="login" class="btn btn-block btn-primary">Log In</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
