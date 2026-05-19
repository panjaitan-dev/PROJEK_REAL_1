@extends('layouts.admin')

@section('title', 'Home Manager')

@section('content')
@if(session('success'))
<div class="alert alert-success" style="background:#dcfce7;color:#166534;padding:12px 16px;border-radius:10px;margin-bottom:20px;font-size:.85rem;display:flex;align-items:center;gap:8px;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.home-settings.update') }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

{{-- ======== HERO SECTION ======== --}}
<div class="hm-card">
    <div class="hm-card-head">
        <span class="hm-icon" style="background:#dbeafe;color:#1d4ed8">🖼️</span>
        <div>
            <div class="hm-card-title">Hero / Slider</div>
            <div class="hm-card-sub">Teks yang tampil di atas gambar slider utama</div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label class="form-label">Subtitle <small>(teks kecil di atas judul)</small></label>
            <input type="text" name="hero_subtitle" class="form-control" value="{{ $s['hero_subtitle'] ?? 'Global Geopark' }}" placeholder="Global Geopark">
        </div>
        <div class="form-group">
            <label class="form-label">Judul Utama Hero</label>
            <input type="text" name="hero_title" class="form-control" value="{{ $s['hero_title'] ?? 'Simanindo - Batu Hoda' }}" placeholder="Simanindo - Batu Hoda">
        </div>
    </div>
    <div class="hm-preview-box">
        <i class="fas fa-eye"></i> Preview: <em>"{{ $s['hero_subtitle'] ?? 'Global Geopark' }}"</em> → <strong>"{{ $s['hero_title'] ?? 'Simanindo - Batu Hoda' }}"</strong>
    </div>
</div>

