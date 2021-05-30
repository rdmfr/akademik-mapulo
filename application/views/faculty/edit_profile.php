<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<h3 class="mt-3"></h3>
	<hr>
	<div class="row justify-content-center">
		<div class="col-md-auto mx-auto">
			<div class="card shadow rounded">
				<?php
				foreach ($faculty as $fac) : ?>
					<div class="card-body">
						<form action="" method="post">
							<input type="hidden" name="key" class="form-control" value='<?= $fac['id'] ?>'>
							<div class="form-group mb-1">
								<label for="id">ID</label>
								<input type="text" class="form-control" name="id" id="ID" placeholder="ID" value='<?= $fac['id'] ?>' disabled>
								<?= form_error('id') ?>
							</div>

							<div class="form-group mb-1">
								<label for="name">Name</label>
								<input type="text" name='name' class="form-control " id="name" placeholder="Name" value='<?= $fac['name'] ?>' required>
								<?= form_error('name') ?>
							</div>

							<div class="form-group mb-1">
								<label for="gender">Gender</label>
								<div class="form-row">
									<?php
									$gender = ['male', 'female'];
									foreach ($gender as $gen) :
										$check = ($fac['gender'] == ucfirst($gen)) ? "checked" : ""; ?>
										<div class="col">
											<div class=" custom-control custom-radio">
												<input type="radio" id="<?= $gen ?>" name="gender" value="<?= ucfirst($gen) ?>" class="custom-control-input" <?= $check ?>>
												<label class="custom-control-label" for="<?= $gen ?>"><?= ucfirst($gen) ?></label>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
								<?= form_error('gender') ?>
							</div>

							<div class="form-group mb-1">
								<label for="telp">Contact No</label>
								<input type="tel" class="form-control" name="contact_no" id="contact_no" placeholder="E.g 0123-4567-7890" value='<?= $fac['contact_no'] ?>' required>
								<?= form_error('contact_no') ?>
							</div>

							<div class="form-group mb-1">
								<label for="address">Address</label>
								<textarea name="address" class="form-control" id="address" placeholder='E.g 15th Street Avenue'><?= $fac['address'] ?></textarea>
								<?= form_error('address') ?>
							</div>

							<div class="form-row my-2 justify-content-end">
								<button type="submit" class="btn btn-primary" name="submit">Update</button>
							</div>
						</form>

					</div>
				<?php
				endforeach; ?>
			</div>
		</div>
	</div>
</main>
