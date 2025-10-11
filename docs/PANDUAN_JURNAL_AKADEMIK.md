# PANDUAN MENU ADMIN JURNAL AKADEMIK

## Deskripsi

Menu **Jurnal Akademik** di grup **Unit** memungkinkan admin untuk mengelola jurnal-jurnal akademik dari setiap program studi/jurusan di Fakultas Teknik UNIMA.

## Lokasi Menu

-   **Grup**: Unit
-   **Icon**: 📖 (book-open)
-   **Label**: Jurnal Akademik
-   **URL Admin**: `/admin/jurnals`

## Fitur yang Tersedia

### 1. Daftar Jurnal (List)

-   Menampilkan semua jurnal dalam bentuk tabel
-   **Kolom yang ditampilkan**:
    -   Judul Jurnal
    -   Program Studi (dengan badge warna)
    -   ISSN
    -   Periode Terbit
    -   Urutan
    -   Status (Aktif/Nonaktif)
    -   Terakhir Diupdate

### 2. Filter

-   **Program Studi**: Filter berdasarkan jurusan
-   **Status**: Filter berdasarkan status aktif/nonaktif

### 3. Tambah Jurnal Baru

Form input dengan field:

-   **Informasi Dasar Jurnal**:

    -   Judul Jurnal (wajib)
    -   Program Studi/Jurusan (wajib)
    -   ISSN (opsional)
    -   Penerbit (opsional)

-   **Informasi Publikasi**:

    -   Periode Terbit (2x, 3x, 4x, 6x, 12x per tahun)
    -   Website Jurnal (URL)
    -   Email Jurnal

-   **Deskripsi dan Ruang Lingkup**:

    -   Deskripsi Jurnal
    -   Ruang Lingkup (bidang penelitian yang diterima)
    -   Panduan Penulisan

-   **Pengaturan**:
    -   Status (Aktif/Nonaktif)
    -   Urutan Tampilan

### 4. Edit Jurnal

-   Mengubah semua informasi jurnal yang sudah ada
-   Interface yang sama dengan form tambah

### 5. Hapus Jurnal

-   Menghapus jurnal dari database
-   Konfirmasi sebelum penghapusan

## Program Studi yang Didukung

1. **Teknik Informatika** (Warna: Biru)

    - Jurnal Sistem Informasi
    - Jurnal Artificial Intelligence
    - Jurnal Web Development

2. **Teknik Sipil** (Warna: Hijau)

    - Jurnal Konstruksi
    - Jurnal Struktur
    - Jurnal Transportasi

3. **Teknik Elektro** (Warna: Kuning)

    - Jurnal Elektronika
    - Jurnal Energi Terbarukan
    - Jurnal Otomasi

4. **Teknik Mesin** (Warna: Merah)

    - Jurnal Manufaktur
    - Jurnal Termodinamika
    - Jurnal Material

5. **Arsitektur** (Warna: Ungu)

    - Jurnal Arsitektur
    - Jurnal Urban Planning
    - Jurnal Interior Design

6. **Teknik Bangunan** (Warna: Indigo)
    - Jurnal Teknik Bangunan

## Cara Penggunaan

### Menambah Jurnal Baru

1. Klik tombol **"Create Jurnal Akademik"**
2. Isi form dengan informasi lengkap
3. Klik **"Create"** untuk menyimpan

### Mengedit Jurnal

1. Klik icon pensil pada baris jurnal yang ingin diedit
2. Ubah informasi yang diperlukan
3. Klik **"Save"** untuk menyimpan perubahan

### Menghapus Jurnal

1. Klik icon tempat sampah pada baris jurnal yang ingin dihapus
2. Konfirmasi penghapusan
3. Jurnal akan dihapus dari database

### Mengatur Urutan Tampilan

-   Gunakan field **"Urutan Tampilan"** untuk mengatur posisi jurnal
-   Angka kecil = tampil di atas
-   Contoh: 1 = pertama, 2 = kedua, dst.

## Integrasi dengan Frontend

### Halaman P3KI

-   Data jurnal ditampilkan di halaman `/p3ki`
-   Dikelompokkan berdasarkan program studi
-   Menampilkan informasi ISSN, periode terbit, dan link website
-   Warna berbeda untuk setiap program studi

### Statistik Publikasi

-   Total jurnal terpublikasi: 150+
-   Peneliti aktif: 25+
-   Program studi: 8
-   Kolaborasi: 50+

## Data Contoh

Seeder sudah mengisi 15 jurnal contoh dengan informasi lengkap:

-   3 jurnal per program studi (kecuali Teknik Bangunan)
-   ISSN unik untuk setiap jurnal
-   Deskripsi dan ruang lingkup yang detail
-   Panduan penulisan yang informatif

## Catatan Penting

1. **Status Aktif**: Hanya jurnal dengan status "Aktif" yang ditampilkan di frontend
2. **Urutan**: Jurnal diurutkan berdasarkan field "urutan" kemudian "created_at"
3. **Website**: Jika website tidak diisi, akan ditampilkan "Website belum tersedia"
4. **ISSN**: Field opsional, jika kosong akan ditampilkan "Belum ada"
5. **Periode Terbit**: Menentukan frekuensi publikasi jurnal

## Troubleshooting

### Jurnal tidak muncul di frontend

-   Pastikan status jurnal = "Aktif"
-   Periksa apakah ada error di log Laravel
-   Clear cache dengan `php artisan optimize:clear`

### Error saat menyimpan

-   Pastikan semua field wajib terisi
-   Periksa format URL website (harus valid)
-   Periksa format email (harus valid)

### Urutan tidak sesuai

-   Pastikan field "urutan" diisi dengan angka
-   Clear cache jika perubahan tidak langsung terlihat

## Backup dan Restore

### Backup Data

```bash
php artisan tinker
>>> App\Models\Jurnal::all()->toArray();
```

### Restore Data

```bash
php artisan db:seed --class=JurnalSeeder
```

## Kontak Support

Jika mengalami masalah dengan menu Jurnal Akademik, silakan hubungi:

-   Email: admin@ft.unima.ac.id
-   WhatsApp: +62-xxx-xxx-xxxx
-   Jam kerja: Senin-Jumat 08:00-16:00
