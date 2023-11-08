<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="">
        <div class="card card-primary">
            <div class="card-body">
                <form action="<?= base_url('dashboard/kelola-admin/tambah-admin') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap:</label>
                                <input class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" value="<?= old('nama') ?>" type="text" id="nama" name="nama" placeholder="Masukkan nama" autofocus>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('nama') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php if (session()->get('role') != 'superadmin') : ?>
                                    <div class="form-group mb-3" id="instansiOption">
                                        <label for="asal_instansi" class="form-label">Bidang</label>
                                        <select name="asal_instansi" id="asal_instansi" class="form-select <?= validation_show_error('asal_instansi') ? 'is-invalid' : '' ?>" id="asal_instansi" name="asal_instansi">
                                            <option value="">Pilih Bidang</option>
                                            <?php foreach ($bidang as $item) : ?>
                                                <?php
                                                $optionValue = $item['id_bidang'] . '-' . $item['nama_bidang'];
                                                $selected = old('asal_instansi') === $optionValue ? 'selected' : '';
                                                ?>
                                                <option value="<?= $optionValue ?>" <?= $selected ?>><?= $item['nama_bidang'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback text-start">
                                            <?= validation_show_error('asal_instansi') ?>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="form-group mb-3" id="instansiOption">
                                        <label for="asal_instansi" class="form-label">Asal Instansi</label>
                                        <!-- <input type="text" class="form-control" id=" " placeholder=" "> -->
                                        <select name="asal_instansi" id="asal_instansi" class="form-select <?= validation_show_error('asal_instansi') ? 'is-invalid' : '' ?>" id="asal_instansi" name="asal_instansi">
                                            <!-- foreach -->
                                            <option value="">Pilih instansi</option>
                                            <?php foreach ($instansi->data as $i) : ?>
                                                <?php
                                                $optionValue = $i->kode_ukerja . '-' . $i->ket_ukerja;
                                                $selected = old('asal_instansi') === $optionValue ? 'selected' : '';
                                                ?>
                                                <option value="<?= $optionValue ?>" <?= $selected ?>><?= $i->ket_ukerja ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback text-start">
                                            <?= validation_show_error('asal_instansi') ?>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input class="form-control <?= validation_show_error('username') ? 'is-invalid' : '' ?>" value="<?= old('username') ?>" type="text" id="username" name="username" placeholder="Username">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('username') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">password:</label>
                                <input class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" type="password" id="password" name="password" placeholder="password">
                                <!-- <div id="message">
                                    <h3>Password must contain the following:</h3>
                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                    <p id="number" class="invalid">A <b>number</b></p>
                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                </div> -->
                                <div id="requirements-list">
                                    <ul id="requirements">
                                        <li><i id="uppercase" class="far fa-check-circle"></i>Uppercase</li>
                                        <li><i id="number" class="far fa-check-circle"></i>Number</li>
                                        <li><i id="special" class="far fa-check-circle"></i>Special Characters</li>
                                        <li><i id="eight-chars" class="far fa-check-circle"></i>8+ Characters</li>
                                    </ul>
                                </div>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('password') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <style>
        /* Style all input fields */
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        /* Style the submit button */
        input[type=submit] {
            background-color: #04AA6D;
            color: white;
        }

        /* Style the container for inputs */
        .container {
            background-color: #f1f1f1;
            padding: 20px;
        }

        /* The message box is shown when the user clicks on the password field */
        #message {
            display: none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
        }

        #message p {
            padding: 10px 35px;
            font-size: 18px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "&#10004;";
        }

        /* Add a red text color and an "x" icon when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "&#10006;";
        }
    </style>
    <script>
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>
</body>

<?= $this->endSection() ?>