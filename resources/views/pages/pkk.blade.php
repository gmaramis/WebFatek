@extends('master')

@section('title', 'Pendidikan Kesejahteraan Keluarga - Fakultas Teknik UNIMA')

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
                <i class="fas fa-heart text-white text-2xl"></i>
              </div>
              <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Pendidikan Kesejahteraan Keluarga</h1>
                <p class="text-xl text-gray-200">Program Studi S1</p>
              </div>
            </div>
            <p class="text-lg mb-8 text-gray-200 leading-relaxed">
              Program studi yang berfokus pada pengembangan ilmu dan keterampilan dalam bidang kesejahteraan keluarga, pendidikan, dan kewirausahaan.
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
            Program Studi Pendidikan Kesejahteraan Keluarga dirancang untuk menghasilkan lulusan yang kompeten dalam bidang kesejahteraan keluarga, pendidikan, dan kewirausahaan.
          </p>
        </div>
        <div class="grid md:grid-cols-3 gap-8 mb-16">
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-graduation-cap text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Visi</h3>
            <p class="text-gray-600">
              Menjadi program studi unggul dalam pengembangan ilmu dan keterampilan kesejahteraan keluarga yang inovatif dan berdaya saing global.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-bullseye text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Misi</h3>
            <p class="text-gray-600">
              Menyelenggarakan pendidikan, penelitian, dan pengabdian masyarakat di bidang kesejahteraan keluarga yang berkualitas dan relevan dengan kebutuhan masyarakat.
            </p>
          </div>
          <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
            <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-users text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary mb-3">Tujuan</h3>
            <p class="text-gray-600">
              Menghasilkan lulusan yang profesional, beretika, dan mampu beradaptasi dengan perkembangan ilmu kesejahteraan keluarga dan kewirausahaan.
            </p>
          </div>
        </div>
        <!-- Kompetensi Lulusan -->
        <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white">
          <h3 class="text-3xl font-bold mb-8 text-center">Kompetensi Lulusan</h3>
          <div class="grid md:grid-cols-2 gap-8">
            <div>
              <h4 class="text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-heart mr-3 text-accent"></i>
                Kompetensi Utama
              </h4>
              <ul class="space-y-3">
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai konsep dasar kesejahteraan keluarga</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Mampu merancang dan melaksanakan program pendidikan keluarga</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai keterampilan dalam bidang boga, busana, dan kecantikan</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Mampu mengelola usaha di bidang jasa boga, fashion, dan kecantikan</span></li>
              </ul>
            </div>
            <div>
              <h4 class="text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-star mr-3 text-accent"></i>
                Kompetensi Pendukung
              </h4>
              <ul class="space-y-3">
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Memiliki kemampuan komunikasi dan konseling keluarga</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Mampu melakukan penelitian di bidang kesejahteraan keluarga</span></li>
                <li class="flex items-start"><i class="fas fa-check-circle text-accent mt-1 mr-3"></i><span>Menguasai teknologi informasi untuk mendukung profesi</span></li>
              </ul>
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
            Kurikulum kami dirancang untuk membekali mahasiswa dengan pengetahuan dan keterampilan praktis yang relevan dengan industri kreatif dan jasa.
          </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-primary">
            <div class="text-center mb-4">
              <i class="fas fa-utensils text-4xl text-primary"></i>
              <h3 class="text-2xl font-semibold text-secondary mt-4">Tata Boga</h3>
            </div>
            <p class="text-gray-600 mb-4">
              Mempelajari seni kuliner, manajemen jasa boga, gizi, dan pengembangan produk makanan.
            </p>
            <ul class="space-y-2 text-gray-700">
              <li class="flex items-center"><i class="fas fa-cookie-bite text-accent mr-3"></i><span>Pastry & Bakery</span></li>
              <li class="flex items-center"><i class="fas fa-concierge-bell text-accent mr-3"></i><span>Manajemen Restoran</span></li>
              <li class="flex items-center"><i class="fas fa-blender text-accent mr-3"></i><span>Gizi Kuliner</span></li>
            </ul>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-accent">
            <div class="text-center mb-4">
              <i class="fas fa-tshirt text-4xl text-accent"></i>
              <h3 class="text-2xl font-semibold text-secondary mt-4">Tata Busana</h3>
            </div>
            <p class="text-gray-600 mb-4">
              Mengembangkan kreativitas dalam desain fashion, pembuatan pola, teknik jahit, dan manajemen bisnis fashion.
            </p>
            <ul class="space-y-2 text-gray-700">
              <li class="flex items-center"><i class="fas fa-drafting-compass text-primary mr-3"></i><span>Desain Mode</span></li>
              <li class="flex items-center"><i class="fas fa-cut text-primary mr-3"></i><span>Teknologi Busana</span></li>
              <li class="flex items-center"><i class="fas fa-store text-primary mr-3"></i><span>Kewirausahaan Fashion</span></li>
            </ul>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg border-t-4 border-secondary">
            <div class="text-center mb-4">
              <i class="fas fa-spa text-4xl text-secondary"></i>
              <h3 class="text-2xl font-semibold text-secondary mt-4">Tata Rias & Kecantikan</h3>
            </div>
            <p class="text-gray-600 mb-4">
              Fokus pada estetika dan perawatan kecantikan, tata rias wajah, rambut, serta manajemen salon.
            </p>
            <ul class="space-y-2 text-gray-700">
              <li class="flex items-center"><i class="fas fa-magic text-accent mr-3"></i><span>Rias Wajah & Karakter</span></li>
              <li class="flex items-center"><i class="fas fa-cut text-accent mr-3"></i><span>Perawatan Rambut</span></li>
              <li class="flex items-center"><i class="fas fa-hand-sparkles text-accent mr-3"></i><span>Manajemen Salon & Spa</span></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Fasilitas Laboratorium -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-secondary mb-4">Fasilitas Laboratorium & Studio</h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Kami menyediakan fasilitas modern untuk mendukung kreativitas dan keterampilan praktis mahasiswa.
          </p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          <div class="bg-gray-50 p-6 rounded-lg text-center shadow-md hover:shadow-xl transition-shadow">
            <div class="text-4xl text-primary mb-4"><i class="fas fa-kitchen-set"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Dapur & Lab. Boga</h4>
          </div>
          <div class="bg-gray-50 p-6 rounded-lg text-center shadow-md hover:shadow-xl transition-shadow">
            <div class="text-4xl text-primary mb-4"><i class="fas fa-sewing-machine"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Studio Desain & Menjahit</h4>
          </div>
          <div class="bg-gray-50 p-6 rounded-lg text-center shadow-md hover:shadow-xl transition-shadow">
            <div class="text-4xl text-primary mb-4"><i class="fas fa-mirror"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Studio Rias & Kecantikan</h4>
          </div>
          <div class="bg-gray-50 p-6 rounded-lg text-center shadow-md hover:shadow-xl transition-shadow">
            <div class="text-4xl text-primary mb-4"><i class="fas fa-chalkboard-teacher"></i></div>
            <h4 class="text-xl font-semibold text-secondary">Lab. Microteaching</h4>
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
            Lulusan kami memiliki peluang karir yang beragam di industri kreatif, pendidikan, dan jasa.
          </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-chalkboard-teacher text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Guru & Pendidik</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-concierge-bell text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Wirausaha Kuliner</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-tshirt text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Desainer Fashion</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-spa text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Beautypreneur</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-users text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Konsultan Keluarga</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-hotel text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Industri Perhotelan</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-magic text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Wedding Organizer</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-pen-nib text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Content Creator</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-lightbulb text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Instruktur Pelatihan</h4>
          </div>
           <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <i class="fas fa-building text-3xl text-primary mb-4"></i>
            <h4 class="font-semibold text-secondary">Instansi Pemerintah</h4>
          </div>
        </div>
      </div>
    </section>

    <!-- Admission Section -->
    <section id="admission" class="py-20 bg-primary text-white">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Bergabunglah dengan Kami</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
          Wujudkan kreativitas dan potensimu di bidang kesejahteraan keluarga. Daftar sekarang dan mulailah perjalananmu bersama kami di Fakultas Teknik UNIMA.
        </p>
        <a href="https://penerimaan.unima.ac.id/" target="_blank" class="bg-white text-primary hover:bg-gray-200 font-bold py-4 px-10 rounded-lg transition-colors text-lg">Info Pendaftaran</a>
      </div>
    </section>
@endsection
 