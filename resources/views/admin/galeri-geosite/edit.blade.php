@extends('layouts.admin')

@section('title', 'Edit Galeri Geosite')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Galeri Geosite</h5>
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

        <form action="{{ route('admin.galeri-geosite.update', $galeriGeosite->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Geosite <span class="text-danger">*</span></label>
                <select name="geosite" class="form-control" required>
                    @foreach($geositeList as $gs)
                        <option value="{{ $gs }}" {{ $galeriGeosite->geosite == $gs ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $gs)) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Judul Foto</label>
                <input type="text" name="judul" class="form-control"
                       value="{{ old('judul', $galeriGeosite->judul) }}"
                       placeholder="Cth: Pemandangan Pantai Batu Hoda (opsional)">
                <small class="text-muted">Kosongkan untuk menggunakan judul otomatis.</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Gambar</label>

                {{-- Gambar saat ini --}}
                @if($galeriGeosite->gambar)
                    <div class="mb-2">
                        <p class="text-muted small mb-1">Gambar saat ini:</p>
                        <img id="imgPreview" src="{{ $galeriGeosite->gambar_url }}"
                             width="120" style="border-radius: 8px; border: 1px solid #dee2e6; object-fit: cover; height: 120px;">
                    </div>
                @else
                    <div class="mb-2">
                        <img id="imgPreview" src="#" alt="Preview"
                             style="display:none; max-width: 120px; max-height: 120px; border-radius: 8px; border: 1px solid #dee2e6; object-fit: cover;">
                    </div>
                @endif

                <input type="file" name="gambar" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp"
                       id="inputGambar" onchange="previewImage(this)">
                <small class="text-muted">Format: JPG, PNG, WEBP. Maks 6 MB. Kosongkan untuk mempertahankan gambar lama.</small>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="status" value="1" class="form-check-input" id="statusCheck"
                           {{ $galeriGeosite->status ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusCheck">Aktifkan (tampil di halaman publik)</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('admin.galeri-geosite.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('imgPreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
