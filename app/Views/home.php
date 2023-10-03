<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container">
  <div class="info">
    <h1>Daftar Hadir Rapat <br> Pemkab Buleleng</h1>
    <p>Silahkan Masukan ID yang Telah Di Peroleh</p>
    <form>
      <input type="text" id="inputAlphanumeric" name="inputAlphanumeric" placeholder="Masukan Id">
      <button>Submit</button>
    </form>

  </div>
  <div class="image">
    <img class="carousel-icon" src="<?= base_url('assets/img/carousel.png') ?>">
  </div>
</div>
<?= $this->endSection() ?>