<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIKAI Matcha - Premium Zen Landing Page</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link
        href="https://googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- Bagian Header / Navbar -->
    <header class="navbar-container">
        <div class="logo">
            <a href="#">NIKAI</a>
        </div>

        <nav class="nav-links">
            <a href="#" class="nav-item active">Home</a>
            <a href="{{ route('products.collections') }}" class="nav-item">Catalog</a>
            <a href="#about" class="nav-item">About</a>
            <a href="#contact" class="nav-item">Contact</a>
            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-item" style="font-weight: bold;">Dashboard</a>
                @endif
            @endauth
            <!-- Mengubah Teks "Admin" Menjadi Ikon Profil Minimalis -->
            <li class="nav-item" style="display: flex; align-items: center;">
                <a class="nav-link" href="{{ route('login') }}" title="Login / Akun Saya"
                    style="color: #2D4A3E; padding: 0 15px; display: flex; align-items: center; line-height: 1;">
                    <!-- Ikon SVG Profil Minimalis -->
                    <svg xmlns="http://w3.org" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-user" style="display: block; vertical-align: middle;">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>
            </li>
        </nav>

        <!-- Tombol aksi opsional / Keranjang / Spasi agar seimbang -->
        <div class="nav-actions">
            <a href="#katalog" class="btn-nav-accent">Shop Now</a>
        </div>
    </header>

    <!-- ================= LAYAR 1: HERO SECTION ================= -->
    <section class="bg-light">
        <div class="container-grid">
            <!-- Kolom Kiri: Teks -->
            <div>
                <section id="about" style="padding: 60px 0;">
                    <h1 class="font-serif">Rituals<br>Made Matcha<span
                            style="color: var(--matcha-soft); font-style: italic;">.</span></h1>
                    <p style="margin-bottom: 32px; font-size: 18px; max-width: 450px;">Elevated organic matcha, deeply
                        rooted in Japanese tradition. Brewed for modern focus and mindful daily energy.</p>

                    <a href="{{ route('products.collections') }}" class="btn-primary"
                        style="text-decoration: none; display: inline-block;">
                        Explore the Blends →
                    </a>
                </section>

            </div>
            <!-- Kolom Kanan: Foto Produk Besar -->
            <div>
                <div class="image-desktop"
                    style="background-image: url('https://images.unsplash.com/photo-1624893578106-a98840591afc?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D');">
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- ================= LAYAR 2: PRODUCT COLLECTION ================= -->
    <section id="katalog" class="bg-dark">
        <div style="margin-bottom: 48px;">
            <h2 class="font-serif">Our Matcha Collections<span style="color: var(--matcha-soft);">.</span></h2>
            <p style="opacity: 0.6; font-size: 16px;">Carefully crafted premium blends for every mood, ritual, and
                moment.</p>
        </div>

        <!-- Grid Produk -->
        <div
            style="display: flex; gap: 30px; justify-content: space-between; width: 100%; box-sizing: border-box; padding: 0 8%;">

            <!-- CARD PRODUK 1 (KIRI) -->
            <div
                style="flex: 1; background-color: var(--forest, #142217); border-radius: 24px; padding: 30px; color: var(--cream, #F5F2EB); position: relative; text-align: left;">
                <!-- Tambahkan text-align: left; di sini -->

                <!-- Area Gambar Bawaan Kamu -->
                <div class="image-wrapper">
                    <img src="{{ asset('images/matcha-pack3.jpg') }}" alt="Premium Grade"
                        style="width: 100%; border-radius: 16px;">
                </div>

                <!-- Area Teks (Pastikan diberi style rata kiri) -->
                <h3
                    style="color: var(--cream, #F5F2EB); margin-top: 20px; font-family: 'Playfair Display', serif; text-align: left;">
                    Clean Ceremonial Grade</h3>
                <p style="color: var(--cream, #F5F2EB); opacity: 0.8; font-size: 14px; text-align: left;">Rich, Smooth &
                    Deep Testing</p>

                <!-- Tombol (+) Navigasi Mandiri -->
                <div onclick="window.location.href='{{ route('products.collections') }}'"
                    style="position: absolute; bottom: 30px; right: 30px; background: #ffffff; color: #111; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 20px; font-weight: bold;">
                    +
                </div>
            </div>

            <!-- CARD PRODUK 2 (KANAN) -->
            <div
                style="flex: 1; background-color: var(--forest, #142217); border-radius: 24px; padding: 30px; color: var(--cream, #F5F2EB); position: relative;">
                <!-- Area Gambar Bawaan Kamu -->
                <div class="image-wrapper">
                    <img src="{{ asset('images/matcha-pack2.jpg') }}" alt="Premium Grade"
                        style="width: 100%; border-radius: 16px;">
                </div>

                <!-- Area Teks Terang -->
                <h3 style="color: var(--cream, #F5F2EB); margin-top: 20px; font-family: 'Playfair Display', serif;">
                    Premium Blend Grade</h3>
                <p style="color: var(--cream, #F5F2EB); opacity: 0.8; font-size: 14px;">Perfect for Daily Rituals &
                    Lattes</p>

                <!-- Tombol (+) Navigasi Mandiri -->
                <div onclick="window.location.href='{{ route('products.collections') }}'"
                    style="position: absolute; bottom: 30px; right: 30px; background: #ffffff; color: #111; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 20px; font-weight: bold;">
                    +
                </div>
            </div>

        </div>

        <!-- Bagian Keunggulan Brand -->
        <div style="margin-top: 80px;">
            <h3 class="font-serif">The Nikai Difference</h3>
            <div class="grid-4">
                <div>
                    <span
                        style="font-size: 16px; font-weight: bold; display: block; color: white; margin-bottom: 4px;">🟢
                        Single Origin</span>
                    <span style="font-size: 13px; opacity: 0.6;">Sourced from the pristine hills of Uji, Japan.</span>
                </div>
                <div>
                    <span
                        style="font-size: 16px; font-weight: bold; display: block; color: white; margin-bottom: 4px;">🍃
                        Stone Ground</span>
                    <span style="font-size: 13px; opacity: 0.6;">Slowly milled to preserve maximum L-Theanine.</span>
                </div>
                <div>
                    <span
                        style="font-size: 16px; font-weight: bold; display: block; color: white; margin-bottom: 4px;">☀️
                        Sustainably Grown</span>
                    <span style="font-size: 13px; opacity: 0.6;">Traditional authentic shade-grown methods.</span>
                </div>
                <div>
                    <span
                        style="font-size: 16px; font-weight: bold; display: block; color: white; margin-bottom: 4px;">🛡️
                        No Compromise</span>
                    <span style="font-size: 13px; opacity: 0.6;">100% pure organic green tea without sugar
                        additive.</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= LAYAR 3: BENEFIT & SUBSCRIPTION ================= -->
    <section class="bg-dark" style="border-top: 1px solid rgba(255,255,255,0.05);">
        <div class="container-grid">
            <!-- Kolom Kiri: Manfaat Aktivitas -->
            <div style="display: flex; flex-direction: column; width: 100%;">
                <h2 class="font-serif">Smooth. Clean. Alive<span style="color: var(--matcha-gold);">.</span></h2>
                <p style="margin-bottom: 32px; opacity: 0.6;">Sustained focus all day long without the coffee jitters
                    or
                    sudden afternoon crash.</p>

                <div class="benefit-list">
                    <span
                        style="font-size: 12px; color: var(--matcha-soft); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 8px;">Made
                        for every moment</span>

                    <div class="benefit-item">
                        <div style="font-size: 24px;">🌅</div>
                        <div>
                            <h4 style="margin: 0; font-size: 14px; font-weight: 600;">Morning Focus</h4>
                            <p style="font-size: 12px; opacity: 0.5; margin: 2px 0 0 0;">Start your day with steady,
                                mindful
                                mental clarity.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div style="font-size: 24px;">⚡</div>
                        <div>
                            <h4 style="margin: 0; font-size: 14px; font-weight: 600;">Midday Refresh</h4>
                            <p style="font-size: 12px; opacity: 0.5; margin: 2px 0 0 0;">Reset your metabolism without
                                the
                                typical caffeine crash.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PERBAIKAN: Kolom Kanan (Sekarang lurus dan rata dengan bagian atas) -->
            <section id="contact">
                <div style="color: #FDFBF7; font-family: sans-serif;">
                    <h3
                        style="font-size: 20px; font-weight: bold; margin-top: 0; margin-bottom: 15px; color: #8BA888;">
                        Hubungi Kami</h3>
                    <p style="font-size: 14px; margin: 6px 0; opacity: 0.9;">
                        <strong>Alamat:</strong> Jl. Matcha Premium No. 8, Medan
                    </p>
                    <p style="font-size: 14px; margin: 6px 0; opacity: 0.9;">
                        <strong>WhatsApp:</strong> +62 812-3456-7890
                    </p>
                    <p style="font-size: 14px; margin: 6px 0; opacity: 0.9;">
                        <strong>Email Toko:</strong> hello@nikaimatcha.com
                    </p>
                    <p style="font-size: 14px; margin: 15px 0 0 0; opacity: 0.8; font-style: italic;">
                        Buka Setiap Hari: 09:00 - 21:00 WIB
                    </p>
                </div>
            </section>
        </div>
        <!-- footer -->
        <div
            style="width: 100%; text-align: center; margin-top: 64px; padding-top: 24px; border-top: 1px solid rgba(255, 255, 255, 0.08); opacity: 0.4; font-size: 13px; letter-spacing: 0.05em;">
            &copy; 2026 NIKAI Matcha. All rights reserved. Crafted by Herik Verdiansyah.
        </div>
    </section>

    <!-- Pop-up Notifikasi Sukses -->
    @if (session('success'))
        <div id="toast-notification"
            style="position: fixed; bottom: 30px; right: 30px; background-color: var(--forest, #142217); color: var(--cream, #F5F2EB); padding: 16px 24px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.15); font-family: 'Plus Jakarta Sans', sans-serif; z-index: 9999; display: flex; align-items: center; gap: 12px; transition: opacity 0.5s ease;">
            <span style="color: var(--matcha-soft, #8BA888); font-weight: bold;">✓</span>
            <span>{{ session('success') }}</span>
        </div>

        <script>
            // Otomatis hilangkan notifikasi setelah 4 detik
            setTimeout(function() {
                const toast = document.getElementById('toast-notification');
                if (toast) {
                    toast.style.opacity = '0';
                    setTimeout(() => toast.remove(), 500);
                }
            }, 4000);
        </script>
    @endif

</body>

</html>
