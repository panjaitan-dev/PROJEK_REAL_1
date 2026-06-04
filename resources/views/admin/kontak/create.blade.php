@extends('layouts.admin')

@section('title', 'Tambah Kontak')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Kontak & Media Sosial Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.kontak.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tipe Kontak <span class="text-danger">*</span></label>
                <select name="tipe" class="form-control" required>
                    @foreach($tipeList as $key => $label)
                        <option value="{{ $key }}" {{ old('tipe') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('tipe')
                    <div class="text-danger mt-1" style="font-size: 0.8rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Judul Label <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" placeholder="Contoh: Nomor WhatsApp Utama, Alamat Kantor, Instagram" required>
                <small class="text-muted">Nama label atau nama saluran komunikasi.</small>
                @error('judul')
                    <div class="text-danger mt-1" style="font-size: 0.8rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nilai / Isi Kontak <span class="text-danger">*</span></label>
                <textarea name="nilai" class="form-control" rows="4" placeholder="Masukkan detail kontak (alamat lengkap, nomor hp, email, username, atau jam buka)" required>{{ old('nilai') }}</textarea>
                <small class="text-muted">Isi dari kontak. Untuk tipe alamat, Anda bisa memasukkan baris baru.</small>
                @error('nilai')
                    <div class="text-danger mt-1" style="font-size: 0.8rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan Tambahan <span class="text-secondary">(Opsional)</span></label>
                <input type="text" name="nilai_tambahan" class="form-control" value="{{ old('nilai_tambahan') }}" placeholder="Contoh: (Zen M. Siboro - Co-Founder) atau (Kecamatan Simanindo)">
                <small class="text-muted">Informasi atau nama orang kontak person yang ditampilkan di bawah judul utama.</small>
                @error('nilai_tambahan')
                    <div class="text-danger mt-1" style="font-size: 0.8rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Ikon Class FontAwesome <span class="text-secondary">(Opsional)</span></label>
                <input type="text" name="icon" class="form-control" value="{{ old('icon') }}" placeholder="Contoh: fas fa-phone-alt, fab fa-whatsapp, fas fa-envelope, fab fa-facebook-f, far fa-clock">
                <small class="text-muted">Class icon FontAwesome versi 6. Contoh: <code>fab fa-whatsapp</code> untuk WhatsApp, <code>fas fa-map-marker-alt</code> untuk Peta/Alamat.</small>
                @error('icon')
                    <div class="text-danger mt-1" style="font-size: 0.8rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tautan / URL Rujukan <span class="text-secondary">(Opsional)</span></label>
                <input type="text" name="tautan" class="form-control" value="{{ old('tautan') }}" placeholder="Contoh: https://wa.me/6285362259937 atau mailto:admin@email.com atau link profil sosmed">
                <small class="text-muted">Tautan URL ketika elemen diklik (misal: <code>https://wa.me/...</code> atau <code>mailto:...</code> atau link maps).</small>
                @error('tautan')
                    <div class="text-danger mt-1" style="font-size: 0.8rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="d-flex align-items-center">
                    <input type="checkbox" name="status" value="1" {{ old('status', '1') == '1' ? 'checked' : '' }} style="width: 20px; height: 20px; margin-right: 8px;">
                    <span>Aktifkan Kontak ini agar muncul di halaman publik</span>
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, #10b981, #34d399) !important; border:none;">Simpan Kontak</button>
            <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary" style="background: linear-gradient(135deg, #f43f5e, #fb7185) !important; border:none;">Batal</a>
        </form>
    </div>
</div>
@endsection
