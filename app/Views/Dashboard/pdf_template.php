<!-- app/Views/PdfController/pdf_template.php -->

<!DOCTYPE html>
<html>

<head>
    <title><?= $agendaRapat['agenda_rapat'] ?> </title>
    <style>
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
    <div class="header">
        <div class="title">DETAIL RAPAT</div>
    </div>

    <div class="agenda">
        Agenda Rapat: <?= $agendaRapat['agenda_rapat'] ?>
    </div>

    <div class="description">
        Deskripsi: <?= $agendaRapat['deskripsi'] ?>
    </div>

    <div class="link">
        Link Rapat:
        <div>
            <img id="qr" width="100px" src="<?= $qrCode ?>" alt="<?= $agendaRapat['id_agenda'] ?>" class="">
        </div>
    </div>
</body>

</html>