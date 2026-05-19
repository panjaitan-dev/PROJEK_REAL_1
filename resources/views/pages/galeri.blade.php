@extends('layouts.app')

@section('title', 'Galeri - GeoToba')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    /* ========== STACKED SLIP CARDS STYLE ========== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: #f0f2f5;
    }

    /* HERO SECTION - TETAP */
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
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
        animation: slowRotate 30s linear infinite;
    }
    
    .gallery-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(198,164,59,0.1) 0%, transparent 50%, rgba(198,164,59,0.05) 100%);
        pointer-events: none;
    }

    @keyframes slowRotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .gallery-hero-content {
        position: relative;
        z-index: 2;
    }

    .gallery-hero h1 {
        font-size: 3rem;
        font-weight: 800;
        font-family: 'Playfair Display', serif;
        color: white;
        margin-bottom: 15px;
        letter-spacing: 3px;
        animation: slideDown 0.8s ease;
    }

    .gallery-hero p {
        font-size: 0.9rem;
        letter-spacing: 3.5px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.85);
        font-weight: 600;
        animation: slideUp 0.8s ease 0.2s both;
    }
    
    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ========== STACKED SLIP CARDS ========== */
    .gallery-section {
        padding: 70px 0 120px;
        background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fa 50%, #dde5f0 100%);
        min-height: 100vh;
        position: relative;
    }
    
    .gallery-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(198,164,59,0.05) 0%, transparent 70%);
        animation: slowRotate 40s linear infinite;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 1;
    }

    /* STACK CONTAINER */
    .stack-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0;
        padding: 40px 0;
        position: relative;
    }

    /* SLIP CARD - Seperti kertas slip/kartu */
    .slip-card {
        position: relative;
        width: 280px;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 20px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 15px 35px -10px rgba(0,51,102,0.15), 0 0 0 1px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.8);
        margin-left: -60px;
        border: 1px solid rgba(198, 164, 59, 0.15);
    }

    .slip-card:first-child {
        margin-left: 0;
    }

    /* Efek hover - card naik ke atas seperti slip */
    .slip-card:hover {
        transform: translateY(-30px) scale(1.05) rotateY(-5deg);
        z-index: 100;
        box-shadow: 0 35px 60px -5px rgba(0,51,102,0.25), 0 0 40px rgba(198,164,59,0.2), inset 0 1px 0 rgba(255,255,255,1);
    }

    /* Efek hover untuk card di sampingnya */
    .slip-card:hover ~ .slip-card {
        transform: translateX(30px);
    }

    /* Container gambar */
    .slip-image {
        position: relative;
        width: 100%;
        height: 320px;
        overflow: hidden;
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    }
    
    .slip-image::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 0%, rgba(198,164,59,0.3), transparent 70%);
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 2;
    }
    
    .slip-card:hover .slip-image::before {
        opacity: 1;
    }

    .slip-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        filter: brightness(0.95) contrast(1.05);
    }

    .slip-card:hover .slip-image img {
        transform: scale(1.15) rotate(2deg);
        filter: brightness(1.1) contrast(1.15);
    }

    /* Overlay seperti watermark */
    .slip-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 60%, transparent 100%);
        padding: 40px 20px 20px;
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 3;
    }

    .slip-card:hover .slip-overlay {
        opacity: 1;
    }

    .slip-category {
        display: inline-block;
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366;
        padding: 5px 14px;
        border-radius: 20px;
        font-size: 0.65rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        box-shadow: 0 4px 12px rgba(198,164,59,0.3);
    }

    .slip-title-overlay {
        color: white;
        font-size: 0.9rem;
        font-weight: 700;
        margin-top: 12px;
        line-height: 1.4;
        letter-spacing: 0.3px;
    }

    /* Info Card - Seperti slip kertas */
    .slip-info {
        padding: 20px;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        position: relative;
        border-top: 2px solid transparent;
        background-image: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%), linear-gradient(90deg, #c6a43b, #d4a947);
        background-origin: padding-box, border-box;
        background-clip: padding-box, border-box;
    }

    /* Decorative line seperti slip */
    .slip-line {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent, #c6a43b, #d4a947, transparent);
        transform: scaleX(0);
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 2px 10px rgba(198,164,59,0.4);
    }

    .slip-card:hover .slip-line {
        transform: scaleX(1);
    }

    .slip-title {
        font-size: 0.95rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 8px;
        line-height: 1.4;
        letter-spacing: 0.3px;
    }

    .slip-location {
        font-size: 0.75rem;
        color: #64748b;
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .slip-location i {
        font-size: 0.7rem;
        color: #c6a43b;
        transition: transform 0.3s ease;
    }
    
    .slip-card:hover .slip-location {
        color: #c6a43b;
    }
    
    .slip-card:hover .slip-location i {
        transform: rotate(360deg);
    }

    /* Nomor slip seperti antrian */
    .slip-number {
        position: absolute;
        bottom: 14px;
        right: 20px;
        font-size: 0.65rem;
        color: #c6a43b;
        font-family: 'Courier New', monospace;
        letter-spacing: 2px;
        font-weight: 700;
    }

    /* MODAL tetap */
    .modal-overlay { 
        position: fixed; 
        inset: 0; 
        background: rgba(0,0,0,0.97); 
        z-index: 9999; 
        display: none; 
        align-items: center; 
        justify-content: center; 
        backdrop-filter: blur(15px);
        animation: fadeInModal 0.3s ease;
    }
    
    @keyframes fadeInModal {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    
    .modal-box { 
        background: linear-gradient(135deg, #1a1a1a 0%, #0f0f0f 100%); 
        width: 90%; 
        max-width: 1000px; 
        display: grid; 
        grid-template-columns: 1.2fr 1fr; 
        border-radius: 24px; 
        overflow: hidden; 
        animation: modalFadeIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 50px 100px rgba(0,0,0,0.5), 0 0 60px rgba(198,164,59,0.2), inset 0 1px 0 rgba(255,255,255,0.1);
        border: 1px solid rgba(198,164,59,0.3);
    }
    @keyframes modalFadeIn {
        from { opacity: 0; transform: scale(0.94) rotateX(-10deg); }
        to { opacity: 1; transform: scale(1) rotateX(0); }
    }
    .modal-img-part { 
        background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
        position: relative;
    }
    
    .modal-img-part::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 50%, rgba(198,164,59,0.1), transparent 70%);
        pointer-events: none;
    }
    
    .modal-img-part img { 
        width: 100%; 
        max-height: 70vh; 
        object-fit: contain; 
        position: relative;
        z-index: 1;
        filter: drop-shadow(0 0 20px rgba(198,164,59,0.2));
        transition: transform 0.3s ease;
    }
    
    .modal-img-part img:hover {
        transform: scale(1.02);
    }
    
    .modal-text-part { 
        padding: 40px; 
        color: white; 
        text-align: left;
        background: linear-gradient(135deg, #1a1a1a 0%, #0d0d0d 100%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
    }
    
    .modal-text-part::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(180deg, #c6a43b, transparent);
    }
    .close-btn { 
        position: absolute; 
        top: 25px; 
        right: 25px; 
        color: white; 
        font-size: 1.5rem; 
        cursor: pointer; 
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        z-index: 10000;
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, rgba(0,0,0,0.6), rgba(0,0,0,0.4));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(198,164,59,0.3);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);\n    }
    .close-btn:hover { 
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; 
        transform: rotate(90deg) scale(1.15);
        box-shadow: 0 12px 35px rgba(198,164,59,0.4);\n    }
    .modal-text-part small {
        color: #c6a43b;
        letter-spacing: 2.5px;
        font-size: 0.75rem;
        text-transform: uppercase;
        font-weight: 800;
    }
    .modal-text-part h2 {
        font-size: 1.6rem;
        margin: 15px 0;
        font-family: 'Playfair Display', serif;
        letter-spacing: 1px;
        font-weight: 700;
    }
    .modal-text-part p {
        color: #ccc;
        line-height: 1.8;
        font-size: 0.9rem;
    }

    /* Music Control */
    .music-control {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(0, 51, 102, 0.95), rgba(0, 51, 102, 0.8));
        backdrop-filter: blur(10px);
        border: 2px solid rgba(198, 164, 59, 0.5);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 1000;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        font-size: 1.2rem;
        box-shadow: 0 8px 25px rgba(0,51,102,0.3), 0 0 20px rgba(198,164,59,0.2);
    }
    .music-control:hover {
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366;
        transform: scale(1.15) rotate(360deg);
        box-shadow: 0 15px 40px rgba(198,164,59,0.4), 0 0 30px rgba(198,164,59,0.3);
    }

    .empty-gallery {
        text-align: center;
        padding: 100px;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 20px;
        border: 2px dashed rgba(198,164,59,0.2);
        box-shadow: 0 10px 30px rgba(0,51,102,0.1);
    }
    .empty-gallery i {
        font-size: 4rem;
        color: rgba(198,164,59,0.2);
        margin-bottom: 20px;
        animation: bounce 2s ease-in-out infinite;
    }

    /* RESPONSIVE */
    @media (max-width: 1200px) {
        .slip-card {
            width: 240px;
        }
        .slip-image {
            height: 280px;
        }
    }

    @media (max-width: 992px) {
        .stack-container {
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .slip-card {
            margin-left: 0 !important;
            width: 260px;
        }
        .slip-card:hover ~ .slip-card {
            transform: none;
        }
        .slip-card:hover {
            transform: translateY(-10px);
        }
    }

    @media (max-width: 768px) { 
        .modal-box { 
            grid-template-columns: 1fr; 
            max-height: 85vh;
            overflow-y: auto;
        }
        .music-control { 
            bottom: 15px; 
            right: 15px; 
            width: 42px; 
            height: 42px; 
            font-size: 1rem; 
        }
        .gallery-hero h1 {
            font-size: 2rem;
        }
        .stack-container {
            gap: 16px;
        }
        .slip-card {
            width: calc(50% - 8px);
        }
        .slip-image {
            height: 260px;
        }
    }

    @media (max-width: 560px) {
        .slip-card {
            width: 100%;
        }
        .slip-image {
            height: 280px;
        }
    }
</style>

<!-- HERO SECTION -->
<div class="gallery-hero">
    <div class="gallery-hero-content">
        <h1>GALERI</h1>
        <p>Koleksi Foto Terbaik</p>
    </div>
</div>

<!-- STACKED SLIP CARDS SECTION -->
<section class="gallery-section">
    <div class="container">
        <div class="stack-container">
            @php $counter = 1; @endphp
            @foreach($galeriByKategori as $kategori => $items)
                @foreach($items as $item)
                    @php
                        $gambar = $item->gambar;
                        // Jika sudah berupa data URL (base64), gunakan langsung
                        if (str_starts_with($gambar, 'data:')) {
                            $src = $gambar;
                        } elseif (!empty($gambar)) {
                            // Jika berupa path file di storage
                            $src = asset('storage/' . $gambar);
                        } else {
                            $src = 'https://via.placeholder.com/400x500?text=No+Image';
                        }
                    @endphp
                    
                    <div class="slip-card" onclick="openPhoto('{{ $src }}', '{{ $item->judul }}', '{{ addslashes($item->deskripsi) }}', '{{ strtoupper($kategori) }}')">
                        <div class="slip-image">
                            <img src="{{ $src }}" alt="{{ $item->judul }}" loading="lazy" onerror="this.src='https://via.placeholder.com/400x500?text=No+Image'">
                            <div class="slip-overlay">
                                <span class="slip-category">{{ strtoupper($kategori) }}</span>
                                <div class="slip-title-overlay">{{ Str::limit($item->judul, 35) }}</div>
                            </div>
                        </div>
                        <div class="slip-info">
                            <div class="slip-line"></div>
                            <div class="slip-title">{{ Str::limit($item->judul, 30) }}</div>
                            <div class="slip-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $item->lokasi ?? 'Danau Toba' }}</span>
                            </div>
                            <div class="slip-number">#{{ str_pad($counter, 3, '0', STR_PAD_LEFT) }}</div>
                        </div>
                    </div>
                    @php $counter++; @endphp
                @endforeach
            @endforeach
        </div>
        
        @if($counter == 1)
        <div class="empty-gallery">
            <i class="fas fa-images"></i>
            <p>Belum ada foto galeri</p>
        </div>
        @endif
    </div>
</section>

<!-- MODAL -->
<div id="pModal" class="modal-overlay" onclick="closePhoto()">
    <div class="close-btn" onclick="closePhoto()">&times;</div>
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="modal-img-part"><img src="" id="mImg"></div>
        <div class="modal-text-part">
            <small id="mTag"></small>
            <h2 id="mTitle"></h2>
            <p id="mDesc"></p>
        </div>
    </div>
</div>

<script>
    // ========== MODAL FUNCTIONS ==========
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
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePhoto();
        }
    });

    // ==================== BACKGROUND MUSIC ====================
    const audio = new Audio("{{ asset('audio/musik-galeri.mp3') }}");

    audio.loop = true;
    audio.volume = 0.5;

    // autoplay saat user klik halaman pertama kali
    window.addEventListener('click', function () {
        audio.play();
    }, { once: true });

    // tombol musik
    const musicBtn = document.createElement('div');
    musicBtn.classList.add('music-control');
    musicBtn.innerHTML = '<i class="bi bi-volume-up-fill"></i>';

    document.body.appendChild(musicBtn);

    let isPlaying = false;

    musicBtn.addEventListener('click', () => {
        if (isPlaying) {
            audio.pause();
            musicBtn.innerHTML = '<i class="bi bi-volume-mute-fill"></i>';
        } else {
            audio.play();
            musicBtn.innerHTML = '<i class="bi bi-volume-up-fill"></i>';
        }

        isPlaying = !isPlaying;
    });

</script>

@endsection