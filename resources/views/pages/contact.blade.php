<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami | ASH SHAFA - Umrah Haji Tour & Travel</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'shafa-primary': '#7A0000',
                        'shafa-secondary': '#FF9A00',
                        'shafa-red': '#FF0000', // C:0, M:100, Y:100, K:0
                        'shafa-dark-text': '#0F1011',
                        'shafa-bg-hero': '#8A1515', // Maroon gelap yang sudah ada di konsep visual
                        'shafa-text': '#4B5563',
                    }
                }
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="font-sans bg-gray-50">

    <!-- HEADER -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <!-- Topbar -->
        <div class="bg-shafa-primary py-2 text-white text-xs">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <span class="truncate">Ijin PPIU: 02202076337090002</span>
                <div class="hidden sm:flex space-x-4">
                    <a href="mailto:contact@ashshafa.com" class="hover:underline"><i class="fas fa-envelope mr-1"></i>
                        contact@ashshafa.com</a>
                    <a href="tel:+6287779888989" class="hover:underline"><i class="fas fa-phone mr-1"></i> +62
                        87779888989</a>
                </div>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo-ash-shafa-maroon.png') }}" alt="Logo ASH SHAFA"
                        class="h-8 sm:h-10">
                </a>
            </div>

            <!-- Menu desktop -->
            <ul id="menu" class="hidden md:flex space-x-6 text-shafa-text font-medium">
                <li><a href="{{ url('/') }}" class="hover:text-shafa-secondary transition">HOME</a></li>
                <li><a href="{{ url('/pages/about') }}" class="hover:text-shafa-secondary transition">PROFILE</a></li>

                <!-- Dropdown Layanan -->
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
                                class="block px-4 py-2 hover:bg-gray-100 text-sm">Wisata
                                Religi</a></li>
                        <li><a href="{{ url('/pages/produk-lain') }}"
                                class="block px-4 py-2 hover:bg-gray-100 text-sm">Produk
                                Lainnya</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/pages/gallery') }}" class="hover:text-shafa-secondary transition">GALLERY</a></li>
                <li><a href="{{ url('/pages/artikel') }}" class="hover:text-shafa-secondary transition">ARTIKEL</a></li>
                <li>
                    <a href="#"
                        class="py-2 px-4 bg-shafa-primary text-white rounded-md hover:bg-red-800 border-b-2 border-shafa-secondary transition">
                        REQUEST PAKET
                    </a>
                </li>
            </ul>

            <!-- Tombol Hamburger -->
            <button id="menu-toggle" class="md:hidden text-shafa-primary text-2xl focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </nav>

        <!-- Menu Mobile -->
        <div id="mobile-menu"
            class="hidden bg-white border-t border-gray-200 md:hidden px-4 py-4 space-y-2 text-shafa-text font-medium">
            <a href="{{ url('/') }}" class="block hover:text-shafa-secondary">HOME</a>
            <a href="{{ url('/pages/about') }}" class="block hover:text-shafa-secondary">PROFILE</a>
            <a href="{{ url('/pages/umrah') }}" class="block hover:text-shafa-secondary">UMROH</a>
            <a href="{{ url('/pages/haji') }}" class="block hover:text-shafa-secondary">HAJI</a>
            <a href="{{ url('/pages/wisata-religi') }}" class="block hover:text-shafa-secondary">WISATA RELIGI</a>
            <a href="{{ url('/pages/produk-lain') }}" class="block hover:text-shafa-secondary">PRODUK LAIN</a>
            <a href="{{ url('/pages/gallery') }}" class="block hover:text-shafa-secondary">GALLERY</a>
            <a href="{{ url('/pages/artikel') }}" class="block hover:text-shafa-secondary">ARTIKEL</a>
            <a href="#"
                class="block bg-shafa-primary text-center text-white py-2 rounded-md hover:bg-red-800 transition">REQUEST
                PAKET</a>
        </div>
    </header>

    <!-- MAIN -->
    <main class="pt-8 pb-16">
        <div class="container mx-auto px-4 mb-8 text-center md:text-left">
            <h1
                class="text-3xl md:text-4xl font-extrabold text-shafa-primary border-b-4 border-shafa-secondary pb-2 mb-2">
                HUBUNGI KAMI
            </h1>
            <p class="text-sm text-gray-500">Home / Profile / Hubungi Kami</p>
        </div>

        <section id="contact-info" class="container mx-auto px-4 mb-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Info Kontak -->
                <div class="bg-white p-6 md:p-8 rounded-lg shadow-xl border-t-4 border-shafa-primary">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Kantor Pusat ASH SHAFA</h2>

                    <div class="space-y-5 text-base text-shafa-text">
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-map-marker-alt text-xl md:text-2xl text-shafa-primary mt-1"></i>
                            <div>
                                <p class="font-semibold">Alamat Kantor:</p>
                                <p>Ruko Citra Harmoni City Centre Blok TC-17, Trosobo, Kec. Taman, Kabupaten Sidoarjo,
                                    Jawa Timur 61257</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <i class="fas fa-phone-alt text-xl md:text-2xl text-shafa-primary mt-1"></i>
                            <div>
                                <p class="font-semibold">Telepon:</p>
                                <p>0877 7988 8989</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <i class="fas fa-envelope text-xl md:text-2xl text-shafa-primary mt-1"></i>
                            <div>
                                <p class="font-semibold">Email:</p>
                                <p><a href="mailto:digitalmarketingashshafa@gmail.com"
                                        class="text-blue-600 hover:underline">digitalmarketingashshafa@gmail.com</a></p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <i class="fas fa-clock text-xl md:text-2xl text-shafa-primary mt-1"></i>
                            <div>
                                <p class="font-semibold">Jam Operasional:</p>
                                <p>Senin - Jumat: 08.00 - 17.00 WIB</p>
                                <p>Sabtu: 08.00 - 14.00 WIB</p>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-200">
                            <p class="font-semibold mb-2">Ikuti Kami di Media Sosial:</p>
                            <div class="flex space-x-5 text-2xl md:text-3xl">
                                <a href="https://www.tiktok.com/@ashshafa.marwahindonesia?_t=ZS-90wU4v9Cy8X&_r=1"
                                    class="text-gray-600 hover:text-shafa-secondary"><i class="fab fa-tiktok"></i></a>
                                <a href="https://www.instagram.com/ashshafa_marwah?igsh=Y2thNDc1cm5qMXMx"
                                    class="text-gray-600 hover:text-shafa-secondary"><i
                                        class="fab fa-instagram"></i></a>
                                <a href="#" class="text-gray-600 hover:text-shafa-secondary"><i
                                        class="fab fa-facebook"></i></a>
                                <a href="#" class="text-gray-600 hover:text-shafa-secondary"><i
                                        class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MAP -->
                <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                    <h2 class="text-xl md:text-2xl font-bold text-gray-800 p-4 bg-gray-100">Lokasi Kantor Kami (Jawa
                        Timur)</h2>
                    <div class="w-full h-72 md:h-96">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.079446835455!2d112.6393706!3d-7.3751324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e39c609ae3d5%3A0xf2c70041ba22f797!2sPT.ASH%20SHAFA%20MARWAH%20INDONESIA!5e0!3m2!1sid!2sid!4v1730679890123!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-shafa-primary text-white text-center py-4 mt-10">
        <div
            class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <p class="text-center md:text-left text-sm">&copy; 2025 ASH SHAFA MARWAH INDONESIA. All rights reserved.
            </p>
            <div class="flex space-x-4 text-lg">
                <a href="https://www.tiktok.com/@ashshafa.marwahindonesia?_t=ZS-90wU4v9Cy8X&_r=1"
                    class="hover:text-shafa-secondary"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.instagram.com/ashshafa_marwah?igsh=Y2thNDc1cm5qMXMx"
                    class="hover:text-shafa-secondary"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-shafa-secondary"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-shafa-secondary"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>

    <!-- Script Toggle Menu Mobile -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        const layananBtn = document.getElementById('layanan-btn');
        const layananMenu = document.getElementById('layanan-menu');

        // Toggle dropdown saat tombol diklik
        layananBtn.addEventListener('click', (e) => {
            e.stopPropagation(); // cegah klik menutup langsung
            layananMenu.classList.toggle('hidden');
        });

        // Tutup dropdown jika klik di luar
        document.addEventListener('click', (e) => {
            if (!layananMenu.contains(e.target) && !layananBtn.contains(e.target)) {
                layananMenu.classList.add('hidden');
            }
        });
    </script>

</body>

</html>
