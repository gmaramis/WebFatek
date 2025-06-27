# Website Fakultas Teknik - Universitas Indonesia

Website modern dan elegan untuk Fakultas Teknik UI yang dibangun dengan Tailwind CSS dan JavaScript vanilla.

## 🚀 Fitur Utama

### ✨ Desain & UI/UX

- **Responsive Design** - Optimal di semua perangkat (desktop, tablet, mobile)
- **Modern & Elegan** - Menggunakan gradien warna dan efek visual yang menarik
- **Smooth Animations** - Transisi halus dan animasi scroll yang responsif
- **Accessibility** - Mendukung keyboard navigation dan screen readers

### 🎯 Komponen Website

1. **Fixed Navigation Bar** - Menu yang tetap di atas saat scroll
2. **Hero Slider** - Slider otomatis dengan 3 slide yang menarik
3. **About Section** - Informasi tentang fakultas dengan ikon dan animasi
4. **Program Studi** - 6 program studi dengan kartu yang interaktif
5. **Berita Terbaru** - Section berita dengan layout card yang menarik
6. **Pengumuman Penting** - Pengumuman dengan kategori dan ikon
7. **Footer** - Link penting dan informasi kontak lengkap

### 🔧 Teknologi yang Digunakan

- **HTML5** - Struktur semantik yang bersih
- **Tailwind CSS** - Framework CSS utility-first
- **JavaScript Vanilla** - Interaktivitas tanpa framework
- **Font Awesome** - Ikon yang konsisten dan profesional

## 📁 Struktur File

```
Fatek/
├── index.html          # File utama website
├── css/
│   └── style.css       # CSS kustom dan animasi
├── js/
│   └── main.js         # JavaScript untuk interaktivitas
├── img/                # Folder untuk gambar (opsional)
└── README.md           # Dokumentasi ini
```

## 🎨 Warna & Tema

Website menggunakan skema warna yang konsisten:

- **Primary**: `#1e40af` (Biru)
- **Secondary**: `#1e293b` (Abu-abu gelap)
- **Accent**: `#f59e0b` (Kuning/Orange)

## ⚡ Fitur JavaScript

### Hero Slider

- Auto-slide setiap 5 detik
- Kontrol manual dengan tombol dan dots
- Pause saat hover
- Transisi halus antar slide

### Navigation

- Smooth scrolling ke section
- Mobile menu yang responsif
- Navbar yang hide/show saat scroll
- Active state untuk menu

### Animasi

- Fade-in animation saat scroll
- Hover effects pada kartu
- Loading animations
- Parallax effects

### Mobile Responsive

- Menu hamburger untuk mobile
- Layout yang adaptif
- Touch-friendly interactions

## 🚀 Cara Menjalankan

1. **Clone atau download** project ini
2. **Buka file** `index.html` di browser
3. **Atau gunakan live server** untuk development

```bash
# Jika menggunakan VS Code dengan Live Server extension
# Klik kanan pada index.html -> "Open with Live Server"
```

## 📱 Responsive Breakpoints

- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: > 1024px

## 🔧 Kustomisasi

### Mengubah Warna

Edit konfigurasi Tailwind di `index.html`:

```javascript
tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: "#1e40af", // Ganti dengan warna yang diinginkan
        secondary: "#1e293b",
        accent: "#f59e0b",
      },
    },
  },
};
```

### Menambah Konten

1. **Berita**: Edit section dengan class `#news`
2. **Pengumuman**: Edit section dengan class `#announcements`
3. **Program Studi**: Edit section dengan class `#programs`

### Mengubah Slider

Edit slide di section hero dengan class `.slide`:

```html
<div class="slide absolute inset-0 bg-gradient-to-r from-primary to-secondary">
  <!-- Konten slide -->
</div>
```

## 🌟 Optimasi Performance

- **Lazy Loading** untuk gambar
- **Debounced search** untuk performa
- **Intersection Observer** untuk animasi scroll
- **Minified CSS/JS** (production)
- **CDN** untuk Font Awesome dan Tailwind

## 📊 SEO & Accessibility

- **Semantic HTML** dengan tag yang tepat
- **Meta tags** untuk SEO
- **Alt text** untuk gambar
- **ARIA labels** untuk accessibility
- **Keyboard navigation** support

## 🔒 Browser Support

- Chrome (versi terbaru)
- Firefox (versi terbaru)
- Safari (versi terbaru)
- Edge (versi terbaru)

## 📝 Lisensi

Project ini dibuat untuk tujuan edukasi dan dapat digunakan secara bebas.

## 🤝 Kontribusi

Untuk berkontribusi pada project ini:

1. Fork repository
2. Buat branch fitur baru
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

## 📞 Kontak

Untuk pertanyaan atau saran, silakan hubungi:

- Email: ft@ui.ac.id
- Phone: +62 21 786 3500
- Address: Kampus UI Depok, Jawa Barat 16424

---

**Dibuat dengan ❤️ untuk Fakultas Teknik UI**
