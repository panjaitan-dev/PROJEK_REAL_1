@extends('layouts.admin')

@section('title', 'Galeri Geosite')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">🏔️ Galeri Geosite</h5>
    <a href="{{ route('admin.galeri-geosite.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Foto
    </a>
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
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="40">No</th>
                        <th width="80">Gambar</th>
                        <th>Geosite</th>
                        <th width="80">Status</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galeriGeosite as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($item->gambar)
                                <a href="{{ $item->gambar_url }}" target="_blank">
                                    <img src="{{ $item->gambar_url }}" width="60" height="60"
                                         style="object-fit:cover; border-radius:6px; border:1px solid #ddd;">
                                </a>
                            @else
                                <div class="bg-light text-center" style="width:60px;height:60px;line-height:60px;border-radius:6px;border:1px solid #ddd;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            @php
                                $label = match($item->geosite) {
                                    'batu_hoda_beach'   => '🏖️ Batu Hoda',
                                    'batu_pasa_pantai'  => '🌊 Batu Pasa',
                                    'museum_huta_bolon' => '🏛️ Museum Huta Bolon',
                                    default => $item->geosite,
                                };
                            @endphp
                            <span>{{ $label }}</span>
                        </td>
                        <td>
                            <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $item->status ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.galeri-geosite.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning">Ubah</a>
                                <form action="{{ route('admin.galeri-geosite.destroy', $item->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin hapus foto ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            Belum ada foto galeri geosite.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-2">
            {{ $galeriGeosite->links() }}
        </div>
    </div>
</div>
@endsection
