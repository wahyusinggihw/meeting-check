<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <!-- form -->
    <form action="/dashboard/daftar-hadir/cari" method="post">
        <?= csrf_field() ?>
        <!-- <div class="container"> -->
            <label for="daftar_agenda" class="form-label">Pilih Agenda</label>
            <div class="row align-items-start">
                <div class="col">
                    <select name="daftar_agenda" id="daftar_agenda" class="form-select">
                        <option value="">Pilih Agenda Rapat</option>
                        <?php foreach ($agenda_rapat as $i) : ?>
                            <option value="<?= $i['id_agenda'] ?>"><?= $i['judul_rapat'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <button id="submit" class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        <!-- </div> -->
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#daftar_agenda').on('change', function() {
            $('#submit').prop('disabled', !$(this).val());
        }).trigger('change');
    </script>

    <?php if ($daftar_hadir != null) : ?>
        <a href="#" download class="btn btn-primary my-2">Download File</a>
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