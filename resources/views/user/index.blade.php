@extends('user.layouts.app')
@section('title', 'Dashboard user')
@section('content')
    <a href="{{ route('report.create') }}" class="btn btn-primary mb-3">Buat Laporan Baru</a>
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
            @forelse ($reports as $report)
                <tr>
                    <td>{{ $report->location }}</td>
                    <td>{{ $report->description }}</td>
                    <td>
                        @if ($report->photo)
                            <img src="{{ asset('storage/' . $report->photo) }}" alt="Foto Jalan Rusak" class="img-thumbnail" width="100">
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
                        <a href="{{ route('user.show', $report->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <form action="{{ route('report.destroy', $report->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin membatalkan laporan ini?')">Batalkan</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada laporan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
