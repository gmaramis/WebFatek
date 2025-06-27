@extends('master')

@section('title', 'Detail Berita - Fakultas Teknik UNIMA')

@push('head')
<style>
  .fade-in { animation: fadeIn 1s ease; }
  @keyframes fadeIn { from { opacity: 0; transform: translateY(30px);} to { opacity: 1; transform: none; } }
  .dropcap::first-letter { float: left; font-size: 2.5em; line-height: 1; font-weight: bold; color: #ea580c; margin-right: 0.1em; }
</style>
@endpush

@section('content')
<!-- Breadcrumbs -->
<nav class="text-sm mb-4 text-gray-500 pl-2 md:pl-4 mt-4" aria-label="Breadcrumb" data-aos="fade-down">
  <ol class="list-reset flex">
    <li><a href="{{ url('/') }}" class="hover:text-orange-600">Home</a></li>
    <li><span class="mx-2">/</span></li>
    <li><a href="{{ url('/') }}#news" class="hover:text-orange-600">Berita</a></li>
    <li><span class="mx-2">/</span></li>
    <li class="text-orange-700 font-semibold">Detail</li>
  </ol>
</nav>
<!-- Hero Berita -->
<section class="relative w-full h-72 md:h-96 flex items-end mb-12 fade-in" data-aos="fade-up">
  <img src="{{ asset('img/fto fatek 1.jpg') }}" alt="Gambar Berita" class="absolute inset-0 w-full h-full object-cover object-center rounded-b-3xl shadow-lg transition-transform duration-700 hover:scale-105" />
  <div class="absolute inset-0 bg-gradient-to-t from-orange-700/90 via-orange-500/60 to-transparent rounded-b-3xl"></div>
  <div class="relative z-10 p-8 md:p-12">
    <span class="inline-block bg-orange-600/90 text-white text-xs px-3 py-1 rounded-full mb-3 shadow" data-aos="zoom-in">Kategori: Prestasi</span>
    <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 drop-shadow-lg leading-tight" data-aos="fade-right">Mahasiswa FT UNIMA Raih Juara Kompetisi Robotik Nasional</h1>
    <div class="flex items-center text-orange-100 text-sm space-x-4" data-aos="fade-left">
      <span><i class="fas fa-calendar-alt mr-1"></i> 15 Desember 2024</span>
      <span><i class="fas fa-user mr-1"></i> Admin Fatek</span>
    </div>
  </div>
</section>
<main class="container mx-auto px-4 max-w-6xl fade-in">
  <a href="{{ url('/') }}#news" class="inline-flex items-center text-orange-700 hover:underline mb-8" data-aos="fade-left"><i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Berita</a>
  <div class="flex flex-col lg:flex-row gap-8">
    <!-- Kolom Kiri: Detail Berita -->
    <div class="w-full lg:w-2/3" data-aos="fade-right">
      <article class="bg-white rounded-2xl shadow-xl p-6 md:p-10 mb-8 transition-transform duration-300 hover:shadow-2xl hover:-translate-y-1">
        <div class="text-gray-800 leading-relaxed space-y-8">
          <p class="dropcap">
            Tim robotik Fakultas Teknik UNIMA berhasil meraih juara pertama dalam kompetisi robotik nasional yang diselenggarakan di Bandung. Prestasi ini menjadi bukti nyata kualitas mahasiswa dan dosen dalam bidang teknologi dan inovasi.
          </p>
          <blockquote class="border-l-4 border-orange-500 pl-4 italic text-orange-800 bg-orange-50 py-2 rounded-r-lg font-semibold">
            "Kemenangan ini adalah hasil kerja keras, kolaborasi, dan semangat pantang menyerah seluruh tim robotik Fatek UNIMA."
          </blockquote>
          <p>
            Kompetisi ini diikuti oleh lebih dari 50 tim dari berbagai universitas di Indonesia. Tim Fatek UNIMA menampilkan robot cerdas yang mampu menyelesaikan tantangan dengan presisi dan kecepatan tinggi. Keberhasilan ini diharapkan dapat memotivasi mahasiswa lain untuk terus berinovasi dan berprestasi di tingkat nasional maupun internasional.
          </p>
          <div class="flex items-center space-x-4 mt-6">
            <span class="font-bold text-orange-700">Bagikan berita ini:</span>
            <a href="https://wa.me/?text=https://fatek.unima.ac.id/detail-berita.html" target="_blank" class="w-9 h-9 flex items-center justify-center rounded-full bg-green-100 text-green-600 hover:bg-green-500 hover:text-white transition" title="Bagikan ke WhatsApp"><i class="fab fa-whatsapp fa-lg"></i></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://fatek.unima.ac.id/detail-berita.html" target="_blank" class="w-9 h-9 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition" title="Bagikan ke Facebook"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="https://twitter.com/intent/tweet?url=https://fatek.unima.ac.id/detail-berita.html" target="_blank" class="w-9 h-9 flex items-center justify-center rounded-full bg-sky-100 text-sky-500 hover:bg-sky-500 hover:text-white transition" title="Bagikan ke Twitter"><i class="fab fa-twitter fa-lg"></i></a>
          </div>
        </div>
      </article>
      <div class="flex justify-between items-center mb-12">
        <a href="#" class="text-orange-700 hover:underline flex items-center transition-colors duration-200"><i class="fas fa-arrow-left mr-2"></i> Berita Sebelumnya</a>
        <a href="#" class="text-orange-700 hover:underline flex items-center transition-colors duration-200">Berita Berikutnya <i class="fas fa-arrow-right ml-2"></i></a>
      </div>
    </div>
    <!-- Kolom Kanan: Berita Lainnya -->
    <aside class="w-full lg:w-1/3" data-aos="fade-left">
      <div class="bg-white rounded-2xl shadow-xl p-6 mb-8">
        <h3 class="text-xl font-bold text-orange-800 mb-4">Berita Lainnya</h3>
        <div class="space-y-6">
          <a href="{{ url('detail-berita') }}" class="flex items-center space-x-4 group transition-transform duration-300 hover:scale-105">
            <img src="{{ asset('img/fto fatek 1.jpg') }}" alt="Berita 1" class="w-20 h-16 object-cover rounded-lg shadow group-hover:scale-110 transition-transform duration-300" />
            <div>
              <div class="text-sm text-gray-500 mb-1"><i class="fas fa-calendar-alt mr-1"></i> 12 Des 2024</div>
              <div class="font-semibold text-secondary group-hover:text-orange-700 transition">Kerjasama Baru dengan Google untuk Program AI</div>
            </div>
          </a>
          <a href="{{ url('detail-berita') }}" class="flex items-center space-x-4 group transition-transform duration-300 hover:scale-105">
            <img src="{{ asset('img/mesin.jpg') }}" alt="Berita 2" class="w-20 h-16 object-cover rounded-lg shadow group-hover:scale-110 transition-transform duration-300" />
            <div>
              <div class="text-sm text-gray-500 mb-1"><i class="fas fa-calendar-alt mr-1"></i> 10 Des 2024</div>
              <div class="font-semibold text-secondary group-hover:text-orange-700 transition">Laboratorium Baru untuk Teknologi Hijau</div>
            </div>
          </a>
          <a href="{{ url('detail-berita') }}" class="flex items-center space-x-4 group transition-transform duration-300 hover:scale-105">
            <img src="{{ asset('img/ars.jpg') }}" alt="Berita 3" class="w-20 h-16 object-cover rounded-lg shadow group-hover:scale-110 transition-transform duration-300" />
            <div>
              <div class="text-sm text-gray-500 mb-1"><i class="fas fa-calendar-alt mr-1"></i> 8 Des 2024</div>
              <div class="font-semibold text-secondary group-hover:text-orange-700 transition">Mahasiswa Arsitektur Menang Lomba Desain Nasional</div>
            </div>
          </a>
        </div>
      </div>
    </aside>
  </div>
</main>
@endsection 