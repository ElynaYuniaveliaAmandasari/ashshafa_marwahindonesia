<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel & Informasi | ASH SHAFA - Umrah Haji Tour & Travel</title>

    <!-- Tailwind -->
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

    <!-- HEADER -->
    <header class="sticky top-0 z-50 shadow-lg">
        <!-- Bar atas -->
        <div class="bg-shafa-primary py-2 text-white">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <img src="{{ asset('assets/img/logo-ash-shafa-putih.png') }}" alt="Logo ASH SHAFA" class="h-10">

                <div class="flex space-x-2">
                    <a href="https://www.tiktok.com/@ashshafa.marwahindonesia" target="_blank"
                        class="border border-white w-8 h-8 flex items-center justify-center hover:text-shafa-secondary hover:border-shafa-secondary transition"><i
                            class="fab fa-tiktok"></i></a>
                    <a href="https://www.instagram.com/ashshafa_marwah" target="_blank"
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

        <!-- Navbar -->
        <nav class="bg-shafa-bg-hero text-white">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <!-- Tombol menu mobile -->
                <button id="menu-toggle" class="text-white text-2xl md:hidden"><i class="fas fa-bars"></i></button>

                <!-- Menu utama -->
                <ul id="menu" class="hidden md:flex space-x-6 font-semibold text-sm uppercase mx-auto">
                    <li><a href="{{ url('/') }}" class="hover:text-shafa-secondary">Home</a></li>
                    <li><a href="{{ url('/pages/about') }}" class="hover:text-shafa-secondary">Profile</a></li>

                    <!-- Dropdown Layanan (klik toggle) -->
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
                                    class="block px-4 py-2 hover:bg-gray-100">Wisata Religi</a>
                            </li>
                            <li><a href="{{ url('/pages/produk-lain') }}"
                                    class="block px-4 py-2 hover:bg-gray-100">Produk Lain</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/pages/gallery') }}" class="hover:text-shafa-secondary">Gallery</a></li>
                    <li><a href="{{ url('/pages/artikel') }}" class="border-b-2 border-shafa-secondary pb-1">Artikel</a>
                    </li>
                </ul>

                <a href="{{ url('/') }}#request"
                    class="hidden md:inline-block bg-shafa-secondary text-shafa-dark-text font-bold py-2 px-4 rounded-md hover:bg-yellow-600 transition">
                    Request Paket
                </a>
            </div>

            <!-- Menu Mobile -->
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

    <!-- MAIN CONTENT -->
    <main class="pt-8 pb-16">
        <div class="container mx-auto px-4 mb-8">
            <h1
                class="text-3xl sm:text-4xl font-extrabold text-shafa-primary border-b-4 border-shafa-secondary pb-2 mb-2">
                ARTIKEL TERKINI</h1>
            <p class="text-sm text-gray-500">Home / Artikel</p>
        </div>

        <section id="artikel-content" class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Kolom Artikel -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Pencarian & Filter -->
                    <div class="bg-white p-4 rounded-lg shadow border">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <input id="search-input" type="text"
                                placeholder="Cari artikel (misal: visa, vaksin, dll)"
                                class="w-full p-2 border rounded-md">
                            <select id="category-filter" class="w-full p-2 border rounded-md">
                                <option value="">Semua Kategori</option>
                                <option value="umroh">Umroh</option>
                                <option value="haji">Haji</option>
                            </select>
                        </div>
                    </div>

                    <!-- Loader -->
                    <div id="loader" class="text-center py-6">
                        <p class="text-gray-600">Memuat artikel terbaru...</p>
                    </div>

                    <!-- Daftar Berita -->
                    <div id="news-list" class="space-y-6"></div>
                </div>

                <!-- Sidebar -->
                <aside class="space-y-8">
                    <div class="bg-white p-6 rounded-lg shadow border">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Sumber Artikel</h3>
                        <ul class="list-disc pl-5 text-gray-700 text-sm">
                            <li>ashshafatour.blogspot.com</li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-lg shadow border">
                        <h3 class="text-xl font-bold text-white p-4 bg-shafa-primary">Petunjuk</h3>
                        <div class="p-4 text-sm text-shafa-text space-y-2">
                            <p>Gunakan pencarian untuk menemukan topik tertentu.</p>
                            <p>Filter “Umroh” atau “Haji” untuk kategori spesifik.</p>
                            <p>Semua tautan mengarah ke sumber asli.</p>
                        </div>
                    </div>
                </aside>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-shafa-primary text-white text-center py-4 mt-10">
        <div
            class="container mx-auto px-4 flex flex-col sm:flex-row justify-between items-center text-center sm:text-left gap-4">
            <p>© 2025 ASH SHAFA MARWAH INDONESIA. All rights reserved.</p>
            <div class="flex space-x-4 text-xl">
                <a href="https://www.tiktok.com/@ashshafa.marwahindonesia?_t=ZS-90wU4v9Cy8X&_r=1"
                    class="hover:text-shafa-secondary"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.instagram.com/ashshafa_marwah?igsh=Y2thNDc1cm5qMXMx"
                    class="hover:text-shafa-secondary"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-shafa-secondary"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-shafa-secondary"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>

    <!-- SCRIPT -->
    <script>
        // === TOGGLE MENU MOBILE ===
        document.getElementById("menu-toggle").addEventListener("click", () => {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        });

        // === DROPDOWN LAYANAN ===
        const layananBtn = document.getElementById("layanan-btn");
        const layananMenu = document.getElementById("layanan-menu");
        layananBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            layananMenu.classList.toggle("hidden");
        });
        document.addEventListener("click", () => layananMenu.classList.add("hidden"));

        // === FETCH ARTIKEL DARI BLOGGER ===
        let allArticles = [];

        async function fetchNews() {
            const loader = document.getElementById("loader");
            try {
                // URL RSS BLOG ASH SHAFA
                const bloggerRSS = "https://ashshafatour.blogspot.com/feeds/posts/default?alt=rss";

                // Konversi RSS ke JSON via API rss2json
                const response = await fetch(
                    `https://api.rss2json.com/v1/api.json?rss_url=${encodeURIComponent(bloggerRSS)}`);
                const data = await response.json();

                // Format artikel dari Blogger
                let items = (data.items || []).map(item => {
                    // Ambil label Blogger sebagai kategori
                    let category = "umroh";
                    if (item.categories.includes("Haji")) category = "haji";
                    if (item.categories.includes("Umroh")) category = "umroh";

                    return {
                        title: item.title,
                        link: item.link,
                        thumbnail: item.thumbnail || "",
                        pubDate: item.pubDate,
                        description: item.description || "",
                        category: category
                    };
                });

                // Urutkan berdasarkan tanggal terbaru
                allArticles = items.sort((a, b) => new Date(b.pubDate) - new Date(a.pubDate));

                renderArticles();
                loader.style.display = "none";
            } catch (err) {
                console.error(err);
                loader.innerHTML = '<p class="text-red-600">Gagal memuat artikel dari Blogger.</p>';
            }
        }

        // === RENDER ARTIKEL DI HALAMAN ===
        function renderArticles() {
            const query = document.getElementById("search-input").value.toLowerCase();
            const category = document.getElementById("category-filter").value;
            const list = document.getElementById("news-list");

            const filtered = allArticles.filter(a => {
                const matchText = a.title.toLowerCase().includes(query) || a.description.toLowerCase().includes(
                    query);
                const matchCategory = !category || a.category === category;
                return matchText && matchCategory;
            });

            if (!filtered.length) {
                list.innerHTML = '<p class="text-gray-600">Tidak ada artikel yang sesuai.</p>';
                return;
            }

            list.innerHTML = filtered.map(item => `
        <div class="bg-white rounded-lg shadow border overflow-hidden hover:shadow-lg transition">
          ${item.thumbnail ? `<img src="${item.thumbnail}" class="w-full h-48 object-cover">` : ""}
          <div class="p-6">
            <span class="text-xs font-semibold px-2 py-1 bg-shafa-secondary text-shafa-primary rounded mb-2 inline-block">
              ${item.category === "haji" ? "Haji" : "Umroh"}
            </span>
            <h2 class="text-lg sm:text-xl font-bold text-shafa-primary mb-2">${item.title}</h2>
            <p class="text-xs text-gray-500 mb-3">${new Date(item.pubDate).toLocaleDateString("id-ID")}</p>
            <p class="text-shafa-text mb-4">${item.description.replace(/<[^>]*>/g, "").substring(0, 150)}...</p>
            <a href="${item.link}" target="_blank" class="inline-block px-4 py-2 bg-shafa-primary text-white text-sm font-semibold rounded hover:bg-red-800 transition">Baca Selengkapnya →</a>
          </div>
        </div>
      `).join('');
        }

        // === EVENT LISTENER ===
        document.addEventListener("DOMContentLoaded", fetchNews);
        document.getElementById("search-input").addEventListener("input", renderArticles);
        document.getElementById("category-filter").addEventListener("change", renderArticles);
    </script>


</body>

</html>
