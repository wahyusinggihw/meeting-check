<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <a href="/dashboard/tambah-agenda" class="btn btn-primary mb-2">Tambah Agenda</a>
    <div class="table-container">
        <table class="participant-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Kode Rapat</th>
                    <th>Nama</th>
                    <th>Tempat</th>
                    <th>Tanggal</th>
                    <th>Link Rapat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agenda as $item) : ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['kode_rapat'] ?></td>
                        <td><?= $item['judul_rapat'] ?></td>
                        <td><?= $item['tempat'] ?></td>
                        <td><?= $item['tanggal'] ?></td>
                        <td><?= $item['link_rapat'] ?></td>
                        <td>
                            <a href="<?= base_url('dashboard/edit-agenda/' . $item['id']) ?>" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                            <form action="#" method="post" class="d-inline">
                                <button class="border-0" onclick="return confirm('Are you sure?')"><a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></a></button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach ?>
                <!-- Add more rows as needed -->
            </tbody>

        </table>
    </div>
</body>

<?= $this->endSection() ?>