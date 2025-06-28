<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengumuman;
use Carbon\Carbon;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengumumans = [
            [
                'judul' => 'Pendaftaran Wisuda Periode Juni 2024',
                'isi' => '<p>Diumumkan kepada seluruh mahasiswa Fakultas Teknik UNIMA bahwa pendaftaran wisuda periode Juni 2024 akan dibuka mulai tanggal 1 Juni 2024.</p><p><strong>Persyaratan:</strong></p><ul><li>Lulus semua mata kuliah</li><li>Skripsi sudah disetujui</li><li>Membayar biaya wisuda</li></ul><p>Untuk informasi lebih lanjut, silakan hubungi bagian akademik.</p>',
                'tanggal_posting' => Carbon::now()->subDays(5),
                'tanggal_berakhir' => Carbon::now()->addDays(30),
                'status' => 'published',
                'kategori' => 'akademik',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'judul' => 'Jadwal Ujian Tengah Semester Genap 2023/2024',
                'isi' => '<p>Berikut adalah jadwal ujian tengah semester genap tahun akademik 2023/2024 untuk semua program studi di Fakultas Teknik UNIMA.</p><p><strong>Jadwal UTS:</strong></p><ul><li>Teknik Informatika: 15-20 Maret 2024</li><li>Teknik Sipil: 16-21 Maret 2024</li><li>Teknik Mesin: 17-22 Maret 2024</li><li>Teknik Elektro: 18-23 Maret 2024</li></ul><p>Ujian akan dilaksanakan secara offline di kampus.</p>',
                'tanggal_posting' => Carbon::now()->subDays(10),
                'tanggal_berakhir' => Carbon::now()->addDays(15),
                'status' => 'published',
                'kategori' => 'akademik',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'judul' => 'Pembukaan Pendaftaran KKN Tematik 2024',
                'isi' => '<p>Fakultas Teknik UNIMA membuka pendaftaran KKN Tematik 2024 dengan tema "Pemberdayaan Masyarakat Melalui Teknologi".</p><p><strong>Informasi KKN:</strong></p><ul><li>Lokasi: Desa-desa di Sulawesi Utara</li><li>Durasi: 2 bulan</li><li>Kuota: 200 mahasiswa</li><li>Pendaftaran: 1-15 April 2024</li></ul><p>Segera daftarkan diri Anda di bagian kemahasiswaan.</p>',
                'tanggal_posting' => Carbon::now()->subDays(3),
                'tanggal_berakhir' => Carbon::now()->addDays(45),
                'status' => 'published',
                'kategori' => 'kemahasiswaan',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'judul' => 'Maintenance Sistem Akademik UNIMA',
                'isi' => '<p>Diumumkan kepada seluruh civitas akademika UNIMA bahwa sistem akademik akan mengalami maintenance pada:</p><p><strong>Tanggal:</strong> 25 Maret 2024<br><strong>Waktu:</strong> 22:00 - 06:00 WITA<br><strong>Durasi:</strong> 8 jam</p><p>Selama maintenance, akses ke sistem akademik akan terbatas. Mohon maaf atas ketidaknyamanannya.</p>',
                'tanggal_posting' => Carbon::now()->subDays(1),
                'tanggal_berakhir' => Carbon::now()->addDays(7),
                'status' => 'published',
                'kategori' => 'penting',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'judul' => 'Workshop Penulisan Karya Ilmiah untuk Dosen',
                'isi' => '<p>Fakultas Teknik UNIMA akan menyelenggarakan workshop penulisan karya ilmiah untuk dosen pada:</p><p><strong>Tanggal:</strong> 30 Maret 2024<br><strong>Waktu:</strong> 08:00 - 16:00 WITA<br><strong>Tempat:</strong> Aula Fakultas Teknik<br><strong>Pemateri:</strong> Prof. Dr. Ahmad Suryadi, M.Sc.</p><p>Workshop ini wajib diikuti oleh semua dosen Fakultas Teknik.</p>',
                'tanggal_posting' => Carbon::now()->subDays(2),
                'tanggal_berakhir' => Carbon::now()->addDays(20),
                'status' => 'published',
                'kategori' => 'umum',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'judul' => 'Peringatan Hari Pendidikan Nasional 2024',
                'isi' => '<p>Dalam rangka memperingati Hari Pendidikan Nasional 2024, Fakultas Teknik UNIMA akan menyelenggarakan berbagai kegiatan:</p><p><strong>Kegiatan:</strong></p><ul><li>Upacara bendera</li><li>Seminar pendidikan</li><li>Pameran karya mahasiswa</li><li>Lomba-lomba akademik</li></ul><p>Acara akan dilaksanakan pada tanggal 2 Mei 2024 di kampus UNIMA.</p>',
                'tanggal_posting' => Carbon::now()->subDays(15),
                'tanggal_berakhir' => Carbon::now()->addDays(60),
                'status' => 'published',
                'kategori' => 'umum',
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ];

        foreach ($pengumumans as $pengumuman) {
            Pengumuman::create($pengumuman);
        }
    }
} 