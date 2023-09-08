<?= $this->session->flashdata('alert', true); ?>
<div class="row col-4">
	<button type="button" class="btn btn-primary m-1 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
		Pemasukan</button>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pemasukan</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('pemasukan/simpan') ?>" method="POST">
						<div class="mb-3">
							<label for="recipient-name" class="col-form-label">Keterangan:</label>
							<input type="text" class="form-control" id="recipient-name" name="keterangan">
						</div>
						<div class="mb-3">
							<label for="message-text" class="col-form-label">Nominal:</label>
							<input type="text" class="form-control" id="recipient-name" name="nominal">
						</div>
						<div class="mb-3">
							<label for="message-text" class="col-form-label">Tanggal:</label>
							<input type="date" class="form-control" id="recipient-name" name="tanggal">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal End -->
	<button type="button" class="btn btn-danger m-1 mb-2" data-bs-toggle="modal" data-bs-target="#detailLaporan">Laporan
		Pemasukan <i class="bi bi-printer"></i></button>
</div>


<div class="row">
	<div class="card w-100">
		<div class="card-body p-4">
			<h5 class="card-title fw-semibold mb-4">Data Pemasukan</h5>
			<div class="table-responsive">
				<table class="table text-nowrap mb-0 align-middle">
					<thead class="text-dark fs-4">
						<tr>
							<th class="border-bottom-0">
								<h6 class="fw-semibold mb-0">#</h6>
							</th>
							<th class="border-bottom-0">
								<h6 class="fw-semibold mb-0">Tanggal</h6>
							</th>
							<th class="border-bottom-0">
								<h6 class="fw-semibold mb-0">Keterangan</h6>
							</th>
							<?php if ($this->session->userdata('level') == 'Admin') { ?>
								<th class="border-bottom-0">
									<h6 class="fw-semibold mb-0">Username</h6>
								</th>
							<?php } ?>
							<th class="border-bottom-0">
								<h6 class="fw-semibold mb-0">Nominal</h6>
							</th>
							<th class="border-bottom-0">
								<h6 class="fw-semibold mb-0">Aksi</h6>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($pemasukan as $u) {
						?>
							<tr>
								<td class="border-bottom-0">
									<h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
								</td>
								<td class="border-bottom-0">
									<h6 class="fw-semibold mb-1"><?= $u['tanggal'] ?></h6>
								</td>
								<td class="border-bottom-0">
									<p class="mb-0 fw-normal"><?= $u['keterangan'] ?></p>
								</td>
								<?php if ($this->session->userdata('level') == 'Admin') { ?>
									<td class="border-bottom-0">
										<p class="mb-0 fw-normal"><?= $u['username'] ?></p>
									</td>
								<?php } ?>
								<td class="border-bottom-0">
									<p class="mb-0 fw-normal">Rp. <?= number_format($u['nominal']) ?></p>
								</td>
								<td class="border-bottom-0">
									<button type="button" class="btn btn-danger m-1 mb-4" data-bs-toggle="modal" data-bs-target="#delete">
										<i class="bi bi-trash3-fill"></i>
									</button>
									<!-- Modal Delete-->
									<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pemasukan</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													Are you sure you want delete this data?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
													<a href="<?= base_url('pemasukan/delete/' . $u['id_transaksi']) ?>" class="btn btn-danger">Delete</a>
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
<div class="modal fade" id="detailLaporan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Tanggal Awal dan Akhir</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('pdfview/pemasukan') ?>" method="POST">
					<div class="mb-3">
						<label class="col-form-label">Tanggal Awal:</label>
						<input type="date" class="form-control" name="awal">
					</div>
					<div class="mb-3">
						<label class="col-form-label">Tanggal Akhir:</label>
						<input type="date" class="form-control" name="akhir">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-danger">Print</button>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>