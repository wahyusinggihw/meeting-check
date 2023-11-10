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
            <?= csrf_field() ?>
            <?php
            // Capture the old value of the status radio input
            $oldStatusValue = old('statusRadio');
            $oldAsnNonAsnValue = old('asnNonAsnRadio');
            ?>
            <div class="status-box">
                <h3>Pilih Status</h3>
                <div class="status-option">
                    <div class="status">
                        <input class="statusRadio" name="statusRadio" type="radio" id="statusRadio1" value="pegawai" />
                        <label class="statusRadio" for="statusRadio1">Pegawai</label>
                    </div>
                    <div class="status">
                        <input class="statusRadio" name="statusRadio" type="radio" id="statusRadio2" value="tamu" />
                        <label class="statusRadio" for="statusRadio2">Tamu</label>
                    </div>
                </div>
            </div>
            <div class="status-box" id="asnNonAsnContainer" style="display: none;">
                <h3>Pilih Status Pegawai</h3>
                <div class="status-option">
                    <div class="status">
                        <input class="asnNonAsnRadio" type="radio" id="asnRadio" name="asnNonAsnRadio" value="asn" />
                        <label for="asnRadio">ASN</label>
                    </div>
                    <div class="status">
                        <input class="asnNonAsnRadio" type="radio" id="nonAsnRadio" name="asnNonAsnRadio" value="nonasn" />
                        <label for="nonAsnRadio">Non-ASN</label>
                    </div>
                </div>
            </div>


            <div class="inputcontainer">
                <label style="display: none;" for="nip" class="form-label" id="label-nik">NIK</label>
                <label style="display: none;" for="nip" class="form-label" id="label-default">NIP</label>
                <!-- 
                    #loadingIndicator 
                    -pada tamu
                    akan muncul jika user mengetikkan nik

                    -pada pegawai
                    akan muncul jika user klik tombol cari
                 -->

                <div style="display: none;" id="loadingIndicator" class="icon-container">
                    <i class="loader"></i>
                </div>
                <input class="invalid-input" type="text" placeholder="Masukkan NIP" id="" name="nip" required />
                <a id="cariNikButton" class="cari btn btn-primary col">Cari</a>
                <div class="invalid-response">
                    Lorem Ipsum
                </div>
                <!-- Tombol cari yang dimodifikasi menggunakan tag a untuk melakukan ajax request(isi data otomatis), karena dalam 1 form hanya bisa 1 tombol yakni tombol kirim (yang dibawah) -->
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan Nama Lengkap" id="nama" name="nama" required />
                </div>
                <div class="input-box">
                    <label for="no_hp">No. Handphone</label>
                    <input type="text" placeholder="Masukkan No. Handphone" id="no_hp" name="no_hp" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label for="alamat">Alamat</label>
                    <input type="text" placeholder="Masukkan Alamat" id="alamat" name="alamat" required />
                </div>
                <div class="input-box" id="instansiText" style="display: none;">
                    <label for=" asal_instansi_tamu">Asal Instansi</label>
                    <input type="text" placeholder="Masukkan Asal Instansi" id="asal_instansi_tamu" name="asal_instansi_tamu" required />
                </div>
                <!-- option -->
                <div class="input-box" id="instansiOption">
                    <label for="asal_instansi_option">Asal Instansi</label>
                    <select class="select-box" name="asal_instansi_option" id="asal_instansi_option">
                        <option value="">Pilih instansi</option>
                        <?php foreach ($instansi->data as $i) : ?>
                            <?php $selected = old('asal_instansi_option') == $i->ket_ukerja ? 'selected' : ''; ?>
                            <option value="<?= $i->ket_ukerja ?>" <?= $selected ?>><?= $i->ket_ukerja ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="input-box">
                <div class="signature-pad <?= validation_show_error('signatureData') ? 'is-invalid' : '' ?>">
                    <h3>Tempat Tanda Tangan</h3>
                    <canvas id="signatureCanvas" class="signature-canvas" width="100%" height="100%"></canvas>
                    <input type="hidden" id="signatureData" name="signatureData" value="" />
                    <a type="button" onclick="clearSignature()" class="signature-button btn btn-sm btn-danger">Ulangi Tanda Tangan</a>
                </div>
            </div>

            <button>Kirim</button>
        </form>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/form-absensi.js') ?>"></script>


<?= $this->endSection() ?>