@extends('master')

@section('title', 'Pendidikan Teknologi Informasi & Komunikasi - Fakultas Teknik UNIMA')

@push('head')
<style>
  /* Gaya spesifik untuk halaman PTIK */
  .curriculum-card {
    transition: all 0.3s ease-in-out;
  }
  .curriculum-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  }
</style>
@endpush

@section('content')
<main class="bg-gray-100">
    <!-- Hero Section -->
    <section class="pt-20 bg-gradient-to-br from-primary to-secondary">
      <div class="container mx-auto px-4 py-20">
        <div class="mb-8">
          <a href="{{ url('/') }}" class="inline-flex items-center text-white hover:text-accent transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali ke Beranda</span>
          </a>
        </div>
        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div class="text-white">
            <div class="flex items-center mb-6">
              <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-laptop-code text-white text-2xl"></i>
              </div>
              <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Pendidikan Teknologi Informasi & Komunikasi</h1>
                <p class="text-xl text-gray-200">Program Studi S1</p>
              </div>
            </div>
            <p class="text-lg mb-8 text-gray-200 leading-relaxed">
              Program studi yang mempersiapkan pendidik profesional dalam bidang teknologi informasi dan komunikasi untuk menghasilkan generasi yang melek teknologi dan siap menghadapi era digital.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
              <a href="#program-overview" class="bg-accent hover:bg-yellow-600 text-white px-8 py-3 rounded-lg font-semibold transition-colors inline-block text-center">Pelajari Lebih Lanjut</a>
              <a href="#admission" class="border-2 border-white text-white hover:bg-white hover:text-primary px-8 py-3 rounded-lg font-semibold transition-colors inline-block text-center">Pendaftaran</a>
            </div>
          </div>
          <div class="relative">
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
              <div class="grid grid-cols-2 gap-6">
                <div class="text-center">
                  <div class="text-3xl font-bold text-white mb-2">4</div>
                  <div class="text-gray-200">Tahun Studi</div>
                </div>
                <div class="text-center">
                  <div class="text-3xl font-bold text-white mb-2">144</div>
                  <div class="text-gray-200">SKS</div>
                </div>
                <div class="text-center">
                  <div class="text-3xl font-bold text-white mb-2">95%</div>
                  <div class="text-gray-200">Lulusan Kerja</div>
                </div>
                <div class="text-center">
                  <div class="text-3xl font-bold text-white mb-2">A</div>
                  <div class="text-gray-200">Akreditasi</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Program Overview -->
    <section id="program-overview" class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-secondary mb-4">Gambaran Program Studi</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Program Studi PTIK dirancang untuk menghasilkan pendidik profesional yang kompeten dalam bidang teknologi informasi dan komunikasi, dengan fokus pada pengembangan metode pembelajaran inovatif berbasis teknologi.
          </p>
        </div>
        <div class="grid md:grid-cols-3 gap-8 mb-16">
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-graduation-cap text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Visi</h3>
            <p class="text-gray-600">
              Menjadi program studi unggul dalam menghasilkan pendidik TIK yang inovatif, adaptif, dan berdaya saing global.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-bullseye text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Misi</h3>
            <p class="text-gray-600">
              Menyelenggarakan pendidikan dan penelitian di bidang TIK yang berkualitas, serta pengabdian masyarakat berbasis teknologi pendidikan.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-users text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Tujuan</h3>
            <p class="text-gray-600">
              Menghasilkan lulusan yang profesional, beretika, dan mampu beradaptasi dengan perkembangan teknologi pendidikan.
            </p>
          </div>
        </div>
        <!-- Kompetensi Lulusan -->
        <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white">
          <h3 class="text-3xl font-bold mb-8 text-center">Kompetensi Lulusan</h3>
          <div class="grid md:grid-cols-2 gap-8">
            <div>
              <h4 class="text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-chalkboard-teacher mr-3 text-accent"></i>
                Kompetensi Utama
              </h4>
              <ul class="space-y-3">
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai konsep dan implementasi pembelajaran TIK</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Mampu mengembangkan media pembelajaran digital</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Memahami dan mengimplementasikan kurikulum TIK</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai teknologi pendidikan terkini</span></li>
              </ul>
            </div>
            <div>
              <h4 class="text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-brain mr-3 text-accent"></i>
                Kompetensi Pendukung
              </h4>
              <ul class="space-y-3">
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Mampu mengelola pembelajaran berbasis teknologi</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Memiliki kemampuan penelitian pendidikan TIK</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai pengembangan konten digital</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Memahami etika profesi pendidik</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Kurikulum -->
    <section class="py-20 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-secondary mb-4">Kurikulum Program Studi</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">Kurikulum yang dirancang sesuai dengan kebutuhan pendidikan TIK masa kini.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Semester 1-2 -->
          <div class="curriculum-card group bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-lg p-6 border border-blue-200 hover:shadow-2xl hover:scale-105 transition-all duration-500 cursor-pointer relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
              <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-blue-800">Semester 1-2</h3>
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-graduation-cap text-white text-lg"></i>
                </div>
              </div>
              <div class="space-y-4">
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-book text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Pengantar Pendidikan</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-laptop text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Pengantar TIK</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-code text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Pemrograman Dasar</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Semester 3-4 -->
          <div class="curriculum-card group bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-lg p-6 border border-blue-200 hover:shadow-2xl hover:scale-105 transition-all duration-500 cursor-pointer relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
              <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-blue-800">Semester 3-4</h3>
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-laptop-code text-white text-lg"></i>
                </div>
              </div>
              <div class="space-y-4">
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-chalkboard text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Metodologi Pembelajaran TIK</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-video text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Media Pembelajaran Digital</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-network-wired text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Jaringan Komputer</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Semester 5-6 -->
          <div class="curriculum-card group bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-lg p-6 border border-blue-200 hover:shadow-2xl hover:scale-105 transition-all duration-500 cursor-pointer relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
              <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-blue-800">Semester 5-6</h3>
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-mobile-alt text-white text-lg"></i>
                </div>
              </div>
              <div class="space-y-4">
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-graduation-cap text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Kurikulum TIK</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-mobile text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Pengembangan Aplikasi Mobile</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-chart-line text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Evaluasi Pembelajaran</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Semester 7-8 -->
          <div class="curriculum-card group bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-lg p-6 border border-blue-200 hover:shadow-2xl hover:scale-105 transition-all duration-500 cursor-pointer relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
              <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-blue-800">Semester 7-8</h3>
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-lightbulb text-white text-lg"></i>
                </div>
              </div>
              <div class="space-y-4">
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-flask text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Penelitian Pendidikan</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-school text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Praktik Pengalaman Lapangan</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-file-alt text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Skripsi</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Fasilitas -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-secondary mb-4">Fasilitas & Laboratorium</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">Fasilitas modern yang mendukung pembelajaran dan pengembangan kompetensi pendidikan TIK.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
            <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
              <i class="fas fa-laptop-code text-white text-6xl"></i>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">Lab Komputer</h3>
              <p class="text-gray-600 mb-4">Laboratorium dengan komputer modern untuk praktikum pemrograman dan pengembangan media pembelajaran.</p>
              <ul class="text-sm text-gray-600 space-y-1">
                <li>• Intel i7 Processor</li>
                <li>• 16GB RAM</li>
                <li>• SSD Storage</li>
                <li>• Software Development Tools</li>
              </ul>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
            <div class="h-48 bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center">
              <i class="fas fa-video text-white text-6xl"></i>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">Studio Multimedia</h3>
              <p class="text-gray-600 mb-4">Studio untuk pengembangan konten multimedia dan media pembelajaran digital.</p>
              <ul class="text-sm text-gray-600 space-y-1">
                <li>• Video Recording Equipment</li>
                <li>• Audio Recording Studio</li>
                <li>• Editing Suites</li>
                <li>• Green Screen</li>
              </ul>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
            <div class="h-48 bg-gradient-to-br from-yellow-500 to-yellow-700 flex items-center justify-center">
              <i class="fas fa-chalkboard-teacher text-white text-6xl"></i>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">Ruang Microteaching</h3>
              <p class="text-gray-600 mb-4">Ruang praktik mengajar dengan teknologi audio-visual untuk pengembangan keterampilan mengajar.</p>
              <ul class="text-sm text-gray-600 space-y-1">
                <li>• Smart Board</li>
                <li>• Recording System</li>
                <li>• Video Conference</li>
                <li>• Teaching Aids</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Prospek Karir -->
    <section class="py-20 bg-gradient-to-r from-secondary to-primary text-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold mb-4">Prospek Karir Lulusan</h2>
          <p class="text-xl text-gray-200 max-w-3xl mx-auto">Lulusan PTIK memiliki prospek karir yang luas di bidang pendidikan dan teknologi.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
            <div class="flex items-center mb-4">
              <i class="fas fa-chalkboard-teacher text-accent text-2xl mr-3"></i>
              <h3 class="text-xl font-semibold">Guru TIK</h3>
            </div>
            <p class="text-gray-200 mb-4">Mengajar mata pelajaran TIK di sekolah menengah dan perguruan tinggi.</p>
            <div class="text-sm text-gray-300">
              <div class="flex items-center mb-2"><i class="fas fa-building mr-2"></i><span>Sekolah Negeri/Swasta</span></div>
              <div class="flex items-center"><i class="fas fa-money-bill-wave mr-2"></i><span>Rp 5-15 juta/bulan</span></div>
            </div>
          </div>
          <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
            <div class="flex items-center mb-4">
              <i class="fas fa-laptop-code text-accent text-2xl mr-3"></i>
              <h3 class="text-xl font-semibold">Pengembang Media Pembelajaran</h3>
            </div>
            <p class="text-gray-200 mb-4">Mengembangkan konten dan media pembelajaran digital untuk institusi pendidikan.</p>
            <div class="text-sm text-gray-300">
              <div class="flex items-center mb-2"><i class="fas fa-building mr-2"></i><span>EdTech Companies</span></div>
              <div class="flex items-center"><i class="fas fa-money-bill-wave mr-2"></i><span>Rp 7-20 juta/bulan</span></div>
            </div>
          </div>
          <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
            <div class="flex items-center mb-4">
              <i class="fas fa-user-tie text-accent text-2xl mr-3"></i>
              <h3 class="text-xl font-semibold">Konsultan Pendidikan TIK</h3>
            </div>
            <p class="text-gray-200 mb-4">Memberikan konsultasi dan pelatihan dalam implementasi teknologi pendidikan.</p>
            <div class="text-sm text-gray-300">
              <div class="flex items-center mb-2"><i class="fas fa-building mr-2"></i><span>Lembaga Pendidikan</span></div>
              <div class="flex items-center"><i class="fas fa-money-bill-wave mr-2"></i><span>Rp 8-25 juta/bulan</span></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Pendaftaran -->
    <section id="admission" class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-secondary mb-4">Informasi Pendaftaran</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">Persiapkan diri Anda untuk bergabung dengan Program Studi PTIK.</p>
        </div>
        <div class="grid md:grid-cols-2 gap-12">
          <!-- Persyaratan -->
          <div class="bg-gray-50 rounded-2xl p-8">
            <h3 class="text-2xl font-bold text-secondary mb-6">Persyaratan Pendaftaran</h3>
            <div class="space-y-4">
              <div class="flex items-start">
                <div class="w-6 h-6 bg-primary rounded-full flex items-center justify-center mr-4 mt-1"><span class="text-white text-sm font-bold">1</span></div>
                <div>
                  <h4 class="font-semibold text-secondary mb-2">Lulus SMA/SMK/MA</h4>
                  <p class="text-gray-600">Jurusan IPA atau SMK Teknologi Informasi</p>
                </div>
              </div>
              <div class="flex items-start">
                <div class="w-6 h-6 bg-primary rounded-full flex items-center justify-center mr-4 mt-1"><span class="text-white text-sm font-bold">2</span></div>
                <div>
                  <h4 class="font-semibold text-secondary mb-2">Nilai Matematika & Bahasa Inggris</h4>
                  <p class="text-gray-600">Minimal 7.0 untuk kedua mata pelajaran</p>
                </div>
              </div>
              <div class="flex items-start">
                <div class="w-6 h-6 bg-primary rounded-full flex items-center justify-center mr-4 mt-1"><span class="text-white text-sm font-bold">3</span></div>
                <div>
                  <h4 class="font-semibold text-secondary mb-2">Tes Potensi Akademik</h4>
                  <p class="text-gray-600">Lulus tes TPA dengan skor minimal 500</p>
                </div>
              </div>
              <div class="flex items-start">
                <div class="w-6 h-6 bg-primary rounded-full flex items-center justify-center mr-4 mt-1"><span class="text-white text-sm font-bold">4</span></div>
                <div>
                  <h4 class="font-semibold text-secondary mb-2">Tes Kemampuan Dasar</h4>
                  <p class="text-gray-600">Matematika, Fisika, dan Bahasa Inggris</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Jalur Masuk -->
          <div class="bg-gradient-to-br from-primary to-secondary rounded-2xl p-8 text-white">
            <h3 class="text-2xl font-bold mb-6">Jalur Masuk</h3>
            <div class="space-y-6">
              <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                <h4 class="font-semibold mb-2 flex items-center"><i class="fas fa-star text-accent mr-2"></i>SNMPTN (Jalur Undangan)</h4>
                <p class="text-gray-200 text-sm mb-3">Berdasarkan prestasi akademik dan non-akademik</p>
                <div class="text-xs text-gray-300">
                  <div class="flex justify-between"><span>Kuota:</span><span>30%</span></div>
                  <div class="flex justify-between"><span>Pendaftaran:</span><span>Februari</span></div>
                </div>
              </div>
              <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                <h4 class="font-semibold mb-2 flex items-center"><i class="fas fa-pencil-alt text-accent mr-2"></i>SBMPTN (Jalur Tes)</h4>
                <p class="text-gray-200 text-sm mb-3">Berdasarkan hasil tes tertulis</p>
                <div class="text-xs text-gray-300">
                  <div class="flex justify-between"><span>Kuota:</span><span>50%</span></div>
                  <div class="flex justify-between"><span>Pendaftaran:</span><span>Mei</span></div>
                </div>
              </div>
              <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                <h4 class="font-semibold mb-2 flex items-center"><i class="fas fa-graduation-cap text-accent mr-2"></i>SIMAK UI (Jalur Mandiri)</h4>
                <p class="text-gray-200 text-sm mb-3">Tes mandiri yang diselenggarakan UI</p>
                <div class="text-xs text-gray-300">
                  <div class="flex justify-between"><span>Kuota:</span><span>20%</span></div>
                  <div class="flex justify-between"><span>Pendaftaran:</span><span>Juni</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- CTA -->
        <div class="text-center mt-16">
          <div class="bg-accent rounded-2xl p-8 max-w-4xl mx-auto">
            <h3 class="text-3xl font-bold text-white mb-4">Siap Bergabung dengan Kami?</h3>
            <p class="text-xl text-white mb-8">Daftar sekarang dan wujudkan impian Anda menjadi pendidik TIK profesional!</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
              <a href="#" class="bg-white text-accent px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors inline-block">Daftar Sekarang</a>
              <a href="{{ url('/kontak') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-accent transition-colors inline-block">Hubungi Kami</a>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
@endsection 