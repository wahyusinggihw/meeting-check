function updateDateTime() {
    const dateTimeElement = document.getElementById('datetime');
    function displayDateTime() {
        const now = new Date();
        const formattedDateTime = `${formatTime(now)} ~ ${formatDate(now)}`;

        // Mengisi konten elemen dengan ID 'datetime' dengan tanggal dan waktu
        const dateTimeElement = document.getElementById('datetime');
        dateTimeElement.innerText = formattedDateTime;
    }
    displayDateTime();
    setInterval(displayDateTime, 1000);
}

function formatTime(date) {
    const hours = date.getHours().toString().padStart(2, '0');
    const minutes = date.getMinutes().toString().padStart(2, '0');
    const seconds = date.getSeconds().toString().padStart(2, '0');
    const formattedTime = `${hours}:${minutes}`;
    return formattedTime;
}

function formatDate(date) {
    const daysOfWeek = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const dayOfWeek = daysOfWeek[date.getDay()];
    // const daysOfMonth = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const dayOfMonth = date.getDate();
    const month = date.toLocaleString('en-US', { month: 'short' });
    const year = date.getFullYear();
    const formattedDate = `${dayOfMonth} ${month} ${year}`;
    return formattedDate;
}

// Panggil fungsi untuk menampilkan tanggal dan waktu saat halaman dimuat

updateDateTime();

function composeEmail() {
    const emailAddress = 'cs.pemkab@buleleng.co.id';
    const subject = 'Pertanyaan/Komentar untuk Customer Service';
    const body = 'Tulis pesan Anda di sini...';

    const mailtoLink = `mailto:${emailAddress}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
    window.location.href = mailtoLink;
}