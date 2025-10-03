@extends('master')
@section('title', $jurusan->nama . ' - Program Studi')

@section('content')
@php
    use Illuminate\Support\Str;
    $bg = $jurusan->gambar ? asset('storage/'.$jurusan->gambar) : null;
@endphp

{{-- HERO --}}
<section class="relative">
  <div class="h-64 md:h-80 w-full {{ $bg ? '' : 'bg-gradient-to-r from-secondary to-primary' }}"
       @if($bg) style="background-image:url('{{ $bg }}'); background-size:cover; background-position:center;" @endif>
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative container mx-auto h-full px-4 flex items-end pb-6">
      <div class="text-white">
        <nav class="text-sm mb-2 opacity-90">
          <a href="{{ url('/') }}" class="hover:underline">Home</a>
          <span class="mx-2">/</span>
          <a href="{{ url('/jurusan') }}" class="hover:underline">Program Studi</a>
          <span class="mx-2">/</span>
          <span class="font-semibold">{{ $jurusan->nama }}</span>
        </nav>
        <h1 class="text-3xl md:text-4xl font-bold drop-shadow">{{ $jurusan->nama }}</h1>
        @if($jurusan->akreditasi || $jurusan->jenjang)
          <div class="mt-2 flex flex-wrap items-center gap-2 text-xs">
            @if($jurusan->akreditasi)
              <span class="inline-flex items-center bg-emerald-500/90 text-white px-2 py-0.5 rounded-full font-semibold">
                <i class="fa-solid fa-award mr-1"></i> Akreditasi {{ $jurusan->akreditasi }}
              </span>
            @endif
            @if($jurusan->jenjang)
              <span class="inline-flex items-center bg-white/90 text-secondary px-2 py-0.5 rounded-full font-semibold">
                <i class="fa-solid fa-graduation-cap mr-1"></i> {{ strtoupper($jurusan->jenjang) }}
              </span>
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

