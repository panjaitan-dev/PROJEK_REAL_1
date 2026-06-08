@extends('layouts.app')

@section('title', 'Berita Terkini - Geosite Danau Toba')

@push('styles')
<style>
    /* ==============================
       BERITA PAGE - DESIGN SYSTEM
    ============================== */

    .page-hero {
        position: relative;
        height: 55vh; min-height: 360px;
        display: flex; align-items: center; justify-content: center;
        text-align: center; color: #fff;
        margin-top: 0; overflow: hidden;
        background: linear-gradient(135deg, rgba(0,51,102,0.8) 0%, rgba(0,0,0,0.35) 50%, rgba(0,51,102,0.7) 100%),
                    url('{{ !empty($hs["berita_hero_gambar"]) ? asset("storage/" . $hs["berita_hero_gambar"]) : "/image/SBH/BatuHoda2.webp" }}') center top/cover no-repeat;
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
        font-weight: 800; letter-spacing: 2px; margin-bottom: 10px;
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
    .sec-header h2 { font-size: 1.35rem; font-weight: 800; color: #003366; white-space: nowrap; margin: 0; }
    .sec-line { display: none; }
    .sec-badge {
        background: linear-gradient(135deg, #003366, #1a4a7a);
        color: #c6a43b; font-size: 0.6rem; font-weight: 800;
        letter-spacing: 1.5px; text-transform: uppercase;
        padding: 4px 14px; border-radius: 20px; white-space: nowrap;
    }
    .sec-desc { font-size: 0.84rem; color: #64748b; margin-bottom: 28px; line-height: 1.7; max-width: 580px; }

    /* === KARTU BERITA === */
    .news-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .news-card {
        background: #fff; border-radius: 18px;
        overflow: hidden; position: relative; cursor: pointer;
        transition: all 0.4s cubic-bezier(0.34,1.56,0.64,1);
        box-shadow: 0 4px 20px rgba(0,51,102,0.08);
        border: 1px solid rgba(198,164,59,0.08);
        display: flex; flex-direction: column;
    }
    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 45px rgba(0,51,102,0.16), 0 0 0 1.5px rgba(198,164,59,0.25);
    }
    .nc-img { position: relative; height: 160px; overflow: hidden; background: #0a1628; flex-shrink: 0; }
    .nc-img img {
        width: 100%; height: 100%; object-fit: cover; display: block;
        transition: transform 0.5s ease; filter: brightness(0.85);
    }
    .news-card:hover .nc-img img { transform: scale(1.06); filter: brightness(1); }
    .nc-img::after {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(0,15,45,0.65) 0%, transparent 55%);
        pointer-events: none;
    }
    .nc-badge {
        position: absolute; top: 12px; left: 12px; z-index: 2;
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; font-size: 0.5rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1.2px;
        padding: 3px 10px; border-radius: 14px;
    }
    .nc-body { padding: 18px 20px 20px; flex: 1; display: flex; flex-direction: column; }
    .nc-date { display: flex; align-items: center; gap: 5px; font-size: 0.68rem; color: #94a3b8; font-weight: 500; margin-bottom: 8px; }
    .nc-date i { color: #c6a43b; }
    .nc-title {
        font-size: 0.95rem; font-weight: 700; color: #003366;
        line-height: 1.4; margin-bottom: 8px;
        display: -webkit-box; -webkit-line-clamp: 2;
        -webkit-box-orient: vertical; overflow: hidden;
        transition: color 0.3s ease;
    }
    .news-card:hover .nc-title { color: #c6a43b; }
    .nc-excerpt {
        font-size: 0.78rem; color: #64748b; line-height: 1.7;
        display: -webkit-box; -webkit-line-clamp: 3;
        -webkit-box-orient: vertical; overflow: hidden;
        flex: 1; margin-bottom: 16px;
    }
    .nc-btn {
        display: flex; align-items: center; justify-content: center; gap: 6px;
        background: linear-gradient(135deg, #003366, #1a4a7a);
        color: #fff; border: none; border-radius: 50px;
        font-size: 0.72rem; font-weight: 700; letter-spacing: 0.5px;
        padding: 10px 18px; cursor: pointer; width: 100%; transition: all 0.3s ease;
    }
    .nc-btn:hover { background: linear-gradient(135deg, #c6a43b, #d4a947); color: #003366; transform: scale(1.02); }
    .nc-line {
        height: 3px; background: linear-gradient(90deg, #c6a43b, transparent);
        transform: scaleX(0); transform-origin: left; transition: transform 0.4s ease;
    }
    .news-card:hover .nc-line { transform: scaleX(1); }

    .empty-box {
        grid-column: 1/-1; text-align: center; padding: 80px 40px;
        background: #fff; border-radius: 20px; border: 2px dashed rgba(198,164,59,0.2);
    }
    .empty-box i { font-size: 3.5rem; color: rgba(198,164,59,0.2); display: block; margin-bottom: 14px; }
    .empty-box p { color: #64748b; font-weight: 600; }

    /* ==============================
       DETAIL OVERLAY — Gambar Kiri + Teks Kanan
    ============================== */
    .detail-overlay {
        position: fixed; inset: 0;
        background: rgba(0,10,30,0.92);
        z-index: 9999; display: none;
        align-items: center; justify-content: center;
        backdrop-filter: blur(18px); padding: 20px;
    }
    .detail-overlay.show { display: flex; }

    @keyframes modalPop {
        from { opacity: 0; transform: scale(0.93) translateY(20px); }
        to   { opacity: 1; transform: scale(1) translateY(0); }
    }

    /* Wrapper: 2 kolom sejajar, tinggi tetap */
    .do-box {
        width: 100%; max-width: 940px;
        height: 88vh;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr;
        border-radius: 22px; overflow: hidden;
        animation: modalPop 0.4s cubic-bezier(0.34,1.56,0.64,1);
        box-shadow: 0 50px 100px rgba(0,0,0,0.7), 0 0 0 1px rgba(198,164,59,0.2);
    }

    /* Panel KIRI: gambar penuh mengisi tinggi */
    .do-img-panel {
        position: relative;
        overflow: hidden;
        min-height: 0;
    }
    .do-img-panel img {
        position: absolute; inset: 0;
        width: 100%; height: 100%;
        object-fit: cover; object-position: center;
        display: block;
        transition: transform 0.6s ease;
    }
    .do-img-panel:hover img { transform: scale(1.04); }
    .do-img-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(160deg,
            rgba(0,20,60,0.75) 0%,
            rgba(0,40,90,0.4) 50%,
            rgba(0,0,0,0.65) 100%);
        display: flex; flex-direction: column;
        justify-content: flex-end;
        padding: 28px 26px;
    }
    .do-img-eyebrow {
        font-size: 0.6rem; letter-spacing: 0.35em;
        text-transform: uppercase; color: #c6a43b;
        font-weight: 700; margin-bottom: 8px;
    }
    .do-img-title {
        color: #fff; font-size: 1.45rem; font-weight: 800;
        line-height: 1.25; letter-spacing: 0.5px;
        text-shadow: 0 2px 12px rgba(0,0,0,0.5);
        margin-bottom: 10px;
    }
    .do-img-date {
        font-size: 0.65rem; color: rgba(198,164,59,0.85);
        display: flex; align-items: center; gap: 5px;
        font-weight: 600; letter-spacing: 0.5px; margin-bottom: 14px;
    }
    .do-img-divider {
        width: 42px; height: 2.5px; border-radius: 2px;
        background: linear-gradient(90deg, #c6a43b, rgba(198,164,59,0.2));
    }

    /* Panel KANAN: teks scrollable */
    .do-text-panel {
        background: linear-gradient(160deg, #0d1e3a 0%, #0a1525 100%);
        padding: 36px 32px 32px;
        display: flex; flex-direction: column;
        position: relative;
        overflow-y: auto;
        min-height: 0;
        box-sizing: border-box;
    }
    .do-text-panel::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0;
        height: 3px; background: linear-gradient(90deg, #c6a43b, transparent);
    }
    .do-close {
        position: absolute; top: 16px; right: 16px;
        width: 40px; height: 40px; border-radius: 50%;
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(198,164,59,0.3);
        display: flex; align-items: center; justify-content: center;
        color: #fff; font-size: 1rem; cursor: pointer;
        transition: all 0.3s ease; z-index: 10;
    }
    .do-close:hover { background: linear-gradient(135deg, #c6a43b, #d4a947); color: #003366; transform: rotate(90deg) scale(1.1); }
    .do-tag {
        display: inline-block;
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; font-size: 0.56rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1.5px;
        padding: 4px 12px; border-radius: 16px;
        margin-bottom: 14px; align-self: flex-start;
    }
    .do-text-panel h2 { font-size: 1.25rem; font-weight: 700; color: #fff; line-height: 1.35; margin: 0 0 6px; }
    .do-meta {
        display: flex; align-items: center; gap: 6px;
        font-size: 0.68rem; color: rgba(198,164,59,0.7);
        margin-bottom: 14px; font-weight: 600;
    }
    .do-meta i { font-size: 0.7rem; }
    .do-divider {
        width: 40px; height: 2.5px; border-radius: 2px;
        background: linear-gradient(90deg, #c6a43b, transparent); margin-bottom: 18px;
    }
    .do-content { color: #b0bdd0; line-height: 1.9; font-size: 0.84rem; flex: 1; }
    .do-content p { margin-bottom: 14px; }

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
    .page-cta h3 { font-size: 1.6rem; font-weight: 700; margin-bottom: 12px; position: relative; z-index: 1; }
    .page-cta em { color: #c6a43b; font-style: italic; }
    .page-cta p { max-width: 550px; margin: 0 auto 24px; font-size: 0.85rem; opacity: 0.8; line-height: 1.7; position: relative; z-index: 1; }
    .page-cta-btn {
        display: inline-block; padding: 12px 32px;
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; font-size: 0.8rem; font-weight: 700;
        letter-spacing: 1px; border-radius: 50px;
        text-decoration: none; position: relative; z-index: 1;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .page-cta-btn:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(198,164,59,0.4); color: #003366; }

    /* RESPONSIVE */
    @media (max-width: 1024px) { .news-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 768px) {
        .news-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
        .page-content { padding: 40px 0 70px; }
        .page-container { max-width: 100%; padding: 0 14px; }
        .page-hero { height: 45vh; min-height: 280px; }
        .page-hero h1 { font-size: 2rem; }
        .nc-img { height: 140px; }
        .nc-body { padding: 14px 14px 16px; }
        .nc-title { font-size: 0.88rem; }
        .sec-header h2 { font-size: 1.1rem; }
        /* Popup mobile: satu kolom */
        .do-box { grid-template-columns: 1fr; grid-template-rows: auto 1fr; height: 92vh; border-radius: 18px; }
        .do-img-panel { height: 260px; min-height: 260px; }
        .do-img-panel img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; }
        .do-img-title { font-size: 1.1rem; }
        .do-text-panel { padding: 24px 18px 28px; overflow-y: auto; min-height: 0; }
        .do-text-panel h2 { font-size: 1rem; }
        .do-close { top: 12px; right: 12px; }
    }
    @media (max-width: 480px) {
        .news-grid { grid-template-columns: 1fr; gap: 14px; }
        .page-hero h1 { font-size: 1.7rem; }
        .page-hero { height: 40vh; min-height: 240px; }
        .nc-img { height: 160px; }
        .do-box { height: 95vh; }
        .do-img-panel { height: 200px; min-height: 200px; }
    }
</style>
@endpush

@section('content')

<!-- HERO -->
<section class="page-hero">
    <div class="page-hero-inner">
        <div class="page-hero-eyebrow">Geosite Danau Toba</div>
        <h1>{{ $hs['berita_title'] ?? 'Berita Terkini' }}</h1>
        <div class="page-hero-sub">{{ $hs['berita_subtitle'] ?? 'Informasi & Perkembangan Terbaru' }}</div>
    </div>
</section>

<!-- CONTENT -->
<section class="page-content">
    <div class="page-container">

        <div class="sec-header">
            <h2>Berita Pilihan</h2>
            <span class="sec-badge">{{ $berita->total() }} Berita</span>
        </div>
        <p class="sec-desc">
            Ikuti perkembangan seputar Geopark Kaldera Toba — pariwisata, budaya, dan penelitian geologi.
        </p>

        <div class="news-grid">
            @forelse($berita as $i => $item)
            <div class="news-card" data-idx="{{ $i }}">
                <div class="nc-img">
                    <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}"
                         loading="{{ $i < 3 ? 'eager' : 'lazy' }}"
                         onerror="this.src='https://placehold.co/400x200/003366/c6a43b?text=GeoToba'">
                    <span class="nc-badge">Berita</span>
                </div>
                <div class="nc-body">
                    <div class="nc-date">
                        <i class="fas fa-calendar-alt"></i>
                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                    </div>
                    <div class="nc-title">{{ $item->judul }}</div>
                    <div class="nc-excerpt">{{ Str::limit(strip_tags($item->konten), 130) }}</div>
                    <button class="nc-btn"><i class="fas fa-book-open"></i> Baca Selengkapnya</button>
                </div>
                <div class="nc-line"></div>
            </div>
            @empty
            <div class="empty-box">
                <i class="fas fa-newspaper"></i>
                <p>Belum ada berita.</p>
            </div>
            @endforelse
        </div>

        @if($berita->hasPages())
        <div style="margin-top: 40px; display: flex; justify-content: center;">
            {{ $berita->links() }}
        </div>
        @endif

    </div>
</section>

<!-- DETAIL OVERLAY — Gambar Kiri + Teks Kanan -->
<div class="detail-overlay" id="detailOverlay">
    <div class="do-box" onclick="event.stopPropagation()">

        <!-- Panel Kiri: Gambar Penuh -->
        <div class="do-img-panel">
            <img id="doImage" src="" alt="">
            <div class="do-img-overlay">
                <div class="do-img-eyebrow">Geosite Danau Toba</div>
                <div class="do-img-title" id="doImgTitle"></div>
                <div class="do-img-date"><i class="fas fa-calendar-alt"></i> <span id="doImgDate"></span></div>
                <div class="do-img-divider"></div>
            </div>
        </div>

        <!-- Panel Kanan: Teks -->
        <div class="do-text-panel">
            <div class="do-close" id="doClose"><i class="fas fa-times"></i></div>
            <span class="do-tag">Berita</span>
            <h2 id="doTitle"></h2>
            <div class="do-meta"><i class="fas fa-calendar-alt"></i> <span id="doDate"></span></div>
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
    var newsData = @json($berita->getCollection()->each->append('gambar_url'));

    function openDetail(idx) {
        var item = newsData[idx];
        if (!item) return;

        /* Panel kiri — gambar */
        var imgEl = document.getElementById('doImage');
        imgEl.src = item.gambar_url || 'https://placehold.co/600x800/003366/c6a43b?text=GeoToba';
        imgEl.alt = item.judul || '';

        /* Format tanggal */
        var tgl = item.created_at
            ? new Date(item.created_at).toLocaleDateString('id-ID', {day:'numeric', month:'long', year:'numeric'})
            : '';

        /* Judul & tanggal di atas gambar */
        document.getElementById('doImgTitle').textContent = item.judul || '';
        document.getElementById('doImgDate').textContent = tgl;

        /* Panel kanan — teks */
        document.getElementById('doTitle').textContent = item.judul || '';
        document.getElementById('doDate').textContent = tgl;
        document.getElementById('doContent').innerHTML = item.konten || '<p>Tidak ada konten.</p>';

        document.getElementById('detailOverlay').classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeDetail() {
        document.getElementById('detailOverlay').classList.remove('show');
        document.body.style.overflow = 'auto';
    }

    document.querySelectorAll('.news-card').forEach(function(el) {
        el.addEventListener('click', function() { openDetail(parseInt(el.dataset.idx)); });
    });
    document.getElementById('detailOverlay').addEventListener('click', closeDetail);
    document.getElementById('doClose').addEventListener('click', function(e) { e.stopPropagation(); closeDetail(); });
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeDetail(); });
})();
</script>
@endpush