<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <?php if ($daftar_hadir != null) : ?>
        <a href="#" download class="btn btn-primary mb-2">Download File</a>
        <!-- foreach php -->

        <div class="table-container my-3">
            <table id="example" class="order-column" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Asal Instansi</th>
                        <th>TTD</th>
                        <th>Timestamp</th>
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
                            <td><?= $item['created_at'] ?></td>
                        </tr>
                    <?php endforeach; ?>
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
            dom: 'Bfrtip',
            buttons: [
                'print'
            ],
            // buttons: [{
            //     extend: 'print',
            //     customize: function(win) {
            //         // Menambahkan nomor pada setiap baris
            //         $(win.document.body).find('td').each(function(index) {
            //             $(this).prepend('<td>' + (index + 1) + '</td>');
            //         });
            //         // Menambahkan judul kolom nomor
            //         // $(win.document.body).find('table thead tr').prepend('');
            //     }
            // }],
            // Additional DataTables options here
            createdRow: function(row, data, dataIndex) {
                $('td:eq(0)', row).html(startNumber++);
            }
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