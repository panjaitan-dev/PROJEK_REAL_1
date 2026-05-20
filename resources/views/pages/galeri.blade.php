@extends('layouts.app')

@section('title', 'Galeri - GeoToba')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap');

    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Inter', sans-serif; background: #f0f2f5; }

    /* ===== HERO ===== */
    .gallery-hero {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 50%, #0a3a6a 100%);
        padding: 90px 0 60px;
        margin-top: 70px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .gallery-hero::before {
        content: '';
        position: absolute;
        top: -50%; left: -50%;
        width: 200%; height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
        animation: slowRotate 30s linear infinite;
    }
    .gallery-hero::after {
        content: '';
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(198,164,59,0.1) 0%, transparent 50%, rgba(198,164,59,0.05) 100%);
        pointer-events: none;
    }
    @keyframes slowRotate { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    .gallery-hero-content { position: relative; z-index: 2; }
    .gallery-hero h1 {
        font-size: 3rem; font-weight: 800;
        font-family: 'Playfair Display', serif;
        color: white; margin-bottom: 15px;
        letter-spacing: 3px;
        animation: slideDown 0.8s ease;
    }
    .gallery-hero p {
        font-size: 0.9rem; letter-spacing: 3.5px;
        text-transform: uppercase; color: rgba(255,255,255,0.85);
        font-weight: 600; animation: slideUp 0.8s ease 0.2s both;
    }
    @keyframes slideDown { from { opacity:0; transform:translateY(-20px); } to { opacity:1; transform:translateY(0); } }
    @keyframes slideUp   { from { opacity:0; transform:translateY(20px);  } to { opacity:1; transform:translateY(0); } }

    /* ===== SECTION ===== */
    .gallery-section {
        padding: 60px 0 100px;
        background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fa 50%, #dde5f0 100%);
        min-height: 100vh;
    }
    .container { max-width: 1400px; margin: 0 auto; padding: 0 24px; }

    /* ===== SECTION LABEL ===== */
    .section-label {
        display: flex; align-items: center; gap: 14px;
        margin-bottom: 22px;
    }
    .section-label h2 {
        font-size: 1.4rem; font-weight: 800; color: #003366;
        font-family: 'Playfair Display', serif; white-space: nowrap;
    }
    .label-line { flex: 1; height: 2px; background: linear-gradient(90deg, #c6a43b, transparent); border-radius: 2px; }
    .label-badge {
        background: linear-gradient(135deg, #003366, #1a4a7a);
        color: #c6a43b; font-size: 0.62rem; font-weight: 800;
        letter-spacing: 1.5px; text-transform: uppercase;
        padding: 4px 14px; border-radius: 20px; white-space: nowrap;
    }

    /* ===== CAROUSEL ===== */
    .carousel-section { margin-bottom: 56px; }

    .carousel-wrapper {
        position: relative; border-radius: 28px; overflow: hidden;
        box-shadow: 0 30px 80px rgba(0,51,102,0.2), 0 0 0 1px rgba(198,164,59,0.15);
        background: #0a0a1a; height: 520px;
        cursor: grab; user-select: none;
    }
    .carousel-wrapper:active { cursor: grabbing; }

    .carousel-track {
        display: flex; height: 100%;
        transition: transform 0.65s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        will-change: transform;
    }

    .carousel-slide {
        min-width: 100%; height: 100%;
        position: relative; overflow: hidden;
        flex-shrink: 0;
    }
    .carousel-slide img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform 8s ease;
        pointer-events: none; display: block;
    }
    .carousel-slide.is-active img { transform: scale(1.06); }

    .carousel-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(0,18,55,0.93) 0%, rgba(0,18,55,0.25) 55%, transparent 100%);
        display: flex; flex-direction: column;
        justify-content: flex-end; padding: 44px 52px;
    }
    .carousel-cat {
        display: inline-block;
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; padding: 5px 16px; border-radius: 20px;
        font-size: 0.64rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1.5px;
        margin-bottom: 14px; width: fit-content;
    }
    .carousel-title {
        color: white; font-size: 2.1rem; font-weight: 800;
        font-family: 'Playfair Display', serif; line-height: 1.2;
        margin-bottom: 10px;
        text-shadow: 0 2px 20px rgba(0,0,0,0.5);
        animation: none;
    }
    .carousel-desc {
        color: rgba(255,255,255,0.72); font-size: 0.85rem;
        line-height: 1.7; max-width: 580px;
        display: -webkit-box; -webkit-line-clamp: 2;
        -webkit-box-orient: vertical; overflow: hidden;
    }
    .carousel-loc {
        display: flex; align-items: center; gap: 7px;
        color: #c6a43b; font-size: 0.8rem; font-weight: 600;
        margin-top: 12px;
    }

    /* Prev / Next */
    .c-btn {
        position: absolute; top: 50%; transform: translateY(-50%);
        width: 54px; height: 54px; border-radius: 50%;
        background: rgba(255,255,255,0.13); backdrop-filter: blur(12px);
        border: 1px solid rgba(255,255,255,0.22);
        color: white; display: flex; align-items: center; justify-content: center;
        cursor: pointer; z-index: 10; font-size: 1.1rem;
        transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .c-btn:hover {
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; transform: translateY(-50%) scale(1.12);
        border-color: transparent; box-shadow: 0 8px 28px rgba(198,164,59,0.4);
    }
    .c-btn.prev { left: 22px; }
    .c-btn.next { right: 22px; }

    /* Counter */
    .c-counter {
        position: absolute; top: 24px; right: 24px;
        background: rgba(0,0,0,0.5); backdrop-filter: blur(8px);
        color: white; font-size: 0.72rem; font-weight: 700;
        padding: 6px 15px; border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.12); z-index: 10;
        letter-spacing: 1px;
    }
    .c-counter .cur { color: #c6a43b; }

    /* Dots */
    .c-dots {
        position: absolute; bottom: 22px; left: 50%;
        transform: translateX(-50%);
        display: flex; gap: 7px; z-index: 10;
    }
    .c-dot {
        width: 7px; height: 7px; border-radius: 4px;
        background: rgba(255,255,255,0.35); cursor: pointer;
        transition: all 0.4s ease;
    }
    .c-dot.active { width: 28px; background: #c6a43b; }

    /* Progress bar */
    .c-progress {
        position: absolute; bottom: 0; left: 0; height: 3px;
        background: linear-gradient(90deg, #c6a43b, #d4a947);
        width: 0%; z-index: 10; border-radius: 0 3px 3px 0;
        transition: none;
    }
    .c-progress.running {
        animation: progressBar 5s linear forwards;
    }
    @keyframes progressBar { from { width: 0%; } to { width: 100%; } }

    /* ===== 4-COLUMN GRID ===== */
    .grid-section { margin-top: 8px; }

    .photo-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    .photo-card {
        position: relative; border-radius: 18px; overflow: hidden;
        background: #111827; cursor: pointer;
        aspect-ratio: 3/4;
        transition: all 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 8px 24px rgba(0,51,102,0.12);
        border: 1px solid rgba(198,164,59,0.08);
    }
    .photo-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 24px 56px rgba(0,51,102,0.22), 0 0 0 1.5px rgba(198,164,59,0.35);
        z-index: 5;
    }
    .photo-card img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform 0.65s ease;
        filter: brightness(0.88);
        display: block;
    }
    .photo-card:hover img { transform: scale(1.1); filter: brightness(1.05); }

    /* Category badge */
    .p-cat {
        position: absolute; top: 12px; left: 12px;
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; font-size: 0.55rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1px;
        padding: 3px 10px; border-radius: 12px;
    }
    /* Number badge */
    .p-num {
        position: absolute; top: 12px; right: 12px;
        background: rgba(0,0,0,0.5); backdrop-filter: blur(6px);
        color: rgba(198,164,59,0.8); font-size: 0.58rem; font-weight: 700;
        font-family: 'Courier New', monospace;
        padding: 3px 9px; border-radius: 10px; letter-spacing: 1px;
    }
    /* Zoom icon on hover */
    .p-zoom {
        position: absolute; top: 50%; left: 50%;
        transform: translate(-50%, -50%) scale(0);
        width: 46px; height: 46px;
        background: rgba(198,164,59,0.92);
        border-radius: 50%; display: flex;
        align-items: center; justify-content: center;
        color: #003366; font-size: 1.05rem;
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        pointer-events: none;
    }
    .photo-card:hover .p-zoom { transform: translate(-50%, -50%) scale(1); }

    /* Bottom info bar — selalu terlihat */
    .p-info {
        position: absolute; bottom: 0; left: 0; right: 0;
        padding: 14px 14px 12px;
        background: linear-gradient(to top, rgba(0,15,45,0.92) 0%, rgba(0,15,45,0.6) 65%, transparent 100%);
    }
    .p-title {
        color: white; font-size: 0.78rem; font-weight: 700;
        line-height: 1.35; white-space: nowrap;
        overflow: hidden; text-overflow: ellipsis;
    }
    .p-loc {
        color: rgba(198,164,59,0.85); font-size: 0.63rem; font-weight: 500;
        margin-top: 4px; display: flex; align-items: center; gap: 4px;
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }

    /* Empty state */
    .empty-gallery {
        grid-column: 1/-1; text-align: center; padding: 80px;
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        border-radius: 20px; border: 2px dashed rgba(198,164,59,0.2);
    }
    .empty-gallery i { font-size: 4rem; color: rgba(198,164,59,0.2); margin-bottom: 20px; display: block; }

    /* ===== MODAL ===== */
    .modal-overlay {
        position: fixed; inset: 0;
        background: rgba(0,0,0,0.97); z-index: 9999;
        display: none; align-items: center; justify-content: center;
        backdrop-filter: blur(15px);
    }
    .modal-box {
        background: linear-gradient(135deg, #1a1a1a 0%, #0f0f0f 100%);
        width: 90%; max-width: 1000px;
        display: grid; grid-template-columns: 1.2fr 1fr;
        border-radius: 24px; overflow: hidden;
        animation: modalIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 50px 100px rgba(0,0,0,0.5), 0 0 60px rgba(198,164,59,0.2);
        border: 1px solid rgba(198,164,59,0.3);
    }
    @keyframes modalIn { from { opacity:0; transform:scale(0.93) rotateX(-8deg); } to { opacity:1; transform:scale(1) rotateX(0); } }
    .modal-img-part {
        background: #0a0a0a;
        display: flex; align-items: center; justify-content: center;
        padding: 30px; position: relative;
    }
    .modal-img-part::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(circle at 50% 50%, rgba(198,164,59,0.1), transparent 70%);
        pointer-events: none;
    }
    .modal-img-part img {
        width: 100%; max-height: 70vh; object-fit: contain;
        position: relative; z-index: 1;
        filter: drop-shadow(0 0 20px rgba(198,164,59,0.2));
        transition: transform 0.3s ease;
    }
    .modal-img-part img:hover { transform: scale(1.02); }
    .modal-text-part {
        padding: 40px; color: white;
        background: linear-gradient(135deg, #1a1a1a 0%, #0d0d0d 100%);
        display: flex; flex-direction: column; justify-content: center;
        position: relative;
    }
    .modal-text-part::before {
        content: ''; position: absolute;
        left: 0; top: 0; bottom: 0; width: 3px;
        background: linear-gradient(180deg, #c6a43b, transparent);
    }
    .close-btn {
        position: absolute; top: 25px; right: 25px;
        color: white; font-size: 1.5rem; cursor: pointer;
        z-index: 10000; width: 48px; height: 48px;
        background: rgba(0,0,0,0.6); border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        backdrop-filter: blur(8px); border: 1px solid rgba(198,164,59,0.3);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .close-btn:hover {
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; transform: rotate(90deg) scale(1.15);
    }
    .modal-text-part small { color: #c6a43b; letter-spacing: 2.5px; font-size: 0.75rem; text-transform: uppercase; font-weight: 800; }
    .modal-text-part h2 { font-size: 1.6rem; margin: 15px 0; font-family: 'Playfair Display', serif; font-weight: 700; }
    .modal-text-part p  { color: #ccc; line-height: 1.8; font-size: 0.9rem; }

    /* ===== MUSIC CARD ===== */
    .music-card {
        position: fixed; bottom: 28px; right: 24px; z-index: 1100;
        display: flex; align-items: center; gap: 12px;
        background: rgba(10,10,20,0.82);
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(198,164,59,0.35);
        border-radius: 50px; padding: 8px 16px 8px 8px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.45), 0 0 0 1px rgba(255,255,255,0.05);
        cursor: pointer; transition: all 0.4s cubic-bezier(0.34,1.56,0.64,1);
        min-width: 205px; max-width: 265px;
    }
    .music-card:hover {
        background: rgba(20,15,35,0.9);
        border-color: rgba(198,164,59,0.6);
        transform: translateY(-3px);
        box-shadow: 0 14px 42px rgba(0,0,0,0.55), 0 0 22px rgba(198,164,59,0.18);
    }
    .music-disc { position: relative; width: 44px; height: 44px; flex-shrink: 0; }
    .music-disc-img {
        width: 44px; height: 44px; border-radius: 50%;
        object-fit: cover; border: 2px solid rgba(198,164,59,0.55);
        animation: spinDisc 4s linear infinite;
        animation-play-state: paused; filter: brightness(0.8);
    }
    .music-disc-img.playing { animation-play-state: running; filter: brightness(1); }
    @keyframes spinDisc { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    .music-disc::after {
        content: ''; position: absolute; top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 11px; height: 11px; background: #10102a;
        border-radius: 50%; border: 1.5px solid rgba(198,164,59,0.65);
        z-index: 2; pointer-events: none;
    }
    .music-info { flex: 1; overflow: hidden; min-width: 0; }
    .music-title {
        font-size: 0.72rem; font-weight: 700; color: #fff;
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        letter-spacing: 0.3px; line-height: 1.3;
    }
    .music-artist {
        font-size: 0.62rem; color: rgba(198,164,59,0.9);
        font-weight: 500; margin-top: 2px;
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }
    .music-eq {
        display: flex; align-items: flex-end; gap: 2px;
        height: 16px; flex-shrink: 0; opacity: 0;
        transition: opacity 0.3s ease;
    }
    .music-eq.active { opacity: 1; }
    .music-eq span {
        display: block; width: 3px;
        background: linear-gradient(to top, #c6a43b, #f0d060);
        border-radius: 2px;
        animation: eqBar 0.8s ease-in-out infinite alternate;
    }
    .music-eq span:nth-child(1) { height: 6px;  animation-delay: 0s; }
    .music-eq span:nth-child(2) { height: 12px; animation-delay: 0.15s; }
    .music-eq span:nth-child(3) { height: 8px;  animation-delay: 0.3s; }
    .music-eq span:nth-child(4) { height: 14px; animation-delay: 0.1s; }
    @keyframes eqBar { from { transform: scaleY(0.3); } to { transform: scaleY(1); } }
    .music-btn {
        width: 30px; height: 30px; border-radius: 50%;
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0; font-size: 0.72rem; color: #003366;
        transition: all 0.3s cubic-bezier(0.34,1.56,0.64,1);
        box-shadow: 0 3px 10px rgba(198,164,59,0.4);
    }
    .music-btn:hover { transform: scale(1.2); }
    .music-badge {
        position: absolute; top: -7px; left: 14px;
        background: linear-gradient(135deg, #003366, #1a4a7a);
        color: rgba(198,164,59,0.9); font-size: 0.47rem; font-weight: 800;
        letter-spacing: 0.8px; text-transform: uppercase;
        padding: 2px 8px; border-radius: 20px;
        border: 1px solid rgba(198,164,59,0.3); white-space: nowrap;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1100px) { .photo-grid { grid-template-columns: repeat(4, 1fr); gap: 12px; } }
    @media (max-width: 860px)  {
        .photo-grid { grid-template-columns: repeat(2, 1fr); }
        .carousel-wrapper { height: 380px; }
        .carousel-title { font-size: 1.5rem; }
        .carousel-overlay { padding: 30px; }
    }
    @media (max-width: 560px)  {
        .photo-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
        .carousel-wrapper { height: 265px; }
        .carousel-title { font-size: 1.1rem; }
        .c-btn { width: 36px; height: 36px; font-size: 0.8rem; }
        .carousel-overlay { padding: 20px; }
        .gallery-hero h1 { font-size: 2rem; }
        .modal-box { grid-template-columns: 1fr; max-height: 88vh; overflow-y: auto; }
        .music-card { bottom: 14px; right: 10px; min-width: 170px; max-width: 210px; }
        .music-disc, .music-disc-img { width: 36px; height: 36px; }
    }
</style>

<!-- HERO -->
<div class="gallery-hero">
    <div class="gallery-hero-content">
        <h1>GALERI</h1>
        <p>Koleksi Foto Terbaik</p>
    </div>
</div>

<section class="gallery-section">
    <div class="container">

        @php
            $allPhotos = [];
            foreach ($galeriByKategori as $kategori => $items) {
                foreach ($items as $item) {
                    $gambar = $item->gambar;
                    if (str_starts_with($gambar ?? '', 'data:')) {
                        $src = $gambar;
                    } elseif (!empty($gambar)) {
                        $src = asset('storage/' . $gambar);
                    } else {
                        $src = 'https://via.placeholder.com/400x600?text=No+Image';
                    }
                    $allPhotos[] = [
                        'src'       => $src,
                        'judul'     => $item->judul,
                        'deskripsi' => $item->deskripsi ?? '',
                        'lokasi'    => $item->lokasi ?? 'Danau Toba',
                        'kategori'  => strtoupper($kategori),
                    ];
                }
            }
        @endphp

        {{-- ========== CAROUSEL SWIPE ========== --}}
        @if(count($allPhotos) > 0)
        <div class="carousel-section">
            <div class="section-label">
                <h2>Featured</h2>
                <div class="label-line"></div>
                <span class="label-badge">&#8592; Geser &#8594;</span>
            </div>

            <div class="carousel-wrapper" id="carouselWrapper">
                <div class="carousel-track" id="carouselTrack">
                    @foreach($allPhotos as $i => $photo)
                    <div class="carousel-slide {{ $i === 0 ? 'is-active' : '' }}">
                        <img src="{{ $photo['src'] }}"
                             alt="{{ $photo['judul'] }}"
                             loading="{{ $i < 2 ? 'eager' : 'lazy' }}"
                             onerror="this.src='https://via.placeholder.com/1200x520?text=No+Image'">
                        <div class="carousel-overlay">
                            <span class="carousel-cat">{{ $photo['kategori'] }}</span>
                            <div class="carousel-title">{{ $photo['judul'] }}</div>
                            @if($photo['deskripsi'])
                            <div class="carousel-desc">{{ $photo['deskripsi'] }}</div>
                            @endif
                            <div class="carousel-loc">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $photo['lokasi'] }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="c-btn prev" id="prevBtn"><i class="bi bi-chevron-left"></i></div>
                <div class="c-btn next" id="nextBtn"><i class="bi bi-chevron-right"></i></div>

                <div class="c-counter">
                    <span class="cur" id="curNum">1</span> / {{ count($allPhotos) }}
                </div>

                <div class="c-dots" id="cDots">
                    @foreach($allPhotos as $i => $photo)
                    <div class="c-dot {{ $i === 0 ? 'active' : '' }}" data-idx="{{ $i }}"></div>
                    @endforeach
                </div>

                <div class="c-progress" id="cProgress"></div>
            </div>
        </div>
        @endif

        {{-- ========== 4-COLUMN PHOTO GRID ========== --}}
        <div class="grid-section">
            <div class="section-label">
                <h2>Semua Foto</h2>
                <div class="label-line"></div>
                <span class="label-badge">{{ count($allPhotos) }} Foto</span>
            </div>

            <div class="photo-grid">
                @forelse($allPhotos as $i => $photo)
                <div class="photo-card"
                     onclick="openPhoto('{{ $photo['src'] }}', '{{ addslashes($photo['judul']) }}', '{{ addslashes($photo['deskripsi']) }}', '{{ $photo['kategori'] }}')">
                    <img src="{{ $photo['src'] }}"
                         alt="{{ $photo['judul'] }}"
                         loading="lazy"
                         onerror="this.src='https://via.placeholder.com/300x400?text=No+Image'">
                    <span class="p-cat">{{ $photo['kategori'] }}</span>
                    <span class="p-num">#{{ str_pad($i+1, 3, '0', STR_PAD_LEFT) }}</span>
                    <div class="p-zoom"><i class="bi bi-zoom-in"></i></div>
                    <div class="p-info">
                        <div class="p-title">{{ Str::limit($photo['judul'], 28) }}</div>
                        <div class="p-loc">
                            <i class="fas fa-map-marker-alt" style="font-size:0.56rem;"></i>
                            {{ Str::limit($photo['lokasi'], 22) }}
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-gallery">
                    <i class="fas fa-images"></i>
                    <p style="color:#64748b;font-weight:600;">Belum ada foto galeri</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</section>

<!-- MODAL -->
<div id="pModal" class="modal-overlay" onclick="closePhoto()">
    <div class="close-btn" onclick="closePhoto()">&times;</div>
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="modal-img-part"><img src="" id="mImg" alt=""></div>
        <div class="modal-text-part">
            <small id="mTag"></small>
            <h2 id="mTitle"></h2>
            <p id="mDesc"></p>
        </div>
    </div>
</div>

<script>
// ===== MODAL =====
function openPhoto(src, title, desc, tag) {
    document.getElementById('mImg').src = src;
    document.getElementById('mTitle').innerText = title;
    document.getElementById('mTag').innerText = tag;
    document.getElementById('mDesc').innerText = desc || 'Tidak ada deskripsi.';
    document.getElementById('pModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closePhoto() {
    document.getElementById('pModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closePhoto(); });

// ===== CAROUSEL =====
const track    = document.getElementById('carouselTrack');
const slides   = document.querySelectorAll('.carousel-slide');
const dots     = document.querySelectorAll('.c-dot');
const curNum   = document.getElementById('curNum');
const progress = document.getElementById('cProgress');
const total    = slides.length;
let current    = 0;
let autoTimer  = null;
let isDragging = false, startX = 0, currentDiffX = 0;

function goTo(idx, resetAuto = true) {
    slides[current].classList.remove('is-active');
    dots[current]?.classList.remove('active');
    current = ((idx % total) + total) % total;
    slides[current].classList.add('is-active');
    dots[current]?.classList.add('active');
    track.style.transform = `translateX(-${current * 100}%)`;
    if (curNum) curNum.textContent = current + 1;
    // restart progress bar
    if (progress) {
        progress.classList.remove('running');
        void progress.offsetWidth; // reflow
        progress.classList.add('running');
    }
    if (resetAuto) {
        clearInterval(autoTimer);
        autoTimer = setInterval(() => goTo(current + 1), 5000);
    }
}

// Auto-play
if (total > 1) {
    goTo(0, true);
}

document.getElementById('prevBtn')?.addEventListener('click', () => goTo(current - 1));
document.getElementById('nextBtn')?.addEventListener('click', () => goTo(current + 1));
dots.forEach(d => d.addEventListener('click', () => goTo(+d.dataset.idx)));

// Touch + Mouse drag
const wrapper = document.getElementById('carouselWrapper');
if (wrapper && total > 1) {
    const getX = e => e.touches ? e.touches[0].clientX : e.clientX;

    const onStart = e => {
        isDragging = true;
        startX = getX(e);
        currentDiffX = 0;
        track.style.transition = 'none';
        clearInterval(autoTimer);
    };
    const onMove = e => {
        if (!isDragging) return;
        currentDiffX = getX(e) - startX;
        track.style.transform = `translateX(calc(-${current * 100}% + ${currentDiffX}px))`;
    };
    const onEnd = () => {
        if (!isDragging) return;
        isDragging = false;
        track.style.transition = 'transform 0.65s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        if (currentDiffX < -55)      goTo(current + 1);
        else if (currentDiffX > 55)  goTo(current - 1);
        else                         goTo(current);
        currentDiffX = 0;
    };

    wrapper.addEventListener('mousedown',  onStart);
    wrapper.addEventListener('touchstart', onStart, { passive: true });
    window.addEventListener('mousemove',   onMove);
    window.addEventListener('touchmove',   onMove, { passive: true });
    window.addEventListener('mouseup',     onEnd);
    window.addEventListener('touchend',    onEnd);
    // Block click-to-open if was dragging
    wrapper.addEventListener('click', e => { if (Math.abs(currentDiffX) > 8) e.stopPropagation(); });
}

// Keyboard left/right arrows (only when modal closed)
document.addEventListener('keydown', e => {
    if (document.getElementById('pModal').style.display === 'flex') return;
    if (e.key === 'ArrowLeft')  goTo(current - 1);
    if (e.key === 'ArrowRight') goTo(current + 1);
});

// ===== MUSIC CARD (Instagram Story Style) =====
const SONG_TITLE  = 'Horbo Paung';
const SONG_ARTIST = "D' bambo official";
// ▸ Letakkan gambar cover lagu di: public/image/musik/horbo_paung.jpg
const DISC_IMG    = "{{ asset('image/musik/horbo_paung.jpg') }}";

const musicCard = document.createElement('div');
musicCard.className = 'music-card';
musicCard.id        = 'musicCard';
musicCard.innerHTML = `
    <span class="music-badge">&#9835; Bebas Copyright</span>
    <div class="music-disc">
        <img src="${DISC_IMG}" alt="cover" class="music-disc-img" id="musicDisc"
             onerror="this.onerror=null;this.src='https://placehold.co/44x44/003366/c6a43b?text=\u266a'">
    </div>
    <div class="music-info">
        <div class="music-title">${SONG_TITLE}</div>
        <div class="music-artist">${SONG_ARTIST}</div>
    </div>
    <div class="music-eq" id="musicEq">
        <span></span><span></span><span></span><span></span>
    </div>
    <div class="music-btn" id="musicPlayBtn">
        <i class="bi bi-play-fill" id="musicBtnIcon"></i>
    </div>
`;
document.body.appendChild(musicCard);

const audio   = new Audio("{{ asset('audio/musik-galeri.mp3') }}");
audio.loop    = true;
audio.volume  = 0.5;

const discEl  = document.getElementById('musicDisc');
const eqEl    = document.getElementById('musicEq');
const iconEl  = document.getElementById('musicBtnIcon');
let isPlaying = false;

function startMusic() {
    audio.play().catch(() => {});
    discEl.classList.add('playing');
    eqEl.classList.add('active');
    iconEl.className = 'bi bi-stop-fill';
    isPlaying = true;
}
function stopMusic() {
    audio.pause();
    discEl.classList.remove('playing');
    eqEl.classList.remove('active');
    iconEl.className = 'bi bi-play-fill';
    isPlaying = false;
}

document.getElementById('musicPlayBtn').addEventListener('click', e => {
    e.stopPropagation();
    isPlaying ? stopMusic() : startMusic();
});
musicCard.addEventListener('click', () => { isPlaying ? stopMusic() : startMusic(); });

// Autoplay saat user pertama kali klik halaman
window.addEventListener('click', () => { if (!isPlaying) startMusic(); }, { once: true });
</script>

@endsection