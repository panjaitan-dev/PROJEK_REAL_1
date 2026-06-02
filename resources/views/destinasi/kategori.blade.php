@extends('layouts.app')

@section('title', 'Destinasi ' . $kategori . ' - Geosite Danau Toba')

@section('content')

<style>
@php
    $heroImage = 'image/SBH/DanauToba.webp';
    if (strtolower($kategori) === 'alam') {
        $heroImage = 'image/SBH/BatuHoda.webp';
    } elseif (strtolower($kategori) === 'buatan') {
        $heroImage = 'image/SBH/BatuPasa.webp';
    } elseif (strtolower($kategori) === 'budaya') {
        $heroImage = 'image/SBH/HutaBolon.webp';
    }
@endphp

    /* ==================== HERO SECTION ==================== */
    .page-hero {
        position: relative;
        height: 55vh; min-height: 360px;
        display: flex; align-items: center; justify-content: center;
        text-align: center; color: #fff;
        margin-top: 0; overflow: hidden;
        background: linear-gradient(135deg, rgba(0,51,102,0.85) 0%, rgba(0,0,0,0.3) 50%, rgba(0,51,102,0.7) 100%),
                    url('{{ asset($heroImage) }}') center/cover no-repeat;
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
        font-size: 0.65rem; letter-spacing: 0.35em;
        text-transform: uppercase; color: #c6a43b;
        font-weight: 600; margin-bottom: 12px;
    }
    .page-hero h1 {
        font-size: clamp(2.2rem, 5vw, 3.4rem);
        font-weight: 800; letter-spacing: 2px;
        margin-bottom: 10px;
        text-shadow: 0 2px 15px rgba(0,0,0,0.3);
    }
    .page-hero-sub {
        font-size: 0.85rem; letter-spacing: 2.5px;
        text-transform: uppercase; opacity: 0.8; font-weight: 500;
    }

    /* ==================== DESTINASI GRID ==================== */
    .destinasi-section {
        padding: 60px 0;
        background: #f8f9fa;
    }

    .destinasi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .dest-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
    }

    .dest-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px rgba(0,0,0,0.12);
    }

    .card-image {
        height: 220px;
        overflow: hidden;
        position: relative;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .dest-card:hover .card-image img {
        transform: scale(1.05);
    }

    .card-image::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(0,0,0,0.2),
            transparent
        );
    }

    .card-content {
        padding: 20px;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: #003366;
    }

    .card-location {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 0.7rem;
        color: #c6a43b;
        margin-bottom: 12px;
    }

    .card-location i {
        font-size: 0.6rem;
    }

    .card-desc {
        font-size: 0.85rem;
        color: #666;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .card-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .card-tags span {
        background: #f0f4f0;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        color: #003366;
    }

    .card-link {
        display: inline-block;
        margin-top: 14px;
        font-size: 0.8rem;
        font-weight: 600;
        color: #003366;
        text-decoration: none;
        border-bottom: 2px solid #c6a43b;
        transition: color 0.2s ease, border-color 0.2s ease;
    }

    .card-link:hover {
        color: #c6a43b;
        border-color: #003366;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .destinasi-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
    }

    @media (max-width: 768px) {
        .page-hero {
            min-height: 280px;
        }

        .page-hero h1 {
            font-size: 2rem;
        }

        .destinasi-section {
            padding: 40px 0;
        }

        .destinasi-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .card-image {
            height: 200px;
        }
    }
</style>

<!-- HERO SECTION -->
<section class="page-hero">
    <div class="page-hero-inner" data-aos="fade-up">
        <div class="page-hero-eyebrow">Geosite Danau Toba</div>
        <h1>Destinasi {{ $kategori }}</h1>
        <div class="page-hero-sub">{{ $deskripsi }}</div>
    </div>
</section>

<!-- DESTINASI GRID -->
<section class="destinasi-section">
    <div class="container">
        <div class="destinasi-grid">

            @forelse($destinasi as $item)

            <!-- DATA DARI DATABASE -->
            <div class="dest-card"
                 data-aos="fade-up"
                 data-aos-delay="{{ $loop->index * 100 }}">

                <div class="card-image">
                    <img src="{{ $item->gambar_utama_url }}"
                         alt="{{ $item->nama }}"
                         onerror="this.src='{{ asset('image/destinasi-hero.jpg') }}'">
                </div>

                <div class="card-content">

                    <h3 class="card-title">
                        {{ $item->nama }}
                    </h3>

                    <div class="card-location">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $item->lokasi }}
                    </div>

                    <p class="card-desc">
                        {{ $item->deskripsi }}
                    </p>

                    <div class="card-tags">
                        @if(is_array($item->tags))
                            @foreach($item->tags as $tag)
                                <span>#{{ $tag }}</span>
                            @endforeach
                        @endif
                    </div>

                    <!-- LINK AMAN -->
                    <a href="{{ $item->detail_url }}" class="card-link">
                        Jelajahi →
                    </a>

                </div>
            </div>

            @empty

            <!-- DATA MANUAL JIKA DATABASE KOSONG -->
            <div class="dest-card" data-aos="fade-up">

                <div class="card-image">
                    <img src="{{ asset('image/SBH/DanauToba.webp') }}"
                         alt="Danau Toba">
                </div>

                <div class="card-content">

                    <h3 class="card-title">
                        Danau Toba
                    </h3>

                    <div class="card-location">
                        <i class="fas fa-map-marker-alt"></i>
                        Sumatera Utara
                    </div>

                    <p class="card-desc">
                        Danau vulkanik terbesar di Asia Tenggara
                        dengan panorama alam yang sangat indah
                        dan udara yang sejuk.
                    </p>

                    <div class="card-tags">
                        <span>#Danau</span>
                        <span>#WisataAlam</span>
                        <span>#Geosite</span>
                    </div>

                    <!-- LINK AMAN -->
                    <a href="{{ url('/destinasi') }}" class="card-link">
                        Jelajahi →
                    </a>

                </div>
            </div>

            @endforelse

        </div>
    </div>
</section>

<!-- FONT AWESOME -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- AOS -->
<link rel="stylesheet"
href="https://unpkg.com/aos@next/dist/aos.css" />

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
</script>

@endsection