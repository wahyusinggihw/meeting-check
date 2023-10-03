<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="content">
    <div class="frame">
        <div class="div-1">
            <div class="pilih-status">PILIH STATUS</div>
            <p class="silahkan-pilih-anda">Silahkan Pilih Anda Sebagai<br />Tamu Pemkab atau Pegawai Pemkab</p>
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
            <div class="learn-more-btn">
                <div class="learn-more">Isi Form</div>
                <img class="vector" src="img/vector.svg" />
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
            <div class="learn-more-btn">
                <div class="learn-more">Isi Form</div>
                <img class="vector" src="img/image.svg" />
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>