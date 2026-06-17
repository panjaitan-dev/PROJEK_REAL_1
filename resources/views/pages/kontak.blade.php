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
    .page-hero {
        position: relative;
        height: 55vh; min-height: 360px;
        display: flex; align-items: center; justify-content: center;
        text-align: center; color: #fff;
        margin-top: 0; overflow: hidden;
        background: linear-gradient(135deg, rgba(0,51,102,0.85) 0%, rgba(0,0,0,0.3) 50%, rgba(0,51,102,0.7) 100%),
                    url('{{ !empty($hs["kontak_hero_gambar"]) ? asset("storage/" . $hs["kontak_hero_gambar"]) : "/image/SBH/DanauToba.webp" }}') center top/cover no-repeat;
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
        grid-template-columns: repeat(3, 1fr);
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
    @media (max-width: 1100px) { .kontak-cards { grid-template-columns: repeat(3, 1fr); } }
    @media (max-width: 900px)  { .kontak-cards { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 768px)  {
        .kontak-section { padding: 50px 0 60px; }
        .kontak-container { padding: 0 14px; }
        .kontak-header { margin-bottom: 36px; }
        .kontak-cards { grid-template-columns: repeat(2, 1fr); gap: 14px; margin-bottom: 50px; }
        .kontak-card { padding: 26px 16px 22px; }
        .kontak-card-icon { width: 56px; height: 56px; }
        .kontak-card-icon i { font-size: 1.3rem; }
        .kontak-info-row { grid-template-columns: 1fr; gap: 20px; }
        .kontak-map iframe { height: 280px; }
        .kontak-map { margin-bottom: 50px; }
        .page-hero { height: 45vh; min-height: 260px; }
        .page-hero h1 { font-size: 2rem; }
        .wa-float a { width: 50px; height: 50px; font-size: 1.3rem; }
        .wa-float { bottom: 18px; right: 18px; }
    }
    @media (max-width: 480px) {
        .kontak-cards { grid-template-columns: 1fr; gap: 12px; }
        .page-hero h1 { font-size: 1.7rem; }
        .page-hero { height: 40vh; min-height: 230px; }
        .kontak-cta { padding: 50px 0; }
        .dest-item { gap: 12px; padding: 14px; }
        .dest-icon { width: 40px; height: 40px; }
    }
    /* ── CONTACT FORM ── */
    .kontak-form-section {
        margin-bottom: 70px;
    }
    .kontak-form-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px;
        border: 1px solid rgba(0,51,102,0.07);
        box-shadow: var(--shadow);
        transition: transform 0.38s ease, box-shadow 0.38s ease;
    }
    .kontak-form-card:hover {
        box-shadow: var(--shadow-lg);
    }
    .kontak-form-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.6rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 8px;
    }
    .kontak-form-subtitle {
        color: var(--gray);
        font-size: 0.88rem;
        margin-bottom: 28px;
    }
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        color: var(--primary);
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        margin-bottom: 8px;
        text-transform: uppercase;
        font-family: 'Inter', sans-serif;
    }
    .form-group input, .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        color: #1e293b;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
    }
    .form-group input:focus, .form-group textarea:focus {
        outline: none;
        border-color: var(--gold);
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(198,164,59,0.15);
    }
    .form-group textarea {
        resize: vertical;
    }
    .kontak-form-btn {
        display: block;
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, var(--primary) 0%, #0a4a7a 100%);
        color: #ffffff;
        border: none;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
        margin-top: 10px;
        font-family: 'Inter', sans-serif;
        box-shadow: 0 4px 12px rgba(0,51,102,0.15);
    }
    .kontak-form-btn:hover {
        background: linear-gradient(135deg, var(--gold) 0%, #d4a947 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(198,164,59,0.35);
    }
    .alert-success {
        background: rgba(34,197,94,0.1);
        border: 1px solid rgba(34,197,94,0.3);
        color: #15803d;
        padding: 14px 18px;
        border-radius: 12px;
        font-size: 0.88rem;
        margin-bottom: 22px;
        font-weight: 500;
        text-align: left;
    }
    .alert-error {
        background: rgba(239,68,68,0.1);
        border: 1px solid rgba(239,68,68,0.3);
        color: #b91c1c;
        padding: 14px 18px;
        border-radius: 12px;
        font-size: 0.88rem;
        margin-bottom: 22px;
        font-weight: 500;
        text-align: left;
    }

    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }
        .kontak-form-card {
            padding: 22px 16px;
        }
        .kontak-form-title { font-size: 1.3rem; }
        .kontak-form-section { margin-bottom: 50px; }
    }
    @media (max-width: 480px) {
        .kontak-form-card { padding: 18px 14px; }
        .form-group input, .form-group textarea { padding: 10px 12px; font-size: 0.85rem; }
    }
    
