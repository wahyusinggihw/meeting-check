<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">
</head>

<body>
    <!-- <form class="form" method="POST" action="">
        <div class="container">
            <div class="lg-atas">
                <img src="<?php echo base_url('assets/img/1.1.png'); ?>" width="150px">
            </div>
            <div class="input-grup">
                <i class="fa-solid fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button class="btn" type="submit" name="submit">Log In</button>
            <div class="input-grup">
                <div class="bwh">
                    <p>Tidak Punya Akun ?</p>
                    <a href="regist.html">Sign up</a>
                </div>
            </div>
        </div>
    </form> -->

    <div class="login-form">
        <h1>Login</h1>
        <form>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required><br><br>

            <button type="submit">Login</button>
    </div>

    <div class="overlay"></div>

    <div class="logo">
        <img src="<?php echo base_url('assets/img/pemkab.png'); ?>" alt="Logo" width="200">
    </div>

    <div class="logo-2">
        <img src="<?php echo base_url('assets/img/2.png'); ?>" alt="Logo" width="200">
    </div>

</body>

<script src="<?php echo base_url('js/login.js'); ?>"></script>

</html>