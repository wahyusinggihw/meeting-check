<!-- app/Views/PdfController/pdf_template.php -->

<!DOCTYPE html>
<html>

<head>
    <title><?= $agendaRapat['agenda_rapat'] ?> </title>
    <style>
        #header {
            text-align: center;
            margin-bottom: 20px;
        }

        #header img {
            max-width: 150px;
            /* Atur lebar maksimum logo */
            margin-bottom: 10px;
            /* Beri jarak antara logo dan alamat */
        }

        /* Gaya untuk alamat perusahaan */
        #header p {
            margin: 0;
            /* Hapus margin bawaan dari elemen paragraf */
        }

        /* Gaya untuk tanggal */
        #header #tanggal {
            font-weight: bold;
            /* Atur tebal font tanggal */
        }

        body {
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 34px;
            font-weight: bold;
        }

        .agenda {
            font-size: 18px;
            font-weight: bold;
        }

        .description {
            margin-top: 20px;
        }

        .link {}
    </style>
</head>


<body>
    <div id="header">
        <img src="<?= $logo ?>" />
        <p>Jl. Pahlawan, Banjar Tegal, Kec. Buleleng, Kabupaten Buleleng, Bali 81117</p>
        <p>Tanggal: <?php echo date('d M Y'); ?></p>
    </div>

    <div id="content">
        <div class="header">
            <div class="title">DETAIL RAPAT</div>
        </div>

        <div class="agenda">
            Agenda Rapat: <?= $agendaRapat['agenda_rapat'] ?>
        </div>

        <div class="description">
            Deskripsi: <?= $agendaRapat['deskripsi'] ?>
        </div>

        <div class="ID Rapat">
            ID: <?= $agendaRapat['kode_rapat'] ?>
        </div>

        <div class="link">
            Link Rapat:
            <div>
                <img id="qr" width="100px" src="<?= $qrCode ?>" alt="<?= $agendaRapat['id_agenda'] ?>" class="">
            </div>
        </div>
    </div>
</body>

</html>