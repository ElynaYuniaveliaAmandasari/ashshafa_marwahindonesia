@extends('layouts.admin')
@section('title', 'Pertumbuhan Jamaah')
@section('page_title', 'Manajemen Pertumbuhan Jamaah')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Data Pertumbuhan Jamaah</h4>
            <a href="{{ route('jamaah-growth.create') }}" class="btn btn-primary btn-sm">+ Tambah Data</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Jumlah Jamaah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>
                                <form action="{{ route('jamaah-growth.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
