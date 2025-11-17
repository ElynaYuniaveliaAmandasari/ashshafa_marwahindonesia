<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Lain | PT. ASH SHAFA MARWAH INDONESIA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'shafa-primary': '#7A0000',
                        'shafa-secondary': '#FF9A00',
                        'shafa-dark-text': '#0F1011',
                        'shafa-bg-hero': '#8A1515',
                        'shafa-text': '#4B5563'
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="font-sans bg-gray-50">

    <header class="sticky top-0 z-50 shadow-lg">
        <div class="bg-shafa-primary py-2 text-white">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <img src="{{ asset('assets/img/logo-ash-shafa-putih.png') }}" alt="Logo ASH SHAFA" class="h-10">
                <div class="flex space-x-2">
                    <a href="https://www.tiktok.com/@ashshafa.marwahindonesia?_t=ZS-90wU4v9Cy8X&_r=1" target="_blank"
                        class="border border-white w-8 h-8 flex items-center justify-center hover:text-shafa-secondary hover:border-shafa-secondary transition"><i
                            class="fab fa-tiktok"></i></a>
                    <a href="https://www.instagram.com/ashshafa_marwah?igsh=Y2thNDc1cm5qMXMx" target="_blank"
                        class="border border-white w-8 h-8 flex items-center justify-center hover:text-shafa-secondary hover:border-shafa-secondary transition"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/ashshafa.indonesia" target="_blank"
                        class="border border-white w-8 h-8 flex items-center justify-center hover:text-shafa-secondary hover:border-shafa-secondary transition"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://www.threads.net/@ashshafa_marwah" target="_blank"
                        class="border border-white w-8 h-8 flex items-center justify-center hover:text-shafa-secondary hover:border-shafa-secondary transition"><i
                            class="fab fa-threads"></i></a>
                    <a href="https://www.youtube.com/@ashshafa" target="_blank"
                        class="border border-white w-8 h-8 flex items-center justify-center hover:text-shafa-secondary hover:border-shafa-secondary transition"><i
                            class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <nav class="bg-shafa-bg-hero text-white">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <button id="menu-toggle" class="text-white text-2xl md:hidden"><i class="fas fa-bars"></i></button>
                <ul id="menu" class="hidden md:flex space-x-6 font-semibold text-sm uppercase mx-auto">
                    <li><a href="{{ url('/') }}" class="hover:text-shafa-secondary">Home</a></li>
                    <li><a href="{{ url('/pages/about') }}" class="hover:text-shafa-secondary">Profile</a></li>
                    <li class="relative">
                        <button id="layanan-btn"
                            class="flex items-center hover:text-shafa-secondary focus:outline-none font-semibold text-sm uppercase">
                            Layanan <i class="fas fa-chevron-down text-xs ml-1"></i>
                        </button>
                        <ul id="layanan-menu"
                            class="absolute hidden bg-white text-shafa-dark-text rounded-md shadow-lg mt-1 w-44 z-50">
                            <li><a href="{{ url('/pages/umrah') }}" class="block px-4 py-2 hover:bg-gray-100">Umroh</a>
                            </li>
                            <li><a href="{{ url('/pages/haji') }}" class="block px-4 py-2 hover:bg-gray-100">Haji</a>
                            </li>
                            <li><a href="{{ url('/pages/wisata-religi') }}"
                                    class="block px-4 py-2 hover:bg-gray-100">Wisata Religi</a></li>
                            <li><a href="{{ url('/pages/produk-lain') }}"
                                    class="block px-4 py-2 hover:bg-gray-100">Produk Lain</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/pages/gallery') }}" class="hover:text-shafa-secondary">Gallery</a></li>
                    <li><a href="{{ url('/pages/artikel') }}" class="hover:text-shafa-secondary">Artikel</a></li>
                </ul>
                <a href="{{ url('/') }}#request"
                    class="hidden md:inline-block bg-shafa-secondary text-shafa-dark-text font-bold py-2 px-4 rounded-md hover:bg-yellow-600 transition">
                    Request Paket
                </a>
            </div>
            <div id="mobile-menu" class="hidden md:hidden bg-shafa-bg-hero text-white px-4 py-4 space-y-2">
                <a href="{{ url('/') }}" class="block hover:text-shafa-secondary">Home</a>
                <a href="{{ url('/pages/about') }}" class="block hover:text-shafa-secondary">Profile</a>
                <a href="{{ url('/pages/umrah') }}" class="block hover:text-shafa-secondary">Umroh</a>
                <a href="{{ url('/pages/haji') }}" class="block hover:text-shafa-secondary">Haji</a>
                <a href="{{ url('/pages/wisata-religi') }}" class="block hover:text-shafa-secondary">Wisata Religi</a>
                <a href="{{ url('/pages/produk-lain') }}" class="block hover:text-shafa-secondary">Produk Lain</a>
                <a href="{{ url('/pages/gallery') }}" class="block hover:text-shafa-secondary">Gallery</a>
                <a href="{{ url('/pages/artikel') }}" class="block hover:text-shafa-secondary">Artikel</a>
                <a href="{{ url('/') }}#request"
                    class="block bg-shafa-secondary text-center text-shafa-dark-text font-bold py-2 rounded-md">Request
                    Paket</a>
            </div>
        </nav>
    </header>

    <main class="py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-extrabold text-shafa-primary text-center mb-10">
                PRODUK & LAYANAN LAINNYA
            </h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                @forelse ($otherProductsPackages as $package)
                    <div
                        class="bg-white rounded-lg shadow-xl overflow-hidden border border-gray-200 hover:shadow-2xl transition duration-300 flex flex-col">

                        <img src="{{ asset('storage/' . $package->image_url) }}" alt="{{ $package->name }}"
                            class="w-full h-56 object-cover bg-gray-100">

                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div class="space-y-3">

                                <h2 class="text-lg font-extrabold text-shafa-dark-text uppercase leading-tight">
                                    {{ $package->name }}</h2>

                                <div class="text-xs sm:text-sm text-shafa-text space-y-2">
                                    @if (isset($package->attributes['jenis']))
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-passport text-shafa-primary"></i>
                                            <span>Jenis:
                                                {{ implode(', ', (array) $package->attributes['jenis']) }}</span>
                                        </div>
                                    @endif

                                    @if (isset($package->attributes['proses_pembuatan']))
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-clock text-shafa-primary"></i>
                                            <span>Proses: {{ $package->attributes['proses_pembuatan'] }}</span>
                                        </div>
                                    @endif

                                    @if (isset($package->attributes['dokumen']))
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-file-alt text-shafa-primary"></i>
                                            <span>Dokumen: {{ $package->attributes['dokumen'] }}</span>
                                        </div>
                                    @endif

                                    @if (isset($package->attributes['deskripsi_tambahan']))
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-headset text-shafa-primary"></i>
                                            <span>{{ $package->attributes['deskripsi_tambahan'] }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="border-t mt-4 pt-3">
                                    <span class="text-xs sm:text-sm font-semibold text-shafa-primary">Harga
                                        mulai:</span>
                                    <p class="text-lg sm:text-xl font-extrabold text-shafa-dark-text">IDR
                                        {{ number_format($package->price, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <a href="{{ url('/paket/' . $package->slug) }}"
                                class="block w-full text-center py-2 mt-5 bg-shafa-primary text-white font-bold uppercase rounded-md transition duration-200 hover:bg-shafa-secondary hover:text-shafa-dark-text text-xs sm:text-sm">
                                Detail Layanan
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-4 text-center py-12 bg-white rounded-lg shadow-lg">
                        <i class="fas fa-info-circle text-4xl text-shafa-primary mb-4"></i>
                        <h3 class="text-xl font-semibold text-shafa-dark-text">Belum Ada Produk Lain</h3>
                        <p class="text-shafa-text mt-2">Silakan tambahkan produk/layanan dengan kategori "Produk Lain"
                            di panel admin.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </main>

    <footer class="bg-shafa-primary text-white text-center py-4 mt-10">
        <div
            class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-center md:text-left">
            <p class="mb-4 md:mb-0">&copy; 2025 ASH SHAFA MARWAH INDONESIA. All rights reserved.</p>
            <div class="flex space-x-4 text-xl">
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
        // Toggle menu mobile
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
        // Dropdown Layanan - Klik Toggle
        const layananBtn = document.getElementById("layanan-btn");
        const layananMenu = document.getElementById("layanan-menu");

        layananBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            layananMenu.classList.toggle("hidden");
        });

        // Klik di luar menu => tutup dropdown
        document.addEventListener("click", (e) => {
            if (!layananMenu.classList.contains("hidden")) {
                layananMenu.classList.add("hidden");
            }
        });
    </script>

</body>

</html>
