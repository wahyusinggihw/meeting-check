<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Check <?php isset($title) ? print('| ' . $title) : '' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!-- modal -->
    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= session()->getFlashdata('error') ?>',
            })
        </script>
    <?php endif; ?>

    <div class="login-form">

        <h1>Login</h1>
        <form action="/auth/login" method="post">
            <?= csrf_field() ?>
            <div class="form-group mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control <?= validation_show_error('username') ? 'is-invalid' : '' ?>" value="<?= old('username') ?>" id="username" name="username" placeholder="Masukkan username" autofocus>
                <div class="invalid-feedback text-start">
                    <?= validation_show_error('username') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Masukkan password">
                <div class="invalid-feedback text-start">
                    <?= validation_show_error('password') ?>
                </div>
            </div>
            <br>

            <button type="submit">Login</button>
    </div>

    <div class="logo">
        <img src="<?php echo base_url('assets/img/pemkab.png'); ?>" alt="Logo" width="200">
    </div>

    <div class="logo-2">
        <img src="<?php echo base_url('assets/img/2.png'); ?>" alt="Logo" width="200">
    </div>

</body>

<script src="<?php echo base_url('js/login.js'); ?>"></script>

</html>