@extends('master')

@section('title', isset($berita) ? $berita->judul : 'Detail Berita - Fakultas Teknik UNIMA')

@push('head')
<style>
  .fade-in { animation: fadeIn 1s ease; }
  @keyframes fadeIn { from { opacity: 0; transform: translateY(30px);} to { opacity: 1; transform: none; } }
  .dropcap::first-letter { float: left; font-size: 2.5em; line-height: 1; font-weight: bold; color: #ea580c; margin-right: 0.1em; }
  .fadein-anim {
    opacity: 0;
    transition: opacity 0.7s;
  }
  .fadein-anim.opacity-100 {
    opacity: 1;
  }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary to-accent text-white py-20 fadein-anim">
  <div class="container mx-auto px-4">
    <div class="text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">
        {{ isset($berita) ? $berita->judul : 'Detail Berita' }}
      </h1>
      <p class="text-xl opacity-90">
        {{ isset($berita) ? 'Berita Fakultas Teknik UNIMA' : 'Informasi terbaru seputar Fakultas Teknik UNIMA' }}
      </p>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<section class="bg-gray-50 py-4">
  <div class="container mx-auto px-4">
    <nav class="flex" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a href="{{ url('/') }}" class="text-gray-700 hover:text-primary">Beranda</a>
        </li>
        <li>
          <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <a href="{{ url('berita') }}" class="text-gray-700 hover:text-primary">Berita</a>
          </div>
        </li>
        <li>
          <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-gray-500">{{ isset($berita) ? 'Detail' : 'Berita' }}</span>
          </div>
        </li>
      </ol>
    </nav>
  </div>
</section>

<!-- Content Section -->
<section class="py-16 fadein-anim">
  <div class="container mx-auto px-4">
    <div class="grid lg:grid-cols-3 gap-8">
      <!-- Main Content -->
      <div class="lg:col-span-2">
        @if(isset($berita))
          <article class="bg-white rounded-lg shadow-lg overflow-hidden fadein-anim">
            @if($berita->gambar)
              <div class="h-64 md:h-96 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $berita->gambar) }}');"></div>
            @endif
            <div class="p-8">
              <div class="flex items-center text-sm text-gray-500 mb-4">
                <i class="fas fa-calendar mr-2"></i>
                <span>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}</span>
                <span class="mx-2">•</span>
                <i class="fas fa-user mr-2"></i>
                <span>Admin Fatek</span>
              </div>
              
              <h1 class="text-3xl font-bold text-secondary mb-6">{{ $berita->judul }}</h1>
              
              <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                {!! $berita->isi !!}
              </div>
              
              <div class="flex items-center space-x-4 mt-8">
                <span class="font-bold text-orange-700">Bagikan berita ini:</span>
                <a href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}" target="_blank" class="w-9 h-9 flex items-center justify-center rounded-full bg-green-100 text-green-600 hover:bg-green-500 hover:text-white transition" title="Bagikan ke WhatsApp"><i class="fab fa-whatsapp fa-lg"></i></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-9 h-9 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition" title="Bagikan ke Facebook"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($berita->judul) }}" target="_blank" class="w-9 h-9 flex items-center justify-center rounded-full bg-sky-100 text-sky-500 hover:bg-sky-500 hover:text-white transition" title="Bagikan ke Twitter"><i class="fab fa-twitter fa-lg"></i></a>
              </div>
            </div>
          </article>
          
          <!-- Navigation -->
          <div class="flex justify-between items-center mt-8">
            <a href="{{ url('berita') }}" class="text-orange-700 hover:underline flex items-center transition-colors duration-200">
              <i class="fas fa-arrow-left mr-2"></i> Kembali ke Berita
            </a>
          </div>
        @else
          <!-- Fallback content jika tidak ada berita -->
          <article class="bg-white rounded-lg shadow-lg overflow-hidden fadein-anim">
            <div class="p-8">
              <div class="flex items-center text-sm text-gray-500 mb-4">
                <i class="fas fa-calendar mr-2"></i>
                <span>15 Desember 2024</span>
                <span class="mx-2">•</span>
                <i class="fas fa-user mr-2"></i>
                <span>Admin Fatek</span>
              </div>
              
              <h1 class="text-3xl font-bold text-secondary mb-6">Mahasiswa FT UNIMA Raih Juara Kompetisi Robotik Nasional</h1>
              
              <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                <p>Tim robotik Fakultas Teknik UNIMA berhasil meraih juara pertama dalam kompetisi robotik nasional yang diselenggarakan di Bandung pada tanggal 10-12 Desember 2024.</p>
                
                <p>Tim yang terdiri dari 5 mahasiswa dari berbagai program studi ini berhasil mengalahkan 50 tim dari berbagai universitas di Indonesia. Robot yang mereka desain menggunakan teknologi AI dan machine learning untuk navigasi otonom.</p>
                
                <p>"Kami sangat bangga dengan prestasi yang diraih oleh tim robotik kami. Ini membuktikan bahwa mahasiswa FT UNIMA memiliki kompetensi yang tidak kalah dengan mahasiswa dari universitas ternama lainnya," ujar Dekan Fakultas Teknik UNIMA.</p>
                
                <p>Kompetisi ini diselenggarakan oleh Kementerian Pendidikan dan Kebudayaan dalam rangka mempromosikan inovasi teknologi di kalangan mahasiswa teknik.</p>
              </div>
              
              <div class="flex items-center space-x-4 mt-8">
                <span class="font-bold text-orange-700">Bagikan berita ini:</span>
                <a href="https://wa.me/?text=https://fatek.unima.ac.id/detail-berita.html" target="_blank" class="w-9 h-9 flex items-center justify-center rounded-full bg-green-100 text-green-600 hover:bg-green-500 hover:text-white transition" title="Bagikan ke WhatsApp"><i class="fab fa-whatsapp fa-lg"></i></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://fatek.unima.ac.id/detail-berita.html" target="_blank" class="w-9 h-9 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition" title="Bagikan ke Facebook"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="https://twitter.com/intent/tweet?url=https://fatek.unima.ac.id/detail-berita.html" target="_blank" class="w-9 h-9 flex items-center justify-center rounded-full bg-sky-100 text-sky-500 hover:bg-sky-500 hover:text-white transition" title="Bagikan ke Twitter"><i class="fab fa-twitter fa-lg"></i></a>
              </div>
            </div>
          </article>
          
          <div class="flex justify-between items-center mt-8">
            <a href="{{ url('berita') }}" class="text-orange-700 hover:underline flex items-center transition-colors duration-200">
              <i class="fas fa-arrow-left mr-2"></i> Kembali ke Berita
            </a>
          </div>
        @endif
      </div>
      
      <!-- Sidebar -->
      <div class="lg:col-span-1">
        <!-- Berita Terkait -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
          <h3 class="text-xl font-bold text-secondary mb-6">Berita Terkait</h3>
          <div class="space-y-4">
            @if(isset($beritaTerkait) && $beritaTerkait->count() > 0)
              @foreach($beritaTerkait as $beritaLain)
                <article class="border-b border-gray-200 pb-4 last:border-b-0">
                  <div class="flex items-center text-xs text-gray-500 mb-2">
                    <i class="fas fa-calendar mr-1"></i>
                    <span>{{ \Carbon\Carbon::parse($beritaLain->tanggal)->format('d M Y') }}</span>
                  </div>
                  <h4 class="font-semibold text-secondary mb-2 hover:text-primary transition-colors">
                    <a href="{{ url('berita/' . $beritaLain->slug) }}">{{ $beritaLain->judul }}</a>
                  </h4>
                  <p class="text-sm text-gray-600">{{ Str::limit(strip_tags($beritaLain->isi), 80) }}</p>
                </article>
              @endforeach
            @else
              <article class="border-b border-gray-200 pb-4 last:border-b-0">
                <div class="flex items-center text-xs text-gray-500 mb-2">
                  <i class="fas fa-calendar mr-1"></i>
                  <span>12 Des 2024</span>
                </div>
                <h4 class="font-semibold text-secondary mb-2 hover:text-primary transition-colors">
                  <a href="{{ url('detail-berita') }}">Kerjasama Baru dengan Google untuk Program AI</a>
                </h4>
                <p class="text-sm text-gray-600">Fakultas Teknik UNIMA menandatangani kerjasama dengan Google untuk pengembangan program artificial intelligence.</p>
              </article>
              
              <article class="border-b border-gray-200 pb-4 last:border-b-0">
                <div class="flex items-center text-xs text-gray-500 mb-2">
                  <i class="fas fa-calendar mr-1"></i>
                  <span>10 Des 2024</span>
                </div>
                <h4 class="font-semibold text-secondary mb-2 hover:text-primary transition-colors">
                  <a href="{{ url('detail-berita') }}">Laboratorium Baru untuk Teknologi Hijau</a>
                </h4>
                <p class="text-sm text-gray-600">Fakultas Teknik UNIMA meresmikan laboratorium teknologi hijau yang dilengkapi dengan peralatan terkini.</p>
              </article>
            @endif
          </div>
        </div>
        
        <!-- Quick Links -->
        <div class="bg-white rounded-lg shadow-lg p-6">
          <h3 class="text-xl font-bold text-secondary mb-6">Link Cepat</h3>
          <div class="space-y-3">
            <a href="{{ url('jurusan') }}" class="flex items-center text-gray-700 hover:text-primary transition-colors">
              <i class="fas fa-graduation-cap mr-3 text-primary"></i>
              <span>Program Studi</span>
            </a>
            <a href="{{ url('dosen') }}" class="flex items-center text-gray-700 hover:text-primary transition-colors">
              <i class="fas fa-chalkboard-teacher mr-3 text-primary"></i>
              <span>Dosen</span>
            </a>
            <a href="{{ url('alumni') }}" class="flex items-center text-gray-700 hover:text-primary transition-colors">
              <i class="fas fa-users mr-3 text-primary"></i>
              <span>Alumni</span>
            </a>
            <a href="{{ url('kontak') }}" class="flex items-center text-gray-700 hover:text-primary transition-colors">
              <i class="fas fa-envelope mr-3 text-primary"></i>
              <span>Kontak</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
// Fade-in effect
window.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.fadein-anim').forEach(function(el) {
    el.classList.add('opacity-0');
    setTimeout(() => el.classList.add('transition-opacity', 'duration-700', 'opacity-100'), 10);
  });
});
// Fade-out effect on berita link
const beritaLinks = document.querySelectorAll('a[href^="/berita/"]');
beritaLinks.forEach(link => {
  link.addEventListener('click', function(e) {
    const main = document.querySelector('main, .fadein-anim');
    if(main) {
      e.preventDefault();
      main.classList.remove('opacity-100');
      main.classList.add('opacity-0');
      setTimeout(() => { window.location = link.href; }, 350);
    }
  });
});
</script>
@endpush 