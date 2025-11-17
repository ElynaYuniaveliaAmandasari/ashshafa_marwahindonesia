<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Category;
use App\Models\PackagePrice;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
;

class PackageController extends Controller
{
    private function getProdukLainId()
    {
        $kategori = Category::where('slug', 'produk-lain')->first();
        return $kategori ? $kategori->id : null;
    }

    private function getNonDurationCategoryIds()
    {
        $kategoriProdukLain = Category::where('slug', 'produk-lain')->first();
        $kategoriWisataReligi = Category::where('slug', 'wisata-religi')->first();

        $ids = [];
        if ($kategoriProdukLain) {
            $ids[] = $kategoriProdukLain->id;
        }
        if ($kategoriWisataReligi) {
            $ids[] = $kategoriWisataReligi->id;
        }

        return $ids;
    }

    private function getUmrohHajiCategoryIds()
    {
        return Category::whereIn('slug', ['umroh', 'umroh-plus', 'haji'])->pluck('id')->toArray();
    }

    public function index(Request $request)
    {
        $categorySlug = $request->query('category');
        $query = Package::with('category');
        $title = "Semua Paket";

        if ($categorySlug) {
            if ($categorySlug === 'umroh') {
                $query->whereHas('category', function ($q) {
                    $q->where('slug', 'umroh')->orWhere('slug', 'umroh-plus');
                });
                $title = "Paket Umroh";
            } elseif ($categorySlug === 'wisata-religi') {
                $query->whereHas('category', function ($q) {
                    $q->where('slug', 'wisata-religi')->orWhere('slug', 'umroh-plus');
                });
                $title = "Paket Wisata Religi";
            } else {
                $query->whereHas('category', function ($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                });
                $title = "Paket " . ucfirst(str_replace('-', ' ', $categorySlug));
            }
        }

        $packages = $query->latest()->get();

        return view('admin.packages.index', [
            'packages' => $packages,
            'title' => $title,
            'currentCategory' => $categorySlug
        ]);
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $currentCategory = $request->query('category');

        // Buat objek dummy prices untuk form create
        $package = (object) ['prices' => collect()];

        return view('admin.packages.create', [
            'categories' => $categories,
            'currentCategory' => $currentCategory,
            'package' => $package,
        ]);
    }

