<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JadwalAkademik;

class JadwalAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwalAkademiks = [
            [
                'jenis_jadwal' => 'semester_ganjil',
                'judul' => 'Semester Ganjil',
                'deskripsi' => 'Periode perkuliahan semester ganjil dengan berbagai kegiatan akademik',
                'warna' => 'blue',
                'icon' => 'fas fa-graduation-cap',
                'periode' => [
                    'mulai' => 'Agustus',
                    'selesai' => 'Desember'
                ],
                'jadwal_detail' => [
                    'perkuliahan' => 'Agustus - Desember',
                    'ujian' => 'Desember',
                    'libur' => 'Natal & Tahun Baru',
                    'durasi' => '1-2 minggu'
                ],
                'status' => 'aktif',
                'urutan' => 1,
                'catatan' => 'Semester ganjil merupakan periode perkuliahan utama dengan berbagai kegiatan akademik termasuk perkuliahan, praktikum, dan ujian.'
            ],
            [
                'jenis_jadwal' => 'semester_genap',
                'judul' => 'Semester Genap',
                'deskripsi' => 'Periode perkuliahan semester genap dengan fokus pada penyelesaian studi',
                'warna' => 'green',
                'icon' => 'fas fa-book-open',
                'periode' => [
                    'mulai' => 'Februari',
                    'selesai' => 'Juni'
                ],
                'jadwal_detail' => [
                    'perkuliahan' => 'Februari - Juni',
                    'ujian' => 'Juni',
                    'libur' => 'Hari Raya',
                    'durasi' => '1-2 minggu'
                ],
                'status' => 'aktif',
                'urutan' => 2,
                'catatan' => 'Semester genap fokus pada penyelesaian studi dengan berbagai kegiatan akademik dan wisuda.'
            ],
            [
                'jenis_jadwal' => 'semester_pendek',
                'judul' => 'Semester Pendek',
                'deskripsi' => 'Program semester pendek untuk mempercepat penyelesaian studi',
                'warna' => 'orange',
                'icon' => 'fas fa-clock',
                'periode' => [
                    'mulai' => 'Juli',
                    'selesai' => 'Agustus'
                ],
                'jadwal_detail' => [
                    'perkuliahan' => 'Juli - Agustus',
                    'ujian' => 'Agustus',
                    'libur' => 'Minimal',
                    'durasi' => '6-8 minggu'
                ],
                'status' => 'aktif',
                'urutan' => 3,
                'catatan' => 'Semester pendek tersedia untuk mahasiswa yang ingin mempercepat penyelesaian studi.'
            ],
            [
                'jenis_jadwal' => 'wisuda',
                'judul' => 'Wisuda',
                'deskripsi' => 'Acara wisuda untuk mahasiswa yang telah menyelesaikan studi',
                'warna' => 'purple',
                'icon' => 'fas fa-user-graduate',
                'periode' => [
                    'mulai' => 'Maret',
                    'selesai' => 'September'
                ],
                'jadwal_detail' => [
                    'gelombang_1' => 'Maret',
                    'gelombang_2' => 'Juni',
                    'gelombang_3' => 'September',
                    'persiapan' => '2-3 bulan sebelumnya'
                ],
                'status' => 'aktif',
                'urutan' => 4,
                'catatan' => 'Wisuda dilaksanakan dalam 3 gelombang per tahun dengan persiapan yang matang.'
            ],
            [
                'jenis_jadwal' => 'pendaftaran',
                'judul' => 'Pendaftaran Mahasiswa Baru',
                'deskripsi' => 'Periode pendaftaran dan seleksi mahasiswa baru',
                'warna' => 'teal',
                'icon' => 'fas fa-user-plus',
                'periode' => [
                    'mulai' => 'Januari',
                    'selesai' => 'Juli'
                ],
                'jadwal_detail' => [
                    'gelombang_1' => 'Januari - Maret',
                    'gelombang_2' => 'April - Juni',
                    'gelombang_3' => 'Juli',
                    'pengumuman' => '2-4 minggu setelah tes'
                ],
                'status' => 'aktif',
                'urutan' => 5,
                'catatan' => 'Pendaftaran mahasiswa baru dibuka dalam 3 gelombang dengan berbagai jalur seleksi.'
            ],
            [
                'jenis_jadwal' => 'libur_akademik',
                'judul' => 'Libur Akademik',
                'deskripsi' => 'Periode libur akademik dan hari-hari penting',
                'warna' => 'red',
                'icon' => 'fas fa-calendar-times',
                'periode' => [
                    'mulai' => 'Sepanjang Tahun',
                    'selesai' => 'Bervariasi'
                ],
                'jadwal_detail' => [
                    'natal_tahun_baru' => 'Desember - Januari',
                    'hari_raya' => 'Menyesuaikan kalender',
                    'libur_nasional' => 'Sesuai SKB',
                    'libur_khusus' => 'Menyesuaikan kondisi'
                ],
                'status' => 'aktif',
                'urutan' => 6,
                'catatan' => 'Libur akademik mengikuti kalender nasional dan keputusan rektorat.'
            ]
        ];

        foreach ($jadwalAkademiks as $jadwal) {
            JadwalAkademik::create($jadwal);
        }
    }
}
