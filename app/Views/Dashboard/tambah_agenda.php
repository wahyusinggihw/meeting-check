<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>


    <!-- <form action="tambah-agenda/store" method="post">
            <label for="time">Judul Rapat:</label>
            <input class="is-invalid" type="text" id="text" name="Judul" placeholder="Judul Rapat">

            <br><br>

            <label for="time">Tempat Rapat:</label>
            <input type="text" id="text" name="tempat" placeholder="Tempat Rapat"><br><br>

            <label for="time">Tanggal/Hari:</label>
            <input type="date" id="date" name="tanggal" placeholder="Tanggal dan Hari"><br><br>


            <label for="time">Waktu:</label>
            <input type="text" id="time" name="jam" placeholder="Contoh: 09:00 AM"><br><br>

            <label for="item">Agenda Rapat:</label>
            <textarea id="item" name="agenda" placeholder="Masukkan agenda rapat"></textarea><br><br>

            <button type="submit">Tambah Agenda</button>
        </form> -->
    <div class="col-8 my-2">
        <form action="tambah-agenda/store" method="post">
            <?= csrf_field() ?>
            <div class="form-group row"></div>
            <label for="judul_rapat">Judul Rapat:</label>
            <input class="form-control <?= ($validation->hasError('judul_rapat')) ? 'is-invalid' : '' ?>" type="text" id="judul_rapat" name="judul_rapat" placeholder="Judul Rapat" autofocus>
            <div class="invalid-feedback">
                <?= $validation->getError('judul_rapat') ?>
            </div>
            <br>

            <label for="tempat">Tempat Rapat:</label>
            <input class="form-control <?= ($validation->hasError('tempat')) ? 'is-invalid' : '' ?>" type="text" id="tempat" name="tempat" placeholder="Tempat Rapat">
            <div class="invalid-feedback">
                <?= $validation->getError('tempat') ?>
            </div>
            <br>

            <label for="tanggal">Tanggal/Hari:</label>
            <input class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : '' ?>" type="date" id="tanggal" name="tanggal" placeholder="Tanggal dan Hari">
            <div class="invalid-feedback">
                <?= $validation->getError('tanggal') ?>
            </div>
            <br>

            <label for="jam">Waktu:</label>
            <input class="form-control <?= ($validation->hasError('jam')) ? 'is-invalid' : '' ?>" type="text" id="jam" name="jam" placeholder="Contoh: 09:00 AM">
            <div class="invalid-feedback">
                <?= $validation->getError('jam') ?>
            </div>
            <br>

            <label for="agenda">Agenda Rapat:</label>
            <textarea class="form-control" id="agenda" name="agenda" placeholder="Masukkan agenda rapat"></textarea><br>

            <button type="submit" class="btn btn-primary">Tambah Agenda</button>
        </form>

    </div>
    </div>
</body>

<?= $this->endSection() ?>