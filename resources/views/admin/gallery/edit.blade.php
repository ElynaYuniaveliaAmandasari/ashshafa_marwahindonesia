{{-- Menggunakan layout admin 'Mono' --}}
@extends('layouts.admin')

{{-- Mengatur judul halaman --}}
@section('title', 'Edit Gambar Galeri')
@section('page_title', 'Edit Gambar Galeri')

{{-- Mengisi konten halaman --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Gambar Galeri</h2>
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

                    <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="caption">Caption / Teks (Opsional)</label>
                                    <input type="text" class="form-control" id="caption" name="caption"
                                        value="{{ old('caption', $gallery->caption) }}"
                                        placeholder="Contoh: Madinah - Masjid Nabawi">
                                </div>

                                <div class="form-group">
                                    <label for="image">Upload Gambar Baru (Opsional)</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah
                                        gambar.</small>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card card-default shadow-none border">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <p class="mt-2 font-weight-bold">Gambar Saat Ini:</p>
                                            <img src="{{ asset('storage/' . $gallery->image_path) }}"
                                                alt="{{ $gallery->caption ?? 'Gambar saat ini' }}"
                                                class="img-fluid rounded shadow-sm" style="max-width: 200px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                                <i class="mdi mdi-arrow-left"></i> Kembali ke Galeri
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <i class="mdi mdi-content-save"></i> Perbarui Gambar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
