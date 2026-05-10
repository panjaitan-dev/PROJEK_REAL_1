@extends('layouts.admin')

@section('title', 'Edit Penginapan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Penginapan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.penginapan.update', $penginapan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Penginapan</label>
                <input type="text" name="nama" class="form-control" value="{{ $penginapan->nama }}" required>
            </div>

            <div class="mb-3">
                <label>Geosite</label>
                <select name="geosite" class="form-control" required>
                    @foreach($geositeList as $gs)
                        <option value="{{ $gs }}" {{ $penginapan->geosite == $gs ? 'selected' : '' }}>{{ ucfirst($gs) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5" required>{{ $penginapan->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="{{ $penginapan->harga }}">
            </div>

            <div class="mb-3">
                <label>Kontak</label>
                <input type="text" name="kontak" class="form-control" value="{{ $penginapan->kontak }}">
            </div>

            <div class="mb-3">
                <label>Gambar Saat Ini</label><br>
                @if($penginapan->gambar)
                    <img src="{{ $penginapan->gambar }}" width="100">
                @else
                    <span class="text-muted">Tidak ada gambar</span>
                @endif
                <input type="file" name="gambar" class="form-control mt-2" accept="image/*">
            </div>

            <div class="mb-3">
                <input type="checkbox" name="status" value="1" {{ $penginapan->status ? 'checked' : '' }}> Aktifkan
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.penginapan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
