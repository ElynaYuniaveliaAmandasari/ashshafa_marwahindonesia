<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Judul akan diisi oleh halaman anak menggunakan @section('title', '...') --}}
    <title>@yield('title', 'PT. ASH SHAFA MARWAH INDONESIA')</title>

    <!-- Tailwind CSS (Konfigurasi Warna Disesuaikan) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Konfigurasi Warna berdasarkan CMYK dari File Anda
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'shafa-primary': '#7A0000', // Maroon Utama
                        'shafa-secondary': '#FF9A00', // Oranye Aksen
                        'shafa-red': '#FF0000',
                        'shafa-dark-text': '#0F1011', // Hampir Hitam
                        'shafa-bg-hero': '#8A1515', // Maroon Gelap untuk Navbar
                        'shafa-text': '#4B5563',
                    }
                }
            }
        }
    </script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Tautkan Custom CSS (Pastikan file ada di public/assets/css/style.css) --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Placeholder untuk CSS tambahan dari halaman anak --}}
    @stack('styles')
</head>

<body class="font-sans bg-gray-50">

    <x-header />

    <!-- CONTENT SECTION (Placeholder untuk konten unik setiap halaman) -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER (Design dari index.blade.php lama Anda) -->
    <footer class="bg-shafa-primary text-white text-center py-4 mt-10">
        <div
            class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-center md:text-left space-y-3 md:space-y-0">
            <p class="text-sm">&copy; 2025 ASH SHAFA MARWAH INDONESIA. All rights reserved.</p>
            <div class="flex space-x-4 text-xl">
                <a href="https://www.tiktok.com/@ashshafa.marwahindonesia?_t=ZS-90wU4v9Cy8X&_r=1"
                    class="hover:text-shafa-secondary"><i class="fab fa-tiktok" title="TikTok"></i></a>
                <a href="https://www.instagram.com/ashshafa_marwah?igsh=Y2thNDc1cm5qMXMx"
                    class="hover:text-shafa-secondary"><i class="fab fa-instagram" title="Instagram"></i></a>
                <a href="#" class="hover:text-shafa-secondary"><i class="fab fa-facebook"
                        title="Facebook"></i></a>
                <a href="#" class="hover:text-shafa-secondary"><i class="fab fa-youtube" title="YouTube"></i></a>
            </div>
        </div>
    </footer>

    <!-- Script Umum (untuk Navbar Mobile dan Dropdown Layanan) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const layananBtn = document.getElementById('layanan-btn');
            const layananMenu = document.getElementById('layanan-menu');

            // Toggle menu mobile
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Toggle dropdown Layanan
            if (layananBtn) {
                layananBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    layananMenu.classList.toggle('hidden');
                });
            }

            // Tutup dropdown jika klik di luar
            document.addEventListener('click', (e) => {
                if (layananMenu && !layananMenu.classList.contains('hidden') && !layananMenu.contains(e
                        .target) && !layananBtn
                    .contains(e.target)) {
                    layananMenu.classList.add('hidden');
                }
            });
        });
    </script>

    {{-- Placeholder untuk JavaScript tambahan dari halaman anak --}}
    @stack('scripts')
</body>

</html>
