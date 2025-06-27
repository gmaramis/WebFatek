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
        <!-- ... dan seterusnya ... -->
      </div>
    </section>
</main>
@endsection 