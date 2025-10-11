# PANDUAN CMS ALUMNI FATEK UNIMA

## Deskripsi

CMS (Content Management System) Alumni adalah sistem untuk mengelola konten halaman Alumni Fatek UNIMA melalui admin panel Filament. Admin dapat mengubah judul, deskripsi, statistik, testimonial, dan konten lainnya tanpa perlu mengubah kode.

## Fitur CMS

### 1. Hero Section

-   **Judul Utama**: "Alumni Fatek UNIMA"
-   **Subtitle**: Deskripsi singkat tentang jaringan alumni
-   **Deskripsi CTA**: Teks untuk call to action

### 2. Statistik

-   **Total Alumni**: Jumlah alumni yang ditampilkan
-   **Tingkat Penyerapan**: Persentase tingkat penyerapan kerja
-   **Perusahaan Mitra**: Jumlah perusahaan mitra
-   **Tahun Pengalaman**: Tahun pengalaman sejak berdirinya Fatek

### 3. Testimonial

-   **Judul Section**: "Testimonial Alumni"
-   **Deskripsi Section**: Penjelasan tentang testimonial
-   **Testimonial 1-3**: Nama, jabatan, dan isi testimonial

### 4. Galeri Kegiatan

-   **Judul Section**: "Galeri Kegiatan Alumni"
-   **Deskripsi Section**: Penjelasan tentang galeri
-   **Kegiatan 1-6**: Judul, deskripsi, dan kategori kegiatan

### 5. Jaringan Alumni

-   **Judul Section**: "Jaringan Alumni"
-   **Deskripsi Section**: Penjelasan tentang jaringan
-   **Ikatan Alumni**: Nama dan jumlah anggota ikatan

### 6. Kontribusi Alumni

-   **Judul Section**: "Kontribusi Alumni"
-   **Deskripsi Section**: Penjelasan tentang kontribusi
-   **Kontribusi 1-3**: Judul dan deskripsi kontribusi

## Struktur Database

### Tabel: `alumni_contents`

```sql
- id (Primary Key)
- section (String) - Bagian halaman (hero, statistik, dll)
- key (String) - Identifier unik konten
- value (Text) - Nilai konten
- type (String) - Tipe konten (text, number, image, html, url)
- image_url (String, Nullable) - URL gambar jika tipe image
- urutan (Integer) - Urutan tampilan
- is_active (Boolean) - Status aktif
- catatan (Text, Nullable) - Catatan admin
- created_at (Timestamp)
- updated_at (Timestamp)
```

## Section yang Didukung

### 1. Hero Section

-   **Key**: `judul_utama`, `subtitle`, `deskripsi`
-   **Tipe**: text
-   **Fungsi**: Konten untuk hero section

### 2. Statistik

-   **Key**: `total_alumni`, `tingkat_penyerapan`, `perusahaan_mitra`, `tahun_pengalaman`
-   **Tipe**: text
-   **Fungsi**: Statistik yang ditampilkan di hero dan section statistik

### 3. Testimonial

-   **Key**: `judul_section`, `deskripsi_section`, `testimonial_1_nama`, `testimonial_1_jabatan`, `testimonial_1_isi`, dll
-   **Tipe**: text
-   **Fungsi**: Konten testimonial alumni

### 4. Galeri Kegiatan

-   **Key**: `judul_section`, `deskripsi_section`, `kegiatan_1_judul`, `kegiatan_1_deskripsi`, `kegiatan_1_kategori`, dll
-   **Tipe**: text
-   **Fungsi**: Konten galeri kegiatan alumni

### 5. Jaringan Alumni

-   **Key**: `judul_section`, `deskripsi_section`, `ikatan_1_nama`, `ikatan_1_anggota`, dll
-   **Tipe**: text
-   **Fungsi**: Konten jaringan alumni

### 6. Kontribusi Alumni

-   **Key**: `judul_section`, `deskripsi_section`, `kontribusi_1_judul`, `kontribusi_1_deskripsi`, dll
-   **Tipe**: text
-   **Fungsi**: Konten kontribusi alumni

## Tipe Konten

### 1. Text

-   **Deskripsi**: Teks biasa
-   **Penggunaan**: Judul, deskripsi, nama, dll

### 2. Number

-   **Deskripsi**: Angka
-   **Penggunaan**: Statistik, urutan, dll

### 3. Image

-   **Deskripsi**: Gambar
-   **Penggunaan**: Foto kegiatan, logo, dll

### 4. HTML

-   **Deskripsi**: HTML markup
-   **Penggunaan**: Konten dengan formatting

### 5. URL

-   **Deskripsi**: Link/URL
-   **Penggunaan**: Link eksternal, dll

## Admin Panel (Filament)

### Resource: AlumniContentResource

-   **Lokasi**: `app/Filament/Resources/AlumniContentResource.php`
-   **Menu Group**: Content Management
-   **Menu Label**: CMS Alumni
-   **Icon**: Cog 6 Tooth

### Fitur Admin

1. **List View**: Tabel dengan filter dan search
2. **Create Form**: Form lengkap untuk menambah konten
3. **Edit Form**: Form untuk mengedit konten
4. **Delete**: Hapus konten
5. **Bulk Actions**: Hapus multiple konten

