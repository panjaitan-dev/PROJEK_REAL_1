@extends('layouts.app')

@section('title', 'Informasi Terbaru - Geosite Danau Toba')

@push('styles')
<style>
    /* ==============================
       INFORMASI PAGE - DESIGN SYSTEM
       Template konsisten dengan galeri & berita
    ============================== */

    .page-hero {
        position: relative;
        height: 55vh; min-height: 360px;
        display: flex; align-items: center; justify-content: center;
        text-align: center; color: #fff;
        margin-top: 0; overflow: hidden;
        background: linear-gradient(160deg, rgba(0,30,70,0.85) 0%, rgba(0,51,102,0.6) 55%, rgba(0,80,130,0.5) 100%),
                   url('{{ !empty($hs["informasi_hero_gambar"]) ? asset("storage/" . $hs["informasi_hero_gambar"]) : "/image/SBH/DanauToba.webp" }}') center top/cover no-repeat;
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

    /* === MAIN SECTION === */
    .page-content {
        padding: 60px 0 100px;
        background: linear-gradient(160deg, #f0f7ff 0%, #e8f0fa 55%, #dde5f0 100%);
        min-height: 60vh;
    }
    .page-container { max-width: 1360px; margin: 0 auto; padding: 0 24px; }

    .sec-header { display: flex; align-items: center; gap: 14px; margin-bottom: 12px; }
    .sec-header h2 {
        font-size: 1.35rem; font-weight: 800; color: #003366;
        white-space: nowrap; margin: 0;
    }
    .sec-line { display: none; }
    .sec-badge {
        background: linear-gradient(135deg, #003366, #1a4a7a);
        color: #c6a43b; font-size: 0.6rem; font-weight: 800;
        letter-spacing: 1.5px; text-transform: uppercase;
        padding: 4px 14px; border-radius: 20px; white-space: nowrap;
    }
    .sec-desc {
        font-size: 0.84rem; color: #64748b; margin-bottom: 28px;
        line-height: 1.7; max-width: 580px;
    }

    /* ==============================
       KARTU INFORMASI — Grid 3 Kolom
    ============================== */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
    .info-card {
        background: #fff; border-radius: 18px;
        overflow: hidden; cursor: pointer;
        position: relative;
        transition: all 0.4s cubic-bezier(0.34,1.56,0.64,1);
        box-shadow: 0 4px 20px rgba(0,51,102,0.08);
        border: 1px solid rgba(198,164,59,0.08);
        display: flex; flex-direction: column;
    }
    .info-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 45px rgba(0,51,102,0.16), 0 0 0 1.5px rgba(198,164,59,0.25);
    }

    /* Header gelap dengan ikon */
    .ic-header {
        background: linear-gradient(135deg, #0a1628, #0f2548);
        padding: 32px 24px 24px;
        position: relative; overflow: hidden;
        min-height: 150px;
        display: flex; flex-direction: column; justify-content: space-between;
    }
    .ic-header::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(circle at 80% 20%, rgba(198,164,59,0.18), transparent 65%);
    }
    .ic-thumb {
        width: 100%; height: 180px;
        background-position: center top;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .do-image-wrap {
        margin-bottom: 18px;
    }
    .do-image-wrap img {
        width: 100%; display: block;
        border-radius: 18px;
        object-fit: cover;
        object-position: center top;
    }
    .ic-num {
        position: absolute; top: 14px; right: 14px;
        color: rgba(198,164,59,0.5); font-size: 0.6rem;
        font-weight: 700; font-family: monospace;
        letter-spacing: 1px;
    }
    .ic-icon {
        width: 56px; height: 56px; border-radius: 14px;
        background: linear-gradient(135deg, rgba(198,164,59,0.2), rgba(0,51,102,0.3));
        border: 1.5px solid rgba(198,164,59,0.4);
        display: flex; align-items: center; justify-content: center;
        position: relative; z-index: 1;
        transition: transform 0.3s ease;
    }
    .info-card:hover .ic-icon { transform: scale(1.1) rotate(-5deg); }
    .ic-icon i { color: #c6a43b; font-size: 1.4rem; }
    .ic-badge {
        display: inline-block; align-self: flex-start;
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; font-size: 0.5rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1.2px;
        padding: 3px 10px; border-radius: 12px;
        margin-top: 14px; position: relative; z-index: 1;
    }

    /* Body: judul & kutipan */
    .ic-body {
        padding: 18px 22px 22px;
        flex: 1; display: flex; flex-direction: column;
    }
    .ic-title {
        font-size: 0.95rem; font-weight: 700; color: #003366;
        line-height: 1.4; margin-bottom: 8px;
        display: -webkit-box; -webkit-line-clamp: 2;
        -webkit-box-orient: vertical; overflow: hidden;
        transition: color 0.3s ease;
    }
    .info-card:hover .ic-title { color: #c6a43b; }
    .ic-excerpt {
        font-size: 0.78rem; color: #64748b; line-height: 1.7;
        display: -webkit-box; -webkit-line-clamp: 3;
        -webkit-box-orient: vertical; overflow: hidden;
        flex: 1; margin-bottom: 16px;
    }
    .ic-btn {
        display: flex; align-items: center; justify-content: center; gap: 6px;
        background: linear-gradient(135deg, #003366, #1a4a7a);
        color: #fff; border: none; border-radius: 50px;
        font-size: 0.72rem; font-weight: 700; letter-spacing: 0.5px;
        padding: 10px 18px; cursor: pointer; width: 100%;
        transition: all 0.3s ease;
    }
    .ic-btn:hover {
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; transform: scale(1.02);
    }

    /* Garis bawah animasi */
    .ic-line {
        height: 3px;
        background: linear-gradient(90deg, #c6a43b, transparent);
        transform: scaleX(0); transform-origin: left;
        transition: transform 0.4s ease;
    }
    .info-card:hover .ic-line { transform: scaleX(1); }

    /* Empty */
    .empty-box {
        grid-column: 1/-1; text-align: center;
        padding: 80px 40px; background: #fff;
        border-radius: 20px; border: 2px dashed rgba(198,164,59,0.2);
    }
    .empty-box i { font-size: 3.5rem; color: rgba(198,164,59,0.2); display: block; margin-bottom: 14px; }
    .empty-box p { color: #64748b; font-weight: 600; }

    /* ==============================
       DETAIL OVERLAY
    ============================== */
    .detail-overlay {
        position: fixed; inset: 0;
        background: rgba(0,0,0,0.94);
        z-index: 9999; display: none;
        align-items: center; justify-content: center;
        backdrop-filter: blur(15px); padding: 20px;
    }
    .detail-overlay.show { display: flex; }
    .do-box {
        background: linear-gradient(135deg, #1a1a1a, #0f0f0f);
        width: 100%; max-width: 900px; max-height: 90vh;
        display: grid; grid-template-columns: auto 1fr;
        border-radius: 20px; overflow: hidden;
        animation: modalPop 0.4s cubic-bezier(0.34,1.56,0.64,1);
        box-shadow: 0 40px 80px rgba(0,0,0,0.5);
        border: 1px solid rgba(198,164,59,0.25);
    }
    @keyframes modalPop {
        from { opacity: 0; transform: scale(0.92); }
        to   { opacity: 1; transform: scale(1); }
    }
    .do-icon-side {
        background: linear-gradient(180deg, #0a1628, #0d1e3a);
        display: flex; flex-direction: column;
        align-items: center; justify-content: center;
        padding: 40px 36px; gap: 16px;
        min-width: 140px;
    }
    .do-icon-big {
        width: 80px; height: 80px; border-radius: 20px;
        background: linear-gradient(135deg, rgba(198,164,59,0.2), rgba(0,51,102,0.3));
        border: 2px solid rgba(198,164,59,0.4);
        display: flex; align-items: center; justify-content: center;
    }
    .do-icon-big i { color: #c6a43b; font-size: 2rem; }
    .do-num { color: rgba(198,164,59,0.6); font-size: 0.7rem; font-weight: 700; font-family: monospace; }

    .do-text {
        padding: 36px 32px; color: #fff;
        display: flex; flex-direction: column;
        position: relative; overflow-y: auto;
    }
    .do-text::before {
        content: ''; position: absolute; left: 0; top: 0; bottom: 0;
        width: 3px; background: linear-gradient(180deg, #c6a43b, transparent);
    }
    .do-close {
        position: absolute; top: 16px; right: 16px;
        width: 42px; height: 42px; border-radius: 50%;
        background: rgba(0,0,0,0.6); border: 1px solid rgba(198,164,59,0.3);
        display: flex; align-items: center; justify-content: center;
        color: #fff; font-size: 1.1rem; cursor: pointer;
        transition: all 0.3s ease;
    }
    .do-close:hover {
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; transform: rotate(90deg) scale(1.1);
    }
    .do-tag {
        display: inline-block; background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; font-size: 0.58rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1.5px;
        padding: 4px 12px; border-radius: 16px; margin-bottom: 14px;
        align-self: flex-start;
    }
    .do-text h2 {
        font-size: 1.4rem; font-weight: 700; color: #fff;
        line-height: 1.35; margin: 0 0 8px;
    }
    .do-divider {
        width: 50px; height: 3px; border-radius: 2px;
        background: linear-gradient(90deg, #c6a43b, transparent);
        margin-bottom: 20px;
    }
    .do-content {
        color: #c0c9d8; line-height: 1.9; font-size: 0.88rem;
    }
    .do-content p { margin-bottom: 16px; }

    /* CTA */
    .page-cta {
        background: linear-gradient(135deg, #003366 0%, #0a3a6a 100%);
        padding: 60px 24px; text-align: center; color: #fff;
        position: relative; overflow: hidden;
    }
    .page-cta::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(circle at 50% 100%, rgba(198,164,59,0.15), transparent 60%);
    }
    .page-cta h3 {
        font-size: 1.6rem; font-weight: 700;
        margin-bottom: 12px; position: relative; z-index: 1;
    }
    .page-cta em { color: #c6a43b; font-style: italic; }php
    .page-cta p {
        max-width: 550px; margin: 0 auto 24px;
        font-size: 0.85rem; opacity: 0.8; line-height: 1.7;
        position: relative; z-index: 1;
    }
    .page-cta-btn {
        display: inline-block; padding: 12px 32px;
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; font-size: 0.8rem; font-weight: 700;
        letter-spacing: 1px; border-radius: 50px;
        text-decoration: none; position: relative; z-index: 1;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .page-cta-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(198,164,59,0.4);
        color: #003366;
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) { .info-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 640px) {
        .info-grid { grid-template-columns: 1fr; gap: 16px; }
        .page-hero h1 { font-size: 2rem; }
        .do-box { grid-template-columns: 1fr; }
        .do-icon-side { flex-direction: row; padding: 20px; min-width: auto; }
    }
</style>
@endpush

@section('content')

<!-- HERO -->
<section class="page-hero">
    <div class="page-hero-inner">
        <div class="page-hero-eyebrow">Geosite Danau Toba</div>
        <h1>{{ $hs['informasi_title'] ?? 'Informasi Terbaru' }}</h1>
        <div class="page-hero-sub">{{ $hs['informasi_subtitle'] ?? 'Warisan Geologi Kelas Dunia' }}</div>
    </div>
</section>

<!-- CONTENT -->
<section class="page-content">
    <div class="page-container">

        <div class="sec-header">
            <h2>Informasi Pilihan</h2>
            <span class="sec-badge">Klik Kartu untuk Detail</span>
        </div>
        <p class="sec-desc">
            Temukan informasi lengkap seputar sejarah, geologi, dan budaya Geopark Kaldera Toba.
        </p>

        @php
            $icons = [
                'fas fa-mountain','fas fa-water','fas fa-fire','fas fa-leaf',
                'fas fa-globe','fas fa-landmark','fas fa-binoculars','fas fa-compass',
                'fas fa-map-marked-alt','fas fa-star','fas fa-book-open','fas fa-camera',
            ];
        @endphp

        <div class="info-grid">
            @forelse($sejarahList as $i => $item)
            <div class="info-card" data-idx="{{ $i }}" data-icon="{{ $icons[$i % count($icons)] }}">
                <div class="ic-header">
                    <span class="ic-num">#{{ str_pad($i+1, 3, '0', STR_PAD_LEFT) }}</span>
                    <div class="ic-icon"><i class="{{ $icons[$i % count($icons)] }}"></i></div>
                    <span class="ic-badge">Informasi</span>
                </div>
                <div class="ic-thumb" style="background-image: url('{{ $item->gambar_url }}')"></div>
                <div class="ic-body">
                    <div class="ic-title">{{ $item->judul }}</div>
                    <div class="ic-excerpt">{{ Str::limit(strip_tags($item->konten), 120) }}</div>
                    <button class="ic-btn"><i class="fas fa-book-reader"></i> Baca Detail</button>
                </div>
                <div class="ic-line"></div>
            </div>
            @empty
            <div class="empty-box">
                <i class="fas fa-scroll"></i>
                <p>Belum ada informasi.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

<!-- DETAIL OVERLAY -->
<div class="detail-overlay" id="detailOverlay">
    <div class="do-box" onclick="event.stopPropagation()">
        <div class="do-icon-side">
            <div class="do-icon-big"><i id="doIcon" class="fas fa-mountain"></i></div>
            <div class="do-num" id="doNum">#001</div>
        </div>
        <div class="do-text">
            <div class="do-close" id="doClose"><i class="fas fa-times"></i></div>
            <span class="do-tag">Informasi</span>
            <h2 id="doTitle"></h2>
            <div class="do-divider"></div>
            <div class="do-content" id="doContent"></div>
        </div>
    </div>
</div>

<!-- CTA -->
<section class="page-cta">
    <h3>{{ $hs['cta_judul'] ?? 'Mulai Petualangan Anda' }}</h3>
    <p>{{ $hs['cta_deskripsi'] ?? 'Temukan keindahan Pantai Batu Hoda, belajar budaya Batak di Museum Huta Bolon, dan abadikan momen di Batu Pasa Pantai.' }}</p>
    <a href="{{ url('/') }}" class="page-cta-btn">Kembali ke Beranda</a>
</section>

@endsection

@push('scripts')
<script>
(function() {
    var infoData = @json($sejarahList);

    var infoIcons = [];
    document.querySelectorAll('.info-card[data-icon]').forEach(function(el) {
        infoIcons.push(el.getAttribute('data-icon'));
    });

    function openDetail(idx) {
        var item = infoData[idx];
        if (!item) return;
        document.getElementById('doIcon').className = infoIcons[idx % infoIcons.length] || 'fas fa-info-circle';
        document.getElementById('doNum').textContent = '#' + String(idx + 1).padStart(3, '0');
        document.getElementById('doTitle').textContent = item.judul;
        var imageBlock = item.gambar_url ? '<div class="do-image-wrap"><img src="' + item.gambar_url + '" alt="' + (item.judul || '') + '"></div>' : '';
        document.getElementById('doContent').innerHTML = imageBlock + (item.konten || '<p>Tidak ada konten.</p>');
        document.getElementById('detailOverlay').classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeDetail() {
        document.getElementById('detailOverlay').classList.remove('show');
        document.body.style.overflow = 'auto';
    }

    document.querySelectorAll('.info-card').forEach(function(el) {
        el.addEventListener('click', function() { openDetail(parseInt(el.dataset.idx)); });
    });
    document.getElementById('detailOverlay').addEventListener('click', closeDetail);
    document.getElementById('doClose').addEventListener('click', function(e) { e.stopPropagation(); closeDetail(); });
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeDetail(); });
})();
</script>
@endpush