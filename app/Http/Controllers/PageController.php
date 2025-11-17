<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\JamaahGrowth;

class PageController extends Controller
{
    public function about(): View
    {
        // Ambil data jamaah dari tabel jamaah_growth
        $growth = JamaahGrowth::orderBy('tahun', 'asc')->get();

        // Kirim data ke halaman about.blade.php
        return view('pages.about', compact('growth'));
    }
}
