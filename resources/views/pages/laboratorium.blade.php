@extends('master')

@section('title', 'Layanan Laboratorium - Fakultas Teknik UNIMA')

@section('content')
<!-- Hero Section Modern -->
<section class="relative bg-gradient-to-br from-blue-700 via-blue-500 to-blue-300 text-white py-20 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="md:w-2/3 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight drop-shadow-lg">Layanan Laboratorium</h1>
                <p class="text-lg md:text-2xl mb-6 font-medium drop-shadow">Fasilitas laboratorium modern untuk mendukung riset, praktikum, dan inovasi di Fakultas Teknik UNIMA.</p>
                <a href="#daftar-lab" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300 text-lg"><i class="fas fa-flask mr-2"></i>Lihat Daftar Laboratorium</a>
            </div>
            <div class="md:w-1/3 flex justify-center md:justify-end">
                <img src="https://cdn-icons-png.flaticon.com/512/2913/2913461.png" alt="Lab Illustration" class="w-56 h-56 object-contain drop-shadow-xl animate-float" loading="lazy">
            </div>
        </div>
    </div>
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-blue-700/60 to-blue-300/30 pointer-events-none"></div>
</section>

<!-- Daftar Laboratorium Modern Grid -->
<section id="daftar-lab" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto mb-12 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">Daftar Laboratorium</h2>
            <p class="text-gray-600 text-lg">Berikut beberapa laboratorium unggulan yang tersedia di Fakultas Teknik UNIMA:</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-network-wired text-4xl text-blue-600 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">Lab Komputer & Jaringan</h3>
                <p class="text-gray-600 text-center">Fasilitas praktikum pemrograman, jaringan komputer, dan keamanan siber.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-cubes text-4xl text-orange-500 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">Lab Struktur & Material</h3>
                <p class="text-gray-600 text-center">Pengujian material, struktur bangunan, dan riset konstruksi.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-microchip text-4xl text-green-600 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">Lab Elektronika & Otomasi</h3>
                <p class="text-gray-600 text-center">Praktikum elektronika, robotika, dan sistem otomasi industri.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-cogs text-4xl text-indigo-500 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">Lab Mesin & Manufaktur</h3>
                <p class="text-gray-600 text-center">Fasilitas mesin, manufaktur, dan pengujian alat teknik mesin.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-drafting-compass text-4xl text-pink-500 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">Lab Arsitektur & Desain</h3>
                <p class="text-gray-600 text-center">Studio desain arsitektur, maket, dan simulasi ruang.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-atom text-4xl text-yellow-500 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">Lab Fisika Dasar</h3>
                <p class="text-gray-600 text-center">Eksperimen fisika dasar untuk mendukung pembelajaran teknik.</p>
            </div>
        </div>
    </div>
</section>

<!-- Layanan & Kontak Modern -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-blue-800 mb-4">Layanan Laboratorium</h2>
                <p class="text-gray-600 text-lg">Berbagai layanan laboratorium tersedia untuk mahasiswa, dosen, dan umum.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="flex flex-col items-center">
                    <i class="fas fa-user-graduate text-3xl text-blue-600 mb-2"></i>
                    <span class="font-semibold">Praktikum Mahasiswa</span>
                </div>
                <div class="flex flex-col items-center">
                    <i class="fas fa-vials text-3xl text-orange-500 mb-2"></i>
                    <span class="font-semibold">Penelitian & Skripsi</span>
                </div>
                <div class="flex flex-col items-center">
                    <i class="fas fa-tools text-3xl text-green-600 mb-2"></i>
                    <span class="font-semibold">Pengujian & Peminjaman Alat</span>
                </div>
                <div class="flex flex-col items-center">
                    <i class="fas fa-chalkboard-teacher text-3xl text-indigo-500 mb-2"></i>
                    <span class="font-semibold">Pelatihan & Workshop</span>
                </div>
                <div class="flex flex-col items-center">
                    <i class="fas fa-comments text-3xl text-pink-500 mb-2"></i>
                    <span class="font-semibold">Konsultasi Teknis</span>
                </div>
                <div class="flex flex-col items-center">
                    <i class="fas fa-calendar-check text-3xl text-yellow-500 mb-2"></i>
                    <span class="font-semibold">Reservasi & Jadwal</span>
                </div>
            </div>
            <div class="bg-blue-50 rounded-xl p-8 shadow text-center">
                <h3 class="text-xl font-bold text-blue-700 mb-2">Informasi & Kontak</h3>
                <p class="mb-2 text-gray-700">Untuk informasi lebih lanjut atau pemesanan layanan laboratorium, silakan hubungi:</p>
                <ul class="mb-4 text-gray-700">
                    <li><i class="fas fa-envelope mr-2 text-blue-600"></i>Email: <a href="mailto:laboratorium@unima.ac.id" class="text-blue-600 underline">laboratorium@unima.ac.id</a></li>
                    <li><i class="fas fa-phone mr-2 text-orange-500"></i>Telepon: (0431) 123456</li>
                    <li><i class="fas fa-map-marker-alt mr-2 text-green-600"></i>Alamat: Gedung Laboratorium, Fakultas Teknik UNIMA</li>
                </ul>
                <a href="mailto:laboratorium@unima.ac.id" class="inline-block mt-4 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg shadow transition">Kirim Email Sekarang</a>
                <p class="text-gray-500 text-xs mt-4">Jadwal layanan dan pemesanan alat dapat berubah sewaktu-waktu. Silakan konfirmasi ke pengelola laboratorium.</p>
            </div>
        </div>
    </div>
</section>

@push('head')
<style>
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-16px); }
    }
</style>
@endpush
@endsection 