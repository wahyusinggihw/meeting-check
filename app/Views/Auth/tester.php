<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Check <?php isset($title) ? print('| ' . $title) : '' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/tester.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="outer">
        <div class="prod-logo">
            <img src="https://github.com/abhinanduN/codepen/blob/master/prod.png?raw=true" class="prod-img" alt="icon" />
            <ul class="main-nav">
                <li class="nav-li"><a href="#">Home</a></li>
                <li class="nav-li"><a href="#">About</a></li>
                <li class="nav-li"><a href="#">Modules</a></li>
                <li class="nav-li"><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="inner">
            <div class="prod-left">
                <h1 class="prod-head"><span style="color:#0f457f">HELLO</span> MOTO!</h1>
                <h4 class="prod-head-sub">Lorem ipsum dolor sit amet...</h4>
            </div>
            <div class="prod-right">
                <img src="https://github.com/abhinanduN/codepen/blob/master/human-image.png?raw=true" class="prod-human-img" alt="prod" />
            </div>
        </div>
    </div>
</body>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="<?php echo base_url('assets/js/tester.js'); ?>"></script>

</html>