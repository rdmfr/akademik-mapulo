<?php $directory = "";
if (isset($this->session->user['level'])) {
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
}
?>
<nav class="navbar navbar-expand-md navbar-light justify-content-between sticky-top flex-md-nowrap py-1 shadow bg-light">
	<a class="navbar-brand " href="<?= base_url() ?>">Elearning</a>
	<div class="">
		<div class="btn-group profile-box">
			<button class="btn btn-transparent btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-user-circle fa-sm"></i>
				<?= (isset($this->session->user['name'])) ? $this->session->user['name'] :  '';  ?>
			</button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="<?= base_url() . $directory ?>/profile">
					Your Profile
				</a>
				<hr>
				<a class="dropdown-item" href="<?= base_url() . $directory ?>/logout">
					Logout</a>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarmenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars align-self-center"></span>
			</button>
		</div>
	</div>

</nav>
<?php
if ($this->session->user) {
	echo '<div class="container-fluid">
    	<div class="row">';
	include_once "sidebar.php";
}
