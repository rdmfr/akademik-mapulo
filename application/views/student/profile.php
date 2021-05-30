<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<h3 class="mt-3"><?= $title  ?> <a href="<?= base_url() ?>student/profile/change" class="btn btn-outline-info btn-sm align-self-start">
			<span class="fa fa-pencil-alt"></span></a></h3>
	<hr>
	<?php
	foreach ($myprofile as $me) : ?>
		<div class="d-flex flex-column justify-content-center">

			<div class="rounded-circle mx-auto"><span class="fa fa-user-circle fa-10x"></span></div>
			<div class="group text-center mb-2">
				<span class="text-center"><?= "$me[first_name] $me[last_name]"; ?> - </span>
				<span class="text-muted">
					<?= $branch ?>
				</span>
			</div>
		</div>

		<div class="row my-2">
			<div class="col-sm-4 bg-secondary text-light">
				<label for="email">Email</label>
			</div>
			<div class="col-sm">
				<div class="span" id="email"><?= $me['email'] ?></div>
			</div>
		</div>

		<div class="row my-2">
			<div class="col-sm-4 bg-secondary text-light">
				<label for="gender">Gender</label>
			</div>
			<div class="col-sm">
				<div class="span" id="gender"><?= $me['gender'] ?></div>
			</div>
		</div>

		<div class="row my-2">
			<div class="col-sm-4 bg-secondary text-light">
				<label for="contact_no">Contact No</label>
			</div>
			<div class="col-sm">
				<div class="span" id="contact_no"><?= $me['contact_no'] ?></div>
			</div>
		</div>

		<div class="row my-2">
			<div class="col-sm-4 bg-secondary text-light">
				<label for="address">Address</label>
			</div>
			<div class="col-sm">
				<div class="span" id="address"><?= $me['address'] ?></div>
			</div>
		</div>

	<?php endforeach; ?>
</main>
