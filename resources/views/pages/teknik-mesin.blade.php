@extends('master')

@section('title', 'Teknik Mesin - Fakultas Teknik UNIMA')

@section('content')
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
                <i class="fas fa-cogs text-white text-2xl"></i>
              </div>
              <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Teknik Mesin</h1>
                <p class="text-xl text-gray-200">Program Studi S1</p>
              </div>
            </div>
            <p class="text-lg mb-8 text-gray-200 leading-relaxed">
              Program studi yang fokus pada desain, pengembangan, dan rekayasa sistem mekanik serta teknologi manufaktur untuk mendukung kemajuan industri.
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
            Program Studi Teknik Mesin dirancang untuk menghasilkan lulusan yang kompeten dalam bidang rekayasa mesin, manufaktur, dan teknologi industri.
          </p>
        </div>
        <div class="grid md:grid-cols-3 gap-8 mb-16">
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-graduation-cap text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Visi</h3>
            <p class="text-gray-600">
              Menjadi program studi unggul dalam pengembangan ilmu dan teknologi mesin yang inovatif dan berdaya saing global.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-bullseye text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Misi</h3>
            <p class="text-gray-600">
              Menyelenggarakan pendidikan, penelitian, dan pengabdian masyarakat di bidang teknik mesin yang berkualitas dan relevan dengan kebutuhan industri.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-users text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Tujuan</h3>
            <p class="text-gray-600">
              Menghasilkan lulusan yang profesional, beretika, dan mampu beradaptasi dengan perkembangan teknologi mesin dan industri.
            </p>
          </div>
        </div>
        <!-- Kompetensi Lulusan -->
        <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white">
          <h3 class="text-3xl font-bold mb-6 text-center">Kompetensi Lulusan</h3>
          <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Mampu merancang dan menganalisis sistem mekanik dan termal.</p>
            </div>
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Menguasai teknologi manufaktur modern dan otomasi industri.</p>
            </div>
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Mampu melakukan perawatan dan perbaikan mesin industri.</p>
            </div>
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Memiliki kemampuan dalam manajemen proyek rekayasa.</p>
            </div>
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Berkompetensi dalam penggunaan perangkat lunak desain dan simulasi.</p>
            </div>
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Kreatif dan inovatif dalam menciptakan solusi rekayasa.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Kurikulum Section -->
    <section class="py-20 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-secondary mb-4">Struktur Kurikulum</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Kurikulum kami dirancang untuk memberikan landasan teori yang kuat dan pengalaman praktik yang relevan.
          </p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-start">
          <!-- Bidang Keahlian -->
          <div>
            <h3 class="text-3xl font-semibold text-secondary mb-8">Bidang Keahlian</h3>
            <div class="space-y-6">
              <div class="curriculum-card relative bg-white p-6 rounded-lg shadow-lg overflow-hidden border border-gray-200">
                <div class="flex items-start space-x-6">
                  <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center text-xl flex-shrink-0">
                    <i class="fas fa-robot"></i>
                  </div>
                  <div>
                    <h4 class="text-xl font-bold text-secondary">Manufaktur dan Otomasi</h4>
                    <p class="text-gray-600 mt-2">Fokus pada proses produksi, perancangan sistem manufaktur, dan implementasi otomasi industri untuk efisiensi.</p>
                  </div>
                </div>
              </div>
              <div class="curriculum-card relative bg-white p-6 rounded-lg shadow-lg overflow-hidden border border-gray-200">
                <div class="flex items-start space-x-6">
                  <div class="w-12 h-12 bg-accent text-white rounded-full flex items-center justify-center text-xl flex-shrink-0">
                    <i class="fas fa-bolt"></i>
                  </div>
                  <div>
                    <h4 class="text-xl font-bold text-secondary">Konversi Energi</h4>
                    <p class="text-gray-600 mt-2">Mempelajari sistem pembangkit tenaga, mesin konversi energi, dan teknologi energi terbarukan.</p>
                  </div>
                </div>
              </div>
              <div class="curriculum-card relative bg-white p-6 rounded-lg shadow-lg overflow-hidden border border-gray-200">
                <div class="flex items-start space-x-6">
                  <div class="w-12 h-12 bg-secondary text-white rounded-full flex items-center justify-center text-xl flex-shrink-0">
                    <i class="fas fa-drafting-compass"></i>
                  </div>
                  <div>
                    <h4 class="text-xl font-bold text-secondary">Rekayasa dan Perancangan</h4>
                    <p class="text-gray-600 mt-2">Mengembangkan kemampuan dalam perancangan produk mekanik, analisis kekuatan material, dan dinamika struktur.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Mata Kuliah Unggulan -->
          <div>
            <h3 class="text-3xl font-semibold text-secondary mb-8">Mata Kuliah Unggulan</h3>
            <div class="bg-white rounded-lg shadow-lg p-8 border border-gray-200">
              <ul class="space-y-5">
                <li class="flex items-center text-gray-700">
                  <i class="fas fa-book-open text-primary mr-4"></i>
                  <span>Mekanika Fluida dan Termodinamika</span>
                </li>
                <li class="flex items-center text-gray-700">
                  <i class="fas fa-book-open text-primary mr-4"></i>
                  <span>Proses Manufaktur dan Material Teknik</span>
                </li>
                <li class="flex items-center text-gray-700">
                  <i class="fas fa-book-open text-primary mr-4"></i>
                  <span>Elemen Mesin dan Perancangan Mekanik</span>
                </li>
                <li class="flex items-center text-gray-700">
                  <i class="fas fa-book-open text-primary mr-4"></i>
                  <span>Sistem Kontrol dan Otomasi Industri</span>
                </li>
                <li class="flex items-center text-gray-700">
                  <i class="fas fa-book-open text-primary mr-4"></i>
                  <span>Manajemen Energi dan Energi Terbarukan</span>
                </li>
                <li class="flex items-center text-gray-700">
                  <i class="fas fa-book-open text-primary mr-4"></i>
                  <span>Metode Elemen Hingga dalam Rekayasa</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Fasilitas Laboratorium -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-secondary mb-4">Fasilitas Laboratorium</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Laboratorium modern kami mendukung kegiatan praktikum dan penelitian mahasiswa untuk mendapatkan pengalaman langsung.
          </p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          <div class="bg-gray-50 p-6 rounded-lg text-center shadow-md hover:shadow-xl transition-shadow">
            <div class="text-4xl text-primary mb-4"><i class="fas fa-industry"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Lab. Proses Produksi</h4>
          </div>
          <div class="bg-gray-50 p-6 rounded-lg text-center shadow-md hover:shadow-xl transition-shadow">
            <div class="text-4xl text-primary mb-4"><i class="fas fa-ruler-combined"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Lab. Metrologi Industri</h4>
          </div>
          <div class="bg-gray-50 p-6 rounded-lg text-center shadow-md hover:shadow-xl transition-shadow">
            <div class="text-4xl text-primary mb-4"><i class="fas fa-wind"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Lab. Fenomena Dasar Mesin</h4>
          </div>
          <div class="bg-gray-50 p-6 rounded-lg text-center shadow-md hover:shadow-xl transition-shadow">
            <div class="text-4xl text-primary mb-4"><i class="fas fa-car-battery"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Lab. Motor Bakar</h4>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Prospek Karir Section -->
    <section class="py-20 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-secondary mb-4">Prospek Karir Lulusan</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Lulusan kami memiliki peluang karir yang luas di berbagai sektor industri strategis.
          </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-industry text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Industri Manufaktur</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-oil-can text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Sektor Energi</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-car text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Otomotif</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-plane text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Dirgantara</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-hard-hat text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Konstruksi</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-microchip text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Elektronika</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-seedling text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Agroindustri</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-users-cog text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Konsultan Rekayasa</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-lightbulb text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Wirausaha</h4>
          </div>
           <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-university text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Pemerintahan & Akademisi</h4>
          </div>
        </div>
      </div>
    </section>

    <!-- Admission Section -->
    <section id="admission" class="py-20 bg-primary text-white">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Bergabunglah dengan Kami</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
          Jadilah bagian dari inovator masa depan di bidang Teknik Mesin. Daftar sekarang dan mulailah perjalanan Anda bersama kami di Fakultas Teknik UNIMA.
        </p>
        <a href="https://penerimaan.unima.ac.id/" target="_blank" class="bg-white text-primary hover:bg-gray-200 font-bold py-4 px-10 rounded-lg transition-colors text-lg">Info Pendaftaran</a>
      </div>
    </section>
@endsection