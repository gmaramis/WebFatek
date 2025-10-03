@extends('master')

@section('title', 'Jurusan - Fakultas Teknik UNIMA')

@section('content')
<main class="min-h-screen bg-gradient-to-br from-orange-50 to-amber-50">
    <!-- Hero Section -->
    <section class="relative py-20 px-4">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-orange-800 mb-6">
                Jurusan FATEK UNIMA
            </h1>
            <p class="text-xl text-orange-700 max-w-3xl mx-auto leading-relaxed">
                Temukan jurusan yang sesuai dengan passion dan cita-cita Anda.
                Fakultas Teknik UNIMA menyediakan berbagai program studi berkualitas
                dengan akreditasi terbaik.
            </p>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-orange-200 rounded-full opacity-20"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 bg-amber-200 rounded-full opacity-20"></div>
    </section>

    @php
  $items = $jurusans ?? collect();
@endphp

<section class="py-16 px-4">
  <div class="container mx-auto">
    @if($items->isEmpty())
      <div class="text-center text-gray-600">Belum ada data jurusan.</div>
    @else
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($items as $j)
          <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
            <div class="relative h-48 bg-gradient-to-br from-orange-500 to-amber-600">
              @php
                $img = $j->gambar ? asset('storage/'.$j->gambar) : asset('img/default.jpg');
              @endphp
              <img src="{{ $img }}" alt="{{ $j->nama }}" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
              <div class="absolute bottom-4 left-4">
                <h3 class="text-2xl font-bold text-white mb-1">{{ $j->nama }}</h3>
                <p class="text-orange-100 text-sm">{{ $j->jenjang }}</p>
              </div>
            </div>

            <div class="p-6">
              <div class="flex items-center justify-between mb-4">
                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                  {{ $j->akreditasi ?? 'Akreditasi' }}
                </span>
                <span class="text-orange-600 font-semibold">
                  {{ $j->durasi_studi }} Tahun
                </span>
              </div>

              <p class="text-gray-600 mb-4 leading-relaxed">
                {{ \Illuminate\Support\Str::limit(strip_tags($j->deskripsi), 160) }}
              </p>

              {{-- Detail: kalau ada halaman khusus per jurusan, arahkan ke sana.
                   Misal pakai kode sebagai slug: /jurusan/{kode} --}}
              <a href="#" class="inline-flex items-center justify-center w-full px-4 py-3 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700 transition-colors duration-200">
                Lihat Detail
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>


    <!-- Statistik Section -->
    <section class="py-16 px-4 bg-white">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-orange-800 mb-4">
                    Mengapa Memilih FATEK UNIMA?
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Fakultas Teknik UNIMA telah menghasilkan ribuan lulusan berkualitas
                    yang siap berkontribusi dalam pembangunan nasional.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-orange-600 mb-2">6</div>
                    <div class="text-gray-600">Program Studi</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-orange-600 mb-2">1000+</div>
                    <div class="text-gray-600">Mahasiswa Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-orange-600 mb-2">50+</div>
                    <div class="text-gray-600">Dosen Berkualitas</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-orange-600 mb-2">95%</div>
                    <div class="text-gray-600">Tingkat Penyerapan Kerja</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-4 bg-gradient-to-r from-orange-600 to-amber-600">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Bergabung dengan FATEK UNIMA?
            </h2>
            <p class="text-xl text-orange-100 mb-8 max-w-2xl mx-auto">
                Daftar sekarang dan wujudkan impian Anda menjadi insinyur profesional
                yang berkontribusi untuk masa depan Indonesia.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/pendaftaran" class="inline-flex items-center justify-center px-8 py-4 bg-white text-orange-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-200">
                    Daftar Sekarang
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="/kontak" class="inline-flex items-center justify-center px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-orange-600 transition-colors duration-200">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>
</main>
@endsection