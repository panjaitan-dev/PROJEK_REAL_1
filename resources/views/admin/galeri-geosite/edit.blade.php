@extends('layouts.admin')

@section('title', 'Edit Foto Geosite')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">✏️ Edit Foto Geosite</h5>
    <a href="{{ route('admin.galeri-geosite.index') }}" class="btn btn-secondary">
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

        <form action="{{ route('admin.galeri-geosite.update', $galeriGeosite->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Geosite <span class="text-danger">*</span></label>
                <select name="geosite" class="form-control" required>
                    <option value="batu_hoda_beach"   {{ $galeriGeosite->geosite == 'batu_hoda_beach'   ? 'selected' : '' }}>🏖️ Batu Hoda Beach</option>
                    <option value="batu_pasa_pantai"  {{ $galeriGeosite->geosite == 'batu_pasa_pantai'  ? 'selected' : '' }}>🌊 Batu Pasa Pantai</option>
                    <option value="museum_huta_bolon" {{ $galeriGeosite->geosite == 'museum_huta_bolon' ? 'selected' : '' }}>🏛️ Museum Huta Bolon</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Foto</label>

                @if($galeriGeosite->gambar)
                    <div class="mb-2">
                        <p class="text-muted small mb-1">Foto saat ini:</p>
                        <img src="{{ $galeriGeosite->gambar_url }}" width="120" height="120"
                             style="object-fit:cover; border-radius:8px; border:1px solid #dee2e6;">
                    </div>
                @endif

                <input type="file" name="gambar" class="form-control"
                       accept="image/jpeg,image/png,image/jpg,image/webp"
                       id="inputGambar" onchange="previewImage(this)">
                <small class="text-muted">Format: JPG, PNG, WEBP. Maks 6 MB. Kosongkan jika tidak ingin mengganti.</small>

                <div id="imgPreviewWrap" style="display:none; margin-top:10px;">
                    <p class="text-muted small mb-1">Preview baru:</p>
                    <img id="imgPreview" src="#" alt="Preview"
                         style="max-width:160px; max-height:160px; border-radius:8px; border:1px solid #dee2e6; object-fit:cover;">
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="status" value="1" class="form-check-input" id="statusCheck"
                           {{ $galeriGeosite->status ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusCheck">Aktifkan (tampil di halaman publik)</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('admin.galeri-geosite.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const wrap = document.getElementById('imgPreviewWrap');
    const preview = document.getElementById('imgPreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; wrap.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    } else {
        wrap.style.display = 'none';
    }
}
</script>
@endsection
