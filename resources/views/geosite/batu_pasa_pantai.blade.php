<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantai Batu Pasa - Geosite Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/batu_hoda_beach.css">
    <link rel="icon" type="image/svg+xml" href="/image/logo/geotoba-globe.svg">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
        h1, h2, h3, h4, h5, h6,
        .section-title h2,
        .section-title h3 {
            font-family: 'Cormorant Garamond', serif;
        }
        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            align-items: stretch;
        }
        .galeri-item {
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            background: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            aspect-ratio: auto !important;
        }
        .galeri-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
        }
        .galeri-item img {
            width: 100% !important;
            display: block !important;
            object-fit: cover !important;
            aspect-ratio: 4 / 3 !important;
            height: auto !important;
            cursor: pointer !important;
        }
        .galeri-caption {
            padding: 1rem !important;
            background: #fff !important;
            text-align: left !important;
        }
        .galeri-caption h4 {
            margin: 0 0 0.5rem !important;
            font-size: 1.1rem !important;
            color: #333 !important;
            font-family: 'Inter', sans-serif !important;
            font-weight: 600 !important;
        }
        .galeri-caption p {
            margin: 0 !important;
            color: #666 !important;
            line-height: 1.6 !important;
            font-size: 0.9rem !important;
            font-family: 'Inter', sans-serif !important;
        }
        @media (max-width: 992px) {
            .galeri-grid {
                grid-template-columns: repeat(2, 1fr) !important;
            }
        }
        @media (max-width: 576px) {
            .galeri-grid {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar" id="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="data:image/jpeg;base64,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" alt="Bendera" class="flag-img">

            <div class="logo-text" style="padding-left: 6px;">
                <h4 style="font-size: 1.65rem; font-weight: 800; color: #003366 !important; margin: 0; letter-spacing: -0.3px; font-family: 'Inter', sans-serif;">Geo<span style="color: #c6a43b; font-weight: 800;">Toba</span></h4>
            </div>
        </div>
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link home-btn">Home</a>
            <a href="#sejarah" class="nav-link">Sejarah</a>
            <a href="#umkm" class="nav-link">UMKM</a>
            <a href="#penginapan" class="nav-link">Penginapan</a>
            <a href="#fasilitas" class="nav-link">Fasilitas</a>
            <a href="#galeri" class="nav-link">Galeri</a>
            <a href="#lokasi" class="nav-link">Lokasi</a>
        </div>
        <div class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </div>
</div>

<div class="mobile-overlay" id="mobileOverlay">
    <div class="mobile-close" id="mobileClose">×</div>
    <a href="{{ url('/') }}" class="mobile-link mobile-home">Home</a>
    <a href="#sejarah" class="mobile-link">Sejarah</a>
    <a href="#umkm" class="mobile-link">UMKM</a>
    <a href="#penginapan" class="mobile-link">Penginapan</a>
    <a href="#fasilitas" class="mobile-link">Fasilitas</a>
    <a href="#galeri" class="mobile-link">Galeri</a>
    <a href="#lokasi" class="mobile-link">Lokasi</a>
</div>

<!-- HERO -->
<section class="hero" id="home" style="background-image: url('/image/Batu_Pasa/batu_pasa.jpg');">
    <div>
        <h1 class="hero-title"> Pantai Batu Pasa</h1>
        <p class="hero-subtitle">Pulau Samosir · Danau Toba</p>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Sejarah & Budaya</h2>
            <div class="divider"></div>
            <p>Warisan budaya Batak yang autentik dan masih hidup</p>
        </div>
        @if(isset($informasiGeosite) && $informasiGeosite->count() > 0)
            @foreach($informasiGeosite as $info)
            <div class="sejarah-item {{ $loop->even ? 'reverse' : '' }}">
                <div class="sejarah-image">
                    @if($info->gambar)
                        <img src="{{ $info->gambar_url }}" alt="{{ $info->judul }}">
                    @else
                        <img src="/image/Batu_Pasa/batu_pasa_2.jpg" alt="{{ $info->judul }}">
                    @endif
                </div>
                <div class="sejarah-text">
                    <h3>{{ $info->judul }}</h3>
                    <p>{!! nl2br(e($info->konten)) !!}</p>
                </div>
            </div>
            @endforeach
        @else
            <!-- FALLBACK: Konten default jika belum ada data di database -->
            <div class="sejarah-item">
                <div class="sejarah-image"><img src="/image/Batu_Pasa/batu_pasa_2.jpg" alt="Desa Sangkal"></div>
                <div class="sejarah-text">
                    <h3>Sejarah  Pantai Batu Pasa </h3>
                <p>Pantai Batu Pasa merupakan salah satu destinasi wisata di kawasan Simanindo, Pulau Samosir, yang dikenal dengan keindahan alam Danau Toba serta batu-batu alami di sekitar pantai. Tempat ini menjadi salah satu lokasi wisata yang sering dikunjungi wisatawan untuk menikmati suasana tenang dan panorama alam khas Danau Toba.</p>
                </div>
            </div>
            <div class="sejarah-item reverse">
                <div class="sejarah-image"><img src="/image/SBH/batu_pasa_3.jpg" alt="Tradisi Batak"></div>
                <div class="sejarah-text">
                    <h3>Budaya Pantai Batu Pasa</h3>
                    <p>
Masyarakat di sekitar Batu Pasa masih mempertahankan budaya Batak Toba yang diwariskan secara turun-temurun. Tradisi adat, penggunaan kain ulos, musik tradisional, dan keramahan masyarakat menjadi bagian dari kehidupan sehari-hari yang dapat dirasakan langsung oleh wisatawan.
</p>
                </div>
            </div>
            <div class="sejarah-item">
                <div class="sejarah-image"><img src="/image/Batu_Pasa/batu_pasa_4.jpg" alt="Wisata Budaya"></div>
                <div class="sejarah-text">
                    <h3>Daya Tarik Wisata Pantai Batu Pasa</h3>
                    <p>
Pantai Batu Pasa menawarkan pemandangan Danau Toba yang indah dengan suasana yang sejuk dan nyaman. Wisatawan dapat menikmati panorama alam, bersantai di tepi pantai, berfoto dengan latar batu-batu alami, serta menikmati suasana khas wisata Pulau Samosir yang masih alami dan asri.
</p>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- UMKM -->
<section id="umkm" class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>UMKM Lokal</h2>
            <div class="divider"></div>
            <p>Produk autentik dan berkualitas dari pengrajin lokal Pantai Batu Pasa</p>
        </div>
        <div class="grid-3">
            @forelse($umkm as $item)
            <div class="card">
                @if($item->gambar)
                <img src="{{ $item->gambar_url }}" class="card-img" alt="{{ $item->nama }}" onerror="this.onerror=null;this.src='/image/Batu_Pasa/batu_pasa.jpg'">
                @endif
                <div class="card-content">
                    <h3>{{ $item->nama }}</h3>
                    <p>{{ $item->deskripsi }}</p>
                    @if($item->lokasi)
                    <div class="card-location">📍 {{ $item->lokasi }}</div>
                    @endif
                    @if($item->kontak)
                    <div class="card-contact">📞 {{ $item->kontak }}</div>
                    @endif
                </div>
            </div>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:2rem;color:#888;">
                <p>Belum ada data UMKM untuk geosite ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- PENGINAPAN -->
<section id="penginapan" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Penginapan & Akomodasi</h2>
            <div class="divider"></div>
            <p>Pilihan tempat menginap dengan nuansa budaya Batak yang autentik</p>
        </div>
        <div class="grid-3">
            @forelse($penginapan as $item)
            <div class="card">
                @if($item->gambar)
                <img src="{{ $item->gambar_url }}" class="card-img" alt="{{ $item->nama }}" onerror="this.onerror=null;this.src='/image/Batu_Pasa/batu_pasa.jpg'">
                @endif
                <div class="card-content">
                    <h3>{{ $item->nama }}</h3>
                    <p>{{ $item->deskripsi }}</p>
                    @if($item->harga)
                    <div class="card-price">💰 {{ $item->harga }}</div>
                    @endif
                    @if($item->kontak)
                    <div class="card-contact">📞 {{ $item->kontak }}</div>
                    @endif
                </div>
            </div>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:2rem;color:#888;">
                <p>Belum ada data penginapan untuk geosite ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- FASILITAS -->
<section id="fasilitas" class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Fasilitas & Layanan</h2>
            <div class="divider"></div>
            <p>Berbagai fasilitas lengkap untuk kenyamanan wisatawan</p>
        </div>
        <div class="grid-3">
            @forelse($fasilitas as $item)
            <div class="card">
                @if($item->gambar)
                <img src="{{ $item->gambar_url }}" class="card-img" alt="{{ $item->nama }}" onerror="this.onerror=null;this.src='/image/Batu_Pasa/batu_pasa.jpg'">
                @endif
                <div class="card-content">
                    <h3>{{ $item->nama }}</h3>
                    <p>{{ $item->deskripsi }}</p>
                    @if($item->harga)
                    <div class="card-price">📍 {{ $item->harga }}</div>
                    @endif
                    @if($item->lokasi)
                    <div class="card-location">📍 {{ $item->lokasi }}</div>
                    @endif
                    @if($item->kontak)
                    <div class="card-contact">📞 {{ $item->kontak }}</div>
                    @endif
                </div>
            </div>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:2rem;color:#888;">
                <p>Belum ada data fasilitas untuk geosite ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- GALERI -->
<section id="galeri" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Galeri</h2>
            <div class="divider"></div>
            <p>Foto dan momen menarik dari Pantai Batu Pasa</p>
        </div>
        <div class="galeri-grid">
            @isset($galeriGeosite)
                @forelse($galeriGeosite as $item)
                    <div class="galeri-item">
                        @if($item->gambar)
                            <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" onclick="openLightbox(this)" onerror="this.src='/image/Batu_Pasa/batu_pasa.jpg'">
                        @endif
                    </div>
                @empty
                    <div style="grid-column:1/-1;text-align:center;padding:2rem;color:#888;">
                        <p>Belum ada foto galeri untuk geosite ini.</p>
                    </div>
                @endforelse
            @else
                <div style="grid-column:1/-1;text-align:center;padding:2rem;color:#888;">
                    <p>Galeri belum tersedia.</p>
                </div>
            @endisset
        </div>
    </div>
</section>

<!-- LOKASI -->
<section id="lokasi" class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Lokasi Pantai Batu Pasa</h2>
            <div class="divider"></div>
            <p>Desa bersejarah di Pulau Samosir, Danau Toba</p>
        </div>

        {{-- Info Cards: Jam Buka & Harga Tiket --}}
        @if($detailGeosite && ($detailGeosite->jam_buka || $detailGeosite->harga_tiket))
        <div style="display:flex;gap:20px;flex-wrap:wrap;margin-bottom:32px;">
            @if($detailGeosite->jam_buka)
            <div style="flex:1;min-width:240px;background:white;border-radius:12px;padding:20px 24px;box-shadow:0 2px 12px rgba(0,0,0,0.08);border-left:4px solid #003366;">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
                    <i class="fas fa-clock" style="color:#003366;font-size:1.3rem;"></i>
                    <strong style="color:#003366;font-size:1rem;">Jam Buka</strong>
                </div>
                <p style="margin:0;color:#374151;font-size:0.95rem;">{{ $detailGeosite->jam_buka }}</p>
            </div>
            @endif
            @if($detailGeosite->harga_tiket)
            <div style="flex:1;min-width:240px;background:white;border-radius:12px;padding:20px 24px;box-shadow:0 2px 12px rgba(0,0,0,0.08);border-left:4px solid #c6a43b;">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
                    <i class="fas fa-ticket-alt" style="color:#c6a43b;font-size:1.3rem;"></i>
                    <strong style="color:#c6a43b;font-size:1rem;">Harga Tiket</strong>
                </div>
                <p style="margin:0;color:#374151;font-size:0.95rem;">{{ $detailGeosite->harga_tiket }}</p>
            </div>
            @endif
        </div>
        @endif

        <div class="maps-section">
            <div class="maps-container">
                <iframe
                    src="{{ $detailGeosite?->maps_url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.536348657673!2d98.763707!3d2.7432066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031c1000ee6f31f%3A0x6ee7c8a134f162fd!2sBatu%20Passa%20Liang%20sipogu!5e0!3m2!1sid!2sid!4v1715900000000' }}"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>

            <div class="rute-info">

    <div class="rute-item">
        <h4>🚢 Dari Parapat</h4>
        <p>Naik kapal ferry dari Pelabuhan Ajibata menuju Pelabuhan Tomok atau Simanindo, kemudian melanjutkan perjalanan darat menuju kawasan Batu Pasa.</p>
        <span class="rute-time">± 45–60 menit</span>
    </div>

    <div class="rute-item">
        <h4>🏍️ Dari Simanindo</h4>
        <p>Batu Pasa dapat dicapai melalui perjalanan darat dari pusat Kecamatan Simanindo dengan akses jalan yang cukup mudah dilalui kendaraan.</p>
        <span class="rute-time">± 10–15 menit</span>
    </div>

    <div class="rute-item">
        <h4>📍 Daya Tarik Utama</h4>
        <p>Panorama Danau Toba, batu-batu alami di sekitar pantai, suasana alam yang tenang, dan pemandangan khas Pulau Samosir.</p>
        <span class="rute-time">Buka setiap hari</span>
    </div>
</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h3>Jangan Lewatkan Keindahan Pantai Batu Pasa</h3>
        <div class="divider"></div>
        <p>Rasakan pengalaman wisata budaya Batak yang autentik, nikmati keindahan alam Danau Toba yang memukau, dan ciptakan kenangan indah bersama keluarga tercinta di Pantai Batu Pasa</p>
        <div class="cta-buttons">
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo">
            <img src="{{ asset('image/Logo/logobankindonesia.jpg') }}" class="footer-logo-img" alt="Bank Indonesia">
            <div class="footer-logo-divider"></div>
            <img src="{{ asset('image/Logo/del.jpg') }}" class="footer-logo-img" alt="Del">
            <div class="footer-logo-divider"></div>
            <div class="footer-logo-text">
                <h4>GEOTOBA</h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>
        <div class="footer-nav">
            <a href="{{ url('/') }}">Home</a>
            <a href="#sejarah">Sejarah</a>
            <a href="#umkm">UMKM</a>
            <a href="#penginapan">Penginapan</a>
            <a href="#fasilitas">Fasilitas</a>
            <a href="#galeri">Galeri</a>
            <a href="#lokasi">Lokasi</a>
        </div>
        <div class="footer-copyright">
            <p>&copy; 2024 GEOTOBA. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- LIGHTBOX ZOOM -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-container">
        <div class="lightbox-close" onclick="closeLightbox()">✕</div>
        <button class="lightbox-prev" id="lightboxPrev" onclick="prevLightboxImage()">‹</button>
        <div class="lightbox-image-wrapper">
            <img id="lightboxImg" class="lightbox-img-zoomable">
            <div class="zoom-controls">
                <button class="zoom-btn" onclick="zoomLightboxImage(-0.2)" title="Zoom Out">−</button>
                <span class="zoom-level" id="zoomLevel">100%</span>
                <button class="zoom-btn" onclick="zoomLightboxImage(0.2)" title="Zoom In">+</button>
                <button class="zoom-btn" onclick="resetLightboxZoom()" title="Reset">⟲</button>
            </div>
        </div>
        <button class="lightbox-next" id="lightboxNext" onclick="nextLightboxImage()">›</button>
    </div>
    <div class="lightbox-info">
        <span id="lightboxCounter">1/12</span>
        <span class="lightbox-hint">Scroll untuk zoom | Klik tombol +/- untuk zoom manual</span>
    </div>
</div>

<script>
    // ========== LIGHTBOX ZOOM ADVANCED ==========
    let currentImageIndex = 0;
    let allGaleriImages = [];
    let currentZoom = 1;
    let currentPanX = 0;
    let currentPanY = 0;
    
    function initLightboxImages() {
        allGaleriImages = Array.from(document.querySelectorAll('.galeri-item:not([style*="display:none"]) img'));
    }

    function openLightbox(img) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightboxImg');
        initLightboxImages();
        
        const allImages = document.querySelectorAll('.galeri-item img');
        currentImageIndex = Array.from(allImages).indexOf(img);
        
        lightboxImg.src = img.src;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
        resetLightboxZoom();
        updateLightboxCounter();
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
        resetLightboxZoom();
    }

    function zoomLightboxImage(delta) {
        const newZoom = currentZoom + delta;
        if (newZoom >= 1 && newZoom <= 3) {
            currentZoom = newZoom;
            updateLightboxImage();
        }
    }

    function resetLightboxZoom() {
        currentZoom = 1;
        currentPanX = 0;
        currentPanY = 0;
        updateLightboxImage();
    }

    function updateLightboxImage() {
        const img = document.getElementById('lightboxImg');
        img.style.transform = `scale(${currentZoom}) translate(${currentPanX}px, ${currentPanY}px)`;
        document.getElementById('zoomLevel').textContent = Math.round(currentZoom * 100) + '%';
    }

    function nextLightboxImage() {
        const allImages = document.querySelectorAll('.galeri-item:not([style*="display:none"]) img');
        currentImageIndex = (currentImageIndex + 1) % allImages.length;
        openLightbox(allImages[currentImageIndex]);
    }

    function prevLightboxImage() {
        const allImages = document.querySelectorAll('.galeri-item:not([style*="display:none"]) img');
        currentImageIndex = (currentImageIndex - 1 + allImages.length) % allImages.length;
        openLightbox(allImages[currentImageIndex]);
    }

    function updateLightboxCounter() {
        const allImages = document.querySelectorAll('.galeri-item:not([style*="display:none"]) img');
        document.getElementById('lightboxCounter').textContent = (currentImageIndex + 1) + '/' + allImages.length;
    }

    // Lightbox scroll zoom
    const lightboxContainer = document.querySelector('.lightbox-image-wrapper');
    if (lightboxContainer) {
        lightboxContainer.addEventListener('wheel', function(e) {
            if (document.getElementById('lightbox').classList.contains('active')) {
                e.preventDefault();
                if (e.deltaY < 0) {
                    zoomLightboxImage(0.1);
                } else {
                    zoomLightboxImage(-0.1);
                }
            }
        }, { passive: false });

        // Pinch zoom support
        let lastDistance = 0;
        lightboxContainer.addEventListener('touchmove', function(e) {
            if (document.getElementById('lightbox').classList.contains('active') && e.touches.length === 2) {
                e.preventDefault();
                const touch1 = e.touches[0];
                const touch2 = e.touches[1];
                const distance = Math.hypot(
                    touch2.clientX - touch1.clientX,
                    touch2.clientY - touch1.clientY
                );
                if (lastDistance !== 0) {
                    const delta = (distance - lastDistance) / 100;
                    zoomLightboxImage(delta);
                }
                lastDistance = distance;
            }
        }, { passive: false });

        lightboxContainer.addEventListener('touchend', function() {
            lastDistance = 0;
        });
    }

    // Lightbox keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (document.getElementById('lightbox').classList.contains('active')) {
            if (e.key === 'ArrowRight') nextLightboxImage();
            if (e.key === 'ArrowLeft') prevLightboxImage();
            if (e.key === 'Escape') closeLightbox();
            if (e.key === '+' || e.key === '=') zoomLightboxImage(0.1);
            if (e.key === '-') zoomLightboxImage(-0.1);
        }
    });

    // ========== HAMBURGER MENU ==========
    var hamburger = document.getElementById('hamburger');
    var mobileOverlay = document.getElementById('mobileOverlay');
    var mobileClose = document.getElementById('mobileClose');

    hamburger.addEventListener('click', function() {
        mobileOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    function closeMenu() {
        mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    mobileClose.addEventListener('click', closeMenu);
    document.querySelectorAll('.mobile-link').forEach(function(link) {
        link.addEventListener('click', closeMenu);
    });

    // ========== GALERI TABS ==========
    document.querySelectorAll('.tab-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.tab-btn').forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            var tab = btn.dataset.tab;
            document.querySelectorAll('.galeri-item').forEach(function(item) {
                item.style.display = item.classList.contains(tab) ? 'block' : 'none';
            });
            resetLightboxZoom();
        });
    });

    // ========== GALERI IMAGE CLICK ==========
    document.querySelectorAll('.galeri-item img').forEach(function(img) {
        img.addEventListener('click', function() {
            openLightbox(this);
        });
    });

    // Lightbox click outside
    const lightbox = document.getElementById('lightbox');
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) closeLightbox();
    });

    // ========== SCROLL SPY & ACTIVE NAVBAR ==========
    const navLinks = document.querySelectorAll('.nav-menu .nav-link');
    const sections = document.querySelectorAll('section[id]');

    function makeActive() {
        let scrollPos = window.scrollY || document.documentElement.scrollTop || document.body.scrollTop;
        
        // If we are at the top, highlight Home
        if (scrollPos < 200) {
            navLinks.forEach(link => {
                if (link.classList.contains('home-btn') || link.getAttribute('href') === "{{ url('/') }}") {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
            return;
        }

        let activeSection = null;
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 150;
            const sectionHeight = section.offsetHeight;
            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                activeSection = section.getAttribute('id');
            }
        });

        if (activeSection) {
            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href === '#' + activeSection) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }
    }

    window.addEventListener('scroll', makeActive);
    window.addEventListener('load', makeActive);

    // ========== SMOOTH SCROLL ==========
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }
            }
        });
    });

    document.querySelectorAll('.mobile-link[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            var target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    });
</script>
</body>
</html>