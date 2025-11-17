@extends('layouts.admin')

@section('title', 'Login Admin')

@section('content')
    <div class="auth-card">
        <div class="auth-header">
            <div class="logo-wrapper">
                <img src="{{ asset('assets/img/logo-ash-shafa-putih.png') }}" alt="Ash Shafa Tour" class="auth-logo">
            </div>
            <h3 class="auth-title">Selamat Datang</h3>
            <p class="auth-subtitle">Login ke Admin Panel</p>
        </div>

        <div class="auth-body">
            {{-- Alert Messages --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-alert-circle me-2"></i>
                        <div>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-alert-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Login Form --}}
            <form method="POST" action="{{ route('admin.login.post') }}" class="auth-form">
                @csrf

                {{-- Email Field --}}
                <div class="mb-4">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <i class="mdi mdi-email-outline"></i>
                        </div>
                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email') }}" placeholder="admin@ashshafatour.com"
                            required autofocus>
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">
                            <i class="mdi mdi-alert-circle-outline me-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Password Field --}}
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <i class="mdi mdi-lock-outline"></i>
                        </div>
                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Masukkan password Anda" required>
                        <button class="toggle-password" type="button" id="togglePassword">
                            <i class="mdi mdi-eye-outline" id="toggleIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            <i class="mdi mdi-alert-circle-outline me-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="mt-4 mb-5">
                    <div class="form-check custom-checkbox">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Ingat saya selama 30 hari
                        </label>
                    </div>
                </div>

                {{-- Login Button --}}
                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-auth btn-lg">
                        <i class="mdi mdi-login me-2"></i>Login Sekarang
                    </button>
                </div>

                {{-- Divider --}}
                <div class="auth-divider">
                    <span>atau</span>
                </div>

                {{-- Register Link --}}
                <div class="text-center mt-4">
                    <p class="text-muted mb-2">Belum punya akun admin?</p>
                    <a href="{{ route('admin.register') }}" class="auth-link d-inline-flex align-items-center">
                        <i class="mdi mdi-account-plus me-2"></i>Daftar Sebagai Admin
                    </a>
                </div>
            </form>
        </div>

        {{-- Footer --}}
        <div class="auth-footer">
            <p class="mb-0">© {{ date('Y') }} Ash Shafa Marwah Indonesia</p>
        </div>
    </div>

    @push('scripts')
        <script>
            // Toggle Password Visibility
            document.getElementById('togglePassword').addEventListener('click', function() {
                const password = document.getElementById('password');
                const icon = document.getElementById('toggleIcon');

                if (password.type === 'password') {
                    password.type = 'text';
                    icon.classList.remove('mdi-eye-outline');
                    icon.classList.add('mdi-eye-off-outline');
                } else {
                    password.type = 'password';
                    icon.classList.remove('mdi-eye-off-outline');
                    icon.classList.add('mdi-eye-outline');
                }
            });
        </script>
    @endpush
@endsection
