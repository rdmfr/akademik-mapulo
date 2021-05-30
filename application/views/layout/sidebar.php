<?php $directory = "";
switch ($this->session->user['level']) {
	case 'student':
		$directory = 'student';
		break;
	case 'admin':
		$directory = 'staff';
		break;
	case 'faculty':
		$directory = 'faculty';
		break;
}
?>
<aside id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse bg-light navbarmenu">
	<div class="sidebar-sticky pt-3" id="sidebar">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link active" href="<?= base_url() . $directory ?>">
					<i class="fa fa-tachometer-alt fa-sm"></i>
					Dashboard <span class="sr-only">(current)</span>
				</a>
			</li>
			<?php
			if ($this->session->user['level'] == 'admin') { ?>
				<li class="nav-item">
					<a class="nav-link" href="#" id="navbarCollapse" role="button" data-toggle="collapse" data-target="#master" aria-haspopup="true" aria-expanded="false">
						<span class="fa fa-database"></span> Master <span class="fa fa-angle-down"></span>
					</a>
					<div class="collapse" id="master" aria-labelledby="masterCollapse">
						<div class="btn-group">
							<a class="nav-link" href="<?= base_url() . $directory ?>/result">
								<i class="fa fa-chart-bar fa-sm"></i>
								Result
							</a>
							<a class="nav-link" href="#" id="navbarCollapse" role="button" data-toggle="collapse" data-target="#resultOption" aria-haspopup="true" aria-expanded="false">
								<span class="fa fa-chevron-down"></span>
							</a>
						</div>
						<div class="collapse" id="resultOption" aria-labelledby="masterCollapse">
							<a class="nav-link" href="<?= base_url() . $directory ?>/result/material">
								<span class="fa fa-list fa-sm text-sm"></span> <small>List Material</small></a>
							<a class="nav-link" href="<?= base_url() . $directory ?>/result/upload">
								<span class="fa fa-upload fa-sm text-sm"></span> <small>Study Material</small></a>
						</div>
						<a class="nav-link" href="<?= base_url() . $directory ?>/student">
							<i class="fa fa-user-graduate fa-sm"></i>
							Student
						</a>
						<a class="nav-link" href="<?= base_url() . $directory ?>/subject">
							<i class="fa fa-book icon"></i>
							Subject
						</a>
						<a class="nav-link" href="<?= base_url() . $directory ?>/semester">
							<i class="fa fa-list fa-sm"></i>
							Semester
						</a>
					</div>
				</li>
			<?php
			} else if ($this->session->user['level'] == 'faculty') { ?>
				<li class="nav-item">
					<div class="btn-group">
						<a class="nav-link" href="<?= base_url() . $directory ?>/result">
							<i class="fa fa-chart-bar fa-sm"></i>
							Result
						</a>
						<a class="nav-link" href="#" id="navbarCollapse" role="button" data-toggle="collapse" data-target="#master" aria-haspopup="true" aria-expanded="false">
							<span class="fa fa-chevron-down"></span>
						</a>
					</div>
					<div class="collapse" id="master" aria-labelledby="masterCollapse">
						<a class="nav-link" href="<?= base_url() . $directory ?>/result/material">
							<span class="fa fa-list fa-sm text-sm"></span> <small>List Material</small></a>
						<a class="nav-link" href="<?= base_url() . $directory ?>/result/upload">
							<span class="fa fa-upload fa-sm text-sm"></span> <small>Study Material</small></a>
					</div>
				</li>
			<?php
			} else { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() . $directory ?>/result">
						<i class="fa fa-chart-bar fa-sm"></i>
						Result
					</a>
				</li>
			<?php
			}
			?>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url() . $directory ?>/news">
					<i class="fa fa-newspaper fa-sm"></i>
					News
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url() . $directory ?>/event">
					<i class="fa fa-calendar-times fa-sm"></i>
					Events
				</a>
			</li>
		</ul>
	</div>
</aside>
