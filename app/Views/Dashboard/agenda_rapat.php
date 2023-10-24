<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <?php if (session()->getFlashdata('berhasil')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '<?= session()->getFlashdata('berhasil') ?>',
            })
        </script>
    <?php endif; ?>

    <?php if ($agenda != null) : ?>
        <a href="/dashboard/agenda-rapat/tambah-agenda" class="btn btn-primary mb-2">Tambah Agenda</a>
        <div class="table-container my-3">
            <table id="example" class="row-border" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Rapat</th>
                        <?php if (session()->get('role') == 'admin') : ?>
                            <th>Nama Bidang</th>
                        <?php endif; ?>
                        <th>Agenda</th>
                        <th>Deskripsi</th>
                        <th>Tanggal/Jam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agenda as $item) : ?>
                        <tr>
                            <td></td>
                            <td><?= $item['kode_rapat'] ?></td>
                            <?php if (session()->get('role') == 'admin') : ?>
                                <td><?= $item['admin_nama_bidang'] ?></td>
                            <?php endif; ?>
                            <td><?= $item['agenda_rapat'] ?></td>
                            <td><?= $item['deskripsi'] ?></td>
                            <td><?= $item['tanggal'] . ', ' . $item['jam'] ?></td>
                            <td><span class="badge <?= $item['status'] == 'selesai' ? 'bg-danger' : 'bg-success' ?>"><?= $item['status'] ?></span></td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-12 btn-group">
                                        <a href="<?= base_url('dashboard/agenda-rapat/daftar-hadir/' . $item['slug']) ?>" class="btn btn-info mx-2"><i class="fa-solid fa-list" style="color: white;"></i></a>
                                        <a href="<?= base_url('dashboard/agenda-rapat/view-agenda/' . $item['slug']) ?>" class="btn btn-info"><i class="fa-solid fa-eye" style="color: white;"></i></a>
                                        <a href="<?= base_url('dashboard/agenda-rapat/edit-agenda/' . $item['slug']) ?>" class="btn btn-warning mx-2"><i class="fa-solid fa-pen" style="color: white;"></i></a>
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-trash"></i>
                            </button> -->


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
                                                <form action="<?= base_url('dashboard/delete-agenda/' . $item['id_agenda']) ?>" method="post" class="d-inline">
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


    <?php else : ?>
        <div class="button-container">
            <div class="icon-empty">
                <img src="<?php echo base_url('assets/img/icon-empty.svg'); ?>" alt="SVG Image">
            </div>
            <div class="data-kosong">
                Data Agenda Kosong
            </div>
            <a href="/dashboard/agenda-rapat/tambah-agenda" id="tambah-agenda" class="btn btn-primary mb-2">Tambah Agenda</a>
        </div>
    <?php endif; ?>

    <script>
        let startNumber = 1;
        let targets = <?php echo (session()->get('role') == 'admin') ? JSON_ENCODE([7]) : JSON_ENCODE([6]); ?>;
        new DataTable('#example', {
            "columnDefs": [{
                "targets": targets, // Index of the column to disable sorting (zero-based index)
                "orderable": false,

            }],
            // Additional DataTables options here
            createdRow: function(row, data, dataIndex) {
                $('td:eq(0)', row).html(startNumber++);
            }
        });
    </script>
</body>

<?= $this->endSection() ?>