    public function store(Request $request)
    {
        $produkLainId = $this->getProdukLainId();
        $nonDurationCategoryIds = $this->getNonDurationCategoryIds();
        $umrohHajiIds = $this->getUmrohHajiCategoryIds();

        $rules = [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240', // ✅ Dinaikkan jadi 10MB
            'is_featured' => 'nullable',
            'airline' => 'nullable|string|max:255',
            'total_seats' => 'nullable|integer',
            'seats_filled' => 'nullable|integer',
            'hotel_makkah' => 'nullable|string',
            'hotel_madinah' => 'nullable|string',
            'other_hotels' => 'nullable|string',
            'attributes' => 'nullable|array',
            'attributes.jenis' => 'nullable|array',
            'attributes.jenis.*' => 'nullable|string|max:255',
            'attributes.proses' => 'nullable|array',
            'attributes.proses.*' => 'nullable|string|max:255',
            'attributes.dokumen' => 'nullable|string',
            'attributes.deskripsi_tambahan' => 'nullable|string',
            'include_items' => 'nullable|string',
            'exclude_items' => 'nullable|string',
            'prices' => 'nullable|array',
            'prices.*.name' => 'nullable|string|max:255',
            'prices.*.price' => 'nullable|integer|min:1',
        ];

        if (in_array($request->input('category_id'), $umrohHajiIds)) {
            $rules['duration_days'] = 'nullable';
            $rules['departure_date'] = 'required|string|min:1';
            $rules['departure_city'] = 'required|string';
        } else {
            $nonDurationCategoryIdsString = implode(',', $nonDurationCategoryIds);
            $rules['duration_days'] = 'required_unless:category_id,' . $nonDurationCategoryIdsString;
            $rules['departure_date'] = 'required_unless:category_id,' . $nonDurationCategoryIdsString . '|nullable|string';
            $rules['departure_city'] = 'required_unless:category_id,' . $nonDurationCategoryIdsString . '|nullable|string';
        }

        if ($request->input('category_id') == $produkLainId) {
            $rules['attributes.jenis'] = 'required|array';
            $rules['attributes.proses'] = 'required|array';
        }

        // Membersihkan format harga sebelum validasi
        $request->merge([
            'price' => preg_replace('/[^\d]/', '', $request->input('price', 0))
        ]);

        // Membersihkan harga dalam array prices
        if ($request->has('prices')) {
            $cleanedPrices = [];
            foreach ($request->input('prices') as $index => $price) {
                $cleanedPrices[$index] = $price;
                if (isset($price['price'])) {
                    $cleanedPrices[$index]['price'] = preg_replace('/[^\d]/', '', $price['price']);
                }
            }
            $request->merge(['prices' => $cleanedPrices]);
        }

        // Membersihkan departure date untuk memastikan format yang konsisten
        if ($request->has('departure_date')) {
            $departureDate = $request->input('departure_date');
            if (!empty($departureDate)) {
                // Jika berupa string yang dipisahkan koma, pastikan formatnya benar
                $request->merge([
                    'departure_date' => trim($departureDate)
                ]);
            }
        }

        $validated = $request->validate($rules);

        // FILTER PRICES: Hanya simpan yang terisi lengkap
        $filteredPrices = [];
        if ($request->has('prices')) {
            foreach ($request->input('prices') as $priceData) {
                if (!empty($priceData['name']) && !empty($priceData['price'])) {
                    $filteredPrices[] = $priceData;
                }
            }
        }

        // ✅ UPLOAD DAN COMPRESS GAMBAR (TANPA INTERVENTION IMAGE)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.jpg';
            $path = 'assets/img/packages/' . $filename;
            $fullPath = storage_path('app/public/' . $path);

            // Buat direktori jika belum ada
            if (!file_exists(dirname($fullPath))) {
                mkdir(dirname($fullPath), 0755, true);
            }

            // Load gambar
            $imageInfo = getimagesize($image->getRealPath());
            $mime = $imageInfo['mime'];

            switch ($mime) {
                case 'image/jpeg':
                    $img = imagecreatefromjpeg($image->getRealPath());
                    break;
                case 'image/png':
                    $img = imagecreatefrompng($image->getRealPath());
                    break;
                case 'image/webp':
                    $img = imagecreatefromwebp($image->getRealPath());
                    break;
                default:
                    $img = imagecreatefromjpeg($image->getRealPath());
            }

            // Get dimensi asli
            $width = imagesx($img);
            $height = imagesy($img);

            // Resize jika terlalu besar (max width 1200px)
            if ($width > 1200) {
                $newWidth = 1200;
                $newHeight = ($height / $width) * $newWidth;
                $resized = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($resized, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                imagedestroy($img);
                $img = $resized;
            }

            // Save dengan kualitas 80%
            imagejpeg($img, $fullPath, 80);
            imagedestroy($img);

            $imagePath = $path;
        }

        $package = Package::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
            'price' => $validated['price'],
            'image_url' => $imagePath,
            'is_featured' => $request->has('is_featured'),
            'departure_date' => !empty($validated['departure_date']) ? $validated['departure_date'] : null,
            'duration_days' => $validated['duration_days'] ?? null,
            'airline' => $validated['airline'] ?? null,
            'departure_city' => $validated['departure_city'] ?? null,
            'hotel_makkah' => $validated['hotel_makkah'] ?? null,
            'hotel_madinah' => $validated['hotel_madinah'] ?? null,
            'other_hotels' => $validated['other_hotels'] ?? null,
            'total_seats' => $validated['total_seats'] ?? 0,
            'seats_filled' => $validated['seats_filled'] ?? 0,
            'attributes' => $this->filterAttributes($request, $produkLainId),
            'include_items' => $validated['include_items'] ? trim($validated['include_items']) : null,
            'exclude_items' => $validated['exclude_items'] ? trim($validated['exclude_items']) : null,
        ]);

        // SIMPAN HARGA KAMAR YANG SUDAH DIFILTER
        if (!empty($filteredPrices)) {
            $package->prices()->createMany($filteredPrices);
        }

        $redirectUrl = route('admin.packages.index');
        if ($request->has('return_filter') && $request->return_filter != '') {
            $redirectUrl = route('admin.packages.index', ['category' => $request->return_filter]);
        }

        return redirect($redirectUrl)->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit(Request $request, string $id)
    {
        $package = Package::with('prices')->findOrFail($id);
        $categories = Category::all();
        $currentCategory = $request->query('category');

        return view('admin.packages.edit', [
            'package' => $package,
            'categories' => $categories,
            'currentCategory' => $currentCategory
        ]);
    }

    public function update(Request $request, string $id)
    {
        $package = Package::findOrFail($id);
        $produkLainId = $this->getProdukLainId();
        $nonDurationCategoryIds = $this->getNonDurationCategoryIds();
        $umrohHajiIds = $this->getUmrohHajiCategoryIds();

        $rules = [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240', // ✅ Dinaikkan jadi 10MB
            'is_featured' => 'nullable',
            'departure_date' => 'required_unless:category_id,' . implode(',', $nonDurationCategoryIds) . '|nullable|string',
            'airline' => 'nullable|string|max:255',
            'departure_city' => 'required_unless:category_id,' . implode(',', $nonDurationCategoryIds),
            'total_seats' => 'required_unless:category_id,' . implode(',', $nonDurationCategoryIds),
            'seats_filled' => 'required_unless:category_id,' . implode(',', $nonDurationCategoryIds),
            'hotel_makkah' => 'nullable|string',
            'hotel_madinah' => 'nullable|string',
            'other_hotels' => 'nullable|string',
            'attributes' => 'nullable|array',
            'attributes.bandara_alternatif' => 'nullable|string',
            'attributes.tanggal_alternatif' => 'nullable|string',
            'attributes.jenis' => 'required_if:category_id,' . $produkLainId . '|array',
            'attributes.jenis.*' => 'nullable|string|max:255',
            'attributes.proses' => 'required_if:category_id,' . $produkLainId . '|array',
            'attributes.proses.*' => 'nullable|string|max:255',
            'attributes.dokumen' => 'nullable|string',
            'attributes.deskripsi_tambahan' => 'nullable|string',
            'attributes.program_hari_options' => 'nullable|array',
            'attributes.program_hari_options.*' => 'nullable|string|max:255',
            'include_items' => 'nullable|string',
            'exclude_items' => 'nullable|string',
            'prices' => 'nullable|array',
            'prices.*.name' => 'nullable|string|max:255',
            'prices.*.price' => 'nullable|integer|min:1',
            'prices.*.id' => 'nullable|exists:package_prices,id',
        ];

        if (in_array($request->input('category_id'), $umrohHajiIds)) {
            $rules['duration_days'] = 'nullable';
        } else {
            $rules['duration_days'] = 'required_unless:category_id,' . implode(',', $nonDurationCategoryIds);
        }

        // Membersihkan format harga sebelum validasi
        $request->merge([
            'price' => preg_replace('/[^\d]/', '', $request->input('price', 0))
        ]);

        // Membersihkan harga dalam array prices
        if ($request->has('prices')) {
            $cleanedPrices = [];
            foreach ($request->input('prices') as $index => $price) {
                $cleanedPrices[$index] = $price;
                if (isset($price['price'])) {
                    $cleanedPrices[$index]['price'] = preg_replace('/[^\d]/', '', $price['price']);
                }
            }
            $request->merge(['prices' => $cleanedPrices]);
        }

        // Membersihkan departure date untuk memastikan format yang konsisten
        if ($request->has('departure_date')) {
            $departureDate = $request->input('departure_date');
            if (!empty($departureDate)) {
                // Jika berupa string yang dipisahkan koma, pastikan formatnya benar
                $request->merge([
                    'departure_date' => trim($departureDate)
                ]);
            }
        }

        $validated = $request->validate($rules);

        // FILTER PRICES: Hanya proses yang terisi lengkap (name DAN price)
        $filteredPrices = [];
        if ($request->has('prices')) {
            foreach ($request->input('prices') as $priceData) {
                if (!empty($priceData['name']) && !empty($priceData['price'])) {
                    $filteredPrices[] = $priceData;
                }
            }
        }

        // Generate unique slug
        $baseSlug = Str::slug($validated['name']);
        $slug = $baseSlug;
        $count = 1;

        while (Package::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        // Update data utama paket
        $updateData = [
            'name' => $validated['name'],
            'slug' => $slug,
            'category_id' => $validated['category_id'],
            'price' => $validated['price'],
            'is_featured' => $request->has('is_featured'),
            'departure_date' => !empty($validated['departure_date']) ? $validated['departure_date'] : null,
            'duration_days' => $validated['duration_days'] ?? null,
            'airline' => $validated['airline'] ?? null,
            'departure_city' => $validated['departure_city'] ?? null,
            'hotel_makkah' => $validated['hotel_makkah'] ?? null,
            'hotel_madinah' => $validated['hotel_madinah'] ?? null,
            'other_hotels' => $validated['other_hotels'] ?? null,
            'total_seats' => $validated['total_seats'] ?? 0,
            'seats_filled' => $validated['seats_filled'] ?? 0,
            'include_items' => $validated['include_items'] ? trim($validated['include_items']) : null,
            'exclude_items' => $validated['exclude_items'] ? trim($validated['exclude_items']) : null,
        ];

        // Atur attributes berdasarkan kategori
        if ($validated['category_id'] == $produkLainId) {
            $updateData['attributes'] = $this->filterAttributes($request, $produkLainId);
        } else {
            $updateData['attributes'] = $this->filterAttributes($request, $produkLainId);
        }

        // ✅ UPDATE GAMBAR JIKA ADA (TANPA INTERVENTION IMAGE)
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($package->image_url) {
                Storage::disk('public')->delete($package->image_url);
            }

            // Upload dan compress gambar baru
            $image = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.jpg';
            $path = 'assets/img/packages/' . $filename;
            $fullPath = storage_path('app/public/' . $path);

            // Buat direktori jika belum ada
            if (!file_exists(dirname($fullPath))) {
                mkdir(dirname($fullPath), 0755, true);
            }

            // Load gambar
            $imageInfo = getimagesize($image->getRealPath());
            $mime = $imageInfo['mime'];

            switch ($mime) {
                case 'image/jpeg':
                    $img = imagecreatefromjpeg($image->getRealPath());
                    break;
                case 'image/png':
                    $img = imagecreatefrompng($image->getRealPath());
                    break;
                case 'image/webp':
                    $img = imagecreatefromwebp($image->getRealPath());
                    break;
                default:
                    $img = imagecreatefromjpeg($image->getRealPath());
            }

            // Get dimensi asli
            $width = imagesx($img);
            $height = imagesy($img);

            // Resize jika terlalu besar (max width 1200px)
            if ($width > 1200) {
                $newWidth = 1200;
                $newHeight = ($height / $width) * $newWidth;
                $resized = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($resized, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                imagedestroy($img);
                $img = $resized;
            }

            // Save dengan kualitas 80%
            imagejpeg($img, $fullPath, 80);
            imagedestroy($img);

            $updateData['image_url'] = $path;
        }

        $package->update($updateData);

        // UPDATE HARGA KAMAR (MENGGUNAKAN FILTERED PRICES)
        $existingPrices = $package->prices->keyBy('id');
        $updatedPriceIds = [];

        foreach ($filteredPrices as $priceData) {
            if (isset($priceData['id']) && $existingPrices->has($priceData['id'])) {
                // Update harga yang sudah ada
                $package->prices()->where('id', $priceData['id'])->update([
                    'name' => $priceData['name'],
                    'price' => $priceData['price']
                ]);
                $updatedPriceIds[] = $priceData['id'];
            } else {
                // Tambah harga baru
                $newPrice = $package->prices()->create([
                    'name' => $priceData['name'],
                    'price' => $priceData['price']
                ]);
                $updatedPriceIds[] = $newPrice->id;
            }
        }

        // Hapus harga yang tidak ada di filtered prices
        $package->prices()->whereNotIn('id', $updatedPriceIds)->delete();

        $redirectUrl = route('admin.packages.index');
        if ($request->has('return_filter') && $request->return_filter != '') {
            $redirectUrl = route('admin.packages.index', ['category' => $request->return_filter]);
        }

        return redirect($redirectUrl)->with('success', 'Paket berhasil diperbarui!');
    }

    public function show($slug)
    {
        $package = Package::where('slug', $slug)->with('prices')->firstOrFail();
        return view('pages.detail-paket', [
            'package' => $package
        ]);
    }

    public function destroy(string $id)
    {
        $package = Package::findOrFail($id);
        if ($package->image_url) {
            Storage::disk('public')->delete($package->image_url);
        }
        $package->delete();

        return redirect()->back()->with('success', 'Paket berhasil dihapus!');
    }

    private function filterAttributes(Request $request, $produkLainId)
    {
        $attributes = $request->input('attributes', []);

        if ($request->input('category_id') == $produkLainId) {
            // Filter out empty 'jenis' and 'proses' entries
            if (isset($attributes['jenis'])) {
                $attributes['jenis'] = array_values(array_filter($attributes['jenis']));
            }
            if (isset($attributes['proses'])) {
                $attributes['proses'] = array_values(array_filter($attributes['proses']));
            }
        } else {
            // For other categories, clear 'jenis', 'proses', and 'proses_pembuatan'
            unset($attributes['jenis']);
            unset($attributes['proses']);
            unset($attributes['proses_pembuatan']);
        }

        // Filter 'program_hari_options' for non-produk-lain categories
        if ($request->input('category_id') != $produkLainId) {
            if (isset($attributes['program_hari_options'])) {
                $attributes['program_hari_options'] = array_values(array_filter($attributes['program_hari_options']));
            }
        } else {
            unset($attributes['program_hari_options']);
        }

        return $attributes;
    }
}
