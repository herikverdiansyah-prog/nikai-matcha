<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIKAI — Invoice Payment</title>
    <!-- Google Fonts -->
    <link href="https://googleapis.com" rel="stylesheet">
    <!-- Panggil File CSS Terpisah -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="invoice-body">

    <div class="invoice-card">
        <h1 class="invoice-title">Invoice #{{ $order->id }}</h1>
        <p>Terima kasih telah memesan di NIKAI. Silakan lakukan simulasi transfer untuk menyelesaikan pesanan Anda:</p>

        <div class="bank-box">
            <small style="color: #888;">BANK TRANSFER (SIMULASI)</small>
            <div style="font-weight: 600; margin: 8px 0 4px 0;">Bank NIKAI Mandiri</div>
            <div class="bank-num">900-00-12345-678</div>
            <div style="margin-top: 12px; font-size: 14px; color: #555;">
                Total Tagihan: <strong>Rp {{ number_format($order->price, 0, ',', '.') }}</strong>
            </div>
        </div>

        <p style="font-size: 13px; color: #666;">Setelah transfer, pesanan Anda akan otomatis diproses oleh admin di
            dashboard history. Silahkan kirimkan bukti transfer ke nomor di bawah ini.</p>
        <a href="https://wa.me" target="_blank" style="color: #2D4A3E; font-weight: bold; text-decoration: none;">
            +62 812-3456-7890
        </a>

        <a href="{{ route('products.collections') }}" class="btn-back">Kembali Belanja</a>
    </div>

</body>

</html>
