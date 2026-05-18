@extends('layouts.app')

@section('title', 'Kontak - Geosite Danau Toba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary: #003366;
        --gold: #c6a43b;
        --white: #fff;
        --gray: #666;
        --bg: #f8fafc;
        --shadow: 0 5px 20px rgba(0,0,0,0.05);
        --shadow-lg: 0 10px 30px rgba(0,0,0,0.1);
        --transition: all 0.3s ease;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: var(--bg);
    }

    /* HERO */
    .hero-kontak {
        height: 55vh;
        min-height: 400px;
        background: linear-gradient(135deg, rgba(0,51,102,0.8) 0%, rgba(0,51,102,0.4) 50%, rgba(26,74,122,0.7) 100%), url('/image/kontak-hero.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 70px;
        position: relative;
        overflow: hidden;
    }
    
    .hero-kontak::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 0%, rgba(198,164,59,0.25), transparent 70%);
        z-index: 1;
    }
    
    .hero-kontak > div {
        position: relative;
        z-index: 2;
        animation: slideUp 0.9s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .hero-kontak h1 {
        font-size: 3.5rem;
        font-weight: 800;
        font-family: 'Playfair Display', serif;
        margin-bottom: 15px;
        text-shadow: 0 4px 25px rgba(0,0,0,0.5), 0 0 40px rgba(198,164,59,0.1);
        letter-spacing: 2px;
    }

    .hero-kontak p {
        font-size: 0.95rem;
        letter-spacing: 3.5px;
        opacity: 0.9;
        font-weight: 600;
    }

    /* SECTION */
    .section {
        padding: 80px 0;
        position: relative;
    }
    
    .section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 100% 100%, rgba(198,164,59,0.05), transparent 70%);
        pointer-events: none;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 1;
    }

    /* CONTACT CARDS */
    .contact-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 35px;
        margin-bottom: 60px;
    }

    .contact-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        padding: 40px 30px;
        text-align: center;
        border-radius: 24px;
        box-shadow: 0 15px 40px -10px rgba(0,51,102,0.15), 0 0 0 1px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.8);
        transition: var(--transition);
        border: 1px solid rgba(198,164,59,0.15);
        position: relative;
        overflow: hidden;
    }
    
    .contact-card::before {
        content: '';
        position: absolute;
        inset: -100%;
        background: radial-gradient(circle, rgba(198,164,59,0.1), transparent 70%);
        opacity: 0;
        transition: all 0.4s ease;
        z-index: 0;
    }

    .contact-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 30px 60px -5px rgba(0,51,102,0.2), 0 0 40px rgba(198,164,59,0.25), inset 0 1px 0 rgba(255,255,255,1);
        border-color: rgba(198,164,59,0.3);
    }
    
    .contact-card:hover::before {
        opacity: 1;
    }

    .contact-icon {
        width: 75px;
        height: 75px;
        background: linear-gradient(135deg, rgba(198,164,59,0.2), rgba(198,164,59,0.1));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        border: 2px solid rgba(198,164,59,0.3);
        position: relative;
        z-index: 1;
        transition: all 0.4s ease;
    }
    
    .contact-card:hover .contact-icon {
        background: linear-gradient(135deg, var(--gold), #d4a947);
        border-color: var(--gold);
        transform: rotate(360deg) scale(1.1);
        box-shadow: 0 8px 20px rgba(198,164,59,0.3);
    }

    .contact-icon i {
        font-size: 28px;
        color: var(--gold);
        transition: color 0.4s ease;
    }
    
    .contact-card:hover .contact-icon i {
        color: white;
    }

    .contact-card h3 {
        font-size: 1.3rem;
        font-weight: 800;
        margin-bottom: 15px;
        color: var(--primary);
        position: relative;
        z-index: 1;
        letter-spacing: 0.5px;
    }

    .contact-card p {
        font-size: 0.9rem;
        color: var(--gray);
        line-height: 1.7;
        position: relative;
        z-index: 1;
        transition: color 0.3s ease;
    }
    
    .contact-card:hover p {
        color: #003366;
    }

    /* MAPS FULL WIDTH */
    .map-full {
        margin: 60px 0;
    }

    .map-full iframe {
        width: 100%;
        height: 450px;
        border: 0;
        border-radius: 24px;
        box-shadow: 0 20px 50px -10px rgba(0,51,102,0.2), 0 0 40px rgba(198,164,59,0.15);
        transition: all 0.5s ease;
        border: 1px solid rgba(198,164,59,0.2);
    }
    
    .map-full iframe:hover {
        transform: translateY(-8px) scale(1.01);
        box-shadow: 0 30px 70px -5px rgba(0,51,102,0.3), 0 0 50px rgba(198,164,59,0.25);
    }

    /* INFO SECTION (Setelah Peta) */
    .info-section {
        margin-top: 20px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }

    .info-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: var(--shadow);
    }

    .info-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 3px solid transparent;
        border-image: linear-gradient(90deg, var(--gold), #d4a947) 1;
        display: inline-block;
        letter-spacing: 0.5px;
    }

    /* DESTINASI LIST */
    .dest-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .dest-item {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 18px;
        background: linear-gradient(135deg, rgba(248,249,250,0.8), rgba(240,245,250,0.5));
        border-radius: 16px;
        cursor: pointer;
        transition: var(--transition);
        border: 1px solid rgba(198,164,59,0.1);
        position: relative;
        overflow: hidden;
    }
    
    .dest-item::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, transparent, rgba(198,164,59,0.1), transparent);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .dest-item:hover {
        background: linear-gradient(135deg, rgba(198,164,59,0.15), rgba(198,164,59,0.08));
        transform: translateX(12px);
        border-color: rgba(198,164,59,0.3);
        box-shadow: 0 8px 20px rgba(198,164,59,0.1);
    }
    
    .dest-item:hover::before {
        opacity: 1;
    }

    .dest-icon {
        width: 52px;
        height: 52px;
        background: linear-gradient(135deg, white, #f8f9fa);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0,51,102,0.1);
        flex-shrink: 0;
        border: 2px solid rgba(198,164,59,0.2);
        transition: all 0.4s ease;
    }
    
    .dest-item:hover .dest-icon {
        background: linear-gradient(135deg, var(--gold), #d4a947);
        box-shadow: 0 8px 25px rgba(198,164,59,0.3);
        border-color: var(--gold);
        transform: scale(1.15) rotate(360deg);
    }

    .dest-icon i {
        font-size: 1.3rem;
        color: var(--gold);
        transition: color 0.4s ease;
    }
    
    .dest-item:hover .dest-icon i {
        color: white;
    }

    .dest-info h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 5px;
        letter-spacing: 0.3px;
    }

    .dest-info p {
        font-size: 0.75rem;
        color: var(--gray);
        line-height: 1.4;
    }

    /* SOSIAL MEDIA */
    .social-section {
        margin: 30px 0;
        text-align: center;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 18px;
        margin-top: 15px;
        flex-wrap: wrap;
    }

    .social-icons a {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #f0f0f0, #e8e8e8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        text-decoration: none;
        border: 2px solid rgba(198,164,59,0.2);
        font-size: 1.2rem;
        box-shadow: 0 4px 15px rgba(0,51,102,0.1);
    }

    .social-icons a:hover {
        background: linear-gradient(135deg, var(--gold), #d4a947);
        color: white;
        transform: translateY(-8px) rotate(360deg) scale(1.1);
        box-shadow: 0 12px 30px rgba(198,164,59,0.3);
        border-color: var(--gold);
    }

    /* JAM OPERASIONAL */
    .hours-box {
        background: linear-gradient(135deg, var(--primary) 0%, #1a4a7a 50%, #0a3a6a 100%);
        padding: 30px 25px;
        border-radius: 20px;
        text-align: center;
        color: white;
        margin-top: 30px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0,51,102,0.2), 0 0 30px rgba(198,164,59,0.15);
        border: 1px solid rgba(198,164,59,0.2);
    }
    
    .hours-box::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 0%, rgba(198,164,59,0.2), transparent 70%);
        pointer-events: none;
    }

    .hours-box h4 {
        font-size: 1rem;
        margin-bottom: 15px;
        font-weight: 800;
        position: relative;
        z-index: 1;
        letter-spacing: 1px;
    }

    .hours-box p {
        font-size: 0.8rem;
        opacity: 0.95;
        position: relative;
        z-index: 1;
        line-height: 1.8;
        font-weight: 500;
    }

    .hours-divider {
        width: 40px;
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.6), transparent);
        margin: 15px auto;
    }

    /* FLOATING WHATSAPP */
    .whatsapp-float {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 100;
    }

    .whatsapp-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 62px;
        height: 62px;
        background: linear-gradient(135deg, #25D366, #1fa855);
        border-radius: 50%;
        color: white;
        font-size: 1.6rem;
        box-shadow: 0 8px 25px rgba(37,211,102,0.4), 0 0 30px rgba(37,211,102,0.2);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        text-decoration: none;
        border: 2px solid rgba(255,255,255,0.3);
    }

    .whatsapp-btn:hover {
        transform: scale(1.2) rotate(360deg);
        box-shadow: 0 12px 40px rgba(37,211,102,0.6), 0 0 50px rgba(37,211,102,0.3);
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .contact-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .info-grid {
            grid-template-columns: 1fr;
        }
        .map-full iframe {
            height: 320px;
        }
    }

    @media (max-width: 768px) {
        .hero-kontak h1 {
            font-size: 2rem;
        }
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .section {
            padding: 40px 0;
        }
        .container {
            padding: 0 20px;
        }
        .map-full iframe {
            height: 280px;
        }
    }

    @media (max-width: 480px) {
        .hero-kontak h1 {
            font-size: 1.5rem;
        }
        .contact-card {
            padding: 20px;
        }
        .info-card {
            padding: 20px;
        }
        .whatsapp-btn {
            width: 48px;
            height: 48px;
            font-size: 1.3rem;
        }
        .map-full iframe {
            height: 220px;
        }
    }
