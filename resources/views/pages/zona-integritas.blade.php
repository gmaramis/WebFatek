@extends('master')

@section('title', 'Zona Integritas')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-green-900 via-green-700 to-emerald-500 py-16 mb-8">
    <div class="container mx-auto px-4 text-center text-white">
        <div class="max-w-4xl mx-auto">
            @if(isset($contents['hero']))
                @foreach($contents['hero'] as $hero)
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">{{ $hero->title }}</h1>
                    <p class="text-xl md:text-2xl font-light mb-8 leading-relaxed">
                        {{ $hero->subtitle }}
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <span class="inline-flex items-center bg-white/20 px-6 py-3 rounded-full text-lg font-semibold">
                            <svg class="w-6 h-6 mr-2 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $hero->content }}
                        </span>
                        <span class="inline-flex items-center bg-white/20 px-6 py-3 rounded-full text-lg font-semibold">
                            <svg class="w-6 h-6 mr-2 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            Bersih & Melayani
                        </span>
                        <span class="inline-flex items-center bg-white/20 px-6 py-3 rounded-full text-lg font-semibold">
                            <svg class="w-6 h-6 mr-2 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Good Governance
                        </span>
                    </div>
                @endforeach
            @else
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Zona Integritas</h1>
                <p class="text-xl md:text-2xl font-light mb-8 leading-relaxed">
                    Zona Integritas menuju Wilayah Bebas Korupsi (WBK) dan Wilayah Birokrasi Bersih dan Melayani (WBBM) di lingkungan Fakultas Teknik UNIMA
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <span class="inline-flex items-center bg-white/20 px-6 py-3 rounded-full text-lg font-semibold">
                        <svg class="w-6 h-6 mr-2 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Bebas Korupsi
                    </span>
                    <span class="inline-flex items-center bg-white/20 px-6 py-3 rounded-full text-lg font-semibold">
                        <svg class="w-6 h-6 mr-2 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Bersih & Melayani
                    </span>
                    <span class="inline-flex items-center bg-white/20 px-6 py-3 rounded-full text-lg font-semibold">
                        <svg class="w-6 h-6 mr-2 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Good Governance
                    </span>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="container mx-auto px-4">
    <!-- Maklumat Pelayanan Publik -->
    @if(isset($contents['maklumat']))
        <div class="mb-12">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ $contents['maklumat']->first()->title }}</h2>
                    <div class="w-24 h-1 bg-green-600 mx-auto"></div>
                </div>

                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    <p class="text-lg mb-6">
                        {{ $contents['maklumat']->first()->content }}
                    </p>

                    @if($contents['maklumat']->first()->description)
                        <div class="bg-green-50 border-l-4 border-green-500 p-6 my-8">
                            <h3 class="text-xl font-bold text-green-800 mb-3">Komitmen Fakultas Teknik UNIMAUNIMA</h3>
                            <p class="text-green-700">
                                {{ $contents['maklumat']->first()->description }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <!-- Prinsip-Prinsip Zona Integritas -->
    @if(isset($contents['prinsip']))
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Prinsip-Prinsip Zona Integritas</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($contents['prinsip'] as $prinsip)
                    <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
                        <div class="w-16 h-16 bg-{{ $prinsip->color }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-{{ $prinsip->color }}-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $prinsip->title }}</h3>
                        <p class="text-gray-600 text-sm">
                            {{ $prinsip->content }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Sasaran Zona Integritas -->
    @if(isset($contents['sasaran']))
        <div class="mb-12">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-8">
                <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Sasaran Zona Integritas Fakultas Teknik UNIMAUNIMA</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach($contents['sasaran'] as $sasaran)
                        <div>
                            <h3 class="text-xl font-bold text-green-800 mb-4">{{ $sasaran->title }}</h3>
                            <ul class="space-y-3 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>{{ $sasaran->content }}</span>
                                </li>
                                @if($sasaran->description)
                                    @foreach(explode('. ', $sasaran->description) as $item)
                                        @if(trim($item))
                                            <li class="flex items-start">
                                                <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                                </svg>
                                                <span>{{ trim($item) }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Langkah-Langkah Strategis -->
    @if(isset($contents['langkah']))
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Langkah-Langkah Strategis</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($contents['langkah'] as $langkah)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="text-center mb-4">
                            <div class="w-16 h-16 bg-{{ $langkah->color }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-{{ $langkah->color }}-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">{{ $langkah->title }}</h3>
                        </div>
                        <ul class="space-y-2 text-gray-600 text-sm">
                            @foreach(explode(', ', $langkah->content) as $item)
                                <li>• {{ trim($item) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Dokumen Pendukung -->
    @if(isset($contents['dokumen']))
        <div class="mb-12">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="text-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Dokumen Pendukung</h2>
                    <div class="w-24 h-1 bg-green-600 mx-auto"></div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    @foreach($contents['dokumen'] as $dokumen)
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">{{ $dokumen->title }}</h3>
                            <p class="text-gray-600 mb-4">
                                {{ $dokumen->content }}
                            </p>
                            <a href="#" class="inline-flex items-center text-green-600 hover:text-green-700 font-semibold">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Lihat Dokumen
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Call to Action -->
    <div class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl p-8 text-center text-white mb-12">
        <h2 class="text-2xl font-bold mb-4">Bersama Wujudkan Fakultas Teknik UNIMAyang Bersih dan Melayani</h2>
        <p class="text-lg mb-6">Mari kita dukung program Zona Integritas untuk mewujudkan Fakultas Teknik UNIMA yang bebas korupsi dan memberikan pelayanan terbaik</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="bg-white text-green-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Laporkan Pelanggaran
            </a>
            <a href="#" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-600 transition-colors">
                Kontak Pengaduan
            </a>
        </div>
    </div>

    <!-- Informasi Kontak -->
    @if(isset($contents['kontak']))
        <div class="mb-16">
            <h2 class="text-2xl font-bold mb-8 text-gray-800">Informasi Kontak Zona Integritas</h2>
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($contents['kontak'] as $kontak)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">{{ $kontak->title }}</h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 01-8 0 4 4 0 018 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7m0 0H9m3 0h3"/>
                                </svg>
                                <span>{{ $kontak->content }}</span>
                            </div>
                            @if($kontak->description)
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <span>{{ $kontak->description }}</span>
                                </div>
                            @endif
                        </div>
                        @if(str_contains($kontak->description, 'Jam'))
                            <div class="mt-4 p-3 bg-green-50 rounded-lg">
                                <p class="text-sm text-green-800">
                                    <strong>Note:</strong> Pengaduan dapat disampaikan secara langsung, melalui email, atau melalui kotak pengaduan yang tersedia di setiap gedung Fakultas Teknik UNIMA.
                                </p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
