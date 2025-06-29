<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlumniContent;

class AlumniContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contentData = [
            // Hero Section
            [
                'section' => 'hero',
                'key' => 'judul_utama',
                'value' => 'Alumni Fatek UNIMA',
                'type' => 'text',
                'urutan' => 1,
                'is_active' => true,
                'catatan' => 'Judul utama di hero section'
            ],
            [
                'section' => 'hero',
                'key' => 'subtitle',
                'value' => 'Jaringan Alumni yang Sukses & Berkontribusi untuk Kemajuan Bangsa',
                'type' => 'text',
                'urutan' => 2,
                'is_active' => true,
                'catatan' => 'Subtitle di hero section'
            ],
            [
                'section' => 'hero',
                'key' => 'deskripsi',
                'value' => 'Bergabunglah dengan jaringan alumni terbesar di Sulawesi Utara dan dapatkan berbagai manfaat untuk pengembangan karir Anda.',
                'type' => 'text',
                'urutan' => 3,
                'is_active' => true,
                'catatan' => 'Deskripsi di call to action'
            ],

            // Statistik
            [
                'section' => 'statistik',
                'key' => 'total_alumni',
                'value' => '5000+',
                'type' => 'text',
                'urutan' => 1,
                'is_active' => true,
                'catatan' => 'Total alumni yang terdaftar'
            ],
            [
                'section' => 'statistik',
                'key' => 'tingkat_penyerapan',
                'value' => '85%',
                'type' => 'text',
                'urutan' => 2,
                'is_active' => true,
                'catatan' => 'Tingkat penyerapan kerja alumni'
            ],
            [
                'section' => 'statistik',
                'key' => 'perusahaan_mitra',
                'value' => '150+',
                'type' => 'text',
                'urutan' => 3,
                'is_active' => true,
                'catatan' => 'Jumlah perusahaan mitra'
            ],
            [
                'section' => 'statistik',
                'key' => 'tahun_pengalaman',
                'value' => '25',
                'type' => 'text',
                'urutan' => 4,
                'is_active' => true,
                'catatan' => 'Tahun pengalaman sejak berdirinya Fatek'
            ],

            // Testimonial
            [
                'section' => 'testimonial',
                'key' => 'judul_section',
                'value' => 'Testimonial Alumni',
                'type' => 'text',
                'urutan' => 1,
                'is_active' => true,
                'catatan' => 'Judul section testimonial'
            ],
            [
                'section' => 'testimonial',
                'key' => 'deskripsi_section',
                'value' => 'Apa kata alumni tentang pengalaman mereka di Fatek UNIMA dan kontribusinya terhadap kesuksesan karir',
                'type' => 'text',
                'urutan' => 2,
                'is_active' => true,
                'catatan' => 'Deskripsi section testimonial'
            ],
            [
                'section' => 'testimonial',
                'key' => 'testimonial_1_nama',
                'value' => 'Ahmad Fadillah',
                'type' => 'text',
                'urutan' => 3,
                'is_active' => true,
                'catatan' => 'Nama testimonial 1'
            ],
            [
                'section' => 'testimonial',
                'key' => 'testimonial_1_jabatan',
                'value' => 'CEO TechStart Indonesia',
                'type' => 'text',
                'urutan' => 4,
                'is_active' => true,
                'catatan' => 'Jabatan testimonial 1'
            ],
            [
                'section' => 'testimonial',
                'key' => 'testimonial_1_isi',
                'value' => 'Fatek UNIMA memberikan fondasi yang kuat untuk karir saya di dunia teknologi.',
                'type' => 'text',
                'urutan' => 5,
                'is_active' => true,
                'catatan' => 'Isi testimonial 1'
            ],
            [
                'section' => 'testimonial',
                'key' => 'testimonial_2_nama',
                'value' => 'Sarah Putri',
                'type' => 'text',
                'urutan' => 6,
                'is_active' => true,
                'catatan' => 'Nama testimonial 2'
            ],
            [
                'section' => 'testimonial',
                'key' => 'testimonial_2_jabatan',
                'value' => 'Project Manager',
                'type' => 'text',
                'urutan' => 7,
                'is_active' => true,
                'catatan' => 'Jabatan testimonial 2'
            ],
            [
                'section' => 'testimonial',
                'key' => 'testimonial_2_isi',
                'value' => 'Dosen-dosen di Fatek sangat supportive dan memberikan pengetahuan praktis yang langsung bisa diterapkan di dunia kerja.',
                'type' => 'text',
                'urutan' => 8,
                'is_active' => true,
                'catatan' => 'Isi testimonial 2'
            ],
            [
                'section' => 'testimonial',
                'key' => 'testimonial_3_nama',
                'value' => 'Budi Santoso',
                'type' => 'text',
                'urutan' => 9,
                'is_active' => true,
                'catatan' => 'Nama testimonial 3'
            ],
            [
                'section' => 'testimonial',
                'key' => 'testimonial_3_jabatan',
                'value' => 'Senior Engineer',
                'type' => 'text',
                'urutan' => 10,
                'is_active' => true,
                'catatan' => 'Jabatan testimonial 3'
            ],
            [
                'section' => 'testimonial',
                'key' => 'testimonial_3_isi',
                'value' => 'Jaringan alumni Fatek sangat membantu dalam membuka peluang karir. Komunitas yang solid dan saling mendukung.',
                'type' => 'text',
                'urutan' => 11,
                'is_active' => true,
                'catatan' => 'Isi testimonial 3'
            ],

            // Galeri Kegiatan
            [
                'section' => 'galeri_kegiatan',
                'key' => 'judul_section',
                'value' => 'Galeri Kegiatan Alumni',
                'type' => 'text',
                'urutan' => 1,
                'is_active' => true,
                'catatan' => 'Judul section galeri kegiatan'
            ],
            [
                'section' => 'galeri_kegiatan',
                'key' => 'deskripsi_section',
                'value' => 'Dokumentasi berbagai kegiatan dan acara yang diselenggarakan oleh jaringan alumni Fatek UNIMA',
                'type' => 'text',
                'urutan' => 2,
                'is_active' => true,
                'catatan' => 'Deskripsi section galeri kegiatan'
            ],
            [
                'section' => 'galeri_kegiatan',
                'key' => 'kegiatan_1_judul',
                'value' => 'Reuni Akbar 2024',
                'type' => 'text',
                'urutan' => 3,
                'is_active' => true,
                'catatan' => 'Judul kegiatan 1'
            ],
            [
                'section' => 'galeri_kegiatan',
                'key' => 'kegiatan_1_deskripsi',
                'value' => 'Reuni akbar tahunan yang dihadiri 500+ alumni dari berbagai angkatan.',
                'type' => 'text',
                'urutan' => 4,
                'is_active' => true,
                'catatan' => 'Deskripsi kegiatan 1'
            ],
            [
                'section' => 'galeri_kegiatan',
                'key' => 'kegiatan_1_kategori',
                'value' => 'Reuni',
                'type' => 'text',
                'urutan' => 5,
                'is_active' => true,
                'catatan' => 'Kategori kegiatan 1'
            ],
            [
                'section' => 'galeri_kegiatan',
                'key' => 'kegiatan_2_judul',
                'value' => 'Career Workshop',
                'type' => 'text',
                'urutan' => 6,
                'is_active' => true,
                'catatan' => 'Judul kegiatan 2'
            ],
            [
                'section' => 'galeri_kegiatan',
                'key' => 'kegiatan_2_deskripsi',
                'value' => 'Workshop karir untuk mahasiswa dengan pembicara alumni sukses.',
                'type' => 'text',
                'urutan' => 7,
                'is_active' => true,
                'catatan' => 'Deskripsi kegiatan 2'
            ],
            [
                'section' => 'galeri_kegiatan',
                'key' => 'kegiatan_2_kategori',
                'value' => 'Workshop',
                'type' => 'text',
                'urutan' => 8,
                'is_active' => true,
                'catatan' => 'Kategori kegiatan 2'
            ],
            [
                'section' => 'galeri_kegiatan',
                'key' => 'kegiatan_3_judul',
                'value' => 'Networking Event',
                'type' => 'text',
                'urutan' => 9,
                'is_active' => true,
                'catatan' => 'Judul kegiatan 3'
            ],
            [
                'section' => 'galeri_kegiatan',
                'key' => 'kegiatan_3_deskripsi',
                'value' => 'Acara networking untuk memperluas koneksi bisnis dan profesional.',
                'type' => 'text',
                'urutan' => 10,
                'is_active' => true,
                'catatan' => 'Deskripsi kegiatan 3'
            ],
            [
                'section' => 'galeri_kegiatan',
                'key' => 'kegiatan_3_kategori',
                'value' => 'Networking',
                'type' => 'text',
                'urutan' => 11,
                'is_active' => true,
                'catatan' => 'Kategori kegiatan 3'
            ],

            // Jaringan Alumni
            [
                'section' => 'jaringan_alumni',
                'key' => 'judul_section',
                'value' => 'Jaringan Alumni',
                'type' => 'text',
                'urutan' => 1,
                'is_active' => true,
                'catatan' => 'Judul section jaringan alumni'
            ],
            [
                'section' => 'jaringan_alumni',
                'key' => 'deskripsi_section',
                'value' => 'Ikatan alumni yang aktif dan berbagai kegiatan networking untuk memperkuat hubungan antar alumni',
                'type' => 'text',
                'urutan' => 2,
                'is_active' => true,
                'catatan' => 'Deskripsi section jaringan alumni'
            ],
            [
                'section' => 'jaringan_alumni',
                'key' => 'ikatan_1_nama',
                'value' => 'Ikatan Alumni Teknik Informatika (IATI)',
                'type' => 'text',
                'urutan' => 3,
                'is_active' => true,
                'catatan' => 'Nama ikatan alumni 1'
            ],
            [
                'section' => 'jaringan_alumni',
                'key' => 'ikatan_1_anggota',
                'value' => '500+ anggota aktif',
                'type' => 'text',
                'urutan' => 4,
                'is_active' => true,
                'catatan' => 'Jumlah anggota ikatan 1'
            ],
            [
                'section' => 'jaringan_alumni',
                'key' => 'ikatan_2_nama',
                'value' => 'Ikatan Alumni Teknik Sipil (IATS)',
                'type' => 'text',
                'urutan' => 5,
                'is_active' => true,
                'catatan' => 'Nama ikatan alumni 2'
            ],
            [
                'section' => 'jaringan_alumni',
                'key' => 'ikatan_2_anggota',
                'value' => '450+ anggota aktif',
                'type' => 'text',
                'urutan' => 6,
                'is_active' => true,
                'catatan' => 'Jumlah anggota ikatan 2'
            ],

            // Kontribusi Alumni
            [
                'section' => 'kontribusi',
                'key' => 'judul_section',
                'value' => 'Kontribusi Alumni',
                'type' => 'text',
                'urutan' => 1,
                'is_active' => true,
                'catatan' => 'Judul section kontribusi'
            ],
            [
                'section' => 'kontribusi',
                'key' => 'deskripsi_section',
                'value' => 'Berbagai kontribusi alumni terhadap pengembangan fakultas dan mahasiswa',
                'type' => 'text',
                'urutan' => 2,
                'is_active' => true,
                'catatan' => 'Deskripsi section kontribusi'
            ],
            [
                'section' => 'kontribusi',
                'key' => 'kontribusi_1_judul',
                'value' => 'Beasiswa',
                'type' => 'text',
                'urutan' => 3,
                'is_active' => true,
                'catatan' => 'Judul kontribusi 1'
            ],
            [
                'section' => 'kontribusi',
                'key' => 'kontribusi_1_deskripsi',
                'value' => 'Menyediakan beasiswa untuk mahasiswa berprestasi',
                'type' => 'text',
                'urutan' => 4,
                'is_active' => true,
                'catatan' => 'Deskripsi kontribusi 1'
            ],
            [
                'section' => 'kontribusi',
                'key' => 'kontribusi_2_judul',
                'value' => 'Magang & Kerja',
                'type' => 'text',
                'urutan' => 5,
                'is_active' => true,
                'catatan' => 'Judul kontribusi 2'
            ],
            [
                'section' => 'kontribusi',
                'key' => 'kontribusi_2_deskripsi',
                'value' => 'Membuka peluang magang dan kerja di perusahaan',
                'type' => 'text',
                'urutan' => 6,
                'is_active' => true,
                'catatan' => 'Deskripsi kontribusi 2'
            ],
            [
                'section' => 'kontribusi',
                'key' => 'kontribusi_3_judul',
                'value' => 'Mentoring',
                'type' => 'text',
                'urutan' => 7,
                'is_active' => true,
                'catatan' => 'Judul kontribusi 3'
            ],
            [
                'section' => 'kontribusi',
                'key' => 'kontribusi_3_deskripsi',
                'value' => 'Memberikan bimbingan dan mentoring mahasiswa',
                'type' => 'text',
                'urutan' => 8,
                'is_active' => true,
                'catatan' => 'Deskripsi kontribusi 3'
            ],
        ];

        foreach ($contentData as $data) {
            AlumniContent::create($data);
        }
    }
}
