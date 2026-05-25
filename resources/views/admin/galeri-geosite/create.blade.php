@extends('layouts.admin')

@section('title', 'Tambah Galeri Geosite')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Galeri Geosite</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.galeri-geosite.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Geosite</label>
                <select name="geosite" class="form-control" required>
                    @foreach($geositeList as $gs)
                        <option value="{{ $gs }}">{{ ucfirst(str_replace('_', ' ', $gs)) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <input type="checkbox" name="status" value="1" checked> Aktifkan
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.galeri-geosite.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