{{-- ======== STATISTIK ======== --}}
<div class="hm-card">
    <div class="hm-card-head">
        <span class="hm-icon" style="background:#fef3c7;color:#d97706">📊</span>
        <div>
            <div class="hm-card-title">Angka Statistik</div>
            <div class="hm-card-sub">4 angka yang tampil di bawah hero (Geosites, Tahun Sejarah, Warisan, UMKM)</div>
        </div>
    </div>
    <div class="stats-edit-grid">
        @php
        $statsData = [
            ['key'=>'stat_geosites','key_label'=>'stat_geosites_label','icon'=>'🗺️','color'=>'#dbeafe','color_text'=>'#1e40af'],
            ['key'=>'stat_sejarah','key_label'=>'stat_sejarah_label','icon'=>'🏛️','color'=>'#fef3c7','color_text'=>'#92400e'],
            ['key'=>'stat_warisan','key_label'=>'stat_warisan_label','icon'=>'🎭','color'=>'#d1fae5','color_text'=>'#065f46'],
            ['key'=>'stat_umkm','key_label'=>'stat_umkm_label','icon'=>'🛍️','color'=>'#fce7f3','color_text'=>'#9d174d'],
        ];
        @endphp
        @foreach($statsData as $stat)
        <div class="stat-edit-card" style="border-top:3px solid {{ $stat['color_text'] }}">
            <div class="stat-edit-icon" style="background:{{ $stat['color'] }};color:{{ $stat['color_text'] }}">{{ $stat['icon'] }}</div>
            <div class="form-group" style="margin-bottom:10px">
                <label class="form-label">Angka / Nilai</label>
                <input type="text" name="{{ $stat['key'] }}" class="form-control" value="{{ $s[$stat['key']] ?? '' }}" placeholder="contoh: 16">
            </div>
            <div class="form-group" style="margin-bottom:0">
                <label class="form-label">Label</label>
                <input type="text" name="{{ $stat['key_label'] }}" class="form-control" value="{{ $s[$stat['key_label']] ?? '' }}" placeholder="contoh: GEOSITES">
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- ======== WARISAN KELAS DUNIA ======== --}}
<div class="hm-card">
    <div class="hm-card-head">
        <span class="hm-icon" style="background:#f3e8ff;color:#7c3aed">🌍</span>
        <div>
            <div class="hm-card-title">Warisan Geologi Kelas Dunia</div>
            <div class="hm-card-sub">Section tentang Danau Toba / sejarah geologi di bawah statistik</div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Judul Section</label>
        <input type="text" name="warisan_judul" class="form-control" value="{{ $s['warisan_judul'] ?? 'Warisan Geologi Kelas Dunia' }}">
    </div>
    <div class="form-row">
        <div class="form-group">
            <label class="form-label">Paragraf Pertama</label>
            <textarea name="warisan_paragraf_1" class="form-control" rows="4" placeholder="Deskripsi pertama...">{{ $s['warisan_paragraf_1'] ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Paragraf Kedua</label>
            <textarea name="warisan_paragraf_2" class="form-control" rows="4" placeholder="Deskripsi kedua...">{{ $s['warisan_paragraf_2'] ?? '' }}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Gambar Pendamping</label>
        @if(!empty($s['warisan_gambar']))
        <div style="margin-bottom:10px;display:flex;align-items:center;gap:12px">
            <img src="{{ asset('storage/'.$s['warisan_gambar']) }}" style="width:120px;height:80px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0" alt="Gambar warisan">
            <span style="font-size:.75rem;color:#64748b">Gambar saat ini. Upload baru untuk mengganti.</span>
        </div>
        @else
        <div style="margin-bottom:8px;font-size:.75rem;color:#94a3b8"><i class="fas fa-image"></i> Belum ada gambar. Default: /image/SBH/DanauToba.png</div>
        @endif
        <input type="file" name="warisan_gambar" class="form-control" accept="image/*">
        <small style="color:#94a3b8">Opsional. Maks 6MB. Format: jpg, png, webp</small>
    </div>
</div>

{{-- ======== DESTINASI UNGGULAN ======== --}}
<div class="hm-card">
    <div class="hm-card-head">
        <span class="hm-icon" style="background:#d1fae5;color:#065f46">📍</span>
        <div>
            <div class="hm-card-title">Destinasi Unggulan di Home</div>
            <div class="hm-card-sub">Pilih destinasi yang tampil di homepage. Atur urutan tampilnya (angka kecil = tampil lebih dulu)</div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label class="form-label">Judul Section Destinasi</label>
            <input type="text" name="destinasi_judul" class="form-control" value="{{ $s['destinasi_judul'] ?? 'Destinasi Unggulan' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Subjudul / Deskripsi</label>
            <input type="text" name="destinasi_subjudul" class="form-control" value="{{ $s['destinasi_subjudul'] ?? 'Wisata eksotis di kawasan Simanindo - Batu Hoda, Pulau Samosir' }}">
        </div>
    </div>

    @if($destinasiList->isEmpty())
    <div style="text-align:center;padding:30px;color:#94a3b8;background:#f8fafc;border-radius:12px;border:1px dashed #e2e8f0">
        <i class="fas fa-map-marker-alt fa-2x" style="margin-bottom:10px;display:block"></i>
        Belum ada destinasi. <a href="{{ route('admin.destinasi.create') }}" style="color:#003366">Tambah destinasi dulu.</a>
    </div>
    @else
    <div class="destinasi-check-list">
        @foreach($destinasiList as $d)
        <div class="destinasi-check-item {{ $d->tampil_di_home ? 'is-selected' : '' }}" id="dci-{{ $d->id }}">
            <div class="dci-left">
                <input type="checkbox" name="destinasi_home[]" value="{{ $d->id }}" id="dchk-{{ $d->id }}"
                    class="dci-chk" {{ $d->tampil_di_home ? 'checked' : '' }}
                    onchange="toggleDci({{ $d->id }})">
                @if($d->gambar_utama)
                <img src="{{ asset('storage/'.$d->gambar_utama) }}" class="dci-img" alt="{{ $d->nama }}">
                @else
                <div class="dci-img-ph"><i class="fas fa-image"></i></div>
                @endif
                <div>
                    <label for="dchk-{{ $d->id }}" class="dci-name">{{ $d->nama }}</label>
                    <div class="dci-meta"><i class="fas fa-tag"></i> {{ $d->kategori }} &nbsp;|&nbsp; <i class="fas fa-map-pin"></i> {{ Str::limit($d->lokasi,40) }}</div>
                </div>
            </div>
            <div class="dci-right">
                <label style="font-size:.7rem;color:#64748b;display:block;margin-bottom:3px">Urutan</label>
                <input type="number" name="urutan_home[{{ $d->id }}]" value="{{ $d->urutan_home }}"
                    class="form-control" style="width:70px;text-align:center" min="0" max="99">
            </div>
        </div>
        @endforeach
    </div>
    <div style="margin-top:10px;font-size:.75rem;color:#64748b"><i class="fas fa-info-circle"></i> Centang destinasi yang ingin tampil di halaman home. Maks 6 destinasi disarankan.</div>
    @endif
</div>

{{-- ======== CTA SECTION ======== --}}
<div class="hm-card">
    <div class="hm-card-head">
        <span class="hm-icon" style="background:#fee2e2;color:#991b1b">🚀</span>
        <div>
            <div class="hm-card-title">Section CTA (Call to Action)</div>
            <div class="hm-card-sub">Bagian bawah dengan tombol "Jelajahi Sekarang"</div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label class="form-label">Judul CTA</label>
            <input type="text" name="cta_judul" class="form-control" value="{{ $s['cta_judul'] ?? 'Mulai Petualangan Anda' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Deskripsi CTA</label>
            <textarea name="cta_deskripsi" class="form-control" rows="3">{{ $s['cta_deskripsi'] ?? '' }}</textarea>
        </div>
    </div>
</div>

{{-- ======== SUBMIT ======== --}}
<div style="display:flex;gap:12px;justify-content:flex-end;margin-top:8px;padding:20px 0">
    <a href="{{ url('/') }}" target="_blank" class="btn-cancel" style="display:inline-flex;align-items:center;gap:8px;text-decoration:none">
        <i class="fas fa-eye"></i> Lihat Website
    </a>
    <button type="submit" class="btn-submit" style="display:inline-flex;align-items:center;gap:8px;font-size:.9rem;padding:12px 28px">
        <i class="fas fa-save"></i> Simpan Semua Perubahan
    </button>
</div>

</form>

<style>
.hm-card{background:#fff;border-radius:16px;padding:24px 28px;margin-bottom:22px;border:1px solid #e2e8f0;box-shadow:0 1px 4px rgba(0,0,0,.04)}
.hm-card-head{display:flex;align-items:center;gap:14px;margin-bottom:22px;padding-bottom:16px;border-bottom:1px solid #f1f5f9}
.hm-icon{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0}
.hm-card-title{font-size:1rem;font-weight:700;color:#0f172a}
.hm-card-sub{font-size:.78rem;color:#64748b;margin-top:2px}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.form-group{margin-bottom:14px}
.form-label{display:block;font-size:.78rem;font-weight:600;color:#334155;margin-bottom:5px}
.form-label small{font-weight:400;color:#94a3b8}
.form-control{width:100%;padding:9px 12px;border:1px solid #e2e8f0;border-radius:8px;font-size:.85rem;transition:border-color .2s}
.form-control:focus{outline:none;border-color:#003366;box-shadow:0 0 0 3px rgba(0,51,102,.08)}
textarea.form-control{resize:vertical;min-height:90px}
.hm-preview-box{background:#f8fafc;border:1px dashed #cbd5e1;border-radius:8px;padding:10px 14px;font-size:.8rem;color:#475569;margin-top:4px}
/* Stats grid */
.stats-edit-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.stat-edit-card{background:#f8fafc;border-radius:12px;padding:16px;border:1px solid #e2e8f0}
.stat-edit-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;margin-bottom:12px}
/* Destinasi checklist */
.destinasi-check-list{display:flex;flex-direction:column;gap:10px}
.destinasi-check-item{display:flex;align-items:center;justify-content:space-between;padding:12px 16px;border:2px solid #e2e8f0;border-radius:12px;transition:all .2s;background:#fafafa}
.destinasi-check-item:hover{border-color:#c6a43b;background:#fffdf5}
.destinasi-check-item.is-selected{border-color:#003366;background:#eef2ff}
.dci-left{display:flex;align-items:center;gap:12px;flex:1}
.dci-chk{width:18px;height:18px;cursor:pointer;flex-shrink:0;accent-color:#003366}
.dci-img{width:52px;height:40px;object-fit:cover;border-radius:8px;flex-shrink:0}
.dci-img-ph{width:52px;height:40px;background:#e2e8f0;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#94a3b8;font-size:.75rem;flex-shrink:0}
.dci-name{font-size:.88rem;font-weight:600;color:#0f172a;cursor:pointer;display:block}
.dci-meta{font-size:.72rem;color:#64748b;margin-top:2px}
.dci-right{flex-shrink:0}
@media(max-width:768px){
    .form-row{grid-template-columns:1fr}
    .stats-edit-grid{grid-template-columns:1fr 1fr}
}
@media(max-width:480px){
    .stats-edit-grid{grid-template-columns:1fr}
    .destinasi-check-item{flex-direction:column;align-items:flex-start;gap:10px}
}
</style>

<script>
function toggleDci(id) {
    const item = document.getElementById('dci-' + id);
    const chk  = document.getElementById('dchk-' + id);
    item.classList.toggle('is-selected', chk.checked);
}
</script>
@endsection
