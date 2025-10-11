@extends('master')

@section('title', 'Rumah Publikasi (P3KI)')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-purple-900 via-purple-700 to-pink-500 py-16 mb-8">
    <div class="container mx-auto px-4 text-center text-white">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Rumah Publikasi</h1>
        <p class="text-xl md:text-2xl font-light mb-6">Pusat Pengembangan Publikasi dan Karya Ilmiah (P3KI) Fakultas Teknik UNIMA</p>
        <div class="flex justify-center">
            <span class="inline-flex items-center bg-white/20 px-6 py-3 rounded-full text-lg font-semibold">
                <svg class="w-6 h-6 mr-2 text-pink-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                Mengembangkan Karya Ilmiah Berkualitas
            </span>
        </div>
    </div>
</div>

<div class="container mx-auto px-4">
    <!-- Statistik Publikasi -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-center mb-8 text-gray-800">Statistik Publikasi Fakultas Teknik UNIMA</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-3xl font-bold text-purple-600 mb-2">{{ $statistik['jurnal_terpublikasi'] }}+</div>
                <div class="text-gray-600">Jurnal Terpublikasi</div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-3xl font-bold text-blue-600 mb-2">{{ $statistik['peneliti_aktif'] }}+</div>
                <div class="text-gray-600">Peneliti Aktif</div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-3xl font-bold text-green-600 mb-2">{{ $statistik['program_studi'] }}</div>
                <div class="text-gray-600">Program Studi</div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-3xl font-bold text-orange-600 mb-2">{{ $statistik['kolaborasi'] }}+</div>
                <div class="text-gray-600">Kolaborasi</div>
            </div>
        </div>
    </div>

    <!-- Jurnal per Program Studi -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold mb-8 text-gray-800">Jurnal Akademik per Program Studi</h2>

        @foreach($jurnals as $jurusan => $jurnalList)
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-{{ getJurusanColor($jurusan) }}-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-{{ getJurusanColor($jurusan) }}-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">{{ ucwords(str_replace('-', ' ', $jurusan)) }}</h3>
                        <p class="text-gray-600">{{ getJurusanDescription($jurusan) }}</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    @foreach($jurnalList as $jurnal)
                        <div class="bg-{{ getJurusanColor($jurusan) }}-50 rounded-lg p-4 hover:bg-{{ getJurusanColor($jurusan) }}-100 transition-colors">
                            <h4 class="font-semibold text-{{ getJurusanColor($jurusan) }}-800 mb-2">{{ $jurnal->judul }}</h4>
                            @if($jurnal->issn)
                                <p class="text-sm text-gray-600 mb-2">ISSN: {{ $jurnal->issn }}</p>
                            @endif
                            @if($jurnal->periode_terbit)
                                <p class="text-xs text-gray-500">Terbit: {{ $jurnal->periode_terbit }}</p>
                            @endif
                            @if($jurnal->website)
                                <a href="{{ $jurnal->website }}" target="_blank" class="text-{{ getJurusanColor($jurusan) }}-600 hover:text-{{ getJurusanColor($jurusan) }}-800 text-sm font-medium">Lihat Jurnal →</a>
                            @else
                                <span class="text-gray-400 text-sm">Website belum tersedia</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-- Publikasi Terbaru -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold mb-8 text-gray-800">Publikasi Terbaru</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">Teknik Informatika</span>
                        <span class="text-gray-500 text-xs ml-auto">Jan 2024</span>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Implementasi Machine Learning dalam Sistem Rekomendasi</h3>
                    <p class="text-gray-600 text-sm mb-4">Penelitian tentang penggunaan algoritma machine learning untuk sistem rekomendasi yang lebih akurat...</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Oleh: Dr. John Doe</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Teknik Sipil</span>
                        <span class="text-gray-500 text-xs ml-auto">Des 2023</span>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Analisis Struktur Jembatan dengan Material Komposit</h3>
                    <p class="text-gray-600 text-sm mb-4">Studi tentang penggunaan material komposit dalam konstruksi jembatan untuk meningkatkan kekuatan...</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Oleh: Ir. Jane Smith</span>
                        <a href="#" class="text-green-600 hover:text-green-800 font-medium text-sm">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gradient-to-br from-yellow-400 to-yellow-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">Teknik Elektro</span>
                        <span class="text-gray-500 text-xs ml-auto">Nov 2023</span>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Sistem Pembangkit Listrik Tenaga Surya</h3>
                    <p class="text-gray-600 text-sm mb-4">Pengembangan sistem pembangkit listrik tenaga surya untuk daerah terpencil...</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Oleh: Dr. Albertus</span>
                        <a href="#" class="text-yellow-600 hover:text-yellow-800 font-medium text-sm">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl p-8 text-center text-white mb-12">
        <h2 class="text-2xl font-bold mb-4">Ingin Mempublikasikan Karya Ilmiah?</h2>
        <p class="text-lg mb-6">Bergabunglah dengan tim peneliti Fakultas Teknik UNIMA dan berkontribusi dalam pengembangan ilmu pengetahuan</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="bg-white text-purple-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Panduan Publikasi
            </a>
            <a href="#" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition-colors">
                Kontak P3KI
            </a>
        </div>
    </div>

    <!-- Informasi Kontak -->
    <div class="mb-16">
        <h2 class="text-2xl font-bold mb-8 text-gray-800">Informasi Kontak P3KI</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Kontak</h3>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 01-8 0 4 4 0 018 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7m0 0H9m3 0h3"/>
                        </svg>
                        <span>p3ki.ft@unima.ac.id</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>+62-431-123456 ext. 456</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 12.414a8 8 0 111.414-1.414l4.243 4.243a1 1 0 01-1.414 1.414z"/>
                        </svg>
                        <span>Gedung P3KI Lt. 2, Fakultas Teknik UNIMA</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Jam Operasional</h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Senin - Jumat</span>
                        <span class="font-semibold">08:00 - 16:00</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Sabtu</span>
                        <span class="font-semibold">08:00 - 12:00</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Minggu</span>
                        <span class="font-semibold text-red-600">Tutup</span>
                    </div>
                </div>
                <div class="mt-4 p-3 bg-yellow-50 rounded-lg">
                    <p class="text-sm text-yellow-800">
                        <strong>Note:</strong> Konsultasi publikasi dapat dilakukan melalui email atau dengan membuat janji temu terlebih dahulu.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    // Helper methods untuk view
    function getJurusanColor($jurusan) {
        return match ($jurusan) {
            'teknik-informatika' => 'blue',
            'teknik-sipil' => 'green',
            'teknik-elektro' => 'yellow',
            'teknik-mesin' => 'red',
            'arsitektur' => 'purple',
            'teknik-bangunan' => 'indigo',
            default => 'gray',
        };
    }

    function getJurusanDescription($jurusan) {
        return match ($jurusan) {
            'teknik-informatika' => 'Jurnal Komputer dan Teknologi Informasi',
            'teknik-sipil' => 'Jurnal Konstruksi dan Infrastruktur',
            'teknik-elektro' => 'Jurnal Elektronika dan Energi',
            'teknik-mesin' => 'Jurnal Manufaktur dan Termodinamika',
            'arsitektur' => 'Jurnal Desain dan Perencanaan',
            'teknik-bangunan' => 'Jurnal Teknik Bangunan',
            default => 'Jurnal Akademik',
        };
    }
@endphp
@endsection
