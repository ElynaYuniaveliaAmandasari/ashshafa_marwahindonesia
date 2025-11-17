<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery | ASH SHAFA - Umrah Haji Tour & Travel</title>

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="font-sans bg-gray-50">

    <header class="sticky top-0 z-50 bg-white shadow-md">
        <div class="bg-shafa-primary text-white text-xs">
            <div
                class="container mx-auto px-4 py-2 flex flex-col sm:flex-row justify-between items-center gap-1 sm:gap-2 text-center sm:text-left">
                <span class="font-medium">Ijin PPIU: 02202076337090002</span>
                <div class="flex flex-col sm:flex-row items-center gap-1 sm:gap-4 text-[11px] sm:text-xs leading-tight">
                    <a href="mailto:digitalmarketingashshafa@gmail.com"
                        class="flex items-center justify-center gap-1 hover:underline">
                        <i class="fas fa-envelope text-[11px]"></i>
                        <span class="truncate max-w-[220px] sm:max-w-none">digitalmarketingashshafa@gmail.com</span>
                    </a>
                    <a href="tel:+6287779888989" class="flex items-center justify-center gap-1 hover:underline">
                        <i class="fas fa-phone text-[11px]"></i>
                        <span>+62 87779888989</span>
                    </a>
                </div>
            </div>
        </div>

        <nav class="container mx-auto px-4 py-3 flex justify-between items-center relative">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo-ash-shafa-maroon.png') }}" alt="Logo ASH SHAFA" class="h-8 sm:h-10">
            </a>

            <ul id="menu" class="hidden md:flex space-x-6 text-shafa-text font-medium">
                <li><a href="{{ url('/') }}" class="hover:text-shafa-secondary transition">HOME</a></li>
                <li><a href="{{ url('/pages/about') }}" class="hover:text-shafa-secondary transition">PROFILE</a></li>

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
                <li><a href="{{ url('/pages/gallery') }}"
                        class="text-shafa-primary border-b-2 border-shafa-primary">GALLERY</a></li>
                <li><a href="{{ url('/pages/artikel') }}" class="hover:text-shafa-secondary transition">ARTIKEL</a></li>
                <li><a href="{{ url('/') }}#request"
                        class="py-1 px-3 bg-shafa-primary text-white rounded-md hover:bg-red-600 transition">REQUEST
                        PAKET</a></li>
            </ul>

            <button id="menu-toggle" class="md:hidden text-shafa-primary text-2xl focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>

            <ul id="mobile-menu"
                class="absolute left-0 top-full w-full bg-white shadow-md hidden flex-col text-shafa-text font-medium z-40">
                <li><a href="{{ url('/') }}" class="block px-6 py-2 border-b hover:bg-gray-100">HOME</a></li>
                <li><a href="{{ url('/pages/about') }}" class="block px-6 py-2 border-b hover:bg-gray-100">PROFILE</a>
                </li>
                <li><a href="{{ url('/pages/umrah') }}" class="block px-6 py-2 border-b hover:bg-gray-100">UMROH</a>
                </li>
                <li><a href="{{ url('/pages/haji') }}" class="block px-6 py-2 border-b hover:bg-gray-100">HAJI</a></li>
                <li><a href="{{ url('/pages/wisata-religi') }}"
                        class="block px-6 py-2 border-b hover:bg-gray-100">WISATA RELIGI</a></li>
                <li><a href="{{ url('/pages/produk-lain') }}" class="block px-6 py-2 border-b hover:bg-gray-100">PRODUK
                        LAINNYA</a></li>
                <li><a href="{{ url('/pages/gallery') }}"
                        class="block px-6 py-2 border-b text-shafa-primary">GALLERY</a></li>
                <li><a href="{{ url('/pages/artikel') }}"
                        class="block px-6 py-2 border-b hover:bg-gray-100">ARTIKEL</a></li>
                <li><a href="{{ url('/') }}#request"
                        class="block m-3 bg-shafa-primary text-white text-center rounded-md py-2 hover:bg-red-600">REQUEST
                        PAKET</a></li>
            </ul>
        </nav>
    </header>

    <main class="pt-8 pb-16">
        <div class="container mx-auto px-4 mb-10 text-center sm:text-left">
            <h1
                class="text-3xl sm:text-4xl font-extrabold text-shafa-primary border-b-4 border-shafa-secondary pb-2 mb-2">
                GALLERY FOTO PERJALANAN
            </h1>
            <p class="text-sm text-gray-500">Home / Gallery</p>
        </div>

        <section id="photo-gallery" class="container mx-auto px-4">

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">

                @forelse ($images as $image)
                    <div
                        class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer transform hover:scale-[1.02] transition duration-300">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                            alt="{{ $image->caption ?? 'Gallery Image' }}"
                            class="w-full h-40 sm:h-52 lg:h-60 object-cover group-hover:opacity-80 transition duration-300">
                        <div
                            class="absolute inset-0 bg-shafa-primary/50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-300">
                            <p class="text-white text-sm sm:text-base font-bold text-center px-2">
                                {{ $image->caption ?? 'Galeri Ash Shafa' }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <i class="fas fa-camera text-4xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-semibold text-shafa-dark-text">Galeri Masih Kosong</h3>
                        <p class="text-shafa-text mt-2">Belum ada gambar yang diunggah. Silakan cek kembali nanti.</p>
                    </div>
                @endforelse

            </div>

            <div class="text-center mt-12 sm:mt-16 px-2">
                <p class="text-base sm:text-xl text-shafa-text mb-4 font-medium">
                    Lihatlah pengalaman jamaah kami yang berkesan!
                </p>
                <a href="https://www.instagram.com/ashshafa_marwah?igsh=Y2thNDc1cm5qMXMx" target="_blank"
                    class="inline-block bg-shafa-secondary text-shafa-primary font-bold py-3 px-6 sm:px-8 rounded-lg text-sm sm:text-lg hover:bg-yellow-400 transition shadow-md">
                    <i class="fab fa-instagram mr-2"></i> KUNJUNGI INSTAGRAM KAMI
                </a>
            </div>
        </section>
    </main>

    <footer class="bg-shafa-primary text-white text-center py-4 mt-10">
        <div
            class="container mx-auto px-4 flex flex-col sm:flex-row justify-between items-center text-center sm:text-left gap-4">
            <p class="text-sm sm:text-base">&copy; 2025 ASH SHAFA MARWAH INDONESIA. All rights reserved.</p>
            <div class="flex justify-center sm:justify-end space-x-4 text-lg sm:text-xl">
                <a href="https://www.tiktok.com/@ashshafa.marwahindonesia?_t=ZS-90wU4v9Cy8X&_r=1"
                    class="hover:text-shafa-secondary"><i class="fab fa-tiktok" title="TikTok"></i></a>
                <a href="https://www.instagram.com/ashshafa_marwah?igsh=Y2thNDc1cm5qMXMx"
                    class="hover:text-shafa-secondary"><i class="fab fa-instagram" title="Instagram"></i></a>
                <a href="#" class="hover:text-shafa-secondary"><i class="fab fa-facebook"
                        title="Facebook"></i></a>
                <a href="#" class="hover:text-shafa-secondary"><i class="fab fa-twitter"
                        title="Threads / Twitter"></i></a>
                <a href="#" class="hover:text-shafa-secondary"><i class="fab fa-youtube"
                        title="YouTube"></i></a>
            </div>
        </div>
    </footer>

    <script>
        const toggle = document.getElementById("menu-toggle");
        const menu = document.getElementById("mobile-menu");
        toggle.addEventListener("click", () => {
            menu.classList.toggle("hidden");
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
