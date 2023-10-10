<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="container">

        <div class="row">
            <div class="col-sm-6 my-2">
                <form action="#" method="#">
                    <div class="form-group row"></div>
                    <input type="hidden" id="text" name="id" value="<?= $data['id_agenda'] ?>"><br><br>

                    <label for="judul_rapat">Judul Rapat:</label>
                    <input disabled class="form-control" type="text" id="judul_rapat" name="judul_rapat" placeholder="Judul Rapat" value="<?= $data['judul_rapat'] ?>">
                    <br>

                    <label for="tempat">Tempat Rapat:</label>
                    <input disabled class="form-control" type="text" id="tempat" name="tempat" placeholder="Tempat Rapat" value="<?= $data['tempat'] ?>">
                    <br>

                    <label for="tanggal">Tanggal/Hari:</label>
                    <input disabled class="form-control" type="date" id="tanggal" name="tanggal" placeholder="Tanggal dan Hari" value="<?= $data['tanggal'] ?>">
                    <br>

                    <label for="jam">Waktu:</label>
                    <input disabled class="form-control" type="time" id="jam" name="jam" value="<?= $data['jam'] ?>">
                    <br>

                    <label for="agenda">Agenda Rapat:</label>
                    <textarea disabled class="form-control" id="agenda" name="agenda" placeholder="Masukkan agenda rapat"><?= $data['agenda'] ?></textarea><br>

                    <label for="qr">Link Rapat:</label>
                    <br>
                    <div class="container mb-3">
                        <img id="qr" width="100px" src="<?= $qrCode ?>" alt="" class="">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Cetak Agenda</button>
                </form>
            </div>


        </div>
    </div>
</body>

<?= $this->endSection() ?>