<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Geosite Simanindo – Batu Hoda, Danau Toba')</title>
    <meta name="description" content="Jelajahi keindahan Geosite Simanindo dan Batu Hoda di kawasan UNESCO Global Geopark Danau Toba. Wisata alam, budaya Batak, dan geologi kelas dunia.">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="shortcut icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/favicon.svg">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts: Inter + Cormorant Garamond -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
   <style>
        *, *::before, *::after { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; margin: 0; }
        
        :root {
            --blue-dark:   #003366;
            --blue-medium: #1a4a7a;
            --gold:        #c6a43b;
            --white:       #ffffff;
            --nav-height:  80px;
        }


        /* ===== SMOOTH SCROLL ===== */
        html { scroll-behavior: smooth; }

        /* ===== NAVBAR — transparent on hero, solid on scroll ===== */
        .navbar {
            transition: background 0.55s cubic-bezier(0.4,0,0.2,1),
                        padding   0.4s ease,
                        box-shadow 0.4s ease;
            padding: 1.1rem 0;
            background: transparent;
            border-bottom: 1px solid transparent;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1050;
        }

        /* links white when transparent */
        .navbar:not(.scrolled) .nav-link,
        .navbar:not(.scrolled) .navbar-brand {
            color: rgba(255,255,255,0.92) !important;
            text-shadow: 0 1px 6px rgba(0,0,0,0.4);
        }
        .navbar:not(.scrolled) .navbar-brand span {
            color: #e8c96a !important;
        }
        .navbar:not(.scrolled) .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255,255,255,0.9)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        .navbar:not(.scrolled) .logo-divider {
            background: linear-gradient(145deg, rgba(255,255,255,0.3), rgba(255,255,255,0.05));
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            padding: 0.55rem 0;
            border-bottom: 1px solid rgba(0, 51, 102, 0.08);
            box-shadow: 0 4px 28px rgba(0, 0, 0, 0.08);
        }
        .navbar.scrolled .nav-link  { color: #111111 !important; text-shadow: none !important; }
        .navbar.scrolled .navbar-brand { color: #003366 !important; text-shadow: none !important; }
        .navbar.scrolled .navbar-brand span { color: var(--gold) !important; }
        
        .navbar .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
        
        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0;
            padding: 0;
        }
        
        .logo-img {
            height: 60px;
            width: auto;
            border-radius: 16px;
            object-fit: cover;
            transition: all 0.3s ease;
            box-shadow: 0 8px 16px -6px rgba(0, 0, 0, 0.2);
        }
        
        .logo-img:hover {
            transform: scale(1.02) translateY(-2px);
            box-shadow: 0 14px 24px -8px rgba(0, 0, 0, 0.3);
        }
        
        .logo-divider {
            width: 1.5px;
            height: 42px;
            background: linear-gradient(145deg, rgba(0,51,102,0.3), rgba(0,51,102,0.05));
            border-radius: 2px;
        }
        
        .navbar-brand {
            font-size: 1.65rem;
            font-weight: 800;
            color: #003366 !important;
            margin: 0;
            padding: 0 0 0 6px;
            letter-spacing: -0.3px;
            text-decoration: none;
        }
        
        .navbar-brand span { 
            color: var(--gold); 
            font-weight: 800; 
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 0.15rem;
            transition: color 0.25s ease, background 0.25s ease, transform 0.25s ease;
            font-size: 0.88rem;
            letter-spacing: 0.04em;
            padding: 0.45rem 0.9rem;
            border-radius: 40px;
        }
        
        .nav-link:hover {
            color: var(--gold) !important;
            background: rgba(198, 164, 59, 0.12);
            transform: translateY(-2px);
        }
        
        .nav-link.active {
            color: var(--gold) !important;
            background: rgba(198, 164, 59, 0.15);
        }
        
        .dropdown-menu {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(0, 51, 102, 0.15);
            border-radius: 24px;
            padding: 0.6rem 0;
            margin-top: 0.7rem;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
        }
        
        .dropdown-item {
            color: #2c3e50;
            padding: 10px 24px;
            font-size: 0.85rem;
            transition: all 0.25s ease;
            border-radius: 18px;
            margin: 4px 10px;
        }
        
        .dropdown-item:hover {
            background: rgba(198, 164, 59, 0.15);
            color: var(--gold);
            transform: translateX(5px);
        }
        
        .dropdown-header {
            color: var(--gold);
            padding: 8px 24px;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .dropdown-divider {
            border-color: rgba(0, 51, 102, 0.1);
        }
        
        .navbar-toggler {
            border: none;
            background: rgba(0, 51, 102, 0.08);
            padding: 8px 12px;
            border-radius: 14px;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 51, 102, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        @media (max-width: 991px) {
            .logo-img { height: 52px; }
            .logo-divider { height: 36px; }
            .navbar-brand { font-size: 1.5rem; }
            .navbar-collapse {
                background: rgba(0, 51, 102, 0.98);
                backdrop-filter: blur(20px);
                padding: 1.2rem;
                border-radius: 28px;
                margin-top: 1rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            .nav-link { 
                text-align: center;
                color: rgba(255, 255, 255, 0.9) !important;
            }
            .navbar.scrolled .nav-link {
                color: rgba(255, 255, 255, 0.9) !important;
            }
            .nav-link:hover, .navbar.scrolled .nav-link:hover {
                color: var(--gold) !important;
                background: rgba(198, 164, 59, 0.15);
            }
            .dropdown-menu {
                background: rgba(0, 38, 77, 0.98);
                border-color: rgba(255, 255, 255, 0.1);
            }
            .dropdown-item {
                color: rgba(255, 255, 255, 0.8) !important;
            }
            .dropdown-item:hover {
                background: rgba(198, 164, 59, 0.2);
                color: var(--gold) !important;
            }
            .dropdown-header {
                color: var(--gold) !important;
            }
        }
        
        @media (max-width: 768px) {
            .logo-img { height: 46px; }
            .logo-divider { height: 32px; }
            .navbar-brand { font-size: 1.35rem; }
        }
        
        @media (max-width: 576px) {
            .logo-img { height: 40px; }
            .logo-divider { height: 28px; }
            .navbar-brand { font-size: 1.2rem; }
        }
        
        .footer {
            background: var(--blue-dark);
            color: white;
            padding: 40px 0 20px;
            margin-top: 0;
        }
        
        .footer h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }
        
        .footer h5::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 35px;
            height: 2px;
            background: var(--gold);
            border-radius: 4px;
        }
        
        .footer a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.8rem;
        }
        
        .footer a:hover {
            color: var(--gold);
            transform: translateX(5px);
        }
        
        .social-icons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background: var(--gold);
            transform: translateY(-3px);
        }
        
        .social-icons a:hover i { color: var(--blue-dark); }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 15px;
            margin-top: 25px;
            text-align: center;
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.5);
        }
        
        .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 44px;
            height: 44px;
            border-radius: 22px;
            background: var(--gold);
            color: var(--blue-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background: white;
            transform: translateY(-4px);
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
            <!-- LOGO SECTION - LANGSUNG DARI FOLDER public/image/Logo/ -->
            <div class="logo-wrapper">
                <img src="{{ asset('image/Logo/logobankindonesia.jpg') }}" alt="Bank Indonesia" class="logo-img" loading="lazy">
                <div class="logo-divider"></div>
                <img src="{{ asset('image/Logo/del.jpg') }}" alt="Logo Del" class="logo-img" loading="lazy">
                <a class="navbar-brand" href="{{ url('/') }}">Geo<span>Toba</span></a>
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('informasi') ? 'active' : '' }}" href="{{ url('/informasi') }}">Informasi</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('destinasi*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">Destinasi</a>
                        <ul class="dropdown-menu">
                            <li><h6 class="dropdown-header"><i class="fas fa-tag me-1"></i> KATEGORI DESTINASI</h6></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/alam') }}">Destinasi Alam</a></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/buatan') }}">Destinasi Buatan</a></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/budaya') }}">Destinasi Budaya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi') }}">Semua Destinasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>@yield('content')</main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Geo<span style="color: #c6a43b;">Toba</span></h5>
                    <p style="font-size: 0.8rem; color: rgba(255,255,255,0.7);">Sistem Informasi Geosite Danau Toba - Menyajikan informasi lengkap tentang keindahan geologi dan budaya Batak di kawasan Danau Toba.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Tautan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="mb-2"><a href="{{ url('/informasi') }}">Informasi</a></li>
                        <li class="mb-2"><a href="{{ url('/galeri') }}">Galeri</a></li>
                        <li class="mb-2"><a href="{{ url('/berita') }}">Berita</a></li>
                        <li class="mb-2"><a href="{{ url('/kontak') }}">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Destinasi</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/destinasi/alam') }}">Destinasi Alam</a></li>
                        <li class="mb-2"><a href="{{ url('/destinasi/buatan') }}">Destinasi Buatan</a></li>
                        <li class="mb-2"><a href="{{ url('/destinasi/budaya') }}">Destinasi Budaya</a></li>
                        <li class="mb-2"><a href="{{ url('/destinasi') }}">Semua Destinasi</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2" style="color: #c6a43b;"></i> Danau Toba, Sumatera Utara</li>
                        <li class="mb-2"><i class="fas fa-phone me-2" style="color: #c6a43b;"></i> +62 853 6225 9937</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2" style="color: #c6a43b;"></i> info@geotoba.com</li>
                    </ul>
                </div>
            </div>
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
            <div class="copyright"><p>&copy; 2026 GeoToba - Geopark Danau Toba. All rights reserved.</p></div>
        </div>
    </footer>

    <div class="back-to-top" id="backToTop"><i class="fas fa-arrow-up"></i></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        AOS.init({ duration: 900, once: true, offset: 60, easing: 'ease-out-cubic' });

        /* ── Navbar scroll behaviour ──────────────────────────── */
        const navbar  = document.getElementById('navbar');
        const NAV_THRESHOLD = 80;
        function updateNavbar() {
            if (window.scrollY > NAV_THRESHOLD) navbar.classList.add('scrolled');
            else navbar.classList.remove('scrolled');
        }
        window.addEventListener('scroll', updateNavbar, { passive: true });
        updateNavbar(); // run once on load

        /* ── Back-to-top ──────────────────────────────────────── */
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 320) backToTop.classList.add('show');
            else backToTop.classList.remove('show');
        }, { passive: true });
        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    
    @stack('scripts')
</body>
</html>