<header class="sticky top-0 z-50 shadow-lg">
    <div class="bg-shafa-primary py-2 text-white">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('assets/img/logo-ash-shafa-putih.png') }}" alt="Logo Ash Shafa"
                    class="h-10 object-contain">
            </div>

            <div class="flex space-x-2">
                <a href="https://www.tiktok.com/@ashshafa.marwahindonesia?_t=ZS-90wU4v9Cy8X&_r=1" target="_blank"
                    class="border border-white w-8 h-8 flex items-center justify-center text-white hover:text-shafa-secondary transition transform hover:scale-110">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="https://www.instagram.com/ashshafa_marwah?igsh=Y2thNDc1cm5qMXMx" target="_blank"
                    class="border border-white w-8 h-8 flex items-center justify-center text-white hover:text-shafa-secondary transition transform hover:scale-110">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/ashshafa.indonesia" target="_blank"
                    class="border border-white w-8 h-8 flex items-center justify-center text-white hover:text-shafa-secondary transition transform hover:scale-110">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.threads.net/@ashshafa_marwah" target="_blank"
                    class="border border-white w-8 h-8 flex items-center justify-center text-white hover:text-shafa-secondary transition transform hover:scale-110">
                    <i class="fab fa-threads"></i>
                </a>
                <a href="https://www.youtube.com/@ashshafa" target="_blank"
                    class="border border-white w-8 h-8 flex items-center justify-center text-white hover:text-shafa-secondary transition transform hover:scale-110">
                    <i class="fab fa-youtube"></i>
                </a>
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
                        <li><a href="{{ url('/pages/wisata-religi') }}" class="block px-4 py-2 hover:bg-gray-100">Wisata
                                Religi</a></li>
                        <li><a href="{{ url('/pages/produk-lain') }}" class="block px-4 py-2 hover:bg-gray-100">Produk
                                Lain</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/pages/gallery') }}" class="hover:text-shafa-secondary">Gallery</a></li>
                <li><a href="{{ url('/pages/artikel') }}" class="hover:text-shafa-secondary">Artikel</a></li>
            </ul>

            <a href="#request"
                class="hidden md:inline-block bg-shafa-secondary text-shafa-dark-text font-bold py-2 px-4 rounded-md hover:bg-yellow-600">
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
            <a href="#request"
                class="block bg-shafa-secondary text-center text-shafa-dark-text font-bold py-2 rounded-md">Request
                Paket</a>
        </div>
    </nav>
</header>
