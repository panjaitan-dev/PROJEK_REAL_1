@extends('layouts.admin')

@section('title', 'Tambah Galeri Geosite')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Galeri Geosite</h5>
    </div>
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

        <form action="{{ route('admin.galeri-geosite.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Geosite <span class="text-danger">*</span></label>
                <select name="geosite" class="form-control" required>
                    @foreach($geositeList as $gs)
                        <option value="{{ $gs }}" {{ old('geosite') == $gs ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $gs)) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Judul Foto</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}"
                       placeholder="Cth: Pemandangan Pantai Batu Hoda (opsional)">
                <small class="text-muted">Kosongkan untuk menggunakan judul otomatis.</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Gambar <span class="text-danger">*</span></label>
                <input type="file" name="gambar" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp"
                       id="inputGambar" onchange="previewImage(this)">
                <small class="text-muted">Format: JPG, PNG, WEBP. Maks 6 MB.</small>

                {{-- Preview gambar --}}
                <div id="imgPreviewWrap" style="display:none; margin-top: 12px;">
                    <p class="text-muted small mb-1">Preview:</p>
                    <img id="imgPreview" src="#" alt="Preview"
                         style="max-width: 200px; max-height: 200px; border-radius: 8px;
                                border: 1px solid #dee2e6; object-fit: cover;">
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="status" value="1" class="form-check-input" id="statusCheck" checked>
                    <label class="form-check-label" for="statusCheck">Aktifkan (tampil di halaman publik)</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('admin.galeri-geosite.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const wrap = document.getElementById('imgPreviewWrap');
    const preview = document.getElementById('imgPreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            wrap.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        wrap.style.display = 'none';
        preview.src = '#';
    }
}
</script>
@endsection
