<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. ASH SHAFA MARWAH INDONESIA | Umroh, Haji, dan Wisata Halal</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        // Konfigurasi Warna berdasarkan CMYK dari File Anda
        // shafa-primary: C:25, M:100, Y:100, K:45 -> #7A0000 (Maroon Utama)
        // shafa-secondary: C:0, M:41, Y:100, K:0 -> #FF9A00 (Oranye Aksen)
        // shafa-dark-text: C:75, M:68, Y:65, K:90 -> #0F1011 (Hampir Hitam)
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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="font-sans bg-gray-50">

    <x-header />

    <main>

        <section id="hero" class="relative pt-12 pb-24 h-auto flex items-center">
            <video autoplay loop muted playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0"
                poster="{{ asset('assets/img/gambar-makah.jpeg') }}">
                <source src="{{ asset('assets/img/loop-kabah2.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <div class="absolute inset-0 bg-black/50 z-10"></div>

            <div class="container mx-auto px-4 z-20 text-white text-center">
                <h2 class="text-2xl font-arabic mb-6">بِسْمِ ٱللَّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ</h2>
                <h1 class="text-3xl md:text-5xl font-extrabold mb-2">PT. ASH SHAFA MARWAH INDONESIA</h1>
                <p class="text-xl md:text-2xl font-light mb-2">Travel Umroh, Haji dan Wisata Halal</p>
                <p class="text-lg md:text-xl font-medium mb-10">Terbaik melayani & mendampingi, InsyaAllah</p>

                <a href="#paket"
                    class="inline-block bg-shafa-secondary text-shafa-dark-text font-bold py-3 px-8 rounded-full transition duration-300 border-2 border-white shadow-xl hover:bg-yellow-600">
                    PILIHAN HATI
                </a>
                <p class="mt-4 text-lg font-semibold">dipercaya lebih dari 20.000+ Jamaah</p>

                <div class="fixed right-4 bottom-4 lg:right-10 lg:bottom-10 flex flex-col items-end space-y-2 z-50">

                    <div id="cs-buttons-group" class="flex flex-col items-end space-y-2 mb-2 hidden">
                        <a href="https://wa.me/message/4YX2DJXLHHEMA1" target="_blank"
                            class="bg-white hover:bg-gray-100 text-shafa-primary font-semibold py-2 px-4 rounded-md shadow-lg border border-shafa-primary transition">
                            Customor Service 1
                        </a>
                        <a href="https://wa.me/qr/NVPZEDKSYRKJJ1" target="_blank"
                            class="bg-white hover:bg-gray-100 text-shafa-primary font-semibold py-2 px-4 rounded-md shadow-lg border border-shafa-primary transition">
                            Customor Service 2
                        </a>
                        <a href="https://wa.me/628113000031" target="_blank"
                            class="bg-white hover:bg-gray-100 text-shafa-primary font-semibold py-2 px-4 rounded-md shadow-lg border border-shafa-primary transition">
                            Customor Service 3
                        </a>
                    </div>

                    <div id="whatsapp-toggle-btn"
                        class="bg-white p-3 rounded-full shadow-2xl flex items-center space-x-2 cursor-pointer border-2 border-shafa-primary hover:bg-gray-100 transition">
                        <i class="fab fa-whatsapp text-2xl text-shafa-primary"></i>
                        <label class="text-shafa-primary font-bold">whatsapp</label>
                        <i id="whatsapp-icon" class="fas fa-chevron-up text-shafa-primary transition"></i>
                    </div>
                </div>
            </div>
        </section>

        <section id="fasilitas" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-shafa-primary mb-12">FASILITAS & JAMINAN LAYANAN</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                    <div class="text-center p-6 border-t-4 border-shafa-secondary shadow-lg rounded-lg">
                        <i class="fas fa-utensils text-4xl text-shafa-primary mb-4"></i>
                        <h3 class="font-bold text-xl mb-2 text-shafa-dark-text">KONSUMSI</h3>
                        <p class="text-shafa-text">Konsumsi Terjamin dari mulai perjalanan sampai perjalanan berakhir.
                        </p>
                    </div>

                    <div class="text-center p-6 border-t-4 border-shafa-secondary shadow-lg rounded-lg">
                        <i class="fas fa-passport text-4xl text-shafa-primary mb-4"></i>
                        <h3 class="font-bold text-xl mb-2 text-shafa-dark-text">VISA UMROH/HAJI</h3>
                        <p class="text-shafa-text">Berpengalaman dalam pengurusan visa Umroh/Haji.</p>
                    </div>

                    <div class="text-center p-6 border-t-4 border-shafa-secondary shadow-lg rounded-lg">
                        <i class="fas fa-briefcase text-4xl text-shafa-primary mb-4"></i>
                        <h3 class="font-bold text-xl mb-2 text-shafa-dark-text">PERLENGKAPAN</h3>
                        <p class="text-shafa-text">Paket Umroh dengan keperluan Perlengkapan yang lengkap.</p>
                    </div>

                    <div class="text-center p-6 border-t-4 border-shafa-secondary shadow-lg rounded-lg">
                        <i class="fas fa-user-shield text-4xl text-shafa-primary mb-4"></i>
                        <h3 class="font-bold text-xl mb-2 text-shafa-dark-text">TL/MUTHOWIF</h3>
                        <p class="text-shafa-text">Umroh ditemani dan didampingi oleh Tour Leader dan muthowif yang
                            Berpengalaman dibidangnya.</p>
                    </div>

                    <div class="text-center p-6 border-t-4 border-shafa-secondary shadow-lg rounded-lg">
                        <i class="fas fa-plane-departure text-4xl text-shafa-primary mb-4"></i>
                        <h3 class="font-bold text-xl mb-2 text-shafa-dark-text">TIKET PESAWAT PP</h3>
                        <p class="text-shafa-text">Tiket pesawat pulang pergi untuk memenuhi akomodasi perjalanan umroh
                            dengan nyaman.</p>
                    </div>

                    <div class="text-center p-6 border-t-4 border-shafa-secondary shadow-lg rounded-lg">
                        <i class="fas fa-handshake text-4xl text-shafa-primary mb-4"></i>
                        <h3 class="font-bold text-xl mb-2 text-shafa-dark-text">TIM PROFESIONAL SAUDI</h3>
                        <p class="text-shafa-text">Didukung tim profesional dari Saudi untuk melancarkan kegiatan para
                            jamaah.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="paket" class="py-16 bg-shafa-primary/10">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-shafa-primary mb-10">PAKET UNGGULAN PILIHAN</h2>
                <p class="text-center text-lg text-shafa-text mb-12">Rencanakan ibadah Anda dengan paket terpopuler
                    kami yang terjamin fasilitas dan keberangkatannya.</p>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

                    @forelse ($featuredPackages as $package)
                        <div
                            class="bg-white rounded-lg shadow-xl overflow-hidden border border-gray-200 hover:shadow-2xl transition duration-300 flex flex-col">

                            <img src="{{ asset('storage/' . $package->image_url) }}" alt="{{ $package->name }}"
                                class="w-full h-full object-contain bg-gray-100">

                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div class="space-y-3">

                                    <h2 class="text-lg font-extrabold text-shafa-dark-text uppercase leading-tight">
                                        {{ $package->name }}</h2>

                                    <div class="text-xs sm:text-sm text-shafa-text space-y-2">
                                        <!-- Baris 1: Tanggal Keberangkatan & Maskapai -->
                                        <div class="grid grid-cols-2 gap-x-2">
                                            <div class="flex items-center gap-1">
                                                <i class="fas fa-calendar-alt text-shafa-primary"></i>
                                                <span>{{ \Carbon\Carbon::parse(explode(',', $package->departure_date)[0])->translatedFormat('d M Y') }}</span>
                                            </div>

                                            <div class="flex items-center gap-1">
                                                <i class="fas fa-plane text-shafa-primary"></i>
                                                <span>{{ trim(explode(',', $package->airline)[0]) }}</span>
                                            </div>
                                        </div>

                                        <!-- Baris 2: Hotel Makkah & Kota Keberangkatan -->
                                        <div class="grid grid-cols-2 gap-x-2">
                                            <div class="flex items-center gap-1">
                                                <i class="fas fa-kaaba text-shafa-primary"></i>
                                                <span>{{ $package->hotel_makkah ?? 'Hotel Makkah' }}</span>
                                            </div>

                                            <div class="flex items-center gap-1">
                                                <i class="fas fa-location-dot text-shafa-primary"></i>
                                                <span>{{ trim(explode(',', $package->departure_city)[0]) }}</span>
                                            </div>
                                        </div>

                                        <!-- Baris 3: Hotel Madinah -->
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-mosque text-shafa-primary"></i>
                                            <span>{{ $package->hotel_madinah ?? 'Hotel Madinah' }}</span>
                                        </div>

                                        <!-- Baris 4: Hotel Lainnya (Conditional) -->
                                        @if ($package->other_hotels)
                                            <div class="flex items-center gap-1">
                                                <i class="fas fa-hotel text-shafa-primary"></i>
                                                <span>{{ $package->other_hotels }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="border-t mt-4 pt-3 space-y-2">
                                        <div>
                                            @php
                                                $sisa_seat = $package->total_seats - $package->seats_filled;
                                                $percentage =
                                                    $package->total_seats > 0
                                                        ? ($package->seats_filled / $package->total_seats) * 100
                                                        : 0;
                                            @endphp
                                            <div class="flex justify-between items-center text-xs sm:text-sm">
                                                <span class="text-gray-600">Sisa Seat: {{ $sisa_seat }}</span>
                                                <span
                                                    class="font-semibold text-shafa-primary">{{ round($percentage) }}%
                                                    Terisi</span>
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                                <div class="bg-shafa-primary h-1.5 rounded-full"
                                                    style="width: {{ $percentage }}%"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="text-xs sm:text-sm font-semibold text-shafa-primary">Harga
                                                mulai:</span>

                                            <p class="text-lg sm:text-xl font-extrabold text-shafa-dark-text">IDR
                                                {{ number_format($package->price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>

                                    <a href="{{ url('/paket/' . $package->slug) }}"
                                        class="block w-full text-center py-2 mt-4 bg-shafa-primary text-white font-bold uppercase rounded-md transition duration-200 hover:bg-shafa-secondary hover:text-shafa-dark-text text-xs sm:text-sm">Detail
                                        Paket</a>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-span-1 md:col-span-4 text-center py-12 bg-white rounded-lg shadow-lg">
                            <i class="fas fa-info-circle text-4xl text-shafa-primary mb-4"></i>
                            <h3 class="text-xl font-semibold text-shafa-dark-text">Belum Ada Paket Unggulan</h3>
                            <p class="text-shafa-text mt-2">Silakan cek kembali nanti untuk paket-paket terbaik kami.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <section id="trust" class="py-16 bg-shafa-primary/5">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold text-shafa-primary mb-10">KENAPA MEMILIH ASH SHAFA?</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

                    <div class="p-4">
                        <i class="fas fa-certificate text-5xl text-shafa-primary mb-3"></i>
                        <p class="text-lg font-bold text-shafa-dark-text">Legalitas Resmi</p>
                        <p class="text-sm text-shafa-text">PPIU Berizin Kemenag RI</p>
                    </div>

                    <div class="p-4">
                        <i class="fas fa-users-cog text-5xl text-shafa-primary mb-3"></i>
                        <p class="text-lg font-bold text-shafa-dark-text">Pelayanan Terbaik</p>
                        <p class="text-sm text-shafa-text">Didampingi Muthowif Berpengalaman</p>
                    </div>

                    <div class="p-4">
                        <i class="fas fa-hotel text-5xl text-shafa-primary mb-3"></i>
                        <p class="text-lg font-bold text-shafa-dark-text">Fasilitas Premium</p>
                        <p class="text-sm text-shafa-text">Hotel Bintang 4 & 5 Dekat Masjid</p>
                    </div>

                    <div class="p-4">
                        <i class="fas fa-hand-holding-heart text-5xl text-shafa-primary mb-3"></i>
                        <p class="text-lg font-bold text-shafa-dark-text">Bimbingan Syar'i</p>
                        <p class="text-sm text-shafa-text">Manasik Intensif Sesuai Sunnah</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-shafa-primary mb-12">TESTIMONI JAMAAH KAMI</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md border-l-4 border-shafa-secondary">
                        <i class="fas fa-quote-left text-2xl text-shafa-secondary mb-3"></i>
                        <p class="italic text-shafa-text mb-4">"Alhamdulillah, pelayanan ASH SHAFA dari keberangkatan
                            hingga kepulangan sangat memuaskan. Muthowifnya sabar dan penjelasannya mudah dipahami.
                            Hotelnya pun dekat sekali!"</p>
                        <p class="font-bold text-shafa-dark-text">Bapak H. Abdullah & Ibu</p>
                        <p class="text-sm text-gray-500">Umroh Premium 2024</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md border-l-4 border-shafa-secondary">
                        <i class="fas fa-quote-left text-2xl text-shafa-secondary mb-3"></i>
                        <p class="italic text-shafa-text mb-4">"Kami merasa tenang karena bimbingan ibadah yang
                            intensif. Semua fasilitas yang dijanjikan terpenuhi, katering Indonesia-nya juga enak.
                            Terima kasih ASH SHAFA!"</p>
                        <p class="font-bold text-shafa-dark-text">Ibu Hj. Fatimah</p>
                        <p class="text-sm text-gray-500">Haji Khusus 1445H</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md border-l-4 border-shafa-secondary">
                        <i class="fas fa-quote-left text-2xl text-shafa-secondary mb-3"></i>
                        <p class="italic text-shafa-text mb-4">"Perjalanan tour ke Turki lancar jaya, halal food
                            terjamin. Kami sekeluarga bisa menikmati wisata sambil tetap menjaga waktu ibadah.
                            Rekomendasi banget!"</p>
                        <p class="font-bold text-shafa-dark-text">Keluarga Bpk. Syafi'i</p>
                        <p class_name="text-sm text-gray-500">Halal Tour Turki 2025</p>
                    </div>
                </div>

                <div class="text-center mt-10">
                    <a href="{{ url('/pages/gallery') }}"
                        class="inline-block border border-shafa-primary text-shafa-primary font-semibold py-3 px-8 rounded-lg hover:bg-shafa-primary hover:text-white transition">
                        Lihat Gallery Perjalanan Kami <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>

        <section id="request" class="py-16 bg-shafa-primary">
            <div class="container mx-auto px-4 text-center text-white">
                <h2 class="text-4xl font-bold mb-4">BELUM MENEMUKAN PAKET YANG TEPAT?</h2>
                <p class="text-xl mb-8 opacity-90">Sampaikan kebutuhan ibadah Anda, biarkan kami yang merancang paket
                    terbaik untuk Anda.</p>

                <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-2xl text-left">
                    <form id="submit-request-form" action="#" method="POST" class="space-y-4">

                        <div>
                            <label for="nama-req" class="block text-sm font-medium text-shafa-primary">Nama
                                Lengkap</label>
                            <input type="text" id="nama-req" name="Nama" placeholder="Contoh: Ahmad Riski"
                                required
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:border-shafa-secondary focus:ring-shafa-secondary text-shafa-dark-text">
                        </div>

                        <div>
                            <label for="whatsapp-req" class="block text-sm font-medium text-shafa-primary">Nomor
                                WhatsApp Aktif</label>
                            <input type="tel" id="whatsapp-req" name="WhatsApp"
                                placeholder="Contoh: 0812xxxxxxxx" required
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:border-shafa-secondary focus:ring-shafa-secondary text-shafa-dark-text">
                        </div>

                        <div>
                            <label for="email-req" class="block text-sm font-medium text-shafa-primary">Email</label>
                            <input type="email" id="email-req" name="Email"
                                placeholder="Contoh: nama@email.com (Opsional)"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:border-shafa-secondary focus:ring-shafa-secondary text-shafa-dark-text">
                        </div>

                        <div>
                            <label for="paket-req" class="block text-sm font-medium text-shafa-primary">Tertarik pada
                                Paket</label>
                            <select id="paket-req" name="Paket"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:border-shafa-secondary focus:ring-shafa-secondary text-shafa-dark-text">
                                <option value="Umroh Reguler">Umroh Reguler</option>
                                <option value="Umroh Premium">Umroh Premium</option>
                                <option value="Haji Khusus">Haji Khusus</option>
                                <option value="Wisata Religi">Wisata Religi</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="keterangan-req"
                                class="block text-sm font-medium text-shafa-primary">Keterangan Lainnya
                                (Opsional)</label>
                            <textarea id="keterangan-req" name="Keterangan" rows="3"
                                placeholder="Contoh: Kami berencana berangkat 4 orang, mohon info paket bulan Ramadan."
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:border-shafa-secondary focus:ring-shafa-secondary text-shafa-dark-text"></textarea>
                        </div>

                        <button type="submit" id="submit-request"
                            class="w-full bg-shafa-secondary text-shafa-dark-text font-bold py-3 rounded-md text-lg hover:bg-yellow-600 transition">
                            <i class="fas fa-paper-plane mr-2"></i> KIRIM REQUEST
                        </button>

                        <p id="form-status" class="text-center mt-3 text-sm hidden"></p>

                    </form>
                </div>
            </div>
        </section>

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
        document.getElementById("submit-request-form").addEventListener("submit", async function(e) {
            e.preventDefault();

            const formStatus = document.getElementById("form-status");
            formStatus.classList.remove("hidden");
            formStatus.textContent = "Mengirim data...";
            formStatus.classList.remove("text-green-600", "text-red-600");
            formStatus.classList.add("text-gray-600");

            const data = {
                Nama: document.getElementById("nama-req").value,
                WhatsApp: document.getElementById("whatsapp-req").value,
                Email: document.getElementById("email-req").value,
                Paket: document.getElementById("paket-req").value,
                Keterangan: document.getElementById("keterangan-req").value
            };

            try {
                const response = await fetch(
                    "https://script.google.com/macros/s/AKfycbzMGDou1UfkDgUa3liznYmDO83cYgGXEhcF7UkUrSAYSmPSGaZnHctX4d6b44ekemQD/exec", {
                        method: "POST",
                        mode: "no-cors",
                        body: JSON.stringify(data)
                    });

                formStatus.textContent = "Request Anda berhasil dikirim! Terima kasih.";
                formStatus.classList.remove("text-gray-600");
                formStatus.classList.add("text-shafa-secondary");

                e.target.reset();
            } catch (error) {
                formStatus.textContent = "Gagal mengirim data. Silakan coba lagi.";
                formStatus.classList.remove("text-gray-600");
                formStatus.classList.add("text-shafa-primary");
            }
        });
        // Toggle menu mobile
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
        // Logika Toggle CS Buttons
        const whatsappToggleBtn = document.getElementById('whatsapp-toggle-btn');
        const csButtonsGroup = document.getElementById('cs-buttons-group');
        const whatsappIcon = document.getElementById('whatsapp-icon');

        whatsappToggleBtn.addEventListener('click', () => {
            // Toggle visibility dari grup tombol CS
            csButtonsGroup.classList.toggle('hidden');

            // Mengubah ikon panah (ke atas menjadi ke bawah, atau sebaliknya)
            if (csButtonsGroup.classList.contains('hidden')) {
                whatsappIcon.classList.remove('fa-chevron-down');
                whatsappIcon.classList.add('fa-chevron-up');
            } else {
                whatsappIcon.classList.remove('fa-chevron-up');
                whatsappIcon.classList.add('fa-chevron-down');
            }
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