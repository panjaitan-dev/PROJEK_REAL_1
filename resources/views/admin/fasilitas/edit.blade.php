@extends('layouts.admin')

@section('title', 'Edit Fasilitas')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Fasilitas & Layanan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Fasilitas</label>
                <input type="text" name="nama" class="form-control" value="{{ $fasilitas->nama }}" required>
            </div>

            <div class="mb-3">
                <label>Geosite</label>
                <select name="geosite" class="form-control" required>
                    @foreach($geositeList as $gs)
                        <option value="{{ $gs }}" {{ $fasilitas->geosite == $gs ? 'selected' : '' }}>{{ ucfirst($gs) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5" required>{{ $fasilitas->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label>Harga / Keterangan</label>
                <input type="text" name="harga" class="form-control" value="{{ $fasilitas->harga }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini</label><br>
                @if($fasilitas->gambar)
                    <img src="{{ $fasilitas->gambar_url }}" width="100" style="border-radius: 6px; border: 1px solid #dee2e6; object-fit: cover;">
                @else
                    <span class="text-muted">Tidak ada gambar</span>
                @endif
                <input type="file" name="gambar" class="form-control mt-2" accept="image/jpeg,image/png,image/jpg,image/webp">
                <small class="text-muted">Kosongkan untuk mempertahankan gambar lama. Maks 6 MB.</small>
            </div>

            <div class="mb-3">
                <input type="checkbox" name="status" value="1" {{ $fasilitas->status ? 'checked' : '' }}> Aktifkan
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
