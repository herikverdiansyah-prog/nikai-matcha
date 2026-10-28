<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NIKAI Matcha</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
    <style>
        body {
            background-color: #FDFBF7;
            color: #2D4A3E;
            font-family: sans-serif;
        }

        .card-login {
            background: #ffffff;
            border: 1px solid #2D4A3E;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .btn-matcha {
            background-color: #2D4A3E;
            color: #FDFBF7;
            border: none;
        }

        .btn-matcha:hover {
            background-color: #1e332b;
            color: #FDFBF7;
        }

        .text-matcha {
            color: #2D4A3E;
        }
    </style>
</head>

<body class="d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card card-login p-4">
                    <h3 class="text-center fw-bold mb-4">Masuk Ke Akun Anda</h3>

                    <!-- Menampilkan Error jika Login Gagal -->
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email (Username)</label>
                            <input type="email" name="email" class="form-control" placeholder="nama@email.com"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password"
                                required>
                        </div>
                        <button type="submit" class="btn btn-matcha w-100 py-2 fw-bold">Sign In</button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0 text-muted">Belum punya akun?
                            <a href="{{ route('register') }}" class="text-matcha fw-bold text-decoration-none">Daftar
                                Sekarang (Register)</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
