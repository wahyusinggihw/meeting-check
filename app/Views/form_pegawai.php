<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="konten">
        <div class="judul-form">
            <h1>FORM DAFTAR HADIR | PEGAWAI PEMKAB</h1>
            <h2>Lengkapi data berikut</h2>
        </div>
        <div class="wrapper">
            <h3>Rapat Koordinasi</h3>
            <h4>Isi sesuai dengan data diri anda</h4>
            <form action="/submit-kode/form-absensi/pegawai" method="post">
                <div class="form-group mb-2">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" placeholder=" ">
                </div>
                <div class="form-group mb-2">
                    <label for="no_hp" class="form-label">No. Handphone</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder=" ">
                </div>
                <div class="form-group mb-2">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder=" ">
                </div>
                <div class="form-group mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder=" ">
                </div>
                <div class="form-group mb-3">
                    <label for="asal_instansi" class="form-label">Asal Instansi</label>
                    <!-- <input type="text" class="form-control" id=" " placeholder=" "> -->
                    <select name="asal_instansi" id="asal_instansi" class="form-select">
                        <!-- foreach -->
                        <option value="">Pilih instansi</option>
                        <?php foreach ($instansi->data as $i) : ?>
                            <option value="<?= $i->ket_ukerja ?>"><?= $i->ket_ukerja ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="signature-pad">
                    <h1>Tempat Tanda Tangan</h1>
                    <div class="signature-container">
                        <canvas id="signatureCanvas" class="signature-canvas"></canvas>
                    </div>
                    <div class="button-container">
                        <button type="button" onclick="clearSignature()" class="signature-button">Clear</button>
                    </div>
                </div>

                <div class="form-group text-end">
                    <button onclick="saveSignature()" type="submit" class="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>



<?= $this->endSection() ?>