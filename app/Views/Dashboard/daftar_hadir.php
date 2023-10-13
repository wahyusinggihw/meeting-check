<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="form-group mb-3">
        <form action="/dashboard/daftar-hadir/cari" method="post">
            <?= csrf_field() ?>
            <label for="daftar_agenda" class="form-label">Pilih Agenda</label>
            <select name="daftar_agenda" id="daftar_agenda" class="form-select">
                <option value="">Pilih Agenda Rapat</option>
                <?php foreach ($agenda_rapat as $i) : ?>
                    <option value="<?= $i['id_agenda'] ?>"><?= $i['judul_rapat'] ?></option>
                <?php endforeach; ?>
            </select>
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>
    </div>

    <?php if ($daftar_hadir != null) : ?>
        <a href="#" download class="download-button">Download File</a>
        <!-- foreach php -->
        <div class="table-container">
            <table class="participant-table">
                <thead>
                    <tr>
                        <th>Judul Rapat</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Agenda</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Asal Instansi</th>
                        <th>TTD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftar_hadir as $item) : ?>
                        <tr>
                            <td><?= $item['judul_rapat'] ?></td>
                            <td><?= $item['tanggal'] ?></td>
                            <td><?= $item['jam'] ?></td>
                            <td><?= $item['agenda'] ?></td>
                            <td><?= $item['NIK'] ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['asal_instansi'] ?></td>
                            <td><?= $item['ttd'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</body>

<?= $this->endSection() ?>