<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Tracer Study - {{ $tracerStudy->nama_lengkap }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            color: #1f2937;
            font-size: 18px;
        }
        .header p {
            margin: 5px 0;
            color: #6b7280;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            background-color: #f3f4f6;
            padding: 8px;
            font-weight: bold;
            border-left: 4px solid #3b82f6;
            margin-bottom: 10px;
        }
        .info-row {
            display: flex;
            margin-bottom: 8px;
        }
        .label {
            font-weight: bold;
            width: 200px;
            min-width: 200px;
        }
        .value {
            flex: 1;
        }
        .badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 10px;
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
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #d1d5db;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f9fafb;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>FAKULTAS TEKNIK UNIVERSITAS NEGERI MANADO</h1>
        <p>Detail Tracer Study Alumni</p>
        <p>Dicetak pada: {{ date('d/m/Y H:i') }}</p>
    </div>

    <div class="section">
        <div class="section-title">INFORMASI PRIBADI</div>
        <div class="info-row">
            <div class="label">Nama Lengkap:</div>
            <div class="value">{{ $tracerStudy->nama_lengkap }}</div>
        </div>
        <div class="info-row">
            <div class="label">NIM:</div>
            <div class="value">{{ $tracerStudy->nim }}</div>
        </div>
        <div class="info-row">
            <div class="label">Program Studi:</div>
            <div class="value">{{ ucwords(str_replace('-', ' ', $tracerStudy->program_studi)) }}</div>
        </div>
        <div class="info-row">
            <div class="label">Tahun Lulus:</div>
            <div class="value">{{ $tracerStudy->tahun_lulus }}</div>
        </div>
        <div class="info-row">
            <div class="label">Email:</div>
            <div class="value">{{ $tracerStudy->email }}</div>
        </div>
        <div class="info-row">
            <div class="label">Telepon:</div>
            <div class="value">{{ $tracerStudy->telepon }}</div>
        </div>
        @if($tracerStudy->ipk)
        <div class="info-row">
            <div class="label">IPK:</div>
            <div class="value">{{ $tracerStudy->ipk }}</div>
        </div>
        @endif
        @if($tracerStudy->alamat)
        <div class="info-row">
            <div class="label">Alamat:</div>
            <div class="value">{{ $tracerStudy->alamat }}</div>
        </div>
        @endif
    </div>

    <div class="section">
        <div class="section-title">INFORMASI PEKERJAAN</div>
        <div class="info-row">
            <div class="label">Status Pekerjaan:</div>
            <div class="value">
                <span class="badge badge-{{ $tracerStudy->status_pekerjaan === 'bekerja' ? 'success' : ($tracerStudy->status_pekerjaan === 'wirausaha' ? 'warning' : ($tracerStudy->status_pekerjaan === 'belum_bekerja' ? 'danger' : 'info')) }}">
                    {{ ucwords(str_replace('_', ' ', $tracerStudy->status_pekerjaan)) }}
                </span>
            </div>
        </div>
        
        @if(in_array($tracerStudy->status_pekerjaan, ['bekerja', 'wirausaha']))
            @if($tracerStudy->waktu_tunggu_kerja)
            <div class="info-row">
                <div class="label">Waktu Tunggu Kerja:</div>
                <div class="value">{{ $tracerStudy->waktu_tunggu_kerja }} bulan</div>
            </div>
            @endif
            @if($tracerStudy->nama_perusahaan)
            <div class="info-row">
                <div class="label">Nama Perusahaan:</div>
                <div class="value">{{ $tracerStudy->nama_perusahaan }}</div>
            </div>
            @endif
            @if($tracerStudy->jabatan)
            <div class="info-row">
                <div class="label">Jabatan:</div>
                <div class="value">{{ $tracerStudy->jabatan }}</div>
            </div>
            @endif
            @if($tracerStudy->gaji)
            <div class="info-row">
                <div class="label">Gaji:</div>
                <div class="value">Rp {{ number_format($tracerStudy->gaji, 0, ',', '.') }} juta</div>
            </div>
            @endif
            @if($tracerStudy->bidang_pekerjaan)
            <div class="info-row">
                <div class="label">Bidang Pekerjaan:</div>
                <div class="value">{{ $tracerStudy->bidang_pekerjaan }}</div>
            </div>
            @endif
        @endif

        @if($tracerStudy->status_pekerjaan === 'bekerja' && $tracerStudy->kesesuaian_bidang)
        <div class="info-row">
            <div class="label">Kesesuaian Bidang:</div>
            <div class="value">{{ ucwords(str_replace('_', ' ', $tracerStudy->kesesuaian_bidang)) }}</div>
        </div>
        @endif

        @if($tracerStudy->status_pekerjaan === 'bekerja' && $tracerStudy->jenis_perusahaan)
        <div class="info-row">
            <div class="label">Jenis Perusahaan:</div>
            <div class="value">{{ $tracerStudy->jenis_perusahaan }}</div>
        </div>
        @endif
    </div>

    @if($tracerStudy->status_pekerjaan === 'belum_bekerja')
    <div class="section">
        <div class="section-title">INFORMASI PENCARIAN KERJA</div>
        @if($tracerStudy->sumber_informasi_lowongan)
        <div class="info-row">
            <div class="label">Sumber Informasi Lowongan:</div>
            <div class="value">{{ $tracerStudy->sumber_informasi_lowongan }}</div>
        </div>
        @endif
        @if($tracerStudy->metode_mencari_kerja)
        <div class="info-row">
            <div class="label">Metode Mencari Kerja:</div>
            <div class="value">{{ $tracerStudy->metode_mencari_kerja }}</div>
        </div>
        @endif
        @if($tracerStudy->lamanya_mencari_kerja)
        <div class="info-row">
            <div class="label">Lamanya Mencari Kerja:</div>
            <div class="value">{{ $tracerStudy->lamanya_mencari_kerja }} bulan</div>
        </div>
        @endif
        @if($tracerStudy->jumlah_lamaran)
        <div class="info-row">
            <div class="label">Jumlah Lamaran:</div>
            <div class="value">{{ $tracerStudy->jumlah_lamaran }}</div>
        </div>
        @endif
        @if($tracerStudy->jumlah_wawancara)
        <div class="info-row">
            <div class="label">Jumlah Wawancara:</div>
            <div class="value">{{ $tracerStudy->jumlah_wawancara }}</div>
        </div>
        @endif
        @if($tracerStudy->alasan_belum_bekerja)
        <div class="info-row">
            <div class="label">Alasan Belum Bekerja:</div>
            <div class="value">{{ $tracerStudy->alasan_belum_bekerja }}</div>
        </div>
        @endif
    </div>
    @endif

    <div class="section">
        <div class="section-title">SURVEY KEPUASAN</div>
        @if($tracerStudy->kepuasan_kurikulum)
        <div class="info-row">
            <div class="label">Kepuasan Kurikulum:</div>
            <div class="value">{{ $tracerStudy->kepuasan_kurikulum }}/5</div>
        </div>
        @endif
        @if($tracerStudy->relevansi_ilmu)
        <div class="info-row">
            <div class="label">Relevansi Ilmu:</div>
            <div class="value">{{ $tracerStudy->relevansi_ilmu }}/5</div>
        </div>
        @endif
        @if($tracerStudy->kompetensi_yang_dibutuhkan)
        <div class="info-row">
            <div class="label">Kompetensi yang Dibutuhkan:</div>
            <div class="value">{{ $tracerStudy->kompetensi_yang_dibutuhkan }}</div>
        </div>
        @endif
        @if($tracerStudy->kompetensi_yang_dimiliki)
        <div class="info-row">
            <div class="label">Kompetensi yang Dimiliki:</div>
            <div class="value">{{ $tracerStudy->kompetensi_yang_dimiliki }}</div>
        </div>
        @endif
        @if($tracerStudy->saran_pengembangan)
        <div class="info-row">
            <div class="label">Saran Pengembangan:</div>
            <div class="value">{{ $tracerStudy->saran_pengembangan }}</div>
        </div>
        @endif
        @if($tracerStudy->saran_untuk_almamater)
        <div class="info-row">
            <div class="label">Saran untuk Almamater:</div>
            <div class="value">{{ $tracerStudy->saran_untuk_almamater }}</div>
        </div>
        @endif
        @if($tracerStudy->rencana_kedepan)
        <div class="info-row">
            <div class="label">Rencana Kedepan:</div>
            <div class="value">{{ $tracerStudy->rencana_kedepan }}</div>
        </div>
        @endif
    </div>

    <div class="footer">
        <p>Dokumen ini dicetak secara otomatis dari sistem Tracer Study Fakultas Teknik UNIMA</p>
        <p>© {{ date('Y') }} Fakultas Teknik Universitas Negeri Manado</p>
    </div>
</body>
</html> 