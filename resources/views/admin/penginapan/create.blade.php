@extends('layouts.admin')

@section('title', 'Tambah Penginapan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Penginapan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.penginapan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Nama Penginapan</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Geosite</label>
                <select name="geosite" class="form-control" required>
                    @foreach($geositeList as $gs)
                        <option value="{{ $gs }}">{{ ucfirst($gs) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label>Harga (contoh: Mulai dari Rp 150.000 / malam)</label>
                <input type="text" name="harga" class="form-control">
            </div>

            <div class="mb-3">
                <label>Kontak</label>
                <input type="text" name="kontak" class="form-control">
            </div>

            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <input type="checkbox" name="status" value="1" checked> Aktifkan
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.penginapan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
