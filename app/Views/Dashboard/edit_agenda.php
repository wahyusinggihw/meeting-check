<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="agenda-form">
        <h1>Edit Agenda Rapat</h1>
        <form action="edit-agenda/update/<?= $data['id'] ?>" method="post">
            <!-- csrf -->
            <?= csrf_field(); ?>
            <!-- input type hiddne -->
            <input type="hidden" id="text" name="id" value="<?= $data['id'] ?>"><br><br>

            <label for="time">Judul Rapat:</label>
            <input type="text" id="text" name="judul_rapat" placeholder="Judul Rapat" required value="<?= $data['judul_rapat'] ?>"><br><br>

            <label for="time">Tempat:</label>
            <input type="text" id="text" name="tempat" placeholder="Judul Rapat" required value="<?= $data['tempat'] ?>"><br><br>

            <label for="time">Tanggal/Hari:</label>
            <input type="date" id="date" name="tanggal" placeholder="Tanggal dan Hari" required value="<?= $data['tanggal'] ?>"><br><br>

            <label for="time">Waktu:</label>
            <input type="text" id="time" name="jam" placeholder="Contoh: 09:00 AM" value="<?= $data['jam'] ?>" required><br><br>

            <button type="submit">Tambah Agenda</button>
        </form>
    </div>
</body>

<?= $this->endSection() ?>