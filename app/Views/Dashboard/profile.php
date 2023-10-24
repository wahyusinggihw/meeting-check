<?= $this->extend('dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '<?= session()->getFlashdata('success')  ?>',
            })
        </script>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= session()->getFlashdata('error')  ?>',
            })
        </script>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <div class="col-sm-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/dist/img/user2-160x160.jpg') ?>" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center"><?= $profile['nama'] ?></h3>
                    <p class="text-muted text-center"><?= $profile['nama_instansi'] ?></p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Username</b>
                            <p class="float-right"><?= $profile['username']  ?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Password</b> <a href="<?= base_url('dashboard/profile/edit-profilepassword/' . $profile['slug']) ?>" class="float-right" style="text-decoration: none;">Ganti Password</a>
                        </li>
                        
                    </ul>
                    <a href="<?= base_url('dashboard/profile/edit-profile/' . $profile['slug']) ?>" class="btn btn-warning btn-block"><b>Edit Profile</b></a>
                </div>

            </div>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>