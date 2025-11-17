<?php

// --- IMPORTS ---
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\AuthController;
use App\Models\Package;
use App\Http\Controllers\Admin\JamaahGrowthController;
use App\Http\Controllers\PageController;

/*
 |--------------------------------------------------------------------------
 | Web Routes
 |--------------------------------------------------------------------------
 */

// --- RUTE PUBLIK (WEBSITE) ---

// Rute Halaman Utama (Homepage)
Route::get('/', function () {
    $featuredPackages = Package::where('is_featured', true)
        ->orderBy('departure_date', 'asc')
        ->take(4)
        ->get();
    return view('index', [
        'featuredPackages' => $featuredPackages
    ]);
});

// Rute Halaman Umroh
Route::get('/pages/umrah', function () {
    $umrahPackages = \App\Models\Package::whereHas('category', function ($query) {
        $query->where('slug', 'umroh')
            ->orWhere('slug', 'umroh-plus');
    })
        ->orderBy('departure_date', 'asc')
        ->get();
    return view('pages.umrah', [
        'umrahPackages' => $umrahPackages
    ]);
});

// Rute Halaman Haji
Route::get('/pages/haji', function () {
    $hajiPackages = \App\Models\Package::whereHas('category', function ($query) {
        $query->where('slug', 'haji');
    })
        ->orderBy('departure_date', 'asc')
        ->get();
    return view('pages.haji', [
        'hajiPackages' => $hajiPackages
    ]);
});

// Rute Halaman Wisata Religi
Route::get('/pages/wisata-religi', function () {
    $wisataReligiPackages = \App\Models\Package::whereHas('category', function ($query) {
        $query->where('slug', 'wisata-religi')
            ->orWhere('slug', 'umroh-plus');
    })
        ->orderBy('departure_date', 'asc')
        ->get();
    return view('pages.wisata-religi', [
        'wisataReligiPackages' => $wisataReligiPackages
    ]);
});

// Rute Halaman Produk Lain
Route::get('/pages/produk-lain', function () {
    $otherProductsPackages = \App\Models\Package::whereHas('category', function ($query) {
        $query->where('slug', 'produk-lain');
    })
        ->orderBy('name', 'asc')
        ->get();
    return view('pages.produk-lain', [
        'otherProductsPackages' => $otherProductsPackages
    ]);
});

// Rute Halaman Galeri
Route::get('/pages/gallery', function () {
    $images = Gallery::latest()->get();
    return view('pages.gallery', ['images' => $images]);
});

// --- Rute Statis Lainnya ---
Route::get('/pages/about', fn() => view('pages.about'));
Route::get('/pages/artikel', fn() => view('pages.artikel'));
Route::get('/pages/contact', fn() => view('pages.contact'));
Route::get('/pages/detail-haji1', fn() => view('pages.detail-haji1'));
Route::get('/pages/detail-haji2', fn() => view('pages.detail-haji2'));
Route::get('/detail-haji1', fn() => view('pages.detail-haji1'));
Route::get('/detail-haji2', fn() => view('pages.detail-haji2'));
Route::get('/pages/detail-umrah37', fn() => view('pages.detail-umrah37'));
Route::get('/paket/{slug}', [PackageController::class, 'show'])->name('paket.show');

// ✅ TAMBAHKAN INI - Route login default untuk Laravel
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// --- Rute Admin Panel ---
Route::prefix('admin')->name('admin.')->group(function () {

    // ✅ RUTE AUTHENTIKASI ADMIN (GUEST - untuk yang belum login)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // ← Hapus 'admin.'
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
        Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    });

    // ✅ RUTE YANG BUTUH AUTHENTIKASI
    Route::middleware('auth')->group(function () {

        // Dashboard
        Route::get('/', function () {
            $umrohCount = Package::whereHas('category', fn($q) => $q->where('slug', 'umroh'))->count();
            $hajiCount = Package::whereHas('category', fn($q) => $q->where('slug', 'haji'))->count();
            $wisataCount = Package::whereHas('category', fn($q) => $q->where('slug', 'wisata-religi'))->count();
            $produkCount = Package::whereHas('category', fn($q) => $q->where('slug', 'produk-lain'))->count();

            return view('admin.dashboard', compact('umrohCount', 'hajiCount', 'wisataCount', 'produkCount'));
        })->name('dashboard');

        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Packages
        Route::resource('packages', PackageController::class);

        // Gallery
        Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::get('gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
        Route::put('gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
        Route::delete('gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    });
});
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('jamaah-growth', JamaahGrowthController::class);
});
Route::get('/pages/about', [PageController::class, 'about'])->name('about');
