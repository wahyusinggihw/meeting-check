<?= $this->extend('/dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<body>
    <div class="button-container">
        <div class="icon-empty">
            <img src="<?php echo base_url('assets/img/icon-empty.svg'); ?>" alt="SVG Image">
        </div>
        <div class="data-kosong">
            Data Agenda Kosong
        </div>
        <a href="/dashboard/agenda-rapat/tambah-agenda" id="tambah-agenda" class="btn btn-primary mb-2">Tambah Agenda</a>
    </div>
</body>

<?= $this->endSection() ?>