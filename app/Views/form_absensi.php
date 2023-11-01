<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<body>
    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= session()->getFlashdata('error') ?>',
            })
        </script>
    <?php endif; ?>

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
            <form action="<?= base_url('/submit-kode/form-absensi/store') ?>" method="post" id="form-absensi" name="form-absensi" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-input">
                    <div class="form-group mb-2 mt-4">
                        <label class="form-label">Pilih Status</label>
                        <div class="radio">
                            <div id="radio-op" class="form-check form-check-inline">
                                <input class="form-check-input statusRadio" type="radio" name="statusRadio" id="statusRadio1" value="pegawai">
                                <label class="form-check-label" for="statusRadio1">Pegawai</label>
                            </div>
                            <div id="radio-op" class="form-check form-check-inline">
                                <input class="form-check-input statusRadio" type="radio" name="statusRadio" id="statusRadio2" value="tamu">
                                <label class="form-check-label" for="statusRadio2">Tamu</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <div class="form-group mb-2 mt-2" id="asnNonAsnContainer" style="display: none;">
                        <label class="form-label">Pilih status pegawai</label>
                        <div class="radio">
                            <div id="radio-op" class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="asnNonAsnRadio" id="asnRadio" value="asn">
                                <label class="form-check-label" for="asnRadio">ASN</label>
                            </div>
                            <div id="radio-op" class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="asnNonAsnRadio" id="nonAsnRadio" value="nonasn">
                                <label class="form-check-label" for="nonAsnRadio">Non-ASN</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-input">
                    <div class="form-group mb-2">
                        <div class="row">
                            <label for="nip" class="form-label">NIP/NIK</label>
                            <div class="col">
                                <input type="text" class="form-control  <?= validation_show_error('nip') ? 'is-invalid' : '' ?>" value="<?= old('nip') ?>" id="nip" name="nip">
                                <div id="notif" class="invalid-feedback text-start">
                                    <?= validation_show_error('nip') ?>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <a id="cariNikButton" class="cari btn btn-primary">Cari</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-form">
                    <div class="form-input">
                        <div class="form-group-1 mb-2">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control  <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" value="<?= old('nama') ?>" id="nama" name="nama" placeholder=" ">
                            <div class="invalid-feedback text-start">
                                <?= validation_show_error('nama') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-input">
                        <div class="form-group-1 mb-2">
                            <label for="no_hp" class="form-label">No. Handphone</label>
                            <input type="text" class="form-control  <?= validation_show_error('no_hp') ? 'is-invalid' : '' ?>" value="<?= old('no_hp') ?>" id="no_hp" name="no_hp" placeholder=" ">
                            <div class="invalid-feedback text-start">
                                <?= validation_show_error('no_hp') ?>
                            </div>
                        </div>
                    </div>


                    <div class="form-input">
                        <div class="form-group-1 mb-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control  <?= validation_show_error('alamat') ? 'is-invalid' : '' ?>" value="<?= old('alamat') ?>" id="alamat" name="alamat" placeholder=" ">
                            <div class="invalid-feedback text-start">
                                <?= validation_show_error('alamat') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-input">
                        <div class="form-group-1 mb-2" id="instansiText" style="display: none;">
                            <label for="asal_instansi" class="form-label">Asal Instansi</label>
                            <input type="text" class="form-control  <?= validation_show_error('asal_instansi') ? 'is-invalid' : '' ?>" value="<?= old('asal_instansi') ?>" id="asal_instansi" name="asal_instansi" placeholder=" ">
                            <div class="invalid-feedback">
                                <?= validation_show_error('asal_instansi') ?>
                            </div>
                        </div>

                        <!-- radio select peran -->
                        <div class="form-group-1 mb-2" id="instansiOption">
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
                    </div>

                    <div class="form-input-sg">
                        <div class="signature-pad <?= validation_show_error('signatureData') ? 'is-invalid' : '' ?>">
                            <h1>Tempat Tanda Tangan</h1>
                            <canvas id="signatureCanvas" class="signature-canvas"></canvas>
                            <input type="hidden" id="signatureData" name="signatureData" value="">
                        </div>
                        <div class="invalid-feedback text-start">
                            <?= validation_show_error('signatureData') ?>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="kode_rapat" value="<?= session()->get('kode_valid') ?>">

                <div class="button-container">
                    <a type="button" onclick="clearSignature()" class="signature-button btn btn-sm btn-danger">Ulangi Tanda Tangan</a>
                </div>
                <div class="form-group text-end my-2">
                    <div class="g-recaptcha" data-sitekey="<?= env('RECAPTCHA_SITE_KEY_V2') ?>"></div>
                    <button onclick="saveSignature()" type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/signature.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('#no_hp, #nama, #alamat, #asal_instansi').addClass('greyed-out-form');
            $('#cariNikButton').addClass('disabled-button');
            $('#nip').prop('disabled', true);

            $('#cariNikButton').on('click', function() {
                var nikValue = $('#nip').val();
                var statusValue = $('input[name="statusRadio"]:checked').val();
                var statusValuePegawai = $('input[name="asnNonAsnRadio"]:checked').val();
                console.log(statusValuePegawai);
                console.log(statusValue);


                if (!statusValue) {
                    // Show an alert using SweetAlert when no radio button is selected
                    Swal.fire({
                        icon: 'error',
                        title: 'Pilih Status',
                        text: 'Pilih status "Pegawai" atau "Tamu" sebelum klik "Cari".',
                    });
                    return; // Exit the function
                }

                var apiEndpoint;
                if (statusValue === 'tamu') {
                    apiEndpoint = '/api/peserta/';
                }

                if (statusValue === 'pegawai') {
                    if (statusValuePegawai === 'asn') {
                        apiEndpoint = '/api/pegawai/asn/';
                    } else if (statusValuePegawai === 'nonasn') {
                        apiEndpoint = '/api/pegawai/non-asn/';
                    } else {
                        // Handle the case when 'statusValuePegawai' is not set
                    }
                }

                console.log(apiEndpoint);

                if (nikValue) {
                    // Perform an AJAX request to check if the NIK exists
                    $.ajax({
                        url: apiEndpoint + nikValue, // Replace with your API endpoint
                        type: 'GET',
                        success: function(data) {
                            console.log(data.status);
                            if (data.status === false) {
                                // Handle the case where data is not found
                                $('#no_hp, #nama, #alamat, #asal_instansi').val('').prop('readonly', false);
                                // Show an alert using SweetAlert when NIK is not found
                                Swal.fire({
                                    icon: 'error',
                                    title: 'NIP Tidak ditemukan.',
                                    text: 'NIP tidak ditemukan. Cek kembali NIP anda dan coba lagi.',
                                });
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    toast: 'true',
                                    position: 'top-end',
                                    text: 'Silahkan melakukan tanda tangan.',
                                    showConfirmButton: false, // Optionally, hide the "OK" button
                                    timer: 2000 // Auto-close the toast after 2 seconds (adjust the duration as needed)
                                });
                                console.log(data);

                                if (statusValue === 'pegawai') {
                                    $('#no_hp').val(data.data.no_hp).prop('readonly', true);
                                    $('#nama').val(data.data.nama_lengkap).prop('readonly', true);
                                    $('#alamat').val(data.data.alamat).prop('readonly', true);
                                    $('#instansiOption, #asal_instansi').val(data.data.ket_ukerja).prop('readonly', true);
                                } else {
                                    $('#no_hp, #nama, #alamat, #asal_instansi').addClass('greyed-out-form');
                                    // Update the form fields with the fetched data
                                    $('#no_hp').val(data.data.no_hp).prop('readonly', true);
                                    $('#nama').val(data.data.nama).prop('readonly', true);
                                    $('#alamat').val(data.data.alamat).prop('readonly', true);
                                    $('#instansiText, #asal_instansi').val(data.data.asal_instansi).prop('readonly', true);
                                }
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            // Handle errors if the AJAX request fails
                            console.log("AJAX Error: " + textStatus);
                        }
                    });
                } else {
                    // Show an alert using SweetAlert when NIK is empty
                    Swal.fire({
                        icon: 'error',
                        title: 'NIK diperlukan',
                        text: 'Masukkan nik sebelum klik "Cari".',
                    });
                }
            });
            // Trigger the change event on 'nip' input when a radio button is clicked
            $('.statusRadio').on('click', function() {

                var isTamu = $('input[name="statusRadio"]:checked').val();
                if (isTamu === 'tamu') {
                    $('#no_hp, #nama, #alamat, #asal_instansi').removeClass('greyed-out-form');
                    $('#cariNikButton').removeClass('disabled-button');
                } else {
                    $('#cariNikButton').addClass('disabled-button');
                    $('#no_hp, #nama, #alamat, #asal_instansi').addClass('greyed-out-form');
                }
                // $('#nip').prop(placeHolder, 'Masukkan NIK');
                // $('#cariNikButton').removeClass('disabled-button');
                $('input[name="asnNonAsnRadio"]').on('change', function() {
                    // Check if one of the radio buttons is selected
                    if ($('input[name="asnNonAsnRadio"]:checked').length > 0) {
                        // Enable the "nik" input and the "Cari" button
                        $('#nip').prop('disabled', false);
                        $('#cariNikButton').removeClass('disabled-button');
                    }

                });
                $('.asnNonAsnRadio').prop('checked', false);
                $(this).prop('checked', true);
                $('input[name="asnNonAsnRadio"]').prop('checked', false)
                // Check the clicked radio button
                $('#nip, #no_hp, #nama, #alamat, #asal_instansi').val('').prop('disabled', false);
                clearSignature();
                // Show/hide the 'instansiOption' and 'instansiText' divs based on the selected radio button
                if ($(this).val() === 'pegawai') {
                    $('#asnNonAsnContainer').show();
                    $('#instansiOption').show();
                    $('#instansiText').hide();
                } else {
                    $('#asnNonAsnContainer').hide();
                    $('#instansiOption').hide();
                    $('#instansiText').show();
                }
            });
        });
    </script>

    <style>
        .disabled-button {
            pointer-events: none;
            /* Prevents the anchor from being clickable */
            opacity: 0.6;
            /* Reduces the opacity to visually indicate it's disabled */
        }

        .greyed-out-form {
            background-color: #f0f0f0;
            /* Change the background color to grey */
            pointer-events: none;
            /* Prevents interactions with the form */
        }
    </style>

</body>



<?= $this->endSection() ?>