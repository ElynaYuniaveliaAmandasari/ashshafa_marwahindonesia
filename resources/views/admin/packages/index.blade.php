@extends('layouts.admin')

{{-- Judul halaman sekarang dinamis dari controller --}}
@section('title', 'Manajemen Paket: ' . $title)
@section('page_title', 'Manajemen Paket')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    {{-- Judul tabel sekarang dinamis --}}
                    <h2>Daftar: {{ $title }}</h2>

                    <a href="{{ route('admin.packages.create', ['category' => $currentCategory]) }}"
                        class="btn btn-primary btn-pill">
                        <i class="mdi mdi-plus"></i> Tambah Paket Baru
                    </a>
                </div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="packages-table" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Paket</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Informasi Tambahan</th>
                                    <th>Unggulan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($packages as $package)
                                    <tr>
                                        <td>{{ $package->name }}</td>
                                        <td>{{ $package->category->name }}</td>
                                        <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($package->category->slug === 'produk-lain')
                                                {{ $package->attributes['proses_pembuatan'] ?? '-' }}
                                            @elseif ($package->departure_date)
                                                {{ \Carbon\Carbon::parse(explode(',', $package->departure_date)[0])->format('d M Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $package->is_featured ? 'Ya' : 'Tidak' }}</td>
                                        <td>

                                            <a href="{{ route('admin.packages.edit', ['package' => $package->id, 'category' => $currentCategory]) }}"
                                                class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.packages.destroy', $package->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Anda yakin ingin menghapus paket ini?');"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Belum ada data paket untuk kategori ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        jQuery(document).ready(function() {
            jQuery('#packages-table').DataTable({
                "searching": true,
                "info": true,
                "paging": true,
                "responsive": true,
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "infoFiltered": "(difilter dari _MAX_ total entri)",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
                    },
                }
            });
        });
    </script>
@endsection
