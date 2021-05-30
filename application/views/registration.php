<?php
if (!isset($this->session->user['level'])) {
	// redirect('/staff/login');
} else if ($this->session->user['level'] == 'admin') {
	// $this->session->set_flashdata('message', 'Forbidden, You don\'t have access to this');
	redirect('/staff');
} else if ($this->session->user['level'] == 'faculty') {
	// $this->session->set_flashdata('message', 'Forbidden, You don\'t have access to this');
	redirect('/faculty');
} else if ($this->session->user['level'] == 'student') {
	// $this->session->set_flashdata('message', 'Forbidden, You don\'t have access to this');
	redirect('/student');
}
?>

<body style="background: url(<?= base_url() ?>assets/img/campus.jpg);">
	<div class="container-fluid mt-auto">
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
		<div class="row justify-content-center mt-5 ">
			<div class="col-md-4 col-lg-6 order-md-1 mx-5 mb-3 p-sm-3 border rounded shadow align-middle bg-light">
				<a href="<?= base_url() ?>" class="btn btn-secondary btn-sm">
					<span class="fa fa-arrow-left"></span> Back</a>
				<div class="login-box align-center m-md-5 align-self-center">
					<div class="mb-4">
						<h3 class='text-center'><?= ucfirst($this->uri->segment(1)) ?> Sign Up</h3>
					</div>
					<form action="" method="post" class="">
						<!-- <div class="form-group-item first mb-2">
							<label for="id"><?= ucfirst($this->uri->segment(1)) ?> ID</label>
							<input type="text" class="form-control" id="id" name="id" required>
							<?= form_error('id', '<div class="text-danger"><small>', '</small></div>') ?>
						</div> -->
						<div class="form-group-item mb-2">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" required>
							<?= form_error('name', '<div class="text-danger"><small>', '</small></div>') ?>
						</div>

						<div class="form-group-item mb-2">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" name="email" required>
							<?= form_error('email', '<div class="text-danger"><small>', '</small></div>') ?>
						</div>

						<div class="form-group-item mb-4">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" required>
							<?= form_error('password', '<div class="text-danger"><small>', '</small></div>') ?>
						</div>

						<div class="form-group-item last mb-4">
							<label for="confPassword">Confirm Password</label>
							<input type="password" class="form-control" id="confPassword" name="confpassword" required>
							<?= form_error('confpassword', '<div class="text-danger"><small>', '</small></div>') ?>
						</div>
						<button type="submit" name="login" class="btn btn-block btn-primary mb-2">Sign Up</button>
						<div class="d-flex align-items-center">
							<label class="control control--checkbox mb-0"><span class="caption">Already Have an Account? login</span>
								<span class="ml-auto"><a href="<?= base_url() . $this->uri->segment(1) ?>/login" class="login"> here!</a>
								</span>
							</label>
						</div>
					</form>
				</div>
			</div>
			<!-- <div class="col order-md-0">
			<img src="<?= base_url() ?>assets/img/campus.jpg" alt="Image" class="img-responsive img-banner" style="z-index:0" max-height="300px">
		</div> -->
		</div>
	</div>
</body>
