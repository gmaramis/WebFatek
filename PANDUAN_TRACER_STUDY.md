# PANDUAN TRACER STUDY - FAKULTAS TEKNIK UNIMA

## Deskripsi

Tracer Study adalah sistem survey online untuk melacak status dan kepuasan lulusan Fakultas Teknik UNIMA. Sistem ini membantu mengumpulkan data tentang status pekerjaan, kesesuaian bidang, dan feedback untuk pengembangan kurikulum.

## Fitur Utama

### 1. Halaman Informasi Tracer Study (`/tracer-study`)

-   **Deskripsi**: Halaman landing page yang menjelaskan tentang tracer study
-   **Fitur**:
    -   Hero section dengan call-to-action
    -   Penjelasan manfaat tracer study
    -   Statistik real-time (jika ada data)
    -   Link ke form survey

### 2. Form Survey (`/tracer-study/form`)

-   **Deskripsi**: Form lengkap untuk mengisi data tracer study
-   **Fitur**:
    -   Progress bar real-time
    -   Form yang responsif dan user-friendly
    -   Validasi client-side dan server-side
    -   Conditional fields berdasarkan status pekerjaan
    -   Rating system untuk kepuasan

### 3. Backend System

-   **Model**: `TracerStudy`
-   **Controller**: `TracerStudyController`
-   **Database**: Tabel `tracer_studies`

## Struktur Database

### Tabel: `tracer_studies`

| Kolom                        | Tipe          | Deskripsi                                                   |
| ---------------------------- | ------------- | ----------------------------------------------------------- |
| `id`                         | bigint        | Primary key                                                 |
| `nama_lengkap`               | varchar(255)  | Nama lengkap lulusan                                        |
| `nim`                        | varchar(255)  | NIM (unique)                                                |
| `program_studi`              | varchar(255)  | Program studi                                               |
| `tahun_lulus`                | year          | Tahun lulus                                                 |
| `email`                      | varchar(255)  | Email lulusan                                               |
| `telepon`                    | varchar(255)  | Nomor telepon                                               |
| `ipk`                        | decimal(3,2)  | IPK (opsional)                                              |
| `alamat`                     | text          | Alamat (opsional)                                           |
| `status_pekerjaan`           | enum          | Status: bekerja/wirausaha/belum_bekerja/lanjut_studi        |
| `waktu_tunggu_kerja`         | int           | Waktu tunggu kerja dalam bulan                              |
| `nama_perusahaan`            | varchar(255)  | Nama perusahaan/instansi                                    |
| `jabatan`                    | varchar(255)  | Jabatan saat ini                                            |
| `gaji`                       | decimal(10,2) | Gaji dalam juta rupiah                                      |
| `kesesuaian_bidang`          | enum          | Kesesuaian: sangat_sesuai/sesuai/kurang_sesuai/tidak_sesuai |
| `jenis_perusahaan`           | varchar(255)  | Jenis perusahaan                                            |
| `bidang_pekerjaan`           | varchar(255)  | Bidang pekerjaan                                            |
| `sumber_informasi_lowongan`  | varchar(255)  | Sumber informasi lowongan                                   |
| `metode_mencari_kerja`       | varchar(255)  | Metode mencari kerja                                        |
| `lamanya_mencari_kerja`      | int           | Lamanya mencari kerja dalam bulan                           |
| `jumlah_lamaran`             | int           | Jumlah lamaran yang dikirim                                 |
| `jumlah_wawancara`           | int           | Jumlah wawancara yang diikuti                               |
| `alasan_belum_bekerja`       | text          | Alasan belum bekerja                                        |
| `rencana_kedepan`            | text          | Rencana kedepan                                             |
| `kompetensi_yang_dibutuhkan` | text          | Kompetensi yang dibutuhkan dunia kerja                      |
| `kompetensi_yang_dimiliki`   | text          | Kompetensi yang dimiliki                                    |
| `kepuasan_kurikulum`         | int           | Rating kepuasan kurikulum (1-5)                             |
| `relevansi_ilmu`             | int           | Rating relevansi ilmu (1-5)                                 |
| `saran_pengembangan`         | text          | Saran untuk pengembangan fakultas                           |
| `saran_untuk_almamater`      | text          | Saran untuk almamater                                       |
| `status`                     | enum          | Status: aktif/nonaktif                                      |
| `created_at`                 | timestamp     | Waktu dibuat                                                |
| `updated_at`                 | timestamp     | Waktu diupdate                                              |

## Routes

```php
// Tracer Study Routes
Route::get('/tracer-study', [TracerStudyController::class, 'index'])->name('tracer-study');
Route::get('/tracer-study/form', [TracerStudyController::class, 'form'])->name('tracer-study.form');
Route::post('/tracer-study/store', [TracerStudyController::class, 'store'])->name('tracer-study.store');
Route::get('/tracer-study/statistics', [TracerStudyController::class, 'statistics'])->name('tracer-study.statistics');
Route::get('/tracer-study/{id}', [TracerStudyController::class, 'show'])->name('tracer-study.show');
```

