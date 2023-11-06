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

    <?php if ($daftar_hadir != null) : ?>
<<<<<<< HEAD
=======
        <!-- <a href="#" download class="btn btn-primary mb-2">Download File</a> -->
        <a href="<?= base_url('dashboard/cetak-daftar-hadir/' . $id_agenda) ?>" class="btn btn-secondary" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Cetak Agenda</a>
>>>>>>> cc90b4197b658ca85908edeea01ce0cd1a399deb
        <!-- foreach php -->
        <div class="table-container my-3">
            <table id="example" class="order-column" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP/NIK</th>
                        <th>Nama</th>
                        <th>Asal Instansi</th>
                        <th>TTD</th>
                        <th>Timestamp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftar_hadir as $item) : ?>
                        <tr>
                            <td></td>
                            <td><?= $item['NIK'] ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['asal_instansi'] ?></td>
                            <td>
                                <div class="btn btn-secondary show-sweet-alert" data-ttd="<?= $item['ttd'] ?>">Lihat</div>
                                <!-- <div class="btn btn-secondary" id="showSweetAlertButton">Lihat</div> -->
                            </td>
                            <td><?= $item['daftarhadirs_created_at'] ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-12 btn-group">
                                        <button href="#" class="btn btn-danger delete-button" data-id="<?= $item['id_daftar_hadir'] ?>"><i class=" fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="button-container">
            <div class="icon-empty">
                <img src="<?php echo base_url('assets/img/icon-empty.svg'); ?>" alt="SVG Image">
            </div>
            <div class="data-kosong">
                Daftar hadir masih kosong.
            </div>
        </div>
    <?php endif; ?>
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
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/dashboard/agenda-rapat/daftar-hadir/delete-peserta/' + id;
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const showSweetAlertButtons = document.querySelectorAll(".show-sweet-alert");

        showSweetAlertButtons.forEach(button => {
            button.addEventListener("click", function() {
                const ttd = this.getAttribute("data-ttd");

                Swal.fire({
                    title: 'Tanda tangan',
                    html: `<img src="${ttd}" width="300" height="200" alt="Image">`,
                    confirmButtonText: 'Close',
                });
            });
        });
    });
</script>

<?= $this->endSection() ?>