<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- JQuery & Bootstrap -->
	<script type="text/javascript" src="<?= base_url() ?>assets\vendor\jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/DataTables/datatables.min.css">
	<script type="text/javascript" src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome/css/all.min.css">
	<!-- Animated Calendar -->
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\animated-event-calendar\dist\simple-calendar.css">
	<script src="<?= base_url() ?>assets\vendor\animated-event-calendar\dist\jquery.simple-calendar.min.js"></script>
	<!-- Evo Calendar -->
	<!-- Core Stylesheet -->
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.min.css" />
	<!-- JavaScript Evo Calendar-->
	<script src="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\js\evo-calendar.min.js"></script>
	<!-- Optional Themes -->
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.midnight-blue.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.orange-coral.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.royal-navy.min.css" />

	<!-- Custom -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<title>Home</title>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-light justify-content-between sticky-top flex-md-nowrap py-1 shadow bg-light">
			<a class="navbar-brand " href="<?= base_url() ?>">Elearning</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse offset" id="navbarNav">
				<ul class="navbar-nav mr-auto mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="<?= base_url() ?>home">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#news">News</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#event">Event</a>
					</li>
					<div class="dropdown">
						<button class="btn btn-primary my-1 btn-sm dropdown-toggle" type="button" id="dropMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ELearning
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class='dropdown-item' href="<?= base_url() ?>student/login">Students</a>
							<!-- <a class='dropdown-item' href="">Faculties</a> -->
							<a class='dropdown-item' href="<?= base_url() ?>staff/login">Staff</a>
						</div>
					</div>
				</ul>
			</div>


		</nav>
	</header>


	<div class="container-fluid">
		<div class="row">
			<section class='mt-5' id="hero">
				<div id="carouselpic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselpic" data-slide-to="0" class="active"></li>
						<li data-target="#carouselpic" data-slide-to="1"></li>
						<li data-target="#carouselpic" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100 img-fluid" src="<?= base_url() ?>assets/img/campus.jpg" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100 img-fluid" src="<?= base_url() ?>assets/img/books.jpg" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100 img-fluid" src="<?= base_url() ?>assets/img/writing.jpg" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselpic" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselpic" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</section>
			<section class='mt-5 p-4' id="news">
				<div class="flex-row">
					<div class="col">
						<h2 class='display-4 text-center'>News</h2>
						<div class="card-deck">
							<?php
							foreach ($news as $n) : ?>
								<div class="card" id="newsSection">
									<img src="<?= $n['image_url'] ?>" width="150px" max-height="300px" class="img-thumbnail card-img-top" alt="<?= $n['slug'] ?>">
									<div class="card-body">
										<h5 class="card-title"><?= $n['title'] ?></h5>
										<p class="card-text"><?= $n['content'] ?></p>
									</div>
									<div class="card-footer text-left">
										<small class="text-muted"><strong><?= $n['author'] ?></strong> - <?= $n['date'] ?></small>
									</div>
								</div>
							<?php
							endforeach;
							?>
						</div>
					</div>
					<div class="col text-center">
						<!-- <a href="news-list" role="button" class="btn btn-outline-info mt-2">Read More</a> -->
					</div>
				</div>
			</section>
			<section class='mt-5 p-4 w-100' id="event">
				<h2 class='display-4 text-center'>Event</h2>
				<div class="row mt-2">
					<div class="col-lg-4 col-md-6">
						<div id="eventCalendar"></div>
					</div>
					<div class="col-lg-8 col-md-6">
						<ul class="list-group-flush">
							<?php
							foreach ($event as $ev) :
							?>
								<li class="list-group-item">
									<div class="media">
										<!-- <img src="<?= $ev['image_url'] ?>" class="mr-3" alt="<?= $ev['title'] ?>"> -->
										<div class="media-body">
											<h5 class="mt-0"><?= $ev['name'] ?></h5>
											<p><?= $ev['description'] ?></p>
											<small class="text-muted"><strong><?= $ev['first_date'] ?></strong> - <?= $ev['last_date'] ?></small>
										</div>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</section>
		</div>
	</div>
	<script>
		$(function() {
			let eventList = [];
			// evo calendar event
			let url = '<?= base_url() ?>api/event';
			let req = new Request(url);
			fetch(req)
				.then(function(response) {
					return response.json();
				}).then((result) => {
					result.forEach((e) => {
						eventList.push({
							id: e.id,
							summary: e.name,
							startDate: e.date[0],
							endDate: e.date[1],
							description: e.description,
							type: e.type,
						});
					});
					$("#eventCalendar").simpleCalendar({
						displayEvent: true,
						events: eventList
					});
				});
		});
	</script>
