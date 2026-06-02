@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

{{-- ===== STATS GRID ===== --}}
<div class="stats-grid" style="margin-bottom: 28px;">

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon blue">
                <i class="fas fa-images"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalGaleri ?? 0 }}</div>
                <div class="stat-label">Galeri</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon indigo">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalBerita ?? 0 }}</div>
                <div class="stat-label">Berita</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon emerald">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalInformasi ?? 0 }}</div>
                <div class="stat-label">Informasi</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon amber">
                <i class="fas fa-store"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalUmkm ?? 0 }}</div>
                <div class="stat-label">UMKM</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon rose">
                <i class="fas fa-tools"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalFasilitas ?? 0 }}</div>
                <div class="stat-label">Fasilitas</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon purple">
                <i class="fas fa-hotel"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalPenginapan ?? 0 }}</div>
                <div class="stat-label">Penginapan</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon cyan">
                <i class="fas fa-mountain"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalGaleriGeosite ?? 0 }}</div>
                <div class="stat-label">Galeri Geosite</div>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-inner">
            <div class="stat-icon pink">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <div class="stat-info">
                <div class="stat-number">{{ $totalDestinasi ?? 0 }}</div>
                <div class="stat-label">Destinasi</div>
            </div>
        </div>
    </div>

</div>

{{-- ===== UMKM TERBARU ===== --}}
<div class="card-table mb-4">
    <div class="card-header-custom">
        <h5><i class="fas fa-store"></i> UMKM Terbaru</h5>
        <a href="{{ route('admin.umkm.create') }}" class="btn-add-pill"><i class="fas fa-plus"></i> Tambah UMKM</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>LOKASI</th>
                    <th>KONTAK</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse(\App\Models\Umkm::latest()->limit(5)->get() as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ $item->kontak }}</td>
                    <td>
                        @if($item->status)
                            <span class="badge-status-active">Aktif</span>
                        @else
                            <span class="badge-status-inactive">Non-Aktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.umkm.edit', $item->id) }}" class="btn-edit-pill me-1">Edit</a>
                        <form action="{{ route('admin.umkm.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus UMKM ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete-pill">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">
                        <div class="empty-state" style="padding: 10px 0;">
                            <i class="fas fa-folder-open mb-2" style="font-size: 1.5rem; color: #cbd5e1;"></i>
                            <p style="font-size: 0.82rem; color: #94a3b8; font-weight: 500;">Belum ada data UMKM</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ===== FASILITAS TERBARU ===== --}}
<div class="card-table mb-4">
    <div class="card-header-custom">
        <h5><i class="fas fa-tools"></i> Fasilitas Terbaru</h5>
        <a href="{{ route('admin.fasilitas.create') }}" class="btn-add-pill"><i class="fas fa-plus"></i> Tambah Fasilitas</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>HARGA</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse(\App\Models\Fasilitas::latest()->limit(5)->get() as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        @if(is_numeric($item->harga))
                            Rp {{ number_format((float)$item->harga, 0, ',', '.') }}
                        @else
                            {{ $item->harga }}
                        @endif
                    </td>
                    <td>
                        @if($item->status)
                            <span class="badge-status-active">Aktif</span>
                        @else
                            <span class="badge-status-inactive">Non-Aktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.fasilitas.edit', $item->id) }}" class="btn-edit-pill me-1">Edit</a>
                        <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Fasilitas ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete-pill">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">
                        <div class="empty-state" style="padding: 10px 0;">
                            <i class="fas fa-folder-open mb-2" style="font-size: 1.5rem; color: #cbd5e1;"></i>
                            <p style="font-size: 0.82rem; color: #94a3b8; font-weight: 500;">Belum ada data Fasilitas</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ===== PENGINAPAN TERBARU ===== --}}
<div class="card-table mb-4">
    <div class="card-header-custom">
        <h5><i class="fas fa-hotel"></i> Penginapan Terbaru</h5>
        <a href="{{ route('admin.penginapan.create') }}" class="btn-add-pill"><i class="fas fa-plus"></i> Tambah Penginapan</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>HARGA</th>
                    <th>KONTAK</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse(\App\Models\Penginapan::latest()->limit(5)->get() as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        @if(is_numeric($item->harga))
                            Rp {{ number_format((float)$item->harga, 0, ',', '.') }}
                        @else
                            {{ $item->harga }}
                        @endif
                    </td>
                    <td>{{ $item->kontak }}</td>
                    <td>
                        @if($item->status)
                            <span class="badge-status-active">Aktif</span>
                        @else
                            <span class="badge-status-inactive">Non-Aktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.penginapan.edit', $item->id) }}" class="btn-edit-pill me-1">Edit</a>
                        <form action="{{ route('admin.penginapan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Penginapan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete-pill">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">
                        <div class="empty-state" style="padding: 10px 0;">
                            <i class="fas fa-folder-open mb-2" style="font-size: 1.5rem; color: #cbd5e1;"></i>
                            <p style="font-size: 0.82rem; color: #94a3b8; font-weight: 500;">Belum ada data Penginapan</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ===== QUICK ACTIONS ===== --}}
<div class="card-table">
    <div class="card-header-custom">
        <h5><i class="fas fa-bolt"></i> Aksi Cepat</h5>
    </div>
    <div class="action-buttons" style="gap: 10px; flex-wrap: wrap;">
        <a href="{{ route('admin.galeri.index') }}" class="btn-add-pill"><i class="fas fa-images"></i> Galeri</a>
        <a href="{{ route('admin.berita.index') }}" class="btn-add-pill"><i class="fas fa-newspaper"></i> Berita</a>
        <a href="{{ route('admin.informasi.index') }}" class="btn-add-pill"><i class="fas fa-info-circle"></i> Informasi</a>
        <a href="{{ route('admin.umkm.index') }}" class="btn-add-pill"><i class="fas fa-store"></i> UMKM</a>
        <a href="{{ route('admin.fasilitas.index') }}" class="btn-add-pill"><i class="fas fa-tools"></i> Fasilitas</a>
        <a href="{{ route('admin.penginapan.index') }}" class="btn-add-pill"><i class="fas fa-hotel"></i> Penginapan</a>
        <a href="{{ route('admin.galeri-geosite.index') }}" class="btn-add-pill"><i class="fas fa-mountain"></i> Galeri Geosite</a>
        <a href="{{ route('admin.destinasi.index') }}" class="btn-add-pill"><i class="fas fa-map-marked-alt"></i> Destinasi</a>
    </div>
</div>

@endsection