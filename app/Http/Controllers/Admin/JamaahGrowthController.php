<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JamaahGrowth;

class JamaahGrowthController extends Controller
{
    public function index()
    {
        $data = JamaahGrowth::orderBy('tahun', 'asc')->get();
        return view('admin.jamaah_growth.index', compact('data'));
    }

    public function create()
    {
        return view('admin.jamaah_growth.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|digits:4|integer',
            'jumlah' => 'required|integer|min:0',
        ]);

        JamaahGrowth::create($request->all());

        return redirect()->route('jamaah-growth.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        JamaahGrowth::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}

