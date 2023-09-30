<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <a href="/dashboard/agenda-rapat/tambah-agenda" class="btn btn-primary mb-2">Tambah Agenda</a>
    <div class="table-container">
        <table class="participant-table">
            <thead>
                <tr>
                    <!-- <th>id</th> -->
                    <th>Kode Rapat</th>
                    <th>Nama</th>
                    <th>Agenda</th>
                    <th>Tempat</th>
                    <th>Jam</th>
                    <th>Tanggal</th>
                    <th>Link Rapat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agenda as $item) : ?>
                    <tr>
                        <!-- <td><?= $item['id'] ?></td> -->
                        <td><?= $item['kode_rapat'] ?></td>
                        <td><?= $item['judul_rapat'] ?></td>
                        <td><?= $item['agenda'] ?></td>
                        <td><?= $item['tempat'] ?></td>
                        <td><?= $item['jam'] ?></td>
                        <td><?= $item['tanggal'] ?></td>
                        <td><?= $item['link_rapat'] ?></td>
                        <td>
                            <a href="<?= base_url('dashboard/agenda-rapat/edit-agenda/' . $item['id']) ?>" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure want to delete this data?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <form action="<?= base_url('dashboard/delete-agenda/' . $item['id']) ?>" method="post" class="d-inline">
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                <?php endforeach ?>
                <!-- Add more rows as needed -->
            </tbody>

        </table>
    </div>
</body>

<?= $this->endSection() ?>