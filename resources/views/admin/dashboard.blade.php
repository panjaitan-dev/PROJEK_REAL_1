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

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon" style="background: linear-gradient(135deg, #e0f2fe, #bae6fd); color: #0284c7;">
                <i class="fas fa-address-book"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalKontak ?? 0 }}</div>
                <div class="stat-label">Kontak</div>
            </div>
        </div>
    </div>

</div>

@endsection