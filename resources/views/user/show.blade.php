@extends('user.layouts.app')

@section('title', 'Detail Laporan')

@section('content')

    <!-- Menampilkan pesan sukses atau error -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Menampilkan detail laporan -->
    <div class="card">
        <div class="card-body d-flex">
            @if($report->photo)
                <!-- Kolom untuk gambar -->
                <div class="me-4" style="flex: 1;">
                    <img src="{{ asset('storage/' . $report->photo) }}" alt="Foto Jalan Rusak" class="img-thumbnail w-100 h-100" style="object-fit: cover; max-width: 300px; max-height: 300px;">
                </div>
            @endif

            <!-- Kolom untuk teks laporan -->
            <div style="flex: 3;">
                <h5 class="card-title">{{ $report->location }}</h5>
                <p class="card-text">{{ $report->description }}</p>

                <p>Status: 
                    <span class="badge {{ $report->status === 'approved' ? 'bg-success' : ($report->status === 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                        {{ ucfirst($report->status) }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
