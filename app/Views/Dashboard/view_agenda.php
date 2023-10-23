<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>

    <div class="col-8 my-2">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>

            <div class="card-body">
                <form action="#" method="#">
                    <?= csrf_field() ?>
                    <input type="hidden" id="text" name="id_agenda" value="<?= $data['id_agenda'] ?>">
                    <div class="row">
                        <div class="form-group">
                            <label>Agenda Rapat</label>
                            <input disabled type="text" class="form-control <?= validation_show_error('agenda_rapat') ? 'is-invalid' : '' ?>" value="<?= old('agenda_rapat', $data['agenda_rapat']) ?>" id="agenda_rapat" name="agenda_rapat">
                            <div class="invalid-feedback">
                                <?= validation_show_error('agenda_rapat') ?>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Tempat Rapat</label>
                            <input disabled type="text" class="form-control <?= validation_show_error('tempat') ? 'is-invalid' : '' ?>" value="<?= old('tempat', $data['tempat']) ?>" id="tempat" name="tempat">
                            <div class="invalid-feedback">
                                <?= validation_show_error('tempat') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input disabled type="date" class="form-control <?= validation_show_error('tanggal') ? 'is-invalid' : '' ?>" value="<?= old('tanggal', $data['tanggal']) ?>" id="tanggal" name="tanggal">
                            <div class="invalid-feedback">
                                <?= validation_show_error('tanggal') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jam</label>
                            <input disabled type="time" class="form-control <?= validation_show_error('jam') ? 'is-invalid' : '' ?>" value="<?= old('jam', $data['jam']) ?>" id="jam" name="jam">
                            <div class="invalid-feedback">
                                <?= validation_show_error('jam') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Agenda Rapat</label>
                            <textarea disabled class="form-control <?= validation_show_error('deskripsi') ? 'is-invalid' : '' ?>" rows="3" id="deskripsi" name="deskripsi"><?= old('deskripsi', $data['deskripsi']) ?></textarea>
                            <div class="invalid-feedback">
                                <?= validation_show_error('deskripsi') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="qr">Link Rapat:</label>
                            <div class="container mb-3">
                                <div class="row">
                                    <div class="col">

                                        <img id="qr" width="100px" src="<?= $qrCode ?>" alt="" class="">
                                    </div>
                                    <!-- cara agar code "a" menjadi column di dalam row -->
                                    <div class="col">
                                        <div class="row mb-4">
                                            <a href="<?= base_url('/informasi-rapat' . '/' . $data['id_agenda']) ?>" class="btn btn-primary" target="_blank">share informasi</a>
                                        </div>
                                        <div class="row">
                                            <a href="<?= base_url('/cetak-rapat' . '/' . $data['id_agenda']) ?>" class="btn btn-outline-secondary" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Cetak Agenda</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Function to customize print settings
        document.getElementById("printButton").addEventListener("click", function() {
            // Set a custom document title for printing
            const printCSS = document.createElement('link');
            const judul = this.getAttribute("data-judul");
            document.title = judul;
            window.print();
        });
    </script>
</body>

<?= $this->endSection() ?>