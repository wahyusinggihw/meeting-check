<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="content">
    <div class="frame">
        <div class="div-1">
            <div class="pilih-status">PILIH STATUS</div>
            <p class="silahkan-pilih-anda"><?= $data['judul_rapat'] ?><br />Silahkan pilih status anda</p>
        </div>
    </div>
    <div class="frame-2">
        <div class="what-we-do-card">
            <div class="div">
                <div class="activity"><i class="fa-solid fa-clipboard-user custom-icon-2" style="color: #ffffff;"></i></div>
                <div class="div">
                    <div class="grow-your-business">Tamu Pemkab</div>
                    <p class="we-help-identify-the">Pilih Jika Anda Berasal Dari Luar Pegawai Pemkab</p>
                </div>
            </div>
            <div class="learn-more-btn btn">
                <a href="/submit-kode/form-absensi/tamu">
                    <div class="learn-more">Isi Form <i class="fa-solid fa-arrow-right"></i></div>
                </a>
            </div>
        </div>
        <div class="what-we-do-card">
            <div class="div">
                <div class="activity"><i class="fa-solid fa-user-tie custom-icon-1" style="color: #ffffff;"></i></div>
                <div class="div">
                    <div class="grow-your-business">Pegawai Pemkab</div>
                    <p class="we-help-identify-the">Pilih Jika Anda Sebagai Pegawai Pemkab</p>
                </div>
            </div>
            <div class="learn-more-btn btn">
                <a href="/submit-kode/form-absensi/pegawai">
                    <div class="learn-more">Isi Form <i class="fa-solid fa-arrow-right"></i></div>
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>