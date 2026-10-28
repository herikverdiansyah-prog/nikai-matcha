// Navigasi otomatis tombol (+) ke halaman koleksi
document.addEventListener('DOMContentLoaded', function () {
    // Mencari semua elemen yang memiliki atribut data-url
    const catalogButtons = document.querySelectorAll('[data-url]');

    catalogButtons.forEach(button => {
        button.addEventListener('click', function () {
            const targetUrl = this.getAttribute('data-url');
            if (targetUrl) {
                window.location.href = targetUrl; // Pindah halaman langsung
            }
        });
    });
});
