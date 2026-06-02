@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

{{-- ===== STATS GRID ===== --}}
<div class="stats-grid" style="margin-bottom: 28px;">

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon blue">
                <i class="fas fa-images"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalGaleri ?? 0 }}</div>
                <div class="stat-label">Galeri</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon indigo">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalBerita ?? 0 }}</div>
                <div class="stat-label">Berita</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon emerald">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalInformasi ?? 0 }}</div>
                <div class="stat-label">Informasi</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon amber">
                <i class="fas fa-store"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalUmkm ?? 0 }}</div>
                <div class="stat-label">UMKM</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon rose">
                <i class="fas fa-tools"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalFasilitas ?? 0 }}</div>
                <div class="stat-label">Fasilitas</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon purple">
                <i class="fas fa-hotel"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalPenginapan ?? 0 }}</div>
                <div class="stat-label">Penginapan</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon cyan">
                <i class="fas fa-mountain"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalGaleriGeosite ?? 0 }}</div>
                <div class="stat-label">Galeri Geosite</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon pink">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalDestinasi ?? 0 }}</div>
                <div class="stat-label">Destinasi</div>
            </div>
        </div>
    </div>

</div>


{{-- ===== QUICK ACTIONS ===== --}}
<div class="card-table">
    <div class="card-header-custom">
        <h5><i class="fas fa-bolt"></i> Aksi Cepat</h5>
    </div>
    <div class="action-buttons" style="gap: 10px; flex-wrap: wrap;">
        <a href="{{ route('admin.galeri.index') }}" class="btn-add-pill"><i class="fas fa-images"></i> Galeri</a>
        <a href="{{ route('admin.berita.index') }}" class="btn-add-pill"><i class="fas fa-newspaper"></i> Berita</a>
        <a href="{{ route('admin.informasi.index') }}" class="btn-add-pill"><i class="fas fa-info-circle"></i> Informasi</a>
        <a href="{{ route('admin.umkm.index') }}" class="btn-add-pill"><i class="fas fa-store"></i> UMKM</a>
        <a href="{{ route('admin.fasilitas.index') }}" class="btn-add-pill"><i class="fas fa-tools"></i> Fasilitas</a>
        <a href="{{ route('admin.penginapan.index') }}" class="btn-add-pill"><i class="fas fa-hotel"></i> Penginapan</a>
        <a href="{{ route('admin.galeri-geosite.index') }}" class="btn-add-pill"><i class="fas fa-mountain"></i> Galeri Geosite</a>
        <a href="{{ route('admin.destinasi.index') }}" class="btn-add-pill"><i class="fas fa-map-marked-alt"></i> Destinasi</a>
    </div>
</div>

@endsection