@extends('master')

@section('title', 'Struktur Pimpinan - Fakultas Teknik UNIMA')

@section('content')
<main class="min-h-screen bg-gradient-to-br from-slate-50 to-gray-100">
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-white py-20">
        <div class="relative container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-orange-600 mb-6">
                Struktur Pimpinan
            </h1>
            <p class="text-xl text-orange-500 max-w-3xl mx-auto">
                Kepemimpinan Fakultas Teknik Universitas Negeri Manado
            </p>
        </div>
    </div>

    <!-- Struktur Pimpinan -->
    <div class="container mx-auto px-4 py-16">
        <!-- Dekan -->
        @if($dekan)
        <div class="max-w-4xl mx-auto mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Dekan</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-shrink-0">
                        @if($dekan->foto)
                            <img src="{{ asset('storage/' . $dekan->foto) }}" alt="{{ $dekan->nama }}" class="w-48 h-48 rounded-full object-cover shadow-lg border-4 border-orange-400">
                        @else
                            <div class="w-48 h-48 bg-gray-200 rounded-full flex items-center justify-center shadow-lg border-4 border-orange-400">
                                <i class="fas fa-user-tie text-4xl text-gray-500"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 text-center md:text-left">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $dekan->nama }}</h3>
                        <p class="text-gray-600 mb-4">NIP. {{ $dekan->nip }}</p>
                        @if($dekan->pendidikan_terakhir)
                            <p class="text-gray-600 mb-4">{{ $dekan->pendidikan_terakhir }}</p>
                        @endif
                        <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            Masa Jabatan: 2023 - 2027
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Wakil Dekan -->
        @if($wakilDekan->count() > 0)
        <div class="max-w-6xl mx-auto mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Wakil Dekan</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-emerald-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($wakilDekan as $wd)
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="text-center">
                        @if($wd->foto)
                            <img src="{{ asset('storage/' . $wd->foto) }}" alt="{{ $wd->nama }}" class="w-32 h-32 rounded-full object-cover mx-auto mb-4 shadow-lg border-4 border-orange-400">
                        @else
                            <div class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border-4 border-orange-400">
                                @if($wd->urutan == 1)
                                    <i class="fas fa-user-graduate text-2xl text-gray-500"></i>
                                @elseif($wd->urutan == 2)
                                    <i class="fas fa-chart-line text-2xl text-gray-500"></i>
                                @else
                                    <i class="fas fa-handshake text-2xl text-gray-500"></i>
                                @endif
                            </div>
                        @endif
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $wd->jabatan }}</h3>
                        <h4 class="text-md font-semibold text-gray-700 mb-2">{{ $wd->nama }}</h4>
                        <p class="text-gray-600 text-sm mb-3">NIP. {{ $wd->nip }}</p>
                        @if($wd->pendidikan_terakhir)
                            <p class="text-gray-600 text-sm mb-3">{{ $wd->pendidikan_terakhir }}</p>
                        @endif
                        @if($wd->bidang)
                            <div class="inline-flex items-center px-3 py-1 
                                @if($wd->urutan == 1) bg-blue-100 text-blue-800
                                @elseif($wd->urutan == 2) bg-green-100 text-green-800
                                @else bg-purple-100 text-purple-800
                                @endif rounded-full text-xs font-medium">
                                {{ $wd->bidang }}
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Struktur Organisasi Visual -->
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Struktur Kepemimpinan</h2>
                <div class="w-24 h-1 bg-orange-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                <!-- Hierarki Visual -->
                <div class="space-y-12">
                    <!-- Level 1: Dekan -->
                    @if($dekan)
                    <div class="flex justify-center">
                        <div class="relative">
                            <div class="bg-orange-600 text-white px-8 py-4 rounded-xl shadow-lg">
                                <div class="text-center">
                                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <i class="fas fa-crown text-2xl text-white"></i>
                                    </div>
                                    <p class="font-bold text-lg">DEKAN</p>
                                    <p class="text-sm opacity-90">{{ $dekan->nama }}</p>
                                </div>
                            </div>
                            <!-- Garis ke WD -->
                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-8 bg-orange-300"></div>
                        </div>
                    </div>
                    @endif

                    <!-- Level 2: Wakil Dekan -->
                    @if($wakilDekan->count() > 0)
                    <div class="flex justify-center">
                        <div class="grid md:grid-cols-3 gap-8 max-w-4xl">
                            @foreach($wakilDekan as $wd)
                            <div class="relative">
                                <div class="bg-orange-500 text-white px-6 py-3 rounded-lg shadow-md">
                                    <div class="text-center">
                                        <div class="w-12 h-12 bg-orange-400 rounded-full flex items-center justify-center mx-auto mb-2">
                                            @if($wd->urutan == 1)
                                                <i class="fas fa-graduation-cap text-lg text-white"></i>
                                            @elseif($wd->urutan == 2)
                                                <i class="fas fa-chart-line text-lg text-white"></i>
                                            @else
                                                <i class="fas fa-handshake text-lg text-white"></i>
                                            @endif
                                        </div>
                                        <p class="font-bold">{{ $wd->jabatan }}</p>
                                        <p class="text-xs opacity-90">{{ $wd->bidang ?? 'Bidang' }}</p>
                                    </div>
                                </div>
                                <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-6 bg-orange-300"></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Level 3: Jurusan -->
                    @if($kepalaJurusan->count() > 0)
                    <div class="flex justify-center">
                        <div class="grid md:grid-cols-3 gap-6 max-w-4xl">
                            @foreach($kepalaJurusan as $kj)
                            <div class="bg-orange-50 px-6 py-4 rounded-lg text-center border border-orange-200">
                                <i class="fas fa-cogs text-2xl text-orange-600 mb-2"></i>
                                <p class="font-semibold text-gray-800">{{ $kj->bidang ?? $kj->jabatan }}</p>
                                @if($kj->nama)
                                    <p class="text-sm text-gray-600 mt-1">{{ $kj->nama }}</p>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>

