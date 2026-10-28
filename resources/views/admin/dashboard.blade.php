<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIKAI Admin Dashboard</title>
    <!-- Font External -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <!-- Panggil File CSS Terpisah -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="admin-body">

    <h1 class="admin-title">NIKAI Matchabox — Order History</h1>

    <div style="text-align: right; margin-bottom: 20px; padding-right: 10px;">
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit"
                style="background-color: #a80000; color: #FDFBF7; border: none; padding: 8px 16px; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 14px; transition: background 0.2s ease;">
                Keluar Akun (Logout)
            </button>
        </form>
    </div>

    <div class="table-container">
        <!-- PERBAIKAN: Menambahkan kembali class="admin-table" agar CSS berfungsi -->
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th style="text-align: right; padding-right: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td><strong>{{ $order->product_name }}</strong></td>
                        <td>Rp {{ number_format($order->price, 0, ',', '.') }}</td>
                        <td><span class="status-badge {{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                        <td>{{ $order->created_at->format('d M Y, H:i') }} WIB</td>
                        <td style="text-align: right; padding-right: 20px;">
                            @if ($order->status == 'pending')
                                <form action="{{ route('admin.order.complete', $order->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn-selesai"
                                        style="background-color: #2D4A3E; color: #fff; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-weight: bold;">
                                        Selesai
                                    </button>
                                </form>
                            @else
                                <span style="color: var(--matcha-soft, #8BA888); font-weight: 600; font-size: 14px;">✓
                                    Selesai</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #888;">Belum ada pesanan yang masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Panggil File JS Terpisah sebelum penutup body -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
