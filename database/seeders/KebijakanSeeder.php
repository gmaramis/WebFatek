<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kebijakan;

class KebijakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kebijakans = [
            [
                'judul' => 'Kebijakan Akademik Fakultas Teknik',
                'deskripsi' => 'Kebijakan terkait kegiatan akademik dan pembelajaran di Fakultas Teknik',
                'isi' => '<h3>Kebijakan Akademik Fakultas Teknik UNIMA</h3>
                <p>Fakultas Teknik Universitas Negeri Manado memiliki beberapa kebijakan akademik yang harus dipatuhi oleh seluruh mahasiswa dan dosen:</p>
                
                <h4>1. Kehadiran Mahasiswa</h4>
                <ul>
                    <li>Kehadiran minimal 80% untuk setiap mata kuliah</li>
                    <li>Mahasiswa yang tidak memenuhi kehadiran minimal tidak diperkenankan mengikuti ujian akhir</li>
                    <li>Absen dilakukan secara manual dan digital</li>
                </ul>
                
                <h4>2. Sistem Penilaian</h4>
                <ul>
                    <li>Penilaian berdasarkan UTS (30%), UAS (40%), dan Tugas (30%)</li>
                    <li>Nilai minimal untuk lulus adalah C (60)</li>
                    <li>Mahasiswa yang mendapat nilai D harus mengulang mata kuliah</li>
                </ul>
                
                <h4>3. Praktikum</h4>
                <ul>
                    <li>Setiap praktikum wajib diikuti dengan seragam laboratorium</li>
                    <li>Laporan praktikum harus diserahkan maksimal 1 minggu setelah praktikum</li>
                    <li>Mahasiswa yang tidak mengikuti praktikum wajib mengulang</li>
                </ul>
                
                <h4>4. Skripsi</h4>
                <ul>
                    <li>Skripsi dapat diambil setelah menyelesaikan minimal 120 SKS</li>
                    <li>Pembimbing skripsi ditentukan oleh ketua program studi</li>
                    <li>Masa pengerjaan skripsi maksimal 2 semester</li>
                </ul>',
                'kategori' => 'akademik',
                'file_dokumen' => null,
                'is_active' => true,
            ],
            [
                'judul' => 'Kebijakan Kemahasiswaan',
                'deskripsi' => 'Kebijakan terkait kegiatan kemahasiswaan dan organisasi',
                'isi' => '<h3>Kebijakan Kemahasiswaan Fakultas Teknik</h3>
                <p>Fakultas Teknik mendukung berbagai kegiatan kemahasiswaan yang bertujuan untuk mengembangkan soft skill mahasiswa:</p>
                
                <h4>1. Organisasi Mahasiswa</h4>
                <ul>
                    <li>Himpunan Mahasiswa Jurusan (HMJ) wajib ada di setiap program studi</li>
                    <li>BEM Fakultas Teknik sebagai wadah koordinasi kegiatan mahasiswa</li>
                    <li>Setiap organisasi harus memiliki AD/ART yang disahkan</li>
                </ul>
                
                <h4>2. Kegiatan Ekstrakurikuler</h4>
                <ul>
                    <li>Mahasiswa wajib mengikuti minimal 1 kegiatan ekstrakurikuler</li>
                    <li>Kegiatan ekstrakurikuler dapat berupa UKM, komunitas, atau organisasi</li>
                    <li>Sertifikat kegiatan ekstrakurikuler dapat digunakan untuk penilaian soft skill</li>
                </ul>
                
                <h4>3. Kompetisi dan Lomba</h4>
                <ul>
                    <li>Fakultas mendukung mahasiswa mengikuti berbagai kompetisi</li>
                    <li>Biaya kompetisi dapat dibantu melalui dana kemahasiswaan</li>
                    <li>Mahasiswa yang menang kompetisi akan mendapat reward</li>
                </ul>
                
                <h4>4. Beasiswa</h4>
                <ul>
                    <li>Beasiswa diberikan berdasarkan prestasi akademik dan non-akademik</li>
                    <li>Mahasiswa berprestasi dapat mengajukan beasiswa</li>
                    <li>Beasiswa dapat berupa beasiswa prestasi, beasiswa berprestasi, atau beasiswa khusus</li>
                </ul>',
                'kategori' => 'kemahasiswaan',
                'file_dokumen' => null,
                'is_active' => true,
            ],
            [
                'judul' => 'Kebijakan Kepegawaian',
                'deskripsi' => 'Kebijakan terkait dosen dan tenaga kependidikan',
                'isi' => '<h3>Kebijakan Kepegawaian Fakultas Teknik</h3>
                <p>Fakultas Teknik memiliki kebijakan kepegawaian yang mengatur hubungan kerja antara dosen dan tenaga kependidikan:</p>
                
                <h4>1. Beban Kerja Dosen</h4>
                <ul>
                    <li>Beban kerja minimal 12 SKS per semester</li>
                    <li>Dosen wajib melakukan penelitian dan pengabdian masyarakat</li>
                    <li>Dosen harus mengikuti pengembangan keprofesian berkelanjutan</li>
                </ul>
                
                <h4>2. Penilaian Kinerja</h4>
                <ul>
                    <li>Penilaian kinerja dilakukan setiap semester</li>
                    <li>Indikator penilaian meliputi: mengajar, penelitian, pengabdian, dan penunjang</li>
                    <li>Hasil penilaian digunakan untuk kenaikan pangkat dan tunjangan</li>
                </ul>
                
                <h4>3. Pengembangan Karir</h4>
                <ul>
                    <li>Dosen didorong untuk melanjutkan studi S2 dan S3</li>
                    <li>Fakultas memberikan dukungan untuk studi lanjut</li>
                    <li>Dosen yang melanjutkan studi akan mendapat kemudahan dalam beban kerja</li>
                </ul>
                
                <h4>4. Tenaga Kependidikan</h4>
                <ul>
                    <li>Tenaga kependidikan wajib memberikan pelayanan prima</li>
                    <li>Jam kerja mengikuti ketentuan universitas</li>
                    <li>Tenaga kependidikan harus mengikuti pelatihan sesuai bidang kerja</li>
                </ul>',
                'kategori' => 'kepegawaian',
                'file_dokumen' => null,
                'is_active' => true,
            ],
            [
                'judul' => 'Kebijakan Keuangan',
                'deskripsi' => 'Kebijakan terkait pengelolaan keuangan fakultas',
                'isi' => '<h3>Kebijakan Keuangan Fakultas Teknik</h3>
                <p>Fakultas Teknik memiliki kebijakan keuangan yang transparan dan akuntabel:</p>
                
                <h4>1. Sumber Pendanaan</h4>
                <ul>
                    <li>Dana BOS untuk operasional fakultas</li>
                    <li>Dana penelitian dan pengabdian masyarakat</li>
                    <li>Dana kemahasiswaan untuk kegiatan mahasiswa</li>
                    <li>Dana kerjasama dengan pihak eksternal</li>
                </ul>
                
                <h4>2. Penggunaan Dana</h4>
                <ul>
                    <li>Dana digunakan sesuai dengan perencanaan tahunan</li>
                    <li>Setiap penggunaan dana harus didukung dengan bukti pengeluaran</li>
                    <li>Penggunaan dana di atas batas tertentu memerlukan persetujuan pimpinan</li>
                </ul>
                
                <h4>3. Pertanggungjawaban</h4>
                <ul>
                    <li>Laporan keuangan disusun setiap semester</li>
                    <li>Laporan keuangan diaudit oleh auditor internal</li>
                    <li>Laporan keuangan dipublikasikan secara transparan</li>
                </ul>
                
                <h4>4. Pengawasan</h4>
                <ul>
                    <li>Pengawasan keuangan dilakukan oleh tim pengawas internal</li>
                    <li>Setiap penyimpangan akan ditindak sesuai ketentuan</li>
                    <li>Masyarakat dapat melaporkan dugaan penyimpangan keuangan</li>
                </ul>',
                'kategori' => 'keuangan',
                'file_dokumen' => null,
                'is_active' => true,
            ],
            [
                'judul' => 'Kebijakan Umum Fakultas',
                'deskripsi' => 'Kebijakan umum yang berlaku di Fakultas Teknik',
                'isi' => '<h3>Kebijakan Umum Fakultas Teknik</h3>
                <p>Fakultas Teknik memiliki beberapa kebijakan umum yang harus dipatuhi oleh seluruh civitas akademika:</p>
                
                <h4>1. Tata Tertib</h4>
                <ul>
                    <li>Setiap civitas akademika wajib mematuhi tata tertib fakultas</li>
                    <li>Pelanggaran tata tertib akan mendapat sanksi sesuai tingkat pelanggaran</li>
                    <li>Tata tertib berlaku di dalam dan di luar kampus</li>
                </ul>
                
                <h4>2. Keamanan dan Ketertiban</h4>
                <ul>
                    <li>Setiap orang yang masuk ke area fakultas wajib menunjukkan identitas</li>
                    <li>Kendaraan harus diparkir di tempat yang ditentukan</li>
                    <li>Dilarang membawa senjata atau barang berbahaya ke kampus</li>
                </ul>
                
                <h4>3. Kebersihan dan Lingkungan</h4>
                <ul>
                    <li>Setiap civitas akademika wajib menjaga kebersihan lingkungan</li>
                    <li>Sampah harus dibuang di tempat yang ditentukan</li>
                    <li>Dilarang merokok di area dalam gedung</li>
                </ul>
                
                <h4>4. Penggunaan Fasilitas</h4>
                <ul>
                    <li>Fasilitas fakultas dapat digunakan sesuai ketentuan</li>
                    <li>Penggunaan fasilitas untuk kegiatan eksternal memerlukan izin</li>
                    <li>Kerusakan fasilitas akibat kelalaian pengguna akan ditanggung pengguna</li>
                </ul>',
                'kategori' => 'umum',
                'file_dokumen' => null,
                'is_active' => true,
            ],
        ];

        foreach ($kebijakans as $kebijakan) {
            Kebijakan::create($kebijakan);
        }
    }
} 