@extends('layouts.app')

@section('content')

<style>
    /* ==================== ANIMASI GLOBAL ==================== */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes zoomIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }
    
    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }
        100% {
            background-position: 1000px 0;
        }
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }
    
    @keyframes rotateSlow {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    
    @keyframes borderGlow {
        0%, 100% {
            box-shadow: 0 0 5px rgba(198, 164, 59, 0.3);
        }
        50% {
            box-shadow: 0 0 20px rgba(198, 164, 59, 0.8);
        }
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    /* ==================== HERO SLIDER ==================== */
    .hero-section {
        height: 100vh;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }
    
    .slides-container {
        position: relative;
        width: 100%;
        height: 100%;
    }
    
    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0;
        transform: scale(1.05);
        transition: opacity 1.5s ease-in-out, transform 8s ease-out;
        z-index: 1;
    }
    
    .slide.active {
        opacity: 1;
        z-index: 2;
        transform: scale(1);
    }
    
    .slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0,51,102,0.4) 0%, rgba(0,102,153,0.2) 100%);
        animation: shimmer 3s infinite;
    }
    
    .slide-1 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/SBH/BatuHoda.png'); }
    .slide-2 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/SBH/HutaBolon.png'); }
    .slide-3 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/SBH/RumahKaca.png'); }
    .slide-4 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/SBH/batu_pasa_pantai.jpg'); }
    .slide-5 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/SBH/mix.jpg'); }
    
    .hero-content {
        position: absolute;
        z-index: 10;
        bottom: 20%;
        left: 0;
        right: 0;
        text-align: center;
        color: white;
        padding: 0 20px;
    }
    
    .hero-subtitle {
        font-size: 0.7rem;
        letter-spacing: 0.35em;
        text-transform: uppercase;
        margin-bottom: 20px;
        font-weight: 300;
        opacity: 0.9;
        animation: fadeInUp 0.8s ease;
    }
    
    .hero-title {
        font-size: 3.8rem;
        font-weight: 700;
        font-family: 'Cormorant Garamond', serif;
        line-height: 1.2;
        margin-bottom: 25px;
        color: white;
        text-shadow: 0 2px 15px rgba(0, 0, 0, 0.4);
        animation: fadeInUp 0.8s ease 0.1s both;
    }
    
    .hero-divider {
        width: 60px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 30px;
        animation: fadeInUp 0.8s ease 0.2s both;
    }
    
    .hero-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 14px 42px;
        font-size: 0.75rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        transition: all 0.4s ease;
        text-decoration: none;
        font-weight: 600;
        border-radius: 40px;
        animation: fadeInUp 0.8s ease 0.3s both;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    
    .hero-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    
    .hero-btn:hover::before {
        width: 300px;
        height: 300px;
    }
    
    .hero-btn:hover {
        background: white;
        color: #003366;
        transform: translateY(-3px);
        letter-spacing: 0.3em;
        animation: pulse 0.5s ease;
    }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .slider-dots {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 12px;
        z-index: 15;
    }
    
    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.4s ease;
        position: relative;
    }
    
    .dot::after {
        content: '';
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border-radius: 50%;
        background: rgba(198, 164, 59, 0.3);
        transform: scale(0);
        transition: transform 0.3s ease;
    }
    
    .dot:hover::after {
        transform: scale(1);
    }
    
    .dot.active {
        background: #c6a43b;
        width: 28px;
        border-radius: 10px;
    }
    
    .dot:hover {
        background: #c6a43b;
        transform: scale(1.2);
    }
    
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 15;
        animation: bounce 2.5s infinite;
        cursor: pointer;
        color: white;
        font-size: 0.65rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        opacity: 0.8;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }
    
    .scroll-indicator .line {
        width: 1px;
        height: 30px;
        background: white;
        margin-top: 5px;
        transition: height 0.3s ease;
    }
    
    .scroll-indicator:hover .line {
        height: 40px;
        background: #c6a43b;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateX(-50%) translateY(0); opacity: 0.8; }
        50% { transform: translateX(-50%) translateY(-10px); opacity: 0.4; }
    }
    
    /* ==================== SECTION UMUM ==================== */
    .section { padding: 90px 0; position: relative; overflow: hidden; }
    .section-white { background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fa 100%); }
    .section-light { background: linear-gradient(135deg, #e0ecf7 0%, #d4e4f2 100%); }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    
    /* Decorative Elements */
    .section::before {
        content: '✦';
        position: absolute;
        font-size: 8rem;
        color: rgba(198, 164, 59, 0.05);
        bottom: -50px;
        right: -50px;
        transform: rotate(15deg);
        pointer-events: none;
    }
    
    .section::after {
        content: '✦';
        position: absolute;
        font-size: 6rem;
        color: rgba(198, 164, 59, 0.05);
        top: -30px;
        left: -30px;
        transform: rotate(-10deg);
        pointer-events: none;
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 60px;
    }
    .section-title h2 {
        font-size: 2.2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 15px;
        color: #003366;
        position: relative;
        display: inline-block;
        animation: fadeInUp 0.8s ease;
    }
    
    .section-title h2::before {
        content: '❖';
        position: absolute;
        left: -30px;
        top: 50%;
        transform: translateY(-50%);
        color: #c6a43b;
        font-size: 1rem;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .section-title h2::after {
        content: '❖';
        position: absolute;
        right: -30px;
        top: 50%;
        transform: translateY(-50%);
        color: #c6a43b;
        font-size: 1rem;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .section-title:hover h2::before,
    .section-title:hover h2::after {
        opacity: 1;
        left: -25px;
        right: -25px;
    }
    
    .section-title .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto;
        transition: width 0.5s ease;
    }
    
    .section-title:hover .divider {
        width: 100px;
    }
    
    .section-title p {
        color: #2c5f8a;
        max-width: 550px;
        margin: 20px auto 0;
        font-size: 0.85rem;
        line-height: 1.6;
        animation: fadeInUp 0.8s ease 0.2s both;
    }
    
    /* ==================== STATS ==================== */
    .stats-grid {
        display: flex;
        justify-content: space-between;
        text-align: center;
        flex-wrap: wrap;
        gap: 40px;
    }
    .stat-item { 
        flex: 1; 
        min-width: 100px; 
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        padding: 20px;
        background: rgba(0, 51, 102, 0.05);
        border-radius: 16px;
        position: relative;
        overflow: hidden;
    }
    
    .stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(198,164,59,0.2), transparent);
        transition: left 0.6s ease;
    }
    
    .stat-item:hover::before {
        left: 100%;
    }
    
    .stat-item:hover { 
        transform: translateY(-10px) scale(1.05);
        background: rgba(0, 51, 102, 0.1);
        animation: borderGlow 1s infinite;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 600;
        color: #c6a43b;
        margin-bottom: 8px;
        transition: all 0.3s ease;
    }
    
    .stat-item:hover .stat-number {
        transform: scale(1.1);
        color: #003366;
    }
    
    .stat-label {
        font-size: 0.65rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #003366;
        font-weight: 600;
        transition: letter-spacing 0.3s ease;
    }
    
    .stat-item:hover .stat-label {
        letter-spacing: 0.3em;
    }
    
    /* ==================== ABOUT ==================== */
    .about-grid {
        display: flex;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
    }
    .about-content { flex: 1; }
    .about-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 20px;
        line-height: 1.3;
        color: #003366;
        position: relative;
        display: inline-block;
    }
    
    .about-content h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 0;
        height: 2px;
        background: #c6a43b;
        transition: width 0.5s ease;
    }
    
    .about-content:hover h3::after {
        width: 100%;
    }
    
    .about-content p {
        color: #2c5f8a;
        line-height: 1.8;
        margin-bottom: 20px;
        font-size: 0.9rem;
        transform: translateX(0);
        transition: all 0.3s ease;
    }
    
    .about-content p:hover {
        transform: translateX(10px);
        color: #003366;
    }
    
    .about-image {
        flex: 1;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        box-shadow: 0 10px 30px rgba(0, 51, 102, 0.15);
        position: relative;
    }
    
    .about-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(198,164,59,0.3), transparent);
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: 1;
    }
    
    .about-image:hover::before {
        opacity: 1;
    }
    
    .about-image:hover { 
        transform: scale(1.03) translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 51, 102, 0.25);
    }
    
    .about-image img { 
        width: 100%; 
        height: auto; 
        display: block; 
        transition: transform 0.5s ease;
    }
    
    .about-image:hover img {
        transform: scale(1.05);
    }
    
    /* ==================== DESTINASI ==================== */
    .destinasi-list { display: flex; flex-direction: column; gap: 80px; }
    .destinasi-item {
        display: flex;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
        transition: all 0.5s ease;
    }
    
    .destinasi-item.reverse { flex-direction: row-reverse; }
    
    .destinasi-image {
        flex: 1;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 51, 102, 0.15);
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        position: relative;
    }
    
    .destinasi-image::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(198,164,59,0.4), transparent);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
        z-index: 1;
    }
    
    .destinasi-image:hover::before {
        width: 300px;
        height: 300px;
    }
    
    .destinasi-image:hover { 
        transform: scale(1.05) translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 51, 102, 0.25);
        animation: pulse 0.5s ease;
    }
    
    .destinasi-image img { 
        width: 100%; 
        height: auto; 
        display: block; 
        transition: transform 0.5s ease;
    }
    
    .destinasi-image:hover img {
        transform: scale(1.08);
    }
    
    .destinasi-content { 
        flex: 1; 
        transition: all 0.5s ease;
    }
    
    .destinasi-item:hover .destinasi-content {
        transform: translateX(15px);
    }
    
    .destinasi-number {
        font-size: 0.7rem;
        letter-spacing: 0.2em;
        color: #c6a43b;
        margin-bottom: 12px;
        text-transform: uppercase;
        font-weight: 600;
        position: relative;
        display: inline-block;
    }
    
    .destinasi-number::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 1px;
        background: #c6a43b;
        transition: width 0.4s ease;
    }
    
    .destinasi-item:hover .destinasi-number::before {
        width: 100%;
    }
    
    .destinasi-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 15px;
        color: #003366;
        transition: all 0.3s ease;
    }
    
    .destinasi-item:hover .destinasi-content h3 {
        transform: translateX(10px);
        color: #c6a43b;
    }
    
    .destinasi-location {
        font-size: 0.7rem;
        letter-spacing: 0.1em;
        color: #2c5f8a;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .destinasi-item:hover .destinasi-location {
        transform: translateX(10px);
    }
    
    .destinasi-desc {
        color: #2c5f8a;
        line-height: 1.8;
        margin-bottom: 25px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    
    .destinasi-item:hover .destinasi-desc {
        transform: translateX(10px);
    }
    
    .destinasi-link {
        display: inline-block;
        border: 1px solid #c6a43b;
        color: #c6a43b;
        padding: 10px 28px;
        font-size: 0.7rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        border-radius: 40px;
        background: transparent;
        position: relative;
        overflow: hidden;
    }
    
    .destinasi-link::before {
        content: '→';
        position: absolute;
        right: -20px;
        top: 50%;
        transform: translateY(-50%);
        transition: right 0.4s ease;
        opacity: 0;
    }
    
    .destinasi-link:hover::before {
        right: 15px;
        opacity: 1;
    }
    
    .destinasi-link:hover {
        background: #c6a43b;
        color: #003366;
        letter-spacing: 0.25em;
        transform: translateY(-3px) scale(1.05);
        padding-right: 45px;
        box-shadow: 0 8px 20px rgba(198,164,59,0.3);
    }
    
    /* ==================== PETA LOKASI ==================== */
    .maps-container {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 51, 102, 0.15);
        margin-bottom: 30px;
        transition: all 0.5s ease;
    }
    
    .maps-container:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 45px rgba(0, 51, 102, 0.25);
    }
    
    .maps-container iframe {
        width: 100%;
        height: 450px;
        border: 0;
        transition: transform 0.5s ease;
    }
    
    .maps-container:hover iframe {
        transform: scale(1.02);
    }
    
    .maps-info {
        background: linear-gradient(135deg, #003366, #0a4a7a);
        padding: 25px 30px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .maps-locations {
        display: flex;
        gap: 25px;
        flex-wrap: wrap;
    }
    
    .maps-location-item {
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(255,255,255,0.1);
        padding: 10px 24px;
        border-radius: 50px;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        cursor: pointer;
        border: 1px solid transparent;
        position: relative;
        overflow: hidden;
    }
    
    .maps-location-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.4s ease;
    }
    
    .maps-location-item:hover::before {
        left: 100%;
    }
    
    .maps-location-item:hover {
        background: #c6a43b;
        transform: translateY(-5px) scale(1.05);
        border-color: rgba(255,255,255,0.3);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    
    .maps-location-item i {
        font-size: 1rem;
        color: #c6a43b;
        transition: all 0.3s ease;
    }
    
    .maps-location-item:hover i {
        color: #003366;
        transform: rotate(360deg) scale(1.2);
    }
    
    .maps-location-item span {
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .maps-location-item:hover span {
        letter-spacing: 1px;
    }
    
    .maps-note {
        font-size: 0.75rem;
        color: rgba(255,255,255,0.7);
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    
    .maps-note:hover {
        transform: translateX(5px);
        color: white;
    }
    
    .maps-note i {
        color: #c6a43b;
        animation: pulse 2s infinite;
    }
    
    /* ==================== CTA ==================== */
    .cta-section {
        background: linear-gradient(135deg, #003366 0%, #0a4a7a 50%, #005c8a 100%);
        padding: 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }
    
    .cta-section::after {
        content: '✦';
        position: absolute;
        font-size: 3rem;
        color: rgba(255,255,255,0.05);
        bottom: 20px;
        right: 30px;
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .cta-content { 
        max-width: 600px; 
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    
    .cta-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 20px;
        color: white;
        animation: fadeInUp 0.8s ease;
    }
    
    .cta-content .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 25px;
        transition: width 0.5s ease;
    }
    
    .cta-content:hover .divider {
        width: 100px;
    }
    
    .cta-content p {
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 35px;
        font-size: 0.9rem;
        line-height: 1.7;
        animation: fadeInUp 0.8s ease 0.2s both;
    }
    
    .cta-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 14px 42px;
        font-size: 0.75rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        text-decoration: none;
        border-radius: 40px;
        font-weight: 600;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease 0.4s both;
    }
    
    .cta-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    
    .cta-btn:hover::before {
        width: 300px;
        height: 300px;
    }
    
    .cta-btn:hover {
        background: white;
        color: #003366;
        transform: translateY(-5px) scale(1.05);
        letter-spacing: 0.3em;
        box-shadow: 0 15px 30px rgba(0,0,0,0.3);
    }
    
    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .hero-title { font-size: 2.8rem; }
        .destinasi-item, .destinasi-item.reverse { flex-direction: column; gap: 30px; }
        .about-grid { flex-direction: column; text-align: center; }
        .maps-container iframe { height: 350px; }
        .maps-info { flex-direction: column; text-align: center; }
        .maps-locations { justify-content: center; }
    }
    @media (max-width: 768px) {
        .hero-title { font-size: 2rem; }
        .hero-subtitle { font-size: 0.6rem; letter-spacing: 0.2em; }
        .hero-btn { padding: 10px 28px; font-size: 0.65rem; }
        .section { padding: 60px 0; }
        .section-title h2 { font-size: 1.6rem; }
        .destinasi-content h3 { font-size: 1.6rem; }
        .stats-grid { flex-direction: column; align-items: center; gap: 25px; }
        .stat-number { font-size: 2rem; }
        .about-content h3 { font-size: 1.6rem; }
        .cta-content h3 { font-size: 1.6rem; }
        .cta-btn { padding: 10px 28px; font-size: 0.65rem; }
        .maps-container iframe { height: 280px; }
        .maps-location-item { padding: 6px 18px; }
        .maps-location-item span { font-size: 0.7rem; }
    }
    @media (max-width: 480px) {
        .hero-title { font-size: 1.6rem; }
        .hero-subtitle { font-size: 0.5rem; letter-spacing: 0.15em; }
        .dot { width: 8px; height: 8px; }
        .dot.active { width: 20px; }
        .maps-container iframe { height: 220px; }
    }
</style>

<!-- ==================== HERO SLIDER ==================== -->
<section class="hero-section" id="home">
    <div class="slides-container">
        <div class="slide slide-1 active"></div>
        <div class="slide slide-2"></div>
        <div class="slide slide-3"></div>
        <div class="slide slide-4"></div>
        <div class="slide slide-5"></div>
    </div>
    
    <div class="slider-dots">
        <div class="dot active" data-slide="0"></div>
        <div class="dot" data-slide="1"></div>
        <div class="dot" data-slide="2"></div>
        <div class="dot" data-slide="3"></div>
        <div class="dot" data-slide="4"></div>
    </div>
    
    <div class="hero-content">
        <div>
            <div class="hero-subtitle">Global Geopark</div>
            <h1 class="hero-title">Simanindo - Batu Hoda</h1>
            <div class="hero-divider"></div>
            <a href="#destinasi" class="hero-btn">Jelajahi Sekarang</a>
        </div>
    </div>
    
    <div class="scroll-indicator" onclick="document.getElementById('destinasi').scrollIntoView({behavior:'smooth'})">
        <span>SCROLL</span>
        <div class="line"></div>
    </div>
</section>

<!-- ==================== STATISTICS ==================== -->
<section class="section section-white">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800">
                <div class="stat-number">16</div>
                <div class="stat-label">GEOSITES</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                <div class="stat-number">74.000</div>
                <div class="stat-label">TAHUN SEJARAH</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                <div class="stat-number">15+</div>
                <div class="stat-label">WARISAN BUDAYA</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                <div class="stat-number">100+</div>
                <div class="stat-label">UMKM LOKAL</div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== ABOUT ==================== -->
<section class="section section-light" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-content" data-aos="fade-right" data-aos-duration="1000">
                <h3>Warisan Geologi Kelas Dunia</h3>
                <p>Danau Toba, terbentuk dari letusan supervolcano 74.000 tahun lalu, adalah danau vulkanik terbesar di dunia. Diakui UNESCO sebagai Global Geopark pada tahun 2020.</p>
                <p>Kawasan Simanindo - Batu Hoda menyimpan pesona pantai eksotis, museum budaya Batak, serta formasi batu unik yang menjadi ikon geopark Danau Toba.</p>
            </div>
            <div class="about-image" data-aos="fade-left" data-aos-duration="1000">
                <img src="/image/SBH/DanauToba.png" alt="Danau Toba">
            </div>
        </div>
    </div>
</section>

<!-- ==================== DESTINASI UNGGULAN ==================== -->
<section id="destinasi" class="section section-white">
    <div class="container">
        <div class="section-title" data-aos="fade-up" data-aos-duration="800">
            <h2>Destinasi Unggulan</h2>
            <div class="divider"></div>
            <p>Wisata eksotis di kawasan Simanindo - Batu Hoda, Pulau Samosir</p>
        </div>
        <div class="destinasi-list">
            
            <!-- BATU HODA BEACH -->
            <div class="destinasi-item" data-aos="fade-up" data-aos-duration="1000">
                <div class="destinasi-image">
                    <img src="/image/SBH/BatuHoda.png" alt="Batu Hoda Beach">
                </div>
                <div class="destinasi-content">
                    <div class="destinasi-number">01 — DESTINASI ALAM</div>
                    <h3>Batu Hoda Beach</h3>
                    <div class="destinasi-location">Desa Cinta Dame, Kecamatan Simanindo, Kabupaten Samosir</div>
                    <p class="destinasi-desc">Pantai Batu Hoda menawarkan pemandangan Danau Toba yang spektakuler dengan air berwarna biru kehijauan. Terdapat batu besar berbentuk unik yang konon menyerupai kuda. Tempat ini menjadi spot favorit untuk menikmati matahari terbenam terindah di Pulau Samosir.</p>
                    <a href="{{ url('/geosite/batu_hoda_beach') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                </div>
            </div>
            
            <!-- MUSEUM HUTA BOLON -->
            <div class="destinasi-item reverse" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="destinasi-image">
                    <img src="/image/SBH/HutaBolon.png" alt="Museum Huta Bolon">
                </div>
                <div class="destinasi-content">
                    <div class="destinasi-number">02 — DESTINASI BUDAYA</div>
                    <h3>Museum Huta Bolon</h3>
                    <div class="destinasi-location">Desa Simanindo, Kecamatan Simanindo, Kabupaten Samosir</div>
                    <p class="destinasi-desc">Museum Huta Bolon adalah museum terbuka yang menyajikan rumah adat Batak Toba yang megah dengan arsitektur tradisional. Di sini pengunjung dapat menyaksikan pertunjukan tarian tortor, mendengarkan musik gondang, dan belajar tentang sejarah serta filosofi masyarakat Batak.</p>
                    <a href="{{ url('/geosite/museum_huta_bolon') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                </div>
            </div>
            
            <!-- BATU PASA PANTAI -->
            <div class="destinasi-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="destinasi-image">
                    <img src="/image/SBH/BatuPasa.png" alt="Batu Pasa Pantai">
                </div>
                <div class="destinasi-content">
                    <div class="destinasi-number">03 — DESTINASI ALAM</div>
                    <h3>Batu Passa</h3>
                    <div class="destinasi-location">Kawasan Batu Hoda, Kecamatan Simanindo, Kabupaten Samosir</div>
                    <p class="destinasi-desc">Batu Pasa Pantai menyuguhkan formasi batu alam yang menakjubkan di tepian Danau Toba. Pengunjung dapat berenang di air danau yang jernih, berjemur di bebatuan besar, atau sekadar bersantai menikmati angin sepoi-sepoi. Spot foto yang instagramable dengan latar perbukitan hijau.</p>
                    <a href="{{ url('/geosite/batu_pasa_pantai') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== PETA LOKASI ==================== -->
<section class="section section-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up" data-aos-duration="800">
            <h2>Lokasi Wisata</h2>
            <div class="divider"></div>
            <p>Pantai Batu Hoda - Museum Huta Bolon - Batu Pasa Pantai, Simanindo Samosir</p>
        </div>
        
        <div class="maps-container" data-aos="zoom-in" data-aos-duration="1000">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255146.3323067858!2d98.6015525546252!3d2.6173426176378544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031d2590212727b%3A0x6335133649692f8d!2sPulau%20Samosir!5e0!3m2!1sid!2sid!4v1714980000000!5m2!1sid!2sid"
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="maps-info">
                <div class="maps-locations">
                    <div class="maps-location-item" onclick="window.open('https://maps.app.goo.gl/YVZvcTjvMEK78QFp7?g_st=iwb', '_blank')">
                        <i class="fas fa-location-dot"></i>
                        <span>#BatuHodaBeach</span>
                    </div>
                    <div class="maps-location-item" onclick="window.open('https://maps.app.goo.gl/u3QiSj4zg47978fu6?g_st=iwb', '_blank')">
                        <i class="fas fa-location-dot"></i>
                        <span>#MuseumHutaBolon</span>
                    </div>
                    <div class="maps-location-item" onclick="window.open('https://maps.app.goo.gl/J7nhMKXPjTRrL6jh9?g_st=iwb', '_blank')">
                        <i class="fas fa-location-dot"></i>
                        <span>#BatuPassa</span>
                    </div>
                </div>
                <div class="maps-note">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Klik lokasi untuk melihat peta detail</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== CTA ==================== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up" data-aos-duration="800">
            <h3>Mulai Petualangan Anda</h3>
            <div class="divider"></div>
            <p>Temukan keindahan Pantai Batu Hoda, belajar budaya Batak di Museum Huta Bolon, dan abadikan momen di Batu Pasa Pantai.</p>
            <a href="#destinasi" class="cta-btn">Jelajahi Sekarang</a>
        </div>
    </div>
</section>

<script>
    // ==================== HERO SLIDER ====================
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let slideInterval;
    const slideCount = slides.length;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            if (dots[i]) dots[i].classList.remove('active');
        });
        
        slides[index].classList.add('active');
        if (dots[index]) dots[index].classList.add('active');
        currentSlide = index;
    }

    function nextSlide() {
        let next = (currentSlide + 1) % slideCount;
        showSlide(next);
    }

    function startSlider() {
        if (slideInterval) clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 5000);
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            clearInterval(slideInterval);
            showSlide(index);
            startSlider();
        });
    });

    startSlider();

    // ==================== SMOOTH SCROLL ====================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
    
    // ==================== ADDITIONAL ANIMATION ON SCROLL ====================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.stat-item, .destinasi-item, .maps-container').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.8s ease';
        observer.observe(el);
    });
</script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script>AOS.init({ duration: 800, once: true, offset: 50 });</script>

@endsection