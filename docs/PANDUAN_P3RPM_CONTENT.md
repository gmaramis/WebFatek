# PANDUAN MENU ADMIN P3RPM CONTENT

## Deskripsi

Menu **P3RPM Content** di grup **Unit** memungkinkan admin untuk mengelola konten dinamis halaman Ruang Kolaborasi (P3RPM) FT UNIMA.

## Lokasi Menu

-   **Grup**: Unit
-   **Icon**: ⚙️ (cog-6-tooth)
-   **Label**: P3RPM Content
-   **URL Admin**: `/admin/p3rpm-contents`

## Fitur yang Tersedia

### 1. Daftar Konten (List)

-   Menampilkan semua konten P3RPM dalam bentuk tabel
-   **Kolom yang ditampilkan**:
    -   Bagian (dengan badge warna)
    -   Judul
    -   Konten (preview)
    -   Urutan
    -   Warna
    -   Status (Aktif/Nonaktif)
    -   Terakhir Diupdate

### 2. Filter

-   **Bagian**: Filter berdasarkan section halaman
-   **Status**: Filter berdasarkan status aktif/nonaktif

### 3. Tambah Konten Baru

Form input dengan field:

-   **Informasi Dasar**:

    -   Bagian Halaman (wajib)
    -   Judul (opsional)
    -   Sub Judul (opsional)

-   **Konten**:

    -   Konten Utama (wajib)
    -   Deskripsi Tambahan (opsional)

-   **Tampilan**:

    -   Gambar (opsional)
    -   Icon Heroicon (opsional)
    -   Warna (opsional)

-   **Pengaturan**:
    -   Urutan (default: 1)
    -   Status Aktif (default: true)

### 4. Edit Konten

-   Mengubah semua informasi konten yang sudah ada
-   Interface yang sama dengan form tambah

### 5. Hapus Konten

-   Menghapus konten dari database
-   Konfirmasi sebelum penghapusan

## Bagian Halaman yang Dikelola

### 1. **Hero Section**

-   Judul utama: "P3RPM"
-   Subtitle: Deskripsi singkat
-   Content: Tagline atau slogan
-   Warna: Indigo

### 2. **Deskripsi P3RPM**

-   Judul: Nama lengkap P3RPM
-   Content: Deskripsi lengkap tentang P3RPM
-   Description: Informasi tambahan
-   Warna: Blue

### 3. **Visi**

-   Title: "Visi"
-   Content: Visi P3RPM FT
-   Icon: Check circle
-   Warna: Green

### 4. **Misi**

-   Title: "Misi"
-   Content: Misi utama P3RPM
-   Description: Daftar misi dalam format list
-   Icon: Bolt
-   Warna: Blue

### 5. **Program Unggulan**

-   Title: Nama program (Penyusunan Proposal, Kolaborasi Riset, Pengabdian Masyarakat)
-   Content: Deskripsi program
-   Icon: Document, Users, Building
-   Warna: Purple, Green, Orange

### 6. **Skema Pendanaan**

-   Title: Nama skema (DRTPM, BRIN, Kompetisi Internasional, Skema Lainnya)
-   Content: Deskripsi skema
-   Icon: Currency, Beaker, Globe, Document
-   Warna: Blue, Green, Purple, Red

### 7. **Roadmap Riset**

-   Title: Tahapan roadmap (Identifikasi Potensi, Pengembangan Proposal, Implementasi Riset, Publikasi & Komersialisasi)
-   Content: Deskripsi tahapan
-   Warna: Blue, Green, Yellow, Purple

### 8. **Informasi Kontak**

-   Title: "Informasi Kontak P3RPM" atau "Jam Konsultasi"
-   Content: Email atau jam operasional
-   Description: Telepon dan alamat atau catatan
-   Icon: Envelope, Clock
-   Warna: Indigo, Blue

## Cara Penggunaan

### Menambah Konten Baru

1. Klik tombol **"Create P3RPM Content"**
2. Pilih bagian halaman yang akan dikelola
3. Isi form dengan informasi lengkap
4. Klik **"Create"** untuk menyimpan

### Mengedit Konten

1. Klik icon pensil pada baris konten yang ingin diedit
2. Ubah informasi yang diperlukan
3. Klik **"Save"** untuk menyimpan perubahan

### Menghapus Konten

1. Klik icon tempat sampah pada baris konten yang ingin dihapus
2. Konfirmasi penghapusan
3. Konten akan dihapus dari database

### Mengatur Urutan Tampilan

-   Gunakan field **"Urutan"** untuk mengatur posisi konten
-   Angka kecil = tampil di atas
-   Contoh: 1 = pertama, 2 = kedua, dst.

## Integrasi dengan Frontend

### Halaman P3RPM

-   Data konten ditampilkan di halaman `/p3rpm`
-   Dikelompokkan berdasarkan section
-   Menampilkan konten dinamis sesuai pengaturan admin
-   Warna dan icon sesuai konfigurasi

### Struktur Data

-   Hero section: Judul, subtitle, dan tagline
-   Deskripsi: Informasi lengkap P3RPM
-   Visi & Misi: Tujuan dan sasaran
-   Program: 3 program unggulan
-   Skema: 4 skema pendanaan
-   Roadmap: 4 tahapan riset
-   Kontak: 2 informasi kontak

## Data Contoh

Seeder sudah mengisi 17 konten contoh dengan informasi lengkap:

-   1 konten hero
-   1 konten deskripsi
-   1 konten visi
-   1 konten misi
-   3 konten program unggulan
-   4 konten skema pendanaan
-   4 konten roadmap riset
-   2 konten informasi kontak

## Catatan Penting

1. **Status Aktif**: Hanya konten dengan status "Aktif" yang ditampilkan di frontend
2. **Urutan**: Konten diurutkan berdasarkan field "order" kemudian "created_at"
3. **Section**: Setiap konten harus memiliki section yang valid
4. **Warna**: Gunakan warna yang konsisten untuk section yang sama
5. **Icon**: Gunakan nama icon Heroicon yang valid

## Troubleshooting

### Konten tidak muncul di frontend

-   Pastikan status konten = "Aktif"
-   Periksa apakah ada error di log Laravel
-   Clear cache dengan `php artisan optimize:clear`

### Error saat menyimpan

-   Pastikan semua field wajib terisi
-   Periksa format gambar (harus valid)
-   Periksa nama icon Heroicon (harus valid)

### Urutan tidak sesuai

-   Pastikan field "order" diisi dengan angka
-   Clear cache jika perubahan tidak langsung terlihat

### Warna tidak muncul

-   Pastikan nama warna sesuai dengan Tailwind CSS
-   Periksa apakah ada konflik CSS

## Backup dan Restore

### Backup Data

```bash
php artisan tinker
>>> App\Models\P3rpmContent::all()->toArray();
```

### Restore Data

```bash
php artisan db:seed --class=P3rpmContentSeeder
```

## Kontak Support

Jika mengalami masalah dengan menu P3RPM Content, silakan hubungi:

-   Email: admin@ft.unima.ac.id
-   WhatsApp: +62-xxx-xxx-xxxx
-   Jam kerja: Senin-Jumat 08:00-16:00

## Referensi

-   [Halaman P3RPM FMIPAK](https://fmipak.unima.ac.id/p3rpm/)
-   [Dokumentasi Filament](https://filamentphp.com/docs)
-   [Heroicon](https://heroicons.com/)
-   [Tailwind CSS Colors](https://tailwindcss.com/docs/customizing-colors)
