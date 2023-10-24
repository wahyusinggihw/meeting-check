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
          <p>Silahkan Masukan ID yang Telah Di Peroleh</p>
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
      <h2 class="pb-5 pt-5 text-center mb-5 display-5">Vertical Timeline Heading</h2>
      <!-- First Content Section-->
      <div class="row align-items-center connecting-lines d-flex">
        <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center">
          <div class="circle font-weight-bold"><i class="fa fa-check"></i></div>
        </div>
        <div class="col-6">
          <h4>First Step</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mollis enim eu erat lacinia pharetra a et mi. Vivamus tincidunt lorem non semper commodo.</p>
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
          <h4>Second Step</h4>
          <p>
            Pellentesque vehicula urna et sollicitudin tempus. Suspendisse pretium neque id scelerisque semper. Mauris sem metus, rutrum at fermentum vitae, tincidunt a mi. Vestibulum scelerisque lacinia nunc quis iaculis. Proin
            pellentesque odio dolor, in placerat ex vestibulum eget. Integer sit amet feugiat dolor. Proin convallis viverra erat at euismod.
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
          <h4>Third Step</h4>
          <p>
            Aenean in fermentum ante. Praesent tempus lectus sed consectetur rutrum. Nulla imperdiet semper sollicitudin. Quisque consectetur nulla id magna efficitur sodales. Etiam dapibus metus diam, malesuada cursus ligula dapibus non.
            Duis pellentesque hendrerit orci id congue.
          </p>
        </div>
      </div>
    </div>
</body>
</section>

<?= $this->endSection() ?>