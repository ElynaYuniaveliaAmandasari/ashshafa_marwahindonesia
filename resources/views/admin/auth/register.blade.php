@extends('layouts.admin')

@section('title', 'Register Admin')

@section('content')
    <div class="auth-card shadow-lg border-0">
        <div class="auth-header position-relative">
            <div class="logo-wrapper mb-3">
                <img src="{{ asset('assets/img/logo-ash-shafa-putih.png') }}" alt="Ash Shafa Tour" class="auth-logo">
            </div>
            <h3 class="auth-title mb-1 fw-bold">Buat Akun Baru</h3>
            <p class="auth-subtitle text-light opacity-75">Daftar sebagai Admin</p>
        </div>

        <div class="auth-body">
            {{-- ALERT MESSAGES --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-start">
                        <i class="mdi mdi-alert-circle me-2 mt-1 fs-4"></i>
                        <div>
                            <strong>Terjadi kesalahan:</strong>
                            <ul class="mb-0 mt-1 ps-3 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-alert-circle me-2 fs-5"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- REGISTER FORM --}}
            <form method="POST" action="{{ route('admin.register.post') }}" id="registerForm" class="needs-validation"
                novalidate>
                @csrf

                {{-- NAMA --}}
                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <i class="mdi mdi-account-outline"></i>
                        </div>
                        <input type="text" class="form-control form-control-lg ps-5 @error('name') is-invalid @enderror"
                            id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Ahmad Fauzi"
                            required autofocus>
                    </div>
                    @error('name')
                        <div class="invalid-feedback d-block mt-1 small">
                            <i class="mdi mdi-alert-circle-outline me-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="mb-4">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <i class="mdi mdi-email-outline"></i>
                        </div>
                        <input type="email" class="form-control form-control-lg ps-5 @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email') }}" placeholder="admin@ashshafatour.com"
                            required>
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block mt-1 small">
                            <i class="mdi mdi-alert-circle-outline me-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <i class="mdi mdi-lock-outline"></i>
                        </div>
                        <input type="password"
                            class="form-control form-control-lg ps-5 pe-5 @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Minimal 8 karakter" required>
                        <button class="toggle-password" type="button" id="togglePassword">
                            <i class="mdi mdi-eye-outline" id="toggleIcon"></i>
                        </button>
                    </div>
                    <div id="passwordStrength" class="mt-2"></div>
                    <small class="text-muted d-block mt-1">
                        <i class="mdi mdi-information-outline"></i> Minimal 8 karakter kombinasi huruf dan angka
                    </small>
                </div>

                {{-- KONFIRMASI PASSWORD --}}
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <i class="mdi mdi-lock-check-outline"></i>
                        </div>
                        <input type="password" class="form-control form-control-lg ps-5 pe-5" id="password_confirmation"
                            name="password_confirmation" placeholder="Ulangi password Anda" required>
                        <button class="toggle-password" type="button" id="togglePasswordConfirm">
                            <i class="mdi mdi-eye-outline" id="toggleIconConfirm"></i>
                        </button>
                    </div>
                    <div id="passwordMatch" class="mt-2"></div>
                </div>

                {{-- SYARAT & KETENTUAN --}}
                <div class="form-check mt-4 mb-5">
                    <input type="checkbox" class="form-check-input me-2" id="terms" required>
                    <label class="form-check-label text-muted" for="terms">
                        Saya setuju dengan <a href="#" class="auth-link">Syarat & Ketentuan</a>
                    </label>
                </div>

                {{-- BUTTON --}}
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-auth btn-lg fw-semibold shadow-sm">
                        <i class="mdi mdi-account-plus me-2"></i>Daftar Sekarang
                    </button>
                </div>

                {{-- PEMBATAS --}}
                <div class="auth-divider my-4"><span>atau</span></div>

                {{-- LINK LOGIN --}}
                <div class="text-center">
                    <p class="text-muted mb-2 small">Sudah punya akun admin?</p>
                    <a href="{{ route('admin.login') }}" class="auth-link fw-semibold">
                        <i class="mdi mdi-login me-1"></i>Login di sini
                    </a>
                </div>
            </form>
        </div>

        <div class="auth-footer text-center py-3 bg-light border-top">
            <small class="text-muted">&copy; {{ date('Y') }} Ash Shafa Marwah Indonesia</small>
        </div>
    </div>

    {{-- SCRIPT --}}
    @push('scripts')
        <script>
            // === TOGGLE PASSWORD ===
            function toggleVisibility(buttonId, inputId, iconId) {
                document.getElementById(buttonId).addEventListener('click', function() {
                    const input = document.getElementById(inputId);
                    const icon = document.getElementById(iconId);
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.replace('mdi-eye-outline', 'mdi-eye-off-outline');
                    } else {
                        input.type = 'password';
                        icon.classList.replace('mdi-eye-off-outline', 'mdi-eye-outline');
                    }
                });
            }
            toggleVisibility('togglePassword', 'password', 'toggleIcon');
            toggleVisibility('togglePasswordConfirm', 'password_confirmation', 'toggleIconConfirm');

            // === PASSWORD STRENGTH ===
            const passwordInput = document.getElementById('password');
            const passwordStrength = document.getElementById('passwordStrength');

            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let score = 0;
                if (password.length >= 8) score++;
                if (/[a-z]/.test(password)) score++;
                if (/[A-Z]/.test(password)) score++;
                if (/[0-9]/.test(password)) score++;
                if (/[^a-zA-Z0-9]/.test(password)) score++;

                const strengthBar = {
                    1: 'weak',
                    2: 'medium',
                    3: 'medium',
                    4: 'strong',
                    5: 'strong'
                } [score] || 'weak';

                const color = {
                    weak: '#dc3545',
                    medium: '#ffc107',
                    strong: '#28a745'
                } [strengthBar];

                passwordStrength.innerHTML = `
                    <div style="height: 6px; border-radius: 4px; background: ${color}; width: ${(score / 5) * 100}%"></div>
                    <small class="text-${strengthBar === 'weak' ? 'danger' : strengthBar === 'medium' ? 'warning' : 'success'} mt-1 d-block">
                        ${strengthBar === 'weak' ? 'Password lemah' : strengthBar === 'medium' ? 'Password sedang' : 'Password kuat'}
                    </small>
                `;
            });

            // === PASSWORD MATCH ===
            const confirmInput = document.getElementById('password_confirmation');
            const passwordMatch = document.getElementById('passwordMatch');

            confirmInput.addEventListener('input', function() {
                if (this.value === '') {
                    passwordMatch.innerHTML = '';
                    return;
                }

                if (this.value === passwordInput.value) {
                    passwordMatch.innerHTML =
                        '<small class="text-success"><i class="mdi mdi-check-circle me-1"></i>Password cocok</small>';
                } else {
                    passwordMatch.innerHTML =
                        '<small class="text-danger"><i class="mdi mdi-close-circle me-1"></i>Password tidak cocok</small>';
                }
            });
        </script>
    @endpush
@endsection
