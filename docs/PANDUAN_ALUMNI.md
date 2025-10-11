# PANDUAN HALAMAN ALUMNI FT UNIMA

## Deskripsi

Halaman Alumni FT UNIMA adalah halaman yang menampilkan informasi tentang jaringan alumni, statistik, alumni berprestasi, dan form pendaftaran untuk alumni baru.

## Fitur yang Tersedia

### 1. Hero Section

-   **Judul Utama**: "Alumni FT UNIMA"
-   **Subtitle**: Deskripsi singkat tentang jaringan alumni
-   **Statistik Cepat**: Total alumni, tingkat penyerapan, perusahaan mitra, tahun pengalaman
-   **Desain**: Gradient orange dengan efek backdrop blur

### 2. Statistik Detail

-   **Total Alumni**: Menampilkan jumlah alumni yang terdaftar
-   **Tingkat Penyerapan**: Persentase alumni yang bekerja/wirausaha
-   **Perusahaan Mitra**: Jumlah perusahaan yang bermitra
-   **Tahun Pengalaman**: Pengalaman sejak berdirinya Fakultas Teknik
-   **Desain**: Card dengan icon dan hover effect

### 3. Alumni Berprestasi

-   **Data Dinamis**: Mengambil data dari database
-   **Informasi Lengkap**: Nama, program studi, tahun lulus, pekerjaan, perusahaan
-   **Prestasi**: Menampilkan prestasi yang telah dicapai
-   **Status Kerja**: Badge dengan warna berbeda untuk setiap status
-   **Fallback**: Pesan jika belum ada data alumni

### 4. Form Pendaftaran Alumni

-   **Field Wajib**: NIM, nama lengkap, program studi, tahun lulus, email
-   **Field Opsional**: Nomor telepon, pekerjaan, perusahaan, alamat
-   **Validasi**: Server-side validation dengan error handling
-   **Success Message**: Notifikasi berhasil setelah pendaftaran
-   **Newsletter**: Checkbox untuk menerima newsletter

### 5. Call to Action

-   **Daftar Sekarang**: Link ke form pendaftaran
-   **Hubungi Kami**: Link email untuk kontak

## Struktur Database

### Tabel: `alumnis`

```sql
- id (Primary Key)
- nim (Unique)
- nama_lengkap
- program_studi
- tahun_lulus
- email (Unique)
- nomor_telepon
- alamat
- pekerjaan
- perusahaan
- jabatan
- bidang_industri
- gaji
- status_kerja
- prestasi
- kontribusi
- foto
- is_active
- newsletter
- catatan
- created_at
- updated_at
```

## Program Studi yang Didukung

1. **ti** - Teknik Informatika
2. **ptik** - Pendidikan Teknik Informatika & Komputer
3. **ts** - Teknik Sipil
4. **tm** - Teknik Mesin
5. **te** - Teknik Elektro
6. **ars** - Arsitektur
7. **ptb** - Pendidikan Teknik Bangunan
8. **pkk** - Pendidikan Kesejahteraan Keluarga

## Status Kerja

1. **bekerja** - Bekerja
2. **wirausaha** - Wirausaha
3. **belum_bekerja** - Belum Bekerja
4. **lanjut_studi** - Lanjut Studi

## Bidang Industri

1. **teknologi** - Teknologi Informasi
2. **konstruksi** - Konstruksi & Real Estate
3. **manufaktur** - Manufaktur
4. **energi** - Energi & Pertambangan
5. **keuangan** - Keuangan & Perbankan
6. **pendidikan** - Pendidikan
7. **kesehatan** - Kesehatan
8. **pemerintahan** - Pemerintahan
9. **lainnya** - Lainnya

## Admin Panel (Filament)

### Resource: AlumniResource

-   **Lokasi**: `app/Filament/Resources/AlumniResource.php`
-   **Menu Group**: Content Management
-   **Icon**: Academic Cap

### Fitur Admin

1. **List View**: Tabel dengan filter dan search
2. **Create Form**: Form lengkap untuk menambah alumni
3. **Edit Form**: Form untuk mengedit data alumni
4. **Delete**: Hapus data alumni
5. **Bulk Actions**: Hapus multiple data

### Filter yang Tersedia

-   Program Studi
-   Status Kerja
-   Bidang Industri
-   Status Aktif
-   Newsletter

### Kolom Tabel

-   Foto (dengan default avatar)
-   NIM
-   Nama Lengkap
-   Program Studi (dengan badge warna)
-   Tahun Lulus
-   Status Kerja (dengan badge warna)
-   Perusahaan
-   Gaji (diformat)
-   Status Aktif
-   Newsletter
-   Terakhir Diupdate

## Controller

### AlumniController

-   **Lokasi**: `app/Http/Controllers/AlumniController.php`
-   **Method**: `index()` - Menampilkan halaman alumni
-   **Method**: `store()` - Menyimpan data pendaftaran alumni

### Data yang Dikirim ke View

-   `$totalAlumni` - Total alumni aktif
-   `$tingkatPenyerapan` - Persentase tingkat penyerapan kerja
-   `$alumniBerprestasi` - Data alumni yang memiliki prestasi
-   `$alumniByProgram` - Statistik alumni per program studi
-   `$alumniByIndustri` - Statistik alumni per bidang industri

