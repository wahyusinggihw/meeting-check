<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="col-8 my-2">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>

            <div class="card-body">
                <form action="<?= base_url('/dashboard/kelola-admin/edit-admin/' . $data['id_admin'] . '/update') ?>" method="post">
                    <?= csrf_field() ?>

                    <input type="hidden" id="text" name="id" value="<?= $data['id_admin'] ?>">

                    <div class="form-group">
                        <label for="nama">Nama Lengkap:</label>
                        <input class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" value="<?= $data['nama'] ?>" type="text" id="nama" name="nama" placeholder="Masukkan nama" autofocus>
                        <div class="invalid-feedback">
                            <?= validation_show_error('nama') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control <?= validation_show_error('username') ? 'is-invalid' : '' ?>" value="<?= $data['username'] ?>" type="text" id="username" name="username" placeholder="Username">
                        <div class="invalid-feedback">
                            <?= validation_show_error('username') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new-password">Password Baru:</label>
                        <input class="form-control <?= validation_show_error('new-password') ? 'is-invalid' : '' ?>" id="new-password" name="new-password" placeholder="new-password">
                        <div class="invalid-feedback">
                            <?= validation_show_error('new-password') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Konfirmasi Password:</label>
                        <input class="form-control <?= validation_show_error('confirm-password') ? 'is-invalid' : '' ?>" id="confirm-password" name="confirm-password" placeholder="confirm-password">
                        <div class="invalid-feedback">
                            <?= validation_show_error('confirm-password') ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>

</body>

<?= $this->endSection() ?>