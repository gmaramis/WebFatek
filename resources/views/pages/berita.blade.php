@extends("master")

@section("title", "Berita - Fakultas Teknik UNIMA")

@section("content")
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary to-accent text-white py-20 fadein-anim">
  <div class="container mx-auto px-4">
    <div class="text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Berita & Informasi</h1>
      <p class="text-xl opacity-90">Informasi terbaru seputar Fakultas Teknik UNIMA</p>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<section class="bg-gray-50 py-4 fadein-anim">
  <div class="container mx-auto px-4">
    <nav class="flex" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a href="{{ url('/') }}" class="text-gray-700 hover:text-primary">Beranda</a>
        </li>
        <li>
          <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-gray-500">Berita</span>
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
        <div class="mb-8 fadein-anim">
          <h2 class="text-3xl font-bold text-secondary mb-4">Berita Terbaru</h2>
          <p class="text-gray-600">Temukan informasi terbaru seputar kegiatan, prestasi, dan perkembangan Fakultas Teknik UNIMA.</p>
        </div>

        <div class="space-y-8">
          @if(isset($semuaBerita) && $semuaBerita->count() > 0)
            @foreach($semuaBerita as $berita)
              <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow border border-gray-100 fadein-anim">
                @if($berita->gambar)
                  <div class="h-48 md:h-64 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $berita->gambar) }}');"></div>
                @endif
                <div class="p-6">
                  <div class="flex items-center text-sm text-gray-500 mb-3">
                    <i class="fas fa-calendar mr-2"></i>
                    <span>{{ \Carbon\Carbon::parse($berita->tanggal)->format("d F Y") }}</span>
                    <span class="mx-2">•</span>
                    <i class="fas fa-user mr-2"></i>
                    <span>Admin Fakultas Teknik UNIMA</span>
                  </div>

                  <h3 class="text-xl font-semibold text-secondary mb-3 hover:text-primary transition-colors">
                    <a href="{{ url("berita/" . $berita->slug) }}">{{ $berita->judul }}</a>
                  </h3>

                  <p class="text-gray-600 mb-4">
                    {!! Str::limit(strip_tags($berita->isi), 200) !!}
                  </p>

                  <a href="{{ url("berita/" . $berita->slug) }}" class="text-primary hover:text-accent font-semibold">Baca Selengkapnya →</a>
                </div>
              </article>
            @endforeach

            <!-- Pagination -->
            @if($semuaBerita->hasPages())
              <div class="mt-8 fadein-anim">
                {{ $semuaBerita->links() }}
              </div>
            @endif
          @else
            <p class="text-gray-600 text-center py-8">Belum ada berita tersedia.</p>
          @endif
        </div>
      </div>

      <!-- Sidebar -->
      <div class="lg:col-span-1">
        <!-- Berita Terbaru -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8 fadein-anim">
          <h3 class="text-xl font-bold text-secondary mb-6">Berita Terbaru</h3>
          <div class="space-y-4">
            @if(isset($beritaTerbaruSidebar) && $beritaTerbaruSidebar->count() > 0)
              @foreach($beritaTerbaruSidebar as $berita)
                <article class="border-b border-gray-200 pb-4 last:border-b-0">
                  <div class="flex items-center text-xs text-gray-500 mb-2">
                    <i class="fas fa-calendar mr-1"></i>
                    <span>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</span>
                  </div>
                  <h4 class="font-semibold text-secondary mb-2 hover:text-primary transition-colors">
                    <a href="{{ url('berita/' . $berita->slug) }}">{{ $berita->judul }}</a>
                  </h4>
                  <p class="text-sm text-gray-600">{{ Str::limit(strip_tags($berita->isi), 80) }}</p>
                </article>
              @endforeach
            @else
              <article class="border-b border-gray-200 pb-4 last:border-b-0">
                <div class="flex items-center text-xs text-gray-500 mb-2">
                  <i class="fas fa-calendar mr-1"></i>
                  <span>15 Des 2024</span>
                </div>
                <h4 class="font-semibold text-secondary mb-2 hover:text-primary transition-colors">
                  <a href="{{ url('detail-berita') }}">Mahasiswa FT UNIMA Raih Juara Kompetisi Robotik Nasional</a>
                </h4>
                <p class="text-sm text-gray-600">Tim robotik Fakultas Teknik UNIMA berhasil meraih juara pertama dalam kompetisi robotik nasional.</p>
              </article>

              <article class="border-b border-gray-200 pb-4 last:border-b-0">
                <div class="flex items-center text-xs text-gray-500 mb-2">
                  <i class="fas fa-calendar mr-1"></i>
                  <span>12 Des 2024</span>
                </div>
                <h4 class="font-semibold text-secondary mb-2 hover:text-primary transition-colors">
                  <a href="{{ url('detail-berita') }}">Kerjasama Baru dengan Google untuk Program AI</a>
                </h4>
                <p class="text-sm text-gray-600">Fakultas Teknik UNIMA menandatangani kerjasama dengan Google untuk pengembangan program AI.</p>
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
        <div class="bg-white rounded-lg shadow-lg p-6 fadein-anim">
          <h3 class="text-xl font-bold text-secondary mb-6">Link Cepat</h3>
          <div class="space-y-3">
            <a href="{{ url("jurusan") }}" class="flex items-center text-gray-700 hover:text-primary transition-colors">
              <i class="fas fa-graduation-cap mr-3 text-primary"></i>
              <span>Program Studi</span>
            </a>
            <a href="{{ url("dosen") }}" class="flex items-center text-gray-700 hover:text-primary transition-colors">
              <i class="fas fa-chalkboard-teacher mr-3 text-primary"></i>
              <span>Dosen</span>
            </a>
            <a href="{{ url("alumni") }}" class="flex items-center text-gray-700 hover:text-primary transition-colors">
              <i class="fas fa-users mr-3 text-primary"></i>
              <span>Alumni</span>
            </a>
            <a href="{{ url("pengumuman") }}" class="flex items-center text-gray-700 hover:text-primary transition-colors">
              <i class="fas fa-bullhorn mr-3 text-primary"></i>
              <span>Pengumuman</span>
            </a>
            <a href="{{ url("kontak") }}" class="flex items-center text-gray-700 hover:text-primary transition-colors">
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

@push('styles')
<style>
.fadein-anim {
  opacity: 0;
  transition: opacity 0.7s;
}
.fadein-anim.opacity-100 {
  opacity: 1;
}
</style>
@endpush
