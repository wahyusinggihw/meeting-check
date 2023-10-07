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
            <form action="" method="post">
                <div class="form-group mb-2">
                    <label for=" " class="form-label">NIP</label>
                    <input type="text" class="form-control" id=" " placeholder=" ">
                </div>
                <div class="form-group mb-2">
                    <label for=" " class="form-label">No. Handphone</label>
                    <input type="text" class="form-control" id=" " placeholder=" ">
                </div>
                <div class="form-group mb-2">
                    <label for=" " class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id=" " placeholder=" ">
                </div>
                <div class="form-group mb-2">
                    <label for=" " class="form-label">Alamat</label>
                    <input type="text" class="form-control" id=" " placeholder=" ">
                </div>
                <div class="form-group mb-3">
                    <label for=" " class="form-label">Asal Instansi</label>
                    <input type="text" class="form-control" id=" " placeholder=" ">
                </div>
                <div class="form-group">
                    <button type="submit" class="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

<?= $this->endSection() ?>