<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIKAI — Our Matcha Collections</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="catalog-page-body">

    <!-- Navbar Header tetap dipanggil agar user bisa kembali -->
    <header class="navbar-container">
        <div class="logo"><a href="{{ url('/') }}">NIKAI</a></div>
        <nav class="nav-links">
            <a href="{{ url('/') }}" class="nav-item">Home</a>
            <a href="#" class="nav-item active">Catalog</a>
        </nav>
    </header>

    <main class="catalog-main">
        <h1 class="catalog-title">Our Matcha Collections</h1>
        <p class="catalog-subtitle">Carefully crafted premium blends for every mood, ritual, and moment.</p>

        <!-- Grid Produk seperti referensi MatchaBali -->
            <div class="products-grid">
                @foreach($products as $product)
                    <!-- PERBAIKAN: Tag <a> dibuka di sini tanpa langsung ditutup -->
                    <a href="{{ route('products.show', $product->slug) }}" style="text-decoration: none; color: inherit; display: block;">
                        
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <!-- Menampilkan foto produk -->
                                <img src="{{ asset('images/' . ($product->image ?? 'matcha-pack1.jpg')) }}" alt="{{ $product->name }}" class="product-img">
                                
                                <!-- Badge Sale -->
                                @if($product->sale_price)
                                    <span class="sale-badge">Sale</span>
                                @endif
                            </div>
                            
                            <!-- Informasi detail di dalam kotak card putih -->
                            <div class="product-info">
                                <h3 class="product-name">{{ $product->name }}</h3>
                                
                                @if($product->sale_price)
                                    <p class="old-price">Rp {{ number_format($product->original_price, 0, ',', '.') }},00</p>
                                    <p class="current-price">From <span>Rp {{ number_format($product->sale_price, 0, ',', '.') }},00</span></p>
                                @else
                                    <p class="current-price" style="margin-top: 20px;">From <span>Rp {{ number_format($product->original_price, 0, ',', '.') }},00</span></p>
                                @endif
                            </div>
                        </div> 
                        
                    </a> <!-- PERBAIKAN: Tag <a> ditutup di sini setelah semua elemen card selesai -->
                @endforeach
            </div>

        </div>

    </main>

</body>
</html>
