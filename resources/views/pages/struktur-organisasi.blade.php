@extends('master')

@section('title', 'Struktur Organisasi - Fakultas Teknik UNIMA')

@section('content')
<main class="min-h-screen bg-gradient-to-br from-slate-50 to-gray-100">

  {{-- Hero --}}
  <section class="relative overflow-hidden bg-white py-16 md:py-20">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight text-orange-600 drop-shadow-sm">
        {{ $title ?? 'Struktur Organisasi' }}
      </h1>
      <p class="mt-4 text-base md:text-lg text-orange-500/90 max-w-3xl mx-auto">
        {{ $subtitle ?? 'Struktur organisasi Fakultas Teknik Universitas Negeri Manado' }}
      </p>
    </div>
  </section>

  {{-- Card Gambar Struktur --}}
  <section class="container mx-auto px-4 py-12 md:py-16">
    <div class="bg-white/90 backdrop-blur rounded-2xl shadow-xl border border-gray-100 p-4 md:p-8">
      <div class="flex items-center justify-between mb-4 md:mb-6">
        <h2 class="text-lg md:text-xl font-semibold text-gray-800">Diagram Struktur</h2>
        {{-- Optional: tombol download bila perlu --}}
        @if(!empty($imagePath))
          <a href="{{ asset('storage/'.$imagePath) }}" download
             class="hidden md:inline-flex items-center gap-2 text-sm px-3 py-2 rounded-lg border border-orange-200 text-orange-700 hover:bg-orange-50 transition">
            <i class="fas fa-download"></i> Unduh
          </a>
        @endif
      </div>

      {{-- Wrapper Gambar --}}
      <div class="relative group rounded-xl overflow-hidden border border-gray-100 bg-gray-50">
        @if(!empty($imagePath))
          {{-- Gambar dari storage (upload via admin) --}}
          <img
            src="{{ asset('storage/'.$imagePath) }}"
            alt="{{ $title ?? 'Struktur Organisasi' }}"
            class="w-full h-auto max-h-[80vh] object-contain cursor-zoom-in"
            id="org-image"
          />

          {{-- Overlay tombol zoom saat hover (desktop) --}}
          <button
            type="button"
            id="open-lightbox"
            aria-label="Perbesar gambar"
            class="hidden md:flex absolute inset-0 items-center justify-center opacity-0 group-hover:opacity-100 transition bg-black/20"
          >
            <span class="inline-flex items-center gap-2 text-white text-sm font-medium bg-black/40 px-3 py-2 rounded-lg">
              <i class="fas fa-search-plus"></i> Perbesar
            </span>
          </button>
        @else
          {{-- Placeholder bila gambar belum tersedia --}}
          <div class="aspect-[16/10] w-full grid place-items-center text-center p-6 md:p-12">
            <div class="text-gray-400">
              <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-14 w-14 mb-4" viewBox="0 0 24 24" fill="currentColor">
                <path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Zm0 2v8.59l-2.3-2.3a1 1 0 0 0-1.4 0l-3.3 3.3-1.3-1.3a1 1 0 0 0-1.4 0L5 16.59V5h14ZM5 19v-.59l4.3-4.3 4 4 2.6-2.59L19 17.41V19H5Z"/>
              </svg>
              <p class="text-sm md:text-base">Belum ada gambar struktur.</p>
              <p class="text-xs md:text-sm">Silakan upload diagram melalui halaman admin.</p>
            </div>
          </div>
        @endif
      </div>

      {{-- Catatan kecil --}}
      <p class="mt-3 text-xs text-gray-500">
        * Perbesar gambar untuk melihat detail struktur dengan lebih jelas.
      </p>
    </div>
  </section>

{{-- Lightbox / Modal Zoom --}}
<div id="lightbox"
     class="fixed inset-0 z-[60] hidden items-center justify-center bg-black/80 p-4 md:p-8">
  <button id="lightbox-close"
          class="absolute top-4 right-4 md:top-6 md:right-6 inline-flex items-center justify-center w-10 h-10 rounded-full bg-white text-gray-700 shadow hover:scale-105 transition"
          aria-label="Tutup">
    <i class="fas fa-times"></i>
  </button>

  {{-- Viewport untuk pan/zoom --}}
  <div id="pz-wrap" class="relative overflow-hidden w-full max-w-7xl h-[100vh] bg-black/20 rounded-lg">
    @if(!empty($imagePath))
      <img id="pz-img"
           src="{{ asset('storage/'.$imagePath) }}"
           alt="{{ $title ?? 'Struktur Organisasi' }}"
           class="select-none block"
           draggable="false" />
    @endif
  </div>
</div>



</main>


@endsection
