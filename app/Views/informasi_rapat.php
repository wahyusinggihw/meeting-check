<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/informasi.css') ?>">

<body>
    <div class="container-info">
        <div class="card-info">
            <div class="card-qr">
                <img src="<?php echo base_url('assets/img/qr.svg'); ?>" alt="Logo">
            </div>

            <div class="card-text">
                <h1>RAPAT ALA ALA</h1>
                <h2>RTP-1342</h2>
            </div>
        </div>
    </div>
</body>


<?= $this->endSection() ?>