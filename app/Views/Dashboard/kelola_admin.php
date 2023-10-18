<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <a href="kelola-admin/tambah-admin" class="btn btn-primary mb-2">Tambah Admin</a>
    <div class="table-container">
        <table id="example" class="row-border" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Username</th>
                    <th>created_at</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $item) : ?>
                    <tr>
                        <td><?= $item['id_admin'] ?></td>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['role'] ?></td>
                        <td><?= $item['username'] ?></td>
                        <td><?= $item['created_at'] ?></td>
                        <td>
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- <a href="<?= base_url('dashboard/kelola-admin/view-agenda/' . $item['slug']) ?>" class="btn btn-secondary"><i class="fa-solid fa-eye"></i></a> -->
                                    <a href="<?= base_url('dashboard/kelola-admin/edit-admin/' . $item['slug']) ?>" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
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
                                            <form action="<?= base_url('dashboard/delete-admin/' . $item['id_admin']) ?>" method="post" class="d-inline">
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
                "targets": [2, 5], // Index of the column to disable sorting (zero-based index)
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