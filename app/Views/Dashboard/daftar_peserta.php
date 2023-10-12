<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="form-group mb-3">
        <label for="asal_instansi" class="form-label">Asal Instansi</label>
        <!-- <input type="text" class="form-control" id=" " placeholder=" "> -->
        <select name="asal_instansi" id="asal_instansi" class="form-select">
            <!-- foreach -->
            <option value="">Pilih Agenda Rapat</option>
            <?php foreach ($data as $i) : ?>
                <option value="<?= $i['judul_rapat'] ?>"><?= $i['judul_rapat'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <a href="#" download class="download-button">Download File</a>

    <div class="table-container">
        <table class="participant-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Instansi</th>
                    <th>Alamat</th>
                    <th>Nomer HP</th>
                    <th>TTD</th>
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
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</body>

<?= $this->endSection() ?>