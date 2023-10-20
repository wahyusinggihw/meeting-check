<!-- app/Views/PdfController/pdf_template.php -->

<!DOCTYPE html>
<html>

<head>
    <title><?= $agendaRapat['agenda_rapat'] ?> </title>
</head>

<body>
    <h1>Detail Rapat</h1>
    <p>Agenda: <?= $agendaRapat['agenda_rapat'] ?></p>
    <p>Deskripsi: <?= $agendaRapat['deskripsi'] ?></p>
    <div class="container">
        <label for="qr">Link Rapat:</label>
        <div class="container mb-3">
            <img id="qr" width="100px" src="<?= $qrCode ?>" alt="<?= $agendaRapat['id_agenda'] ?>" class="">
        </div>
    </div>
</body>

</html>