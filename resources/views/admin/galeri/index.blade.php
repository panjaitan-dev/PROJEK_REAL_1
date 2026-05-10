@extends('layouts.admin')

@section('title', 'Data Galeri')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Data Galeri</h5>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">Tambah</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>

            @foreach($galeri as $g )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                   @if($g->gambar)
                                <img src="{{ $g->gambar }}" width="60" height="60" style="object-fit: cover; border-radius: 8px;">
                            @else
                                <div class="bg-secondary text-white text-center" style="width: 60px; height: 60px; line-height: 60px; border-radius: 8px;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                </td>
                <td>{{ $g->judul }}</td>
                <td>{{ $g->kategori }}</td>
                <td>
                    <a href="{{ route('admin.galeri.edit', $g->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection 