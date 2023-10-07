<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container">
  <div class="info">
    <h1>Daftar Hadir Rapat <br> Pemkab Buleleng</h1>
    <p>Silahkan Masukan ID yang Telah Di Peroleh</p>
    <form action="<?= base_url('/submit-kode') ?>" method="post">
      <!-- <input class="<?= ($validation->hasError('inputAlphanumeric')) ? 'is-invalid' : '' ?> search-input" type="text" id="inputAlphanumeric" name="text" placeholder="XXX-XXX"> -->
      <input type="text" class="form-control <?= ($validation->hasError('inputAlphanumeric')) ? 'is-invalid' : '' ?>" id="inputAlphanumeric" name="inputAlphanumeric" placeholder="XXX-XXX" required>

      <button>Submit</button>
      <div class="invalid-feedback">
        <?= $validation->getError('inputAlphanumeric') ?>
      </div>
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
      <button id="prev">
        <!-- << /button> -->
        <button id="prev">></button>
        <button id="next">></button>
    </div>
    <ul class="dots">
      <li class="active"></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
</div>


<!-- <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#berhasilModal"><i class="fa-solid fa-trash"></i></a> -->


<div class="modal fade" id="berhasilModal" tabindex="-1" aria-labelledby="berhasilModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h1 class="modal-title fs-5" id="berhasilModal">Confirm Delete</h1> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- checkicon -->
        <div class="row">
          <i class="fa-solid fa-check"></i>
          Berhasil!
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>



<?= $this->endSection() ?>