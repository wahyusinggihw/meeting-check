<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Meeting Check <?php isset($title) ? print('- ' . $title) : '' ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/informasi.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="/">
                    <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" width="100">
                </a>
            </div>
        </div>
    </header>
    <div class="container-info">
        <div class="card-info">
            <div class="card-qr">
                <img src="<?= $qrCode ?>" alt="Logo">
            </div>

            <div class="card-text">
                <h1>INFORMASI RAPAT</h1>
                <ul>
                    <li><?= $agendaRapat['agenda_rapat'] ?></li>
                    <li>DINAS KOMINFOSANTI</li>
                </ul>
                <div class="code-rapat">
                    ID RAPAT : <p id="teksToSalin" onclick="copyText()"><?= $agendaRapat['kode_rapat'] ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="<?php echo base_url('assets/js/info.js'); ?>"></script>

</html>