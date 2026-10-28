<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController; // Tambahkan import Controller ini
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index'); 
});

// Tambahkan route POST untuk checkout di bawah ini
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout');
// Route untuk halaman dashboard admin history
Route::get('/admin/dashboard', [OrderController::class, 'index'])->name('admin.dashboard');
// Route untuk menyelesaikan/mengubah status order menjadi complete
Route::post('/admin/orders/{id}/complete', [OrderController::class, 'complete'])->name('admin.order.complete');

use App\Models\Product;

Route::get('/collections', function () {
    // Ambil semua data produk dari database
    $products = Product::all();
    
    // Kirim data produk ke file view catalog.blade.php
    return view('catalog', compact('products'));
})->name('products.collections');

// Route untuk halaman detail produk menggunakan slug
Route::get('/products/{slug}', function ($slug) {
    $product = \App\Models\Product::where('slug', $slug)->firstOrFail();
    // Cukup panggil 'show' saja karena file sudah dipindahkan ke luar
    return view('show', compact('product'));
})->name('products.show');

Route::get('/invoice/{id}', function ($id) {
    $order = \App\Models\Order::findOrFail($id);
    return view('invoice', compact('order'));
})->name('payment.invoice');

// Wajib menambahkan ->name('login') di ujung agar fungsi route('login') di view terbaca
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Rute untuk memproses data form login yang dikirim
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute Tampilan Form Registrasi
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Rute Proses Kirim Data Registrasi
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/ubah-role-admin', function() {
    \App\Models\User::where('email', 'admin@nikai.com')->update(['role' => 'admin']);
    return "Status Akun admin@nikai.com sudah berhasil diubah menjadi ADMIN! Silakan refresh halaman utama.";
});

