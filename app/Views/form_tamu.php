<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="konten">
        <div class="judul-form">
            <h1>FORM DAFTAR HADIR | TAMU PEMKAB</h1>
            <h2>Lengkapi data berikut</h2>
        </div>
        <div class="wrapper">
            <h3>Rapat Koordinasi</h3>
            <h4>Isi sesuai dengan data diri anda</h4>
            <form action="/submit-kode/form-absensi/tamu/store" method="post">
                <?php csrf_field() ?>
                <!--   hidden input -->
                <input type="hidden" name="kode_rapat" value="<?= session()->get('kode_valid') ?>">

                <div class="form-group mb-2">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control <?= validation_show_error('nik') ? 'is-invalid' : '' ?>" value="<?= old('nik') ?>" id="nik" name="nik" placeholder=" ">
                    <div class="invalid-feedback">
                        <?= validation_show_error('nik') ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="no_hp" class="form-label">No. Handphone</label>
                    <input type="text" class="form-control <?= validation_show_error('no_hp') ? 'is-invalid' : '' ?>" value="<?= old('no_hp') ?>" id="no_hp" name="no_hp" placeholder=" ">
                    <div class="invalid-feedback">
                        <?= validation_show_error('no_hp') ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control  <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" value="<?= old('nama') ?>" id="nama" name="nama" placeholder=" ">
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama') ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control  <?= validation_show_error('alamat') ? 'is-invalid' : '' ?>" value="<?= old('alamat') ?>" id="alamat" name="alamat" placeholder=" ">
                    <div class="invalid-feedback">
                        <?= validation_show_error('alamat') ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="asal_instansi" class="form-label">Asal Instansi</label>
                    <input type="text" class="form-control  <?= validation_show_error('asal_instansi') ? 'is-invalid' : '' ?>" value="<?= old('asal_instansi') ?>" id="asal_instansi" name="asal_instansi" placeholder=" ">
                    <div class="invalid-feedback">
                        <?= validation_show_error('asal_instansi') ?>
                    </div>
                </div>
                <div class="signature-pad">
                    <h1>Tempat Tanda Tangan</h1>
                    <canvas id="signatureCanvas" class="signature-canvas"></canvas>
                    <input type="hidden" id="signatureData" name="signatureData" value="">
                </div>
                <div class="button-container">
                    <button type="button" onclick="clearSignature()" class="signature-button">Clear</button>
                </div>


                <div class="form-group text-end">
                    <button onclick="saveSignature()" type="submit" class="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

<?= $this->endSection() ?>