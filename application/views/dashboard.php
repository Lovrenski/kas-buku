<?php

$pemasukan = $this->Transaksi_model->pemasukan_total();
$pengeluaran = $this->Transaksi_model->pengeluaran_total();
$saldo = $pemasukan - $pengeluaran;

?>

<div class="card w-100 p-4">
	<?php if ($this->session->userdata('username') !== NULL) { ?>
		<h1 class="text-center mb-4">Welcome, <?= $this->session->userdata('nama') ?>!</h1>
	<?php } else { ?>
		<h1 class="text-center mb-4">Welcome to Buku Kas!</h1>
	<?php } ?>
	<br>
	<button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Detail
		Laporan <i class="bi bi-printer"></i></button>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<td colspan="4" class="text-xl-center">
					<h2>Total Semua Pemasukan</h2>
				</td>
			</tr>
		</thead>
		<tbody class="text-center">
			<tr>
				<td>Hari Ini</td>
				<td>Bulan Ini</td>
				<td>Total Pemasukan</td>
			</tr>
			<tr>
				<td>Rp. <?= number_format($this->Transaksi_model->pemasukan_hari_ini()) ?></td>
				<td>Rp. <?= number_format($this->Transaksi_model->pemasukan_bulan_ini()) ?></td>
				<td>Rp. <?= number_format($this->Transaksi_model->pemasukan_total()) ?></td>
			</tr>
		</tbody>
	</table>
	<br>
	<table class="table table-bordered table-striped mb-4">
		<thead>
			<tr>
				<td colspan="4" class="text-xl-center">
					<h2>Total Semua Pengeluaran</h2>
				</td>
			</tr>
		</thead>
		<tbody class="text-center">
			<tr>
				<td>Hari Ini</td>
				<td>Bulan Ini</td>
				<td>Total Pemasukan</td>
			</tr>
			<tr>
				<td>Rp. <?= number_format($this->Transaksi_model->pengeluaran_hari_ini()) ?></td>
				<td>Rp. <?= number_format($this->Transaksi_model->pengeluaran_bulan_ini()) ?></td>
				<td>Rp. <?= number_format($this->Transaksi_model->pengeluaran_total()) ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-bordered">
		<thead>
			<td colspan="4" class="text-xl-center">
				<h2>Saldo Akhir</h2>
			</td>
		</thead>
		<tbody class="text-center">
			<td>
				<h5>Rp. <?= number_format($saldo) ?></h5>
			</td>
		</tbody>
	</table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Tanggal Awal dan Akhir</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('pdfview/detail_laporan') ?>" method="POST">
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