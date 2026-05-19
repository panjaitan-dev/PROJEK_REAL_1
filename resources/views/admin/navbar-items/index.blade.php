@extends('layouts.admin')

@section('title', 'Manajemen Navbar Geosite')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0"> Navbar Geosite</h5>
    <a href="{{ route('admin.navbar-items.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Item
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
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Geosite</th>
                        <th>Label</th>
                        <th>Href</th>
                        <th width="80">Urutan</th>
                        <th width="100">Status</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($navbarItems as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->geosite }}</td>
                        <td>{{ $item->label }}</td>
                        <td>{{ $item->href }}</td>
                        <td>{{ $item->urutan }}</td>
                        <td>
                            <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $item->status ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.navbar-items.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.navbar-items.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus item ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            Belum ada item navbar. Tambahkan item baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $navbarItems->links() }}
        </div>
    </div>
</div>
@endsection
