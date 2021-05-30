<?php
if (!$this->session->user['level']) {
	redirect('/home');
} else if ($this->session->user['level'] != 'admin') {
	$this->session->set_flashdata('message', 'Forbidden, You don\'t have access to this');
	redirect('/home');
} else {
	// redirect('/home');
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-3">
	<div class="jumbotron text-white" style='background: linear-gradient(45deg, #526186,#52865D);'>
		<h2>Welcome <?= $this->session->user['name'] ?></h2>
		<?php
		if (isset($this->session->message)) : ?>
			<div class="alert alert-success mt-5" role="alert" id="alert">
				<?= $this->session->message; ?>
				<button type="button" class="close" data-dismiss='alert' aria-label="close">
					<span aria-hidden="true">&times;</span></button>
			</div>
		<?php
		endif;
		?>

		<p class="lead">You logged in as <strong><?= $this->session->user['level'] ?></strong></p>
	</div>
	<div class="row mb-3">
		<div class="col">
			<ul class="list-group">
				<li class="list-group-item">
					<i class="fa fa-chart-bar fa-4x"></i>
					<span class="display-4 float-right"></span>
				</li>
				<li class="list-group-item bg-secondary">
					<a href="<?= base_url() ?>staff/result" class="nav-link text-white">Result</a>
				</li>
			</ul>
		</div>
		<div class="col">
			<ul class="list-group">
				<li class="list-group-item">
					<i class="fa fa-user-alt fa-4x"></i>
					<span class="display-4 float-right"></span>
				</li>
				<li class="list-group-item bg-secondary">
					<a href="<?= base_url() ?>staff/student" class="nav-link text-white">Student</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col">
			<ul class="list-group">
				<li class="list-group-item">
					<i class="fa fa-book fa-4x"></i>
					<span class="display-4 float-right"></span>
				</li>
				<li class="list-group-item bg-secondary">
					<a href="<?= base_url() ?>staff/subject" class="nav-link text-white">Subject</a>
				</li>
			</ul>
		</div>
		<div class="col">
			<ul class="list-group">
				<li class="list-group-item">
					<i class="fa fa-list fa-4x"></i>
					<span class="display-4 float-right"></span>
				</li>
				<li class="list-group-item bg-secondary">
					<a href="<?= base_url() ?>staff/semester" class="nav-link text-white">Semester</a>
				</li>
			</ul>
		</div>
	</div>
</main>
</div>