### Filter yang Tersedia

-   Section (Hero, Statistik, Testimonial, dll)
-   Tipe Konten (Text, Number, Image, HTML, URL)
-   Status Aktif

### Kolom Tabel

-   Section (dengan badge warna)
-   Key (identifier)
-   Konten (nilai konten)
-   Tipe (dengan badge warna)
-   Urutan
-   Status Aktif
-   Terakhir Diupdate

## Model

### AlumniContent Model

-   **Lokasi**: `app/Models/AlumniContent.php`
-   **Fillable**: Semua field yang dapat diisi
-   **Casts**: is_active (boolean), urutan (integer)

### Method Utama

-   `getContent($section, $key, $default)` - Ambil konten berdasarkan section dan key
-   `getSectionContent($section)` - Ambil semua konten dalam section
-   `getStatistik()` - Ambil data statistik
-   `getTestimonial()` - Ambil data testimonial
-   `getGaleriKegiatan()` - Ambil data galeri kegiatan
-   `getJaringanAlumni()` - Ambil data jaringan alumni

### Scope

-   `active()` - Filter konten yang aktif
-   `bySection()` - Filter berdasarkan section
-   `ordered()` - Urutkan berdasarkan urutan

### Accessor

-   `status_label` - Label status aktif
-   `status_color` - Warna status aktif
-   `section_label` - Label section yang readable
-   `type_label` - Label tipe yang readable

## Seeder

### AlumniContentSeeder

-   **Lokasi**: `database/seeders/AlumniContentSeeder.php`
-   **Data**: 40+ konten contoh untuk semua section
-   **Karakteristik**: Data lengkap dan realistis

### Data yang Diisi

-   Hero Section: 3 konten
-   Statistik: 4 konten
-   Testimonial: 11 konten
-   Galeri Kegiatan: 11 konten
-   Jaringan Alumni: 6 konten
-   Kontribusi Alumni: 8 konten

## Controller

### AlumniController (Updated)

-   **Lokasi**: `app/Http/Controllers/AlumniController.php`
-   **Method**: `index()` - Menampilkan halaman alumni dengan konten CMS

### Data yang Dikirim ke View

-   `$cmsContent` - Array konten dari CMS untuk semua section

## Cara Penggunaan

### Untuk Admin

1. Akses admin panel di `/admin`
2. Pilih menu "CMS Alumni" di grup "Content Management"
3. Lihat daftar konten yang tersedia
4. Edit konten yang ingin diubah
5. Simpan perubahan

### Untuk Developer

1. Jalankan migrasi: `php artisan migrate`
2. Jalankan seeder: `php artisan db:seed --class=AlumniContentSeeder`
3. Clear cache: `php artisan optimize:clear`
4. Akses admin panel untuk mengelola konten

## Contoh Penggunaan di View

### Menggunakan Konten CMS

```php
// Di controller
$cmsContent = [
    'hero' => AlumniContent::getSectionContent('hero'),
    'statistik' => AlumniContent::getSectionContent('statistik'),
];

// Di view
{{ $cmsContent['hero']['judul_utama']->value ?? 'Alumni Fatek UNIMA' }}
{{ $cmsContent['statistik']['total_alumni']->value ?? '5000+' }}
```

### Fallback Value

```php
// Jika konten tidak ada, gunakan nilai default
{{ $cmsContent['hero']['judul_utama']->value ?? 'Alumni Fatek UNIMA' }}
```

## Maintenance

### Backup Data

-   Backup tabel `alumni_contents` secara berkala
-   Backup file gambar di storage/alumni-content

### Monitoring

-   Monitor perubahan konten melalui admin panel
-   Monitor aktivitas admin dalam mengelola konten

### Updates

-   Update konten secara berkala
-   Tambah section baru jika diperlukan
-   Backup sebelum melakukan perubahan besar

## Troubleshooting

### Masalah Umum

1. **Konten tidak muncul**: Cek status is_active
2. **Gambar tidak muncul**: Cek storage link dan permission
3. **Data tidak muncul**: Cek seeder dan migration
4. **Error di view**: Cek key yang digunakan

### Solusi

1. Clear cache: `php artisan optimize:clear`
2. Re-run migration: `php artisan migrate:fresh --seed`
3. Check storage link: `php artisan storage:link`
4. Check permission: `chmod -R 775 storage`

## Keuntungan CMS

### 1. Fleksibilitas

-   Admin dapat mengubah konten tanpa coding
-   Konten dapat diupdate secara real-time
-   Tidak perlu deploy ulang untuk perubahan konten

### 2. User-Friendly

-   Interface admin yang mudah digunakan
-   Form yang intuitif
-   Preview konten sebelum publish

### 3. Scalability

-   Mudah menambah section baru
-   Mudah menambah tipe konten baru
-   Struktur database yang fleksibel

### 4. Security

-   Validasi input yang ketat
-   Access control melalui admin panel
-   Backup data yang mudah

## Kontak Support

-   **Email**: admin@fatek.unima.ac.id
-   **Admin Panel**: `/admin`
-   **Documentation**: Lihat file ini dan komentar kode
