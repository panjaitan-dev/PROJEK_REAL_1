@extends('layouts.admin')

@section('title', 'Manajemen Kontak')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">📞 Daftar Kontak & Media Sosial</h5>
    <a href="{{ route('admin.kontak.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Kontak
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 15%">Tipe</th>
                        <th style="width: 20%">Judul Label</th>
                        <th style="width: 25%">Nilai</th>
                        <th style="width: 10%">Ikon</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kontak as $item)
                    <tr>
                        <td>{{ ($kontak->currentPage() - 1) * $kontak->perPage() + $loop->iteration }}</td>
                        <td>
                            @php
                                $badgeClass = 'bg-secondary';
                                if ($item->tipe === 'alamat') $badgeClass = 'bg-primary';
                                elseif ($item->tipe === 'telepon') $badgeClass = 'bg-success';
                                elseif ($item->tipe === 'email') $badgeClass = 'bg-warning text-dark';
                                elseif ($item->tipe === 'sosmed') $badgeClass = 'bg-info text-dark';
                                elseif ($item->tipe === 'jam_operasional') $badgeClass = 'bg-dark text-white';
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ $tipeList[$item->tipe] ?? ucfirst($item->tipe) }}</span>
                        </td>
                        <td>
                            <strong>{{ $item->judul }}</strong>
                            @if($item->nilai_tambahan)
                                <br><small class="text-muted">{{ $item->nilai_tambahan }}</small>
                            @endif
                        </td>
                        <td>
                            <div style="max-height: 80px; overflow-y: auto; white-space: pre-line; font-size: 0.82rem;">{{ $item->nilai }}</div>
                            @if($item->tautan)
                                <a href="{{ $item->tautan }}" target="_blank" class="d-inline-block mt-1" style="font-size: 0.72rem; text-decoration: none;">
                                    <i class="fas fa-external-link-alt"></i> Buka Tautan
                                </a>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($item->icon)
                                <span class="d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px; border-radius: 50%; background: #f1f5f9; border: 1px solid #cbd5e1;">
                                    <i class="{{ $item->icon }} text-primary"></i>
                                </span>
                                <br><small class="text-muted" style="font-size: 0.65rem;">{{ $item->icon }}</small>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.kontak.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.kontak.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data kontak ini?')" style="background: linear-gradient(135deg, #f43f5e, #fb7185) !important;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data Kontak.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $kontak->links() }}
        </div>
    </div>
</div>
@endsection
