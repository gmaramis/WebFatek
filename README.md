# WebFT - Website Fakultas Teknik UNIMA

Website resmi Fakultas Teknik Universitas Negeri Manado (UNIMA) yang dibangun dengan Laravel dan Tailwind CSS.

## 🚀 Fitur Utama

-   **Halaman Utama** dengan hero slider dan informasi program studi
-   **Program Studi** - Detail lengkap setiap jurusan teknik
-   **Berita & Pengumuman** - Sistem manajemen konten
-   **Admin Panel** - Dashboard admin dengan Filament
-   **Responsive Design** - Tampilan optimal di desktop dan mobile

## 🛠️ Teknologi yang Digunakan

-   **Backend**: Laravel 11
-   **Frontend**: Tailwind CSS, Alpine.js
-   **Admin Panel**: Filament
-   **Database**: SQLite (development)
-   **Deployment**: Ready for production

## 📁 Struktur Proyek

```
Fatek/
├── app/                    # Laravel application
│   ├── Filament/          # Admin panel resources
│   ├── Http/Controllers/  # Controllers
│   └── Models/           # Eloquent models
├── resources/views/       # Blade templates
│   ├── pages/            # Halaman-halaman website
│   └── template/         # Template HTML statis
├── public/               # Assets publik
└── database/             # Migrations & seeders
```

## 🚀 Cara Menjalankan

1. **Clone repository**

    ```bash
    git clone https://github.com/gmaramis/WebFatek.git
    cd WebFatek
    ```

2. **Install dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Setup environment**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Setup database**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

5. **Jalankan server**
    ```bash
    php artisan serve
    ```

## 📝 Program Studi

-   **Teknik Informatika** - Program studi unggulan dengan akreditasi A
-   **Teknik Sipil** - Pembangunan infrastruktur dan konstruksi
-   **Teknik Mesin** - Desain dan manufaktur mesin
-   **Teknik Elektro** - Sistem kelistrikan dan elektronika
-   **Arsitektur** - Desain arsitektur dan perencanaan kota
-   **PTIK** - Pendidikan Teknologi Informasi dan Komunikasi
-   **PKK** - Pendidikan Kesejahteraan Keluarga

## 👥 Tim Pengembang

-   **Developer**: Glenn Maramis
-   **Framework**: Laravel + Filament
-   **Design**: Tailwind CSS

## 📞 Kontak

-   **Website**: [ft.unima.ac.id](https://ft.unima.ac.id)
-   **Email**: ft@unima.ac.id
-   **Alamat**: Kampus UNIMA Tondano, Minahasa, Sulawesi Utara

## 📄 Lisensi

Proyek ini dikembangkan untuk Fakultas Teknik UNIMA. Semua hak cipta dilindungi.
