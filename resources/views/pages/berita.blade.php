@extends('layouts.app')

@section('title', 'Berita Terkini - Geosite Danau Toba')

@push('styles')
<style>
    /* ==============================
       BERITA PAGE - DESIGN SYSTEM
       Template konsisten dengan galeri & informasi
    ============================== */

    .page-hero {
        position: relative;
        height: 55vh; min-height: 360px;
        display: flex; align-items: center; justify-content: center;
        text-align: center; color: #fff;
        margin-top: 0; overflow: hidden;
        background: linear-gradient(135deg, rgba(0,51,102,0.8) 0%, rgba(0,0,0,0.35) 50%, rgba(0,51,102,0.7) 100%),
                    url('{{ asset("image/batu_hoda_beach/batu_hoda_beach1.jpg") }}') center/cover no-repeat;
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
       KARTU BERITA — Grid 3 Kolom
    ============================== */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
    .news-card {
        background: #fff; border-radius: 18px;
        overflow: hidden; position: relative;
        transition: all 0.4s cubic-bezier(0.34,1.56,0.64,1);
        box-shadow: 0 4px 20px rgba(0,51,102,0.08);
        border: 1px solid rgba(198,164,59,0.08);
        display: flex; flex-direction: column;
    }
    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 45px rgba(0,51,102,0.16), 0 0 0 1.5px rgba(198,164,59,0.25);
    }

    /* Thumbnail */
    .nc-img {
        position: relative; height: 200px;
        overflow: hidden; background: #0a1628; flex-shrink: 0;
    }
    .nc-img img {
        width: 100%; height: 100%; object-fit: cover; display: block;
        transition: transform 0.5s ease;
        filter: brightness(0.85);
    }
    .news-card:hover .nc-img img {
        transform: scale(1.06); filter: brightness(1);
    }
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
    .nc-num {
        position: absolute; top: 12px; right: 12px; z-index: 2;
        background: rgba(0,0,0,0.5); backdrop-filter: blur(6px);
        color: rgba(198,164,59,0.85); font-size: 0.52rem; font-weight: 700;
        font-family: monospace; padding: 2px 8px; border-radius: 8px;
        border: 1px solid rgba(198,164,59,0.2);
    }

    /* Body */
    .nc-body {
        padding: 18px 20px 20px;
        flex: 1; display: flex; flex-direction: column;
    }
    .nc-date {
        display: flex; align-items: center; gap: 5px;
        font-size: 0.68rem; color: #94a3b8; font-weight: 500;
        margin-bottom: 8px;
    }
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
        padding: 10px 18px; cursor: pointer; width: 100%;
        transition: all 0.3s ease;
    }
    .nc-btn:hover {
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; transform: scale(1.02);
    }
    .nc-line {
        height: 3px;
        background: linear-gradient(90deg, #c6a43b, transparent);
        transform: scaleX(0); transform-origin: left;
        transition: transform 0.4s ease;
    }
    .news-card:hover .nc-line { transform: scaleX(1); }

    /* Empty */
    .empty-box {
        grid-column: 1/-1; text-align: center;
        padding: 80px 40px; background: #fff;
        border-radius: 20px; border: 2px dashed rgba(198,164,59,0.2);
    }
    .empty-box i { font-size: 3.5rem; color: rgba(198,164,59,0.2); display: block; margin-bottom: 14px; }
    .empty-box p { color: #64748b; font-weight: 600; }

    /* ==============================
       FULL READER
    ============================== */
    .full-reader {
        position: fixed; top: 100%; left: 0;
        width: 100%; height: 100%;
        background: linear-gradient(135deg, #fff, #f8f9fa);
        z-index: 99999;
        transition: top 0.7s cubic-bezier(0.34,1.56,0.64,1);
        overflow-y: auto; visibility: hidden;
    }
    .full-reader.open { top: 0; visibility: visible; }

    .fr-progress { position: fixed; top: 0; left: 0; width: 100%; height: 4px; background: #eee; z-index: 100; }
    .fr-bar { height: 4px; background: linear-gradient(90deg, #c6a43b, #d4a947); width: 0%; transition: width 0.1s ease; }

    .fr-nav {
        padding: 16px 5%;
        display: flex; justify-content: space-between; align-items: center;
        background: rgba(255,255,255,0.98); backdrop-filter: blur(12px);
        position: sticky; top: 0; z-index: 99;
        border-bottom: 2px solid rgba(198,164,59,0.1);
        box-shadow: 0 4px 16px rgba(0,51,102,0.06);
    }
    .fr-logo { font-size: 1.15rem; font-weight: 700; color: #003366; }
    .fr-logo span { color: #c6a43b; }
    .fr-close {
        width: 44px; height: 44px; border-radius: 50%;
        background: linear-gradient(135deg, #f0f0f0, #e8e8e8);
        border: 2px solid rgba(198,164,59,0.2);
        display: flex; align-items: center; justify-content: center;
        cursor: pointer; color: #1a1a1a; font-size: 1.1rem;
        transition: all 0.3s ease;
    }
    .fr-close:hover {
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; transform: rotate(90deg) scale(1.1);
    }

    .fr-wrap {
        max-width: 860px; margin: 0 auto;
        padding: 45px 36px 70px;
        opacity: 0; transform: translateY(40px);
        transition: all 0.7s ease 0.2s;
    }
    .full-reader.open .fr-wrap { opacity: 1; transform: translateY(0); }

    .fr-header { text-align: center; margin-bottom: 40px; position: relative; }
    .fr-header::after {
        content: ''; position: absolute; bottom: -20px; left: 50%;
        transform: translateX(-50%); width: 70px; height: 3px;
        background: linear-gradient(90deg, transparent, #c6a43b, transparent);
    }
    .fr-date {
        font-size: 0.72rem; text-transform: uppercase; letter-spacing: 3px;
        color: #c6a43b; display: inline-block; margin-bottom: 16px;
        background: rgba(198,164,59,0.12); padding: 6px 14px;
        border-radius: 16px; font-weight: 800;
    }
    .fr-title {
        font-size: clamp(1.8rem, 4vw, 2.6rem);
        line-height: 1.3; color: #1a1a1a; font-weight: 800; margin: 20px 0;
    }
    .fr-author {
        font-size: 0.8rem; color: #999;
        display: flex; align-items: center; justify-content: center; gap: 8px;
        margin-top: 24px;
    }
    .fr-author i { color: #c6a43b; }
    .fr-hero-img {
        width: 100%; max-height: 500px; object-fit: cover;
        border-radius: 16px; margin: 36px 0 40px;
        box-shadow: 0 16px 40px -8px rgba(0,51,102,0.18);
    }
    .fr-body { font-size: 1rem; line-height: 2; color: #2c3e50; }
    .fr-body p { margin-bottom: 24px; }

    .fr-footer {
        margin: 60px -36px -70px; text-align: center;
        border-top: 2px solid rgba(198,164,59,0.12);
        padding: 40px 24px; background: rgba(0,51,102,0.02);
    }
    .fr-back {
        background: linear-gradient(135deg, #003366, #1a4a7a);
        color: #fff; padding: 12px 32px; border-radius: 50px;
        border: none; font-size: 0.78rem; font-weight: 700;
        letter-spacing: 1px; cursor: pointer;
        transition: all 0.3s ease;
    }
    .fr-back:hover {
        background: linear-gradient(135deg, #c6a43b, #d4a947);
        color: #003366; transform: translateY(-3px);
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) { .news-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 640px) {
        .news-grid { grid-template-columns: 1fr; gap: 16px; }
        .page-hero h1 { font-size: 2rem; }
        .fr-wrap { padding: 28px 20px 50px; }
        .fr-title { font-size: 1.8rem; }
    }
</style>
@endpush

@section('content')

<!-- HERO -->
<section class="page-hero">
    <div class="page-hero-inner">
        <div class="page-hero-eyebrow">Discover Geosite Toba</div>
        <h1>Berita Terkini</h1>
        <div class="page-hero-sub">Informasi &amp; Perkembangan Terbaru</div>
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
            <div class="news-card" data-id="{{ $item->id }}">
                <div class="nc-img">
                    <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}"
                         loading="{{ $i < 3 ? 'eager' : 'lazy' }}"
                         onerror="this.src='https://placehold.co/400x200/003366/c6a43b?text=GeoToba'">
                    <span class="nc-badge">Berita</span>
                    <span class="nc-num">#{{ str_pad($i+1, 3, '0', STR_PAD_LEFT) }}</span>
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

<!-- FULL READER -->
<div class="full-reader" id="fullReader">
    <div class="fr-progress"><div class="fr-bar" id="frBar"></div></div>
    <div class="fr-nav">
        <div class="fr-logo">Geo<span>Toba</span></div>
        <div class="fr-close" id="frClose"><i class="fas fa-times"></i></div>
    </div>
    <div class="fr-wrap">
        <div class="fr-header">
            <span class="fr-date" id="frDate"></span>
            <h1 class="fr-title" id="frTitle"></h1>
            <div class="fr-author"><i class="fas fa-user-circle"></i> <span id="frAuthor">Admin GeoToba</span></div>
        </div>
        <img class="fr-hero-img" id="frImg" src="" alt="">
        <div class="fr-body" id="frBody"></div>
        <div class="fr-footer">
            <button class="fr-back" id="frBack"><i class="fas fa-arrow-left"></i> Kembali ke Berita</button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
(function() {
    var newsData = @json($berita->getCollection()->each->append('gambar_url'));

    function openReader(id) {
        var item = null;
        for (var i = 0; i < newsData.length; i++) {
            if (newsData[i].id === id) { item = newsData[i]; break; }
        }
        if (!item) return;

        document.getElementById('frTitle').textContent = item.judul;
        document.getElementById('frBody').innerHTML = item.konten;
        document.getElementById('frImg').src = item.gambar_url || '';
        document.getElementById('frDate').textContent = new Date(item.created_at)
            .toLocaleDateString('id-ID', {day:'numeric', month:'long', year:'numeric'});
        document.getElementById('frAuthor').textContent = item.penulis || 'Admin GeoToba';

        document.getElementById('fullReader').classList.add('open');
        document.body.style.overflow = 'hidden';
        document.getElementById('frBar').style.width = '0%';
    }

    function closeReader() {
        document.getElementById('fullReader').classList.remove('open');
        document.body.style.overflow = 'auto';
    }

    // Klik kartu berita
    document.querySelectorAll('.news-card').forEach(function(el) {
        el.addEventListener('click', function() {
            openReader(parseInt(el.dataset.id));
        });
    });

    document.getElementById('frClose').addEventListener('click', closeReader);
    document.getElementById('frBack').addEventListener('click', closeReader);
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeReader(); });

    // Progress bar
    document.getElementById('fullReader').addEventListener('scroll', function() {
        var h = this.scrollHeight - this.clientHeight;
        document.getElementById('frBar').style.width = (h > 0 ? (this.scrollTop / h) * 100 : 0) + '%';
    });
})();
</script>
@endpush