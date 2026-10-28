<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} — NIKAI</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="https://midtrans.com" data-client-key="SB-Mid-client-YOUR_CLIENT_KEY"></script>
</head>
<body class="product-detail-body">

    <header class="navbar-container">
        <div class="logo"><a href="{{ url('/') }}">NIKAI</a></div>
        <nav class="nav-links">
            <a href="{{ url('/') }}" class="nav-item">Home</a>
            <a href="{{ route('products.collections') }}" class="nav-item active">Catalog</a>
        </nav>
    </header>

    <main class="detail-container">
        <!-- Bagian Kiri: Gambar Produk -->
        <div class="detail-image-section">
            <img src="{{ asset('images/' . ($product->image ?? 'matcha-pack1.jpg')) }}" alt="{{ $product->name }}">
        </div>

        <!-- Bagian Kanan: Informasi & Form Pembelian -->
        <div class="detail-info-section">
            <span class="detail-category">Matchabox Collection</span>
            <h1 class="detail-name">{{ $product->name }}</h1>
            
            <div class="detail-price-box">
                @if($product->sale_price)
                    <span class="detail-old-price">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                    <span class="detail-current-price">Rp {{ number_format($product->sale_price, 0, ',', '.') }}</span>
                @else
                    <span class="detail-current-price">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                @endif
            </div>

            <p class="detail-description">
                {{ $product->description ?? 'No description available for this premium blend.' }}
            </p>

            <!-- Form beli langsung memanfaatkan OrderController yang sudah kita buat sebelumnya -->
            <form id="payment-form" class="detail-order-form">
                @csrf
                <input type="hidden" name="product_name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->sale_price ?? $product->original_price }}">

                <!-- Tombol menggunakan tipe button dengan id btn-pay -->
                <button type="button" id="btn-pay" class="btn-buy-now" style="cursor: pointer; display: block; width: 100%;">
                    Add to Matchabox — Buy Now
                </button>
            </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const btnPay = document.getElementById('btn-pay');
                
                if (btnPay) {
                    btnPay.onclick = function(e) {
                        e.preventDefault();
                        
                        const btn = this;
                        btn.innerText = 'Memproses Pesanan...';
                        btn.disabled = true;

                        const form = document.getElementById('payment-form');
                        const formData = new FormData(form);

                        fetch("{{ route('checkout') }}", {
                            method: "POST",
                            headers: { 
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": form.querySelector('input[name="_token"]').value
                            },
                            body: formData
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            btn.innerText = 'Add to Matchabox — Buy Now';
                            btn.disabled = false;

                            if (data.success) {
                                // Alihkan langsung ke halaman invoice buatan kita sendiri
                                window.location.href = "/invoice/" + data.order_id.toString().trim();
                            } else {
                                alert("Gagal memproses pesanan.");
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            alert("Terjadi kesalahan jaringan atau token kedaluwarsa.");
                            btn.innerText = 'Add to Matchabox — Buy Now';
                            btn.disabled = false;
                        });
                    };
                }
            });
        </script>
    </main>

</body>
</html>
