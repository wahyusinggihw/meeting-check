<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<body>
  <!-- Modal -->
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bs-danger">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Gagal</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?= session()->getFlashdata('error') ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- show modal -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        $('#exampleModal').modal('show');
      });
    </script>

  <?php endif; ?>


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
        <button id="prev"><</button>
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

</body>


<?= $this->endSection() ?>