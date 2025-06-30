@extends('master')

@section('title', 'Layanan Akademik - Fakultas Teknik UNIMA')

@section('content')
<!-- Hero Section Modern -->
<section class="relative bg-gradient-to-br from-blue-700 via-blue-500 to-blue-300 text-white py-20 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="md:w-2/3 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight drop-shadow-lg">Layanan Akademik</h1>
                <p class="text-lg md:text-2xl mb-6 font-medium drop-shadow">Layanan akademik terintegrasi untuk mendukung proses belajar, administrasi, dan pengembangan mahasiswa Fakultas Teknik UNIMA.</p>
                <a href="#jenis-layanan" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300 text-lg"><i class="fas fa-graduation-cap mr-2"></i>Lihat Jenis Layanan</a>
            </div>
            <div class="md:w-1/3 flex justify-center md:justify-end">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Akademik Illustration" class="w-56 h-56 object-contain drop-shadow-xl animate-float" loading="lazy">
            </div>
        </div>
    </div>
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-blue-700/60 to-blue-300/30 pointer-events-none"></div>
</section>

<!-- Jenis Layanan Akademik Modern Grid -->
<section id="jenis-layanan" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto mb-12 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">Jenis Layanan Akademik</h2>
            <p class="text-gray-600 text-lg">Berikut layanan akademik utama yang tersedia untuk mahasiswa dan civitas akademika:</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-laptop-code text-4xl text-blue-600 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">KRS Online & Pendaftaran</h3>
                <p class="text-gray-600 text-center">Pengisian KRS, pendaftaran mata kuliah, dan administrasi akademik daring.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-user-clock text-4xl text-orange-500 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">Cuti & Surat Keterangan</h3>
                <p class="text-gray-600 text-center">Pengajuan cuti akademik, surat aktif kuliah, dan surat keterangan lainnya.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-file-alt text-4xl text-green-600 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">Transkrip & Legalisir</h3>
                <p class="text-gray-600 text-center">Pelayanan transkrip nilai, legalisir ijazah, dan dokumen akademik.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-chalkboard-teacher text-4xl text-indigo-500 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">Bimbingan Akademik</h3>
                <p class="text-gray-600 text-center">Bimbingan akademik oleh dosen wali untuk pengembangan studi mahasiswa.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-award text-4xl text-pink-500 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">Beasiswa & Prestasi</h3>
                <p class="text-gray-600 text-center">Informasi dan pengajuan beasiswa serta penghargaan prestasi mahasiswa.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition">
                <i class="fas fa-briefcase text-4xl text-yellow-500 mb-4"></i>
                <h3 class="font-bold text-lg mb-2">Magang, KKN & Sidang</h3>
                <p class="text-gray-600 text-center">Pelayanan magang, KKN, dan sidang skripsi untuk kelulusan mahasiswa.</p>
            </div>
        </div>
    </div>
</section>

<!-- Prosedur & Kontak Modern -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-blue-800 mb-4">Prosedur Layanan Akademik</h2>
                <ol class="list-decimal pl-6 mb-8 text-gray-700 text-left max-w-2xl mx-auto">
                    <li>Mahasiswa mengajukan permohonan layanan melalui portal atau datang langsung ke bagian akademik.</li>
                    <li>Melengkapi dokumen persyaratan sesuai jenis layanan.</li>
                    <li>Proses verifikasi dan validasi oleh petugas akademik.</li>
                    <li>Pemberitahuan hasil layanan melalui email atau portal mahasiswa.</li>
                </ol>
            </div>
            <div class="bg-blue-50 rounded-xl p-8 shadow text-center">
                <h3 class="text-xl font-bold text-blue-700 mb-2">Kontak Layanan Akademik</h3>
                <ul class="mb-4 text-gray-700">
                    <li><i class="fas fa-envelope mr-2 text-blue-600"></i>Email: <a href="mailto:akademik@unima.ac.id" class="text-blue-600 underline">akademik@unima.ac.id</a></li>
                    <li><i class="fas fa-phone mr-2 text-orange-500"></i>Telepon: (0431) 654321</li>
                    <li><i class="fas fa-map-marker-alt mr-2 text-green-600"></i>Alamat: Bagian Akademik, Fakultas Teknik UNIMA</li>
                </ul>
                <a href="mailto:akademik@unima.ac.id" class="inline-block mt-4 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg shadow transition">Kirim Email Akademik</a>
                <p class="text-gray-500 text-xs mt-4">Untuk info lebih detail, silakan kunjungi bagian akademik atau akses portal akademik UNIMA.</p>
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