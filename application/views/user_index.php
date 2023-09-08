<?= $this->session->flashdata('alert', true); ?>
<div class="row">
	<a href="<?= base_url('user/tambah') ?>" class="btn btn-primary m-1 mb-4">Tambah User</a>
</div>
<div class="row">
	<div class="card w-100">
		<div class="card-body p-4">
			<h5 class="card-title fw-semibold mb-4">Data User</h5>
			<div class="table-responsive">
				<table class="table text-nowrap mb-0 align-middle">
					<thead class="text-dark fs-4">
						<tr>
							<th class="border-bottom-0">
								<h6 class="fw-semibold mb-0">#</h6>
							</th>
							<th class="border-bottom-0">
								<h6 class="fw-semibold mb-0">Username</h6>
							</th>
							<th class="border-bottom-0">
								<h6 class="fw-semibold mb-0">Name</h6>
							</th>
							<th class="border-bottom-0">
								<h6 class="fw-semibold mb-0">Level</h6>
							</th>
							<th class="border-bottom-0">
								<h6 class="fw-semibold mb-0">Aksi</h6>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($user as $u) {
						?>
							<tr>
								<td class="border-bottom-0">
									<h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
								</td>
								<td class="border-bottom-0">
									<h6 class="fw-semibold mb-1"><?= $u['username'] ?></h6>
								</td>
								<td class="border-bottom-0">
									<p class="mb-0 fw-normal"><?= $u['nama'] ?></p>
								</td>
								<td class="border-bottom-0">
									<p class="mb-0 fw-normal"><?= $u['level'] ?></p>
								</td>
								<td class="border-bottom-0">
									<a href="<?= base_url('user/edit/' . $u['id']) ?>" class="btn btn-primary m-1 mb-4"><i class="bi bi-pencil-square"></i></a>
									<button type="button" class="btn btn-danger m-1 mb-4" data-bs-toggle="modal" data-bs-target="#delete">
										<i class="bi bi-trash3-fill"></i>
									</button>
									<!-- Modal Delete-->
									<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">User Delete</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													Are you sure you want delete this data?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
													<a href="<?= base_url('user/delete/' . $u['id']) ?>" class="btn btn-danger">Delete</a>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>