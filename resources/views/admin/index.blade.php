<!-- resources/views/admin/index.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <div class="container my-4">
        <!-- Statistik Kartu -->
        <div class="row text-center mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Laporan</h5>
                        <h1>{{ $stats['total_reports'] }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Approved</h5>
                        <h1>{{ $stats['approved_reports'] }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title">Rejected</h5>
                        <h1>{{ $stats['rejected_reports'] }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">Pending</h5>
                        <h1>{{ $stats['pending_reports'] }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Laporan -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Lokasi</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reports as $report)
                    <tr>
                        <td>{{ $report->location }}</td>
                        <td>{{ $report->description }}</td>
                        <td>
                            @if ($report->photo)
                                <img src="{{ asset('storage/' . $report->photo) }}" alt="Foto Laporan" class="img-thumbnail" width="100">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $report->status === 'approved' ? 'bg-success' : ($report->status === 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                                {{ ucfirst($report->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.report.show', $report->id) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada laporan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
