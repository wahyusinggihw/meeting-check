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
                                    <button href="#" class="btn btn-danger delete-button" data-id="<?= $item['id_bidang'] ?>"><i class="fa-solid fa-trash"></i></button>
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

        function showDeleteConfirmation(id) {
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Anda yakin akan menghapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Trigger the form submission for POST request
                    console.log(id);
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/dashboard/kelola-bidang/delete-bidang/' + id;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

        // Attach the delete confirmation modal to each delete button
        document.querySelectorAll('.delete-button').forEach((button) => {
            const itemId = button.getAttribute('data-id');
            button.addEventListener('click', () => showDeleteConfirmation(itemId));
        });
    </script>
</body>

<?= $this->endSection() ?>