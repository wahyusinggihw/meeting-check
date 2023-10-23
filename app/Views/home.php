<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<body>
  <!-- Modal -->
  <?php if (session()->getFlashdata('error')) : ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?= session()->getFlashdata('error') ?>',
      })
    </script>

  <?php endif; ?>

  <div class="container-info">
    <div class="info">
      <h1>Daftar Hadir Rapat</h1>
      <h2>Pemkab Buleleng</h2>
      <p>Silahkan Masukan ID yang Telah Di Peroleh</p>
      <form action="<?= base_url('/submit-kode/form-absensi') ?>" method="post">
        <div class="formid">

          <input type="text" class="form-control <?= ($validation->hasError('inputAlphanumeric')) ? 'is-invalid' : '' ?>" id="inputAlphanumeric" name="inputAlphanumeric" placeholder="XXX-XXX">

          <button>Submit</button>
        </div>
        <div class="invalid-feedback">
          <?= $validation->getError('inputAlphanumeric') ?>
        </div>
      </form>
    </div>
    <div class="logo"><img src="https://github.com/abhinanduN/codepen/blob/master/human-image.png?raw=true" class="prod-human-img" alt="prod" /></div>
  </div>

  <div class="container">
    <section class="timeline">
      <div class="container">

        <div class="timeline-item">
          <div class="timeline-img"></div>

          <div class="timeline-content timeline-card js--fadeInRight">
            <div class="timeline-img-header">
              <img class="timeline-item timeline-img-header" src="<?php echo base_url('assets/img/carousel-1.png') ?>" alt="">

              <div class="judul-tutor">Masukkan ID Rapat</div>
            </div>
            <p>Silahkan masukkan id rapat yang diberikan oleh admin</p>

          </div>
        </div>

        <div class="timeline-item">
          <div class="timeline-img"></div>

          <div class="timeline-content timeline-card js--fadeInLeft">
            <div class="timeline-img-header">
              <img class="timeline-item timeline-img-header" src="<?php echo base_url('assets/img/carousel-2.png') ?>" alt="">
              <div class="judul-tutor">Masukkan ID Rapat</div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ipsa ratione omnis alias cupiditate saepe atque totam aperiam sed nulla voluptatem recusandae dolor, nostrum excepturi amet in dolores. Alias, ullam.</p>

          </div>
        </div>

        <div class="timeline-item">
          <div class="timeline-img"></div>

          <div class="timeline-content timeline-card js--fadeInRight">
            <div class="timeline-img-header">
              <img class="timeline-item timeline-img-header" src="<?php echo base_url('assets/img/carousel-3.png') ?>" alt="">

              <div class="judul-tutor">Masukkan ID Rapat</div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ipsa ratione omnis alias cupiditate saepe atque totam aperiam sed nulla voluptatem recusandae dolor, nostrum excepturi amet in dolores. Alias, ullam.</p>
          </div>
        </div>

        <div class="timeline-item">
          <div class="timeline-img"></div>

          <div class="timeline-content timeline-card js--fadeInRight">
            <div class="timeline-img-header">
              <img class="timeline-item timeline-img-header" src="<?php echo base_url('assets/img/carousellain.png') ?>" alt="">

              <div class="judul-tutor">Masukkan ID Rapat</div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ipsa ratione omnis alias cupiditate saepe atque totam aperiam sed nulla voluptatem recusandae dolor, nostrum excepturi amet in dolores. Alias, ullam.</p>
          </div>
        </div>

      </div>
    </section>
  </div>

</body>


<?= $this->endSection() ?>