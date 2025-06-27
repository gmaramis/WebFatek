@extends('master')

@section('title', 'Teknik Elektro - Fakultas Teknik UNIMA')

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
                <i class="fas fa-bolt text-white text-2xl"></i>
              </div>
              <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Teknik Elektro</h1>
                <p class="text-xl text-gray-200">Program Studi S1</p>
              </div>
            </div>
            <p class="text-lg mb-8 text-gray-200 leading-relaxed">
              Program studi yang fokus pada sistem kelistrikan, elektronika, telekomunikasi, dan energi untuk mendukung kemajuan teknologi dan industri.
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
            Program Studi Teknik Elektro dirancang untuk menghasilkan lulusan yang kompeten dalam bidang kelistrikan, elektronika, telekomunikasi, dan energi terbarukan.
          </p>
        </div>
        <div class="grid md:grid-cols-3 gap-8 mb-16">
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-graduation-cap text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Visi</h3>
            <p class="text-gray-600">
              Menjadi program studi unggul dalam pengembangan ilmu dan teknologi elektro yang inovatif dan berdaya saing global.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-bullseye text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Misi</h3>
            <p class="text-gray-600">
              Menyelenggarakan pendidikan, penelitian, dan pengabdian masyarakat di bidang teknik elektro yang berkualitas dan relevan dengan kebutuhan industri dan masyarakat.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-users text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Tujuan</h3>
            <p class="text-gray-600">
              Menghasilkan lulusan yang profesional, beretika, dan mampu beradaptasi dengan perkembangan teknologi elektro dan energi.
            </p>
          </div>
        </div>
        <!-- Kompetensi Lulusan -->
        <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white">
          <h3 class="text-3xl font-bold mb-6 text-center">Kompetensi Lulusan</h3>
          <div class="grid md:grid-cols-2 gap-x-8 gap-y-6">
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Mampu merancang dan menganalisis sistem tenaga listrik dan elektronika.</p>
            </div>
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Menguasai teknologi telekomunikasi dan sistem kontrol modern.</p>
            </div>
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Mampu mengembangkan solusi energi terbarukan dan efisiensi energi.</p>
            </div>
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Memiliki kemampuan dalam instrumentasi dan otomasi industri.</p>
            </div>
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Berkompetensi dalam penggunaan perangkat lunak desain dan simulasi elektro.</p>
            </div>
            <div class="flex items-start space-x-4">
              <i class="fas fa-check-circle text-accent text-xl mt-1"></i>
              <p>Kreatif dan inovatif dalam menciptakan solusi teknologi berbasis elektro.</p>
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
            Kurikulum kami dirancang untuk memberikan landasan teori yang kuat dan pengalaman praktik yang relevan di bidang teknik elektro.
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
                    <i class="fas fa-charging-station"></i>
                  </div>
                  <div>
                    <h4 class="text-xl font-bold text-secondary">Teknik Tenaga Listrik</h4>
                    <p class="text-gray-600 mt-2">Fokus pada pembangkitan, transmisi, distribusi, dan manajemen energi listrik serta energi terbarukan.</p>
                  </div>
                </div>
              </div>
              <div class="curriculum-card relative bg-white p-6 rounded-lg shadow-lg overflow-hidden border border-gray-200">
                <div class="flex items-start space-x-6">
                  <div class="w-12 h-12 bg-accent text-white rounded-full flex items-center justify-center text-xl flex-shrink-0">
                    <i class="fas fa-satellite-dish"></i>
                  </div>
                  <div>
                    <h4 class="text-xl font-bold text-secondary">Telekomunikasi & Elektronika</h4>
                    <p class="text-gray-600 mt-2">Mempelajari sistem komunikasi, rekayasa sirkuit elektronik, dan pemrosesan sinyal digital.</p>
                  </div>
                </div>
              </div>
              <div class="curriculum-card relative bg-white p-6 rounded-lg shadow-lg overflow-hidden border border-gray-200">
                <div class="flex items-start space-x-6">
                  <div class="w-12 h-12 bg-secondary text-white rounded-full flex items-center justify-center text-xl flex-shrink-0">
                    <i class="fas fa-cogs"></i>
                  </div>
                  <div>
                    <h4 class="text-xl font-bold text-secondary">Sistem Kontrol & Instrumentasi</h4>
                    <p class="text-gray-600 mt-2">Mengembangkan sistem otomasi, kontrol industri, dan perancangan perangkat instrumentasi cerdas.</p>
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
                  <span>Rangkaian Listrik dan Elektronika Analog</span>
                </li>
                <li class="flex items-center text-gray-700">
                  <i class="fas fa-book-open text-primary mr-4"></i>
                  <span>Sistem Tenaga Elektrik dan Mesin Listrik</span>
                </li>
                <li class="flex items-center text-gray-700">
                  <i class="fas fa-book-open text-primary mr-4"></i>
                  <span>Sistem Telekomunikasi dan Teknik Digital</span>
                </li>
                <li class="flex items-center text-gray-700">
                  <i class="fas fa-book-open text-primary mr-4"></i>
                  <span>Sistem Kontrol dan Otomasi Industri</span>
                </li>
                <li class="flex items-center text-gray-700">
                  <i class="fas fa-book-open text-primary mr-4"></i>
                  <span>Energi Terbarukan dan Manajemen Energi</span>
                </li>
                <li class="flex items-center text-gray-700">
                  <i class="fas fa-book-open text-primary mr-4"></i>
                  <span>Mikroprosesor dan Sistem Tertanam</span>
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
            <div class="text-4xl text-primary mb-4"><i class="fas fa-microchip"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Lab. Rangkaian Listrik & Elektronika</h4>
          </div>
          <div class="bg-gray-50 p-6 rounded-lg text-center shadow-md hover:shadow-xl transition-shadow">
            <div class="text-4xl text-primary mb-4"><i class="fas fa-broadcast-tower"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Lab. Sistem Telekomunikasi</h4>
          </div>
          <div class="bg-gray-50 p-6 rounded-lg text-center shadow-md hover:shadow-xl transition-shadow">
            <div class="text-4xl text-primary mb-4"><i class="fas fa-cogs"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Lab. Sistem Kontrol & Otomasi</h4>
          </div>
          <div class="bg-gray-50 p-6 rounded-lg text-center shadow-md hover:shadow-xl transition-shadow">
            <div class="text-4xl text-primary mb-4"><i class="fas fa-solar-panel"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Lab. Energi Terbarukan</h4>
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
            <i class="fas fa-bolt text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Industri Ketenagalistrikan</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-satellite-dish text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Telekomunikasi</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-microchip text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Elektronika & Semikonduktor</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-robot text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Otomasi Industri</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-oil-can text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Minyak dan Gas</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-network-wired text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Teknologi Informasi</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-solar-panel text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Energi Terbarukan</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-users-cog text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Konsultan Teknik</h4>
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
          Jadilah bagian dari inovator masa depan di bidang Teknik Elektro. Daftar sekarang dan mulailah perjalanan Anda bersama kami di Fakultas Teknik UNIMA.
        </p>
        <a href="https://penerimaan.unima.ac.id/" target="_blank" class="bg-white text-primary hover:bg-gray-200 font-bold py-4 px-10 rounded-lg transition-colors text-lg">Info Pendaftaran</a>
      </div>
    </section>
@endsection