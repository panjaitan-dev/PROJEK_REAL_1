@extends('layouts.app')

@section('title', 'Galeri Foto - Geosite Danau Toba')

@push('styles')
<style>
    /* ==============================
       GALERI PAGE - DESIGN SYSTEM
       Warna: Navy #003366, Gold #c6a43b
       Font: Inter (body), serif (heading)
    ============================== */

    .page-hero {
        position: relative;
        height: 55vh; min-height: 360px;
        display: flex; align-items: center; justify-content: center;
        text-align: center; color: #fff;
        margin-top: 0; overflow: hidden;
        background: linear-gradient(135deg, rgba(0,51,102,0.85) 0%, rgba(0,0,0,0.3) 50%, rgba(0,51,102,0.7) 100%),
                    url('{{ !empty($hs["galeri_hero_gambar"]) ? asset("storage/" . $hs["galeri_hero_gambar"]) : "/image/SBH/Rumahkaca.webp" }}') center/cover no-repeat;
    }
    .page-hero::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(circle at 50% 30%, rgba(198,164,59,0.15), transparent 70%);
    }
    .page-hero-inner {
        position: relative; z-index: 2; padding: 0 24px;
        animation: heroFade 0.8s ease both;
    }
    @keyframes heroFade {
        from { opacity: 0; transform: translateY(30px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .page-hero-eyebrow {
        font-size: 0.8rem; letter-spacing: 0.25em;
        text-transform: uppercase; color: #c6a43b;
        font-weight: 700; margin-bottom: 12px;
        font-family: 'Inter', sans-serif !important;
    }
    .page-hero h1 {
        font-size: clamp(2.2rem, 5vw, 3.4rem);
        font-weight: 800; letter-spacing: 1px;
        margin-bottom: 12px;
        text-shadow: 0 2px 15px rgba(0,0,0,0.3);
        font-family: 'Inter', sans-serif !important;
    }
    .page-hero-sub {
        font-size: 0.95rem; letter-spacing: 3px;
        text-transform: uppercase; opacity: 0.9; font-weight: 700;
        color: rgba(255,255,255,0.85);
        font-family: 'Inter', sans-serif !important;
    }

    /* === MAIN SECTION === */
    .page-content {
        padding: 60px 0 100px;
        background: linear-gradient(160deg, #f0f7ff 0%, #e8f0fa 55%, #dde5f0 100%);
        min-height: 60vh;
    }
    .page-container { max-width: 1360px; margin: 0 auto; padding: 0 24px; }

    .sec-header { display: flex; align-items: center; gap: 14px; margin-bottom: 12px; }
    .sec-header h2 {
        font-size: 1.35rem; font-weight: 800; color: #003366;
        white-space: nowrap; margin: 0;
    }
    .sec-line { display: none; }
    .sec-badge {
        background: linear-gradient(135deg, #003366, #1a4a7a);
        color: #c6a43b; font-size: 0.6rem; font-weight: 800;
        letter-spacing: 1.5px; text-transform: uppercase;
        padding: 4px 14px; border-radius: 20px; white-space: nowrap;
    }
    .sec-desc {
        font-size: 0.84rem; color: #64748b; margin-bottom: 28px;
        line-height: 1.7; max-width: 580px;
    }

    /* ==============================
       CAROUSEL — FULLWIDTH HORIZONTAL
       Setiap slide = 1 foto penuh lebar
    ============================== */
    .carousel-block { margin-bottom: 64px; }

    .carousel-wrap {
        position: relative; width: 100%;
        border-radius: 20px; overflow: hidden;
        box-shadow: 0 20px 60px rgba(0,51,102,0.18);
        background: #0a1628;
    }
    .carousel-viewport {
        width: 100%; height: 460px;
        overflow: hidden; position: relative;
    }
    .carousel-track {
        display: flex; height: 100%;
        transition: transform 0.6s cubic-bezier(0.77, 0, 0.175, 1);
        will-change: transform;
    }
    .carousel-slide {
        flex: 0 0 100%; width: 100%; height: 100%;
        position: relative; cursor: pointer; overflow: hidden;
    }
    .carousel-slide img {
        width: 100%; height: 100%; object-fit: cover; display: block;
        filter: brightness(0.75);
        transition: transform 0.6s ease, filter 0.4s ease;
    }
    .carousel-slide:hover img {
        transform: scale(1.04); filter: brightness(0.88);
    }
    .slide-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(0,10,40,0.88) 0%, rgba(0,10,40,0.3) 45%, transparent 70%);
        pointer-events: none;
    }
    .slide-badge {
        position: absolute; top: 18px; left: 18px; z-index: 3;
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; font-size: 0.58rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1.5px;
        padding: 4px 13px; border-radius: 20px;
    }
    .slide-num {
        position: absolute; top: 18px; right: 18px; z-index: 3;
        background: rgba(0,0,0,0.5); backdrop-filter: blur(6px);
        color: rgba(198,164,59,0.85); font-size: 0.6rem; font-weight: 700;
        font-family: monospace; padding: 3px 10px; border-radius: 8px;
        border: 1px solid rgba(198,164,59,0.2);
    }
    .slide-zoom {
        position: absolute; top: 50%; left: 50%; z-index: 3;
        transform: translate(-50%,-50%) scale(0);
        width: 60px; height: 60px;
        background: rgba(198,164,59,0.9); border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: #003366; font-size: 1.3rem;
        transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1);
        pointer-events: none;
    }
    .carousel-slide:hover .slide-zoom { transform: translate(-50%,-50%) scale(1); }
    .slide-info {
        position: absolute; bottom: 0; left: 0; right: 0; z-index: 3;
        padding: 24px 28px 22px;
    }
    .slide-title {
        font-size: clamp(1.2rem, 2.5vw, 1.7rem);
        font-weight: 700; color: #fff; line-height: 1.3; margin-bottom: 6px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.5);
    }
    .slide-loc {
        display: flex; align-items: center; gap: 5px;
        color: rgba(198,164,59,0.9); font-size: 0.78rem; font-weight: 600;
    }

    /* Arrows */
    .c-arrow {
        position: absolute; top: 50%; transform: translateY(-50%); z-index: 10;
        width: 48px; height: 48px; border-radius: 50%;
        background: rgba(255,255,255,0.15); backdrop-filter: blur(10px);
        border: 1.5px solid rgba(255,255,255,0.25);
        display: flex; align-items: center; justify-content: center;
        color: #fff; font-size: 1.1rem; cursor: pointer;
        transition: all 0.3s cubic-bezier(0.34,1.56,0.64,1);
    }
    .c-arrow:hover {
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; border-color: transparent;
        transform: translateY(-50%) scale(1.1);
    }
    .c-arrow-l { left: 16px; }
    .c-arrow-r { right: 16px; }

    /* Counter */
    .slide-counter {
        position: absolute; bottom: 22px; right: 28px; z-index: 5;
        background: rgba(0,0,0,0.5); backdrop-filter: blur(8px);
        color: #fff; font-size: 0.7rem; font-weight: 700;
        padding: 4px 12px; border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .slide-counter b { color: #c6a43b; }

    /* Dots */
    .c-dots {
        display: flex; align-items: center; justify-content: center;
        gap: 7px; margin-top: 14px;
    }
    .c-dot {
        width: 8px; height: 8px; border-radius: 4px;
        background: rgba(0,51,102,0.2); cursor: pointer;
        transition: all 0.3s ease;
    }
    .c-dot.on { width: 26px; background: #c6a43b; }

    /* ==============================
       PHOTO GRID — 4 KOLOM
    ============================== */
    .photo-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }
    .photo-card {
        position: relative; border-radius: 14px;
        overflow: hidden; background: #111827;
        cursor: pointer; aspect-ratio: 4/3;
        transition: all 0.4s cubic-bezier(0.34,1.56,0.64,1);
        box-shadow: 0 4px 16px rgba(0,51,102,0.08);
    }
    .photo-card:hover {
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 16px 40px rgba(0,51,102,0.18);
        z-index: 3;
    }
    .photo-card img {
        width: 100%; height: 100%; object-fit: cover; display: block;
        transition: transform 0.5s ease;
    }
    .photo-card:hover img { transform: scale(1.08); }
    .pc-badge {
        position: absolute; top: 8px; left: 8px;
        background: linear-gradient(135deg,#c6a43b,#d4a947);
        color: #003366; font-size: 0.48rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1px;
        padding: 2px 8px; border-radius: 8px; z-index: 2;
    }
    .pc-zoom {
        position: absolute; top: 50%; left: 50%;
        transform: translate(-50%,-50%) scale(0);
        width: 40px; height: 40px;
        background: rgba(198,164,59,0.9); border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: #003366; font-size: 0.9rem; z-index: 2;
        transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1);
        pointer-events: none;
    }
    .photo-card:hover .pc-zoom { transform: translate(-50%,-50%) scale(1); }
    .pc-info {
        position: absolute; bottom: 0; left: 0; right: 0; z-index: 2;
        padding: 10px 10px 8px;
        background: linear-gradient(to top, rgba(0,10,40,0.9) 0%, transparent 100%);
    }
    .pc-title {
        color: #fff; font-size: 0.72rem; font-weight: 700;
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }
    .pc-loc {
        color: rgba(198,164,59,0.85); font-size: 0.58rem; font-weight: 500;
        margin-top: 2px; display: flex; align-items: center; gap: 3px;
    }

    /* Empty */
    .empty-box {
        grid-column: 1/-1; text-align: center;
        padding: 80px 40px; background: #fff;
        border-radius: 20px; border: 2px dashed rgba(198,164,59,0.2);
    }
    .empty-box i { font-size: 3.5rem; color: rgba(198,164,59,0.2); display: block; margin-bottom: 14px; }
    .empty-box p { color: #64748b; font-weight: 600; }
    .empty-box small { color: #94a3b8; }

    /* ==============================
       MODAL — Gambar kiri, info kanan
    ============================== */
    .photo-modal {
        position: fixed; inset: 0;
        background: rgba(0,0,0,0.94);
        z-index: 9999; display: none;
        align-items: center; justify-content: center;
        backdrop-filter: blur(15px); padding: 20px;
    }
    .photo-modal.show { display: flex; }
    .pm-box {
        background: linear-gradient(135deg, #1a1a1a, #0f0f0f);
        width: 100%; max-width: 960px; max-height: 90vh;
        display: grid; grid-template-columns: 1.1fr 1fr;
        border-radius: 20px; overflow: hidden;
        animation: modalPop 0.4s cubic-bezier(0.34,1.56,0.64,1);
        box-shadow: 0 40px 80px rgba(0,0,0,0.5);
        border: 1px solid rgba(198,164,59,0.25);
        position: relative;
    }
    @keyframes modalPop {
        from { opacity: 0; transform: scale(0.92); }
        to   { opacity: 1; transform: scale(1); }
    }
    .pm-img {
        background: #050505;
        display: flex; align-items: center; justify-content: center;
        padding: 20px; min-height: 280px;
        position: relative;
    }
    .pm-img img {
        max-width: 100%; max-height: 70vh; object-fit: contain;
        border-radius: 10px; box-shadow: 0 8px 28px rgba(0,0,0,0.4);
    }
    .pm-text {
        padding: 36px 32px; color: #fff;
        display: flex; flex-direction: column; justify-content: center;
        position: relative; overflow-y: auto;
    }
    .pm-text::before {
        content: ''; position: absolute; left: 0; top: 0; bottom: 0;
        width: 3px; background: linear-gradient(180deg, #c6a43b, transparent);
    }
    .pm-close {
        position: absolute;
        top: -54px;
        right: 0;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(0,0,0,0.6);
        border: 1px solid rgba(198,164,59,0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.1rem;
        cursor: pointer;
        z-index: 30;
        transition: all 0.3s ease;
    }
    .pm-close:hover {
        background: #c6a43b;
        color: #003366;
        transform: rotate(90deg) scale(1.1);
        border-color: transparent;
    }
    .pm-tag {
        display: inline-block; background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; font-size: 0.58rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1.5px;
        padding: 4px 12px; border-radius: 16px; margin-bottom: 16px;
        align-self: flex-start;
    }
    .pm-text h2 {
        font-size: 1.4rem; font-weight: 700; color: #fff;
        line-height: 1.35; margin: 0 0 12px;
    }
    .pm-desc {
        color: #b0b8c8; line-height: 1.8; font-size: 0.85rem; margin-bottom: 20px;
    }
    .pm-meta {
        display: flex; flex-direction: column; gap: 8px;
        padding-top: 16px; border-top: 1px solid rgba(198,164,59,0.15);
    }
    .pm-meta-row {
        display: flex; align-items: center; gap: 8px; font-size: 0.78rem;
    }
    .pm-meta-row i { color: #c6a43b; min-width: 16px; }
    .pm-meta-row .label { color: #94a3b8; }
    .pm-meta-row .val { color: #e2e8f0; font-weight: 600; }

    /* Modal navigation arrows */
    .pm-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 20;
        width: 48px; height: 48px; border-radius: 50%;
        background: rgba(198,164,59,0.85);
        border: none; color: #003366;
        font-size: 1.1rem; cursor: pointer;
        display: flex; align-items: center; justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,0.4);
    }
    .pm-nav:hover { background: #c6a43b; color: #003366; transform: translateY(-50%) scale(1.1); }
    .pm-nav-l { left: -72px; }
    .pm-nav-r { right: -72px; }

    @media (max-width: 1100px) {
        .pm-nav-l { left: 15px; }
        .pm-nav-r { right: 15px; }
        .pm-close { top: 15px; right: 15px; }
    }
    @media (max-width: 768px) {
        .pm-box { grid-template-columns: 1fr; max-height: 90vh; overflow-y: auto; }
        .pm-img img { max-height: 45vh; }
    }

    /* ==============================
       MUSIK LATAR
    ============================== */
    .music-float {
        position: fixed; bottom: 24px; right: 20px; z-index: 1100;
        display: flex; align-items: center; gap: 10px;
        background: rgba(10,10,20,0.82); backdrop-filter: blur(18px);
        border: 1px solid rgba(198,164,59,0.3);
        border-radius: 50px; padding: 6px 14px 6px 6px;
        box-shadow: 0 6px 24px rgba(0,0,0,0.4);
        cursor: pointer; transition: transform 0.3s ease;
    }
    .music-float:hover { transform: translateY(-2px); }
    .mf-disc {
        width: 40px; height: 40px; border-radius: 50%; object-fit: cover;
        border: 2px solid rgba(198,164,59,0.5);
        animation: spin 4s linear infinite; animation-play-state: paused;
    }
    .mf-disc.playing { animation-play-state: running; }
    @keyframes spin { to { transform: rotate(360deg); } }
    .mf-info { flex: 1; overflow: hidden; }
    .mf-title { font-size: 0.7rem; font-weight: 700; color: #fff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .mf-artist { font-size: 0.6rem; color: rgba(198,164,59,0.9); font-weight: 500; margin-top: 1px; }
    .mf-btn {
        width: 28px; height: 28px; border-radius: 50%;
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        display: flex; align-items: center; justify-content: center;
        color: #003366; font-size: 0.7rem; flex-shrink: 0;
        transition: transform 0.3s ease;
    }
    .mf-btn:hover { transform: scale(1.15); }

    /* ==============================
       RESPONSIVE
    ============================== */
    @media (max-width: 1024px) {
        .photo-grid { grid-template-columns: repeat(3, 1fr); }
    }
    @media (max-width: 768px) {
        .photo-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
        .carousel-viewport { height: 320px; }
        .pm-box { grid-template-columns: 1fr; max-height: 90vh; overflow-y: auto; }
        .pm-img img { max-height: 45vh; }
    }
    @media (max-width: 480px) {
        .carousel-viewport { height: 240px; }
        .c-arrow { width: 38px; height: 38px; font-size: 0.9rem; }
        .page-hero h1 { font-size: 2rem; }
    }
</style>
@endpush

@section('content')

<!-- HERO -->
<section class="page-hero">
    <div class="page-hero-inner">
        <div class="page-hero-eyebrow">Geosite Danau Toba</div>
        <h1>{{ $hs['galeri_title'] ?? 'Galeri Foto' }}</h1>
        <div class="page-hero-sub">{{ $hs['galeri_subtitle'] ?? 'Pesona Alam & Budaya Danau Toba' }}</div>
    </div>
</section>

<!-- CONTENT -->
<section class="page-content">
    <div class="page-container">

        <!-- CAROUSEL -->
        <div class="carousel-block">
            <div class="sec-header">
                <h2>Foto Unggulan</h2>
                <span class="sec-badge">Geser untuk Jelajahi</span>
            </div>
            <p class="sec-desc">Klik foto untuk detail, atau geser kiri-kanan untuk melihat foto berikutnya.</p>

            @if(count($allPhotos) > 0)
            <div class="carousel-wrap">
                <div class="carousel-viewport">
                    <div class="carousel-track" id="cTrack">
                        @foreach($allPhotos as $i => $p)
                        <div class="carousel-slide" data-idx="{{ $i }}">
                            <img src="{{ $p['src'] }}" alt="{{ $p['judul'] }}"
                                 loading="{{ $i < 2 ? 'eager' : 'lazy' }}"
                                 onerror="this.src='https://placehold.co/1200x460/003366/c6a43b?text=GeoToba'">
                            <div class="slide-overlay"></div>
                            <span class="slide-badge">{{ $p['kategori'] }}</span>
                            <span class="slide-num">#{{ str_pad($i+1,3,'0',STR_PAD_LEFT) }}</span>
                            <div class="slide-zoom"><i class="fas fa-search-plus"></i></div>
                            <div class="slide-info">
                                <div class="slide-title">{{ $p['judul'] }}</div>
                                <div class="slide-loc"><i class="fas fa-map-marker-alt"></i> {{ Str::limit($p['lokasi'], 50) }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="c-arrow c-arrow-l" id="cPrev"><i class="fas fa-chevron-left"></i></div>
                    <div class="c-arrow c-arrow-r" id="cNext"><i class="fas fa-chevron-right"></i></div>
                    <div class="slide-counter"><b id="cNum">1</b> / {{ count($allPhotos) }}</div>
                </div>
            </div>
            <div class="c-dots" id="cDots">
                @foreach($allPhotos as $i => $p)
                <div class="c-dot {{ $i === 0 ? 'on' : '' }}" data-i="{{ $i }}"></div>
                @endforeach
            </div>
            @else
            <div class="empty-box">
                <i class="fas fa-images"></i>
                <p>Belum ada foto galeri.</p>
                <small>Unggah foto melalui panel admin.</small>
            </div>
            @endif
        </div>

        <!-- GRID 4 KOLOM -->
        <div>
            <div class="sec-header">
                <h2>Semua Foto</h2>
                <span class="sec-badge">{{ count($allPhotos) }} Foto</span>
            </div>
            <p class="sec-desc">Klik foto untuk melihat detail dan informasi lokasi.</p>

            <div class="photo-grid">
                @forelse($allPhotos as $i => $p)
                <div class="photo-card" data-idx="{{ $i }}">
                    <img src="{{ $p['src'] }}" alt="{{ $p['judul'] }}" loading="lazy"
                         onerror="this.src='https://placehold.co/400x300/003366/c6a43b?text=GeoToba'">
                    <span class="pc-badge">{{ $p['kategori'] }}</span>
                    <div class="pc-zoom"><i class="fas fa-search-plus"></i></div>
                    <div class="pc-info">
                        <div class="pc-title">{{ Str::limit($p['judul'], 30) }}</div>
                        <div class="pc-loc"><i class="fas fa-map-marker-alt"></i> {{ Str::limit($p['lokasi'], 24) }}</div>
                    </div>
                </div>
                @empty
                <div class="empty-box">
                    <i class="fas fa-camera"></i>
                    <p>Belum ada foto.</p>
                    <small>Unggah foto melalui panel admin.</small>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</section>

<!-- MODAL -->
<div class="photo-modal" id="pModal">
    <div class="pm-wrapper" style="position:relative; width: 100%; max-width: 960px; margin: 0 auto; display: flex; justify-content: center; align-items: center;">
        <div class="pm-close" id="pmClose"><i class="fas fa-times"></i></div>
        <!-- Tombol navigasi kiri -->
        <button class="pm-nav pm-nav-l" id="pmPrev"><i class="fas fa-chevron-left"></i></button>
        <!-- Tombol navigasi kanan -->
        <button class="pm-nav pm-nav-r" id="pmNext"><i class="fas fa-chevron-right"></i></button>
        
        <div class="pm-box" onclick="event.stopPropagation()">
            <div class="pm-img" style="position:relative;">
                <img src="" id="pmImg" alt="Foto">
                <div id="pmCounter" style="position:absolute;bottom:12px;right:14px;background:rgba(0,0,0,0.55);color:#fff;font-size:0.65rem;font-weight:700;padding:3px 10px;border-radius:12px;">1 / 1</div>
            </div>
            <div class="pm-text">
                <span class="pm-tag" id="pmTag"></span>
                <h2 id="pmTitle"></h2>
                <p class="pm-desc" id="pmDesc"></p>
                <div class="pm-meta">
                    <div class="pm-meta-row">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="label">Lokasi:</span>
                        <span class="val" id="pmLoc"></span>
                    </div>
                    <div class="pm-meta-row">
                        <span class="label">Kawasan:</span>
                        <span class="val">Geopark Kaldera Toba</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MUSIK -->
<div class="music-float" id="musicFloat">
    <img class="mf-disc" id="mfDisc" src="{{ asset('image/musik/horbo_paung.jpg') }}"
         alt="disc" onerror="this.src='https://placehold.co/40x40/003366/c6a43b?text=%E2%99%AA'">
    <div class="mf-info">
        <div class="mf-title">Horbo Paung</div>
        <div class="mf-artist">D' Bambo Official</div>
    </div>
    <div class="mf-btn" id="mfBtn"><i class="fas fa-play" id="mfIcon"></i></div>
</div>

@endsection

@push('scripts')
<script>
(function() {
    var photos = @json($allPhotos);
    var total = photos.length;
    var cur = 0;
    // -- MODAL DETAILS --
    var modalCur = 0;

    function openModal(idx) {
        var p = photos[idx];
        if (!p) return;
        modalCur = idx;
        updateModalContent(idx);
        document.getElementById('pModal').classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    function updateModalContent(idx) {
        var p = photos[idx];
        if (!p) return;
        var img = document.getElementById('pmImg');
        img.style.opacity = '0';
        img.style.transition = 'opacity 0.4s ease';
        setTimeout(function() {
            img.src = p.src;
            img.onload = function() { img.style.opacity = '1'; };
            img.style.opacity = '1';
        }, 180);
        document.getElementById('pmTitle').textContent = p.judul;
        document.getElementById('pmTag').textContent = p.kategori;
        document.getElementById('pmDesc').textContent = p.deskripsi || 'Pemandangan indah di Geopark Kaldera Toba.';
        document.getElementById('pmLoc').textContent = p.lokasi || 'Danau Toba';
        var counter = document.getElementById('pmCounter');
        if (counter) counter.textContent = (idx + 1) + ' / ' + total;
    }
    function modalNext() {
        modalCur = (modalCur + 1) % total;
        updateModalContent(modalCur);
    }
    function modalPrev() {
        modalCur = ((modalCur - 1) + total) % total;
        updateModalContent(modalCur);
    }
    function closeModal() {
        document.getElementById('pModal').classList.remove('show');
        document.body.style.overflow = 'auto';
    }

    document.getElementById('pModal').addEventListener('click', closeModal);
    document.getElementById('pmClose').addEventListener('click', function(e) { e.stopPropagation(); closeModal(); });
    document.getElementById('pmPrev').addEventListener('click', function(e) { e.stopPropagation(); modalPrev(); });
    document.getElementById('pmNext').addEventListener('click', function(e) { e.stopPropagation(); modalNext(); });
    document.addEventListener('keydown', function(e) {
        if (document.getElementById('pModal').classList.contains('show')) {
            if (e.key === 'Escape') closeModal();
            if (e.key === 'ArrowRight') { modalNext(); }
            if (e.key === 'ArrowLeft') { modalPrev(); }
        }
    });

    // Klik slide carousel
    document.querySelectorAll('.carousel-slide').forEach(function(el) {
        el.addEventListener('click', function() { openModal(parseInt(el.dataset.idx)); });
    });
    // Klik grid card
    document.querySelectorAll('.photo-card').forEach(function(el) {
        el.addEventListener('click', function() { openModal(parseInt(el.dataset.idx)); });
    });

    // -- CAROUSEL --
    function goSlide(idx) {
        cur = ((idx % total) + total) % total;
        var track = document.getElementById('cTrack');
        if (track) track.style.transform = 'translateX(-' + (cur * 100) + '%)';
        document.querySelectorAll('.c-dot').forEach(function(d, i) {
            d.classList.toggle('on', i === cur);
        });
        var numEl = document.getElementById('cNum');
        if (numEl) numEl.textContent = cur + 1;
    }

    var prevBtn = document.getElementById('cPrev');
    var nextBtn = document.getElementById('cNext');
    if (prevBtn) prevBtn.addEventListener('click', function(e) { e.stopPropagation(); goSlide(cur - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function(e) { e.stopPropagation(); goSlide(cur + 1); });

    document.querySelectorAll('.c-dot').forEach(function(d) {
        d.addEventListener('click', function() { goSlide(parseInt(d.dataset.i)); });
    });

    // Auto-play
    var timer = setInterval(function() { goSlide(cur + 1); }, 5000);
    var wrap = document.querySelector('.carousel-wrap');
    if (wrap) {
        wrap.addEventListener('mouseenter', function() { clearInterval(timer); });
        wrap.addEventListener('mouseleave', function() { timer = setInterval(function() { goSlide(cur + 1); }, 5000); });
    }

    // Touch swipe
    var startX = 0;
    var vp = document.querySelector('.carousel-viewport');
    if (vp) {
        vp.addEventListener('touchstart', function(e) { startX = e.changedTouches[0].screenX; }, {passive:true});
        vp.addEventListener('touchend', function(e) {
            var diff = startX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 40) goSlide(diff > 0 ? cur + 1 : cur - 1);
        }, {passive:true});
    }

    if (total > 0) goSlide(0);

    // -- MUSIK --
    var audio = new Audio("{{ asset('audio/D-Bambo.mp3') }}");
    audio.loop = true; audio.volume = 0.4;
    var playing = false;
    var disc = document.getElementById('mfDisc');
    var icon = document.getElementById('mfIcon');

    function toggleMusic() {
        if (playing) {
            audio.pause(); disc.classList.remove('playing');
            icon.className = 'fas fa-play'; playing = false;
        } else {
            audio.play().catch(function(){}); disc.classList.add('playing');
            icon.className = 'fas fa-stop'; playing = true;
        }
    }
    document.getElementById('mfBtn').addEventListener('click', function(e) { e.stopPropagation(); toggleMusic(); });
    document.getElementById('musicFloat').addEventListener('click', toggleMusic);
    window.addEventListener('click', function() { if (!playing) toggleMusic(); }, {once:true});
})();
</script>
@endpush