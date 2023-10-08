<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<body>
    <meta http-equiv="refresh" content="3;url=<?= base_url() ?>" />
    <div class="notifikasi">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="m9 20.42l-6.21-6.21l2.83-2.83L9 14.77l9.88-9.89l2.83 2.83L9 20.42Z" />
            </svg>
            <p>Berhasil</p>
        </div>
        <p>Terimakasih telah mengisi daftar hadir!</p>
        <a href="<?= base_url() ?>">
            <button type="submit" class="lanjut">Lanjutkan</button>
        </a>
    </div>

</body>

<?= $this->endSection() ?>