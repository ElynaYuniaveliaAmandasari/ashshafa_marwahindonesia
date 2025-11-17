@extends('layouts.app')
@section('title', 'Detail: ' . $package->name)

@section('content')
    <section class="container mx-auto px-4 py-10">
        <h2 class="text-2xl font-bold text-gray-80 mb-6">Detail Paket</h2>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden grid md:grid-cols-2 gap-6 p-6">

            <!-- LEFT SIDE: Image & Include/Exclude -->
            <div>
                <img src="{{ asset('storage/' . $package->image_url) }}" alt="{{ $package->name }}"
                    class="w-full max-h-96 object-contain rounded-lg mb-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">

                    <!-- Include Section -->
                    <div>
                        <h3 class="font-bold text-green-600 mb-3 flex items-center gap-2 text-base">
                            <i class="fas fa-check-circle"></i> Include:
                        </h3>
                        <div class="space-y-2 text-shafa-text">
                            @if ($package->include_items)
                                @php
                                    $includeItems = explode("\n", $package->include_items);
                                @endphp
                                <ul class="space-y-2">
                                    @foreach ($includeItems as $item)
                                        @if (trim($item))
                                            <li class="flex items-center gap-2">
                                                <i class="fas fa-check text-shafa-primary w-5 text-center"></i>
                                                <span>{{ trim($item) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500 italic">Tidak ada data include</p>
                            @endif
                        </div>
                    </div>

                    <!-- Exclude Section -->
                    <div>
                        <h3 class="font-bold text-red-600 mb-3 flex items-center gap-2 text-base">
                            <i class="fas fa-times-circle"></i> Exclude:
                        </h3>
                        <div class="space-y-2 text-shafa-text">
                            @if ($package->exclude_items)
                                @php
                                    $excludeItems = explode("\n", $package->exclude_items);
                                @endphp
                                <ul class="space-y-2">
                                    @foreach ($excludeItems as $item)
                                        @if (trim($item))
                                            <li class="flex items-start gap-2">
                                                <i class="fas fa-times text-shafa-primary w-5 text-center mt-1"></i>
                                                <span>{{ trim($item) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500 italic">Tidak ada data exclude</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE: Booking Form -->
            <div class="bg-shafa-primary text-white rounded-xl p-6 shadow-md self-start">
                <h3 class="text-lg font-bold mb-4">
                    @if ($package->category->slug === 'produk-lain')
                        AJUKAN LAYANAN
                    @else
                        PESAN PAKET
                    @endif
                </h3>

                @if ($package->category->slug === 'produk-lain')
                    <!-- Jenis (from attributes) as dropdown -->
                    <label class="block text-sm mb-2">Jenis</label>
                    <select class="w-full p-2 mb-3 rounded text-black" id="jenis-produk-lain">
                        @forelse ((array)($package->attributes['jenis'] ?? []) as $jenis)
                            <option value="{{ $jenis }}">{{ $jenis }}</option>
                        @empty
                            <option value="">Tidak Ada Jenis Layanan</option>
                        @endforelse
                    </select>

                    <!-- Durasi (from attributes) as dropdown -->
                    <label class="block text-sm mb-2">Durasi Masa Berlaku</label>
                    <select class="w-full p-2 mb-3 rounded text-black" id="durasi-produk-lain">
                        @forelse ((array)($package->attributes['proses'] ?? []) as $proses)
                            <option value="{{ $proses }}">{{ $proses }}</option>
                        @empty
                            <option value="">Tidak Ada Durasi Masa Berlaku</option>
                        @endforelse
                    </select>

                    <!-- Jumlah -->
                    <label class="block text-sm mb-2">Jumlah</label>
                    <input type="number" class="w-full p-2 mb-4 rounded text-black" min="1"
                        placeholder="Masukkan jumlah yang diajukan" id="jumlah-produk-lain" value="1">

                    <div class="font-bold text-lg mb-4">TOTAL : <span class="text-white" id="total-produk-lain">IDR
                            {{ number_format($package->price, 0, ',', '.') }}</span></div>

                    <button id="ajukan-btn"
                        class="w-full bg-shafa-dark-text text-white font-bold py-2 rounded-md hover:bg-shafa-secondary transition">
                        <i class="fab fa-whatsapp mr-2"></i> AJUKAN SEKARANG
                    </button>
                @else
                    <!-- Program Hari -->
                    <label class="block text-sm mb-2">Program Hari</label>
                    @if ($package->category->slug === 'umroh' || $package->category->slug === 'haji')
                        <select class="w-full p-2 mb-3 rounded text-black" id="program-hari-dropdown">
                            @forelse ((array)($package->attributes['program_hari_options'] ?? []) as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @empty
                                <option value="">Tidak Ada Program Hari</option>
                            @endforelse
                        </select>
                    @else
                        <input type="text" class="w-full p-2 mb-3 rounded text-black bg-white" id="program"
                            value="{{ $package->name }}" readonly>
                    @endif

                    <!-- Bandara Keberangkatan (Dynamic dari DB) -->
                    <label class="block text-sm mb-2">Bandara Keberangkatan</label>
                    <select class="w-full p-2 mb-3 rounded text-black" id="bandara">
                        @php
                            // Split departure_city jika ada koma (multi bandara)
                            $departureCities = $package->departure_city
                                ? explode(',', $package->departure_city)
                                : ['Bandara Utama'];
                        @endphp

                        @foreach ($departureCities as $city)
                            <option value="{{ trim($city) }}">{{ trim($city) }}</option>
                        @endforeach
                    </select>

                    <!-- Tanggal Keberangkatan (Dynamic dari DB) -->
                    <label class="block text-sm mb-2">Tanggal Keberangkatan</label>
                    <select class="w-full p-2 mb-3 rounded text-black" id="tanggal">
                        @php
                            // Split departure_date jika ada koma (multi tanggal)
                            $departureDates = $package->departure_date
                                ? explode(',', $package->departure_date)
                                : [null];
                            $sisaSeat = $package->total_seats - $package->seats_filled;
                        @endphp

                        @foreach ($departureDates as $date)
                            @php
                                $tanggalFormatted = $date
                                    ? \Carbon\Carbon::parse(trim($date))->translatedFormat('d F Y')
                                    : 'Tanggal Belum Ditentukan';
                            @endphp
                            <option value="{{ trim($date) }}">
                                {{ $tanggalFormatted }} ({{ $sisaSeat }} Seat Tersedia)
                            </option>
                        @endforeach
                    </select>

                    <!-- Pilihan Kamar (Dynamic dari DB - Prices) -->
                    <label class="block text-sm mb-2">Pilihan Kamar</label>
                    <select class="w-full p-2 mb-3 rounded text-black" id="kamar">
                        @forelse ($package->prices as $price)
                            <option value="{{ $price->price }}" data-nama-kamar="{{ $price->name }}">
                                {{ $price->name }} - IDR {{ number_format($price->price, 0, ',', '.') }} / Pax
                            </option>
                        @empty
                            <option value="{{ $package->price }}" data-nama-kamar="Harga Standar">
                                Harga Standar - IDR {{ number_format($package->price, 0, ',', '.') }} / Pax
                            </option>
                        @endforelse
                    </select>

                    <!-- Jumlah Pax -->
                    <label class="block text-sm mb-2">Jumlah Pax</label>
                    <input type="number" class="w-full p-2 mb-4 rounded text-black" min="1"
                        placeholder="Masukkan jumlah orang" id="jumlah" value="1">

                    <!-- Total Harga -->
                    <div class="font-bold text-lg mb-4">TOTAL : <span class="text-white" id="total">IDR 0</span>
                    </div>

                    <!-- Button Pesan -->
                    <button id="pesan-btn"
                        class="w-full bg-shafa-dark-text text-white font-bold py-2 rounded-md hover:bg-shafa-secondary transition">
                        <i class="fab fa-whatsapp mr-2"></i> PESAN SEKARANG
                    </button>
                @endif
            </div>
        </div>
    </section>

    <!-- REQUEST SECTION -->
    <section id="request" class="py-16 bg-shafa-primary mt-12">
        <div class="container mx-auto px-4 text-center text-white">
            <h2 class="text-4xl font-bold mb-4">BELUM MENEMUKAN PAKET YANG TEPAT?</h2>
            <p class="text-xl mb-8 opacity-90">Sampaikan kebutuhan ibadah Anda, biarkan kami yang merancang paket
                terbaik untuk Anda.</p>

            <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-2xl text-left">
                <form id="submit-request-form" action="#" method="POST" class="space-y-4">

                    <div>
                        <label for="nama-req" class="block text-sm font-medium text-shafa-primary">Nama
                            Lengkap</label>
                        <input type="text" id="nama-req" name="Nama" placeholder="Contoh: Ahmad Riski" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:border-shafa-secondary focus:ring-shafa-secondary text-shafa-dark-text">
                    </div>

                    <div>
                        <label for="whatsapp-req" class="block text-sm font-medium text-shafa-primary">Nomor
                            WhatsApp Aktif</label>
                        <input type="tel" id="whatsapp-req" name="WhatsApp" placeholder="Contoh: 0812xxxxxxxx"
                            required
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
                        <label for="keterangan-req" class="block text-sm font-medium text-shafa-primary">Keterangan
                            Lainnya
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

    @push('scripts')
        <script>
            @if ($package->category->slug === 'produk-lain')
                const jumlahProdukLainInput = document.getElementById('jumlah-produk-lain');
                const totalProdukLainText = document.getElementById('total-produk-lain');
                const ajukanButton = document.getElementById('ajukan-btn');

                function updateProdukLainTotal() {
                    const hargaDasar = {{ $package->price }};
                    const jumlah = parseInt(jumlahProdukLainInput.value) || 1;
                    const total = hargaDasar * jumlah;
                    totalProdukLainText.textContent = `IDR ${total.toLocaleString('id-ID')}`;
                }

                function kirimWhatsAppProdukLain() {
                    const namaProduk = "{{ $package->name }}";
                    const jenis = document.getElementById('jenis-produk-lain').value;
                    const durasi = document.getElementById('durasi-produk-lain').value;
                    const jumlah = parseInt(jumlahProdukLainInput.value) || 1;
                    const hargaSatuan = {{ $package->price }};
                    const totalHarga = hargaSatuan * jumlah;

                    const pesan = `PENGAJUAN LAYANAN ASH SHAFA

Assalamu'alaikum Admin,
Saya ingin mengajukan layanan berikut:

Nama Layanan: ${namaProduk}
Jenis: ${jenis}
Durasi: ${durasi}
Jumlah: ${jumlah}
Total Pembayaran: IDR ${totalHarga.toLocaleString('id-ID')}

Mohon info ketersediaan dan langkah selanjutnya. Terima kasih.`;

                    const encodedPesan = encodeURIComponent(pesan);
                    const nomorAdmin = "628779888989";
                    const url = `https://api.whatsapp.com/send?phone=${nomorAdmin}&text=${encodedPesan}`;
                    window.open(url, "_blank");
                }

                jumlahProdukLainInput.addEventListener('input', updateProdukLainTotal);
                ajukanButton.addEventListener('click', kirimWhatsAppProdukLain);

                updateProdukLainTotal();
            @else
                const programHariDropdown = document.getElementById('program-hari-dropdown');
                const programInput = document.getElementById('program'); // Keep if other categories use it
                const bandaraSelect = document.getElementById('bandara');
                const tanggalSelect = document.getElementById('tanggal');
                const kamarSelect = document.getElementById('kamar');
                const jumlahInput = document.getElementById('jumlah');
                const totalText = document.getElementById('total');
                const pesanButton = document.getElementById('pesan-btn');

                // Update total harga
                function updateTotal() {
                    const harga = parseFloat(kamarSelect.value) || 0;
                    const jumlah = parseInt(jumlahInput.value) || 1;
                    const total = harga * jumlah;
                    totalText.textContent = `IDR ${total.toLocaleString('id-ID')}`;
                }

                // Kirim WhatsApp
                function kirimWhatsApp() {
                    const program = programHariDropdown ? programHariDropdown.value : (programInput ? programInput.value : '');
                    const bandara = bandaraSelect.value;
                    const tanggal = tanggalSelect.options[tanggalSelect.selectedIndex].text;
                    const jumlah = parseInt(jumlahInput.value) || 1;

                    const selectedKamarOption = kamarSelect.options[kamarSelect.selectedIndex];
                    const namaKamar = selectedKamarOption.dataset.namaKamar;
                    const harga = parseFloat(selectedKamarOption.value) || 0;
                    const total = harga * jumlah;

                    const pesan = `PESANAN PAKET ASH SHAFA

Assalamu'alaikum Admin,
Saya ingin memesan paket berikut:

Program: ${program}
Bandara: ${bandara}
Tanggal: ${tanggal}
Kamar: ${namaKamar}
Jumlah Jamaah: ${jumlah} orang
Total Pembayaran: IDR ${total.toLocaleString('id-ID')}

Mohon info ketersediaan seat dan langkah selanjutnya. Terima kasih.`;

                    const encodedPesan = encodeURIComponent(pesan);
                    const nomorAdmin = "628779888989";
                    const url = `https://api.whatsapp.com/send?phone=${nomorAdmin}&text=${encodedPesan}`;
                    window.open(url, "_blank");
                }

                // Event listeners
                if (kamarSelect) kamarSelect.addEventListener('change', updateTotal);
                if (jumlahInput) jumlahInput.addEventListener('input', updateTotal);
                if (pesanButton) pesanButton.addEventListener('click', kirimWhatsApp);

                // Jalankan saat halaman dimuat
                updateTotal();
            @endif

            // Form request submission
            document.addEventListener('DOMContentLoaded', function() {
                const requestForm = document.getElementById('submit-request-form');
                const formStatus = document.getElementById('form-status');
                const submitButton = document.getElementById('submit-request');

                // PASTI BACA: GANTI URL DI BAWAH DENGAN WEB APP URL GOOGLE APPS SCRIPT ANDA
                const SCRIPT_URL =
                    'https://script.google.com/macros/s/AKfycbzgxrVZo6FfjxV2msqtjij64wfcQEyjzbxZoqRgeX6vUZLPzw1XdXULyz2KvcQ1W2Tf/exec';

                // 2. Logika Form Submission hanya dieksekusi jika form ditemukan
                if (requestForm) {
                    requestForm.addEventListener('submit', async function(event) {
                        event.preventDefault();

                        // Tampilkan status loading
                        formStatus.classList.remove('hidden', 'text-shafa-red', 'text-green-600');
                        formStatus.classList.add('text-shafa-primary');
                        formStatus.textContent = 'Sedang mengirim data...';
                        submitButton.disabled = true;

                        const formData = new FormData(requestForm);
                        const data = {};

                        // Ambil data dan tambahkan kolom 'Tanggal'
                        formData.forEach((value, key) => (data[key] = value));
                        data['Tanggal'] = new Date().toLocaleString();

                        try {
                            // KIRIM DATA KE GOOGLE APPS SCRIPT
                            const response = await fetch(SCRIPT_URL, {
                                method: 'POST',
                                mode: 'no-cors', // Penting untuk Apps Script
                                cache: 'no-cache',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify(data)
                            });

                            // Asumsikan sukses karena menggunakan no-cors
                            formStatus.classList.remove('text-shafa-primary');
                            formStatus.classList.add('text-green-600');
                            formStatus.textContent =
                                '✅ Permintaan Berhasil Dikirim! Tim kami akan segera menghubungi Anda.';
                            requestForm.reset();

                        } catch (error) {
                            // Tampilkan error jika ada masalah jaringan
                            formStatus.classList.remove('text-shafa-primary');
                            formStatus.classList.add('text-shafa-red');
                            formStatus.textContent =
                                '❌ Gagal mengirim permintaan. Silakan coba lagi atau hubungi CS langsung.';
                            console.error('Error submitting form:', error);
                        } finally {
                            submitButton.disabled = false;
                        }
                    });
                }
            });
        </script>
    @endpush
@endsection