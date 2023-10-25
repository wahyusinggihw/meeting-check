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

  <section class="section-1">
    <div class="container-info">
      <div class="info">
        <h1>Daftar Hadir Rapat</h1>
        <h2>Pemkab Buleleng</h2>
      </div>
      <div class="logo"><img src="https://github.com/abhinanduN/codepen/blob/master/human-image.png?raw=true" class="prod-human-img" alt="prod" /></div>
    </div>
    <form action="<?= base_url('/submit-kode/form-absensi') ?>" method="post">
      <div class="formid">
        <div class="form-p">
          <p>Silahkan Masukan Kode Rapat</p>
        </div>

        <div class="form-input">
          <input type="text" class="form-control <?= ($validation->hasError('inputAlphanumeric')) ? 'is-invalid' : '' ?>" id="inputAlphanumeric" name="inputAlphanumeric" placeholder="XXX-XXX">
          <button>Submit</button>
          <div class="invalid-feedback">
            <?= $validation->getError('inputAlphanumeric') ?>
          </div>
        </div>
      </div>
    </form>
  </section>

  <section class="section-2">
    <div class="container-timeline">
      <h2 class="pb-5 pt-5 text-center mb-5 display-5">Cara Penggunaan</h2>
      <!-- First Content Section-->
      <div class="row align-items-center connecting-lines d-flex">
        <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center">
          <div class="circle font-weight-bold"><i class="fa fa-check"></i></div>
        </div>
        <div class="col-6">
          <!-- <img src="<?= base_url('assets/img/carousel-1.png') ?>" alt=""> -->
          <div>

            <h4>Langkah pertama</h4>
            <p>Isikan kolom "XXX-XXX" dengan kode rapat yang sudah di berikan atau di share oleh admin</p>
          </div>
        </div>
      </div>
      <!-- Path Line -->
      <div class="row timeline">
        <div class="col-2">
          <div class="corner top-right"></div>
        </div>
        <div class="col-8">
          <hr />
        </div>
        <div class="col-2">
          <div class="corner left-bottom"></div>
        </div>
      </div>
      <!-- Second Content Section-->
      <div class="row align-items-center justify-content-end connecting-lines d-flex">
        <div class="col-6 text-right">
          <!-- <img src="<?= base_url('assets/img/carousel-1.png') ?>" alt=""> -->
          <h4>Langkah Kedua</h4>
          <p>
            Jika sudah berhasil maka silahkan anda memilih sebagai tamu atau pegawai. jika pegawai silahkan di pilih apakah anda ASN atau non-ASN
          </p>
        </div>
        <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
          <div class="circle font-weight-bold"><i class="fa fa-check"></i></div>
        </div>
      </div>
      <!-- Path Line -->
      <div class="row timeline">
        <div class="col-2">
          <div class="corner right-bottom"></div>
        </div>
        <div class="col-8">
          <hr />
        </div>
        <div class="col-2">
          <div class="corner top-left"></div>
        </div>
      </div>
      <!-- Third Content Section -->
      <div class="row align-items-center connecting-lines d-flex">
        <div class="col-2 text-center top d-inline-flex justify-content-center align-items-center">
          <div class="circle font-weight-bold"><i class="fa fa-check"></i></div>
        </div>
        <div class="col-6">
          <h4>Langkah Ketiga</h4>
          <p>
            Jika anda sudah memilih peran, jika anda sebagai pegawai cukup isikan NIP/NIPTdan Tanda Tangan. Sedangkan untuk tamu jika baru pertama anda bisa isi semua biodata anda pada form yang sudah di sediakan, jika NIK kalian sudah terdaftar silahkan lanjutkan mengisi Tanda Tangan
          </p>
        </div>
      </div>
    </div>
  </section>
</body>

<?= $this->endSection() ?>