@extends('layouts.admin')
@section('title', 'Edit Paket: ' . $package->name)
@section('page_title', 'Manajemen Paket')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit: {{ $package->name }}</h2>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>Whoops! Ada beberapa masalah:</strong>
                            <ul class="mt-2 mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.packages.update', $package->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="return_filter" value="{{ $currentCategory }}">

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="name">Nama Paket</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $package->name) }}" required autocomplete="name">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Kategori Paket</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" data-slug="{{ $category->slug }}"
                                                {{ old('category_id', $package->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Harga Standar (Diambil jika Harga Kamar Kosong)</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{ old('price', $package->price) }}" placeholder="30.500.000" required
                                        autocomplete="off">
                                </div>

                                <div id="price-list-fields" class="border p-3 rounded mt-4">
                                    <h5 class="mb-3">Opsi Harga Kamar Quad (1 kamar ber-4), Triple (1 kamar ber-3),
                                        Double (1 kamar ber-2)</h5>
                                    <div id="price-container">
                                        @forelse (old('prices', $package->prices) as $index => $price)
                                            @php
                                                $name = is_object($price) ? $price->name : $price['name'];
                                                $price_val = is_object($price) ? $price->price : $price['price'];
                                                $id = is_object($price) ? $price->id : $price['id'] ?? null;
                                            @endphp
                                            <div class="row price-item mb-2 border-bottom pb-2">
                                                <input type="hidden" name="prices[{{ $index }}][id]"
                                                    value="{{ $id }}">
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control"
                                                        name="prices[{{ $index }}][name]"
                                                        value="{{ $name }}"
                                                        placeholder="Nama Kamar (Quad (1 kamar ber-4)/Triple (1 kamar ber-3)/Double (1 kamar ber-2))">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control price-input"
                                                        name="prices[{{ $index }}][price]"
                                                        value="{{ $price_val }}" placeholder="30.500.000">
                                                </div>
                                                <div class="col-md-2 text-right">
                                                    <button type="button"
                                                        class="btn btn-danger remove-price-field">Hapus</button>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="row price-item mb-2 border-bottom pb-2">
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="prices[0][name]"
                                                        placeholder="Nama Kamar (Quad (1 kamar ber 3)/Triple (1 kamar ber-3)/Double (1 kamar ber-2))">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control price-input"
                                                        name="prices[0][price]" placeholder="30.500.000">
                                                </div>
                                                <div class="col-md-2 text-right">
                                                    <button type="button" class="btn btn-danger remove-price-field"
                                                        disabled>Hapus</button>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <button type="button" id="add-price-field" class="btn btn-sm btn-success mt-2">
                                        + Tambah Opsi Harga
                                    </button>
                                </div>

                                <div id="paket-wisata-fields" class="border p-3 rounded mt-4">
                                    <h5 class="mb-3">Detail Paket Wisata</h5>

                                    <!-- Ganti bagian Tanggal Keberangkatan -->
                                    <div class="form-group">
                                        <label for="departure_date">Tanggal Keberangkatan</label>
                                        <input type="hidden" id="departure_date" name="departure_date"
                                            value="{{ old('departure_date', $package->departure_date) }}">

                                        <div id="date-picker-container" class="border rounded p-3 bg-light">
                                            <div id="selected-dates" class="mb-3">
                                                <strong>Tanggal Terpilih:</strong>
                                                <div id="date-tags" class="mt-2"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="date" id="date-input" class="form-control mb-2">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="seat-input" class="form-control mb-2"
                                                        placeholder="Total Seat" min="1">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" id="add-date-btn"
                                                        class="btn btn-sm btn-primary w-100">
                                                        <i class="mdi mdi-plus"></i> Tambah
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">Masukkan tanggal dan total seat untuk setiap
                                            keberangkatan.</small>
                                    </div>
                                    <div class="form-group border p-3 rounded mb-3">
                                        <label class="d-block mb-2">Program Hari (Contoh: 12 Hari)</label>
                                        <div id="program-hari-container">
                                            @forelse (old('attributes.program_hari_options', (array)($package->attributes['program_hari_options'] ?? [])) as $index => $programHari)
                                                <div class="input-group mb-2 program-hari-item">
                                                    <input type="text" class="form-control"
                                                        name="attributes[program_hari_options][{{ $index }}]"
                                                        value="{{ $programHari }}" placeholder="Contoh: Umroh 12 Hari">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-danger remove-program-hari-field"
                                                            type="button">Hapus</button>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="input-group mb-2 program-hari-item">
                                                    <input type="text" class="form-control"
                                                        name="attributes[program_hari_options][0]"
                                                        placeholder="Contoh: Umroh 12 Hari">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-danger remove-program-hari-field"
                                                            type="button" disabled>Hapus</button>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                        <button type="button" id="add-program-hari-field"
                                            class="btn btn-sm btn-success mt-2">
                                            + Tambah Program Hari
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <label for="airline">Maskapai</label>
                                        <input type="text" class="form-control" id="airline" name="airline"
                                            value="{{ old('airline', $package->airline) }}"
                                            placeholder="Contoh: Emirates, Saudia Airlines" autocomplete="airline">
                                        <small class="form-text text-muted">Hanya masukkan nama Maskapai utama.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="departure_city">Kota Keberangkatan</label>
                                        <input type="hidden" id="departure_city" name="departure_city"
                                            value="{{ old('departure_city', $package->departure_city) }}">

                                        <div id="city-picker-container" class="border rounded p-3 bg-light">
                                            <div id="selected-cities" class="mb-3">
                                                <strong>Kota Terpilih:</strong>
                                                <div id="city-tags" class="mt-2"></div>
                                            </div>
                                            <input type="text" id="city-input" class="form-control mb-2"
                                                placeholder="Contoh: JUANDA (SUB)">
                                            <button type="button" id="add-city-btn" class="btn btn-sm btn-primary">
                                                <i class="mdi mdi-plus"></i> Tambah Kota
                                            </button>
                                        </div>
                                        <small class="form-text text-muted">Tambahkan multiple kota keberangkatan jika
                                            tersedia.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="hotel_makkah">Hotel Makkah</label>
                                        <input type="text" class="form-control" id="hotel_makkah" name="hotel_makkah"
                                            value="{{ old('hotel_makkah', $package->hotel_makkah) }}" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="hotel_madinah">Hotel Madinah</label>
                                        <input type="text" class="form-control" id="hotel_madinah"
                                            name="hotel_madinah"
                                            value="{{ old('hotel_madinah', $package->hotel_madinah) }}"
                                            autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="other_hotels">Hotel Lainnya (jika 'Plus')</label>
                                        <input type="text" class="form-control" id="other_hotels" name="other_hotels"
                                            value="{{ old('other_hotels', $package->other_hotels) }}" autocomplete="off">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="total_seats">Total Seat</label>
                                                <input type="number" class="form-control" id="total_seats"
                                                    name="total_seats"
                                                    value="{{ old('total_seats', $package->total_seats) }}"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="seats_filled">Seat Terisi</label>
                                                <input type="number" class="form-control" id="seats_filled"
                                                    name="seats_filled"
                                                    value="{{ old('seats_filled', $package->seats_filled) }}"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="produk-lain-fields" class="border p-3 rounded mt-4">
                                    <h5 class="mb-3">Detail Produk Lain</h5>

                                    <div class="form-group border p-3 rounded mb-3">
                                        <label class="d-block mb-2">Jenis Layanan (Wajib)</label>
                                        <div id="jenis-layanan-container">
                                            @forelse ((array)old('attributes.jenis', $package->attributes['jenis'] ?? []) as $index => $jenis)
                                                <div class="input-group mb-2 jenis-item">
                                                    <input type="text" class="form-control"
                                                        name="attributes[jenis][{{ $index }}]"
                                                        value="{{ $jenis }}" placeholder="Contoh: Visa Umroh">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-danger remove-jenis-field"
                                                            type="button">Hapus</button>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="input-group mb-2 jenis-item">
                                                    <input type="text" class="form-control"
                                                        name="attributes[jenis][0]" placeholder="Contoh: Visa Umroh">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-danger remove-jenis-field"
                                                            type="button" disabled>Hapus</button>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                        <button type="button" id="add-jenis-field" class="btn btn-sm btn-success mt-2">
                                            + Tambah Jenis Layanan
                                        </button>
                                    </div>

                                    <div class="form-group border p-3 rounded mb-3">
                                        <label class="d-block mb-2">Durasi Proses (Wajib)</label>
                                        <div id="durasi-proses-container">
                                            @forelse ((array)old('attributes.proses', $package->attributes['proses'] ?? []) as $index => $proses)
                                                <div class="input-group mb-2 durasi-item">
                                                    <input type="text" class="form-control"
                                                        name="attributes[proses][{{ $index }}]"
                                                        value="{{ $proses }}" placeholder="Contoh: 30 Hari Kerja">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-danger remove-durasi-field"
                                                            type="button">Hapus</button>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="input-group mb-2 durasi-item">
                                                    <input type="text" class="form-control"
                                                        name="attributes[proses][0]" placeholder="Contoh: 30 Hari Kerja">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-danger remove-durasi-field"
                                                            type="button" disabled>Hapus</button>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                        <button type="button" id="add-durasi-field" class="btn btn-sm btn-success mt-2">
                                            + Tambah Durasi Proses
                                        </button>
                                    </div>

                                    <div class="form-group">
                                        <label for="attributes_proses_pembuatan">Proses Pembuatan (Contoh: 3 – 7 Hari
                                            Kerja)</label>
                                        <input type="text" class="form-control" id="attributes_proses_pembuatan"
                                            name="attributes[proses_pembuatan]"
                                            value="{{ old('attributes.proses_pembuatan', $package->attributes['proses_pembuatan'] ?? '') }}"
                                            placeholder="Contoh: 3 – 7 Hari Kerja">
                                    </div>

                                    <div class="form-group">
                                        <label for="attributes_dokumen">Dokumen (Wajib)</label>
                                        <input type="text" class="form-control" id="attributes_dokumen"
                                            name="attributes[dokumen]"
                                            value="{{ old('attributes.dokumen', $package->attributes['dokumen'] ?? '') }}"
                                            placeholder="Contoh: Dokumen: Paspor, Foto, KTP">
                                    </div>
                                    <div class="form-group">
                                        <label for="attributes_deskripsi_tambahan">Deskripsi Tambahan (Opsional)</label>
                                        <textarea class="form-control" id="attributes_deskripsi_tambahan" name="attributes[deskripsi_tambahan]"
                                            rows="3" placeholder="Contoh: Bantuan penuh selama proses pengajuan">{{ old('attributes.deskripsi_tambahan', $package->attributes['deskripsi_tambahan'] ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card card-default shadow-none border">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="image">Upload Gambar/Brosur (Opsional)</label>
                                            <input type="file" class="form-control-file" id="image"
                                                name="image">
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah
                                                gambar.</small>
                                            <p class="mt-2 font-weight-bold">Gambar Saat Ini:</p>
                                            <img src="{{ asset('storage/' . $package->image_url) }}"
                                                alt="Gambar saat ini" class="img-fluid rounded shadow-sm"
                                                style="max-width: 200px;">
                                        </div>

                                        <hr class="my-4">

                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="is_featured"
                                                name="is_featured" value="1"
                                                {{ old('is_featured', $package->is_featured) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="is_featured">Tampilkan di "Paket
                                                Unggulan Pilihan" Homepage?</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="include_items">Include (Baris baru gunakan Enter)</label>
                                            <textarea class="form-control" id="include_items" name="include_items" rows="5"
                                                placeholder="Contoh:&#10;Perlengkapan Umroh&#10;Tiket Pesawat PP&#10;Akomodasi Hotel">{{ old('include_items', $package->include_items) }}</textarea>
                                            <small class="form-text text-muted">Masukkan setiap item dalam baris
                                                baru.</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="exclude_items">Exclude (Baris baru gunakan Enter)</label>
                                            <textarea class="form-control" id="exclude_items" name="exclude_items" rows="5"
                                                placeholder="Contoh:&#10;Passport&#10;Keperluan Pribadi&#10;Tour di luar program">{{ old('exclude_items', $package->exclude_items) }}</textarea>
                                            <small class="form-text text-muted">Masukkan setiap item dalam baris
                                                baru.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">
                        <button type="submit" class="btn btn-primary btn-pill w-100">Perbarui Paket</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // ========== FORMAT HARGA OTOMATIS ==========
        function formatRupiah(angka, prefix = '') {
            const number_string = angka.replace(/[^,\d]/g, '').toString();
            const split = number_string.split(',');
            const sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                const separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }

        // Format input harga standar
        const priceInput = document.getElementById('price');

        // Format nilai awal (jika sudah ada)
        if (priceInput.value) {
            priceInput.value = formatRupiah(priceInput.value);
        }

        priceInput.addEventListener('keyup', function(e) {
            priceInput.value = formatRupiah(this.value);
        });

        // Format input harga kamar (dinamis)
        document.getElementById('price-container').addEventListener('keyup', function(e) {
            if (e.target.matches('input.price-input')) {
                e.target.value = formatRupiah(e.target.value);
            }
        });

        // Format harga kamar yang sudah ada saat load
        document.querySelectorAll('input.price-input').forEach(input => {
            if (input.value) {
                input.value = formatRupiah(input.value);
            }
        });

        // Hapus format sebelum submit (agar tetap angka di database)
        document.querySelector('form').addEventListener('submit', function(e) {
            // Harga standar
            const priceValue = priceInput.value.replace(/\./g, '');
            if (priceValue) {
                priceInput.value = parseInt(priceValue) || 0;
            }

            // Harga kamar
            document.querySelectorAll('input.price-input').forEach(input => {
                const priceValue = input.value.replace(/\./g, '');
                if (priceValue) {
                    input.value = parseInt(priceValue) || 0;
                }
            });
        });
    </script>
    <script>
        // ========== PRICE FIELDS ==========
        let priceIndex = 0;

        function addPriceField(id = null, name = '', price = '') {
            const priceContainer = document.getElementById('price-container');
            const index = priceIndex++;
            const newPriceDiv = document.createElement('div');
            newPriceDiv.classList.add('row', 'price-item', 'mb-2', 'border-bottom', 'pb-2');

            const idInput = id ? `<input type="hidden" name="prices[${index}][id]" value="${id}">` : '';

            newPriceDiv.innerHTML = `
                ${idInput}
                <div class="col-md-5">
                    <input type="text" class="form-control" id="price_name_${index}" name="prices[${index}][name]" value="${name}" placeholder="Nama Kamar (Quad/Triple/Double)">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control price-input" id="price_price_${index}" name="prices[${index}][price]" value="${price}" placeholder="30.500.000">
                </div>
                <div class="col-md-2 text-right">
                    <button type="button" class="btn btn-danger remove-price-field">Hapus</button>
                </div>
            `;
            priceContainer.appendChild(newPriceDiv);
            updateRemoveButtons();
        }

        function updateRemoveButtons() {
            const items = document.querySelectorAll('.price-item');
            items.forEach(item => {
                const removeButton = item.querySelector('.remove-price-field');
                if (removeButton) {
                    removeButton.disabled = items.length <= 1;
                }
            });
        }


        // ========== MULTIPLE DATE PICKER ==========
        let selectedDates = [];

        function initializeDates() {
            // Mengambil nilai lama dari database atau old input
            const initialDatesString = document.getElementById('departure_date').value;
            if (initialDatesString) {
                selectedDates = initialDatesString.split(',').map(d => d.trim()).filter(d => d);
            }
            renderDateTags();
        }

        function renderDateTags() {
            const container = document.getElementById('date-tags');
            container.innerHTML = '';

            if (selectedDates.length === 0) {
                container.innerHTML = '<span class="text-muted">Belum ada tanggal dipilih</span>';
                return;
            }

            selectedDates.forEach((date, index) => {
                const tag = document.createElement('span');
                tag.className = 'badge badge-primary mr-2 mb-2 p-2';
                tag.style.fontSize = '14px';
                tag.innerHTML = `
                    ${formatDate(date)}
                    <button type="button" class="btn btn-sm ml-2 p-0" style="color: white; border: none; background: transparent;" onclick="removeDate(${index})">
                        ×
                    </button>
                `;
                container.appendChild(tag);
            });

            document.getElementById('departure_date').value = selectedDates.join(',');
        }

        function formatDate(dateStr) {
            const date = new Date(dateStr);
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return date.toLocaleDateString('id-ID', options);
        }

        function removeDate(index) {
            selectedDates.splice(index, 1);
            renderDateTags();
        }


        // ========== MULTIPLE CITY PICKER ==========
        let selectedCities = [];

        function initializeCities() {
            // Mengambil nilai lama dari database atau old input
            const initialCitiesString = document.getElementById('departure_city').value;
            if (initialCitiesString) {
                selectedCities = initialCitiesString.split(',').map(c => c.trim()).filter(c => c);
            }
            renderCityTags();
        }

        function renderCityTags() {
            const container = document.getElementById('city-tags');
            container.innerHTML = '';

            if (selectedCities.length === 0) {
                container.innerHTML = '<span class="text-muted">Belum ada kota dipilih</span>';
                return;
            }

            selectedCities.forEach((city, index) => {
                const tag = document.createElement('span');
                tag.className = 'badge badge-info mr-2 mb-2 p-2';
                tag.style.fontSize = '14px';
                tag.innerHTML = `
                    ${city}
                    <button type="button" class="btn btn-sm ml-2 p-0" style="color: white; border: none; background: transparent;" onclick="removeCity(${index})">
                        ×
                    </button>
                `;
                container.appendChild(tag);
            });

            document.getElementById('departure_city').value = selectedCities.join(',');
        }

        function removeCity(index) {
            selectedCities.splice(index, 1);
            renderCityTags();
        }


        // ========== Program Hari Fields (FIXED) ==========
        let programHariIndex = 0; // Akan diinisialisasi di DOMContentLoaded

        function addProgramHariField(value = '') {
            const container = document.getElementById('program-hari-container');
            const index = programHariIndex++; // Menggunakan index saat ini, lalu naikkan
            const newDiv = document.createElement('div');
            newDiv.classList.add('input-group', 'mb-2', 'program-hari-item');
            newDiv.innerHTML = `
                <input type="text" class="form-control" name="attributes[program_hari_options][${index}]" value="${value}" placeholder="Contoh: Umroh 12 Hari">
                <div class="input-group-append">
                    <button class="btn btn-outline-danger remove-program-hari-field" type="button">Hapus</button>
                </div>
            `;
            container.appendChild(newDiv);
            updateRemoveButtonsProgramHari();
        }

        function updateRemoveButtonsProgramHari() {
            const container = document.getElementById('program-hari-container');
            if (!container) return;
            const items = container.querySelectorAll('.program-hari-item');
            items.forEach(item => {
                const removeButton = item.querySelector('.remove-program-hari-field');
                if (removeButton) {
                    removeButton.disabled = items.length <= 1;
                }
            });
        }

        // ========== DOM CONTENT LOADED ==========
        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.getElementById('category_id');
            const wisataFields = document.getElementById('paket-wisata-fields');
            const produkFields = document.getElementById('produk-lain-fields');
            const priceListFields = document.getElementById('price-list-fields');
            const addPriceButton = document.getElementById('add-price-field');

            // --- INISIALISASI HARGA ---
            const initialPrices = @json(old('prices', $package->prices->toArray()));
            if (initialPrices.length > 0) {
                // Reset index dan hapus field kosong awal
                priceIndex = 0;
                document.querySelectorAll('.price-item').forEach(item => item.remove());
                initialPrices.forEach(price => {
                    addPriceField(price.id, price.name, price.price);
                });
            } else {
                // Jika tidak ada harga, pastikan satu field kosong ada (diasumsikan sudah di-render oleh blade)
            }
            updateRemoveButtons(); // Panggil ulang untuk mengoreksi state tombol hapus

            // --- INISIALISASI PROGRAM HARI (FIXED) ---
            // Ambil array program hari dari database/old input untuk menentukan jumlah item yang sudah ada
            const existingProgramHariItems = document.querySelectorAll(
                '#program-hari-container .program-hari-item');
            if (existingProgramHariItems.length > 0) {
                // Ambil index tertinggi dari name attribute yang sudah ada
                let maxIndex = -1;
                existingProgramHariItems.forEach(item => {
                    const input = item.querySelector('input[name^="attributes[program_hari_options]"]');
                    if (input) {
                        const match = input.name.match(/\[(\d+)\]/);
                        if (match) {
                            const currentIndex = parseInt(match[1]);
                            if (currentIndex > maxIndex) {
                                maxIndex = currentIndex;
                            }
                        }
                    }
                });
                // Set index berikutnya (tertinggi + 1)
                programHariIndex = maxIndex + 1;
            } else {
                // Jika tidak ada item sama sekali, mulai dari 0
                programHariIndex = 0;
            }

            updateRemoveButtonsProgramHari();


            // --- EVENT LISTENERS ---

            // Price field handlers
            document.getElementById('price-container').addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-price-field')) {
                    e.target.closest('.price-item').remove();
                    updateRemoveButtons();
                }
            });
            addPriceButton.addEventListener('click', () => addPriceField());


            // Date picker handler
            document.getElementById('add-date-btn').addEventListener('click', function() {
                const dateInput = document.getElementById('date-input');
                const dateValue = dateInput.value;

                if (!dateValue) {
                    alert('Pilih tanggal terlebih dahulu!');
                    return;
                }

                if (selectedDates.includes(dateValue)) {
                    alert('Tanggal sudah dipilih!');
                    return;
                }

                selectedDates.push(dateValue);
                selectedDates.sort();
                renderDateTags();
                dateInput.value = '';
            });


            // City picker handler
            document.getElementById('add-city-btn').addEventListener('click', function() {
                const cityInput = document.getElementById('city-input');
                const cityValue = cityInput.value.trim();

                if (!cityValue) {
                    alert('Masukkan nama kota terlebih dahulu!');
                    return;
                }

                if (selectedCities.includes(cityValue)) {
                    alert('Kota sudah dipilih!');
                    return;
                }

                selectedCities.push(cityValue);
                renderCityTags();
                cityInput.value = '';
            });


            // Program Hari handlers
            document.getElementById('add-program-hari-field').addEventListener('click', () =>
                addProgramHariField());
            document.getElementById('program-hari-container').addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-program-hari-field')) {
                    e.target.closest('.program-hari-item').remove();
                    updateRemoveButtonsProgramHari();
                }
            });


            // Toggle form fields based on category
            function toggleFormFields() {
                const selectedOption = categorySelect.options[categorySelect.selectedIndex];
                const selectedSlug = selectedOption ? selectedOption.dataset.slug : '';

                if (selectedSlug === 'produk-lain') {
                    wisataFields.style.display = 'none';
                    produkFields.style.display = 'block';
                    priceListFields.style.display = 'none';
                } else {
                    wisataFields.style.display = 'block';
                    produkFields.style.display = 'none';
                    priceListFields.style.display = 'block';
                }
            }

            categorySelect.addEventListener('change', toggleFormFields);
            toggleFormFields();

            // Initialize dates and cities
            initializeDates();
            initializeCities();
        });
    </script>
@endsection