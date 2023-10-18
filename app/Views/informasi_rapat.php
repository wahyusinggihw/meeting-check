<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<body>

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

</body>

<?= $this->endSection() ?>