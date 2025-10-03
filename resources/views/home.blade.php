@extends('master')

@section('title', 'Fakultas Teknik - Universitas Negeri Manado')

@section('content')
    <!-- Hero Slider -->
    <section id="home">
      <div class="hero-slider relative h-screen">
        @if(isset($sliders) && $sliders->count() > 0)
          @foreach($sliders as $index => $slider)
            <div class="slide {{ $index === 0 ? 'active' : '' }} absolute inset-0 flex items-center justify-center bg-black transition-all duration-1000" data-aos="fade-in">
              <img src="{{ asset('storage/' . $slider->gambar) }}" alt="{{ $slider->judul }}" class="object-cover w-full h-full opacity-80" />
              <div class="absolute left-0 right-0 bottom-0 p-8 bg-gradient-to-t from-black/70 to-transparent">
                <div class="max-w-2xl mx-auto text-white text-center">
                  <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight drop-shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    {{ $slider->judul }}
                  </h1>
                  <p class="text-xl mb-8 text-gray-200 drop-shadow" data-aos="fade-up" data-aos-delay="400">
                    {{ $slider->deskripsi }}
                  </p>
                  @if($slider->link)
                    <a href="{{ $slider->link }}" class="inline-block bg-primary hover:bg-accent text-white px-8 py-3 rounded-lg font-semibold transition-colors" data-aos="fade-up" data-aos-delay="600">
                      Selengkapnya
                    </a>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        @else
          <!-- Fallback: Slide 1: Foto Gedung Fakultas Teknik -->
          <div class="slide active absolute inset-0 flex items-center justify-center bg-black transition-all duration-1000" data-aos="fade-in">
            <img src="{{ asset('img/fto fatek 1.jpg') }}" alt="Gedung Fakultas Teknik" class="object-cover w-full h-full opacity-80" />
            <div class="absolute left-0 right-0 bottom-0 p-8 bg-gradient-to-t from-black/70 to-transparent">
              <div class="max-w-2xl mx-auto text-white text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight drop-shadow-lg" data-aos="fade-up" data-aos-delay="200">
                  FAKULTAS TEKNIK
                </h1>
                <p class="text-xl mb-8 text-gray-200 drop-shadow" data-aos="fade-up" data-aos-delay="400">
                  Gedung Fakultas Teknik Universitas Negeri Manado
                </p>
              </div>
            </div>
          </div>
          <!-- Slide 2 -->
          <div class="slide absolute inset-0 bg-gradient-to-r from-secondary to-primary flex items-center transition-all duration-1000" data-aos="fade-in">
            <div class="container mx-auto px-4">
              <div class="max-w-2xl text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight" data-aos="fade-up" data-aos-delay="200">
                  Inovasi & <span class="text-accent">Penelitian</span>
                </h1>
                <p class="text-xl mb-8 text-gray-200" data-aos="fade-up" data-aos-delay="400">
                  Mengembangkan solusi teknologi untuk tantangan global melalui penelitian dan kolaborasi internasional.
                </p>
              </div>
            </div>
          </div>
          <!-- Slide 3 -->
          <div class="slide absolute inset-0 bg-gradient-to-r from-primary to-accent flex items-center transition-all duration-1000" data-aos="fade-in">
            <div class="container mx-auto px-4">
              <div class="max-w-2xl text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight" data-aos="fade-up" data-aos-delay="200">
                  Karir <span class="text-white">Cemerlang</span>
                </h1>
                <p class="text-xl mb-8 text-gray-200" data-aos="fade-up" data-aos-delay="400">
                  Lulusan kami telah bekerja di perusahaan teknologi terkemuka di Indonesia dan internasional.
                </p>
              </div>
            </div>
          </div>
        @endif

        <!-- Slider Controls -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3">
          @if(isset($sliders) && $sliders->count() > 0)
            @foreach($sliders as $index => $slider)
              <button class="slider-dot w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/50' }} hover:bg-white transition-colors" data-slide="{{ $index }}"></button>
            @endforeach
          @else
            <button class="slider-dot w-3 h-3 rounded-full bg-white hover:bg-white transition-colors" data-slide="0"></button>
            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors" data-slide="1"></button>
            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors" data-slide="2"></button>
          @endif
        </div>
        <!-- Navigation Arrows -->
        <button class="slider-nav absolute left-4 top-1/2 transform -translate-y-1/2 text-white text-2xl hover:text-accent transition-colors" id="prev-slide">
          <i class="fas fa-chevron-left"></i>
        </button>
        <button class="slider-nav absolute right-4 top-1/2 transform -translate-y-1/2 text-white text-2xl hover:text-accent transition-colors" id="next-slide">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="py-20 bg-gray-50" data-aos="fade-up">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-secondary mb-4">Program Studi</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Pilihan program studi yang dirancang untuk memenuhi kebutuhan pendidikan dan teknologi masa depan.
          </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- PTIK -->
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="zoom-in">
            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('img/PTIK.jpg') }}');"></div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">
                Pendidikan Teknologi Informasi & Komunikasi
              </h3>
              <p class="text-gray-600 mb-4">
                Program studi yang mempersiapkan pendidik profesional dalam bidang teknologi informasi dan komunikasi.
              </p>
              {{-- <a href="{{ url('pages/ptik') }}" class="text-primary hover:text-accent font-semibold">Pelajari Lebih Lanjut →</a> --}}
            </div>
          </div>

          <!-- Teknik Informatika -->
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="zoom-in">
            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('img/TI.jpg') }}');"></div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">
                Teknik Informatika
              </h3>
              <p class="text-gray-600 mb-4">
                Program studi yang fokus pada pengembangan software, artificial intelligence, dan teknologi informasi.
              </p>
              {{-- <a href="{{ url('pages/teknik-informatika') }}" class="text-primary hover:text-accent font-semibold">Pelajari Lebih Lanjut →</a> --}}
            </div>
          </div>

          <!-- Pendidikan Teknik Elektro -->
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="zoom-in">
            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('img/elektro.jpg') }}');"></div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">
                Pendidikan Teknik Elektro
              </h3>
              <p class="text-gray-600 mb-4">
                Program studi yang mempersiapkan pendidik profesional dalam bidang teknik elektro dan elektronika.
              </p>
              {{-- <a href="{{ url('pages/teknik-elektro') }}" class="text-primary hover:text-accent font-semibold">Pelajari Lebih Lanjut →</a> --}}
            </div>
          </div>

          <!-- Pendidikan Teknik Mesin -->
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="zoom-in">
            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('img/mesin.jpg') }}');"></div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">
                Pendidikan Teknik Mesin
              </h3>
              <p class="text-gray-600 mb-4">
                Program studi yang mempersiapkan pendidik profesional dalam bidang teknik mesin dan mekatronika.
              </p>
              {{-- <a href="{{ url('pages/teknik-mesin') }}" class="text-primary hover:text-accent font-semibold">Pelajari Lebih Lanjut →</a> --}}
            </div>
          </div>

          <!-- Pendidikan Teknik Bangunan -->
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="zoom-in">
            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('img/PTB.jpg') }}');"></div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">
                Pendidikan Teknik Bangunan
              </h3>
              <p class="text-gray-600 mb-4">
                Program studi yang mempersiapkan pendidik profesional dalam bidang teknik bangunan dan konstruksi.
              </p>
              {{-- <a href="{{ url('pages/teknik-bangunan') }}" class="text-primary hover:text-accent font-semibold">Pelajari Lebih Lanjut →</a> --}}
            </div>
          </div>

          <!-- Pendidikan Kesejahteraan Keluarga -->
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="zoom-in">
            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('img/PKK.jpg') }}');"></div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">
                Pendidikan Kesejahteraan Keluarga
              </h3>
              <p class="text-gray-600 mb-4">
                Program studi yang mempersiapkan pendidik profesional dalam bidang kesejahteraan keluarga dan tata boga.
              </p>
              {{-- <a href="{{ url('pages/pkk') }}" class="text-primary hover:text-accent font-semibold">Pelajari Lebih Lanjut →</a> --}}
            </div>
          </div>

          <!-- Arsitektur -->
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="zoom-in">
            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('img/ars.jpg') }}');"></div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">
                Arsitektur
              </h3>
              <p class="text-gray-600 mb-4">
                Program studi yang fokus pada desain dan perencanaan bangunan yang berkelanjutan dan ramah lingkungan.
              </p>
              {{-- <a href="{{ url('pages/arsitektur') }}" class="text-primary hover:text-accent font-semibold">Pelajari Lebih Lanjut →</a> --}}
            </div>
          </div>

          <!-- Teknik Sipil -->
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="zoom-in">
            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('img/sipil.jpg') }}');"></div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">
                Teknik Sipil
              </h3>
              <p class="text-gray-600 mb-4">
                Program studi yang fokus pada perencanaan, desain, dan konstruksi infrastruktur untuk pembangunan berkelanjutan.
              </p>
              {{-- <a href="{{ url('pages/teknik-sipil') }}" class="text-primary hover:text-accent font-semibold">Pelajari Lebih Lanjut →</a> --}}
            </div>
          </div>

          <!-- Teknik Mesin -->
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="zoom-in">
            <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('img/mesin 2.jpg') }}');"></div>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-secondary mb-3">
                Teknik Mesin
              </h3>
              <p class="text-gray-600 mb-4">
                Program studi yang fokus pada desain dan pengembangan sistem mekanik untuk berbagai aplikasi industri.
              </p>
              {{-- <a href="{{ url('pages/teknik-mesin') }}" class="text-primary hover:text-accent font-semibold">Pelajari Lebih Lanjut →</a> --}}
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- News & Video Section -->
    <section id="news" class="py-20 bg-white" data-aos="fade-up">
      <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12">
          <!-- News Section - Left Side -->
          <div>
            <h3 class="text-2xl font-bold text-secondary mb-8">Berita Terbaru</h3>
            <div class="space-y-8">
              @if(isset($beritaTerbaru) && $beritaTerbaru->count() > 0)
                @foreach($beritaTerbaru as $berita)
                  <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow border border-gray-100">
                    <div class="p-6">
                      <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-calendar mr-2"></i>
                        <span>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}</span>
                      </div>
                      <h4 class="text-xl font-semibold text-secondary mb-3">
                        {{ $berita->judul }}
                      </h4>
                      <p class="text-gray-600 mb-4">
                        {!! Str::limit(strip_tags($berita->isi), 150) !!}
                      </p>
                      <a href="{{ url('berita/' . $berita->slug) }}" class="text-primary hover:text-accent font-semibold">Baca Selengkapnya →</a>
                    </div>
                  </article>
                @endforeach
              @else
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow border border-gray-100">
                  <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                      <i class="fas fa-calendar mr-2"></i>
                      <span>15 Desember 2024</span>
                    </div>
                    <h4 class="text-xl font-semibold text-secondary mb-3">
                      Mahasiswa FT UNIMA Raih Juara Kompetisi Robotik Nasional
                    </h4>
                    <p class="text-gray-600 mb-4">
                      Tim robotik Fakultas Teknik UNIMA berhasil meraih juara pertama dalam kompetisi robotik nasional yang diselenggarakan di Bandung.
                    </p>
                    <a href="{{ url('berita') }}" class="text-primary hover:text-accent font-semibold">Lihat Semua Berita →</a>
                  </div>
                </article>

                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow border border-gray-100">
                  <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                      <i class="fas fa-calendar mr-2"></i>
                      <span>12 Desember 2024</span>
                    </div>
                    <h4 class="text-xl font-semibold text-secondary mb-3">
                      Kerjasama Baru dengan Google untuk Program AI
                    </h4>
                    <p class="text-gray-600 mb-4">
                      Fakultas Teknik UNIMA menandatangani kerjasama dengan Google untuk pengembangan program artificial intelligence.
                    </p>
                    <a href="{{ url('berita') }}" class="text-primary hover:text-accent font-semibold">Lihat Semua Berita →</a>
                  </div>
                </article>

                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow border border-gray-100">
                  <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                      <i class="fas fa-calendar mr-2"></i>
                      <span>10 Desember 2024</span>
                    </div>
                    <h4 class="text-xl font-semibold text-secondary mb-3">
                      Laboratorium Baru untuk Teknologi Hijau
                    </h4>
                    <p class="text-gray-600 mb-4">
                      Fakultas Teknik UNIMA meresmikan laboratorium teknologi hijau yang dilengkapi dengan peralatan terkini.
                    </p>
                    <a href="{{ url('berita') }}" class="text-primary hover:text-accent font-semibold">Lihat Semua Berita →</a>
                  </div>
                </article>
              @endif
            </div>

            <div class="text-center mt-8">
              <a href="{{ url('berita') }}" class="bg-primary hover:bg-accent text-white px-8 py-3 rounded-lg font-semibold transition-colors inline-block">
                Lihat Semua Berita
              </a>
            </div>
          </div>

          <!-- Video Section - Right Side -->
          <div>
            <h3 class="text-2xl font-bold text-secondary mb-8">Video Teknik</h3>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow border border-gray-100">
              <div class="relative">
                <iframe
                  class="w-full h-80 md:h-96"
                  src="https://www.youtube.com/embed/XNj2W-tLkic?si=uxgSYOVmwYB5IiiP"
                  title="Video Profil Fakultas Teknik UNIMA"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen>
                </iframe>
              </div>
              <div class="p-6">
                <h4 class="text-xl font-semibold text-secondary mb-3">
                  Profil Fakultas Teknik UNIMA
                </h4>
                <p class="text-gray-600 mb-4">
                  Kenali lebih dekat Fakultas Teknik Universitas Negeri Manado melalui video profil yang menampilkan fasilitas, program studi, dan prestasi mahasiswa.
                </p>
                <div class="flex items-center text-sm text-gray-500">
                  <i class="fas fa-play-circle mr-2 text-primary"></i>
                  <span>Video Profil FT UNIMA</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Announcements Section -->
    <section id="announcements" class="py-20 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-secondary mb-4">
            Pengumuman Penting
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Informasi penting terkait akademik, beasiswa, dan kegiatan mahasiswa.
          </p>
        </div>
        <div class="max-w-4xl mx-auto">
          <div class="space-y-6">
            @if(isset($pengumumanTerbaru) && $pengumumanTerbaru->count() > 0)
              @foreach($pengumumanTerbaru as $pengumuman)
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow border-l-4 border-accent" data-aos="fade-right">
                  <div class="flex items-start justify-between">
                    <div class="flex-1">
                      <div class="flex items-center mb-3">
                        <span class="bg-accent text-white text-xs px-3 py-1 rounded-full font-semibold mr-3">{{ strtoupper($pengumuman->kategori) }}</span>
                        <span class="text-sm text-gray-500">{{ $pengumuman->tanggal_posting->format('d F Y') }}</span>
                      </div>
                      <h3 class="text-xl font-semibold text-secondary mb-2">
                        {{ $pengumuman->judul }}
                      </h3>
                      <p class="text-gray-600 mb-4">
                        {!! Str::limit(strip_tags($pengumuman->isi), 150) !!}
                      </p>
                      <a href="{{ route('pengumuman.detail', $pengumuman->id) }}" class="text-primary hover:text-accent font-semibold">Baca Selengkapnya →</a>
                    </div>
                    <div class="ml-4">
                      <i class="fas fa-bullhorn text-accent text-2xl"></i>
                    </div>
                  </div>
                </div>
              @endforeach
            @else
              <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow border-l-4 border-accent" data-aos="fade-right">
                <div class="flex items-start justify-between">
                  <div class="flex-1">
                    <div class="flex items-center mb-3">
                      <span class="bg-accent text-white text-xs px-3 py-1 rounded-full font-semibold mr-3">PENTING</span>
                      <span class="text-sm text-gray-500">18 Desember 2024</span>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary mb-2">
                      Jadwal Ujian Akhir Semester Genap 2024/2025
                    </h3>
                    <p class="text-gray-600 mb-4">
                      Jadwal ujian akhir semester genap akan dimulai pada tanggal 20 Januari 2025. Silakan cek jadwal lengkap di portal akademik.
                    </p>
                    <a href="{{ url('pengumuman') }}" class="text-primary hover:text-accent font-semibold">Lihat Semua Pengumuman →</a>
                  </div>
                  <div class="ml-4">
                    <i class="fas fa-bullhorn text-accent text-2xl"></i>
                  </div>
                </div>
              </div>
              <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow border-l-4 border-primary" data-aos="zoom-in">
                <div class="flex items-start justify-between">
                  <div class="flex-1">
                    <div class="flex items-center mb-3">
                      <span class="bg-primary text-white text-xs px-3 py-1 rounded-full font-semibold mr-3">BEASISWA</span>
                      <span class="text-sm text-gray-500">16 Desember 2024</span>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary mb-2">
                      Pendaftaran Beasiswa LPDP 2025
                    </h3>
                    <p class="text-gray-600 mb-4">
                      Pendaftaran beasiswa LPDP untuk program magister dan doktor telah dibuka. Deadline pendaftaran 31 Januari 2025.
                    </p>
                    <a href="{{ url('pengumuman') }}" class="text-primary hover:text-accent font-semibold">Lihat Semua Pengumuman →</a>
                  </div>
                  <div class="ml-4">
                    <i class="fas fa-graduation-cap text-primary text-2xl"></i>
                  </div>
                </div>
              </div>
              <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow border-l-4 border-green-500" data-aos="fade-left">
                <div class="flex items-start justify-between">
                  <div class="flex-1">
                    <div class="flex items-center mb-3">
                      <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full font-semibold mr-3">KEGIATAN</span>
                      <span class="text-sm text-gray-500">14 Desember 2024</span>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary mb-2">
                      TechFest 2025 - Festival Teknologi Mahasiswa
                    </h3>
                    <p class="text-gray-600 mb-4">
                      TechFest 2025 akan diselenggarakan pada 15-17 Februari 2025. Acara ini menampilkan inovasi teknologi dari mahasiswa FT UNIMA.
                    </p>
                    <a href="{{ url('pengumuman') }}" class="text-primary hover:text-accent font-semibold">Lihat Semua Pengumuman →</a>
                  </div>
                  <div class="ml-4">
                    <i class="fas fa-rocket text-green-500 text-2xl"></i>
                  </div>
                </div>
              </div>
            @endif
          </div>

          <div class="text-center mt-8">
            <a href="{{ url('pengumuman') }}" class="bg-primary hover:bg-accent text-white px-8 py-3 rounded-lg font-semibold transition-colors inline-block">
              Lihat Semua Pengumuman
            </a>
          </div>
        </div>
      </div>
    </section>
@endsection