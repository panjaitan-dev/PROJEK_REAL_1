@extends('layouts.app')

@section('title', 'Sejarah Caldera Toba - Geosite Danau Toba')

@section('content')

<style>
    .sejarah-hero {
        height: 45vh;
        background: linear-gradient(rgba(0, 51, 102, 0.6), rgba(0, 102, 153, 0.4)), url('/image/SBH/sejarah.png');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    .sejarah-hero h1 { 
        font-size: 3.5rem; 
        font-family: 'Cormorant Garamond', serif; 
        margin-bottom: 12px;
        text-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
    }
    .sejarah-hero p { 
        font-size: 0.9rem; 
        letter-spacing: 0.2em; 
        text-transform: uppercase; 
        opacity: 0.85;
    }

    .section { padding: 60px 0; }
    .bg-light { background: linear-gradient(135deg, #e0ecf7 0%, #d4e4f2 100%); }
    .container { max-width: 1100px; margin: 0 auto; padding: 0 24px; }
    .section-title { text-align: center; margin-bottom: 45px; }
    .section-title h2 { 
        font-size: 2rem; 
        font-family: 'Cormorant Garamond', serif; 
        color: #003366; 
    }
    .divider { width: 50px; height: 2px; background: #c6a43b; margin: 10px auto 0; }

    .sejarah-grid { display: flex; flex-direction: column; gap: 45px; }
    .sejarah-item { display: flex; align-items: center; gap: 50px; flex-wrap: wrap; }
    .sejarah-item.reverse { flex-direction: row-reverse; }
    .sejarah-text { flex: 1; line-height: 1.8; color: #2c5f8a; font-size: 0.95rem; }
    .sejarah-image { 
        flex: 1; 
        border-radius: 16px; 
        overflow: hidden; 
        box-shadow: 0 10px 25px rgba(0, 51, 102, 0.15); 
    }
    .sejarah-image img { width: 100%; height: 260px; object-fit: cover; transition: 0.3s; }
    .sejarah-image:hover img { transform: scale(1.02); }

    .timeline {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 30px;
        position: relative;
    }
    .timeline::before {
        content: '';
        position: absolute;
        top: 30px;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #c6a43b 0%, #003366 50%, #c6a43b 100%);
        z-index: 0;
    }
    .timeline-item {
        flex: 1;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 16px;
        padding: 30px 20px;
        text-align: center;
        transition: all 0.4s ease;
        box-shadow: 0 8px 20px rgba(0, 51, 102, 0.1);
        border: 2px solid transparent;
        position: relative;
        z-index: 1;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 20px;
        background: linear-gradient(135deg, #c6a43b 0%, #d4a947 100%);
        border-radius: 50%;
        border: 4px solid #f8f9fa;
        z-index: 2;
    }
    .timeline-item:hover { 
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 51, 102, 0.2);
        border-color: #c6a43b;
        background: linear-gradient(135deg, #fffbf0 0%, #ffffff 100%);
    }
    .timeline-item:hover::before {
        background: linear-gradient(135deg, #003366 0%, #0a4a7a 100%);
        box-shadow: 0 0 15px rgba(198, 164, 59, 0.6);
    }
    .timeline-year { 
        font-size: 1.5rem; 
        font-weight: 800; 
        color: #c6a43b;
        background: linear-gradient(135deg, rgba(198, 164, 59, 0.1) 0%, rgba(0, 51, 102, 0.05) 100%);
        padding: 12px 16px;
        border-radius: 12px;
        margin-bottom: 12px;
        letter-spacing: 0.5px;
    }
    .timeline-title { 
        font-weight: 700; 
        color: #003366;
        font-size: 1.1rem;
        line-height: 1.4;
    }

    .fakta-grid { 
        display: grid; 
        grid-template-columns: repeat(3, 1fr); 
        gap: 25px; 
        margin-top: 30px; 
    }
    .fakta-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        text-align: center;
        transition: 0.3s;
    }
    .fakta-card:hover { transform: translateY(-5px); }
    .fakta-number { font-size: 2rem; font-weight: 700; color: #c6a43b; }
    .fakta-title { font-weight: 600; color: #003366; }

    .cta-section {
        background: linear-gradient(135deg, #003366 0%, #0a4a7a 100%);
        padding: 60px 0;
        text-align: center;
    }
    .cta-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 12px 35px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
    }
    .cta-btn:hover { background: white; }

    @media (max-width: 768px) {
        .sejarah-hero h1 { font-size: 2.2rem; }
        .sejarah-item, .sejarah-item.reverse { flex-direction: column; text-align: center; }
        .timeline { flex-direction: column; }
        .fakta-grid { grid-template-columns: 1fr; }
    }
</style>

<!-- HERO -->
<section class="sejarah-hero">
    <div data-aos="fade-up">
        <h1>Sejarah Caldera Toba</h1>
        <p>Warisan Geologi Kelas Dunia</p>
    </div>
</section>

<!-- SEJARAH BERSILANG dari DATABASE -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Terbentuknya Danau Toba</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-grid">
            @forelse($sejarahList as $index => $item)
            <div class="sejarah-item {{ $index % 2 == 1 ? 'reverse' : '' }}" data-aos="fade-{{ $index % 2 == 0 ? 'right' : 'left' }}">
                <div class="sejarah-image">
                    @if($item->gambar)
                        <img src="{{ $item->gambar }}" alt="{{ $item->judul }}">
                    @else
                        <img src="/image/sejarah{{ $index+1 }}.jpg" alt="{{ $item->judul }}">
                    @endif
                </div>
                <div class="sejarah-text">
                    {!! $item->konten !!}
                </div>
            </div>
            @empty
            <div class="text-center py-5">
                <p>Belum ada data sejarah.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- TIMELINE 4 LETUSAN (STATIS) -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>4 Periode Letusan</h2>
            <div class="divider"></div>
            <p>Proses pembentukan Kaldera Toba melalui 4 letusan besar</p>
        </div>
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-up">
                <div class="timeline-year">1,2 Juta Tahun</div>
                <div class="timeline-title">Letusan Pertama</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="50">
                <div class="timeline-year">840.000 Tahun</div>
                <div class="timeline-title">Letusan Kedua</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-year">450.000 Tahun</div>
                <div class="timeline-title">Letusan Ketiga</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="150">
                <div class="timeline-year">74.000 Tahun</div>
                <div class="timeline-title">Letusan Keempat</div>
            </div>
        </div>
    </div>
</section>

<!-- FAKTA UNIK (STATIS) -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fakta Unik Danau Toba</h2>
            <div class="divider"></div>
        </div>
        <div class="fakta-grid">
            <div class="fakta-card" data-aos="fade-up">
                <div class="fakta-number">#1</div>
                <div class="fakta-title">Danau Vulkanik Terbesar</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="50">
                <div class="fakta-number">#2</div>
                <div class="fakta-title">Pulau di Tengah Danau</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="100">
                <div class="fakta-number">#3</div>
                <div class="fakta-title">UNESCO Global Geopark</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Jelajahi Geosite Lainnya</h3>
            <div class="divider"></div>
            <p>Temukan keajaiban geologi lainnya di Geopark Danau Toba</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 700, once: true, offset: 50 });</script>

@endsection