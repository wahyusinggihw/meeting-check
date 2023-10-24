<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Check <?php isset($title) ? print('| ' . $title) : '' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/tester.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <header>
        <h1>Selamat Datang di Website Saya</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#section1">Section 1</a></li>
            <li><a href="#section2">Section 2</a></li>
            <li><a href="#section3">Section 3</a></li>
        </ul>
    </nav>
    <div class="parallax-container">
        <div class="parallax-bg" style="background-image: url('<?= base_url('public/assets/images/background.jpg') ?>');">></div>
        <div class="content">
            <section id="section1">
                <h2>Section 1</h2>
                <p>Ini adalah konten untuk section pertama.</p>
                <p>Ini adalah konten untuk section pertama.</p>
                <p>Ini adalah konten untuk section pertama.</p>
                <p>Ini adalah konten untuk section pertama.</p>
                <p>Ini adalah konten untuk section pertama.</p>
                <p>Ini adalah konten untuk section pertama.</p>
                <p>Ini adalah konten untuk section pertama.</p>
                <p>Ini adalah konten untuk section pertama.</p>
                <p>Ini adalah konten untuk section pertama.</p>
                <p>Ini adalah konten untuk section pertama.</p>

            </section>

            <section id="section2">
                <h2>Section 2</h2>
                <p>Ini adalah konten untuk section kedua.</p>
                <p>Ini adalah konten untuk section kedua.</p>
                <p>Ini adalah konten untuk section kedua.</p>
                <p>Ini adalah konten untuk section kedua.</p>
                <p>Ini adalah konten untuk section kedua.</p>
                <p>Ini adalah konten untuk section kedua.</p>
                <p>Ini adalah konten untuk section kedua.</p>
                <p>Ini adalah konten untuk section kedua.</p>
                <p>Ini adalah konten untuk section kedua.</p>
            </section>

            <section id="section3">
                <h2>Section 3</h2>
                <p>Ini adalah konten untuk section ketiga.</p>
                <p>Ini adalah konten untuk section ketiga.</p>
                <p>Ini adalah konten untuk section ketiga.</p>
                <p>Ini adalah konten untuk section ketiga.</p>
                <p>Ini adalah konten untuk section ketiga.</p>
                <p>Ini adalah konten untuk section ketiga.</p>
                <p>Ini adalah konten untuk section ketiga.</p>
                <p>Ini adalah konten untuk section ketiga.</p>
                <p>Ini adalah konten untuk section ketiga.</p>
                <p>Ini adalah konten untuk section ketiga.</p>
                <p>Ini adalah konten untuk section ketiga.</p>
                <p>Ini adalah konten untuk section ketiga.</p>

            </section>

        </div>
    </div>

    <footer>
        <p>Hak Cipta &copy; 2023 Website Saya</p>
    </footer>
</body>
</body>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="<?php echo base_url('assets/js/tester.js'); ?>"></script>

</html>