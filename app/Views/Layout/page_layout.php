<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Meeting Check <?php isset($title) ? print('| ' . $title) : '' ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/carousel.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/peran.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/formabsensi.css') ?>">

</head>

<body>

  <div class="landing-page">

    <?= $this->include('layout/navbar'); ?>

    <div class="content">
      <?= $this->renderSection('content') ?>
    </div>
  </div>

  <?= $this->include('layout/footer'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>