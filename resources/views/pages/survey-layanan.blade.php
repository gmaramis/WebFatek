@extends('master')

@section('title', 'Survey Layanan - Fakultas Teknik UNIMA')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Survey Kepuasan Layanan</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Bantu kami meningkatkan kualitas layanan Fakultas Teknik UNIMA dengan memberikan feedback Anda
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('survey-layanan.form') }}" 
                   class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 inline-block">
                    <i class="fas fa-clipboard-list mr-2"></i>Isi Survey Sekarang
                </a>
                <a href="#statistik" 
                   class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-800 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 inline-block">
                    <i class="fas fa-chart-bar mr-2"></i>Lihat Statistik
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Informasi Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Mengapa Survey Ini Penting?</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Survey kepuasan layanan merupakan instrumen evaluasi yang digunakan untuk mengukur tingkat kepuasan pengguna terhadap layanan yang diberikan oleh Fakultas Teknik UNIMA.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Evaluasi Kualitas</h3>
                <p class="text-gray-600">
                    Mengukur tingkat kepuasan pengguna terhadap berbagai layanan yang disediakan
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lightbulb text-2xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Masukan Berharga</h3>
                <p class="text-gray-600">
                    Menghimpun saran dan kritik untuk meningkatkan kualitas layanan
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-rocket text-2xl text-orange-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Perbaikan Berkelanjutan</h3>
                <p class="text-gray-600">
                    Meningkatkan efektivitas dan efisiensi layanan secara berkelanjutan
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Jenis Layanan Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Layanan yang Dinilai</h2>
            <p class="text-lg text-gray-600">
                Berikan penilaian Anda terhadap layanan-layanan berikut
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
                <div class="flex items-center mb-4">
                    <i class="fas fa-graduation-cap text-2xl text-blue-600 mr-3"></i>
                    <h3 class="text-xl font-semibold">Layanan Akademik</h3>
                </div>
                <p class="text-gray-600 mb-4">
                    KRS, pengisian nilai, bimbingan akademik, dan layanan akademik lainnya
                </p>
                <ul class="text-sm text-gray-500 space-y-1">
                    <li>• Pendaftaran mata kuliah</li>
                    <li>• Pengisian nilai</li>
                    <li>• Bimbingan akademik</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
                <div class="flex items-center mb-4">
                    <i class="fas fa-users text-2xl text-green-600 mr-3"></i>
                    <h3 class="text-xl font-semibold">Layanan Kemahasiswaan</h3>
                </div>
                <p class="text-gray-600 mb-4">
                    Beasiswa, organisasi mahasiswa, dan kegiatan kemahasiswaan
                </p>
                <ul class="text-sm text-gray-500 space-y-1">
                    <li>• Beasiswa dan bantuan</li>
                    <li>• Organisasi mahasiswa</li>
                    <li>• Kegiatan kemahasiswaan</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
                <div class="flex items-center mb-4">
                    <i class="fas fa-money-bill-wave text-2xl text-yellow-600 mr-3"></i>
                    <h3 class="text-xl font-semibold">Layanan Keuangan</h3>
                </div>
                <p class="text-gray-600 mb-4">
                    Pembayaran SPP, administrasi keuangan, dan layanan keuangan lainnya
                </p>
                <ul class="text-sm text-gray-500 space-y-1">
                    <li>• Pembayaran SPP</li>
                    <li>• Administrasi keuangan</li>
                    <li>• Refund dan pengembalian</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-500">
                <div class="flex items-center mb-4">
                    <i class="fas fa-building text-2xl text-purple-600 mr-3"></i>
                    <h3 class="text-xl font-semibold">Sarana & Prasarana</h3>
                </div>
                <p class="text-gray-600 mb-4">
                    Laboratorium, ruang kelas, perpustakaan, dan fasilitas lainnya
                </p>
                <ul class="text-sm text-gray-500 space-y-1">
                    <li>• Laboratorium</li>
                    <li>• Ruang kelas</li>
                    <li>• Perpustakaan</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-red-500">
                <div class="flex items-center mb-4">
                    <i class="fas fa-laptop text-2xl text-red-600 mr-3"></i>
                    <h3 class="text-xl font-semibold">Teknologi Informasi</h3>
                </div>
                <p class="text-gray-600 mb-4">
                    Sistem informasi, WiFi, dan layanan teknologi informasi
                </p>
                <ul class="text-sm text-gray-500 space-y-1">
                    <li>• Sistem informasi</li>
                    <li>• WiFi dan internet</li>
                    <li>• Support IT</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-500">
                <div class="flex items-center mb-4">
                    <i class="fas fa-handshake text-2xl text-indigo-600 mr-3"></i>
                    <h3 class="text-xl font-semibold">Kerjasama</h3>
                </div>
                <p class="text-gray-600 mb-4">
                    Kerjasama dengan industri, magang, dan program kerjasama lainnya
                </p>
                <ul class="text-sm text-gray-500 space-y-1">
                    <li>• Kerjasama industri</li>
                    <li>• Program magang</li>
                    <li>• MoU dan kerjasama</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Statistik Section -->
<section id="statistik" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Statistik Survey Layanan</h2>
            <p class="text-lg text-gray-600">
                Lihat hasil survey kepuasan layanan secara real-time
            </p>
        </div>

        <div id="statistik-container" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Statistik akan dimuat secara dinamis -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2" id="total-responden">-</h3>
                <p class="text-gray-600">Total Responden</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-2xl text-green-600"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2" id="rata-kepuasan">-</h3>
                <p class="text-gray-600">Rata-rata Kepuasan</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-2xl text-orange-600"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2" id="layanan-terbaik">-</h3>
                <p class="text-gray-600">Layanan Terbaik</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-calendar-alt text-2xl text-purple-600"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2" id="survey-bulan-ini">-</h3>
                <p class="text-gray-600">Survey Bulan Ini</p>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('survey-layanan.form') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 inline-block">
                <i class="fas fa-plus mr-2"></i>Berikan Feedback Anda
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Siap Memberikan Feedback?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Survey ini hanya membutuhkan waktu 5-10 menit untuk diselesaikan. Feedback Anda sangat berharga untuk meningkatkan kualitas layanan kami.
        </p>
        <a href="{{ route('survey-layanan.form') }}" 
           class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-4 px-10 rounded-lg text-lg transition duration-300 inline-block">
            <i class="fas fa-clipboard-list mr-2"></i>Mulai Survey Sekarang
        </a>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Load statistik survey
    loadSurveyStatistics();
});

function loadSurveyStatistics() {
    fetch('/survey-layanan/statistics')
        .then(response => response.json())
        .then(data => {
            // Update statistik
            document.getElementById('total-responden').textContent = data.total_responses || 0;
            document.getElementById('rata-kepuasan').textContent = (data.overall_satisfaction || 0).toFixed(1) + '/5';
            
            // Cari layanan dengan rating tertinggi
            if (data.average_ratings) {
                const ratings = data.average_ratings;
                const maxRating = Math.max(...Object.values(ratings));
                const bestService = Object.keys(ratings).find(key => ratings[key] === maxRating);
                document.getElementById('layanan-terbaik').textContent = bestService ? 
                    bestService.replace('_', ' ').toUpperCase() : '-';
            }
            
            // Survey bulan ini (contoh)
            const currentMonth = new Date().getMonth();
            const currentYear = new Date().getFullYear();
            document.getElementById('survey-bulan-ini').textContent = data.total_responses || 0;
        })
        .catch(error => {
            console.error('Error loading statistics:', error);
        });
}
</script>
@endpush 