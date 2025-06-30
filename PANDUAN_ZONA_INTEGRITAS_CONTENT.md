# PANDUAN MENU ADMIN ZONA INTEGRITAS CONTENT

## Deskripsi

Menu **Zona Integritas Content** di grup **Unit** memungkinkan admin untuk mengelola konten dinamis halaman Zona Integritas Fatek UNIMA.

## Lokasi Menu

-   **Grup**: Unit
-   **Icon**: 🛡️ (shield-check)
-   **Label**: Zona Integritas Content
-   **URL Admin**: `/admin/zona-integritas-contents`

## Fitur yang Tersedia

### 1. Daftar Konten (List)

-   Menampilkan semua konten Zona Integritas dalam bentuk tabel
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

-   Judul utama: "Zona Integritas"
-   Subtitle: Deskripsi lengkap tentang Zona Integritas
-   Content: Tagline atau slogan
-   Warna: Green

### 2. **Maklumat Pelayanan Publik**

-   Judul: "Maklumat Pelayanan Publik"
-   Content: Penjelasan tentang reformasi birokrasi
-   Description: Komitmen Fatek UNIMA
-   Warna: Green

### 3. **Prinsip Zona Integritas**

-   Title: Nama prinsip (Transparansi, Akuntabilitas, Responsif, Efektif & Efisien)
-   Content: Deskripsi prinsip
-   Icon: Eye, Check-circle, Bolt, Chart-bar
-   Warna: Blue, Green, Yellow, Purple

### 4. **Sasaran Zona Integritas**

-   Title: Nama sasaran (WBK, WBBM)
-   Content: Sasaran utama
-   Description: Daftar sasaran dalam format list
-   Warna: Green, Blue

### 5. **Langkah Strategis**

-   Title: Nama langkah (Pencegahan, Penindakan, Peningkatan)
-   Content: Daftar langkah-langkah strategis
-   Icon: Shield-exclamation, Exclamation-triangle, Arrow-trending-up
-   Warna: Red, Orange, Blue

### 6. **Dokumen Pendukung**

-   Title: Nama dokumen (Surat Keputusan, Standar Pelayanan)
-   Content: Deskripsi dokumen
-   Icon: Document-text, Clipboard-document-list
-   Warna: Gray

### 7. **Informasi Kontak**

-   Title: "Tim Zona Integritas Fatek" atau "Jam Pelayanan"
-   Content: Email atau jam operasional
-   Description: Telepon dan alamat atau catatan
-   Icon: Envelope, Clock
-   Warna: Indigo, Blue

## Cara Penggunaan

### Menambah Konten Baru

1. Klik tombol **"Create Zona Integritas Content"**
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

### Halaman Zona Integritas

-   Data konten ditampilkan di halaman `/zona-integritas`
-   Dikelompokkan berdasarkan section
-   Menampilkan konten dinamis sesuai pengaturan admin
-   Warna dan icon sesuai konfigurasi

### Struktur Data

-   Hero section: Judul, subtitle, dan tagline
-   Maklumat: Informasi reformasi birokrasi
-   Prinsip: 4 prinsip zona integritas
-   Sasaran: 2 sasaran utama (WBK & WBBM)
-   Langkah: 3 langkah strategis
-   Dokumen: 2 dokumen pendukung
-   Kontak: 2 informasi kontak

## Data Contoh

Seeder sudah mengisi 15 konten contoh dengan informasi lengkap:

-   1 konten hero
-   1 konten maklumat
-   4 konten prinsip
-   2 konten sasaran
-   3 konten langkah strategis
-   2 konten dokumen
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
>>> App\Models\ZonaIntegritasContent::all()->toArray();
```

### Restore Data

```bash
php artisan db:seed --class=ZonaIntegritasContentSeeder
```

## Kontak Support

Jika mengalami masalah dengan menu Zona Integritas Content, silakan hubungi:

-   Email: admin@fatek.unima.ac.id
-   WhatsApp: +62-xxx-xxx-xxxx
-   Jam kerja: Senin-Jumat 08:00-16:00

## Referensi

-   [Halaman Zona Integritas FMIPAK](https://fmipak.unima.ac.id/zona-integritas/)
-   [Dokumentasi Filament](https://filamentphp.com/docs)
-   [Heroicon](https://heroicons.com/)
-   [Tailwind CSS Colors](https://tailwindcss.com/docs/customizing-colors)
