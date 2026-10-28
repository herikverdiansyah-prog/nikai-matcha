// public/js/auth.js
document.addEventListener('DOMContentLoaded', function () {
    const authForm = document.querySelector('form');
    const submitBtn = document.querySelector('.btn-matcha');

    if (authForm && submitBtn) {
        authForm.addEventListener('submit', function () {
            // Mencegah klik ganda saat memproses login
            submitBtn.disabled = true;
            submitBtn.innerText = 'Mohon Tunggu...';
        });
    }
});
