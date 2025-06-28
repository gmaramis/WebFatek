@extends('master')

@section('title', 'Teknik Sipil - Fakultas Teknik UNIMA')

@push('head')
<style>
  /* Gaya spesifik untuk halaman ini */
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
                <i class="fas fa-road text-white text-2xl"></i>
              </div>
              <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Teknik Sipil</h1>
                <p class="text-xl text-gray-200">Program Studi S1</p>
              </div>
            </div>
            <p class="text-lg mb-8 text-gray-200 leading-relaxed">
              Program studi yang berfokus pada perancangan, pembangunan, dan pemeliharaan infrastruktur seperti jalan, jembatan, gedung, dan fasilitas umum lainnya.
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
                  <div class="text-3xl font-bold text-white mb-2">94%</div>
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
            Program Studi Teknik Sipil dirancang untuk menghasilkan lulusan yang kompeten dalam bidang perancangan, pembangunan, dan pengelolaan infrastruktur sipil.
          </p>
        </div>
        <div class="grid md:grid-cols-3 gap-8 mb-16">
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-graduation-cap text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Visi</h3>
            <p class="text-gray-600">
              Menjadi program studi unggul dalam pengembangan ilmu dan teknologi infrastruktur sipil yang inovatif dan berkelanjutan.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-bullseye text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Misi</h3>
            <p class="text-gray-600">
              Menyelenggarakan pendidikan, penelitian, dan pengabdian masyarakat di bidang teknik sipil yang berkualitas dan relevan dengan kebutuhan industri dan masyarakat.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-users text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Tujuan</h3>
            <p class="text-gray-600">
              Menghasilkan lulusan yang profesional, beretika, dan mampu beradaptasi dengan perkembangan teknologi infrastruktur sipil.
            </p>
          </div>
        </div>
        <!-- Kompetensi Lulusan -->
        <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white">
          <h3 class="text-3xl font-bold mb-8 text-center">Kompetensi Lulusan</h3>
          <div class="grid md:grid-cols-2 gap-8">
            <div>
              <h4 class="text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-road mr-3 text-accent"></i>
                Kompetensi Utama
              </h4>
              <ul class="space-y-3">
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai prinsip dasar dan aplikasi teknik sipil</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Mampu merancang dan menganalisis struktur infrastruktur</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai teknologi konstruksi dan manajemen proyek</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Mampu mengoperasikan perangkat lunak teknik sipil</span></li>
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
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai teknologi infrastruktur berkelanjutan</span></li>
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
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">Kurikulum yang dirancang sesuai dengan kebutuhan industri konstruksi dan teknologi infrastruktur sipil terkini.</p>
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
                  <span class="font-medium text-gray-700">Matematika Dasar</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-atom text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Fisika Dasar</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-road text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Pengantar Teknik Sipil</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-code text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Menggambar Teknik</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-language text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Bahasa Inggris Teknik</span>
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
                  <i class="fas fa-road text-white text-lg"></i>
                </div>
              </div>
              <div class="space-y-4">
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-cube text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Mekanika Teknik</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-microchip text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Struktur Beton & Baja</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-tachometer-alt text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Konstruksi Jalan & Jembatan</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-tools text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Proses Produksi</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-building text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Teknik Pondasi</span>
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
                  <i class="fas fa-industry text-white text-lg"></i>
                </div>
              </div>
              <div class="space-y-4">
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-building text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Perancangan Struktur</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-industry text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Teknologi Konstruksi</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-robot text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Otomasi Konstruksi</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-desktop text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">CAD/CAE</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-chart-line text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Manajemen Proyek</span>
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
                  <span class="font-medium text-gray-700">Penelitian Teknik Sipil</span>
                </div>
                <div class="flex items-center text-sm bg-white/70 backdrop-blur-sm rounded-lg p-3 group-hover:bg-white/90 transition-all duration-300 hover:translate-x-2">
                  <i class="fas fa-school text-blue-600 mr-3 text-lg"></i>
                  <span class="font-medium text-gray-700">Praktik Industri</span>
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
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">Fasilitas modern yang mendukung pembelajaran dan penelitian di bidang teknik sipil.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
            <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
              <i class="fas fa-road text-white text-6xl"></i>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">Lab Struktur & Material</h3>
              <p class="text-gray-600 mb-4">Laboratorium untuk praktikum struktur, material, dan uji kekuatan bahan bangunan.</p>
              <ul class="text-sm text-gray-600 space-y-1">
                <li>• Mesin Uji Material</li>
                <li>• Model Struktur</li>
                <li>• Perangkat CAD/CAE</li>
                <li>• Peralatan Uji Beton</li>
              </ul>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
            <div class="h-48 bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center">
              <i class="fas fa-water text-white text-6xl"></i>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">Lab Hidrolika</h3>
              <p class="text-gray-600 mb-4">Laboratorium untuk praktikum hidrolika, irigasi, dan pengelolaan sumber daya air.</p>
              <ul class="text-sm text-gray-600 space-y-1">
                <li>• Kanal Uji Air</li>
                <li>• Peralatan Irigasi</li>
                <li>• Simulasi Hidrolika</li>
                <li>• Perangkat Uji Sumber Daya Air</li>
              </ul>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
              <i class="fas fa-chalkboard-teacher text-white text-6xl"></i>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">Ruang Seminar</h3>
              <p class="text-gray-600 mb-4">Ruang seminar dan presentasi dengan teknologi audio-visual modern.</p>
              <ul class="text-sm text-gray-600 space-y-1">
                <li>• Projector HD</li>
                <li>• Audio System</li>
                <li>• Video Conference</li>
                <li>• Interactive Whiteboard</li>
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
          <p class="text-xl text-gray-200 max-w-3xl mx-auto">Lulusan Teknik Sipil memiliki prospek karir yang luas di berbagai sektor industri konstruksi dan infrastruktur.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
            <div class="flex items-center mb-4">
              <i class="fas fa-road text-accent text-2xl mr-3"></i>
              <h3 class="text-xl font-semibold">Engineer Sipil</h3>
            </div>
            <p class="text-gray-200 mb-4">Merancang, mengembangkan, dan menguji struktur infrastruktur di industri konstruksi.</p>
            <div class="text-sm text-gray-300">
              <div class="flex items-center mb-2"><i class="fas fa-building mr-2"></i><span>Industri Konstruksi, Infrastruktur</span></div>
              <div class="flex items-center"><i class="fas fa-money-bill-wave mr-2"></i><span>Rp 7-20 juta/bulan</span></div>
            </div>
          </div>
          <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
            <div class="flex items-center mb-4">
              <i class="fas fa-industry text-accent text-2xl mr-3"></i>
              <h3 class="text-xl font-semibold">Manajer Proyek</h3>
            </div>
            <p class="text-gray-200 mb-4">Mengelola proyek konstruksi dan infrastruktur di perusahaan teknologi.</p>
            <div class="text-sm text-gray-300">
              <div class="flex items-center mb-2"><i class="fas fa-building mr-2"></i><span>Perusahaan Konstruksi, Infrastruktur</span></div>
              <div class="flex items-center"><i class="fas fa-money-bill-wave mr-2"></i><span>Rp 10-30 juta/bulan</span></div>
            </div>
          </div>
          <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
            <div class="flex items-center mb-4">
              <i class="fas fa-user-cog text-accent text-2xl mr-3"></i>
              <h3 class="text-xl font-semibold">Konsultan Teknik Sipil</h3>
            </div>
            <p class="text-gray-200 mb-4">Memberikan konsultasi dan solusi teknis di bidang konstruksi dan infrastruktur.</p>
            <div class="text-sm text-gray-300">
              <div class="flex items-center mb-2"><i class="fas fa-building mr-2"></i><span>Konsultan, Industri</span></div>
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
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">Persiapkan diri Anda untuk bergabung dengan Program Studi Teknik Sipil.</p>
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
                  <p class="text-gray-600">Jurusan IPA atau SMK Teknik Sipil</p>
                </div>
              </div>
              <div class="flex items-start">
                <div class="w-6 h-6 bg-primary rounded-full flex items-center justify-center mr-4 mt-1"><span class="text-white text-sm font-bold">2</span></div>
                <div>
                  <h4 class="font-semibold text-secondary mb-2">Nilai Matematika & Fisika</h4>
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
            <p class="text-xl text-white mb-8">Daftar sekarang dan wujudkan impian Anda menjadi insinyur sipil profesional!</p>
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