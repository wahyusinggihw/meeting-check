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

    <div class="hero">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/96503/parralax1.png" alt="">
        <div class="layers">
            <div class="first" data-depth="7"></div>
            <div class="second" data-depth="6"></div>
            <div class="secondpoint5" data-depth="4"></div>
            <div data-depth="5">
                <h1 class="hero__text">Hiking</h1>
            </div>
            <div class="third" data-depth="2"></div>
            <!-- <div class="fourth" data-depth="0"></div> -->
        </div>

    </div>
</body>
</body>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="<?php echo base_url('assets/js/tester.js'); ?>"></script>

</html>