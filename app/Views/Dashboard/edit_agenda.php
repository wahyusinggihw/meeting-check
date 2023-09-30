<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>

    <!-- <div class="agenda-form">
        <h1>Edit Agenda Rapat</h1>
        <form action="edit-agenda/update/<?= $data['id'] ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" id="text" name="id" value="<?= $data['id'] ?>"><br><br>

            <label for="time">Judul Rapat:</label>
            <input type="text" id="text" name="judul_rapat" placeholder="Judul Rapat" required value="<?= $data['judul_rapat'] ?>"><br><br>

            <label for="time">Tempat:</label>
            <input type="text" id="text" name="tempat" placeholder="Judul Rapat" required value="<?= $data['tempat'] ?>"><br><br>

            <label for="time">Tanggal/Hari:</label>
            <input type="date" id="date" name="tanggal" placeholder="Tanggal dan Hari" required value="<?= $data['tanggal'] ?>"><br><br>

            <label for="time">Waktu:</label>
            <input type="text" id="time" name="jam" placeholder="Contoh: 09:00 AM" value="<?= $data['jam'] ?>" required><br><br>

            <button type="submit">Tambah Agenda</button>
        </form>
    </div> -->

    <div class="col-8 my-2">
        <form action="/dashboard/agenda-rapat/edit-agenda/<?= $data['id'] ?>/update" method="post">
            <?= csrf_field() ?>
            <div class="form-group row"></div>
            <input type="hidden" id="text" name="id" value="<?= $data['id'] ?>"><br><br>

            <label for="judul_rapat">Judul Rapat:</label>
            <input class="form-control  <?= ($validation->hasError('judul_rapat')) ? 'is-invalid' : '' ?>" type="text" id="judul_rapat" name="judul_rapat" placeholder="Judul Rapat" value="<?= $data['judul_rapat'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('judul_rapat') ?>
            </div>
            <br>

            <label for="tempat">Tempat Rapat:</label>
            <input class="form-control <?= ($validation->hasError('tempat')) ? 'is-invalid' : '' ?>" type="text" id="tempat" name="tempat" placeholder="Tempat Rapat" value="<?= $data['tempat'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('tempat') ?>
            </div>
            <br>

            <label for="tanggal">Tanggal/Hari:</label>
            <input class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : '' ?>" type="date" id="tanggal" name="tanggal" placeholder="Tanggal dan Hari" value="<?= $data['tanggal'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('tanggal') ?>
            </div>
            <br>

            <label for="jam">Waktu:</label>
            <input class="form-control <?= ($validation->hasError('jam')) ? 'is-invalid' : '' ?>" type="time" id="jam" name="jam" value="<?= $data['jam'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('jam') ?>
            </div>
            <br>

            <label for="agenda">Agenda Rapat:</label>
            <textarea class="form-control" id="agenda" name="agenda" placeholder="Masukkan agenda rapat"><?= $data['agenda'] ?></textarea><br>

            <button type="submit" class="btn btn-primary">Update Agenda</button>
        </form>

    </div>
</body>

<?= $this->endSection() ?>