@extends('master.dashboard')

@section('navbar')
    @include('master.navbar')
@endsection

@section('hero')
    <!-- Kosongkan hero agar tidak tampil -->
@endsection

@section('content')
    <style>
        .login-section {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
            background: #f8fafc;
        }

        .login-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            border: 1px solid #edf2f7;
            padding: 40px;
            width: 100%;
            max-width: 420px;
        }

        .login-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
            text-align: center;
        }

        .login-subtitle {
            color: #64748b;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 500;
            color: #334155;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 12px 16px;
        }

        .form-control:focus {
            border-color: #3b5d50;
            box-shadow: 0 0 0 3px rgba(59, 93, 80, 0.1);
        }

        /* Checkbox sejajar */
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .form-check-input {
            margin-top: 0;
            margin-right: 8px;
        }

        .form-check-label {
            margin-bottom: 0;
        }

        .btn-login {
            background: #3b5d50;
            color: white;
            border: none;
            border-radius: 40px;
            padding: 12px 24px;
            font-weight: 600;
            width: 100%;
            transition: all 0.2s;
            position: relative;
        }

        .btn-login:hover {
            background: #234237;
        }

        .btn-login .spinner-border {
            display: none;
            width: 1.2rem;
            height: 1.2rem;
            margin-right: 0.5rem;
        }

        .btn-login.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .btn-login.loading .spinner-border {
            display: inline-block;
        }
    </style>

    <div class="login-section">
        <div class="login-card">
            <h2 class="login-title">Selamat Datang</h2>
            <p class="login-subtitle">Silakan login ke akun Anda</p>

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn-login" id="loginButton">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <i class="fas fa-sign-in-alt me-2"></i>Login
                </button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function() {
            var button = document.getElementById('loginButton');
            button.classList.add('loading');
        });
    </script>
@endsection
