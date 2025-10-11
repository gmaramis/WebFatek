@extends('master')

@section('title', $pengumuman->judul . ' - Pengumuman FT UNIMA')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary to-accent text-white py-20">
  <div class="container mx-auto px-4">
    <div class="text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Pengumuman</h1>
      <p class="text-xl opacity-90">Informasi penting dari Fakultas Teknik UNIMA</p>
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
            <a href="{{ url('pengumuman') }}" class="text-gray-700 hover:text-primary">Pengumuman</a>
          </div>
        </li>
        <li>
          <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-gray-500">Detail</span>
          </div>
        </li>
      </ol>
    </nav>
  </div>
</section>

<!-- Content Section -->
<section class="py-16">
  <div class="container mx-auto px-4">
    <div class="grid lg:grid-cols-3 gap-8">
      <!-- Main Content -->
      <div class="lg:col-span-2">
        <article class="bg-white rounded-lg shadow-lg overflow-hidden">
          <div class="p-8">
            <!-- Header -->
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-calendar mr-2"></i>
              <span>{{ $pengumuman->tanggal_posting->format('d F Y H:i') }}</span>
              <span class="mx-2">•</span>
              <i class="fas fa-user mr-2"></i>
              <span>Admin Fakultas Teknik UNIMA</span>
              <span class="mx-2">•</span>
              <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded-full font-medium">
                {{ ucfirst($pengumuman->kategori) }}
              </span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl font-bold text-secondary mb-6">{{ $pengumuman->judul }}</h1>

            <!-- Content -->
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed mb-6">
              {!! $pengumuman->isi !!}
            </div>

            <!-- File Lampiran -->
            @if($pengumuman->file_lampiran)
              <div class="border-t border-gray-200 pt-6 mb-6">
                <h3 class="text-lg font-semibold text-secondary mb-4">Lampiran</h3>
                <a href="{{ asset('storage/' . $pengumuman->file_lampiran) }}"
                   target="_blank"
                   class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-accent transition-colors">
                  <i class="fas fa-download mr-2"></i>
                  Download Lampiran
                </a>
              </div>
            @endif

            <!-- Share Buttons -->
            <div class="border-t border-gray-200 pt-6">
              <div class="flex items-center space-x-4">
                <span class="font-bold text-orange-700">Bagikan pengumuman ini:</span>
                <a href="https://wa.me/?text={{ urlencode($pengumuman->judul . ' - ' . url()->current()) }}"
                   target="_blank"
                   class="w-9 h-9 flex items-center justify-center rounded-full bg-green-100 text-green-600 hover:bg-green-500 hover:text-white transition"
                   title="Bagikan ke WhatsApp">
                  <i class="fab fa-whatsapp fa-lg"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                   target="_blank"
                   class="w-9 h-9 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition"
                   title="Bagikan ke Facebook">
                  <i class="fab fa-facebook fa-lg"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($pengumuman->judul) }}"
                   target="_blank"
                   class="w-9 h-9 flex items-center justify-center rounded-full bg-sky-100 text-sky-500 hover:bg-sky-500 hover:text-white transition"
                   title="Bagikan ke Twitter">
                  <i class="fab fa-twitter fa-lg"></i>
                </a>
              </div>
            </div>
          </div>
        </article>

        <!-- Navigation -->
        <div class="flex justify-between items-center mt-8">
          <a href="{{ url('pengumuman') }}" class="text-orange-700 hover:underline flex items-center transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Pengumuman
          </a>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="lg:col-span-1">
        <!-- Pengumuman Terkait -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
          <h3 class="text-xl font-bold text-secondary mb-6">Pengumuman Terkait</h3>
          <div class="space-y-4">
            @php
              $pengumumanTerkait = App\Models\Pengumuman::where('status', 'published')
                ->where('id', '!=', $pengumuman->id)
                ->where('kategori', $pengumuman->kategori)
                ->orderBy('tanggal_posting', 'desc')
                ->limit(3)
                ->get();
            @endphp

            @forelse($pengumumanTerkait as $pengumumanLain)
              <article class="border-b border-gray-200 pb-4 last:border-b-0">
                <div class="flex items-center text-xs text-gray-500 mb-2">
                  <i class="fas fa-calendar mr-1"></i>
                  <span>{{ $pengumumanLain->tanggal_posting->format('d M Y') }}</span>
                </div>
                <h4 class="font-semibold text-secondary mb-2 hover:text-primary transition-colors">
                  <a href="{{ route('pengumuman.detail', $pengumumanLain->id) }}">{{ $pengumumanLain->judul }}</a>
                </h4>
                <p class="text-sm text-gray-600">{{ Str::limit(strip_tags($pengumumanLain->isi), 80) }}</p>
              </article>
            @empty
              <p class="text-sm text-gray-500">Tidak ada pengumuman terkait.</p>
            @endforelse
          </div>
        </div>

        <!-- Quick Links -->
        <div class="bg-white rounded-lg shadow-lg p-6">
          <h3 class="text-xl font-bold text-secondary mb-6">Link Cepat</h3>
          <div class="space-y-3">
            <a href="{{ url('berita') }}" class="flex items-center text-gray-700 hover:text-primary transition-colors">
              <i class="fas fa-newspaper mr-3 text-primary"></i>
              <span>Berita</span>
            </a>
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
