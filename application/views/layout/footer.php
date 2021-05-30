<script>
	$(document).ready(function() {
		if (screen.width <= 425) {
			$('nav').removeClass("fixed-top");
			$('nav').addClass("fixed-bottom");
			$('footer').hide();
		} else {
			$('nav').addClass("fixed-top");
			$('nav').removeClass("fixed-bottom");
		}

		// evo calendar event
		let url = '<?= base_url() ?>api/event';
		let req = new Request(url);
		fetch(req)
			.then(function(response) {
				return response.json();
			}).then((result) => {
				result.forEach((e) => {
					$("#evoCalendar").evoCalendar('addCalendarEvent', [{
						id: e.id,
						name: e.name,
						date: e.date,
						description: e.description,
						type: e.type,
					}]);
				})
			});

		$('#evoCalendar').evoCalendar({
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

		// summernote plugin
		$('.summernote').summernote({
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'underline', 'clear']],
				['fontname', ['fontname']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
				['insert', ['link', 'picture', 'video']],
				['view', ['fullscreen', 'codeview', 'help']],
			],
			codemirror: { // codemirror options
				theme: 'monokai'
			},
			codeviewFilter: false,
			codeviewIframeFilter: true
		});

		// data table
		let dataElement = $('td:not(td:last-child)');
		const table = $('#manageData').DataTable({
			dom: 'Bfrtip',
			buttons: [{
					extend: 'print',
					text: 'Print',
					exportOptions: {
						columns: dataElement,
						stripHtml: false
					}
				},
				{
					extend: 'pdf',
					text: 'PDF',
					exportOptions: {
						columns: dataElement,
						stripHtml: false
					}
				},

			]
		});
	});
</script>

<footer class="footer mt-auto w-100 py-3 text-center">
	<div class="container">
		<span class="text-muted ">Made by Jsk © 2021</span>
	</div>
</footer>
</body>

</html>
