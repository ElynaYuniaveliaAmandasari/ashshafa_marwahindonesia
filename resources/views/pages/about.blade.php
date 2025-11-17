<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | ASH SHAFA - Umrah Haji Tour & Travel</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'shafa-primary': '#7A0000',
                        'shafa-secondary': '#FF9A00',
                        'shafa-red': '#FF0000',
                        'shafa-dark-text': '#0F1011',
                        'shafa-bg-hero': '#8A1515',
                        'shafa-text': '#4B5563',
                    }
                }
            }
        }
    </script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="font-sans bg-gray-50">

    <!-- HEADER -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <div class="bg-shafa-primary text-white text-xs">
            <div
                class="container mx-auto px-4 py-2 flex flex-col sm:flex-row justify-between items-center sm:items-center gap-2 text-center sm:text-left">
                <span class="font-medium">Ijin PPIU: 02202076337090002</span>

                <div
                    class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-4 text-[11px] sm:text-xs leading-tight">
                    <a href="mailto:digitalmarketingashshafa@gmail.com"
                        class="flex items-center justify-center gap-1 hover:underline">
                        <i class="fas fa-envelope text-[11px]"></i>
                        <span class="truncate max-w-[200px] sm:max-w-none">digitalmarketingashshafa@gmail.com</span>
                    </a>
                    <a href="tel:+6287779888989" class="flex items-center justify-center gap-1 hover:underline">
                        <i class="fas fa-phone text-[11px]"></i>
                        <span>+62 87779888989</span>
                    </a>
                </div>
            </div>
        </div>

        <nav class="container mx-auto px-4 py-4 flex justify-between items-center relative">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo-ash-shafa-maroon.png') }}" alt="Logo ASH SHAFA" class="h-8 sm:h-10">
            </a>

            <!-- NAVIGATION DESKTOP -->
            <ul id="menu" class="hidden md:flex space-x-6 text-shafa-text font-medium">
                <li><a href="{{ url('/') }}" class="hover:text-shafa-secondary transition">HOME</a></li>
                <li><a href="{{ url('/pages/about') }}"
                        class="hover:text-shafa-secondary transition text-shafa-primary font-bold">PROFILE</a></li>

                <li class="relative">
                    <button id="layanan-btn"
                        class="flex items-center hover:text-shafa-secondary transition focus:outline-none">
                        LAYANAN <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </button>
                    <ul id="layanan-menu" class="absolute hidden bg-white shadow-lg py-2 w-40 mt-1 rounded-md z-50">
                        <li><a href="{{ url('/pages/umrah') }}"
                                class="block px-4 py-2 hover:bg-gray-100 text-sm">Umroh</a></li>
                        <li><a href="{{ url('/pages/haji') }}"
                                class="block px-4 py-2 hover:bg-gray-100 text-sm">Haji</a></li>
                        <li><a href="{{ url('/pages/wisata-religi') }}"
                                class="block px-4 py-2 hover:bg-gray-100 text-sm">Wisata Religi</a></li>
                        <li><a href="{{ url('/pages/produk-lain') }}"
                                class="block px-4 py-2 hover:bg-gray-100 text-sm">Produk Lainnya</a></li>
                    </ul>
                </li>

                <li><a href="{{ url('/pages/gallery') }}" class="hover:text-shafa-secondary transition">GALLERY</a></li>
                <li><a href="{{ url('/pages/artikel') }}" class="hover:text-shafa-secondary transition">ARTIKEL</a>
                </li>
                <li><a href="{{ url('/') }}#request"
                        class="py-1 px-3 bg-shafa-primary text-white rounded-md hover:bg-red-600 transition">REQUEST
                        PAKET</a></li>
            </ul>

            <!-- MOBILE TOGGLE -->
            <button id="menu-toggle" class="md:hidden text-shafa-primary text-2xl focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>

            <!-- MOBILE MENU -->
            <ul id="mobile-menu"
                class="absolute left-0 top-full w-full bg-white shadow-md hidden flex-col text-shafa-text font-medium z-40">
                <li><a href="{{ url('/') }}" class="block px-6 py-2 border-b hover:bg-gray-100">HOME</a></li>
                <li><a href="#" class="block px-6 py-2 border-b text-shafa-primary font-bold">PROFILE</a></li>
                <li><a href="{{ url('/pages/umrah') }}" class="block px-6 py-2 border-b hover:bg-gray-100">UMRAH</a>
                </li>
                <li><a href="{{ url('/pages/haji') }}" class="block px-6 py-2 border-b hover:bg-gray-100">HAJI</a></li>
                <li><a href="{{ url('/pages/wisata-religi') }}"
                        class="block px-6 py-2 border-b hover:bg-gray-100">WISATA RELIGI</a></li>
                <li><a href="{{ url('/pages/produk-lain') }}" class="block px-6 py-2 border-b hover:bg-gray-100">PRODUK
                        LAINNYA</a></li>
                <li><a href="{{ url('/pages/gallery') }}"
                        class="block px-6 py-2 border-b hover:bg-gray-100">GALLERY</a></li>
                <li><a href="{{ url('/pages/artikel') }}"
                        class="block px-6 py-2 border-b hover:bg-gray-100">ARTIKEL</a></li>
                <li><a href="{{ url('/') }}#request"
                        class="block m-3 bg-shafa-primary text-white text-center rounded-md py-2 hover:bg-red-600">REQUEST
                        PAKET</a></li>
            </ul>
        </nav>
    </header>

    <!-- MAIN -->
    <main class="pt-8 pb-16">
        <div class="container mx-auto px-4 mb-8 text-center sm:text-left">
            <h1
                class="text-3xl sm:text-4xl font-extrabold text-shafa-primary border-b-4 border-shafa-secondary pb-2 mb-2">
                TENTANG KAMI</h1>
            <p class="text-sm text-gray-500">Home / Profile / Tentang Kami</p>
        </div>

        <!-- PROFILE -->
        <section class="container mx-auto px-4 mb-16 grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 text-shafa-text leading-relaxed">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-700 mb-4">Melayani dengan Sepenuh Hati</h2>
                <p class="mb-4">
                    PT. Ash Shafa Marwah Indonesia terus berupaya menyediakan layanan Umrah dan Haji Plus yang
                    profesional, aman, dan sesuai tuntunan syariat. Kami hadir untuk menjadi sahabat perjalanan
                    spiritual Anda menuju Baitullah.
                </p>
                <p class="mb-4">
                    Berbekal pengalaman, izin resmi Kemenag (PPIU: 02202076337090002), serta pembimbing ibadah yang
                    berkompeten, kami memastikan kenyamanan dan kekhusyukan setiap jamaah, dari keberangkatan hingga
                    kembali ke tanah air.
                </p>

                <h3 class="text-xl sm:text-2xl font-semibold text-shafa-primary mt-6 mb-3">Visi & Misi</h3>
                <ul class="list-disc list-inside space-y-2 text-sm sm:text-base">
                    <li>Amanah – menjaga kepercayaan jamaah dengan integritas tinggi.</li>
                    <li>Profesional – memberikan layanan terbaik dan standar tinggi.</li>
                    <li>Bimbingan Syar'i – memastikan ibadah sesuai Al-Qur’an dan As-Sunnah.</li>
                    <li>Inovatif – selalu beradaptasi dengan kebutuhan jamaah modern.</li>
                </ul>

                <a href="{{ url('/pages/contact') }}"
                    class="mt-8 inline-block bg-shafa-secondary text-shafa-primary font-bold py-3 px-6 rounded-lg hover:bg-yellow-600 transition text-sm sm:text-base">
                    Lihat Kontak & Lokasi Kantor Kami →
                </a>
            </div>

            <div>
                <img src="{{ asset('assets/img/foto-kantor.jpg') }}" alt="Kantor ASH SHAFA"
                    class="w-full rounded-xl shadow-lg object-cover">
                <p class="text-center text-sm mt-3 text-gray-500">Kantor Pusat PT. Ash Shafa Marwah Indonesia</p>
            </div>
        </section>

        <!-- STATISTIK -->
        <section id="statistics" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl sm:text-4xl font-bold text-center text-shafa-primary mb-12">
                    PERTUMBUHAN & KEPERCAYAAN JAMAAH
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                    <div class="p-6 bg-shafa-primary/10 rounded-lg shadow-md">
                        <i class="fas fa-users text-4xl sm:text-5xl text-shafa-primary mb-3"></i>
                        <p class="text-3xl sm:text-4xl font-extrabold text-shafa-primary">20.000+</p>
                        <p class="text-base sm:text-lg font-medium text-gray-700">TOTAL JAMAAH</p>
                    </div>

                    <div class="p-6 bg-shafa-primary/10 rounded-lg shadow-md">
                        <i class="fas fa-calendar-check text-4xl sm:text-5xl text-shafa-primary mb-3"></i>
                        <p class="text-3xl sm:text-4xl font-extrabold text-shafa-primary">5+</p>
                        <p class="text-base sm:text-lg font-medium text-gray-700">TAHUN BEROPERASI</p>
                    </div>

                    <div class="p-6 bg-shafa-primary/10 rounded-lg shadow-md">
                        <i class="fas fa-star text-4xl sm:text-5xl text-shafa-primary mb-3"></i>
                        <p class="text-3xl sm:text-4xl font-extrabold text-shafa-primary">100%</p>
                        <p class="text-base sm:text-lg font-medium text-gray-700">KEBERANGKATAN TERJAMIN</p>
                    </div>

                    <div class="p-6 bg-shafa-primary/10 rounded-lg shadow-md">
                        <i class="fas fa-shield-alt text-4xl sm:text-5xl text-shafa-primary mb-3"></i>
                        <p class="text-3xl sm:text-4xl font-extrabold text-shafa-primary">PPIU</p>
                        <p class="text-base sm:text-lg font-medium text-gray-700">IZIN KEMENAG RI</p>
                    </div>
                </div>

                <!-- CHART -->
                <div class="mt-12 p-6 sm:p-8 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50">
                    <h3 class="text-xl sm:text-2xl font-semibold text-center text-gray-700 mb-4">
                        Pertumbuhan Jamaah
                    </h3>
                    <div
                        class="h-64 sm:h-96 flex items-center justify-center bg-white border border-gray-200 rounded-md p-4 overflow-auto">
                        <canvas id="jamaahChart" class="max-w-full h-full"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-shafa-primary text-white text-center py-4 mt-10">
        <div
            class="container mx-auto px-4 flex flex-col sm:flex-row justify-between items-center gap-4 text-center sm:text-left">
            <p class="text-sm sm:text-base">&copy; 2025 ASH SHAFA MARWAH INDONESIA. All rights reserved.</p>
            <div class="flex justify-center space-x-4 text-xl">
                <a href="https://www.tiktok.com/@ashshafa.marwahindonesia?_t=ZS-90wU4v9Cy8X&_r=1"
                    class="hover:text-shafa-secondary"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.instagram.com/ashshafa_marwah?igsh=Y2thNDc1cm5qMXMx"
                    class="hover:text-shafa-secondary"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-shafa-secondary"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-shafa-secondary"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>

    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('jamaahChart');
            const labels = @json($growth->pluck('tahun'));
            const data = @json($growth->pluck('jumlah'));

            if (ctx) {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Jamaah',
                            data: data,
                            backgroundColor: ['#7A0505', '#C53030', '#F59E0B', '#FDD835',
                                '#38A169'
                            ],
                            borderColor: '#fff',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'right'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.label + ': ' + context.parsed + ' Jamaah';
                                    }
                                }
                            }
                        }
                    }
                });
            }
        });

        // Navbar Toggle
        const toggleBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        if (toggleBtn && mobileMenu) {
            toggleBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        const layananBtn = document.getElementById('layanan-btn');
        const layananMenu = document.getElementById('layanan-menu');
        if (layananBtn && layananMenu) {
            layananBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                layananMenu.classList.toggle('hidden');
            });
            document.addEventListener('click', (e) => {
                if (!layananMenu.contains(e.target) && !layananBtn.contains(e.target)) {
                    layananMenu.classList.add('hidden');
                }
            });
        }
    </script>
</body>

</html>
