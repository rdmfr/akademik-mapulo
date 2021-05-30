<?php
// if (!$this->session->userdata('user')) {
// 	$this->session->set_flashdata('message', 'You have to login first');
// 	$this->session->set_flashdata('status', 'danger');
// 	// redirect(base_url());
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- JQuery & Bootstrap -->
	<script type="text/javascript" src="<?= base_url() ?>assets/vendor/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/DataTables/datatables.min.css">
	<script type="text/javascript" src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome/css/all.min.css">

	<!-- Data Tables -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/DataTables/datatables.min.css" />
	<script type="text/javascript" src="<?= base_url() ?>assets/vendor/DataTables/datatables.min.js"></script>

	<!-- Summernote -->
	<link href="<?= base_url() ?>assets\vendor\summernote\summernote-bs4.css" rel="stylesheet">
	<script src="<?= base_url() ?>assets\vendor\summernote\summernote-bs4.js"></script>

	<!-- Animated Calendar -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets\vendor\animated-event-calendar\dist\simple-calendar.css">
	<script src="<?= base_url() ?>assets\vendor\animated-event-calendar\dist\jquery.simple-calendar.min.js"></script> -->

	<!-- Evo Calendar -->
	<!-- Core Stylesheet -->
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.min.css" />
	<!-- Optional Themes -->
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.midnight-blue.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.orange-coral.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.royal-navy.min.css" />
	<!-- JavaScript Evo Calendar-->
	<script src="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\js\evo-calendar.min.js"></script>

	<!-- Custom -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<title><?= $title ?></title>
</head>

<body>
