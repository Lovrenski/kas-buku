<?php foreach ($user as $u) { ?>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title fw-semibold mb-4">Edit User</h5>
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url('user/update') ?>" method="POST">
						<div class="mb-3">
							<label class="form-label">Username</label>
							<input type="text" class="form-control" name="nama" value="<?= $u['username'] ?>" readonly>
						</div>
						<div class="mb-3">
							<label class="form-label">Nama</label>
							<input type="text" class="form-control" name="nama" value="<?= $u['nama'] ?>">
						</div>
						<div class="mb-3">
							<label class="form-label">Level</label>
							<select class="form-select" name="level">
								<option value="User" <?php if ($u['level'] == 'User') {
															echo 'selected';
														} ?>>User</option>
								<option value="Admin" <?php if ($u['level'] == 'Admin') {
															echo 'selected';
														} ?>>Admin</option>
							</select>
						</div>
						<input type="hidden" name="id" value="<?= $u['id'] ?>">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<a href="<?= base_url('user') ?>" class="btn btn-primary m-2">Back</a>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
































</html>