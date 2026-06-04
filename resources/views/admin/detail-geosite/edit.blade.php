@extends('layouts.admin')

@section('content')
<div class="content-header">
    <h1>Edit Detail: {{ $namaGeosite }}</h1>
    <p>Ubah Google Maps, Jam Buka, dan Harga Tiket untuk {{ $namaGeosite }}</p>
</div>

<div class="card">
    <div class="card-header">
        <i class="fas fa-map-marker-alt"></i> Form Detail Geosite
    </div>
    <div class="card-body">
        @if($errors->any())
            <div style="background:#fee2e2;color:#991b1b;padding:12px 16px;border-radius:8px;margin-bottom:20px;">
                <ul style="margin:0;padding-left:20px;">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.detail-geosite.update', $geosite) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom:24px;">
                <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">
                    <i class="fas fa-clock"></i> Jam Buka
                </label>
                <input type="text" name="jam_buka" value="{{ old('jam_buka', $detail->jam_buka) }}"
                    placeholder="Contoh: 08:00 - 17:00 WIB (Setiap Hari)"
                    style="width:100%;padding:10px 14px;border:1px solid #d1d5db;border-radius:8px;font-size:0.95rem;outline:none;">
                <small style="color:#6b7280;margin-top:4px;display:block;">Tuliskan jam operasional geosite ini.</small>
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">
                    <i class="fas fa-ticket-alt"></i> Harga Tiket
                </label>
                <input type="text" name="harga_tiket" value="{{ old('harga_tiket', $detail->harga_tiket) }}"
                    placeholder="Contoh: Rp 10.000 / orang (Dewasa), Gratis (Anak)"
                    style="width:100%;padding:10px 14px;border:1px solid #d1d5db;border-radius:8px;font-size:0.95rem;outline:none;">
                <small style="color:#6b7280;margin-top:4px;display:block;">Tuliskan harga tiket masuk.</small>
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">
                    <i class="fas fa-map"></i> Google Maps Embed URL
                </label>
                <textarea name="maps_url" rows="4"
                    placeholder="Paste URL embed Google Maps di sini. Contoh: https://www.google.com/maps/embed?pb=..."
                    style="width:100%;padding:10px 14px;border:1px solid #d1d5db;border-radius:8px;font-size:0.9rem;outline:none;font-family:monospace;resize:vertical;">{{ old('maps_url', $detail->maps_url) }}</textarea>
                <small style="color:#6b7280;margin-top:4px;display:block;">
                    Buka Google Maps → Cari lokasi → Share → Embed a map → Copy link URL saja (bukan tag HTML).
                </small>
            </div>

            @if($detail->maps_url)
            <div style="margin-bottom:24px;">
                <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">Preview Peta Saat Ini</label>
                <iframe src="{{ $detail->maps_url }}" width="100%" height="300" style="border:1px solid #e5e7eb;border-radius:8px;" allowfullscreen loading="lazy"></iframe>
            </div>
            @endif

            <div style="display:flex;gap:12px;">
                <button type="submit" style="background:#003366;color:white;padding:10px 24px;border:none;border-radius:8px;font-weight:600;cursor:pointer;font-size:0.95rem;">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.detail-geosite.index') }}" style="background:#f1f5f9;color:#374151;padding:10px 24px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.95rem;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
