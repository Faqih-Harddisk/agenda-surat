<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Agenda Surat Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .login-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .login-header p {
            font-size: 0.95rem;
            opacity: 0.9;
            margin: 0;
        }

        .login-body {
            padding: 40px;
            background: white;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #212529;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 10px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .form-control::placeholder {
            color: #adb5bd;
        }

        .btn-login {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            padding: 11px;
            width: 100%;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(13, 110, 253, 0.3);
            color: white;
        }

        .login-footer {
            text-align: center;
            padding: 20px 40px;
            background: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }

        .login-footer p {
            margin: 0;
            color: #6c757d;
            font-size: 0.95rem;
        }

        .login-footer a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-footer a:hover {
            color: #0a58ca;
            text-decoration: underline;
        }

        .form-check {
            margin-bottom: 15px;
        }

        .form-check-input {
            border-radius: 4px;
            border: 1px solid #dee2e6;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .form-check-label {
            cursor: pointer;
            font-size: 0.95rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <h2><i class="bi bi-file-earmark-text me-2"></i>Agenda Surat Digital</h2>
                <p>Masuk ke sistem Anda</p>
            </div>

            <!-- Form -->
            <div class="login-body">
                {{-- Tampilkan error message jika ada --}}
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <!-- Username Input -->
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input 
                            type="text" 
                            class="form-control @error('username') is-invalid @enderror" 
                            id="username" 
                            name="username" 
                            placeholder="Masukkan username Anda"
                            value="{{ old('username') }}"
                            required
                        >
                        @error('username')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            id="password" 
                            name="password" 
                            placeholder="Masukkan password Anda"
                            required
                        >
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            id="remember" 
                            name="remember"
                        >
                        <label class="form-check-label" for="remember">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-login">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="login-footer">
                <p class="mt-2"><a href="{{ route('landing') }}"><i class="bi bi-arrow-left me-1"></i>Kembali ke beranda</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>