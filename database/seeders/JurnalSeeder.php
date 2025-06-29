<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurnal;

class JurnalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jurnal Teknik Informatika
        Jurnal::create([
            'judul' => 'Jurnal Sistem Informasi',
            'deskripsi' => 'Jurnal yang mempublikasikan penelitian di bidang sistem informasi, database, dan pengembangan aplikasi.',
            'jurusan' => 'teknik-informatika',
            'issn' => '1234-5678',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '4x per tahun',
            'website' => 'https://jurnal.unima.ac.id/sistem-informasi',
            'email' => 'jsi@unima.ac.id',
            'scope' => 'Sistem Informasi, Database, Pengembangan Aplikasi, Business Intelligence, E-Government',
            'panduan_penulisan' => 'Artikel harus ditulis dalam bahasa Indonesia atau Inggris, panjang 8-15 halaman, menggunakan template yang telah ditentukan.',
            'status' => 'aktif',
            'urutan' => 1,
        ]);

        Jurnal::create([
            'judul' => 'Jurnal Artificial Intelligence',
            'deskripsi' => 'Jurnal khusus untuk penelitian di bidang kecerdasan buatan dan machine learning.',
            'jurusan' => 'teknik-informatika',
            'issn' => '2345-6789',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '2x per tahun',
            'website' => 'https://jurnal.unima.ac.id/ai',
            'email' => 'jai@unima.ac.id',
            'scope' => 'Machine Learning, Deep Learning, Computer Vision, Natural Language Processing, Expert Systems',
            'panduan_penulisan' => 'Artikel harus fokus pada implementasi AI, dengan hasil eksperimen yang jelas dan dapat direproduksi.',
            'status' => 'aktif',
            'urutan' => 2,
        ]);

        Jurnal::create([
            'judul' => 'Jurnal Web Development',
            'deskripsi' => 'Jurnal untuk penelitian pengembangan web dan teknologi internet.',
            'jurusan' => 'teknik-informatika',
            'issn' => '3456-7890',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '3x per tahun',
            'website' => 'https://jurnal.unima.ac.id/web-dev',
            'email' => 'jwd@unima.ac.id',
            'scope' => 'Web Development, Frontend, Backend, Full Stack, Progressive Web Apps, Web Security',
            'panduan_penulisan' => 'Artikel harus mencakup aspek teknis dan implementasi, dengan demo atau prototype yang dapat diakses.',
            'status' => 'aktif',
            'urutan' => 3,
        ]);

        // Jurnal Teknik Sipil
        Jurnal::create([
            'judul' => 'Jurnal Konstruksi',
            'deskripsi' => 'Jurnal untuk penelitian di bidang konstruksi dan manajemen proyek.',
            'jurusan' => 'teknik-sipil',
            'issn' => '4567-8901',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '4x per tahun',
            'website' => 'https://jurnal.unima.ac.id/konstruksi',
            'email' => 'jk@unima.ac.id',
            'scope' => 'Konstruksi, Manajemen Proyek, Material Konstruksi, Metode Konstruksi, Quality Control',
            'panduan_penulisan' => 'Artikel harus berdasarkan studi kasus atau penelitian lapangan dengan data yang valid.',
            'status' => 'aktif',
            'urutan' => 4,
        ]);

        Jurnal::create([
            'judul' => 'Jurnal Struktur',
            'deskripsi' => 'Jurnal untuk penelitian analisis dan desain struktur bangunan.',
            'jurusan' => 'teknik-sipil',
            'issn' => '5678-9012',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '3x per tahun',
            'website' => 'https://jurnal.unima.ac.id/struktur',
            'email' => 'js@unima.ac.id',
            'scope' => 'Analisis Struktur, Desain Struktur, Beton, Baja, Kayu, Struktur Komposit',
            'panduan_penulisan' => 'Artikel harus mencakup analisis teoritis dan validasi dengan software atau perhitungan manual.',
            'status' => 'aktif',
            'urutan' => 5,
        ]);

        Jurnal::create([
            'judul' => 'Jurnal Transportasi',
            'deskripsi' => 'Jurnal untuk penelitian di bidang transportasi dan lalu lintas.',
            'jurusan' => 'teknik-sipil',
            'issn' => '6789-0123',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '2x per tahun',
            'website' => 'https://jurnal.unima.ac.id/transportasi',
            'email' => 'jt@unima.ac.id',
            'scope' => 'Transportasi, Lalu Lintas, Perencanaan Transportasi, Keselamatan Jalan, Infrastruktur Transportasi',
            'panduan_penulisan' => 'Artikel harus berdasarkan survey atau studi lapangan dengan analisis yang komprehensif.',
            'status' => 'aktif',
            'urutan' => 6,
        ]);

        // Jurnal Teknik Elektro
        Jurnal::create([
            'judul' => 'Jurnal Elektronika',
            'deskripsi' => 'Jurnal untuk penelitian di bidang elektronika dan instrumentasi.',
            'jurusan' => 'teknik-elektro',
            'issn' => '7890-1234',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '4x per tahun',
            'website' => 'https://jurnal.unima.ac.id/elektronika',
            'email' => 'je@unima.ac.id',
            'scope' => 'Elektronika, Instrumentasi, Sensor, Mikrokontroler, Sistem Embedded',
            'panduan_penulisan' => 'Artikel harus mencakup desain dan implementasi sistem elektronika dengan pengujian yang jelas.',
            'status' => 'aktif',
            'urutan' => 7,
        ]);

        Jurnal::create([
            'judul' => 'Jurnal Energi Terbarukan',
            'deskripsi' => 'Jurnal untuk penelitian di bidang energi terbarukan dan efisiensi energi.',
            'jurusan' => 'teknik-elektro',
            'issn' => '8901-2345',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '2x per tahun',
            'website' => 'https://jurnal.unima.ac.id/energi',
            'email' => 'jet@unima.ac.id',
            'scope' => 'Energi Surya, Energi Angin, Biomassa, Efisiensi Energi, Smart Grid',
            'panduan_penulisan' => 'Artikel harus fokus pada inovasi teknologi energi terbarukan dengan analisis performa yang detail.',
            'status' => 'aktif',
            'urutan' => 8,
        ]);

        Jurnal::create([
            'judul' => 'Jurnal Otomasi',
            'deskripsi' => 'Jurnal untuk penelitian di bidang otomasi dan kontrol industri.',
            'jurusan' => 'teknik-elektro',
            'issn' => '9012-3456',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '3x per tahun',
            'website' => 'https://jurnal.unima.ac.id/otomasi',
            'email' => 'jo@unima.ac.id',
            'scope' => 'Otomasi Industri, Sistem Kontrol, PLC, SCADA, Robotika',
            'panduan_penulisan' => 'Artikel harus mencakup implementasi sistem otomasi dengan analisis performa dan efisiensi.',
            'status' => 'aktif',
            'urutan' => 9,
        ]);

        // Jurnal Teknik Mesin
        Jurnal::create([
            'judul' => 'Jurnal Manufaktur',
            'deskripsi' => 'Jurnal untuk penelitian di bidang manufaktur dan produksi.',
            'jurusan' => 'teknik-mesin',
            'issn' => '0123-4567',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '4x per tahun',
            'website' => 'https://jurnal.unima.ac.id/manufaktur',
            'email' => 'jm@unima.ac.id',
            'scope' => 'Manufaktur, Produksi, CNC, Additive Manufacturing, Quality Control',
            'panduan_penulisan' => 'Artikel harus berdasarkan studi kasus manufaktur dengan analisis proses dan hasil yang detail.',
            'status' => 'aktif',
            'urutan' => 10,
        ]);

        Jurnal::create([
            'judul' => 'Jurnal Termodinamika',
            'deskripsi' => 'Jurnal untuk penelitian di bidang termodinamika dan perpindahan panas.',
            'jurusan' => 'teknik-mesin',
            'issn' => '1234-5678',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '3x per tahun',
            'website' => 'https://jurnal.unima.ac.id/termodinamika',
            'email' => 'jt@unima.ac.id',
            'scope' => 'Termodinamika, Perpindahan Panas, Mesin Kalor, Refrigerasi, HVAC',
            'panduan_penulisan' => 'Artikel harus mencakup analisis teoritis dan eksperimental dengan validasi yang jelas.',
            'status' => 'aktif',
            'urutan' => 11,
        ]);

        Jurnal::create([
            'judul' => 'Jurnal Material',
            'deskripsi' => 'Jurnal untuk penelitian di bidang material dan komposit.',
            'jurusan' => 'teknik-mesin',
            'issn' => '2345-6789',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '2x per tahun',
            'website' => 'https://jurnal.unima.ac.id/material',
            'email' => 'jmat@unima.ac.id',
            'scope' => 'Material Engineering, Komposit, Metalurgi, Karakterisasi Material, Material Baru',
            'panduan_penulisan' => 'Artikel harus mencakup karakterisasi material dengan analisis sifat mekanik dan fisik.',
            'status' => 'aktif',
            'urutan' => 12,
        ]);

        // Jurnal Arsitektur
        Jurnal::create([
            'judul' => 'Jurnal Arsitektur',
            'deskripsi' => 'Jurnal untuk penelitian di bidang arsitektur dan desain bangunan.',
            'jurusan' => 'arsitektur',
            'issn' => '3456-7890',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '4x per tahun',
            'website' => 'https://jurnal.unima.ac.id/arsitektur',
            'email' => 'ja@unima.ac.id',
            'scope' => 'Arsitektur, Desain Bangunan, Arsitektur Berkelanjutan, Arsitektur Tradisional, Digital Architecture',
            'panduan_penulisan' => 'Artikel harus mencakup konsep desain dengan analisis kontekstual dan implementasi yang jelas.',
            'status' => 'aktif',
            'urutan' => 13,
        ]);

        Jurnal::create([
            'judul' => 'Jurnal Urban Planning',
            'deskripsi' => 'Jurnal untuk penelitian di bidang perencanaan kota dan tata ruang.',
            'jurusan' => 'arsitektur',
            'issn' => '4567-8901',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '2x per tahun',
            'website' => 'https://jurnal.unima.ac.id/urban-planning',
            'email' => 'jup@unima.ac.id',
            'scope' => 'Perencanaan Kota, Tata Ruang, Smart City, Sustainable Urban Development, Urban Design',
            'panduan_penulisan' => 'Artikel harus berdasarkan studi kasus perencanaan dengan analisis sosial-ekonomi yang komprehensif.',
            'status' => 'aktif',
            'urutan' => 14,
        ]);

        Jurnal::create([
            'judul' => 'Jurnal Interior Design',
            'deskripsi' => 'Jurnal untuk penelitian di bidang desain interior dan ruang dalam.',
            'jurusan' => 'arsitektur',
            'issn' => '5678-9012',
            'penerbit' => 'Fakultas Teknik UNIMA',
            'periode_terbit' => '3x per tahun',
            'website' => 'https://jurnal.unima.ac.id/interior',
            'email' => 'jid@unima.ac.id',
            'scope' => 'Desain Interior, Ruang Dalam, Ergonomi, Estetika Interior, Interior Berkelanjutan',
            'panduan_penulisan' => 'Artikel harus mencakup konsep desain interior dengan analisis fungsional dan estetika.',
            'status' => 'aktif',
            'urutan' => 15,
        ]);
    }
}
