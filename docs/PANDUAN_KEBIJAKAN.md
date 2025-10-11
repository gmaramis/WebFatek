# Panduan Mengelola Halaman Kebijakan

## Cara Mengakses Admin Panel Kebijakan

1. Buka browser dan akses: `http://localhost:8000/admin`
2. Login dengan username dan password admin
3. Di sidebar kiri, klik menu **"Kebijakan"**

## Cara Menambah Kebijakan Baru

1. Di halaman list kebijakan, klik tombol **"Create Kebijakan"** (tombol biru di pojok kanan atas)
2. Isi form dengan informasi berikut:

### Informasi Kebijakan

-   **Judul Kebijakan**: Tulis judul yang jelas dan singkat
    -   Contoh: "Kebijakan Akademik Fakultas Teknik"
-   **Kategori**: Pilih salah satu dari dropdown
    -   Akademik (untuk kebijakan terkait pembelajaran)
    -   Kemahasiswaan (untuk kebijakan terkait mahasiswa)
    -   Kepegawaian (untuk kebijakan terkait dosen/staff)
    -   Keuangan (untuk kebijakan terkait keuangan)
    -   Umum (untuk kebijakan umum fakultas)
-   **Deskripsi Singkat**: Tulis ringkasan singkat tentang kebijakan ini

### Konten Kebijakan

-   **Isi Kebijakan**: Tulis konten lengkap kebijakan
-   Anda bisa menggunakan format HTML sederhana untuk formatting:
    -   `<h3>Judul Bagian</h3>` untuk judul besar
    -   `<h4>Sub Judul</h4>` untuk sub judul
    -   `<p>Teks paragraf...</p>` untuk paragraf
    -   `<ul><li>Item list</li></ul>` untuk list
    -   `<strong>Teks tebal</strong>` untuk teks tebal
    -   `<em>Teks miring</em>` untuk teks miring

### Pengaturan

-   **File Dokumen**: Upload file PDF atau Word jika ada dokumen pendukung (opsional)
-   **Aktif**: Centang jika ingin kebijakan ditampilkan di website

3. Klik **"Create Kebijakan"** untuk menyimpan

## Cara Mengedit Kebijakan

1. Di halaman list kebijakan, klik ikon pensil (edit) pada baris kebijakan yang ingin diedit
2. Ubah informasi yang diperlukan
3. Klik **"Save"** untuk menyimpan perubahan

## Cara Menghapus Kebijakan

1. Di halaman list kebijakan, klik ikon tempat sampah (delete) pada baris kebijakan yang ingin dihapus
2. Konfirmasi penghapusan

## Cara Menonaktifkan Kebijakan

1. Edit kebijakan yang ingin dinonaktifkan
2. Di bagian "Pengaturan", uncheck kotak "Aktif"
3. Save perubahan

## Filter dan Pencarian

-   **Filter Kategori**: Gunakan dropdown "Kategori" untuk melihat kebijakan berdasarkan kategori
-   **Filter Status**: Gunakan dropdown "Status Aktif" untuk melihat kebijakan aktif/nonaktif
-   **Pencarian**: Gunakan kotak pencarian untuk mencari berdasarkan judul

## Tips Formatting HTML Sederhana

### Contoh Formatting yang Bisa Digunakan:

```html
<h3>Judul Utama Kebijakan</h3>
<p>Ini adalah paragraf pembuka yang menjelaskan latar belakang kebijakan.</p>

<h4>1. Bagian Pertama</h4>
<p>Penjelasan bagian pertama kebijakan.</p>

<h4>2. Bagian Kedua</h4>
<ul>
    <li>Point pertama</li>
    <li>Point kedua</li>
    <li>Point ketiga</li>
</ul>

<h4>3. Bagian Ketiga</h4>
<p>
    Penjelasan bagian ketiga dengan <strong>teks penting</strong> dan
    <em>penekanan</em>.
</p>
```

### Hasil Tampilan:

-   `<h3>` akan menjadi judul besar
-   `<h4>` akan menjadi sub judul
-   `<p>` akan menjadi paragraf normal
-   `<ul><li>` akan menjadi list dengan bullet points
-   `<strong>` akan membuat teks tebal
-   `<em>` akan membuat teks miring

## Troubleshooting

### Jika kebijakan tidak muncul di website:

1. Pastikan status "Aktif" sudah dicentang
2. Clear cache dengan refresh halaman
3. Periksa apakah ada error di form

### Jika format HTML tidak bekerja:

1. Pastikan tag HTML ditulis dengan benar (dengan tanda < dan >)
2. Pastikan tag ditutup dengan benar
3. Gunakan contoh format yang sudah disediakan

### Jika file tidak bisa diupload:

1. Pastikan ukuran file tidak lebih dari 5MB
2. Pastikan format file adalah PDF atau Word (.doc/.docx)
3. Periksa koneksi internet

## Kontak Support

Jika mengalami masalah teknis, hubungi tim IT untuk bantuan lebih lanjut.
