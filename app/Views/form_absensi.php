<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="konten">
        <div class="judul-form">
            <h1>Form Daftar Hadir</h1>
            <h2>Lengkapi data berikut</h2>
        </div>
        <div class="wrapper">
            <div class="text-center">
                <h3><?= isset($rapat['agenda_rapat']) ? $rapat['agenda_rapat'] : 'Rapat'  ?></h3>
                <h4>Isi sesuai dengan data diri anda</h4>
            </div>
            <form action="<?= base_url('/submit-kode/form-absensi/store') ?>" method="post" id="form_pegawai" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="kode_rapat" value="<?= session()->get('kode_valid') ?>">

                <div class="form-group mb-2 mt-4">
                    <label class="form-label">Pilih Status</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input statusRadio" type="radio" name="statusRadio" id="statusRadio1" value="pegawai" checked>
                            <label class="form-check-label" for="statusRadio1">Pegawai</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input statusRadio" type="radio" name="statusRadio" id="statusRadio2" value="tamu">
                            <label class="form-check-label" for="statusRadio2">Tamu</label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="nip" class="form-label">NIP/NIK</label>
                    <input type="text" class="form-control  <?= validation_show_error('nip') ? 'is-invalid' : '' ?>" value="<?= old('nip') ?>" id="nip" name="nip" placeholder="Masukkan NIK/NIP anda">
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
                <!-- radio select peran -->
                <div class="form-group mb-3" id="instansiOption">
                    <label for="asal_instansi" class="form-label">Asal Instansi</label>
                    <!-- <input type="text" class="form-control" id=" " placeholder=" "> -->
                    <select name="asal_instansi" id="asal_instansi" class="form-select <?= validation_show_error('asal_instansi') ? 'is-invalid' : '' ?>" value="<?= old('asal_instansi') ?>" id="asal_instansi" name="asal_instansi">
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

                <div class="form-group mb-3" id="instansiText" style="display: none;">
                    <label for="asal_instansi" class="form-label">Asal Instansi</label>
                    <input type="text" class="form-control  <?= validation_show_error('asal_instansi') ? 'is-invalid' : '' ?>" value="<?= old('asal_instansi') ?>" id="asal_instansi" name="asal_instansi" placeholder=" ">
                    <div class="invalid-feedback">
                        <?= validation_show_error('asal_instansi') ?>
                    </div>
                </div>

                <div class="signature-pad <?= validation_show_error('signatureData') ? 'is-invalid' : '' ?>">
                    <h1>Tempat Tanda Tangan</h1>
                    <canvas id="signatureCanvas" class="signature-canvas"></canvas>
                    <input type="hidden" id="signatureData" name="signatureData" value="">
                </div>
                <div class="invalid-feedback text-start">
                    <?= validation_show_error('signatureData') ?>
                </div>
                <div class="button-container ">
                    <button type="button" onclick="clearSignature()" class="signature-button btn btn-sm btn-danger">Ulangi Tanda Tangan</button>
                </div>
                <div class="form-group text-end">
                    <button onclick="saveSignature()" type="submit" class="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            // Add a change event listener to the 'nip' input
            var nipPlaceholder = $(this).attr('placeholder');
            $('#nip').on('change', function() {
                var nipValue = $(this).val();
                var statusValue = $('input[name="statusRadio"]:checked').val();

                // Determine which API to call based on the 'statusValue'
                var apiEndpoint = (statusValue === 'pegawai') ? '/api/users/' : '/api/peserta/';

                // Make the AJAX request
                $.ajax({
                    url: apiEndpoint + nipValue,
                    type: 'GET',
                    success: function(data) {
                        if (data.status === false) {
                            // Handle the case where data is not found
                            $('#no_hp, #nama, #alamat, #asal_instansi').val('').prop('readonly', false);
                        } else {
                            if (statusValue === 'pegawai') {
                                $('#no_hp').val(data.data.email_ukerja).prop('readonly', true);
                                $('#nama').val(data.data.ket_ukerja).prop('readonly', true);;
                                $('#alamat').val(data.data.alamat_ukerja).prop('readonly', true);;
                                $('#asal_instansi').val(data.data.ket_ukerja).prop('readonly', true);;
                            } else {
                                // Update the form fields with the fetched data
                                $('#no_hp').val(data.no_hp).prop('readonly', true);
                                $('#nama').val(data.nama).prop('readonly', true);
                                $('#alamat').val(data.alamat).prop('readonly', true);
                                $('#asal_instansi').val(data.asal_instansi).prop('readonly', true);
                            }
                        }
                    },
                    error: function() {
                        // Handle errors if the AJAX request fails
                        console.log("AJAX Error: " + errorThrown);
                    }
                });
            });

            // Trigger the change event on 'nip' input when a radio button is clicked
            $('.statusRadio').on('click', function() {
                $('#nip, #no_hp, #nama, #alamat, #asal_instansi').val('');

                // Show/hide the 'instansiOption' and 'instansiText' divs based on the selected radio button
                if ($(this).val() === 'pegawai') {
                    $('#instansiText').hide();
                } else {
                    $('#instansiText').show();
                    $('#instansiOption').hide();
                }
            });
        });
    </script> -->
    <script type="text/javascript" src="<?= base_url('assets/js/signature.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#nip').on('change', function() {
                var nipValue = $(this).val();
                var statusValue = $('input[name="statusRadio"]:checked').val();

                // Determine which API to call based on the 'statusValue'
                var apiEndpoint = (statusValue === 'pegawai') ? '/api/pegawai/' : '/api/peserta/';

                // Make the AJAX request
                $.ajax({
                    url: apiEndpoint + nipValue,
                    type: 'GET',
                    success: function(data) {
                        if (data.status === false) {
                            // Handle the case where data is not found
                            $('#no_hp, #nama, #alamat, #asal_instansi').val('').prop('readonly', false);
                        } else {
                            console.log(data);
                            if (statusValue === 'pegawai') {
                                $('#no_hp').val(data.data.email_ukerja).prop('readonly', true);
                                $('#nama').val(data.data.ket_ukerja).prop('readonly', true);
                                $('#alamat').val(data.data.alamat_ukerja).prop('readonly', true);
                                $('#instansiOption, #asal_instansi').val(data.data.ket_ukerja).prop('readonly', true);
                            } else {

                                // Update the form fields with the fetched data
                                $('#no_hp').val(data.no_hp).prop('readonly', true);
                                $('#nama').val(data.nama).prop('readonly', true);
                                $('#alamat').val(data.alamat).prop('readonly', true);
                                $('#instansiText, #asal_instansi').val(data.asal_instansi).prop('readonly', true);
                            }
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle errors if the AJAX request fails
                        console.log("AJAX Error: " + textStatus);
                    }
                });
            });

            // Trigger the change event on 'nip' input when a radio button is clicked
            $('.statusRadio').on('click', function() {
                $('#nip, #no_hp, #nama, #alamat, #asal_instansi').val('');
                clearSignature();
                // Show/hide the 'instansiOption' and 'instansiText' divs based on the selected radio button
                if ($(this).val() === 'pegawai') {
                    $('#instansiOption').show();
                    $('#instansiText').hide();
                } else {
                    $('#instansiOption').hide();
                    $('#instansiText').show();
                }
            });
        });
    </script>

</body>



<?= $this->endSection() ?>