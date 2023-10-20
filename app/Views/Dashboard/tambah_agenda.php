<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>




    <div class="col-8 my-2">
        <form action="<?= base_url('/dashboard/agenda-rapat/tambah-agenda/store') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group row"></div>

            <label for="judul_rapat">Judul Rapat:</label>
            <input class="form-control <?= validation_show_error('agenda_rapat') ? 'is-invalid' : '' ?>" value="<?= old('agenda_rapat') ?>" type="text" id="agenda_rapat" name="agenda_rapat" placeholder="Judul Rapat" autofocus>
            <div class="invalid-feedback">
                <?= validation_show_error('agenda_rapat') ?>
            </div>
            <br>

            <label for="tempat">Tempat Rapat:</label>
            <input class="form-control <?= validation_show_error('tempat') ? 'is-invalid' : '' ?>" type="text" id="tempat" name="tempat" placeholder="Tempat Rapat">
            <div class="invalid-feedback">
                <?= validation_show_error('tempat') ?>
            </div>
            <br>

            <label for="tanggal">Tanggal/Hari:</label>
            <input class="form-control <?= validation_show_error('tanggal') ? 'is-invalid' : '' ?>" type="date" id="tanggal" name="tanggal" placeholder="Tanggal dan Hari">
            <div class="invalid-feedback">
                <?= validation_show_error('tanggal') ?>
            </div>
            <br>

            <label for="jam">Waktu:</label>
            <input class="form-control <?= validation_show_error('jam') ? 'is-invalid' : '' ?>" type="time" id="jam" name="jam">
            <div class="invalid-feedback">
                <?= validation_show_error('jam') ?>
            </div>
            <br>

            <label for="agenda">Agenda Rapat:</label>
            <textarea class="form-control <?= validation_show_error('deskripsi') ? 'is-invalid' : ''  ?>" id="deskripsi" name="deskripsi" placeholder="Masukkan agenda rapat"></textarea><br>
            <div class="invalid-feedback">
                <?= validation_show_error('deskripsi') ?>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Agenda</button>
        </form>

    </div>

    <?= $this->endSection() ?>