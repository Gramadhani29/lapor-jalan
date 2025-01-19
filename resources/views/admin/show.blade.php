<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4">Detail Laporan Jalan Rusak</h1>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        <a href="{{ route('admin.report.download', $report->id) }}" class="btn btn-success mb-3">Download PDF</a>
        <div class="card">
            <div class="card-body">
                <p><strong>Lokasi:</strong> {{ $report->location }}</p>
                <p><strong>Deskripsi:</strong> {{ $report->description }}</p>
                <p><strong>Foto:</strong></p>
                @if ($report->photo)
                    <img src="{{ asset('storage/' . $report->photo) }}" alt="Foto Jalan Rusak" class="img-fluid">
                @else
                    <p>Tidak ada foto</p>
                @endif
                <hr>
                <form action="{{ route('admin.report.update', $report->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="status" class="form-label">Ubah Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="pending" {{ $report->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $report->status === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $report->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui Status</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
