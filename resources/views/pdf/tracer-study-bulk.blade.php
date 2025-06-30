<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Tracer Study - {{ date('d/m/Y') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            line-height: 1.3;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            color: #1f2937;
            font-size: 16px;
        }
        .header p {
            margin: 3px 0;
            color: #6b7280;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #d1d5db;
            padding: 4px;
            text-align: left;
            font-size: 9px;
        }
        th {
            background-color: #f9fafb;
            font-weight: bold;
        }
        .badge {
            display: inline-block;
            padding: 1px 4px;
            border-radius: 3px;
            font-size: 8px;
            font-weight: bold;
        }
        .badge-success {
            background-color: #d1fae5;
            color: #065f46;
        }
        .badge-warning {
            background-color: #fef3c7;
            color: #92400e;
        }
        .badge-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .badge-info {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 8px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 8px;
        }
        .summary {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f9fafb;
            border-radius: 4px;
        }
        .summary h3 {
            margin: 0 0 8px 0;
            font-size: 12px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 4px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>FAKULTAS TEKNIK UNIVERSITAS NEGERI MANADO</h1>
        <p>Laporan Tracer Study Alumni</p>
        <p>Periode: {{ date('d/m/Y') }} | Total Data: {{ count($records) }}</p>
    </div>

    <div class="summary">
        <h3>Ringkasan Statistik</h3>
        @php
            $totalBekerja = $records->where('status_pekerjaan', 'bekerja')->count();
            $totalWirausaha = $records->where('status_pekerjaan', 'wirausaha')->count();
            $totalBelumBekerja = $records->where('status_pekerjaan', 'belum_bekerja')->count();
            $totalLanjutStudi = $records->where('status_pekerjaan', 'lanjut_studi')->count();
            $avgKepuasan = $records->whereNotNull('kepuasan_kurikulum')->avg('kepuasan_kurikulum');
            $avgRelevansi = $records->whereNotNull('relevansi_ilmu')->avg('relevansi_ilmu');
        @endphp
        <div class="summary-row">
            <span>Bekerja:</span>
            <span>{{ $totalBekerja }} ({{ round(($totalBekerja/count($records))*100, 1) }}%)</span>
        </div>
        <div class="summary-row">
            <span>Wirausaha:</span>
            <span>{{ $totalWirausaha }} ({{ round(($totalWirausaha/count($records))*100, 1) }}%)</span>
        </div>
        <div class="summary-row">
            <span>Belum Bekerja:</span>
            <span>{{ $totalBelumBekerja }} ({{ round(($totalBelumBekerja/count($records))*100, 1) }}%)</span>
        </div>
        <div class="summary-row">
            <span>Lanjut Studi:</span>
            <span>{{ $totalLanjutStudi }} ({{ round(($totalLanjutStudi/count($records))*100, 1) }}%)</span>
        </div>
        <div class="summary-row">
            <span>Rata-rata Kepuasan Kurikulum:</span>
            <span>{{ round($avgKepuasan, 1) }}/5</span>
        </div>
        <div class="summary-row">
            <span>Rata-rata Relevansi Ilmu:</span>
            <span>{{ round($avgRelevansi, 1) }}/5</span>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Tahun Lulus</th>
                <th>Status Pekerjaan</th>
                <th>Perusahaan</th>
                <th>Jabatan</th>
                <th>Gaji (Juta)</th>
                <th>Kepuasan</th>
                <th>Relevansi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $index => $record)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $record->nim }}</td>
                <td>{{ $record->nama_lengkap }}</td>
                <td>{{ ucwords(str_replace('-', ' ', $record->program_studi)) }}</td>
                <td>{{ $record->tahun_lulus }}</td>
                <td>
                    <span class="badge badge-{{ $record->status_pekerjaan === 'bekerja' ? 'success' : ($record->status_pekerjaan === 'wirausaha' ? 'warning' : ($record->status_pekerjaan === 'belum_bekerja' ? 'danger' : 'info')) }}">
                        {{ ucwords(str_replace('_', ' ', $record->status_pekerjaan)) }}
                    </span>
                </td>
                <td>{{ $record->nama_perusahaan ?: '-' }}</td>
                <td>{{ $record->jabatan ?: '-' }}</td>
                <td>{{ $record->gaji ? number_format($record->gaji, 1) : '-' }}</td>
                <td>{{ $record->kepuasan_kurikulum ?: '-' }}</td>
                <td>{{ $record->relevansi_ilmu ?: '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Laporan ini dicetak secara otomatis dari sistem Tracer Study Fakultas Teknik UNIMA</p>
        <p>© {{ date('Y') }} Fakultas Teknik Universitas Negeri Manado</p>
    </div>
</body>
</html> 