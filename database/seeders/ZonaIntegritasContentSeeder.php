<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ZonaIntegritasContent;

class ZonaIntegritasContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section
        ZonaIntegritasContent::create([
            'section' => 'hero',
            'title' => 'Zona Integritas',
            'subtitle' => 'Zona Integritas menuju Wilayah Bebas Korupsi (WBK) dan Wilayah Birokrasi Bersih dan Melayani (WBBM) di lingkungan Fakultas Teknik UNIMA',
            'content' => 'Bebas Korupsi',
            'description' => 'Wadah untuk mewujudkan good governance dan clean government di lingkungan Fakultas Teknik UNIMA',
            'icon' => 'heroicon-o-shield-check',
            'color' => 'green',
            'order' => 1,
            'is_active' => true,
        ]);

        // Maklumat Pelayanan Publik
        ZonaIntegritasContent::create([
            'section' => 'maklumat',
            'title' => 'Maklumat Pelayanan Publik',
            'content' => 'Reformasi Birokrasi merupakan salah satu langkah awal mendukung program pemerintah dalam melakukan penataan terhadap sistem penyelenggaraan organisasi Fakultas Teknik, Universitas Negeri Manado yang baik, efektif dan efisien sehingga dapat melayani masyarakat secara cepat, tepat, dan profesional dalam mewujudkan good governance dan clean government menuju aparatur Fakultas Teknik UNIMA yang bersih dan bebas dari KKN, meningkatnya pelayanan prima serta meningkatnya kapasitas dan akuntabilitas kinerja.',
            'description' => 'Dalam menjalankan tugas dan fungsinya, Fakultas Teknik UNIMA berkomitmen untuk menghilangkan penyalahgunaan wewenang, praktik KKN, diskriminasi dan lemahnya pengawasan. Untuk itu dilakukan langkah-langkah strategis melalui pembangunan Zona Integritas menuju Wilayah Bebas Korupsi (WBK) dan Wilayah Birokrasi Bersih dan Melayani (WBBM) di lingkungan Fakultas Teknik UNIMA.',
            'color' => 'green',
            'order' => 2,
            'is_active' => true,
        ]);

        // Prinsip - Transparansi
        ZonaIntegritasContent::create([
            'section' => 'prinsip',
            'title' => 'Transparansi',
            'content' => 'Setiap proses dan keputusan dilakukan secara terbuka dan dapat diakses oleh semua pihak yang berkepentingan.',
            'icon' => 'heroicon-o-eye',
            'color' => 'blue',
            'order' => 3,
            'is_active' => true,
        ]);

        // Prinsip - Akuntabilitas
        ZonaIntegritasContent::create([
            'section' => 'prinsip',
            'title' => 'Akuntabilitas',
            'content' => 'Setiap tindakan dan keputusan dapat dipertanggungjawabkan kepada publik dan pemangku kepentingan.',
            'icon' => 'heroicon-o-check-circle',
            'color' => 'green',
            'order' => 4,
            'is_active' => true,
        ]);

        // Prinsip - Responsif
        ZonaIntegritasContent::create([
            'section' => 'prinsip',
            'title' => 'Responsif',
            'content' => 'Memberikan pelayanan yang cepat, tepat, dan sesuai dengan kebutuhan masyarakat.',
            'icon' => 'heroicon-o-bolt',
            'color' => 'yellow',
            'order' => 5,
            'is_active' => true,
        ]);

        // Prinsip - Efektif & Efisien
        ZonaIntegritasContent::create([
            'section' => 'prinsip',
            'title' => 'Efektif & Efisien',
            'content' => 'Mencapai tujuan dengan hasil yang optimal dan penggunaan sumber daya yang minimal.',
            'icon' => 'heroicon-o-chart-bar',
            'color' => 'purple',
            'order' => 6,
            'is_active' => true,
        ]);

        // Sasaran - WBK
        ZonaIntegritasContent::create([
            'section' => 'sasaran',
            'title' => 'Wilayah Bebas Korupsi (WBK)',
            'content' => 'Menghilangkan praktik korupsi, kolusi, dan nepotisme (KKN)',
            'description' => 'Meningkatkan integritas dan profesionalisme aparatur. Mewujudkan tata kelola yang bersih dan transparan. Meningkatkan kepercayaan masyarakat terhadap institusi.',
            'color' => 'green',
            'order' => 7,
            'is_active' => true,
        ]);

        // Sasaran - WBBM
        ZonaIntegritasContent::create([
            'section' => 'sasaran',
            'title' => 'Wilayah Birokrasi Bersih dan Melayani (WBBM)',
            'content' => 'Meningkatkan kualitas pelayanan publik',
            'description' => 'Mempercepat proses pelayanan akademik. Meningkatkan kepuasan mahasiswa dan masyarakat. Mewujudkan birokrasi yang melayani dengan sepenuh hati.',
            'color' => 'blue',
            'order' => 8,
            'is_active' => true,
        ]);

        // Langkah - Pencegahan
        ZonaIntegritasContent::create([
            'section' => 'langkah',
            'title' => 'Pencegahan',
            'content' => 'Penguatan sistem pengawasan internal, Sosialisasi anti-korupsi, Penerapan sistem informasi terpadu, Standardisasi prosedur pelayanan',
            'icon' => 'heroicon-o-shield-exclamation',
            'color' => 'red',
            'order' => 9,
            'is_active' => true,
        ]);

        // Langkah - Penindakan
        ZonaIntegritasContent::create([
            'section' => 'langkah',
            'title' => 'Penindakan',
            'content' => 'Mekanisme pelaporan pelanggaran, Investigasi internal yang independen, Sanksi tegas bagi pelanggar, Koordinasi dengan lembaga terkait',
            'icon' => 'heroicon-o-exclamation-triangle',
            'color' => 'orange',
            'order' => 10,
            'is_active' => true,
        ]);

        // Langkah - Peningkatan
        ZonaIntegritasContent::create([
            'section' => 'langkah',
            'title' => 'Peningkatan',
            'content' => 'Pelatihan dan pengembangan SDM, Modernisasi sistem pelayanan, Evaluasi dan perbaikan berkelanjutan, Benchmarking dengan institusi terbaik',
            'icon' => 'heroicon-o-arrow-trending-up',
            'color' => 'blue',
            'order' => 11,
            'is_active' => true,
        ]);

        // Dokumen - Surat Keputusan
        ZonaIntegritasContent::create([
            'section' => 'dokumen',
            'title' => 'Surat Keputusan',
            'content' => 'Dokumen resmi yang mengatur implementasi Zona Integritas di lingkungan Fakultas Teknik UNIMA.',
            'icon' => 'heroicon-o-document-text',
            'color' => 'gray',
            'order' => 12,
            'is_active' => true,
        ]);

        // Dokumen - Standar Pelayanan
        ZonaIntegritasContent::create([
            'section' => 'dokumen',
            'title' => 'Standar Pelayanan',
            'content' => 'Panduan standar pelayanan publik yang berlaku di Fakultas Teknik UNIMA.',
            'icon' => 'heroicon-o-clipboard-document-list',
            'color' => 'gray',
            'order' => 13,
            'is_active' => true,
        ]);

        // Kontak - Tim Zona Integritas
        ZonaIntegritasContent::create([
            'section' => 'kontak',
            'title' => 'Tim Zona Integritas Fakultas Teknik',
            'content' => 'zona.integritas@ft.unima.ac.id',
            'description' => '+62-431-123456 ext. 456 | Gedung FT Lt. 1, Ruang Zona Integritas',
            'icon' => 'heroicon-o-envelope-open',
            'color' => 'indigo',
            'order' => 14,
            'is_active' => true,
        ]);

        // Kontak - Jam Pelayanan
        ZonaIntegritasContent::create([
            'section' => 'kontak',
            'title' => 'Jam Pelayanan',
            'content' => 'Senin - Jumat: 08:00 - 16:00 | Sabtu: 08:00 - 12:00 | Minggu: Tutup',
            'description' => 'Pengaduan dapat disampaikan secara langsung, melalui email, atau melalui kotak pengaduan yang tersedia di setiap gedung Fakultas Teknik.',
            'icon' => 'heroicon-o-clock',
            'color' => 'blue',
            'order' => 15,
            'is_active' => true,
        ]);

        // Informasi Kontak
        ZonaIntegritasContent::create([
            'section' => 'kontak',
            'title' => 'Informasi Kontak Zona Integritas',
            'content' => 'zona.integritas@unima.ac.id',
            'description' => '+62-431-123456 ext. 456 | Gedung Zona Integritas Lt. 2, Fakultas Teknik UNIMA',
            'icon' => 'heroicon-o-envelope-open',
            'color' => 'indigo',
            'order' => 16,
            'is_active' => true,
        ]);
    }
}
