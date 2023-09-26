<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/login.css'); ?>">
</head>

<body>
    <form class="form" action="<?php echo base_url('dashboard/'); ?>">
        <div class="container">
            <div class="lg-atas">
                <img src="<?php echo base_url('assets/img/1.1.png'); ?>" width="150px">
            </div>
            <div class="input-grup">

                <i class="fa-solid fa-user"></i>
                <input type="username" name="Username" placeholder="Username" id="username" checked>
                <input type="password" name="Password" placeholder="Password" id="password" checked>
            </div>
            <button class="btn">Log In</button>
            <div class="input-grup">
                <!-- <div class="bwh">
                    <p>Tidak Punya Akun ?</p>
                    <a href="regist.html">Sign up</a>
                </div> -->
            </div>
        </div>
    </form>

    <div class="overlay"></div>

    <div class="logo">
        <img src="<?php echo base_url('assets/img/pemkab.png'); ?>" alt="Logo" width="250">
    </div>

    <div class="logo">
        <img src="<?php echo base_url('assets/img/2.png'); ?>" alt="Logo" width="250">
    </div>

</body>

<script src="<?php echo base_url('js/login.js'); ?>"></script>

</html>