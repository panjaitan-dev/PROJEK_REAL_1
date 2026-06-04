@extends('layouts.admin')

@section('title', 'Informasi Geosite')

@section('content')

{{-- TABS NAVIGASI --}}
<div style="display:flex;gap:0;margin-bottom:24px;border-bottom:2px solid #e5e7eb;">
    <a href="{{ route('admin.informasi.index') }}"
       style="padding:12px 24px;text-decoration:none;font-size:0.9rem;font-weight:600;
              border-bottom:3px solid transparent;color:#6b7280;margin-bottom:-2px;">
        📜 Sejarah Caldera Toba
    </a>
    <a href="{{ route('admin.informasi-geosite.index') }}"
       style="padding:12px 24px;text-decoration:none;font-size:0.9rem;font-weight:600;
              border-bottom:3px solid #003366;color:#003366;margin-bottom:-2px;">
        🏔️ Informasi Geosite
    </a>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">🏔️ Informasi Geosite</h5>
    <a href="{{ route('admin.informasi-geosite.create') }}" class="btn btn-primary btn-add-pill">
        <i class="fas fa-plus"></i> Tambah Data
    </a>
</div>

{{-- Filter Geosite --}}
<div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:20px;">
    <a href="{{ route('admin.informasi-geosite.index') }}"
       style="padding:8px 18px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;
              {{ !$filterGeosite ? 'background:#003366;color:white;' : 'background:#f1f5f9;color:#374151;' }}">
        Semua
    </a>
    @foreach($geositeList as $key => $nama)
    <a href="{{ route('admin.informasi-geosite.index', ['geosite' => $key]) }}"
       style="padding:8px 18px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;
              {{ $filterGeosite === $key ? 'background:#003366;color:white;' : 'background:#f1f5f9;color:#374151;' }}">
        {{ $nama }}
    </a>
    @endforeach
</div>

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th width="100">Gambar</th>
                        <th>Judul</th>
                        <th>Geosite</th>
                        <th width="80">Urutan</th>
                        <th width="80">Status</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($informasi as $item)
                    <tr>
                        <td>{{ $loop->iteration + ($informasi->currentPage() - 1) * $informasi->perPage() }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ $item->gambar_url }}" width="60" height="60" style="object-fit: cover; border-radius: 8px;">
                            @else
                                <div class="bg-secondary text-white text-center" style="width: 60px; height: 60px; line-height: 60px; border-radius: 8px;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $item->judul }}</strong>
                            <br>
                            <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $item->geosite_name }}</span>
                        </td>
                        <td>{{ $item->urutan }}</td>
                        <td>
                            <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.informasi-geosite.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.informasi-geosite.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="fas fa-database fa-2x text-muted mb-2 d-block"></i>
                            Belum ada data informasi geosite. Silakan tambah data baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $informasi->appends(['geosite' => $filterGeosite])->links() }}
        </div>
    </div>
</div>
@endsection
