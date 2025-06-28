@extends("master")

@section("title", "Pengumuman - Fakultas Teknik UNIMA")

@section("content")
<main class="container mx-auto py-16 px-4 min-h-[40vh]">
    <div class="text-center mb-12">
        <h2 class="text-2xl md:text-3xl font-bold text-orange-800 mb-4">Pengumuman</h2>
        <p class="text-center text-orange-900 max-w-2xl mx-auto">Informasi terbaru dan pengumuman penting dari Fakultas Teknik Universitas Negeri Manado.</p>
    </div>

    <div class="max-w-6xl mx-auto">
        <!-- Filter dan Pencarian -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cari Pengumuman</label>
                    <input type="text" placeholder="Ketik kata kunci..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option value="">Semua Kategori</option>
                        <option value="akademik">Akademik</option>
                        <option value="beasiswa">Beasiswa</option>
                        <option value="kegiatan">Kegiatan</option>
                        <option value="pendaftaran">Pendaftaran</option>
                        <option value="umum">Umum</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Urutkan</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option value="latest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="title">Judul A-Z</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Daftar Pengumuman -->
        <div class="space-y-6">
            <!-- Pengumuman 1 -->
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">Akademik</span>
                        <span class="text-sm text-gray-500">2 jam yang lalu</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-eye text-gray-400 text-sm"></i>
                        <span class="text-sm text-gray-500">156</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-orange-800 mb-3">
                    <a href="#" class="hover:text-orange-600 transition-colors">
                        Jadwal Ujian Tengah Semester (UTS) Genap 2024/2025
                    </a>
                </h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Diumumkan kepada seluruh mahasiswa Fakultas Teknik bahwa Ujian Tengah Semester (UTS) untuk semester genap tahun akademik 2024/2025 akan dilaksanakan pada tanggal 15-25 Maret 2024. Silakan periksa jadwal detail di SI Unima.
                </p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span><i class="fas fa-calendar mr-1"></i> 15-25 Maret 2024</span>
                        <span><i class="fas fa-user mr-1"></i> Admin Akademik</span>
                    </div>
                    <a href="#" class="text-orange-600 hover:text-orange-700 font-medium text-sm">
                        Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Pengumuman 2 -->
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Beasiswa</span>
                        <span class="text-sm text-gray-500">1 hari yang lalu</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-eye text-gray-400 text-sm"></i>
                        <span class="text-sm text-gray-500">89</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-orange-800 mb-3">
                    <a href="#" class="hover:text-orange-600 transition-colors">
                        Pendaftaran Beasiswa KIP-Kuliah 2024/2025
                    </a>
                </h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Pendaftaran Beasiswa Kartu Indonesia Pintar Kuliah (KIP-K) untuk tahun akademik 2024/2025 telah dibuka. Beasiswa ini diperuntukkan bagi mahasiswa baru yang memenuhi kriteria. Pendaftaran dibuka hingga 30 April 2024.
                </p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span><i class="fas fa-calendar mr-1"></i> 1-30 April 2024</span>
                        <span><i class="fas fa-user mr-1"></i> Admin Kemahasiswaan</span>
                    </div>
                    <a href="#" class="text-orange-600 hover:text-orange-700 font-medium text-sm">
                        Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Pengumuman 3 -->
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Kegiatan</span>
                        <span class="text-sm text-gray-500">3 hari yang lalu</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-eye text-gray-400 text-sm"></i>
                        <span class="text-sm text-gray-500">234</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-orange-800 mb-3">
                    <a href="#" class="hover:text-orange-600 transition-colors">
                        Workshop Teknologi AI dan Machine Learning
                    </a>
                </h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Fakultas Teknik akan menyelenggarakan Workshop Teknologi AI dan Machine Learning pada tanggal 20 Maret 2024. Workshop ini terbuka untuk semua mahasiswa dan akan menghadirkan praktisi dari industri teknologi.
                </p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span><i class="fas fa-calendar mr-1"></i> 20 Maret 2024</span>
                        <span><i class="fas fa-user mr-1"></i> Admin Humas</span>
                    </div>
                    <a href="#" class="text-orange-600 hover:text-orange-700 font-medium text-sm">
                        Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Pengumuman 4 -->
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded">Pendaftaran</span>
                        <span class="text-sm text-gray-500">1 minggu yang lalu</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-eye text-gray-400 text-sm"></i>
                        <span class="text-sm text-gray-500">567</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-orange-800 mb-3">
                    <a href="#" class="hover:text-orange-600 transition-colors">
                        Pendaftaran Mahasiswa Baru Jalur SNBP dan SNBT 2024
                    </a>
                </h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Pendaftaran mahasiswa baru untuk jalur SNBP (Seleksi Nasional Berdasarkan Prestasi) dan SNBT (Seleksi Nasional Berdasarkan Tes) tahun 2024 telah dibuka. Informasi lengkap dapat dilihat di website resmi UNIMA.
                </p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span><i class="fas fa-calendar mr-1"></i> 1-31 Mei 2024</span>
                        <span><i class="fas fa-user mr-1"></i> Admin Penerimaan</span>
                    </div>
                    <a href="#" class="text-orange-600 hover:text-orange-700 font-medium text-sm">
                        Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Pengumuman 5 -->
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Umum</span>
                        <span class="text-sm text-gray-500">2 minggu yang lalu</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-eye text-gray-400 text-sm"></i>
                        <span class="text-sm text-gray-500">123</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-orange-800 mb-3">
                    <a href="#" class="hover:text-orange-600 transition-colors">
                        Perubahan Jam Operasional Perpustakaan
                    </a>
                </h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Mulai tanggal 1 April 2024, jam operasional perpustakaan Fakultas Teknik akan berubah. Perpustakaan akan buka dari Senin-Jumat pukul 08.00-16.00 WITA dan Sabtu pukul 08.00-12.00 WITA.
                </p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span><i class="fas fa-calendar mr-1"></i> 1 April 2024</span>
                        <span><i class="fas fa-user mr-1"></i> Admin Perpustakaan</span>
                    </div>
                    <a href="#" class="text-orange-600 hover:text-orange-700 font-medium text-sm">
                        Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            <nav class="flex items-center space-x-2">
                <a href="#" class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="px-3 py-2 text-white bg-orange-600 border border-orange-600 rounded-md">1</a>
                <a href="#" class="px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">2</a>
                <a href="#" class="px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">3</a>
                <span class="px-3 py-2 text-gray-500">...</span>
                <a href="#" class="px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">10</a>
                <a href="#" class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>

        <!-- Subscribe untuk Notifikasi -->
        <div class="bg-orange-50 rounded-lg p-8 mt-12 text-center">
            <h3 class="text-xl font-semibold text-orange-800 mb-4">Dapatkan Notifikasi Pengumuman</h3>
            <p class="text-gray-600 mb-6">Berlangganan untuk mendapatkan pengumuman terbaru langsung ke email Anda</p>
            <form class="max-w-md mx-auto flex">
                <input type="email" placeholder="Masukkan email Anda" class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                <button type="submit" class="px-6 py-2 bg-orange-600 text-white rounded-r-md hover:bg-orange-700 transition-colors">
                    Berlangganan
                </button>
            </form>
        </div>
    </div>
</main>
@endsection
