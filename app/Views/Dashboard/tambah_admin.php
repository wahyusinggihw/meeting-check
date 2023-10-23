<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="col-8 my-2">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>

            <div class="card-body">
                <form action="<?= base_url('/dashboard/kelola-admin/tambah-admin') ?>" method="post">
                    <?= csrf_field() ?>
                    <label for="nama">Nama Lengkap:</label>
                    <input class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" type="text" id="nama" name="nama" placeholder="Masukkan nama" autofocus>
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama') ?>
                    </div>
                    <br>
                    <?php if (session()->get('role') != 'superadmin') : ?>
                        <div class="form-group mb-3" id="instansiOption">
                            <label for="asal_instansi" class="form-label">Bidang</label>
                            <select name="asal_instansi" id="asal_instansi" class="form-select <?= validation_show_error('asal_instansi') ? 'is-invalid' : '' ?>" value="<?= old('asal_instansi') ?>" id="asal_instansi" name="asal_instansi">
                                <option value="">Pilih Bidang</option>
                                <?php foreach ($bidang as $item) : ?>
                                    <option value="<?= $item['id_bidang'] . '-' . $item['nama_bidang'] ?>"><?= $item['nama_bidang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback text-start">
                                <?= validation_show_error('asal_instansi') ?>
                            </div>
                        </div>
                        <!-- <label for="nama_bidang">Bidang Instansi:</label>
                        <input class="form-control <?= validation_show_error('nama_bidang') ? 'is-invalid' : '' ?>" type="text" id="nama_bidang" name="nama_bidang" placeholder="contoh. Persandian dan Statistik">
                        <div class="invalid-feedback">
                            <?= validation_show_error('nama_bidang') ?>
                        </div>
                        <br> -->
                    <?php else : ?>
                        <div class="form-group mb-3" id="instansiOption">
                            <label for="asal_instansi" class="form-label">Asal Instansi</label>
                            <!-- <input type="text" class="form-control" id=" " placeholder=" "> -->
                            <select name="asal_instansi" id="asal_instansi" class="form-select <?= validation_show_error('asal_instansi') ? 'is-invalid' : '' ?>" value="<?= old('asal_instansi') ?>" id="asal_instansi" name="asal_instansi">
                                <!-- foreach -->
                                <option value="">Pilih instansi</option>
                                <?php foreach ($instansi->data as $i) : ?>
                                    <option value="<?= $i->kode_ukerja . '-' . $i->ket_ukerja ?>"><?= $i->ket_ukerja ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback text-start">
                                <?= validation_show_error('asal_instansi') ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <!-- <label for="nama">Instansi :</label>
                    <input class="form-control <?= validation_show_error('asal_instansi') ? 'is-invalid' : '' ?>" type="text" id="asal_instansi" name="asal_instansi" placeholder="Masukkan asal_instansi" autofocus>
                    <div class="invalid-feedback">
                        <?= validation_show_error('asal_instansi') ?>
                    </div>
                    <br> -->

                    <label for="username">Username:</label>
                    <input class="form-control <?= validation_show_error('username') ? 'is-invalid' : '' ?>" type="text" id="username" name="username" placeholder="Username">
                    <div class="invalid-feedback">
                        <?= validation_show_error('username') ?>
                    </div>
                    <br>

                    <label for="password">password:</label>
                    <input class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" type="password" id="password" name="password" placeholder="password">
                    <div class="invalid-feedback">
                        <?= validation_show_error('password') ?>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        // ajax
    </script>
</body>

<?= $this->endSection() ?>