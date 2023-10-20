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
    <!--Hey! This is the original version
of Simple CSS Waves-->

    <div class="header">

        <!--Content before waves-->
        <div class="card-info">
            <div class="card-qr">
                <img src="<?php echo base_url('assets/img/qr.svg'); ?>" alt="Logo">
            </div>

            <div class="card-text">
                <h1>INFORMASI RAPAT</h1>
                <ul>
                    <li>RAPATTTT</li>
                    <li>DINAS KOMINFOSANTI</li>
                </ul>
                <div class="code-rapat">
                    ID RAPAT : <p id="teksToSalin" onclick="copyText()">3007-1807</p>
                </div>
            </div>
        </div>
        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <!--Waves end-->

    </div>
    <!--Header ends-->

    <!--Content starts-->
    <!--Content ends-->
</body>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="<?php echo base_url('assets/js/login.js'); ?>"></script>

</html>