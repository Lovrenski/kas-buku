<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Tambah User</h5>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('user/simpan') ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Level</label>
                        <select class="form-select" name="level">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary d-flex justify-content-center">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


























</html>