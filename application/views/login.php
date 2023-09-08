<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kas Buku | Login</title>
	<?php require_once('layouts/_css.php') ?>
</head>

<body>
	<div class="body-wrapper">

		<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
			<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
				<div class="d-flex align-items-center justify-content-center w-100">
					<div class="row justify-content-center w-100">
						<div class="col-md-8 col-lg-6 col-xxl-3">
							<?= $this->session->flashdata('alert', TRUE); ?>
							<div class="card mb-0">
								<div class="card-body">
									<div class="text-center">
										<h1>Login</h1>
									</div>
									<form action="<?= base_url('auth/login') ?>" method="POST">
										<div class="mb-3">
											<label for="exampleInputEmail1" class="form-label">Username</label>
											<input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										</div>
										<div class="mb-4">
											<label for="exampleInputPassword1" class="form-label">Password</label>
											<input type="password" name="password" class="form-control" id="exampleInputPassword1">
										</div>
										<button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>
	<!-- JS -->
	<?php require_once('layouts/_js.php') ?>
</body>



































</html>