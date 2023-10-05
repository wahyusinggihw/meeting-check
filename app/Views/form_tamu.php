<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="content">
    <div class="judul-form">
        <p class="FORM-DAFTAR-HADIR">FORM DAFTAR HADIR | TAMU PEMKAB</p>
        <div class="text-wrapper-2">Lengkapi data berikut</div>
    </div>

    <div class="form">
        <div class="subhead">
            <div class="text-wrapper">Rapat Koordinasi</div>
            <p class="div">Isi sesuai dengan data diri anda</p>
        </div>
        <div class="field">
            <div class="field-label">Nama Lengkap</div>
            <div class="input">
                <input type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label></label>
            </div>
        </div>
        <div class="field-2">
            <div class="field-label">Alamat</div>
            <div class="input">
                <input type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label></label>
                <img class="line" src="img/line-3.svg" />
            </div>
        </div>
        <div class="field-3">
            <div class="field-label">Asal Instansi</div>
            <div class="input">
                <input type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label></label>
                <img class="line" src="img/line-4.svg" />
            </div>
        </div>
        <div class="field-4">
            <div class="field-label">NIK</div>
            <div class="input">
                <input type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label></label>
                <img class="line" src="img/line-2.svg" />
            </div>
        </div>
        <div class="field-5">
            <div class="field-label">No Handphone</div>
            <div class="input">
                <input type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label></label>
                <img class="line" src="img/image.svg" />
            </div>
        </div>

        <!-- <div class="group">
            <input type="text" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Name</label>
        </div>

        <div class="group">
            <input type="text" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Email</label>
        </div> -->

        <button class="secondary-button">
            <div class="label">Submit</div>
        </button>
    </div>
</div>


<?= $this->endSection() ?>