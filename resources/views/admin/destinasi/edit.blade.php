@extends('layouts.admin')

@section('title', 'Edit Destinasi')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h5 class="mb-0">✏️ Edit Destinasi</h5>

    <a href="{{ route('admin.destinasi.index') }}"
       class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="card">

    <div class="card-body">

        <form action="{{ route('admin.destinasi.update', $destinasi->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-8">

                    <label class="form-label fw-semibold">
                        Nama Destinasi
                        <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $destinasi->nama) }}"
                           required>

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Kategori
                        <span class="text-danger">*</span>
                    </label>

                    <select name="kategori"
                            class="form-select @error('kategori') is-invalid @enderror"
                            required>

                        <option value="">-- Pilih Kategori --</option>

                        @foreach($kategoriList as $kat)

                            <option value="{{ $kat }}"
                                {{ old('kategori', $destinasi->kategori) == $kat ? 'selected' : '' }}>

                                {{ $kat }}

                            </option>

                        @endforeach

                    </select>

                    @error('kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-8">

                    <label class="form-label fw-semibold">
                        Lokasi
                        <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="lokasi"
                           class="form-control @error('lokasi') is-invalid @enderror"
                           value="{{ old('lokasi', $destinasi->lokasi) }}"
                           required>

                    @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <div class="form-check form-switch mt-2">

                        <input class="form-check-input"
                               type="checkbox"
                               name="status"
                               id="status"
                               {{ old('status', $destinasi->status) ? 'checked' : '' }}>

                        <label class="form-check-label"
                               for="status">

                            Aktif / Tampilkan

                        </label>
                    </div>
                </div>

                <div class="col-12">

                    <label class="form-label fw-semibold">
                        Deskripsi
                        <span class="text-danger">*</span>
                    </label>

                    <textarea name="deskripsi"
                              rows="4"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              required>{{ old('deskripsi', $destinasi->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">

                    <label class="form-label fw-semibold">
                        Tags
                    </label>

                    <input type="text"
                           name="tags"
                           class="form-control @error('tags') is-invalid @enderror"
                           value="{{ old('tags', is_array($destinasi->tags) ? implode(', ', $destinasi->tags) : '') }}"
                           placeholder="Danau Toba, Wisata Alam, Batu Hoda">

                    <div class="form-text">
                        Pisahkan dengan tanda koma (,)
                    </div>

                    @error('tags')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Jam Buka
                    </label>

                    <input type="text"
                           name="jam_buka"
                           class="form-control"
                           value="{{ old('jam_buka', $destinasi->jam_buka) }}"
                           placeholder="08:00 - 18:00">
                </div>

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Harga Tiket
                    </label>

                    <input type="text"
                           name="harga_tiket"
                           class="form-control"
                           value="{{ old('harga_tiket', $destinasi->harga_tiket) }}"
                           placeholder="Rp10.000 / orang">
                </div>

                <div class="col-12">

                    <label class="form-label fw-semibold">
                        Fasilitas
                    </label>

                    <input type="text"
                           name="fasilitas"
                           class="form-control"
                           value="{{ old('fasilitas', is_array($destinasi->fasilitas) ? implode(', ', $destinasi->fasilitas) : '') }}"
                           placeholder="Parkir, Toilet, Kantin">
                </div>

                <div class="col-12">

                    <label class="form-label fw-semibold">
                        UMKM Terdekat
                    </label>

                    <input type="text"
                           name="umkm_terdekat"
                           class="form-control"
                           value="{{ old('umkm_terdekat', is_array($destinasi->umkm_terdekat) ? implode(', ', $destinasi->umkm_terdekat) : '') }}"
                           placeholder="Kedai Kopi, Galeri Ulos">
                </div>

                <div class="col-12">

                    <label class="form-label fw-semibold">
                        Informasi Tambahan
                    </label>

                    <textarea name="informasi_tambahan"
                              rows="4"
                              class="form-control"
                              placeholder="Informasi tambahan destinasi...">{{ old('informasi_tambahan', $destinasi->informasi_tambahan) }}</textarea>
                </div>

                <div class="col-12">

                    <label class="form-label fw-semibold">
                        Google Maps Embed
                    </label>

                    <textarea name="maps"
                              rows="3"
                              class="form-control"
                              placeholder="https://www.google.com/maps/embed?...">{{ old('maps', $destinasi->maps) }}</textarea>
                </div>

                <div class="col-12">

                    <label class="form-label fw-semibold">
                        Gambar Utama
                    </label>

                    @if($destinasi->gambar_utama)

                        <div class="mb-3">

                            <p class="text-muted small mb-1">
                                Gambar saat ini:
                            </p>

                            <img src="{{ $destinasi->gambar_utama }}"
                                 alt="{{ $destinasi->nama }}"
                                 style="max-height:180px; border-radius:10px; border:1px solid #ddd;">

                        </div>

                    @endif

                    <input type="file"
                           name="gambar_utama"
                           id="gambar_utama"
                           accept="image/*"
                           class="form-control @error('gambar_utama') is-invalid @enderror"
                           onchange="previewImage(this)">

                    <div class="form-text">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </div>

                    @error('gambar_utama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div id="imagePreview"
                         class="mt-3"
                         style="display:none;">

                        <p class="text-muted small mb-1">
                            Preview gambar baru:
                        </p>

                        <img id="previewImg"
                             src=""
                             alt="Preview"
                             style="max-height:220px; border-radius:10px; border:1px solid #ddd;">
                    </div>
                </div>

                <div class="col-12 d-flex gap-2 mt-4">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Update
                    </button>

                    <a href="{{ route('admin.destinasi.index') }}"
                       class="btn btn-outline-secondary">

                        Batal
                    </a>

                </div>

            </div>
        </form>
    </div>
</div>

<script>

function previewImage(input) {

    const preview = document.getElementById('imagePreview');

    const img = document.getElementById('previewImg');

    if (input.files && input.files[0]) {

        const reader = new FileReader();

        reader.onload = (e) => {

            img.src = e.target.result;

            preview.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    }
}

</script>

@endsection