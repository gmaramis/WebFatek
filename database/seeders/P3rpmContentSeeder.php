<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\P3rpmContent;

class P3rpmContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section
        P3rpmContent::create([
            'section' => 'hero',
            'title' => 'P3RPM',
            'subtitle' => 'Pusat Penyusunan Proposal Riset dan Pengabdian Masyarakat Fakultas Teknik UNIMA',
            'content' => 'Wadah Kolaborasi Riset dan Pengabdian',
            'description' => 'P3RPM Fakultas Teknik merupakan pusat unggulan dalam pengembangan proposal riset dan pengabdian masyarakat yang berkualitas tinggi.',
            'icon' => 'heroicon-o-users',
            'color' => 'indigo',
            'order' => 1,
            'is_active' => true,
        ]);

        // Deskripsi P3RPM
        P3rpmContent::create([
            'section' => 'deskripsi',
            'title' => 'PUSAT PENYUSUNAN PROPOSAL RISET DAN PENGABDIAN MASYARAKAT (P3RPM) FT',
            'content' => 'P3RPM FT merupakan wadah Ruang Kolaborasi bagi Dosen FT UNIMA untuk menghasilkan Proposal/Rencana Riset untuk diikutsertakan dalam kompetisi. P3RPM FT merupakan wujud komitmen FT dalam mendorong dan mempercepat partisipasi aktif dosen dalam berbagai ajang kompetisi riset, baik di tingkat nasional maupun internasional.',
            'description' => 'Pusat ini bertujuan untuk menyusun proposal riset yang selaras dengan Kurikulum Berbasis Kompetensi (KBK) masing-masing jurusan atau program studi, sehingga siap untuk diikutsertakan dalam skema pendanaan riset seperti DRTPM, BRIN, maupun kompetisi internasional.',
            'color' => 'blue',
            'order' => 2,
            'is_active' => true,
        ]);

        // Visi
        P3rpmContent::create([
            'section' => 'visi',
            'title' => 'Visi',
            'content' => 'Menjadi pusat unggulan dalam pengembangan proposal riset dan pengabdian masyarakat yang berkualitas tinggi, mendorong inovasi teknologi, dan berkontribusi signifikan dalam pengembangan ilmu pengetahuan dan teknologi di Indonesia.',
            'icon' => 'heroicon-o-check-circle',
            'color' => 'green',
            'order' => 3,
            'is_active' => true,
        ]);

        // Misi
        P3rpmContent::create([
            'section' => 'misi',
            'title' => 'Misi',
            'content' => 'Meningkatkan kapasitas dosen dalam penyusunan proposal riset dan pengabdian masyarakat',
            'description' => 'Memfasilitasi kolaborasi riset antar program studi dan institusi. Mengembangkan roadmap riset yang selaras dengan kebutuhan industri dan masyarakat. Mendorong partisipasi dalam kompetisi riset nasional dan internasional.',
            'icon' => 'heroicon-o-bolt',
            'color' => 'blue',
            'order' => 4,
            'is_active' => true,
        ]);

        // Program Unggulan - Penyusunan Proposal
        P3rpmContent::create([
            'section' => 'program',
            'title' => 'Penyusunan Proposal Riset',
            'content' => 'Bimbingan dan pendampingan dalam penyusunan proposal riset yang berkualitas tinggi untuk berbagai skema pendanaan nasional dan internasional.',
            'icon' => 'heroicon-o-document-text',
            'color' => 'purple',
            'order' => 5,
            'is_active' => true,
        ]);

        // Program Unggulan - Kolaborasi Riset
        P3rpmContent::create([
            'section' => 'program',
            'title' => 'Kolaborasi Riset',
            'content' => 'Memfasilitasi kerjasama riset antar program studi, institusi, dan industri untuk menghasilkan penelitian yang berdampak luas.',
            'icon' => 'heroicon-o-users',
            'color' => 'green',
            'order' => 6,
            'is_active' => true,
        ]);

        // Program Unggulan - Pengabdian Masyarakat
        P3rpmContent::create([
            'section' => 'program',
            'title' => 'Pengabdian Masyarakat',
            'content' => 'Pengembangan program pengabdian masyarakat yang inovatif dan berkelanjutan untuk pemberdayaan masyarakat lokal.',
            'icon' => 'heroicon-o-building-office',
            'color' => 'orange',
            'order' => 7,
            'is_active' => true,
        ]);

        // Skema Pendanaan - DRTPM
        P3rpmContent::create([
            'section' => 'skema',
            'title' => 'DRTPM',
            'content' => 'Direktorat Riset dan Pengabdian Masyarakat',
            'icon' => 'heroicon-o-currency-dollar',
            'color' => 'blue',
            'order' => 8,
            'is_active' => true,
        ]);

        // Skema Pendanaan - BRIN
        P3rpmContent::create([
            'section' => 'skema',
            'title' => 'BRIN',
            'content' => 'Badan Riset dan Inovasi Nasional',
            'icon' => 'heroicon-o-beaker',
            'color' => 'green',
            'order' => 9,
            'is_active' => true,
        ]);

        // Skema Pendanaan - Kompetisi Internasional
        P3rpmContent::create([
            'section' => 'skema',
            'title' => 'Kompetisi Internasional',
            'content' => 'Ajang kompetisi riset tingkat internasional',
            'icon' => 'heroicon-o-globe-alt',
            'color' => 'purple',
            'order' => 10,
            'is_active' => true,
        ]);

        // Skema Pendanaan - Skema Lainnya
        P3rpmContent::create([
            'section' => 'skema',
            'title' => 'Skema Lainnya',
            'content' => 'Berbagai skema pendanaan riset lainnya',
            'icon' => 'heroicon-o-document',
            'color' => 'red',
            'order' => 11,
            'is_active' => true,
        ]);

        // Roadmap Riset - Identifikasi Potensi
        P3rpmContent::create([
            'section' => 'roadmap',
            'title' => 'Identifikasi Potensi',
            'content' => 'Mengidentifikasi potensi riset unggulan setiap program studi',
            'color' => 'blue',
            'order' => 12,
            'is_active' => true,
        ]);

        // Roadmap Riset - Pengembangan Proposal
        P3rpmContent::create([
            'section' => 'roadmap',
            'title' => 'Pengembangan Proposal',
            'content' => 'Menyusun proposal riset yang berkualitas dan kompetitif',
            'color' => 'green',
            'order' => 13,
            'is_active' => true,
        ]);

        // Roadmap Riset - Implementasi Riset
        P3rpmContent::create([
            'section' => 'roadmap',
            'title' => 'Implementasi Riset',
            'content' => 'Melaksanakan penelitian sesuai proposal yang disetujui',
            'color' => 'yellow',
            'order' => 14,
            'is_active' => true,
        ]);

        // Roadmap Riset - Publikasi & Komersialisasi
        P3rpmContent::create([
            'section' => 'roadmap',
            'title' => 'Publikasi & Komersialisasi',
            'content' => 'Mempublikasikan hasil dan mengkomersialisasikan produk riset',
            'color' => 'purple',
            'order' => 15,
            'is_active' => true,
        ]);

        // Informasi Kontak
        P3rpmContent::create([
            'section' => 'kontak',
            'title' => 'Informasi Kontak P3RPM',
            'content' => 'p3rpm.ft@unima.ac.id',
            'description' => '+62-431-123456 ext. 789 | Gedung P3RPM Lt. 3, FT UNIMA',
            'icon' => 'heroicon-o-envelope-open',
            'color' => 'indigo',
            'order' => 16,
            'is_active' => true,
        ]);

        // Jam Konsultasi
        P3rpmContent::create([
            'section' => 'kontak',
            'title' => 'Jam Konsultasi',
            'content' => 'Senin - Jumat: 09:00 - 17:00 | Sabtu: 09:00 - 13:00 | Minggu: Tutup',
            'description' => 'Konsultasi proposal dapat dilakukan secara online atau offline dengan membuat janji temu terlebih dahulu.',
            'icon' => 'heroicon-o-clock',
            'color' => 'blue',
            'order' => 17,
            'is_active' => true,
        ]);
    }
}
