<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>

    <div class="col-8 my-2">
        <form action="/dashboard/agenda-rapat/edit-agenda/<?= $data['id_agenda'] ?>/update" method="post">
            <?= csrf_field() ?>
            <div class="form-group row"></div>
            <input type="hidden" id="text" name="id" value="<?= $data['id_agenda'] ?>"><br><br>

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