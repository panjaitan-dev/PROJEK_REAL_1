@extends('layouts.admin')

@section('title', 'Edit Item Navbar')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-4">Edit Item Navbar</h5>

        <form action="{{ route('admin.navbar-items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Geosite</label>
                <select name="geosite" class="form-control @error('geosite') is-invalid @enderror" required>
                    <option value="">Pilih Geosite</option>
                    <option value="batu_hoda_beach" {{ old('geosite', $item->geosite) == 'batu_hoda_beach' ? 'selected' : '' }}>Batu Hoda Beach</option>
                    <option value="museum_huta_bolon" {{ old('geosite', $item->geosite) == 'museum_huta_bolon' ? 'selected' : '' }}>Museum Huta Bolon</option>
                    <option value="batu_pasa_pantai" {{ old('geosite', $item->geosite) == 'batu_pasa_pantai' ? 'selected' : '' }}>Batu Pasa Pantai</option>
                </select>
                @error('geosite')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Label</label>
                <input type="text" name="label" value="{{ old('label', $item->label) }}" class="form-control @error('label') is-invalid @enderror" required>
                @error('label')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Href</label>
                <input type="text" name="href" value="{{ old('href', $item->href) }}" class="form-control @error('href') is-invalid @enderror" placeholder="#umkm atau /informasi" required>
                @error('href')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Urutan</label>
                <input type="number" name="urutan" value="{{ old('urutan', $item->urutan) }}" class="form-control @error('urutan') is-invalid @enderror" required>
                @error('urutan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-check mb-4">
                <input type="checkbox" name="status" value="1" class="form-check-input" id="status" {{ old('status', $item->status) ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Aktifkan item navbar</label>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('admin.navbar-items.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
