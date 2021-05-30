<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<header>
    <?= $this->include('layouts/navbar') ?>
</header>
<div class="container">
    <main role="content" class="mt-5">
        <h3>News</h3>
        <div class="row">
            <?php
            foreach ($news as $item) : ?>
                <div class="card shadow-sm my-2">
                    <div class="card-body">
                        <img class="" src="assets/img/pic (1).jpeg" alt="Card image cap">
                        <h5 class="card-title"><?= $item['title'] ?></h5>
                        <p class="card-text"><?= $item['desc'] ?></p>
                        <p class="card-text"><small class="text-muted"><?= $item['date'] ?></small></p>
                        <a href="#" class="btn btn-outline-primary">Read More <span class="fa fa-angle-double-right"></span></a>
                    </div>
                </div>
            <?php
            endforeach; ?>
        </div>
    </main>
</div>

</div>
<?= $this->endSection('content') ?>