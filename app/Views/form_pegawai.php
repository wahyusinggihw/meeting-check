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
            <form action="/submit-kode/form-absensi/pegawai/store" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="kode_rapat" value="<?= session()->get('kode_valid') ?>">
                <div class="form-group mb-2">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control  <?= validation_show_error('nip') ? 'is-invalid' : '' ?>" value="<?= old('nip') ?>" id="nip" name="nip" placeholder=" " onchange="searchNIP()">
                    <div class="invalid-feedback text-start">
                        <?= validation_show_error('nip') ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="no_hp" class="form-label">No. Handphone</label>
                    <input type="text" class="form-control  <?= validation_show_error('no_hp') ? 'is-invalid' : '' ?>" value="<?= old('no_hp') ?>" id="no_hp" name="no_hp" placeholder=" ">
                    <div class="invalid-feedback text-start">
                        <?= validation_show_error('no_hp') ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control  <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" value="<?= old('nama') ?>" id="nama" name="nama" placeholder=" ">
                    <div class="invalid-feedback text-start">
                        <?= validation_show_error('nama') ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control  <?= validation_show_error('alamat') ? 'is-invalid' : '' ?>" value="<?= old('alamat') ?>" id="alamat" name="alamat" placeholder=" ">
                    <div class="invalid-feedback text-start">
                        <?= validation_show_error('alamat') ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="asal_instansi" class="form-label">Asal Instansi</label>
                    <!-- <input type="text" class="form-control" id=" " placeholder=" "> -->
                    <select name="asal_instansi" id="asal_instansi" class="form-select <?= validation_show_error('asal_instansi') ? 'is-invalid' : '' ?>">
                        <!-- foreach -->
                        <option value="">Pilih instansi</option>
                        <?php foreach ($instansi->data as $i) : ?>
                            <option value="<?= $i->ket_ukerja ?>"><?= $i->ket_ukerja ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback text-start">
                        <?= validation_show_error('asal_instansi') ?>
                    </div>
                </div>

                <div class="signature-pad <?= validation_show_error('signatureData') ? 'is-invalid' : '' ?>">
                    <h1>Tempat Tanda Tangan</h1>
                    <canvas id="signatureCanvas" class="signature-canvas"></canvas>
                    <input type="hidden" id="signatureData" name="signatureData" value="">
                </div>
                <div class="button-container ">
                    <button type="button" onclick="clearSignature()" class="signature-button btn btn-sm btn-danger">Clear</button>
                </div>
                <div class="invalid-feedback text-start">
                    <?= validation_show_error('signatureData') ?>
                </div>
                <div class="form-group text-end">
                    <button onclick="saveSignature()" type="submit" class="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        function searchNIP() {
            var nip = $('#nip').val();
            getPegawai(event.target.value).then(data => {
                console.log(data);
                $('#no_hp').val(data.data.email_ukerja);
                $('#nama').val(data.data.ket_ukerja);
                $('#alamat').val(data.data.alamat_ukerja);
                $('#asal_instansi').val(data.data.ket_ukerja);
            })
            // })

            async function getPegawai(nip) {
                let response = await fetch('/api/instansi/' + nip);
                let data = await response.json();
                // console.log(data);
                return data;
            }
            if (nip.length === 8) {
                // $('#nip').on('change', (event) => {
            }
        }
    </script>
</body>



<?= $this->endSection() ?>