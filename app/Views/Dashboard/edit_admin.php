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

                    <input type="hidden" id="text" name="id" value="<?= $data['id_admin'] ?>"><br><br>

                    <label for="nama">Nama Lengkap:</label>
                    <input class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" value="<?= $data['nama'] ?>" type="text" id="nama" name="nama" placeholder="Masukkan nama" autofocus>
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama') ?>
                    </div>
                    <br>

                    <label for="username">Username:</label>
                    <input class="form-control <?= validation_show_error('username') ? 'is-invalid' : '' ?>" value="<?= $data['username'] ?>" type="text" id="username" name="username" placeholder="Username">
                    <div class="invalid-feedback">
                        <?= validation_show_error('username') ?>
                    </div>
                    <br>

                    <label for="password">Password Baru:</label>
                    <input class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="password">
                    <div class="invalid-feedback">
                        <?= validation_show_error('password') ?>
                    </div>
                    <br>

                    <label for="password">Konfirmasi Password:</label>
                    <input class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="password">
                    <div class="invalid-feedback">
                        <?= validation_show_error('password') ?>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-8 my-2">
        <form action="/dashboard/kelola-admin/edit-admin/<?= $data['id_admin'] ?>/update" method="post">
            <?= csrf_field() ?>

            <input type="hidden" id="text" name="id" value="<?= $data['id_admin'] ?>"><br><br>

            <label for="nama">Nama Lengkap:</label>
            <input class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" value="<?= $data['nama'] ?>" type="text" id="nama" name="nama" placeholder="Masukkan nama" autofocus>
            <div class="invalid-feedback">
                <?= validation_show_error('nama') ?>
            </div>
            <br>

            <label for="username">Username:</label>
            <input class="form-control <?= validation_show_error('username') ? 'is-invalid' : '' ?>" value="<?= $data['username'] ?>" type="text" id="username" name="username" placeholder="Username">
            <div class="invalid-feedback">
                <?= validation_show_error('username') ?>
            </div>
            <br>

            <label for="password">Password Baru:</label>
            <input class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="password">
            <div class="invalid-feedback">
                <?= validation_show_error('password') ?>
            </div>
            <br>

            <label for="password">Konfirmasi Password:</label>
            <input class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="password">
            <div class="invalid-feedback">
                <?= validation_show_error('password') ?>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

    </div>
</body>

<?= $this->endSection() ?>