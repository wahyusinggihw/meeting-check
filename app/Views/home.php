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

  <!-- <div class="carousel">
    <div class="slide">
      <img class="carousel-icon" src="<?= base_url('assets/img/carousel.png') ?>" alt="Slide 1">
    </div>
    <div class="slide">
      <img class="carousel-icon" src="<?= base_url('assets/img/pemkab.png') ?>" alt="Slide 2">
    </div>
    <div class="slide">
      <img class="carousel-icon" src="<?= base_url('assets/img/pemkabori.png') ?>" alt="Slide 3">
    </div>
  </div> -->

  <div class="col-lg-5 offset-lg-1">
    <div class="owl-banner owl-carousel">
      <div class="item">
        <img class="carousel-icon" src="<?= base_url('assets/img/banner-01.png') ?>" alt="Slide 1">
      </div>
      <div class="item">
        <img class="carousel-icon" src="<?= base_url('assets/img/banner-02.png') ?>" alt="Slide 2">
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/js/home.js'); ?>"></script>

<?= $this->endSection() ?>