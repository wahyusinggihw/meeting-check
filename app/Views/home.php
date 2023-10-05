<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container">
  <div class="info">
    <h1>Daftar Hadir Rapat <br> Pemkab Buleleng</h1>
    <p>Silahkan Masukan ID yang Telah Di Peroleh</p>
    <form action="">
      <input type="text" class="search" name="text" placeholder="Masukan Id">
      <button>Submit</button>
    </form>

  </div>
  <div class="sliders">
    <div class="slider">
    <div class="image">
      <img class="carousel-icon" src="<?= base_url('assets/img/carousel-logo.png') ?>" alt="gambar 1">
    </div>
    <div class="image">
      <img class="carousel-icon" src="<?= base_url('assets/img/carousel-1.png') ?>" alt="gambar 2">
    </div>
    <div class="image">
      <img class="carousel-icon" src="<?= base_url('assets/img/carousel-2.png') ?>" alt="gambar 3">
    </div>
    <div class="image">
      <img class="carousel-icon" src="<?= base_url('assets/img/carousel-3.png') ?>" alt="gambar 4">
    </div>
  </div>
    <!-- buttoon prev and next -->
  <div class="buttons">
    <button id="prev"><</button>
    <button id="next">></button>
  </div>
  <ul class="dots">
    <li class="active"></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
  </div>




</div>
<?= $this->endSection() ?>