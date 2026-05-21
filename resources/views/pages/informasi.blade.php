@extends('layouts.app')

@section('title', 'Informasi Terbaru - Geosite Danau Toba')

@section('content')

<style>
    /* ── FONTS ── */
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Inter:wght@300;400;500;600;700&display=swap');

    :root {
        --primary:  #003366;
        --gold:     #c6a43b;
        --gold-lt:  rgba(198,164,59,0.15);
        --white:    #ffffff;
        --gray:     #64748b;
        --shadow:   0 8px 32px rgba(0,51,102,0.10);
        --shadow-lg:0 20px 50px rgba(0,51,102,0.18);
    }

    /* ── HERO ── */
    .info-hero {
        height: 46vh;
        min-height: 320px;
        background: linear-gradient(160deg, rgba(0,30,70,0.82) 0%, rgba(0,51,102,0.55) 60%, rgba(0,80,130,0.45) 100%),
                    url('/image/SBH/sejarah.png') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        margin-top: 76px;
        position: relative;
        overflow: hidden;
    }
    .info-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 80% 60% at 50% 120%, rgba(198,164,59,0.18), transparent);
        pointer-events: none;
    }
    .info-hero-inner {
        position: relative;
        z-index: 2;
        animation: fadeSlideUp 0.9s cubic-bezier(0.34,1.2,0.64,1) both;
    }
    @keyframes fadeSlideUp {
        from { opacity:0; transform:translateY(36px); }
        to   { opacity:1; transform:translateY(0); }
    }
    .info-hero-eyebrow {
        font-size: 0.65rem;
        letter-spacing: 0.38em;
        text-transform: uppercase;
        color: #e8c96a;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        margin-bottom: 14px;
    }
    .info-hero h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2rem, 5vw, 3.6rem);
        font-weight: 600;
        letter-spacing: 0.02em;
        line-height: 1.2;
        margin-bottom: 14px;
        text-shadow: 0 2px 18px rgba(0,0,0,0.35);
    }
    .info-hero-divider {
        width: 40px;
        height: 1.5px;
        background: #c6a43b;
        margin: 0 auto 14px;
        opacity: 0.7;
    }
    .info-hero p {
        font-size: 0.82rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        opacity: 0.8;
        font-family: 'Inter', sans-serif;
        font-weight: 400;
    }

    /* ── MAIN SECTION ── */
    .info-section {
        padding: 90px 0 100px;
        background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fa 100%);
        min-height: 60vh;
    }
    .info-container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 28px;
    }

    /* Section header */
    .info-section-header {
        text-align: center;
        margin-bottom: 60px;
    }
    .info-section-eyebrow {
        font-size: 0.62rem;
        letter-spacing: 0.42em;
        text-transform: uppercase;
        color: var(--gold);
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        margin-bottom: 12px;
    }
    .info-section-header h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(1.8rem, 3.5vw, 2.8rem);
        font-weight: 600;
        color: var(--primary);
        line-height: 1.25;
        margin-bottom: 16px;
    }
    .info-section-header h2 em { font-style: italic; color: var(--gold); }
    .info-header-divider {
        width: 42px;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--gold), transparent);
        margin: 0 auto 14px;
    }
    .info-section-header p {
        color: var(--gray);
        font-size: 0.9rem;
        max-width: 520px;
        margin: 0 auto;
        line-height: 1.75;
    }

    /* ── 4-COLUMN GRID ── */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 28px;
    }

    /* ── CARD ── */
    .info-card {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(0,51,102,0.07);
        box-shadow: var(--shadow);
        transition: transform 0.38s cubic-bezier(0.34,1.2,0.64,1),
                    box-shadow 0.38s ease,
                    border-color 0.3s ease;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    .info-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-color: rgba(198,164,59,0.3);
    }

    /* Top accent line */
    .info-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--gold));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s cubic-bezier(0.4,0,0.2,1);
        z-index: 2;
    }
    .info-card:hover::before { transform: scaleX(1); }

    /* ── Icon area ── */
    .info-card-icon-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 32px 28px 18px;
        background: linear-gradient(135deg, #f8fbff 0%, #edf4fb 100%);
        border-bottom: 1px solid rgba(0,51,102,0.06);
        position: relative;
        overflow: hidden;
    }
    .info-card-icon-wrap::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 50%, rgba(198,164,59,0.12), transparent 70%);
        opacity: 0;
        transition: opacity 0.4s;
    }
    .info-card:hover .info-card-icon-wrap::after { opacity: 1; }

    .info-card-icon {
        width: 68px;
        height: 68px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--gold-lt), rgba(0,51,102,0.07));
        border: 2px solid rgba(198,164,59,0.28);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.42s cubic-bezier(0.34,1.2,0.64,1);
        position: relative;
        z-index: 1;
    }
    .info-card:hover .info-card-icon {
        background: linear-gradient(135deg, var(--gold), #d4a947);
        border-color: var(--gold);
        transform: rotate(360deg) scale(1.1);
        box-shadow: 0 8px 24px rgba(198,164,59,0.35);
    }
    .info-card-icon i {
        font-size: 1.6rem;
        color: var(--gold);
        transition: color 0.4s;
    }
    .info-card:hover .info-card-icon i { color: #fff; }

    /* ── Card body ── */
    .info-card-body {
        padding: 22px 24px 28px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .info-card-order {
        font-size: 0.58rem;
        letter-spacing: 0.32em;
        text-transform: uppercase;
        color: var(--gold);
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        margin-bottom: 8px;
    }
    .info-card-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.15rem;
        font-weight: 600;
        color: var(--primary);
        line-height: 1.45;
        margin-bottom: 12px;
    }
    .info-card-excerpt {
        font-size: 0.82rem;
        color: var(--gray);
        line-height: 1.75;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ── Empty state ── */
    .info-empty {
        grid-column: 1 / -1;
        text-align: center;
        padding: 80px 20px;
    }
    .info-empty i {
        font-size: 3.5rem;
        color: rgba(0,51,102,0.12);
        margin-bottom: 20px;
        display: block;
    }
    .info-empty p {
        color: var(--gray);
        font-size: 1rem;
    }

    /* ── CTA STRIP ── */
    .info-cta {
        background: linear-gradient(135deg, #003366 0%, #0a4a7a 100%);
        padding: 72px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .info-cta::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 0%, rgba(198,164,59,0.22), transparent 65%);
        pointer-events: none;
    }
    .info-cta-inner { position: relative; z-index: 1; max-width: 600px; margin: 0 auto; padding: 0 24px; }
    .info-cta h3 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(1.6rem, 3vw, 2.4rem);
        font-weight: 500;
        color: #fff;
        margin-bottom: 12px;
    }
    .info-cta h3 em { font-style: italic; color: #e8c96a; }
    .info-cta-divider {
        width: 36px; height: 1.5px;
        background: var(--gold);
        margin: 0 auto 16px;
        opacity: 0.6;
    }
    .info-cta p {
        color: rgba(255,255,255,0.72);
        font-size: 0.88rem;
        line-height: 1.8;
        margin-bottom: 36px;
    }
    .info-cta-btn {
        display: inline-block;
        border: 1.5px solid rgba(255,255,255,0.55);
        color: #fff;
        padding: 14px 50px;
        font-size: 0.68rem;
        letter-spacing: 0.28em;
        text-transform: uppercase;
        text-decoration: none;
        font-weight: 600;
        border-radius: 50px;
        background: transparent;
        transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
        position: relative;
        overflow: hidden;
    }
    .info-cta-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--gold);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s cubic-bezier(0.4,0,0.2,1);
        z-index: -1;
    }
    .info-cta-btn:hover::before { transform: scaleX(1); }
    .info-cta-btn:hover {
        border-color: var(--gold);
        color: var(--primary);
        transform: translateY(-4px);
        box-shadow: 0 12px 36px rgba(198,164,59,0.28);
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 1100px) { .info-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (max-width: 780px)  { .info-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; } }
    @media (max-width: 500px)  { .info-grid { grid-template-columns: 1fr; } .info-section { padding: 60px 0 72px; } }
</style>

{{-- ==================== HERO ==================== --}}
<section class="info-hero" aria-label="Halaman Informasi">
    <div class="info-hero-inner">
        <div class="info-hero-eyebrow">Geopark Danau Toba &bull; Samosir</div>
        <h1>Informasi <em style="font-style:italic;color:#e8c96a;">Terbaru</em></h1>
        <div class="info-hero-divider"></div>
        <p>Berita & Pengetahuan Warisan Geologi Kelas Dunia</p>
    </div>
</section>

{{-- ==================== GRID INFORMASI ==================== --}}
<section class="info-section">
    <div class="info-container">

        {{-- Header --}}
        <div class="info-section-header">
            <div class="info-section-eyebrow">Pengetahuan &amp; Wawasan</div>
            <h2>Penyampaian <em>Informasi</em></h2>
            <div class="info-header-divider"></div>
            <p>Temukan informasi mendalam tentang geologi, budaya, dan keajaiban alam Kaldera Toba dan Samosir</p>
        </div>

        {{-- 4-Column Icon Card Grid --}}
        @php
            $icons = [
                'fas fa-mountain',
                'fas fa-water',
                'fas fa-fire',
                'fas fa-leaf',
                'fas fa-globe-asia',
                'fas fa-landmark',
                'fas fa-binoculars',
                'fas fa-compass',
                'fas fa-map-marked-alt',
                'fas fa-star',
                'fas fa-book-open',
                'fas fa-camera',
            ];
        @endphp

        <div class="info-grid">
            @forelse($sejarahList as $index => $item)
            <div class="info-card">
                {{-- Icon area --}}
                <div class="info-card-icon-wrap">
                    <div class="info-card-icon">
                        <i class="{{ $icons[$index % count($icons)] }}"></i>
                    </div>
                </div>
                {{-- Body --}}
                <div class="info-card-body">
                    <div class="info-card-order">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="info-card-title">{{ $item->judul }}</div>
                    <div class="info-card-excerpt">
                        {{ Str::limit(strip_tags($item->konten), 180) }}
                    </div>
                </div>
            </div>
            @empty
            <div class="info-empty">
                <i class="fas fa-scroll"></i>
                <p>Belum ada informasi yang tersedia.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

{{-- ==================== CTA ==================== --}}
<section class="info-cta">
    <div class="info-cta-inner">
        <h3>Jelajahi <em>Destinasi</em> Kami</h3>
        <div class="info-cta-divider"></div>
        <p>Temukan keindahan Pantai Batu Hoda, Museum Huta Bolon, dan keajaiban alam Samosir yang menakjubkan</p>
        <a href="{{ url('/') }}" class="info-cta-btn">Kembali ke Beranda</a>
    </div>
</section>

@endsection