</style>

<!-- HERO -->
<section class="hero-kontak">
    <div>
        <h1>Hubungi Kami</h1>
        <p>Senang mendengar dari Anda</p>
    </div>
</section>

<!-- CONTACT CARDS -->
<section class="section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-card">
                <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h3>Alamat</h3>
                <p>Geosite Danau Toba</p>
                <p>Pulau Sibandang, Danau Toba</p>
                <p>Sumatera Utara</p>
            </div>
            <div class="contact-card">
                <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                <h3>Telepon</h3>
                <p>+62 812 3456 7890</p>
                <p>+62 813 9876 5432</p>
                <p>(0622) 12345</p>
            </div>
            <div class="contact-card">
                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                <h3>Email</h3>
                <p>info@geotoba.com</p>
                <p>reservasi@geotoba.com</p>
                <p>support@geotoba.com</p>
            </div>
        </div>
    </div>
</section>

<!-- MAPS FULL WIDTH -->
<div class="container">
    <div class="map-full">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
</div>

<!-- INFO SECTION (Setelah Peta) -->
<section class="section">
    <div class="container">
        <div class="info-grid">
            <!-- DESTINASI -->
            <div class="info-card">
                <h3 class="info-title">Destinasi Unggulan</h3>
                <div class="dest-list">
                    <div class="dest-item" onclick="window.location.href='{{ url('/geosite/meat') }}'">
                        <div class="dest-icon"><i class="fas fa-umbrella-beach"></i></div>
                        <div class="dest-info">
                            <h4>Meat Village</h4>
                            <p>Desa wisata budaya di tepi Danau Toba</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ url('/geosite/batu-bahisan') }}'">
                        <div class="dest-icon"><i class="fas fa-mountain"></i></div>
                        <div class="dest-info">
                            <h4>Batu Bahisan</h4>
                            <p>Situs batu bersejarah dengan pemandangan indah</p>
                        </div>
                    </div>
                    
                    <div class="dest-item" onclick="window.location.href='{{ url('/galeri') }}'">
                        <div class="dest-icon"><i class="fas fa-camera"></i></div>
                        <div class="dest-info">
                            <h4>Galeri Foto</h4>
                            <p>Koleksi foto terbaik Geopark Danau Toba</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SOSIAL & JAM OPERASIONAL -->
            <div class="info-card">
                <h3 class="info-title">Ikuti Kami</h3>
                <div class="social-section">
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="hours-box">
                    <h4><i class="far fa-clock"></i> Jam Operasional</h4>
                    <p>Senin - Jumat: 08:00 - 17:00 WIB</p>
                    <p>Sabtu - Minggu: 08:00 - 18:00 WIB</p>
                    <div class="hours-divider"></div>
                    <p><i class="fas fa-map-marker-alt"></i> Pulau Sibandang, Danau Toba</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FLOATING WHATSAPP -->
<div class="whatsapp-float">
    <a href="https://wa.me/6281234567890" class="whatsapp-btn" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

@endsection