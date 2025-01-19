<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Jalan Rusak</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin: 0 20px; }
        .photo img { max-width: 100%; height: auto; }
        .footer { margin-top: 20px; font-size: 12px; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Jalan Rusak</h1>
    </div>
    <div class="content">
        <p><strong>Lokasi:</strong> {{ $report->location }}</p>
        <p><strong>Deskripsi:</strong> {{ $report->description }}</p>
        @if ($report->photo)
            <div class="photo">
                <p><strong>Foto:</strong></p>
                <img src="{{ public_path('storage/' . $report->photo) }}" alt="Foto Jalan Rusak">
            </div>
        @else
            <p><strong>Foto:</strong> Tidak ada foto</p>
        @endif
    </div>
    <div class="footer">
        <p>Laporan tanggal: {{ now()->format('d M Y') }}</p>
    </div>
</body>
</html>
