@extends('master')

@section('title', 'Teknik Informatika - Fakultas Teknik UNIMA')

@push('head')
<style>
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
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Teknik Informatika</h1>
                <p class="text-xl text-gray-200">Program Studi S1</p>
              </div>
            </div>
            <p class="text-lg mb-8 text-gray-200 leading-relaxed">
              Program studi yang berfokus pada pengembangan perangkat lunak, sistem informasi, dan teknologi komputasi untuk memenuhi kebutuhan industri digital.
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
                  <div class="text-3xl font-bold text-white mb-2">96%</div>
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
            Program Studi Teknik Informatika dirancang untuk menghasilkan lulusan yang kompeten dalam pengembangan perangkat lunak, sistem informasi, dan teknologi komputasi.
          </p>
        </div>
        <div class="grid md:grid-cols-3 gap-8 mb-16">
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-graduation-cap text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Visi</h3>
            <p class="text-gray-600">
              Menjadi program studi unggul dalam pengembangan teknologi informasi dan komunikasi yang inovatif dan berkelanjutan.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-bullseye text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Misi</h3>
            <p class="text-gray-600">
              Menyelenggarakan pendidikan, penelitian, dan pengabdian masyarakat di bidang teknologi informasi yang berkualitas dan relevan dengan kebutuhan industri.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-users text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Tujuan</h3>
            <p class="text-gray-600">
              Menghasilkan lulusan yang profesional, beretika, dan mampu beradaptasi dengan perkembangan teknologi informasi.
            </p>
          </div>
        </div>
        <!-- Kompetensi Lulusan -->
        <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white">
          <h3 class="text-3xl font-bold mb-8 text-center">Kompetensi Lulusan</h3>
          <div class="grid md:grid-cols-2 gap-8">
            <div>
              <h4 class="text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-laptop-code mr-3 text-accent"></i>
                Kompetensi Utama
              </h4>
              <ul class="space-y-3">
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai prinsip dasar dan aplikasi teknologi informasi</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Mampu mengembangkan perangkat lunak dan sistem informasi</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai teknologi database dan jaringan komputer</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Mampu menganalisis dan merancang sistem informasi</span></li>
              </ul>
            </div>
            <div>
              <h4 class="text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-brain mr-3 text-accent"></i>
                Kompetensi Pendukung
              </h4>
              <ul class="space-y-3">
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Mampu bekerja dalam tim dan berkomunikasi efektif</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Memiliki jiwa kepemimpinan dan inovasi</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai teknologi terkini dan berkelanjutan</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Memahami etika profesi dan tanggung jawab sosial</span></li>
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
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">Kurikulum yang dirancang sesuai dengan kebutuhan industri teknologi informasi dan komunikasi terkini.</p>
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
                  <i class="fas fa-calculator text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Matematika Diskrit</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-code text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Pemrograman Dasar</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-laptop text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Pengantar Teknologi Informasi</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-language text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Bahasa Inggris Teknik</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-atom text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Fisika Dasar</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Semester 3-4 -->
          <div class="curriculum-card group bg-gradient-to-br from-green-50 to-green-100 rounded-xl shadow-lg p-6 border border-green-200 hover:shadow-2xl hover:scale-105 transition-all duration-500 cursor-pointer relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
              <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-green-800">Semester 3-4</h3>
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-laptop-code text-white text-lg"></i>
                </div>
              </div>
              <div class="space-y-4">
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-database text-green-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Struktur Data</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-project-diagram text-green-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Algoritma & Pemrograman</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-network-wired text-green-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Jaringan Komputer</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-database text-green-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Basis Data</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-object-group text-green-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Pemrograman Berorientasi Objek</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Semester 5-6 -->
          <div class="curriculum-card group bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl shadow-lg p-6 border border-purple-200 hover:shadow-2xl hover:scale-105 transition-all duration-500 cursor-pointer relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
              <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-purple-800">Semester 5-6</h3>
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-cogs text-white text-lg"></i>
                </div>
              </div>
              <div class="space-y-4">
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-sitemap text-purple-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Rekayasa Perangkat Lunak</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-globe text-purple-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Pemrograman Web</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-mobile-alt text-purple-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Pemrograman Mobile</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-shield-alt text-purple-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Keamanan Sistem</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-chart-line text-purple-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Inteligensi Buatan</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Semester 7-8 -->
          <div class="curriculum-card group bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl shadow-lg p-6 border border-orange-200 hover:shadow-2xl hover:scale-105 transition-all duration-500 cursor-pointer relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10">
              <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-orange-800">Semester 7-8</h3>
                <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                  <i class="fas fa-rocket text-white text-lg"></i>
                </div>
              </div>
              <div class="space-y-4">
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-project-diagram text-orange-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Proyek Sistem Informasi</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-graduation-cap text-orange-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Skripsi</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-briefcase text-orange-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Magang Industri</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-users text-orange-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Kewirausahaan TI</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-certificate text-orange-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Sertifikasi Profesi</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Prospek Karir -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-secondary mb-4">Prospek Karir</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">Lulusan Teknik Informatika memiliki prospek karir yang sangat luas di berbagai sektor industri.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200 hover:shadow-lg transition-all duration-300">
            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
              <i class="fas fa-code text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-blue-800 mb-3">Software Developer</h3>
            <p class="text-gray-600">Mengembangkan aplikasi dan perangkat lunak untuk berbagai platform dan kebutuhan bisnis.</p>
          </div>
          <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 border border-green-200 hover:shadow-lg transition-all duration-300">
            <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-4">
              <i class="fas fa-database text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-green-800 mb-3">Database Administrator</h3>
            <p class="text-gray-600">Mengelola dan mengoptimalkan sistem database untuk organisasi dan perusahaan.</p>
          </div>
          <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 border border-purple-200 hover:shadow-lg transition-all duration-300">
            <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-4">
              <i class="fas fa-network-wired text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-purple-800 mb-3">Network Engineer</h3>
            <p class="text-gray-600">Merancang, mengimplementasikan, dan mengelola infrastruktur jaringan komputer.</p>
          </div>
          <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-6 border border-orange-200 hover:shadow-lg transition-all duration-300">
            <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center mb-4">
              <i class="fas fa-shield-alt text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-orange-800 mb-3">Cybersecurity Analyst</h3>
            <p class="text-gray-600">Melindungi sistem informasi dari ancaman keamanan siber dan serangan digital.</p>
          </div>
          <div class="bg-gradient-to-br from-red-50 to-red-100 rounded-xl p-6 border border-red-200 hover:shadow-lg transition-all duration-300">
            <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center mb-4">
              <i class="fas fa-chart-line text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-red-800 mb-3">Data Scientist</h3>
            <p class="text-gray-600">Menganalisis data untuk menghasilkan insight yang berguna bagi pengambilan keputusan.</p>
          </div>
          <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-xl p-6 border border-indigo-200 hover:shadow-lg transition-all duration-300">
            <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center mb-4">
              <i class="fas fa-project-diagram text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-indigo-800 mb-3">System Analyst</h3>
            <p class="text-gray-600">Menganalisis kebutuhan sistem dan merancang solusi teknologi informasi.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Admission Section -->
    <section id="admission" class="py-20 bg-gradient-to-br from-primary to-secondary">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-white mb-4">Informasi Pendaftaran</h2>
          <p class="text-xl text-gray-200 max-w-3xl mx-auto">Bergabunglah dengan Program Studi Teknik Informatika dan wujudkan impian Anda di dunia teknologi.</p>
        </div>
        <div class="grid md:grid-cols-2 gap-12">
          <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
            <h3 class="text-2xl font-bold text-white mb-6">Persyaratan Pendaftaran</h3>
            <ul class="space-y-4">
              <li class="flex items-start">
                <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                <span class="text-gray-200">Lulus SMA/MA/SMK dengan jurusan IPA atau SMK Teknologi</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                <span class="text-gray-200">Nilai rata-rata UN minimal 7.0</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                <span class="text-gray-200">Lulus tes seleksi masuk perguruan tinggi</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-accent mt-1 mr-3"></i>
                <span class="text-gray-200">Sehat jasmani dan rohani</span>
              </li>
            </ul>
          </div>
          <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
            <h3 class="text-2xl font-bold text-white mb-6">Jadwal Pendaftaran</h3>
            <div class="space-y-6">
              <div class="flex items-center">
                <div class="w-12 h-12 bg-accent rounded-full flex items-center justify-center mr-4">
                  <i class="fas fa-calendar-alt text-white"></i>
                </div>
                <div>
                  <h4 class="text-white font-semibold">Pendaftaran Gelombang I</h4>
                  <p class="text-gray-200">Januari - Maret 2024</p>
                </div>
              </div>
              <div class="flex items-center">
                <div class="w-12 h-12 bg-accent rounded-full flex items-center justify-center mr-4">
                  <i class="fas fa-calendar-alt text-white"></i>
                </div>
                <div>
                  <h4 class="text-white font-semibold">Pendaftaran Gelombang II</h4>
                  <p class="text-gray-200">April - Juni 2024</p>
                </div>
              </div>
              <div class="flex items-center">
                <div class="w-12 h-12 bg-accent rounded-full flex items-center justify-center mr-4">
                  <i class="fas fa-calendar-alt text-white"></i>
                </div>
                <div>
                  <h4 class="text-white font-semibold">Pendaftaran Gelombang III</h4>
                  <p class="text-gray-200">Juli - Agustus 2024</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-12">
          <a href="{{ url('/kontak') }}" class="bg-accent hover:bg-yellow-600 text-white px-8 py-4 rounded-lg font-semibold text-lg transition-colors inline-block">
            Hubungi Kami untuk Informasi Lebih Lanjut
          </a>
        </div>
      </div>
    </section>
</main>
@endsection 