### NIKAI MATCHA — E-Commerce Project (Laravel)

Dokumentasi checkpoint proyek pengembangan website e-commerce minimalis premium untuk **NIKAI Matcha**. 

### 📌 Status Terakhir Proyek (Current Progress)

Semua fitur dasar backend dan frontend telah terintegrasi dengan baik menggunakan server lokal Laragon (MySQL): 

1. **Landing Page (/)**: 

  * Navbar yang rapi, responsif, dan bertema minimalis (*cream & forest green*).
  * Dua kartu produk utama dengan layout horizontal simetris (kiri-kanan).
  * Tombol + dan Explore the Blends mengarah secara instan ke halaman katalog.
2. **Dynamic Catalog (/collections)**: 

  * Menampilkan 7 produk secara dinamis dari database MySQL menggunakan seeder (ProductSeeder).
  * Dilengkapi logika otomatis untuk mendeteksi status *Sale* (harga coret) dan badge produk.
3. **Product Detail (/products/{slug})**: 

  * Layout split (2 kolom) untuk menampilkan deskripsi mendalam produk.
  * Tombol pembelian diproses di latar belakang menggunakan JavaScript Fetch API (AJAX) dengan proteksi CSRF Token.
4. **Invoice System (/invoice/{id})**: 

  * Nota pembayaran mandiri fiktif (*Simulated Payment*) untuk panduan transfer bank lokal tanpa dependensi pihak ketiga.
5. **Admin History Dashboard (/admin/dashboard)**: 

  * Menampilkan riwayat transaksi secara *real-time*.
  * Fitur pengubahan status pesanan menjadi Completed secara instan menggunakan Fetch API (AJAX) tanpa reload halaman.

### 🛠️ Panduan Menjalankan Proyek (Setup Run)

Jika server atau database direset, ikuti langkah berikut untuk mengembalikan data: 

1. Pastikan server **MySQL dan Apache di Laragon** sudah aktif.
2. Jalankan perintah migrasi dan pengisian data otomatis (7 produk matcha contoh) di terminal VS Code: 

bash

php artisan migrate:fresh --seed

Gunakan kode dengan hati-hati.
3. Bersihkan sisa cache konfigurasi agar URL navigasi berjalan lancar: 

bash

php artisan config:clear

Gunakan kode dengan hati-hati.
4. Akses URL lokal proyek: 

  * Halaman Utama: http://127.0.0.1:8000
  * Dashboard Admin: http://127.0.0.1:8000/admin/dashboard

### 🚀 Fitur yang Harus Dikembangkan Nanti (Next Roadmap)

Ketika proyek ini dilanjutkan, berikut adalah urutan fitur berikutnya yang perlu diimplementasikan: 

### 1. Sistem Autentikasi Admin (Login Penjaga)

* **Tujuan**: Mengunci halaman /admin/dashboard agar tidak bisa diakses secara sembarangan oleh publik melalui address bar browser.
* **Rencana Eksekusi**: Menggunakan sistem auth bawaan Laravel atau Middleware buatan sendiri untuk mengecek role admin.

### 2. Form CRUD Produk (Dashboard Input oleh Admin)

* **Tujuan**: Membuat halaman admin khusus untuk Menambah (Create), Mengubah (Update), dan Menghapus (Delete) produk secara visual tanpa perlu mengedit file ProductSeeder.php atau membuka phpMyAdmin.
* **Rencana Eksekusi**: Membuat ProductController baru untuk memproses upload gambar kemasan langsung ke folder public/images/.

### 3. Halaman Detail Produk Lanjutan

* **Tujuan**: Menambahkan pilihan *Quantity counter* (tambah/kurang jumlah pesanan) dan pilihan berat kemasan (misal: 30g, 50g, 100g) sebelum menekan tombol beli.
* **Rencana Eksekusi**: Memperbarui tabel orders agar menampung jumlah kuantitas (quantity) dan mengalikannya dengan harga produk di backend.

### 4. Integrasi Payment Gateway Asli (Midtrans Production/Sandbox Key)

* **Tujuan**: Mengganti alur invoice mandiri fiktif saat ini ke gerbang pembayaran digital otomatis menggunakan QRIS, GoPay, ShopeePay, atau Virtual Account asli.
* **Rencana Eksekusi**: Mendaftarkan Client & Server Key yang valid ke dalam file .env, lalu mengembalikan pustaka snap.js di file JavaScript detail produk.