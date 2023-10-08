<header>
    <div class="container">
        <div class="logo">
            <img src="<?php echo base_url('assets/img/pemkabori.png'); ?>" alt="Logo" width="350">
        </div>
        <ul class="links">
            <li id="datetime">
            </li>
            <li><button class="hubungi-kami" onclick="composeEmail()">Hubungi Kami</button></li>
            <li><a href=" <?= site_url('home/login') ?>" class="btn btn-primary">Masuk</a>
            </li>
        </ul>
    </div>
</header>


<script src="<?php echo base_url('assets/js/date.js'); ?>"></script>