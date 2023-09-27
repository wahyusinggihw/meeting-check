<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="agenda-form">
        <h1>Form Agenda Rapat</h1>
        <form>
            <label for="time">Judul Rapat:</label>
            <input type="text" id="text" name="text" placeholder="Judul Rapat" required><br><br>

            <label for="time">Tanggal/Hari:</label>
            <input type="date" id="date" name="date" placeholder="Tanggal dan Hari" required><br><br>

            <label for="time">Waktu:</label>
            <input type="text" id="time" name="time" placeholder="Contoh: 09:00 AM" required><br><br>

            <label for="item">Agenda Rapat:</label>
            <textarea id="item" name="item" placeholder="Masukkan agenda rapat" required></textarea><br><br>

            <button type="submit">Tambah Agenda</button>
        </form>
    </div>
</body>

<?= $this->endSection() ?>