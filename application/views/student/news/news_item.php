<main role="main" class="col-md-9 m-sm-auto col-lg-10 px-md-4">
	<div class="container">
		<div class="row mt-2 post-header">
			<div class="col-lg-8 col-md-8">
				<div class="row">
					<div class="col-12 mb-4">
						<h2><?= $news['title'] ?></h2>
						<div class="meta-news">
							<p class="meta-news-author">
								<span>By</span>
								<span><?= $news['author'] ?></span>
							</p>
							<p class="meta-posted-date">
								<time class='text-muted text-small' datetime=""><?= date('D, d-M-Y', strtotime($news['date'])); ?></time>
							</p>
						</div>
					</div>
					<img src="<?= $news['image_url'] ?>" class="img-fluid m-1 news-image">
					<div class="post-view view-image">
						<p><?= $news['content'] ?></p>
					</div>
					<div class="post-view">
						<div class="view view-image">
							<p><?= $news['desc'] ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-4 col-lg-4 post-latest">
				<div class="row">
					<div class="col-12 pb-2">
						<h6 class="font-weight-bold">Latest</h6>
					</div>
					<?php
					foreach ($other_news as $post) :
					?>
						<div class="col-12 py-2 border-bottom-hidden">
							<div class="row">
								<div class="col-4"><a href="<?= base_url() ?>student/news/<?= $post['slug'] ?>"><img src="<?= $post['image_url'] ?>" alt="<?= $post['slug'] ?>" class="img-fluid"></a></div>
								<div class="col-8"><a href="<?= base_url() ?>student/news/<?= $post['slug'] ?>"><?= $post['title'] ?></a></div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</main>
