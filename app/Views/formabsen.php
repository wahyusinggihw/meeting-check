<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/form.css'); ?>">
</head>

<body>
    <h1>Form Absensi</h1>
    <form id="attendanceForm">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="signature">Tanda Tangan:</label>
        <div id="signaturePad"></div>
        <button type="button" onclick="clearSignature()">Hapus Tanda Tangan</button>
        <br><br>

        <button type="submit">Submit Absensi</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script src="script.js"></script>
</body>

</html>