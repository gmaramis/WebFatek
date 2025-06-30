@extends('master')

@section('title', 'Tracer Study - Fakultas Teknik UNIMA')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6">
                Tracer Study
            </h1>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto mb-8">
                Bantu kami meningkatkan kualitas pendidikan Fakultas Teknik UNIMA dengan mengisi survey tracer study. 
                Data Anda sangat berharga untuk pengembangan kurikulum dan peningkatan kualitas lulusan.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('tracer-study.form') }}" 
                   class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Isi Survey Tracer Study
                </a>
                <button onclick="showStatistics()" 
                        class="bg-white text-blue-600 border-2 border-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition-all duration-300 shadow-lg">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Lihat Statistik
                </button>
            </div>
        </div>

        <!-- Statistik Section -->
        <div id="statisticsSection" class="hidden mb-12">
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Statistik Tracer Study</h2>
                <div id="statisticsContent" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Loading -->
                    <div class="text-center">
                        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto mb-4"></div>
                        <p class="text-gray-600">Memuat data...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manfaat Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Manfaat Tracer Study</h3>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Meningkatkan kualitas kurikulum sesuai kebutuhan industri</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Mengidentifikasi kompetensi yang dibutuhkan dunia kerja</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Meningkatkan akreditasi program studi</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Membangun jaringan alumni yang kuat</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Membantu mahasiswa baru dalam perencanaan karir</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Keunggulan Survey</h3>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Form yang mudah dan user-friendly</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Data terjamin kerahasiaannya</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Hanya membutuhkan waktu 10-15 menit</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Dapat diakses dari mana saja</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-blue-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Hasil langsung dapat dilihat</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Penjelasan Section -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Apa itu Tracer Study?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Definisi</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Tracer Study adalah studi pelacakan lulusan yang dilakukan untuk mengetahui status lulusan setelah menyelesaikan studinya. 
                        Studi ini bertujuan untuk mengumpulkan informasi tentang:
                    </p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 mt-2 flex-shrink-0"></span>
                            <span class="text-gray-700">Status pekerjaan lulusan</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 mt-2 flex-shrink-0"></span>
                            <span class="text-gray-700">Kesesuaian pekerjaan dengan bidang studi</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 mt-2 flex-shrink-0"></span>
                            <span class="text-gray-700">Tingkat kepuasan terhadap kurikulum</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 mt-2 flex-shrink-0"></span>
                            <span class="text-gray-700">Kompetensi yang dibutuhkan dunia kerja</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Tujuan</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Tracer Study memiliki beberapa tujuan penting dalam pengembangan pendidikan tinggi:
                    </p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-3 mt-2 flex-shrink-0"></span>
                            <span class="text-gray-700">Evaluasi dan perbaikan kurikulum</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-3 mt-2 flex-shrink-0"></span>
                            <span class="text-gray-700">Peningkatan kualitas lulusan</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-3 mt-2 flex-shrink-0"></span>
                            <span class="text-gray-700">Pengembangan kerjasama dengan industri</span>
                        </li>
                        <li class="flex items-start">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-3 mt-2 flex-shrink-0"></span>
                            <span class="text-gray-700">Akreditasi dan pengakuan institusi</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 text-white">
                <h2 class="text-3xl font-bold mb-4">Siap Berkontribusi?</h2>
                <p class="text-xl mb-6 opacity-90">
                    Data Anda sangat berharga untuk pengembangan Fakultas Teknik UNIMA. 
                    Mari kita bersama-sama meningkatkan kualitas pendidikan teknik di Indonesia.
                </p>
                <a href="{{ route('tracer-study.form') }}" 
                   class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Mulai Isi Survey Sekarang
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function showStatistics() {
    const section = document.getElementById('statisticsSection');
    const content = document.getElementById('statisticsContent');
    
    if (section.classList.contains('hidden')) {
        section.classList.remove('hidden');
        
        // Fetch statistics
        fetch('/tracer-study/statistics')
            .then(response => response.json())
            .then(data => {
                content.innerHTML = `
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 mb-2">${data.total_responses}</div>
                        <div class="text-gray-600">Total Responden</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600 mb-2">${data.average_gaji ? data.average_gaji.toFixed(1) : '-'}</div>
                        <div class="text-gray-600">Rata-rata Gaji (Juta)</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-purple-600 mb-2">${data.average_waktu_tunggu ? data.average_waktu_tunggu.toFixed(1) : '-'}</div>
                        <div class="text-gray-600">Rata-rata Waktu Tunggu (Bulan)</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-600 mb-2">${data.average_kepuasan ? data.average_kepuasan.toFixed(1) : '-'}</div>
                        <div class="text-gray-600">Rata-rata Kepuasan (1-5)</div>
                    </div>
                `;
            })
            .catch(error => {
                content.innerHTML = `
                    <div class="text-center col-span-4">
                        <div class="text-red-600 mb-2">Gagal memuat data statistik</div>
                        <button onclick="showStatistics()" class="text-blue-600 hover:underline">Coba lagi</button>
                    </div>
                `;
            });
    } else {
        section.classList.add('hidden');
    }
}
</script>
@endsection 