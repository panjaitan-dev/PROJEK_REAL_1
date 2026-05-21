@extends('layouts.app')

@section('title', 'Kontak - Geosite Danau Toba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Inter:wght@300;400;500;600;700&display=swap');

    :root {
        --primary: #003366;
        --gold:    #c6a43b;
        --gold-lt: rgba(198,164,59,0.13);
        --gray:    #64748b;
        --shadow:  0 8px 32px rgba(0,51,102,0.10);
        --shadow-lg: 0 20px 50px rgba(0,51,102,0.18);
    }

    /* ── HERO ── */
    .kontak-hero {
        height: 46vh;
        min-height: 320px;
        background: linear-gradient(160deg, rgba(0,30,70,0.82) 0%, rgba(0,51,102,0.55) 60%, rgba(0,80,130,0.45) 100%),
                    url('/image/kontak-hero.jpg') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        margin-top: 76px;
        position: relative;
        overflow: hidden;
    }
    .kontak-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 80% 60% at 50% 120%, rgba(198,164,59,0.18), transparent);
        pointer-events: none;
    }
    .kontak-hero-inner {
        position: relative; z-index: 2;
        animation: kHeroUp 0.9s cubic-bezier(0.34,1.2,0.64,1) both;
    }
    @keyframes kHeroUp {
        from { opacity:0; transform:translateY(36px); }
        to   { opacity:1; transform:translateY(0); }
    }
    .kontak-hero-eyebrow {
        font-size: 0.63rem; letter-spacing: 0.38em;
        text-transform: uppercase; color: #e8c96a;
        font-family: 'Inter', sans-serif; font-weight: 500; margin-bottom: 14px;
    }
    .kontak-hero h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2rem, 5vw, 3.6rem);
        font-weight: 600; letter-spacing: 0.02em; line-height: 1.2;
        margin-bottom: 14px; text-shadow: 0 2px 18px rgba(0,0,0,0.35);
    }
    .kontak-hero-divider { width:40px; height:1.5px; background:#c6a43b; margin:0 auto 14px; opacity:.7; }
    .kontak-hero p {
        font-size: 0.82rem; letter-spacing: 0.25em; text-transform: uppercase;
        opacity: .8; font-family: 'Inter',sans-serif; font-weight: 400;
    }

    /* ── SECTION ── */
    .kontak-section {
        padding: 90px 0 100px;
        background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fa 100%);
    }
    .kontak-container { max-width: 1240px; margin: 0 auto; padding: 0 28px; }

    /* section header */
    .kontak-header { text-align: center; margin-bottom: 60px; }
    .kontak-eyebrow {
        font-size: 0.62rem; letter-spacing: 0.42em; text-transform: uppercase;
        color: var(--gold); font-family: 'Inter',sans-serif; font-weight: 600; margin-bottom: 12px;
    }
    .kontak-header h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(1.8rem, 3.5vw, 2.8rem);
        font-weight: 600; color: var(--primary); line-height: 1.25; margin-bottom: 16px;
    }
    .kontak-header h2 em { font-style: italic; color: var(--gold); }
    .kontak-header-divider { width:42px; height:2px; background:linear-gradient(90deg,transparent,var(--gold),transparent); margin:0 auto 14px; }
    .kontak-header p { color: var(--gray); font-size: .9rem; max-width: 500px; margin: 0 auto; line-height: 1.75; }

    /* ── CONTACT CARD GRID (4 columns) ── */
    .kontak-cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 26px;
        margin-bottom: 70px;
    }
    .kontak-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 36px 24px 32px;
        text-align: center;
        border: 1px solid rgba(0,51,102,0.07);
        box-shadow: var(--shadow);
        transition: transform 0.38s cubic-bezier(0.34,1.2,0.64,1),
                    box-shadow 0.38s ease, border-color 0.3s;
        position: relative;
        overflow: hidden;
    }
    .kontak-card::before {
        content: '';
        position: absolute; top:0; left:0; right:0; height:3px;
        background: linear-gradient(90deg, var(--primary), var(--gold));
        transform: scaleX(0); transform-origin: left;
        transition: transform 0.4s cubic-bezier(0.4,0,0.2,1);
    }
    .kontak-card:hover::before { transform: scaleX(1); }
    .kontak-card:hover {
        transform: translateY(-12px);
        box-shadow: var(--shadow-lg);
        border-color: rgba(198,164,59,0.28);
    }

    .kontak-card-icon {
        width: 70px; height: 70px; border-radius: 50%;
        background: linear-gradient(135deg, var(--gold-lt), rgba(0,51,102,0.06));
        border: 2px solid rgba(198,164,59,0.28);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 22px;
        transition: all 0.44s cubic-bezier(0.34,1.2,0.64,1);
    }
    .kontak-card:hover .kontak-card-icon {
        background: linear-gradient(135deg, var(--gold), #d4a947);
        border-color: var(--gold);
        transform: rotate(360deg) scale(1.1);
        box-shadow: 0 10px 26px rgba(198,164,59,0.35);
    }
    .kontak-card-icon i { font-size: 1.7rem; color: var(--gold); transition: color .4s; }
    .kontak-card:hover .kontak-card-icon i { color: #fff; }
    .kontak-card h3 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.2rem; font-weight: 600;
        color: var(--primary); margin-bottom: 14px;
    }
    .kontak-card p, .kontak-card a {
        font-size: 0.83rem; color: var(--gray); line-height: 1.75;
        text-decoration: none; display: block; transition: color .3s;
    }
    .kontak-card a:hover { color: var(--gold); }
    .kontak-card:hover p { color: #334155; }

    /* ── MAP ── */
    .kontak-map { margin-bottom: 70px; }
    .kontak-map-label {
        text-align: center; margin-bottom: 28px;
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.5rem; font-weight: 500; color: var(--primary);
    }
    .kontak-map-label em { font-style: italic; color: var(--gold); }
    .kontak-map iframe {
        width: 100%; height: 420px; border: 0;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0,51,102,0.15), 0 0 0 1px rgba(198,164,59,0.15);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .kontak-map iframe:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }

    /* ── INFO ROW (destinasi + sosmed + jam) ── */
    .kontak-info-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 28px;
    }
    .kontak-info-card {
        background: #fff;
        border-radius: 20px;
        padding: 32px 28px;
        border: 1px solid rgba(0,51,102,0.07);
        box-shadow: var(--shadow);
    }
    .kontak-info-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.3rem; font-weight: 600;
        color: var(--primary); margin-bottom: 22px;
        padding-bottom: 14px;
        border-bottom: 2px solid var(--gold);
    }

    /* dest list */
    .dest-list { display: flex; flex-direction: column; gap: 14px; }
    .dest-item {
        display: flex; align-items: center; gap: 16px;
        padding: 16px; border-radius: 14px;
        background: linear-gradient(135deg, #f8fbff, #edf4fb);
        border: 1px solid rgba(0,51,102,0.06);
        cursor: pointer;
        transition: all 0.32s cubic-bezier(0.34,1.2,0.64,1);
    }
    .dest-item:hover {
        background: linear-gradient(135deg, var(--gold-lt), rgba(198,164,59,0.07));
        transform: translateX(10px);
        border-color: rgba(198,164,59,0.3);
        box-shadow: 0 6px 18px rgba(198,164,59,0.12);
    }
    .dest-icon {
        width: 48px; height: 48px; flex-shrink: 0; border-radius: 50%;
        background: #fff;
        border: 2px solid rgba(198,164,59,0.22);
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 4px 12px rgba(0,51,102,0.08);
        transition: all 0.4s cubic-bezier(0.34,1.2,0.64,1);
    }
    .dest-item:hover .dest-icon {
        background: linear-gradient(135deg, var(--gold), #d4a947);
        border-color: var(--gold);
        transform: rotate(360deg) scale(1.12);
        box-shadow: 0 8px 20px rgba(198,164,59,0.3);
    }
    .dest-icon i { font-size: 1.15rem; color: var(--gold); transition: color .4s; }
    .dest-item:hover .dest-icon i { color: #fff; }
    .dest-info h4 { font-size: 0.9rem; font-weight: 600; color: var(--primary); margin-bottom: 3px; }
    .dest-info p  { font-size: 0.75rem; color: var(--gray); line-height: 1.45; }

    /* social icons */
    .social-row { display: flex; justify-content: center; gap: 14px; flex-wrap: wrap; margin-bottom: 28px; }
    .social-row a {
        width: 50px; height: 50px;
        background: linear-gradient(135deg, #f0f4f8, #e8eef5);
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        color: var(--primary); font-size: 1.25rem;
        border: 2px solid rgba(198,164,59,0.2);
        text-decoration: none;
        transition: all 0.45s cubic-bezier(0.34,1.2,0.64,1);
        box-shadow: 0 4px 14px rgba(0,51,102,0.08);
    }
    .social-row a:hover {
        background: linear-gradient(135deg, var(--gold), #d4a947);
        color: #fff; border-color: var(--gold);
        transform: translateY(-8px) rotate(360deg) scale(1.1);
        box-shadow: 0 12px 28px rgba(198,164,59,0.3);
    }

    /* hours box */
    .hours-box {
        background: linear-gradient(135deg, var(--primary) 0%, #1a4a7a 100%);
        border-radius: 16px; padding: 26px 22px;
        text-align: center; color: #fff;
        border: 1px solid rgba(198,164,59,0.2);
        box-shadow: 0 12px 32px rgba(0,51,102,0.2);
        position: relative; overflow: hidden;
    }
    .hours-box::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(circle at 50% 0%, rgba(198,164,59,0.2), transparent 65%);
        pointer-events: none;
    }
    .hours-box h4 {
        font-size: 0.95rem; font-weight: 700;
        letter-spacing: 0.06em; margin-bottom: 14px;
        position: relative; z-index: 1;
    }
    .hours-box p {
        font-size: 0.82rem; opacity: .9;
        line-height: 1.85; font-weight: 400;
        position: relative; z-index: 1;
    }
    .hours-divider { width:36px; height:1.5px; background:rgba(255,255,255,.4); margin:14px auto; }

    /* ── CTA ── */
    .kontak-cta {
        background: linear-gradient(135deg, var(--primary) 0%, #0a4a7a 100%);
        padding: 72px 0; text-align: center; position: relative; overflow: hidden;
    }
    .kontak-cta::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(circle at 50% 0%, rgba(198,164,59,0.22), transparent 65%);
        pointer-events: none;
    }
    .kontak-cta-inner { position: relative; z-index: 1; max-width: 580px; margin: 0 auto; padding: 0 24px; }
    .kontak-cta h3 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 500;
        color: #fff; margin-bottom: 12px;
    }
    .kontak-cta h3 em { font-style: italic; color: #e8c96a; }
    .kontak-cta-divider { width:36px; height:1.5px; background:var(--gold); margin:0 auto 16px; opacity:.6; }
    .kontak-cta p { color:rgba(255,255,255,.72); font-size:.88rem; line-height:1.8; margin-bottom:36px; }
    .kontak-cta-btn {
        display: inline-block;
        border: 1.5px solid rgba(255,255,255,.55);
        color: #fff; padding: 14px 50px;
        font-size: 0.68rem; letter-spacing: .28em; text-transform: uppercase;
        text-decoration: none; font-weight: 600; border-radius: 50px;
        background: transparent;
        transition: all .4s cubic-bezier(0.4,0,0.2,1);
        position: relative; overflow: hidden;
    }
    .kontak-cta-btn::before {
        content: ''; position: absolute; inset: 0;
        background: var(--gold); transform: scaleX(0); transform-origin: left;
        transition: transform .4s cubic-bezier(0.4,0,0.2,1); z-index: -1;
    }
    .kontak-cta-btn:hover::before { transform: scaleX(1); }
    .kontak-cta-btn:hover { border-color: var(--gold); color: var(--primary); transform: translateY(-4px); box-shadow: 0 12px 36px rgba(198,164,59,.28); }

    /* ── WHATSAPP FLOAT ── */
    .wa-float { position: fixed; bottom: 28px; right: 28px; z-index: 999; }
    .wa-float a {
        width: 58px; height: 58px; border-radius: 50%;
        background: linear-gradient(135deg, #25D366, #1fa855);
        display: flex; align-items: center; justify-content: center;
        color: #fff; font-size: 1.5rem; text-decoration: none;
        box-shadow: 0 8px 24px rgba(37,211,102,0.4);
        border: 2px solid rgba(255,255,255,.3);
        transition: all 0.45s cubic-bezier(0.34,1.2,0.64,1);
    }
    .wa-float a:hover { transform: scale(1.18) rotate(360deg); box-shadow: 0 12px 36px rgba(37,211,102,.55); }

    /* ── RESPONSIVE ── */
    @media (max-width: 1100px) { .kontak-cards { grid-template-columns: repeat(2,1fr); } }
    @media (max-width: 768px)  {
        .kontak-cards { grid-template-columns: repeat(2,1fr); gap: 18px; }
        .kontak-info-row { grid-template-columns: 1fr; }
        .kontak-map iframe { height: 300px; }
        .kontak-section { padding: 60px 0 72px; }
    }
    @media (max-width: 480px)  { .kontak-cards { grid-template-columns: 1fr; } }
</style>

{{-- HERO --}}
<section class="kontak-hero" aria-label="Halaman Kontak">
    <div class="kontak-hero-inner">
        <div class="kontak-hero-eyebrow">Geosite Danau Toba &bull; Samosir</div>
        <h1>Hubungi <em style="font-style:italic;color:#e8c96a;">Kami</em></h1>
        <div class="kontak-hero-divider"></div>
        <p>Kami siap membantu perjalanan wisata Anda</p>
    </div>
</section>

{{-- MAIN --}}
<section class="kontak-section">
    <div class="kontak-container">

        {{-- Header --}}
        <div class="kontak-header">
            <div class="kontak-eyebrow">Informasi Kontak</div>
            <h2>Cara <em>Menghubungi</em> Kami</h2>
            <div class="kontak-header-divider"></div>
            <p>Jangan ragu untuk menghubungi kami melalui berbagai saluran komunikasi yang tersedia</p>
        </div>

        {{-- 4 Contact Cards --}}
        <div class="kontak-cards">
            <div class="kontak-card">
                <div class="kontak-card-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h3>Alamat</h3>
                <p>Geosite Danau Toba</p>
                <p>Desa Simanindo, Pulau Samosir</p>
                <p>Sumatera Utara, Indonesia</p>
            </div>
            <div class="kontak-card">
                <div class="kontak-card-icon"><i class="fas fa-phone-alt"></i></div>
                <h3>Telepon</h3>
                <a href="tel:+6281234567890">+62 812 3456 7890</a>
                <a href="tel:+6281398765432">+62 813 9876 5432</a>
                <a href="tel:062212345">(0622) 12345</a>
            </div>
            <div class="kontak-card">
                <div class="kontak-card-icon"><i class="fas fa-envelope"></i></div>
                <h3>Email</h3>
                <a href="mailto:info@geotoba.com">info@geotoba.com</a>
                <a href="mailto:reservasi@geotoba.com">reservasi@geotoba.com</a>
                <a href="mailto:support@geotoba.com">support@geotoba.com</a>
            </div>
            <div class="kontak-card">
                <div class="kontak-card-icon"><i class="fas fa-clock"></i></div>
                <h3>Jam Buka</h3>
                <p>Senin – Jumat</p>
                <p><strong style="color:#003366;">08:00 – 17:00 WIB</strong></p>
                <p>Sabtu – Minggu</p>
                <p><strong style="color:#003366;">08:00 – 18:00 WIB</strong></p>
            </div>
        </div>

        {{-- Map --}}
        <div class="kontak-map">
            <div class="kontak-map-label">Peta <em>Lokasi</em></div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255146.3323067858!2d98.6015525546252!3d2.6173426176378544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031d2590212727b%3A0x6335133649692f8d!2sPulau%20Samosir!5e0!3m2!1sid!2sid!4v1714980000000!5m2!1sid!2sid"
                loading="lazy"
                title="Peta Lokasi Geosite Simanindo Samosir"
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        {{-- Info Row --}}
        <div class="kontak-info-row">
            {{-- Destinasi --}}
            <div class="kontak-info-card">
                <div class="kontak-info-title">🗺 Destinasi Unggulan</div>
                <div class="dest-list">
                    <div class="dest-item" onclick="window.location.href='{{ route('destinasi') }}'">
                        <div class="dest-icon"><i class="fas fa-umbrella-beach"></i></div>
                        <div class="dest-info">
                            <h4>Batu Hoda Beach</h4>
                            <p>Pantai indah di tepi Danau Toba, Simanindo</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ route('destinasi') }}'">
                        <div class="dest-icon"><i class="fas fa-landmark"></i></div>
                        <div class="dest-info">
                            <h4>Museum Huta Bolon</h4>
                            <p>Pusat budaya dan sejarah Batak Toba</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ route('destinasi') }}'">
                        <div class="dest-icon"><i class="fas fa-mountain"></i></div>
                        <div class="dest-info">
                            <h4>Batu Pasa Pantai</h4>
                            <p>Formasi batuan unik dengan pemandangan danau</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ route('galeri') }}'">
                        <div class="dest-icon"><i class="fas fa-camera"></i></div>
                        <div class="dest-info">
                            <h4>Galeri Foto</h4>
                            <p>Koleksi foto terbaik Geopark Danau Toba</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sosmed + Jam --}}
            <div class="kontak-info-card">
                <div class="kontak-info-title">📱 Ikuti Kami</div>
                <div class="social-row">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                </div>
                <div class="hours-box">
                    <h4><i class="far fa-clock" style="margin-right:8px;color:#e8c96a;"></i>Jam Operasional</h4>
                    <div class="hours-divider"></div>
                    <p>Senin – Jumat: 08:00 – 17:00 WIB</p>
                    <p>Sabtu – Minggu: 08:00 – 18:00 WIB</p>
                    <div class="hours-divider"></div>
                    <p><i class="fas fa-map-marker-alt" style="color:#e8c96a;margin-right:6px;"></i>Simanindo, Pulau Samosir</p>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- CTA --}}
<section class="kontak-cta">
    <div class="kontak-cta-inner">
        <h3>Mulai <em>Petualangan</em> Anda</h3>
        <div class="kontak-cta-divider"></div>
        <p>Temukan keindahan alam dan budaya Samosir bersama kami. Kami siap memandu perjalanan terbaik Anda.</p>
        <a href="{{ url('/') }}" class="kontak-cta-btn">Kembali ke Beranda</a>
    </div>
</section>

{{-- WhatsApp Float --}}
<div class="wa-float">
    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener" aria-label="Hubungi via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
</div>

@endsection