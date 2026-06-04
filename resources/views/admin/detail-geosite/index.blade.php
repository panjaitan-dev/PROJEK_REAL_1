@extends('layouts.admin')

@section('content')
<div class="content-header">
    <h1>Lokasi & Detail Geosite</h1>
    <p>Kelola Google Maps, Jam Buka, dan Harga Tiket setiap geosite</p>
</div>

@if(session('success'))
    <div class="alert-success" style="background:#d1fae5;color:#065f46;padding:12px 16px;border-radius:8px;margin-bottom:20px;border:1px solid #6ee7b7;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <i class="fas fa-map-marker-alt"></i> Daftar Geosite
    </div>
    <div class="card-body">
        <div style="overflow-x:auto;">
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8fafc;">
                        <th style="padding:12px 16px;text-align:left;font-weight:600;color:#374151;border-bottom:2px solid #e5e7eb;">Geosite</th>
                        <th style="padding:12px 16px;text-align:left;font-weight:600;color:#374151;border-bottom:2px solid #e5e7eb;">Jam Buka</th>
                        <th style="padding:12px 16px;text-align:left;font-weight:600;color:#374151;border-bottom:2px solid #e5e7eb;">Harga Tiket</th>
                        <th style="padding:12px 16px;text-align:left;font-weight:600;color:#374151;border-bottom:2px solid #e5e7eb;">Google Maps</th>
                        <th style="padding:12px 16px;text-align:center;font-weight:600;color:#374151;border-bottom:2px solid #e5e7eb;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($geositeList as $key => $nama)
                    @php $d = $details[$key] ?? null; @endphp
                    <tr style="border-bottom:1px solid #f1f5f9;">
                        <td style="padding:14px 16px;"><strong>{{ $nama }}</strong></td>
                        <td style="padding:14px 16px;color:#6b7280;">{{ $d?->jam_buka ?? '<span style="color:#ef4444;">Belum diisi</span>' }}</td>
                        <td style="padding:14px 16px;color:#6b7280;">{{ $d?->harga_tiket ?? '<span style="color:#ef4444;">Belum diisi</span>' }}</td>
                        <td style="padding:14px 16px;">
                            @if($d?->maps_url)
                                <span style="color:#10b981;"><i class="fas fa-check-circle"></i> Sudah diset</span>
                            @else
                                <span style="color:#ef4444;"><i class="fas fa-times-circle"></i> Belum diisi</span>
                            @endif
                        </td>
                        <td style="padding:14px 16px;text-align:center;">
                            <a href="{{ route('admin.detail-geosite.edit', $key) }}" class="btn-edit" style="background:#003366;color:white;padding:6px 16px;border-radius:6px;text-decoration:none;font-size:0.85rem;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
