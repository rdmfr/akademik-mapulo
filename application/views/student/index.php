<?php
if (!$this->session->user['level']) {
	redirect('/home');
} else if ($this->session->user['level'] != 'student') {
	$this->session->set_flashdata('message', 'Forbidden, You don\'t have access to this');
	redirect('/home');
} else {
	// redirect('/home');
}
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-2">
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
	</div>
	<div class="row">
		<div class="col">
			<h3>Event Calendar</h3>
			<div id="evoCalendar"></div>
		</div>
		<div class="col text-center">
			<h3>Latest News</h3>
			<div id="newsSection">
				<div class="card bg-light shadow-lg" id="newsSection">
					<img src="<?= $news[0]['image_url'] ?>" width="150px" max-height="300px" class="img-thumbnail card-img-top" alt="<?= $news[0]['slug'] ?>">
					<div class="card-body">
						<h5 class="card-title"><?= $news[0]['title'] ?></h5>
						<p class="card-text"><?= $news[0]['content'] ?></p>
					</div>
					<div class="card-footer text-left">
						<small class="text-muted"><strong><?= $news[0]['author'] ?></strong> - <?= $news[0]['date'] ?></small>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
</div>
