{{-- Menggunakan layout admin 'Mono' --}}
@extends('layouts.admin')

{{-- Mengatur judul halaman --}}
@section('title', 'Admin Dashboard')
@section('page_title', 'Dashboard')

{{-- Mengisi konten halaman --}}
@section('content')

    <div class="row">

        <div class="col-xl-3 col-sm-6">
            <div class="card card-default card-mini">
                <div class="card-header">
                    <h2 class="text-white">{{ $umrohCount }}</h2>
                    <div class="sub-title">
                        <span class="mr-1 text-white">Paket Umroh</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="chart-wrapper">
                        <div class="random-color-2" style="height: 100px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card card-default card-mini">
                <div class="card-header">
                    <h2 class="text-white">{{ $hajiCount }}</h2>
                    <div class="sub-title">
                        <span class="mr-1 text-white">Paket Haji</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="chart-wrapper">
                        <div class="random-color-6" style="height: 100px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card card-default card-mini">
                <div class="card-header">
                    <h2 class="text-white">{{ $wisataCount }}</h2>
                    <div class="sub-title">
                        <span class="mr-1 text-white">Wisata Religi</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="chart-wrapper">
                        <div class="random-color-9" style="height: 100px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card card-default card-mini">
                <div class="card-header">
                    <h2 class="text-white">{{ $produkCount }}</h2>
                    <div class="sub-title">
                        <span class="mr-1 text-white">Produk Lain</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="chart-wrapper">
                        <div class="random-color-12" style="height: 100px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card card-default">
                <div class="card-body text-center">
                    <i class="mdi mdi-briefcase-outline text-primary" style="font-size: 48px;"></i>
                    <h2 class="mt-3">Manajemen Paket</h2>
                    <p>Atur paket Umroh, Haji, & Produk Lain.</p>
                    <a href="{{ route('admin.packages.index') }}" class="btn btn-primary btn-pill">
                        Buka Manajemen Paket
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card card-default">
                <div class="card-body text-center">
                    <i class="mdi mdi-image-multiple-outline text-success" style="font-size: 48px;"></i>
                    <h2 class="mt-3">Manajemen Galeri</h2>
                    <p>Unggah & hapus foto galeri.</p>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-success btn-pill">
                        Buka Manajemen Galeri
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
            <div class="card-header">
                <h2 class="text-white">{{ $totalJamaah ?? 0 }}</h2>
                <div class="sub-title">
                    <span class="mr-1 text-white">Total Jamaah</span>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="chart-wrapper d-flex justify-content-center align-items-center" style="height: 100px;">
                    <div class="random-color-4"
                        style="height: 100px; width: 100%; display: flex; justify-content: center; align-items: center;">
                        <a href="{{ route('jamaah-growth.index') }}" class="btn btn-outline-light btn-sm">
                            Kelola Data Jamaah
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection