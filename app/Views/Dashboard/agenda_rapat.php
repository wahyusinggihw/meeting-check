<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="agenda-container">
        <h1>Daftar Agenda Rapat</h1>
        <table class="agenda-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Agenda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="agenda-list">
                <!-- Agenda items will be displayed here -->
            </tbody>
        </table>
        <button onclick="showForm()">Tambah Agenda</button>
    </div>

    <div id="agendaForm" class="form-popup">
        <form id="addAgendaForm">
            <h2>Tambah Agenda Rapat</h2>
            <label for="agendaItem">Agenda:</label>
            <input type="text" id="agendaItem" required>
            <button type="submit">Simpan</button>
            <button type="button" onclick="closeForm()">Batal</button>
        </form>
    </div>
</body>

<?= $this->endSection() ?>