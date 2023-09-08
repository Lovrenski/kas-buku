<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kas Buku | <?= $this->uri->segment(1); ?></title>
	<?php require_once('_css.php') ?>
</head>

<body>
	<!--  Body Wrapper -->
	<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
		<!-- Sidebar Start -->
		<?php require_once('_sidebar.php') ?>
		<!-- Sidebar End -->
		<!--  Main wrapper -->
		<div class="body-wrapper">
			<!--  Header Start -->
			<?php require_once('_navbar.php') ?>
			<!--  Header End -->
			<div class="container-fluid">
				<div class="row">
					<?= $contents; ?>
				</div>
			</div>
			<!-- Footer -->
			<?php require_once('_footer.php') ?>
		</div>
	</div>

	<!-- JS -->
	<?php require_once('_js.php') ?>
</body>







</html>