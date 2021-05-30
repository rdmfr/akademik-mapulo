<?php
if (!isset($this->session->user['level'])) {
	redirect('/home');
} else if ($this->session->user['level'] != 'faculty') {
	$this->session->set_flashdata('message', 'Forbidden, You don\'t have access to this');
	// redirect('/home');
}
?>
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
	<div class="site-section">
		<div class="container">
			<div class="row">
				<div class="col-lg">
					<div class="section-title mt-2">
						<h2>Recent News</h2>
					</div>
					<div id="newsSection">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<ul class="pagination">

					</ul>
				</div>
			</div>
			<script>
				const url = '<?= base_url() ?>/api/news';
				let req = new Request(url);
				let newsContainer = $('#newsSection');
				let news;
				let offset = 1;
				let limit = 3;
				fetch(req)
					.then(function(response) {
						return response.json();
					}).then((result) => {
						news = result;
						numItem = news.data.length;
						numPage = Math.ceil(numItem * offset) / limit;
						pageNow = (offset) ? offset : 1;
						$('ul.pagination').append(
							`<li class="page-item">
							<a href="?page=${(pageNow!=0) ? 1 : pageNow}" class="page-link" ${(pageNow==1)?'disabled':''}>Previous</a>
							</li>
							<li class="page-item">
								<a href="?page=1" class="page-link">1</a>
							</li>`
						);
						console.log(numItem);
						for (let i = 1; i <= numPage; i++) {
							let child = `<li class="page-item">
								<a href="?page=${i}" class="page-link">${i}</a>
								</li>`;
							$('ul.pagination').append(child);
						}
						$('ul.pagination').append(
							`<li class="page-item">
								<a href="?page=${pageNow + 1}" class="page-link">Next</a>
							</li>`
						);

						let a = 0;
						while (true || a < news.data.length) {
							const e = news.data[a];
							let item = `<div class="post-entry d-flex mb-2">
								<img class="img-thumbnail order-md-2" height='150px' width='200px' src='${e.image_url}'/>
								<div class="contents order-md-1 pl-0">
									<h2><a href="<?= base_url() ?>student/news/${e.slug}">${e.title}</a></h2>
									<p class="mb-3 lead">${e.desc}</p>
									<div class="post-meta">
										<span class="d-block">${e.author}</span>
										<span class="text-muted">${e.date}</span>
									</div>
								</div>
							</div>`;
							newsContainer.append(item);
							a++;
							if (a == (numItem / numPage)) {
								return false
							}
						}
					});
			</script>
		</div>
	</div>
</main>
