<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
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
	<div class="container">
		<div class="row">
			<h2>Events</h2>
			<div id="evoCalendar"></div>
		</div>

	</div>
	<!-- Evo Calendar -->
	<!-- Core Stylesheet -->
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.min.css" />
	<!-- Optional Themes -->
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.midnight-blue.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.orange-coral.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\css\evo-calendar.royal-navy.min.css" />
	<!-- JavaScript Evo Calendar-->
	<script src="<?= base_url() ?>assets\vendor\event-calendar-evo\evo-calendar\js\evo-calendar.min.js"></script>

	<script>
		myEvents = [{
					id: "required-id-1",
					name: "New Year",
					date: "Wed Jan 01 2021 00:00:00 GMT-0800 (Pacific Standard Time)",
					type: "holiday",
					everyYear: true
				},
				{
					id: "required-id-2",
					name: "Valentine's Day",
					date: "Fri Feb 14 2021 00:00:00 GMT-0800 (Pacific Standard Time)",
					type: "holiday",
					everyYear: true,
					color: "#222"
				},
				{
					id: "required-id-3",
					name: "Custom Date",
					badge: "08/03 - 08/05",
					date: ["August/03/2021", "August/05/2020"],
					description: "Description here",
					type: "event",
				},
			],

			$("#calendarEvent").simpleCalendar();
		$('#evoCalendar').evoCalendar({
				calendarEvents: myEvents,
				sidebarToggler: true,
				sidebarDisplayDefault: false,
				eventListToggler: true,
				eventDisplayDefault: false,
				// theme: 'Royal Navy'
			})
			.on('selectDate', function(newDate, oldDate) {
				console.log(oldDate);
			})
			.on('selectEvent', function(activeEvent) {
				console.log(activeEvent);
			});
		// add new event
		$("#evoCalendar").evoCalendar('addCalendarEvent', [{
			id: 'id-1',
			name: "Event",
			date: ["05/10/2021", "05/12/2021"],
			summary: 'Merasa senang',
			description: "Event description",
			type: "event",
		}]);
	</script>

</main>
