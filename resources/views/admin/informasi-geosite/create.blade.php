@extends('layouts.admin')

@section('title', 'Tambah Informasi Geosite')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">🏔️ Tambah Informasi Geosite</h5>
    <a href="{{ route('admin.informasi-geosite.index') }}" class="btn btn-secondary" style="background:#f1f5f9;color:#374151;padding:8px 18px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;border:none;">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.informasi-geosite.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Geosite <span class="required">*</span></label>
                <select name="geosite" class="form-control" required>
                    <option value="">-- Pilih Geosite --</option>
                    @foreach($geositeList as $key => $nama)
                        <option value="{{ $key }}" {{ old('geosite') == $key ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Judul <span class="required">*</span></label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" placeholder="Contoh: Sejarah Batu Hoda" required>
            </div>

            <div class="form-group">
                <label>Urutan <span class="required">*</span></label>
                <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 1) }}" min="1" required>
                <small>Angka kecil tampil lebih dulu</small>
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp">
                <small>Format: JPEG, PNG, JPG, WEBP. Maks 6MB</small>
            </div>

            <div class="form-group">
                <label>Konten <span class="required">*</span></label>
                <textarea name="konten" class="form-control" rows="8" placeholder="Tulis konten informasi di sini..." required>{{ old('konten') }}</textarea>
                <small>Anda bisa menggunakan beberapa paragraf. Pisahkan paragraf dengan baris kosong.</small>
            </div>

            <div class="form-check">
                <input type="checkbox" name="status" value="1" id="status" {{ old('status', '1') ? 'checked' : '' }}>
                <label for="status">Aktif</label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="background:#003366;color:white;padding:10px 24px;border:none;border-radius:8px;font-weight:600;cursor:pointer;">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.informasi-geosite.index') }}" style="background:#f1f5f9;color:#374151;padding:10px 24px;border-radius:8px;text-decoration:none;font-weight:600;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
