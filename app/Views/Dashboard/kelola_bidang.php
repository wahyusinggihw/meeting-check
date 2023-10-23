<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '<?= session()->getFlashdata('success') ?>',
            })
        </script>
    <?php endif; ?>

    <?php if (session()->get('role') != 'operator') : ?>
        <a href="<?= base_url('dashboard/kelola-bidang/tambah-bidang') ?>" class="btn btn-primary mb-2">Tambah Bidang</a>
    <?php endif; ?>

    <div class="table-container my-3">
        <table id="example" class="row-border" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Bidang</th>
                    <th>ID Instansi</th>
                    <th>Nama Bidang</th>
                    <!-- <th>created_at</th> -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bidang as $item) : ?>
                    <tr>
                        <td></td>
                        <td><?= $item['id_bidang'] ?></td>
                        <td><?= $item['id_instansi'] ?></td>
                        <td><?= $item['nama_bidang'] ?></td>
                        <td>
                            <div class="row">
                                <div class="col-lg-12 btn-group">
                                    <!-- <a href="<?= base_url('dashboard/kelola-admin/view-agenda/' . $item['slug']) ?>" class="btn btn-secondary"><i class="fa-solid fa-eye"></i></a> -->
                                    <a href="<?= base_url('dashboard/kelola-bidang/edit-bidang/' . $item['slug']) ?>" class="btn btn-warning mx-2"><i class="fa-solid fa-pen"></i></a>
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
                                            <form action="<?= base_url('dashboard/kelola-bidang/delete-bidang/' . $item['id_bidang']) ?>" method="post" class="d-inline">
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

    <script>
        let startNumber = 1;
        new DataTable('#example', {
            "columnDefs": [{
                "targets": [4], // Index of the column to disable sorting (zero-based index)
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