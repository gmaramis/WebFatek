# PANDUAN UPLOAD PERBAIKAN STRUKTUR PIMPINAN

## 🚨 PENTING: BACKUP SEBELUM UPLOAD

### 1. Backup Database Server

```bash
# Backup database server (ganti dengan kredensial yang sesuai)
mysqldump -u username -p database_name > backup_sebelum_struktur_$(date +%Y%m%d_%H%M%S).sql
```

### 2. Backup File Website

```bash
# Backup folder public_html atau www
tar -czf backup_website_$(date +%Y%m%d_%H%M%S).tar.gz /path/to/website
```

## 📋 FILE YANG PERLU DIUPLOAD

### File Baru:

1. `app/Http/Controllers/StrukturPimpinanController.php` - Controller baru
2. `database/seeders/StrukturPimpinanSeeder.php` - Seeder data contoh

### File yang Diupdate:

1. `routes/web.php` - Route sudah diupdate untuk menggunakan controller
2. `resources/views/pages/struktur.blade.php` - View sudah diupdate untuk menggunakan database

## 🔧 LANGKAH-LANGKAH UPLOAD AMAN

### Step 1: Upload File

```bash
# Upload file-file yang sudah diupdate ke server
# Pastikan tidak ada file yang tertinggal
```

### Step 2: Jalankan Migration (Jika Belum)

```bash
php artisan migrate
```

### Step 3: Jalankan Seeder

```bash
php artisan db:seed --class=StrukturPimpinanSeeder
```

### Step 4: Clear Cache

```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
```

### Step 5: Test Website

1. Buka halaman `/struktur` di browser
2. Pastikan data muncul dengan benar
3. Test admin panel di `/admin` untuk mengelola struktur pimpinan

## 🎯 FITUR YANG SUDAH DIPERBAIKI

### ✅ Yang Sudah Berfungsi:

1. **Halaman Struktur Pimpinan** - Sekarang mengambil data dari database
2. **Admin Panel** - Bisa mengelola data struktur pimpinan
3. **Dynamic Content** - Data bisa diupdate tanpa edit kode
4. **Foto Support** - Bisa upload foto pimpinan
5. **Level Management** - Dekan, Wakil Dekan, Kepala Jurusan

### 📊 Struktur Data:

-   **Dekan**: 1 orang (level: dekan)
-   **Wakil Dekan**: 3 orang (level: wakil_dekan, urutan: 1,2,3)
-   **Kepala Jurusan**: Bisa banyak (level: kepala_jurusan)

## 🔍 TROUBLESHOOTING

### Jika Halaman Error:

1. Cek log error: `storage/logs/laravel.log`
2. Pastikan controller sudah terupload
3. Pastikan route sudah terupdate
4. Clear cache: `php artisan cache:clear`

### Jika Data Tidak Muncul:

1. Cek database apakah data sudah ada
2. Jalankan seeder: `php artisan db:seed --class=StrukturPimpinanSeeder`
3. Cek apakah model `StrukturPimpinan` ada

### Jika Admin Panel Error:

1. Cek apakah resource `StrukturPimpinanResource` ada
2. Clear cache Filament: `php artisan filament:upgrade`

## 📝 CARA MENGGUNAKAN ADMIN PANEL

1. Login ke admin panel: `/admin`
2. Pilih menu "Struktur Pimpinan"
3. Klik "Create" untuk tambah data baru
4. Isi field yang diperlukan:
    - **Nama**: Nama lengkap pimpinan
    - **Jabatan**: Jabatan (Dekan, Wakil Dekan I, dll)
    - **NIP**: Nomor Induk Pegawai
    - **Pendidikan Terakhir**: Gelar pendidikan
    - **Foto**: Upload foto (opsional)
    - **Urutan**: Urutan tampilan
    - **Level**: dekan/wakil_dekan/kepala_jurusan
    - **Bidang**: Bidang tugas (untuk wakil dekan)
    - **Is Active**: Aktif/tidak aktif

## 🎉 KEUNTUNGAN SETELAH PERBAIKAN

1. **Mudah Update**: Bisa update data tanpa edit kode
2. **Admin Friendly**: Interface admin yang user-friendly
3. **Dynamic**: Data bisa berubah sesuai kebutuhan
4. **Scalable**: Bisa tambah pimpinan baru dengan mudah
5. **Consistent**: Konsisten dengan fitur lain di website

## 📞 SUPPORT

Jika ada masalah, cek:

1. Log error di `storage/logs/laravel.log`
2. Pastikan semua file terupload dengan benar
3. Pastikan database migration dan seeder berjalan
4. Clear cache jika diperlukan

---

**Dibuat oleh: AI Assistant**
**Tanggal: $(date)**
**Versi: 1.0**
