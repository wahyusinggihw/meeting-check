<?= $this->extend('layout/page_layout') ?>

<?= $this->section('style') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/formabsensi.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<body>
    <section class="container">
        <header>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit maiores in facere voluptatibus, eaque et quaerat architecto vitae nihil dolorum.</header>
        <p>Isi sesuai dengan data diri anda</p>
        <form action="#" class="form">
            <div class="gender-box">
                <h3>Pilih Status</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" checked />
                        <label for="check-male">Pegawai</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" />
                        <label for="check-female">Tamu</label>
                    </div>
                </div>
            </div>
            <div class="gender-box">
                <h3>Pilih Status Pegawai</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" checked />
                        <label for="check-male">ASN</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" />
                        <label for="check-female">Non-ASN</label>
                    </div>
                </div>
            </div>

            <div class="inputcontainer">
                <label>NIP</label>
                <div class="icon-container">
                    <i class="loader"></i>
                </div>
                <input type="text" placeholder="Masukkan NIP" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan Nama Lengkap" required />
                </div>
                <div class="input-box">
                    <label>No. Handphone</label>
                    <input type="text" placeholder="Masukkan No. Handphone" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Alamat</label>
                    <input type="text" placeholder="Masukkan Alamat" required />
                </div>
                <div class="input-box">
                    <label>Asal Instansi</label>
                    <input type="text" placeholder="Masukkan Asal Instansi" required />
                </div>
            </div>

            <div class="input-box">
                <div class="signature-pad <?= validation_show_error('signatureData') ? 'is-invalid' : '' ?>">
                    <h3>Tempat Tanda Tangan</h3>
                    <canvas id="signatureCanvas" class="signature-canvas" width="600" height="400"></canvas>
                    <input type="hidden" id="signatureData" name="signatureData" value="" />
                    <a type="button" onclick="clearSignature()" class="signature-button btn btn-sm btn-danger">Ulangi Tanda Tangan</a>
                </div>
            </div>

            <button>Kirim</button>
        </form>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>


<?= $this->endSection() ?>