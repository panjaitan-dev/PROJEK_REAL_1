@extends('layouts.admin')

@section('content')

<div class="content-header">
    <h1>Tambah Detail Geosite</h1>
    <p>Tambahkan Google Maps, Jam Buka, dan Harga Tiket Geosite</p>
</div>

<div class="card">
    <div class="card-header">
        <i class="fas fa-map-marker-alt"></i> Form Tambah Detail Geosite
    </div>

```
<div class="card-body">

    @if($errors->any())
        <div style="background:#fee2e2;color:#991b1b;padding:12px 16px;border-radius:8px;margin-bottom:20px;">
            <ul style="margin:0;padding-left:20px;">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.detail-geosite.store') }}" method="POST">
        @csrf

       <div style="margin-bottom:24px;">
    <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">
        <i class="fas fa-map-marker-alt"></i> Nama Geosite
    </label>

    <input type="text"
        name="geosite"
        value="{{ old('geosite') }}"
        placeholder="Masukkan nama geosite"
        style="width:100%;padding:10px 14px;border:1px solid #d1d5db;border-radius:8px;font-size:0.95rem;">

    <small style="color:#6b7280;margin-top:4px;display:block;">
        Contoh: Batu Hoda Beach, Museum Huta Bolon, Batu Pasa Pantai.
    </small>
</div>

        <div style="margin-bottom:24px;">
            <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">
                <i class="fas fa-clock"></i> Jam Buka
            </label>

            <input type="text"
                name="jam_buka"
                value="{{ old('jam_buka') }}"
                placeholder="Contoh: 08:00 - 17:00 WIB"
                style="width:100%;padding:10px 14px;border:1px solid #d1d5db;border-radius:8px;">
        </div>

        <div style="margin-bottom:24px;">
            <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">
                <i class="fas fa-ticket-alt"></i> Harga Tiket
            </label>

            <input type="text"
                name="harga_tiket"
                value="{{ old('harga_tiket') }}"
                placeholder="Contoh: Rp 10.000 / Orang"
                style="width:100%;padding:10px 14px;border:1px solid #d1d5db;border-radius:8px;">
        </div>

        <div style="margin-bottom:24px;">
            <label style="display:block;font-weight:600;color:#374151;margin-bottom:8px;">
                <i class="fas fa-map"></i> Google Maps Embed URL
            </label>

            <textarea name="maps_url"
                rows="4"
                placeholder="https://www.google.com/maps/embed?pb=..."
                style="width:100%;padding:10px 14px;border:1px solid #d1d5db;border-radius:8px;font-family:monospace;">{{ old('maps_url') }}</textarea>

            <small style="color:#6b7280;">
                Buka Google Maps → Share → Embed a map → Copy URL embed.
            </small>
        </div>

        <div style="display:flex;gap:12px;">
            <button type="submit"
                style="background:#003366;color:white;padding:10px 24px;border:none;border-radius:8px;font-weight:600;">
                <i class="fas fa-save"></i> Simpan
            </button>

            <a href="{{ route('admin.detail-geosite.index') }}"
                style="background:#f1f5f9;color:#374151;padding:10px 24px;border-radius:8px;text-decoration:none;font-weight:600;">
                Batal
            </a>
        </div>

    </form>
</div>

</div>
@endsection
