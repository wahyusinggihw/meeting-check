<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="konten">
        <div class="judul-form">
            <h1>FORM DAFTAR HADIR | TAMU PEMKAB</h1>
            <h2>Lengkapi data berikut</h2>
        </div>
        <div class="wrapper">
            <?php if (session()->getFlashdata('error')) : ?>
                <?= session()->getFlashdata('error') ?>
            <?php endif; ?>

            <h3>Rapat Koordinasi</h3>
            <h4>Isi sesuai dengan data diri anda</h4>
            <form action="/submit-kode/form-absensi/tamu/store" method="post">
                <div class="form-group mb-2">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>" id="nik" name="nik" placeholder=" ">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nik') ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="no_hp" class="form-label">No. Handphone</label>
                    <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : '' ?>" id="no_hp" name="no_hp" placeholder=" ">
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_hp') ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control  <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" placeholder=" ">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama') ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control  <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>" id="alamat" name="alamat" placeholder=" ">
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat') ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="asal_instansi" class="form-label">Asal Instansi</label>
                    <input type="text" class="form-control  <?= ($validation->hasError('asal_instansi')) ? 'is-invalid' : '' ?>" id="asal_instansi" name="asal_instansi" placeholder=" ">
                    <div class="invalid-feedback">
                        <?= $validation->getError('asal_instansi') ?>
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="submit" class="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

<?= $this->endSection() ?>