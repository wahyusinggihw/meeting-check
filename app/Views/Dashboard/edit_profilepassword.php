<?= $this->extend('dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= session()->getFlashdata('error')  ?>',
            })
        </script>
    <?php endif; ?>
    <div class="col-8 my-2">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>

            <div class="card-body">
                <form action="<?= base_url('dashboard/profile/edit-profilepassword/' . $data['id_admin']) ?>" method="post">
                    <?= csrf_field() ?>

                    <input type="hidden" id="text" name="id" value="<?= $data['id_admin'] ?>">

                    <div class="form-group">
                        <label for="old-password">Password Lama:</label>
                        <input class="form-control <?= validation_show_error('old-password') ? 'is-invalid' : '' ?>" value="<?= session()->getFlashdata('error') ? '' : old('old-password') ?>" id="old-password" name="old-password" placeholder="Password lama">
                        <div class="invalid-feedback">
                            <?= validation_show_error('old-password') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new-password">Password Baru:</label>
                        <input class="form-control <?= validation_show_error('new-password') ? 'is-invalid' : '' ?>" id="new-password" name="new-password" placeholder="Password baru">
                        <div class="invalid-feedback">
                            <?= validation_show_error('new-password') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Konfirmasi Password:</label>
                        <input class="form-control <?= validation_show_error('confirm-password') ? 'is-invalid' : '' ?>" id="confirm-password" name="confirm-password" placeholder="Konfirmasi password">
                        <div class="invalid-feedback">
                            <?= validation_show_error('confirm-password') ?>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

</body>

<?= $this->endSection(); ?>