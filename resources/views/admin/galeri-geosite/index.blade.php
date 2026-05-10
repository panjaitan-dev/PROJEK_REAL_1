@extends('layouts.admin')

@section('title', 'Manajemen Galeri Geosite')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">🖼️ Daftar Galeri Geosite</h5>
    <a href="{{ route('admin.galeri-geosite.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Galeri
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Geosite</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeriGeosite as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ $item->gambar }}" width="50" height="50" style="object-fit: cover;">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $item->judul }}</td>
                    <td><span class="badge bg-secondary">{{ $item->kategori }}</span></td>
                    <td><span class="badge bg-info">{{ ucfirst($item->geosite) }}</span></td>
                    <td>
                        <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                            {{ $item->status ? 'Aktif' : 'Tidak' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.galeri-geosite.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.galeri-geosite.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center">Belum ada data Galeri Geosite</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $galeriGeosite->links() }}
    </div>
</div>
@endsection
