<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<!-- <body>

    <div class="container mt-4">

        <table class="table">
            <tr>
                <th>Kode Rapat</th>
                <th>Nama</th>
                <th>Agenda</th>
                <th>Tempat</th>
                <th>Jam</th>
                <th>Tanggal</th>
                <th>Link Rapat</th>
            </tr>
            <tr>

                <td><?= $agendaRapat['kode_rapat'] ?></td>
                <td><?= $agendaRapat['agenda_rapat'] ?></td>
                <td><?= $agendaRapat['deskripsi'] ?></td>
                <td><?= $agendaRapat['tempat'] ?></td>
                <td><?= $agendaRapat['jam'] ?></td>
                <td><?= $agendaRapat['tanggal'] ?></td>
                <td> <img id="qr" width="100px" src="<?= $qrCode ?>" alt="" class=""></td>
            </tr>
        </table>

    </div>

</body> -->

<link rel="stylesheet" href="<?= base_url('assets/css/informasi.css') ?>">

<body>
    <div class="container-info">
        <div class="card-info">
            <div class="card-qr">
                <img src="<?php echo base_url('assets/img/pemkab.png'); ?>" alt="Logo" width="500">
            </div>

            <div class="card-text">
                <h1>JUDUL RAPAT TERSERAHKUU DONGGGGGG</h1>
                <h2>IDMUUUU APAAAAAAAAA</h2>
            </div>
        </div>
    </div>
</body>


<?= $this->endSection() ?>