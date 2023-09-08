<!-- Sidebar Start -->
<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div>
		<div class="brand-logo d-flex align-items-center justify-content-between">
			<a href="<?= base_url('home') ?>" class="text-nowrap logo-img">
				<img src="<?= base_url('assets/') ?>images/logos/dark-logo.svg" width="180" alt="" />
			</a>
			<div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
				<i class="ti ti-x fs-8"></i>
			</div>
		</div>
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
			<ul id="sidebarnav">
				<li class="nav-small-cap">
					<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
					<span class="hide-menu">Sidebar</span>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="<?= base_url('home') ?>" aria-expanded="false">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
								<path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
								<path d="M10 12h4v4h-4z"></path>
							</svg>
						</span>
						<span class="hide-menu">Dashboard</span>
					</a>
				</li>
				<?php if ($this->session->userdata('username') !== NULL) : ?>
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url('pemasukan') ?>" aria-expanded="false">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trending-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M3 17l6 -6l4 4l8 -8"></path>
									<path d="M14 7l7 0l0 7"></path>
								</svg>
							</span>
							<span class="hide-menu">Pemasukan</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url('pengeluaran') ?>" aria-expanded="false">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trending-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M3 7l6 6l4 -4l8 8"></path>
									<path d="M21 10l0 7l-7 0"></path>
								</svg>
							</span>
							<span class="hide-menu">Pengeluaran</span>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('level') == 'Admin') { ?>
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url('user') ?>" aria-expanded="false">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
									<path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"></path>
									<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
									<path d="M16 19h6"></path>
									<path d="M19 16v6"></path>
								</svg>
							</span>
							<span class="hide-menu">User</span>
						</a>
					</li>
				<?php } ?>
				<?php if ($this->session->userdata('username') == NULL) : ?>
					<li class="nav-small-cap">
						<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
						<span class="hide-menu">Account</span>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url('auth') ?>" aria-expanded="false">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door-enter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M13 12v.01"></path>
									<path d="M3 21h18"></path>
									<path d="M5 21v-16a2 2 0 0 1 2 -2h6m4 10.5v7.5"></path>
									<path d="M21 7h-7m3 -3l-3 3l3 3"></path>
								</svg>
							</span>
							<span class="hide-menu">Login</span>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('username') !== NULL) : ?>
					<li class="nav-small-cap">
						<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
						<span class="hide-menu">Account</span>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?= base_url('auth/logout') ?>" aria-expanded="false">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door-exit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M13 12v.01"></path>
									<path d="M3 21h18"></path>
									<path d="M5 21v-16a2 2 0 0 1 2 -2h7.5m2.5 10.5v7.5"></path>
									<path d="M14 7h7m-3 -3l3 3l-3 3"></path>
								</svg>
							</span>
							<span class="hide-menu">Logout</span>

						</a>
					</li>

				<?php endif; ?>

			</ul>

		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->