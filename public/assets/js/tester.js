window.addEventListener("scroll", function () {
    const scrollValue = window.scrollY;
    const parallaxBg = document.querySelector(".parallax-bg");
    parallaxBg.style.transform = `translateY(-${scrollValue * 0.5}px)`; /* Sesuaikan faktor 0.5 sesuai kecepatan yang Anda inginkan */
});
