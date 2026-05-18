@extends('layouts.app')

@section('title', 'Berita Terkini - Geosite Danau Toba')

@section('content')

<style>
    /* 
    ============================================================
    PREMIUM DESIGN FOR NEWS
    ============================================================
    */
    @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Playfair+Display:wght@400;500;600;700&display=swap');

    :root {
        --primary: #003366;
        --primary-light: #1a4a7a;
        --gold: #c6a43b;
        --gold-light: #e8c45a;
        --text-dark: #1a1a1a;
        --text-gray: #666;
        --text-light: #999;
        --white: #ffffff;
        --bg-light: #f8f9fa;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 8px 24px rgba(0,0,0,0.08);
        --shadow-lg: 0 16px 40px rgba(0,0,0,0.12);
        --transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    /* HERO SECTION */
    .news-hero {
        position: relative;
        height: 60vh;
        min-height: 380px;
        background: url('{{ asset("image/batu_hoda_beach/batu_hoda_beach1.jpg") }}') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 70px;
        overflow: hidden;
    }
    .news-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0,51,102,0.75) 0%, rgba(0,0,0,0.35) 50%, rgba(0,51,102,0.65) 100%);
        transition: background 0.6s ease;
    }
    
    .news-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 0%, rgba(198,164,59,0.2), transparent 70%);
        z-index: 1;
    }
    
    .news-hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
        animation: heroFadeInUp 0.9s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    @keyframes heroFadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .news-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        font-family: 'Playfair Display', serif;
        color: white;
        margin-bottom: 20px;
        text-shadow: 0 4px 25px rgba(0,0,0,0.5), 0 0 40px rgba(198,164,59,0.1);
        letter-spacing: 2px;
    }
    .news-hero p {
        font-size: 0.95rem;
        letter-spacing: 3.5px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.9);
        font-weight: 600;
        animation: heroFadeInUp 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
    }

    /* SLIDER WRAPPER */
    .slider-wrapper {
        max-width: 1400px;
        margin: -60px auto 100px;
        position: relative;
        padding: 0 40px;
        z-index: 10;
    }

    .news-track {
        display: flex;
        overflow-x: auto;
        gap: 40px;
        padding: 40px 15px 50px;
        scrollbar-width: thin;
        scrollbar-color: var(--gold) rgba(0,0,0,0.05);
        background: linear-gradient(135deg, rgba(0,51,102,0.02) 0%, rgba(198,164,59,0.03) 100%);
        border-radius: 24px;
    }

    .news-track::-webkit-scrollbar {
        height: 5px;
    }

    .news-track::-webkit-scrollbar-track {
        background: #e0e0e0;
        border-radius: 10px;
    }

    .news-track::-webkit-scrollbar-thumb {
        background: var(--gold);
        border-radius: 10px;
    }

    /* CIRCLE CARD */
    .circle-card {
        min-width: 220px;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
        animation: cardReveal 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) backwards;
        position: relative;
    }

    .circle-card:nth-child(1) { animation-delay: 0.05s; }
    .circle-card:nth-child(2) { animation-delay: 0.1s; }
    .circle-card:nth-child(3) { animation-delay: 0.15s; }
    .circle-card:nth-child(4) { animation-delay: 0.2s; }
    .circle-card:nth-child(5) { animation-delay: 0.25s; }
    .circle-card:nth-child(6) { animation-delay: 0.3s; }

    @keyframes cardReveal {
        from {
            opacity: 0;
            transform: translateY(40px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .circle-card:hover {
        transform: translateY(-18px) scale(1.05);
    }
    
    .circle-card::before {
        content: '';
        position: absolute;
        inset: -10px;
        background: radial-gradient(circle, rgba(198,164,59,0.1), transparent 70%);
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 0;
    }
    
    .circle-card:hover::before {
        opacity: 1;
    }

    .img-circle-frame {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 25px;
        border: 5px solid var(--white);
        box-shadow: 0 15px 40px -8px rgba(0,51,102,0.2), 0 0 0 1px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.8);
        transition: var(--transition);
        position: relative;
        z-index: 1;
    }
    
    .img-circle-frame::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 30% 30%, rgba(198,164,59,0.3), transparent 70%);
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 2;
    }
    
    .circle-card:hover .img-circle-frame::before {
        opacity: 1;
    }

    .circle-card:hover .img-circle-frame {
        border-color: var(--gold);
        box-shadow: 0 25px 60px -5px rgba(0,51,102,0.3), 0 0 40px rgba(198,164,59,0.25), inset 0 1px 0 rgba(255,255,255,1);
    }

    .img-circle-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        filter: brightness(0.95) contrast(1.05);
    }

    .circle-card:hover .img-circle-frame img {
        transform: scale(1.12) rotate(3deg);
        filter: brightness(1.05) contrast(1.15);
    }

    .meta-tag {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        color: var(--gold);
        display: block;
        margin-bottom: 12px;
        font-weight: 800;
        background: linear-gradient(135deg, rgba(198,164,59,0.15), rgba(198,164,59,0.05));
        padding: 6px 12px;
        border-radius: 20px;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
    }

    .title-main {
        font-size: 15px;
        font-weight: 700;
        line-height: 1.6;
        color: var(--text-dark);
        margin: 12px 0;
        transition: all 0.3s ease;
    }
    
    .circle-card:hover .title-main {
        color: var(--gold);
    }

    .card-date {
        font-size: 11px;
        color: var(--text-light);
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    /* EMPTY STATE */
    .empty-news {
        text-align: center;
        padding: 80px 60px;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 24px;
        margin: 40px auto;
        box-shadow: 0 10px 35px rgba(0,51,102,0.1);
        border: 2px dashed rgba(198,164,59,0.2);
    }

    .empty-news i {
        font-size: 4rem;
        color: rgba(198,164,59,0.2);
        margin-bottom: 20px;
        animation: bounce 2.5s ease-in-out infinite;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    /* ============================================================
    FULL READER - PREMIUM MODAL
    ============================================================ */
    #fullReader {
        position: fixed;
        top: 100%;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        z-index: 99999;
        transition: top 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        overflow-y: auto;
        visibility: hidden;
    }

    #fullReader.active {
        top: 0;
        visibility: visible;
    }

    /* Progress Bar */
    .progress-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #f0f0f0 0%, #e8e8e8 100%);
        z-index: 100;
    }

    .progress-bar {
        height: 4px;
        background: linear-gradient(90deg, var(--gold), #d4a947);
        width: 0%;
        transition: width 0.1s ease;
        box-shadow: 0 0 15px rgba(198,164,59,0.5);
    }

    /* Reader Navigation */
    .reader-nav {
        padding: 20px 5%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(135deg, rgba(255,255,255,0.98), rgba(248,249,250,0.98));
        backdrop-filter: blur(15px);
        position: sticky;
        top: 0;
        z-index: 99;
        border-bottom: 2px solid rgba(198,164,59,0.1);
        box-shadow: 0 4px 20px rgba(0,51,102,0.08);
    }

    .reader-logo {
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary);
    }

    .reader-logo span {
        color: var(--gold);
    }

    .btn-close-circle {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f0f0f0, #e8e8e8);
        border: 2px solid rgba(198,164,59,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        color: var(--text-dark);
        font-size: 1.2rem;
        box-shadow: 0 4px 15px rgba(0,51,102,0.1);
    }

    .btn-close-circle:hover {
        background: linear-gradient(135deg, var(--gold), #d4a947);
        color: var(--primary);
        transform: rotate(90deg) scale(1.1);
        box-shadow: 0 8px 25px rgba(198,164,59,0.3);
    }

    /* Reader Content */
    .reader-content-wrap {
        max-width: 900px;
        margin: 0 auto;
        padding: 50px 40px 80px;
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s;
    }

    #fullReader.active .reader-content-wrap {
        opacity: 1;
        transform: translateY(0);
    }

    .reader-header {
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }
    
    .reader-header::after {
        content: '';
        position: absolute;
        bottom: -25px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #c6a43b, #d4a947, #c6a43b, transparent);
    }

    .reader-date {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 3.5px;
        color: var(--gold);
        display: inline-block;
        margin-bottom: 20px;
        background: linear-gradient(135deg, rgba(198,164,59,0.15), rgba(198,164,59,0.05));
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 800;
    }

    .reader-title-display {
        font-family: 'Playfair Display', serif;
        font-size: 2.8rem;
        line-height: 1.3;
        color: var(--text-dark);
        margin: 25px 0;
        font-weight: 800;
        letter-spacing: 0.5px;
    }

    .reader-divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--gold), #d4a947);
        margin: 25px auto;
        border-radius: 2px;
        box-shadow: 0 2px 10px rgba(198,164,59,0.3);
    }

    .reader-author {
        font-size: 14px;
        color: var(--text-light);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 30px;
        font-weight: 500;
    }
    
    .reader-author i {
        color: var(--gold);
        font-size: 1.1rem;
    }

    .reader-hero-img {
        width: 100%;
        height: auto;
        max-height: 550px;
        object-fit: cover;
        border-radius: 20px;
        margin: 40px 0 50px;
        box-shadow: 0 20px 50px -10px rgba(0,51,102,0.2), 0 0 40px rgba(198,164,59,0.15);
        border: 1px solid rgba(198,164,59,0.2);
        transition: transform 0.4s ease;
    }
    
    .reader-hero-img:hover {
        transform: scale(1.02);
    }

    .reader-article-body {
        font-size: 17px;
        line-height: 2;
        color: #2c3e50;
        text-align: left;
        font-family: 'Inter', sans-serif;
    }

    .reader-article-body p {
        margin-bottom: 28px;
        transition: all 0.3s ease;
    }
    
    .reader-article-body p:hover {
        color: #1a3a52;
    }

    .reader-footer {
        margin: 80px 0 0;
        text-align: center;
        border-top: 2px solid rgba(198,164,59,0.15);
        padding-top: 50px;
        background: linear-gradient(135deg, rgba(0,51,102,0.02) 0%, rgba(198,164,59,0.02) 100%);
        border-radius: 20px;
        padding: 50px 30px;
        margin: 80px -40px -80px;
    }

    .btn-back {
        background: linear-gradient(135deg, var(--primary), #1a4a7a);
        color: var(--white);
        padding: 14px 38px;
        border-radius: 50px;
        border: none;
        font-size: 13px;
        letter-spacing: 1.5px;
        cursor: pointer;
        transition: var(--transition);
        font-weight: 700;
        box-shadow: 0 8px 20px rgba(0,51,102,0.2);
    }

    .btn-back:hover {
        background: linear-gradient(135deg, var(--gold), #d4a947);
        color: var(--primary);
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 12px 35px rgba(198,164,59,0.3);
        letter-spacing: 2px;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .news-hero h1 {
            font-size: 2.2rem;
        }
        .slider-wrapper {
            padding: 0 20px;
            margin: -50px auto 80px;
        }
        .news-track {
            gap: 30px;
            padding: 30px 10px 40px;
        }
        .img-circle-frame {
            width: 160px;
            height: 160px;
            border-width: 4px;
        }
        .circle-card {
            min-width: 180px;
        }
        .title-main {
            font-size: 13px;
        }
        .reader-title-display {
            font-size: 2rem;
        }
        .reader-hero-img {
            max-height: 350px;
        }
        .reader-article-body {
            font-size: 15px;
            line-height: 1.8;
        }
        .reader-content-wrap {
            padding: 30px 25px 60px;
        }
    }

    @media (max-width: 480px) {
        .img-circle-frame {
            width: 130px;
            height: 130px;
        }
        .circle-card {
            min-width: 140px;
        }
        .title-main {
            font-size: 12px;
        }
        .news-hero h1 {
            font-size: 1.8rem;
        }
        .reader-title-display {
            font-size: 1.6rem;
        }
        .reader-article-body {
            font-size: 14px;
        }
        .reader-footer {
            margin: 60px -25px -60px;
        }
    }
</style>

<!-- HERO SECTION -->
<div class="news-hero">
    <div class="news-hero-content">
        <h1>Berita Terkini</h1>
        <p>Discover Geosite Toba</p>
    </div>
</div>

<!-- SECTION SLIDER -->
<div class="slider-wrapper">
    <div class="news-track" id="newsTrack">
        @forelse($berita as $item)
        <div class="circle-card" onclick="openReader({{ $item->id }})">
            <div class="img-circle-frame">
                @if($item->gambar)
                    <img src="{{ $item->gambar }}" alt="{{ $item->judul }}" loading="lazy">
                @else
                    <img src="{{ asset('image/default.jpg') }}" alt="News">
                @endif
            </div>
            <span class="meta-tag">Jelajahi</span>
            <h3 class="title-main">{{ Str::limit($item->judul, 40) }}</h3>
            <div class="card-date">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</div>
        </div>
        @empty
        <div class="empty-news">
            <i class="fas fa-newspaper"></i>
            <p class="title-main" style="margin-top: 15px;">Belum Ada Berita</p>
            <p style="font-size: 13px; color: #999;">Silakan tambah berita melalui panel admin.</p>
        </div>
        @endforelse
    </div>
</div>

<!-- READER OVERLAY (ANIMASI SLIDE-UP PREMIUM) -->
<div id="fullReader">
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
    
    <div class="reader-nav">
        <div class="reader-logo">Geo<span>Toba</span></div>
        <button class="btn-close-circle" onclick="closeReader()">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="reader-content-wrap">
        <div class="reader-header">
            <span class="reader-date" id="r-date"></span>
            <h1 id="r-title" class="reader-title-display"></h1>
            <div class="reader-divider"></div>
            <div class="reader-author">
                <i class="far fa-user"></i>
                <span id="r-author">Admin GeoToba</span>
            </div>
        </div>

        <img id="r-img" src="" class="reader-hero-img" alt="">

        <div id="r-content" class="reader-article-body"></div>

        <div class="reader-footer">
            <button class="btn-back" onclick="closeReader()">
                <i class="fas fa-arrow-left"></i> Kembali ke Berita
            </button>
        </div>
    </div>
</div>

<script>
    // Data berita dari server
    const newsData = @json($berita->items());

    function openReader(id) {
        const item = newsData.find(x => x.id === id);
        if(!item) return;

        // Set content
        document.getElementById('r-title').innerText = item.judul;
        document.getElementById('r-content').innerHTML = item.konten;
        document.getElementById('r-img').src = item.gambar || '{{ asset("image/default.jpg") }}';
        document.getElementById('r-date').innerText = new Date(item.created_at).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
        document.getElementById('r-author').innerHTML = item.penulis || 'Admin GeoToba';

        // Aktifkan Reader
        const reader = document.getElementById('fullReader');
        reader.classList.add('active');
        document.body.style.overflow = 'hidden';

        // Reset Scroll Progress
        document.getElementById("myBar").style.width = "0%";
        
        // Increment views via AJAX
        fetch(`/api/berita/${id}/view`, { 
            method: 'POST', 
            headers: { 
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            } 
        }).catch(err => console.log('View increment error:', err));
    }

    function closeReader() {
        const reader = document.getElementById('fullReader');
        reader.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Progress Bar saat scroll
    const readerElement = document.getElementById('fullReader');
    readerElement.onscroll = function() {
        const winScroll = readerElement.scrollTop;
        const height = readerElement.scrollHeight - readerElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    };

    // ESC key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (document.getElementById('fullReader').classList.contains('active')) {
                closeReader();
            }
        }
    });
</script>

@endsection