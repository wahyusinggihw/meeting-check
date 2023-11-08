<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="">
        <div class="card card-warning">
            <div class="card-body">
                <form action="<?= base_url('/dashboard/kelola-admin/edit-admin/' . $data['id_admin'] . '/update') ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- <input type="hidden" id="text" name="id" value="<?= $data['id_admin'] ?>">

                    <div class="form-group">
                        <label for="nama">Nama Lengkap:</label>
                        <input class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" value="<?= $data['nama'] ?>" type="text" id="nama" name="nama" placeholder="Masukkan nama" autofocus>
                        <div class="invalid-feedback">
                            <?= validation_show_error('nama') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control <?= validation_show_error('username') ? 'is-invalid' : '' ?>" value="<?= $data['username'] ?>" type="text" id="username" name="username" placeholder="Username">
                        <div class="invalid-feedback">
                            <?= validation_show_error('username') ?>
                        </div>
                    </div> -->
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="new-password">Password Baru:</label>
                                <div id="message">
                                    <h3>Password must contain the following:</h3>
                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                    <p id="number" class="invalid">A <b>number</b></p>
                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                </div>
                                <input class="form-control <?= validation_show_error('new-password') ? 'is-invalid' : '' ?>" value="<?= old('new-password') ?>" id="new-password" name="new-password" placeholder="Password baru" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('new-password') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="confirm-password">Konfirmasi Password:</label>
                                <input class="form-control <?= validation_show_error('confirm-password') ? 'is-invalid' : '' ?>" id="confirm-password" name="confirm-password" placeholder="Konfirmasi password">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('confirm-password') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
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
        var myInput = document.getElementById("new-password");
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