@extends('layouts.admin')

@section('title', 'Edit Galeri Geosite')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Galeri Geosite</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.galeri-geosite.update', $galeriGeosite->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Judul Foto</label>
                <input type="text" name="judul" class="form-control" value="{{ $galeriGeosite->judul }}" required>
            </div>

            <div class="mb-3">
                <label>Geosite</label>
                <select name="geosite" class="form-control" required>
                    @foreach($geositeList as $gs)
                        <option value="{{ $gs }}" {{ $galeriGeosite->geosite == $gs ? 'selected' : '' }}>{{ ucfirst($gs) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ $galeriGeosite->kategori }}" required>
            </div>

            <div class="mb-3">
                <label>Gambar Saat Ini</label><br>
                @if($galeriGeosite->gambar)
                    <img src="{{ $galeriGeosite->gambar }}" width="100">
                @else
                    <span class="text-muted">Tidak ada gambar</span>
                @endif
                <input type="file" name="gambar" class="form-control mt-2" accept="image/*">
            </div>

            <div class="mb-3">
                <input type="checkbox" name="status" value="1" {{ $galeriGeosite->status ? 'checked' : '' }}> Aktifkan
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.galeri-geosite.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