{{-- BODY --}}
<div class="container mx-auto px-4 py-8 grid lg:grid-cols-3 gap-8">

  {{-- MAIN CONTENT --}}
  <div class="lg:col-span-2 space-y-6">

    {{-- INFO CARDS --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
      @if($jurusan->kode)
        <div class="bg-white rounded-xl border border-gray-100 p-4">
          <div class="text-xs text-gray-500 mb-1">Kode Prodi</div>
          <div class="text-lg font-semibold text-secondary">{{ $jurusan->kode }}</div>
        </div>
      @endif
      @if($jurusan->durasi_studi)
        <div class="bg-white rounded-xl border border-gray-100 p-4">
          <div class="text-xs text-gray-500 mb-1">Durasi Studi</div>
          <div class="text-lg font-semibold text-secondary">{{ $jurusan->durasi_studi }} semester</div>
        </div>
      @endif
      @if($jurusan->kepala_jurusan)
        <div class="bg-white rounded-xl border border-gray-100 p-4">
          <div class="text-xs text-gray-500 mb-1">Kepala Jurusan</div>
          <div class="text-lg font-semibold text-secondary">
            {{ $jurusan->kepala_jurusan }}
          </div>
          @if($jurusan->nip_kepala)
            <div class="text-xs text-gray-500 mt-0.5">NIP: {{ $jurusan->nip_kepala }}</div>
          @endif
        </div>
      @endif
      @if($jurusan->prospek_karir)
        <div class="bg-white rounded-xl border border-gray-100 p-4">
          <div class="text-xs text-gray-500 mb-1">Prospek Karir</div>
          <div class="text-sm text-secondary">
            {{ Str::limit(strip_tags($jurusan->prospek_karir), 60) }}
          </div>
        </div>
      @endif
    </div>

    {{-- TABS --}}
    <div x-data="{ tab: '{{ $jurusan->deskripsi ? 'deskripsi' : ($jurusan->visi ? 'visi' : ($jurusan->misi ? 'misi' : ($jurusan->tujuan ? 'tujuan' : 'karir'))) }}' }">
      <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

      <div class="bg-white rounded-xl border border-gray-100">
        <div class="p-2 flex flex-wrap gap-2 border-b">
          @if($jurusan->deskripsi)
            <button @click="tab='deskripsi'" :class="tab==='deskripsi' ? 'bg-primary text-white' : 'bg-secondary-100 text-secondary'"
                    class="px-3 py-1 rounded-full text-sm font-semibold">Deskripsi</button>
          @endif
          @if($jurusan->visi)
            <button @click="tab='visi'" :class="tab==='visi' ? 'bg-primary text-white' : 'bg-secondary-100 text-secondary'"
                    class="px-3 py-1 rounded-full text-sm font-semibold">Visi</button>
          @endif
          @if($jurusan->misi)
            <button @click="tab='misi'" :class="tab==='misi' ? 'bg-primary text-white' : 'bg-secondary-100 text-secondary'"
                    class="px-3 py-1 rounded-full text-sm font-semibold">Misi</button>
          @endif
          @if($jurusan->tujuan)
            <button @click="tab='tujuan'" :class="tab==='tujuan' ? 'bg-primary text-white' : 'bg-secondary-100 text-secondary'"
                    class="px-3 py-1 rounded-full text-sm font-semibold">Tujuan</button>
          @endif
          @if($jurusan->prospek_karir)
            <button @click="tab='karir'" :class="tab==='karir' ? 'bg-primary text-white' : 'bg-secondary-100 text-secondary'"
                    class="px-3 py-1 rounded-full text-sm font-semibold">Prospek Karir</button>
          @endif
        </div>

        {{-- PANEL --}}
        <div class="p-6 prose max-w-none">
          @if($jurusan->deskripsi)
            <article x-show="tab==='deskripsi'">
              {!! $jurusan->deskripsi !!}
            </article>
          @endif

          @if($jurusan->visi)
            <article x-show="tab==='visi'" x-cloak>
              {!! $jurusan->visi !!}
            </article>
          @endif

          @if($jurusan->misi)
            <article x-show="tab==='misi'" x-cloak>
              {!! $jurusan->misi !!}
            </article>
          @endif

          @if($jurusan->tujuan)
            <article x-show="tab==='tujuan'" x-cloak>
              {!! $jurusan->tujuan !!}
            </article>
          @endif

          @if($jurusan->prospek_karir)
            <article x-show="tab==='karir'" x-cloak>
              {!! $jurusan->prospek_karir !!}
            </article>
          @endif
        </div>
      </div>
    </div>

    {{-- CTA (opsional, sembunyikan jika tidak perlu) --}}
    <div class="flex flex-wrap gap-3">
      <a href="{{ url('/kontak') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-primary text-white rounded-lg hover:bg-accent transition">
        <i class="fa-solid fa-envelope"></i> Kontak Prodi
      </a>
      <a href="{{ url('/download') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-white border border-gray-200 text-secondary rounded-lg hover:shadow">
        <i class="fa-solid fa-download"></i> Dokumen Terkait
      </a>
    </div>

  </div>

  {{-- SIDEBAR --}}
  <aside class="space-y-6">
    <div class="bg-white rounded-xl border border-gray-100 p-5">
      <h3 class="text-lg font-semibold text-secondary mb-3">Ringkasan</h3>
      <ul class="space-y-2 text-sm text-gray-700">
        @if($jurusan->jenjang)
          <li class="flex items-center"><i class="fa-solid fa-graduation-cap w-5"></i> Jenjang: <span class="ml-1 font-semibold">{{ strtoupper($jurusan->jenjang) }}</span></li>
        @endif
        @if($jurusan->akreditasi)
          <li class="flex items-center"><i class="fa-solid fa-award w-5"></i> Akreditasi: <span class="ml-1 font-semibold">{{ $jurusan->akreditasi }}</span></li>
        @endif
        @if($jurusan->durasi_studi)
          <li class="flex items-center"><i class="fa-solid fa-clock w-5"></i> Durasi: <span class="ml-1 font-semibold">{{ $jurusan->durasi_studi }} semester</span></li>
        @endif
        @if($jurusan->kode)
          <li class="flex items-center"><i class="fa-solid fa-barcode w-5"></i> Kode: <span class="ml-1 font-semibold">{{ $jurusan->kode }}</span></li>
        @endif
        @if($jurusan->is_active)
          <li class="flex items-center"><i class="fa-solid fa-circle-check w-5 text-emerald-500"></i> Status: <span class="ml-1 font-semibold">Aktif</span></li>
        @endif
      </ul>
    </div>

    {{-- Jurusan/Prodi terkait --}}
    @isset($related)
      <div class="bg-white rounded-xl border border-gray-100 p-5">
        <h3 class="text-lg font-semibold text-secondary mb-3">Program Studi Terkait</h3>
        <div class="space-y-2">
          @forelse($related as $r)
            <a href="{{ route('jurusan.show', $r->id) }}" class="block p-3 rounded-lg border border-gray-100 hover:shadow-sm hover:border-primary/40 transition">
              <div class="font-semibold text-secondary">{{ $r->nama }}</div>
              @if($r->jenjang || $r->akreditasi)
                <div class="text-xs text-gray-500">
                  {{ $r->jenjang ? strtoupper($r->jenjang) : '' }} {{ $r->jenjang && $r->akreditasi ? '•' : '' }}
                  {{ $r->akreditasi ? 'Akreditasi '.$r->akreditasi : '' }}
                </div>
              @endif
            </a>
          @empty
            <div class="text-sm text-gray-500">Belum ada rekomendasi.</div>
          @endforelse
        </div>
      </div>
    @endisset

    {{-- Kontak singkat --}}
    <div class="bg-white rounded-xl border border-gray-100 p-5">
      <h3 class="text-lg font-semibold text-secondary mb-3">Butuh bantuan?</h3>
      <p class="text-sm text-gray-600">Hubungi Humas & Kerjasama untuk informasi lebih lanjut.</p>
      <a href="{{ route('humas-kerjasama') }}" class="mt-3 inline-flex items-center gap-2 px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary-700 transition">
        <i class="fa-solid fa-phone"></i> Hubungi Kami
      </a>
    </div>
  </aside>
</div>
@endsection