<style>
/* CSS khusus untuk halaman struktur - memperbaiki dropdown */
/* Reset semua dropdown ke state normal dengan specificity tinggi */
body .group ul,
html .group ul,
nav .group ul,
header .group ul {
    opacity: 0 !important;
    transform: scale(0.95) !important;
    pointer-events: none !important;
    visibility: hidden !important;
}

/* Hanya tampilkan dropdown saat hover dengan specificity tinggi */
body .group:hover ul,
html .group:hover ul,
nav .group:hover ul,
header .group:hover ul {
    opacity: 1 !important;
    transform: scale(1) !important;
    pointer-events: auto !important;
    visibility: visible !important;
}

/* Override semua CSS dropdown yang mungkin konflik */
.group-hover\:opacity-100 {
    opacity: 0 !important;
}

.group:hover .group-hover\:opacity-100 {
    opacity: 1 !important;
}

.group-hover\:scale-100 {
    transform: scale(0.95) !important;
}

.group:hover .group-hover\:scale-100 {
    transform: scale(1) !important;
}

.group-hover\:pointer-events-auto {
    pointer-events: none !important;
}

.group:hover .group-hover\:pointer-events-auto {
    pointer-events: auto !important;
}

/* Animasi sederhana */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.bg-white {
    animation: fadeInUp 0.6s ease-out;
}

/* Stagger animation delays */
.bg-white:nth-child(1) { animation-delay: 0.1s; }
.bg-white:nth-child(2) { animation-delay: 0.2s; }
.bg-white:nth-child(3) { animation-delay: 0.3s; }

/* Hover effects */
.bg-white:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';
    
    // Force reset semua dropdown pada load
    function resetAllDropdowns() {
        const dropdowns = document.querySelectorAll('.group ul, nav .group ul, header .group ul');
        dropdowns.forEach(dropdown => {
            dropdown.style.opacity = '0';
            dropdown.style.transform = 'scale(0.95)';
            dropdown.style.pointerEvents = 'none';
            dropdown.style.visibility = 'hidden';
        });
    }
    
    // Reset dropdowns immediately
    resetAllDropdowns();
    
    // Reset lagi setelah delay untuk memastikan
    setTimeout(resetAllDropdowns, 100);
    setTimeout(resetAllDropdowns, 500);
    
    // Add intersection observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe all elements
    document.querySelectorAll('.bg-white').forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        observer.observe(element);
    });
    
    // Prevent dropdown conflicts by adding event listeners
    document.addEventListener('mouseover', function(e) {
        // Jika mouse tidak di atas group, pastikan dropdown tertutup
        if (!e.target.closest('.group')) {
            const openDropdowns = document.querySelectorAll('.group ul[style*="opacity: 1"]');
            openDropdowns.forEach(dropdown => {
                dropdown.style.opacity = '0';
                dropdown.style.transform = 'scale(0.95)';
                dropdown.style.pointerEvents = 'none';
                dropdown.style.visibility = 'hidden';
            });
        }
    });
});
</script>
@endsection