</style>

<!-- HERO -->
<section class="page-hero">
    <div class="page-hero-inner">
        <div class="page-hero-eyebrow">Geosite Danau Toba</div>
        <h1>{{ $hs['kontak_title'] ?? 'Hubungi Kami' }}</h1>
        <div class="page-hero-sub">{{ $hs['kontak_subtitle'] ?? 'Kami siap membantu perjalanan wisata Anda' }}</div>
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

        {{-- 3 Contact Cards --}}
        <div class="kontak-cards">
            {{-- Alamat --}}
            <div class="kontak-card">
                <div class="kontak-card-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h3>Alamat</h3>
                @forelse($contacts->where('tipe', 'alamat') as $alamat)
                    <div style="white-space: pre-line; font-size: 0.83rem; color: var(--gray); line-height: 1.75;">{{ $alamat->nilai }}</div>
                @empty
                    <p>Geosite Danau Toba</p>
                    <p>Desa Simanindo, Pulau Samosir</p>
                    <p>Sumatera Utara, Indonesia</p>
                @endforelse
            </div>

            {{-- Telepon --}}
            <div class="kontak-card">
                <div class="kontak-card-icon"><i class="fas fa-phone-alt"></i></div>
                <h3>Telepon</h3>
                @forelse($contacts->where('tipe', 'telepon') as $telp)
                    <a href="{{ $telp->tautan ?? 'javascript:void(0)' }}" target="{{ str_starts_with($telp->tautan, 'http') ? '_blank' : '_self' }}">
                        @if($telp->icon)
                            <i class="{{ $telp->icon }}"></i>
                        @endif
                        {{ $telp->nilai }}
                        @if($telp->nilai_tambahan)
                            <br><span style="font-size: 0.72rem; color: #64748b;">({{ $telp->nilai_tambahan }})</span>
                        @endif
                    </a>
                @empty
                    <a href="https://wa.me/6285362259937" target="_blank"><i class="fab fa-whatsapp"></i> +62 853 6225 9937<br><span style="font-size: 0.72rem; color: #64748b;">(Zen M. Siboro - Co-Founder)</span></a>
                    <a href="tel:+6285362259937"><i class="fas fa-phone-alt"></i> +62 853 6225 9937</a>
                @endforelse
            </div>

            {{-- Email --}}
            <div class="kontak-card">
                <div class="kontak-card-icon"><i class="fas fa-envelope"></i></div>
                <h3>Email</h3>
                @forelse($contacts->where('tipe', 'email') as $email)
                    <a href="{{ $email->tautan ?? 'mailto:' . $email->nilai }}">{{ $email->nilai }}</a>
                @empty
                    <a href="mailto:zenmarchelloboro@gmail.com">zenmarchelloboro@gmail.com</a>
                @endforelse
            </div>
        </div>

        {{-- Form Kontak --}}
        <div class="kontak-form-section">
            <div class="kontak-form-card">
                <div class="kontak-form-title">📨 Kirim Pesan Langsung</div>
                <p class="kontak-form-subtitle">Punya pertanyaan, masukan, atau rencana kunjungan? Hubungi kami langsung melalui form di bawah ini.</p>
                
                @if(session('success'))
                    <div class="alert-success">✅ {{ session('success') }}</div>
                @endif
                
                @if($errors->any())
                    <div class="alert-error">❌ {{ $errors->first() }}</div>
                @endif

                <form action="{{ route('kontak.send') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" value="{{ old('nama') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" id="email" name="email" placeholder="nama@email.com" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="telepon">No. Telepon / WhatsApp (Opsional)</label>
                            <input type="text" id="telepon" name="telepon" placeholder="Contoh: 081234567890" value="{{ old('telepon') }}">
                        </div>
                        <div class="form-group">
                            <label for="subjek">Subjek Pesan</label>
                            <input type="text" id="subjek" name="subjek" placeholder="Topik atau subjek pesan Anda" value="{{ old('subjek') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan Anda</label>
                        <textarea id="pesan" name="pesan" rows="5" placeholder="Tuliskan pesan atau pertanyaan Anda secara lengkap di sini..." required>{{ old('pesan') }}</textarea>
                    </div>
                    <button type="submit" class="kontak-form-btn">📤 Kirim Pesan</button>
                </form>
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
                    <div class="dest-item" onclick="window.location.href='{{ route('geosite.batu_hoda_beach') }}'">
                        <div class="dest-icon"><i class="fas fa-umbrella-beach"></i></div>
                        <div class="dest-info">
                            <h4>Batu Hoda Beach</h4>
                            <p>Pantai indah di tepi Danau Toba, Simanindo</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ route('geosite.museum_huta_bolon') }}'">
                        <div class="dest-icon"><i class="fas fa-landmark"></i></div>
                        <div class="dest-info">
                            <h4>Museum Huta Bolon</h4>
                            <p>Pusat budaya dan sejarah Batak Toba</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ route('geosite.batu_pasa_pantai') }}'">
                        <div class="dest-icon"><i class="fas fa-mountain"></i></div>
                        <div class="dest-info">
                            <h4>Batu Pasa Pantai</h4>
                            <p>Formasi batuan unik dengan pemandangan danau</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sosmed + Jam --}}
            <div class="kontak-info-card">
                <div class="kontak-info-title">📱 Ikuti Kami</div>
                <div class="social-row">
                    @forelse($contacts->where('tipe', 'sosmed') as $sosmed)
                        <a href="{{ $sosmed->tautan }}" aria-label="{{ $sosmed->judul }}" target="_blank">
                            <i class="{{ $sosmed->icon ?? 'fas fa-share-alt' }}"></i>
                        </a>
                    @empty
                        <a href="https://www.facebook.com/share/1EGJyH9J1T/" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/batuhodabeachofficial?igsh=dG02YW0wNnNweDJ5" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    @endforelse
                </div>
                <div class="hours-box">
                    <h4><i class="far fa-clock" style="margin-right:8px;color:#e8c96a;"></i>Jam Operasional</h4>
                    <div class="hours-divider"></div>
                    @forelse($contacts->where('tipe', 'jam_operasional') as $jam)
                        <p>{{ $jam->judul }}: {{ $jam->nilai }}</p>
                    @empty
                        <p>Senin – Jumat: 08:00 – 17:00 WIB</p>
                        <p>Sabtu – Minggu: 08:00 – 18:00 WIB</p>
                    @endforelse
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
        <h3>{{ $hs['cta_judul'] ?? 'Mulai Petualangan Anda' }}</h3>
        <div class="kontak-cta-divider"></div>
        <p>{{ $hs['cta_deskripsi'] ?? 'Temukan keindahan alam dan budaya Samosir bersama kami. Kami siap memandu perjalanan terbaik Anda.' }}</p>
        <a href="{{ url('/') }}" class="kontak-cta-btn">Kembali ke Beranda</a>
    </div>
</section>
@endsection