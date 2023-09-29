<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <a href="<?= base_url('/dashboard/form-agenda') ?>" class="download-button">Tambah Agenda</a>

    <div class="table-container">
        <table class="participant-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Departemen</th>
                    <th>Alamat</th>
                    <th>Nomer HP</th>
                    <th>TTD</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Manager</td>
                    <td>Keuangan</td>
                    <td>jln. A AYANI</td>
                    <td>084722612936</td>
                    <td>File</td>
                </tr>
                <tr>
                    <td>Jane Smith</td>
                    <td>Supervisor</td>
                    <td>SDM</td>
                    <td>jln. A AYANI</td>
                    <td>084722612936</td>
                    <td>File</td>
                </tr>
                <tr>
                    <i class="fa-solid fa-pen"></i>

                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</body>

<?= $this->endSection() ?>