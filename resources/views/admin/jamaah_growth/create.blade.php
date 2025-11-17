@extends('layouts.admin')
@section('title', 'Tambah Data Pertumbuhan Jamaah')
@section('page_title', 'Tambah Data')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jamaah-growth.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" name="tahun" class="form-control" placeholder="Misal: 2024" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Jamaah</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Misal: 1200" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
@endsection
