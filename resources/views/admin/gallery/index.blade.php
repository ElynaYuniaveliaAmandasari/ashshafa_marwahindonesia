{{-- Menggunakan layout admin 'Mono' --}}
@extends('layouts.admin')

{{-- Mengatur judul halaman --}}
@section('title', 'Manajemen Galeri')
@section('page_title', 'Manajemen Galeri')

{{-- Mengisi konten halaman --}}
@section('content')

    <div class="row">

        <div class="col-lg-8 col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Galeri Saat Ini</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse ($images as $image)
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                                <div class="card card-default h-100 position-relative shadow-sm">
                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                        alt="{{ $image->caption ?? 'Gallery Image' }}" class="card-img-top"
                                        style="height: 180px; object-fit: cover;">

                                    <div class="card-body p-2 text-center">
                                        <p class="card-text text-truncate"
                                            title="{{ $image->caption ?? '(Tanpa caption)' }}">
                                            {{ $image->caption ?? '(Tanpa caption)' }}
                                        </p>

                                        <a href="{{ route('admin.gallery.edit', $image->id) }}"
                                            class="btn btn-link text-warning btn-sm p-0">
                                            <i class="mdi mdi-pencil"></i> Edit
                                        </a>
                                    </div>

                                    <div class="position-absolute" style="top: 5px; right: 5px;">
                                        <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus gambar ini?');"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-circle"
                                                title="Hapus"
                                                style="width: 30px; height: 30px; line-height: 1.5; padding: 0; display: flex; align-items: center; justify-content: center;">
                                                <i class="mdi mdi-delete" style="font-size: 16px;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-center text-muted">Belum ada gambar di galeri.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Unggah Gambar Baru</h2>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

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

                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Upload Gambar Baru (Wajib)</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="caption">Caption / Teks (Opsional)</label>
                            <input type="text" class="form-control" id="caption" name="caption"
                                value="{{ old('caption') }}" placeholder="Contoh: Madinah - Masjid Nabawi">
                        </div>

                        <button type="submit" class="btn btn-primary btn-pill w-100 mt-4">
                            Unggah Gambar
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
