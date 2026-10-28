<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NIKAI Matcha</title>
    <!-- Memanggil CSS Terpisah -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

    <div class="card-login">
        <h3>Masuk Ke Akun Anda</h3>

        @if (session('error'))
            <div class="alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email (Username)</label>
                <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn-matcha">Sign In</button>
        </form>

        <div class="text-center">
            Belum punya akun? <a href="{{ route('register') }}" class="text-matcha">Daftar Sekarang (Register)</a>
        </div>
    </div>

    <!-- Memanggil JavaScript Terpisah -->
    <script src="{{ asset('js/auth.js') }}"></script>
</body>

</html>