## Routes

### Web Routes

```php
Route::get('/alumni', [AlumniController::class, 'index']);
Route::post('/alumni/daftar', [AlumniController::class, 'store'])->name('alumni.store');
```

## Model

### Alumni Model

-   **Lokasi**: `app/Models/Alumni.php`
-   **Fillable**: Semua field yang dapat diisi
-   **Casts**: Gaji (decimal), is_active (boolean), newsletter (boolean), tahun_lulus (integer)

### Accessor

-   `nama_lengkap` - Format nama dengan ucwords
-   `program_studi_formatted` - Format program studi yang readable
-   `status_kerja_formatted` - Format status kerja yang readable
-   `gaji_formatted` - Format gaji dengan currency
-   `foto_url` - URL foto dengan default avatar
-   `status_label` - Label status aktif
-   `status_color` - Warna status aktif

### Scope

-   `active()` - Filter alumni yang aktif
-   `byProgramStudi()` - Filter berdasarkan program studi
-   `byTahunLulus()` - Filter berdasarkan tahun lulus

## Seeder

### AlumniSeeder

-   **Lokasi**: `database/seeders/AlumniSeeder.php`
-   **Data**: 10 contoh alumni dengan data lengkap
-   **Karakteristik**: Data realistis dengan berbagai program studi dan status kerja

## Validasi Form

### Server-side Validation

```php
'nim' => 'required|unique:alumnis,nim'
'nama_lengkap' => 'required|string|max:255'
'program_studi' => 'required|string'
'tahun_lulus' => 'required|integer|min:1990|max:' . date('Y')
'email' => 'required|email|unique:alumnis,email'
'nomor_telepon' => 'nullable|string'
'alamat' => 'nullable|string'
'pekerjaan' => 'nullable|string'
'perusahaan' => 'nullable|string'
```

## Styling

### CSS Classes yang Digunakan

-   **Tailwind CSS**: Framework utama
-   **Gradient**: Orange gradient untuk hero section
-   **Cards**: White cards dengan shadow dan hover effect
-   **Badges**: Warna berbeda untuk setiap kategori
-   **Forms**: Styled input dengan focus ring orange
-   **Buttons**: Orange buttons dengan hover effect

### Responsive Design

-   **Mobile First**: Design responsive untuk semua ukuran layar
-   **Grid System**: CSS Grid untuk layout
-   **Flexbox**: Untuk alignment dan spacing

## JavaScript

### AOS (Animate On Scroll)

-   **Library**: AOS untuk animasi scroll
-   **Effects**: fade-up, fade-left, fade-right
-   **Delays**: Staggered animation delays

## File yang Dibuat/Dimodifikasi

### Dibuat Baru

1. `app/Models/Alumni.php`
2. `app/Http/Controllers/AlumniController.php`
3. `app/Filament/Resources/AlumniResource.php`
4. `database/migrations/2025_06_29_004313_create_alumnis_table.php`
5. `database/seeders/AlumniSeeder.php`
6. `PANDUAN_ALUMNI.md`

### Dimodifikasi

1. `resources/views/pages/alumni.blade.php` - Halaman frontend
2. `routes/web.php` - Route untuk alumni
3. `database/seeders/DatabaseSeeder.php` - Menambahkan AlumniSeeder

## Cara Penggunaan

### Untuk Admin

1. Akses admin panel di `/admin`
2. Pilih menu "Alumni" di grup "Content Management"
3. Kelola data alumni (tambah, edit, hapus)
4. Verifikasi pendaftaran alumni baru (set is_active = true)

### Untuk Alumni

1. Kunjungi halaman `/alumni`
2. Lihat statistik dan alumni berprestasi
3. Isi form pendaftaran jika belum terdaftar
4. Tunggu verifikasi dari admin

### Untuk Developer

1. Jalankan migrasi: `php artisan migrate`
2. Jalankan seeder: `php artisan db:seed --class=AlumniSeeder`
3. Clear cache: `php artisan optimize:clear`
4. Akses halaman untuk testing

## Maintenance

### Backup Data

-   Backup tabel `alumnis` secara berkala
-   Backup file foto alumni di storage

### Monitoring

-   Monitor jumlah pendaftaran alumni baru
-   Monitor tingkat penyerapan kerja
-   Monitor aktivitas admin panel

### Updates

-   Update data alumni secara berkala
-   Update statistik dan informasi
-   Update foto dan prestasi alumni

## Troubleshooting

### Masalah Umum

1. **Form tidak berfungsi**: Cek CSRF token dan route
2. **Foto tidak muncul**: Cek storage link dan permission
3. **Data tidak muncul**: Cek seeder dan migration
4. **Error validation**: Cek field required dan unique

### Solusi

1. Clear cache: `php artisan optimize:clear`
2. Re-run migration: `php artisan migrate:fresh --seed`
3. Check storage link: `php artisan storage:link`
4. Check permission: `chmod -R 775 storage`

## Kontak Support

-   **Email**: alumni@ft.unima.ac.id
-   **Admin Panel**: `/admin`
-   **Documentation**: Lihat file ini dan komentar kode
