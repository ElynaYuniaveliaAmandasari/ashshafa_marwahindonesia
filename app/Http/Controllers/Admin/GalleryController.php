<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Menampilkan halaman manajemen galeri
     */
    public function index()
    {
        $images = Gallery::latest()->get();
        return view('admin.gallery.index', ['images' => $images]);
    }

    /**
     * Menyimpan gambar baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('assets/img/gallery', 'public');
        $imagePath = str_replace('\\', '/', $imagePath);

        Gallery::create([
            'image_path' => $imagePath,
            'caption' => $validated['caption']
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil diunggah!');
    }

    // === METHOD BARU UNTUK MENAMPILKAN FORM EDIT ===
    /**
     * Tampilkan form untuk mengedit gambar.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    // === METHOD BARU UNTUK MENYIMPAN PERUBAHAN ===
    /**
     * Perbarui gambar di database.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        // Validasi (gambar opsional saat update)
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        $updateData = [
            'caption' => $validated['caption']
        ];

        // Cek jika ada file gambar baru yang di-upload
        if ($request->hasFile('image')) {
            // 1. Hapus gambar lama dari storage
            if ($gallery->image_path) {
                Storage::disk('public')->delete($gallery->image_path);
            }

            // 2. Upload gambar baru
            $imagePath = $request->file('image')->store('assets/img/gallery', 'public');
            $updateData['image_path'] = str_replace('\\', '/', $imagePath);
        }

        // 3. Update data di database
        $gallery->update($updateData);

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil diperbarui!');
    }


    /**
     * Menghapus gambar
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil dihapus!');
    }
}