## Controller Methods

### 1. `index()`

-   **Tujuan**: Menampilkan halaman landing tracer study
-   **Return**: View `pages.tracer-study`

### 2. `form()`

-   **Tujuan**: Menampilkan form survey
-   **Return**: View `pages.tracer-study-form`

### 3. `store(Request $request)`

-   **Tujuan**: Menyimpan data survey
-   **Validasi**: Validasi lengkap untuk semua field
-   **Return**: JSON response

### 4. `statistics()`

-   **Tujuan**: Mengambil statistik data tracer study
-   **Return**: JSON dengan statistik

### 5. `show($id)`

-   **Tujuan**: Menampilkan detail data tracer study
-   **Return**: View dengan detail data

## Validasi

### Field Wajib

-   `nama_lengkap`: required, string, max 255
-   `nim`: required, string, max 20, unique
-   `program_studi`: required, string, max 100
-   `tahun_lulus`: required, integer, min 2010, max tahun sekarang+1
-   `email`: required, email, max 255
-   `telepon`: required, string, max 20
-   `status_pekerjaan`: required, enum

### Field Opsional

-   `ipk`: numeric, min 0, max 4
-   `alamat`: string, max 500
-   `waktu_tunggu_kerja`: integer, min 0, max 60
-   `gaji`: numeric, min 0, max 100
-   `kepuasan_kurikulum`: integer, min 1, max 5
-   `relevansi_ilmu`: integer, min 1, max 5

## Fitur Frontend

### 1. Progress Bar

-   Menampilkan progress pengisian form real-time
-   Persentase berdasarkan field yang sudah diisi

### 2. Conditional Fields

-   Field muncul/hilang berdasarkan status pekerjaan
-   Logic JavaScript untuk toggle visibility

### 3. Rating System

-   Radio button dengan emoji untuk rating
-   Visual feedback saat dipilih

### 4. Form Validation

-   Client-side validation dengan JavaScript
-   Server-side validation dengan Laravel
-   Error handling dan feedback

### 5. Responsive Design

-   Mobile-friendly layout
-   Grid system yang adaptif
-   Touch-friendly interface

## Data Contoh

Seeder sudah menyediakan 10 data contoh dengan variasi:

-   Status pekerjaan: bekerja, wirausaha, belum bekerja, lanjut studi
-   Program studi: semua jurusan teknik
-   Tahun lulus: 2022-2023
-   Rating kepuasan: 3-5

## Cara Penggunaan

### 1. Akses Form

```
http://localhost:8000/tracer-study/form
```

### 2. Isi Data

-   Isi semua field wajib
-   Field opsional bisa dikosongkan
-   Progress bar akan menunjukkan kemajuan

### 3. Submit

-   Klik tombol "Kirim Survey Tracer Study"
-   Data akan disimpan ke database
-   Feedback sukses akan ditampilkan

### 4. Lihat Statistik

-   Klik tombol "Lihat Statistik" di halaman utama
-   Statistik real-time akan ditampilkan

## Keamanan

### 1. CSRF Protection

-   Token CSRF otomatis di semua form
-   Validasi server-side

### 2. Data Validation

-   Validasi input yang ketat
-   Sanitasi data sebelum disimpan

### 3. Rate Limiting

-   Bisa ditambahkan rate limiting untuk mencegah spam

## Monitoring

### 1. Log Activity

-   Semua submission dicatat di log
-   Error handling yang lengkap

### 2. Data Analytics

-   Statistik real-time
-   Export data untuk analisis lanjutan

## Maintenance

### 1. Backup Data

-   Backup database secara berkala
-   Export data tracer study

### 2. Update Form

-   Form bisa diupdate sesuai kebutuhan
-   Field baru bisa ditambahkan

### 3. Data Cleanup

-   Hapus data lama jika diperlukan
-   Archive data untuk analisis historis

## Troubleshooting

### 1. Form Tidak Submit

-   Cek koneksi internet
-   Pastikan semua field wajib terisi
-   Cek console browser untuk error JavaScript

### 2. Data Tidak Tersimpan

-   Cek log Laravel untuk error
-   Pastikan database connection
-   Cek validasi server-side

### 3. Statistik Tidak Muncul

-   Pastikan ada data di database
-   Cek route `/tracer-study/statistics`
-   Cek JavaScript console

## Pengembangan Lanjutan

### 1. Fitur yang Bisa Ditambahkan

-   Export data ke Excel/PDF
-   Dashboard admin untuk melihat data
-   Email notification
-   SMS reminder
-   Integration dengan sistem akademik

### 2. Analytics

-   Chart dan grafik statistik
-   Trend analysis
-   Comparison antar tahun
-   Program studi comparison

### 3. Automation

-   Auto-reminder untuk alumni
-   Scheduled reports
-   Data backup automation
-   Email campaign

## Kontak Support

Jika ada masalah atau pertanyaan tentang sistem Tracer Study, silakan hubungi:

-   Email: admin@fatek.unima.ac.id
-   Phone: +62 431 123456
-   WhatsApp: +62 812-3456-7890
