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

    <!-- Jurusan Grid -->
    <section class="py-16 px-4">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Teknik Informatika -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="relative h-48 bg-gradient-to-br from-blue-500 to-purple-600">
                        <img src="{{ asset('img/TI.jpg') }}" alt="Teknik Informatika" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <h3 class="text-2xl font-bold text-white mb-1">Teknik Informatika</h3>
                            <p class="text-blue-100 text-sm">Program Studi S1</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                Akreditasi B
                            </span>
                            <span class="text-orange-600 font-semibold">4 Tahun</span>
                        </div>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Program studi yang mempelajari pengembangan software, sistem informasi, 
                            dan teknologi komputer untuk solusi digital masa depan.
                        </p>
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Software Development
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Web & Mobile Apps
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Artificial Intelligence
                            </div>
                        </div>
                        <a href="/teknik-informatika" class="inline-flex items-center justify-center w-full px-4 py-3 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700 transition-colors duration-200">
                            Lihat Detail
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                        <div class="mt-3">
                            <a href="https://ti.unima.ac.id" target="_blank" class="inline-flex items-center justify-center w-full px-4 py-2 border border-orange-600 text-orange-600 font-medium rounded-lg hover:bg-orange-50 transition-colors duration-200 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                Website Prodi
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Teknik Sipil -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="relative h-48 bg-gradient-to-br from-green-500 to-teal-600">
                        <img src="{{ asset('img/sipil.jpg') }}" alt="Teknik Sipil" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <h3 class="text-2xl font-bold text-white mb-1">Teknik Sipil</h3>
                            <p class="text-green-100 text-sm">Program Studi S1</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                Akreditasi B
                            </span>
                            <span class="text-orange-600 font-semibold">4 Tahun</span>
                        </div>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Program studi yang mempelajari perencanaan, perancangan, dan konstruksi 
                            infrastruktur untuk pembangunan berkelanjutan.
                        </p>
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Struktur Bangunan
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Transportasi
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Hidrologi
                            </div>
                        </div>
                        <a href="/teknik-sipil" class="inline-flex items-center justify-center w-full px-4 py-3 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700 transition-colors duration-200">
                            Lihat Detail
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                        <div class="mt-3">
                            <a href="https://ts.unima.ac.id" target="_blank" class="inline-flex items-center justify-center w-full px-4 py-2 border border-orange-600 text-orange-600 font-medium rounded-lg hover:bg-orange-50 transition-colors duration-200 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                Website Prodi
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Teknik Elektro -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="relative h-48 bg-gradient-to-br from-yellow-500 to-orange-600">
                        <img src="{{ asset('img/elektro.jpg') }}" alt="Teknik Elektro" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <h3 class="text-2xl font-bold text-white mb-1">Teknik Elektro</h3>
                            <p class="text-yellow-100 text-sm">Program Studi S1</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                Akreditasi B
                            </span>
                            <span class="text-orange-600 font-semibold">4 Tahun</span>
                        </div>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Program studi yang mempelajari sistem kelistrikan, elektronika, 
                            dan teknologi energi untuk masa depan yang berkelanjutan.
                        </p>
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Sistem Tenaga
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Elektronika
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Telekomunikasi
                            </div>
                        </div>
                        <a href="/teknik-elektro" class="inline-flex items-center justify-center w-full px-4 py-3 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700 transition-colors duration-200">
                            Lihat Detail
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                        <div class="mt-3">
                            <a href="https://te.unima.ac.id" target="_blank" class="inline-flex items-center justify-center w-full px-4 py-2 border border-orange-600 text-orange-600 font-medium rounded-lg hover:bg-orange-50 transition-colors duration-200 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                Website Prodi
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Teknik Mesin -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="relative h-48 bg-gradient-to-br from-red-500 to-pink-600">
                        <img src="{{ asset('img/mesin.jpg') }}" alt="Teknik Mesin" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <h3 class="text-2xl font-bold text-white mb-1">Teknik Mesin</h3>
                            <p class="text-red-100 text-sm">Program Studi S1</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                Akreditasi B
                            </span>
                            <span class="text-orange-600 font-semibold">4 Tahun</span>
                        </div>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Program studi yang mempelajari perancangan, pembuatan, dan pemeliharaan 
                            mesin untuk industri dan teknologi modern.
                        </p>
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Perancangan Mesin
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Manufaktur
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Termodinamika
                            </div>
                        </div>
                        <a href="/teknik-mesin" class="inline-flex items-center justify-center w-full px-4 py-3 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700 transition-colors duration-200">
                            Lihat Detail
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                        <div class="mt-3">
                            <a href="https://tm.unima.ac.id" target="_blank" class="inline-flex items-center justify-center w-full px-4 py-2 border border-orange-600 text-orange-600 font-medium rounded-lg hover:bg-orange-50 transition-colors duration-200 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                Website Prodi
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Arsitektur -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="relative h-48 bg-gradient-to-br from-purple-500 to-indigo-600">
                        <img src="{{ asset('img/ars.jpg') }}" alt="Arsitektur" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <h3 class="text-2xl font-bold text-white mb-1">Arsitektur</h3>
                            <p class="text-purple-100 text-sm">Program Studi S1</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                Akreditasi B
                            </span>
                            <span class="text-orange-600 font-semibold">4 Tahun</span>
                        </div>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Program studi yang mempelajari perancangan arsitektur, 
                            desain bangunan, dan perencanaan ruang yang berkelanjutan.
                        </p>
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Desain Arsitektur
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Perencanaan Kota
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Interior Design
                            </div>
                        </div>
                        <a href="/arsitektur" class="inline-flex items-center justify-center w-full px-4 py-3 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700 transition-colors duration-200">
                            Lihat Detail
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                        <div class="mt-3">
                            <a href="https://ars.unima.ac.id" target="_blank" class="inline-flex items-center justify-center w-full px-4 py-2 border border-orange-600 text-orange-600 font-medium rounded-lg hover:bg-orange-50 transition-colors duration-200 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                Website Prodi
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Teknik Bangunan -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden transform hover:-translate-y-2">
                    <div class="relative h-48 bg-gradient-to-br from-teal-500 to-cyan-600">
                        <img src="{{ asset('img/PTB.jpg') }}" alt="Teknik Bangunan" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <h3 class="text-2xl font-bold text-white mb-1">Teknik Bangunan</h3>
                            <p class="text-teal-100 text-sm">Program Studi S1</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                Akreditasi B
                            </span>
                            <span class="text-orange-600 font-semibold">4 Tahun</span>
                        </div>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Program studi yang mempelajari teknologi konstruksi, 
                            manajemen proyek, dan pengembangan infrastruktur.
                        </p>
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Konstruksi Bangunan
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Manajemen Proyek
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Estimasi Biaya
                            </div>
                        </div>
                        <a href="/teknik-bangunan" class="inline-flex items-center justify-center w-full px-4 py-3 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700 transition-colors duration-200">
                            Lihat Detail
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                        <div class="mt-3">
                            <a href="https://ptb.unima.ac.id" target="_blank" class="inline-flex items-center justify-center w-full px-4 py-2 border border-orange-600 text-orange-600 font-medium rounded-lg hover:bg-orange-50 transition-colors duration-200 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                Website Prodi
                            </a>
                        </div>
                    </div>
                </div>

            </div>
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