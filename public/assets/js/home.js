function submitForm() {
    const inputId = document.getElementById('inputAlphanumeric').value;
    // Ganti 'halaman_tujuan.php' dengan halaman tujuan yang diinginkan
    window.location.href = 'peran.php?id=' + inputId;
}
