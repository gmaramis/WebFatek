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
        <div class="max-w-4xl mx-auto mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Dekan</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-shrink-0">
                        <div class="w-48 h-48 bg-gray-200 rounded-full flex items-center justify-center shadow-lg border-4 border-orange-400">
                            <i class="fas fa-user-tie text-4xl text-gray-500"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-center md:text-left">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Dr. Ir. JOHAN REVO UNTUNG, M.T.</h3>
                        <p class="text-gray-600 mb-4">NIP. 196501011990031001</p>
                        <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            Masa Jabatan: 2023 - 2027
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wakil Dekan -->
        <div class="max-w-6xl mx-auto mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Wakil Dekan</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-emerald-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- WD1 -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="text-center">
                        <div class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border-4 border-orange-400">
                            <i class="fas fa-user-graduate text-2xl text-gray-500"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Wakil Dekan I</h3>
                        <h4 class="text-md font-semibold text-gray-700 mb-2">Dr. Ir. RUDY TAMBUNAN, M.T.</h4>
                        <p class="text-gray-600 text-sm mb-3">NIP. 196502021990031002</p>
                        <div class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                            Bidang Akademik
                        </div>
                    </div>
                </div>

                <!-- WD2 -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="text-center">
                        <div class="w-32 h-32 bg-gray-200 rounded-full border-4 border-orange-400 flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-chart-line text-2xl text-gray-500"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Wakil Dekan II</h3>
                        <h4 class="text-md font-semibold text-gray-700 mb-2">Dr. Ir. ALEXANDER KARUNDENG, M.T.</h4>
                        <p class="text-gray-600 text-sm mb-3">NIP. 196506061990031006</p>
                        <div class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                            Bidang Umum & Keuangan
                        </div>
                    </div>
                </div>

                <!-- WD3 -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="text-center">
                        <div class="w-32 h-32 bg-gray-200 rounded-full border-4 border-orange-400 flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-handshake text-2xl text-gray-500"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Wakil Dekan III</h3>
                        <h4 class="text-md font-semibold text-gray-700 mb-2">Dr. Ir. JOHANES BAMBANG, M.T.</h4>
                        <p class="text-gray-600 text-sm mb-3">NIP. 196509091990031009</p>
                        <div class="inline-flex items-center px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-medium">
                            Bidang Kemahasiswaan & Kerjasama
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                    <div class="flex justify-center">
                        <div class="relative">
                            <div class="bg-orange-600 text-white px-8 py-4 rounded-xl shadow-lg">
                                <div class="text-center">
                                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <i class="fas fa-crown text-2xl text-white"></i>
                                    </div>
                                    <p class="font-bold text-lg">DEKAN</p>
                                    <p class="text-sm opacity-90">Dr. Ir. JOHAN REVO UNTUNG, M.T.</p>
                                </div>
                            </div>
                            <!-- Garis ke WD -->
                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-8 bg-orange-300"></div>
                        </div>
                    </div>

                    <!-- Level 2: Wakil Dekan -->
                    <div class="flex justify-center">
                        <div class="grid md:grid-cols-3 gap-8 max-w-4xl">
                            <!-- WD1 -->
                            <div class="relative">
                                <div class="bg-orange-500 text-white px-6 py-3 rounded-lg shadow-md">
                                    <div class="text-center">
                                        <div class="w-12 h-12 bg-orange-400 rounded-full flex items-center justify-center mx-auto mb-2">
                                            <i class="fas fa-graduation-cap text-lg text-white"></i>
                                        </div>
                                        <p class="font-bold">WD I</p>
                                        <p class="text-xs opacity-90">Akademik</p>
                                    </div>
                                </div>
                                <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-6 bg-orange-300"></div>
                            </div>

                            <!-- WD2 -->
                            <div class="relative">
                                <div class="bg-orange-500 text-white px-6 py-3 rounded-lg shadow-md">
                                    <div class="text-center">
                                        <div class="w-12 h-12 bg-orange-400 rounded-full flex items-center justify-center mx-auto mb-2">
                                            <i class="fas fa-chart-line text-lg text-white"></i>
                                        </div>
                                        <p class="font-bold">WD II</p>
                                        <p class="text-xs opacity-90">Umum & Keuangan</p>
                                    </div>
                                </div>
                                <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-6 bg-orange-300"></div>
                            </div>

                            <!-- WD3 -->
                            <div class="relative">
                                <div class="bg-orange-500 text-white px-6 py-3 rounded-lg shadow-md">
                                    <div class="text-center">
                                        <div class="w-12 h-12 bg-orange-400 rounded-full flex items-center justify-center mx-auto mb-2">
                                            <i class="fas fa-handshake text-lg text-white"></i>
                                        </div>
                                        <p class="font-bold">WD III</p>
                                        <p class="text-xs opacity-90">Kemahasiswaan</p>
                                    </div>
                                </div>
                                <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-6 bg-orange-300"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Level 3: Jurusan -->
                    <div class="flex justify-center">
                        <div class="grid md:grid-cols-3 gap-6 max-w-4xl">
                            <div class="bg-orange-50 px-6 py-4 rounded-lg text-center border border-orange-200">
                                <i class="fas fa-laptop-code text-2xl text-orange-600 mb-2"></i>
                                <p class="font-semibold text-gray-800">Teknik Informatika</p>
                            </div>
                            <div class="bg-orange-50 px-6 py-4 rounded-lg text-center border border-orange-200">
                                <i class="fas fa-building text-2xl text-orange-600 mb-2"></i>
                                <p class="font-semibold text-gray-800">Teknik Sipil</p>
                            </div>
                            <div class="bg-orange-50 px-6 py-4 rounded-lg text-center border border-orange-200">
                                <i class="fas fa-bolt text-2xl text-orange-600 mb-2"></i>
                                <p class="font-semibold text-gray-800">Teknik Elektro</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div class="grid md:grid-cols-3 gap-6 max-w-4xl">
                            <div class="bg-orange-50 px-6 py-4 rounded-lg text-center border border-orange-200">
                                <i class="fas fa-cogs text-2xl text-orange-600 mb-2"></i>
                                <p class="font-semibold text-gray-800">Teknik Mesin</p>
                            </div>
                            <div class="bg-orange-50 px-6 py-4 rounded-lg text-center border border-orange-200">
                                <i class="fas fa-drafting-compass text-2xl text-orange-600 mb-2"></i>
                                <p class="font-semibold text-gray-800">Arsitektur</p>
                            </div>
                            <div class="bg-orange-50 px-6 py-4 rounded-lg text-center border border-orange-200">
                                <i class="fas fa-hammer text-2xl text-orange-600 mb-2"></i>
                                <p class="font-semibold text-gray-800">Teknik Bangunan</p>
                            </div>
                        </div>
                    </div>
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