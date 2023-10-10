<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>

    <div class="col-8 my-2">
        <form action="/dashboard/kelola-admin/tambah-admin" method="post">
            <?= csrf_field() ?>
            <label for="nama">Nama Lengkap:</label>
            <input class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" value="<?= $data['nama'] ?>" type="text" id="nama" name="nama" placeholder="Masukkan nama" autofocus>
            <div class="invalid-feedback">
                <?= validation_show_error('nama') ?>
            </div>
            <br>

            <label for="username">Username:</label>
            <input class="form-control <?= validation_show_error('username') ? 'is-invalid' : '' ?>" value="<?= $data['nama'] ?>" type="text" id="username" name="username" placeholder="Username">
            <div class="invalid-feedback">
                <?= validation_show_error('username') ?>
            </div>
            <br>

            <label for="password">password:</label>
            <input class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" value="<?= $data['nama'] ?>" type="password" id="password" name="password" placeholder="password">
            <div class="invalid-feedback">
                <?= validation_show_error('password') ?>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

    </div>
</body>

<?= $this->endSection() ?>