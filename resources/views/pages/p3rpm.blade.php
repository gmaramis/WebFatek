@extends('master')

@section('title', 'Ruang Kolaborasi (P3RPM)')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-indigo-900 via-indigo-700 to-cyan-500 py-16 mb-8">
    <div class="container mx-auto px-4 text-center text-white">
        @if(isset($contents['hero']))
            @foreach($contents['hero'] as $hero)
                <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $hero->title }}</h1>
                <p class="text-xl md:text-2xl font-light mb-6">{{ $hero->subtitle }}</p>
                <div class="flex justify-center">
                    <span class="inline-flex items-center bg-white/20 px-6 py-3 rounded-full text-lg font-semibold">
                        @if($hero->icon)
                            <svg class="w-6 h-6 mr-2 text-cyan-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        @endif
                        {{ $hero->content }}
                    </span>
                </div>
            @endforeach
        @else
            <h1 class="text-4xl md:text-6xl font-bold mb-4">P3RPM</h1>
            <p class="text-xl md:text-2xl font-light mb-6">Pusat Penyusunan Proposal Riset dan Pengabdian Masyarakat Fatek UNIMA</p>
            <div class="flex justify-center">
                <span class="inline-flex items-center bg-white/20 px-6 py-3 rounded-full text-lg font-semibold">
                    <svg class="w-6 h-6 mr-2 text-cyan-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Wadah Kolaborasi Riset dan Pengabdian
                </span>
            </div>
        @endif
    </div>
</div>

<div class="container mx-auto px-4">
    <!-- Deskripsi P3RPM -->
    @if(isset($contents['deskripsi']))
        <div class="mb-12">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        @foreach($contents['deskripsi'] as $deskripsi)
                            <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ $deskripsi->title }}</h2>
                            <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                                {{ $deskripsi->content }}
                            </p>
                            @if($deskripsi->description)
                                <p class="text-lg text-gray-600 leading-relaxed">
                                    {{ $deskripsi->description }}
                                </p>
                            @endif
                        @endforeach
                    </div>
                    <div class="bg-gradient-to-br from-indigo-100 to-cyan-100 rounded-xl p-8">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-indigo-800 mb-2">Ketua Tim Pengarah</h3>
                            <p class="text-lg font-semibold text-indigo-700">Prof. Dr. Revolson A. Mege, MS</p>
                            <p class="text-gray-600 mt-2">Didampingi para guru besar sesuai bidang keahlian dan peta jalan riset Fatek</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Visi dan Misi -->
    <div class="mb-12">
        <div class="grid md:grid-cols-2 gap-8">
            @if(isset($contents['visi']))
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $contents['visi']->first()->title }}</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $contents['visi']->first()->content }}
                    </p>
                </div>
            @endif

            @if(isset($contents['misi']))
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $contents['misi']->first()->title }}</h3>
                    </div>
                    <div class="text-gray-600 leading-relaxed">
                        <p class="mb-4">{{ $contents['misi']->first()->content }}</p>
                        @if($contents['misi']->first()->description)
                            <ul class="space-y-2">
                                @foreach(explode('. ', $contents['misi']->first()->description) as $item)
                                    @if(trim($item))
                                        <li class="flex items-start">
                                            <span class="text-blue-500 mr-2">•</span>
                                            {{ trim($item) }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Program Unggulan -->
    @if(isset($contents['program']))
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Program Unggulan P3RPM</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($contents['program'] as $program)
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-16 h-16 bg-{{ $program->color }}-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-{{ $program->color }}-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $program->title }}</h3>
                        <p class="text-gray-600">
                            {{ $program->content }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Skema Pendanaan -->
    @if(isset($contents['skema']))
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Skema Pendanaan yang Didukung</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($contents['skema'] as $skema)
                    <div class="bg-gradient-to-br from-{{ $skema->color }}-500 to-{{ $skema->color }}-600 rounded-xl p-6 text-white text-center">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2">{{ $skema->title }}</h3>
                        <p class="text-sm opacity-90">{{ $skema->content }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Roadmap Riset -->
    @if(isset($contents['roadmap']))
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Roadmap Riset Fatek</h2>
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($contents['roadmap'] as $index => $roadmap)
                        <div class="text-center">
                            <div class="w-16 h-16 bg-{{ $roadmap->color }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-2xl font-bold text-{{ $roadmap->color }}-600">{{ $index + 1 }}</span>
                            </div>
                            <h3 class="font-bold text-lg mb-2 text-gray-800">{{ $roadmap->title }}</h3>
                            <p class="text-gray-600 text-sm">{{ $roadmap->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Call to Action -->
    <div class="bg-gradient-to-r from-indigo-600 to-cyan-600 rounded-xl p-8 text-center text-white mb-12">
        <h2 class="text-2xl font-bold mb-4">Siap Berkontribusi dalam Riset?</h2>
        <p class="text-lg mb-6">Bergabunglah dengan P3RPM Fatek dan kembangkan proposal riset berkualitas tinggi</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Konsultasi Proposal
            </a>
            <a href="#" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition-colors">
                Kontak P3RPM
            </a>
        </div>
    </div>

    <!-- Informasi Kontak -->
    @if(isset($contents['kontak']))
        <div class="mb-16">
            <h2 class="text-2xl font-bold mb-8 text-gray-800">{{ $contents['kontak']->first()->title }}</h2>
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($contents['kontak'] as $kontak)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">{{ $kontak->title }}</h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-indigo-600 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 01-8 0 4 4 0 018 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7m0 0H9m3 0h3"/>
                                </svg>
                                <span>{{ $kontak->content }}</span>
                            </div>
                            @if($kontak->description)
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-indigo-600 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <span>{{ $kontak->description }}</span>
                                </div>
                            @endif
                        </div>
                        @if($kontak->description && str_contains($kontak->description, 'Jam'))
                            <div class="mt-4 p-3 bg-blue-50 rounded-lg">
                                <p class="text-sm text-blue-800">
                                    <strong>Note:</strong> Konsultasi proposal dapat dilakukan secara online atau offline dengan membuat janji temu terlebih dahulu.
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