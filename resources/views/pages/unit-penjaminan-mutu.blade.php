@extends('master')

@section('title', 'Unit Penjaminan Mutu')

@section('content')
<div class="bg-gradient-to-r from-blue-900 via-blue-700 to-orange-400 py-12 mb-8">
    <div class="container mx-auto px-4 text-center text-white">
        <h1 class="text-4xl md:text-5xl font-bold mb-2">Unit Penjaminan Mutu</h1>
        <p class="text-lg md:text-xl font-light mb-4">Lembaga Pengembangan Pembelajaran dan Penjaminan Mutu (LP3M) Fakultas Teknik UNIMAUNIMA</p>
        <div class="flex justify-center">
            <span class="inline-flex items-center bg-white/20 px-4 py-2 rounded-full text-base font-semibold">
                <svg class="w-6 h-6 mr-2 text-orange-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0-1.657-1.343-3-3-3s-3 1.343-3 3 1.343 3 3 3 3-1.343 3-3zm0 0c0-1.657 1.343-3 3-3s3 1.343 3 3-1.343 3-3 3-3-1.343-3-3z"/></svg>
                Komitmen Mutu & Akuntabilitas
            </span>
        </div>
    </div>
</div>

<div class="container mx-auto px-4">
    <!-- Profil Ketua UPM -->
    <div class="flex flex-col md:flex-row gap-8 mb-10 items-center">
        <div class="flex-shrink-0">
            <img src="https://ui-avatars.com/api/?name=Prof.+Dr.+Meytij+Jeanne+Rampe&background=ea580c&color=fff&size=160" alt="Ketua UPM" class="rounded-xl shadow-lg w-40 h-40 object-cover">
        </div>
        <div>
            <h2 class="text-2xl font-bold mb-1">Prof. Dr. Meytij Jeanne Rampe, M.Si.</h2>
            <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold mb-2">Ketua Unit Penjaminan Mutu (UPM) Fakultas Teknik UNIMA</span>
            <p class="mb-2 text-gray-700">"Bersama membangun budaya mutu di lingkungan Fakultas Teknik UNIMA untuk pendidikan yang unggul dan berdaya saing."</p>
            <div class="flex items-center gap-3 text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 01-8 0 4 4 0 018 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7m0 0H9m3 0h3"/></svg>
                <span>upm.ft@unima.ac.id</span>
            </div>
        </div>
    </div>

    <!-- Daftar GPM per Prodi -->
    <div class="mb-10">
        <h3 class="text-xl font-bold mb-4 text-blue-900">Gugus Penjaminan Mutu (GPM) per Program Studi</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="py-2 px-4 text-left">Program Studi</th>
                        <th class="py-2 px-4 text-left">Nama GPM</th>
                        <th class="py-2 px-4 text-left">Kontak</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4">Teknik Informatika</td>
                        <td class="py-2 px-4">Dr. John Doe, M.Kom</td>
                        <td class="py-2 px-4">john.doe@unima.ac.id</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Teknik Sipil</td>
                        <td class="py-2 px-4">Ir. Jane Smith, M.T.</td>
                        <td class="py-2 px-4">jane.smith@unima.ac.id</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4">Teknik Elektro</td>
                        <td class="py-2 px-4">Dr. Albertus, S.T., M.Eng</td>
                        <td class="py-2 px-4">albertus@unima.ac.id</td>
                    </tr>
                    <!-- Tambahkan prodi lain sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Dokumen Audit Mutu Internal (AMI) -->
    <div class="mb-10">
        <h3 class="text-xl font-bold mb-4 text-blue-900">Dokumen Audit Mutu Internal (AMI)</h3>
        <div id="accordion-ami">
            <div class="mb-2 border rounded-lg">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-blue-50 hover:bg-blue-100 font-semibold focus:outline-none" onclick="document.getElementById('ami2024').classList.toggle('hidden')">
                    <span>2024</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="ami2024" class="hidden px-4 pb-4">
                    <ul class="list-disc ml-6 mt-2">
                        <li>Teknik Informatika: <a href="#" class="text-blue-700 underline hover:text-orange-500">Laporan AMI 2024</a></li>
                        <li>Teknik Sipil: <a href="#" class="text-blue-700 underline hover:text-orange-500">Laporan AMI 2024</a></li>
                        <li>Teknik Elektro: <a href="#" class="text-blue-700 underline hover:text-orange-500">Laporan AMI 2024</a></li>
                    </ul>
                </div>
            </div>
            <div class="mb-2 border rounded-lg">
                <button type="button" class="w-full flex justify-between items-center px-4 py-3 bg-blue-50 hover:bg-blue-100 font-semibold focus:outline-none" onclick="document.getElementById('ami2023').classList.toggle('hidden')">
                    <span>2023</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="ami2023" class="hidden px-4 pb-4">
                    <ul class="list-disc ml-6 mt-2">
                        <li>Teknik Informatika: <a href="#" class="text-blue-700 underline hover:text-orange-500">Laporan AMI 2023</a></li>
                        <li>Teknik Sipil: <a href="#" class="text-blue-700 underline hover:text-orange-500">Laporan AMI 2023</a></li>
                        <li>Teknik Elektro: <a href="#" class="text-blue-700 underline hover:text-orange-500">Laporan AMI 2023</a></li>
                    </ul>
                </div>
            </div>
            <!-- Tambahkan tahun lain sesuai kebutuhan -->
        </div>
    </div>

    <!-- Berita/Kegiatan Terkait UPM -->
    <div class="mb-10">
        <h3 class="text-xl font-bold mb-4 text-blue-900">Berita & Kegiatan Terkait UPM</h3>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                <img src="https://source.unsplash.com/400x200/?meeting,university" alt="Berita 1" class="rounded mb-3 object-cover h-32 w-full">
                <h4 class="font-bold text-lg mb-1">Penarikan Mahasiswa KKN Fakultas Teknik UNIMA2024</h4>
                <p class="text-gray-600 text-sm mb-2">Sebanyak 300 mahasiswa Fakultas Teknik UNIMAmenyelesaikan pengabdian KKN di berbagai daerah...</p>
                <span class="text-xs text-gray-400 mb-2">27 Januari 2024</span>
                <a href="#" class="mt-auto text-blue-700 hover:text-orange-500 font-semibold">Baca Selengkapnya</a>
            </div>
            <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                <img src="https://source.unsplash.com/400x200/?audit,document" alt="Berita 2" class="rounded mb-3 object-cover h-32 w-full">
                <h4 class="font-bold text-lg mb-1">Audit Mutu Internal Prodi Teknik Sipil</h4>
                <p class="text-gray-600 text-sm mb-2">Prodi Teknik Sipil Fakultas Teknik UNIMAberhasil mempertahankan predikat mutu A pada audit tahun ini...</p>
                <span class="text-xs text-gray-400 mb-2">15 Januari 2024</span>
                <a href="#" class="mt-auto text-blue-700 hover:text-orange-500 font-semibold">Baca Selengkapnya</a>
            </div>
            <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                <img src="https://source.unsplash.com/400x200/?teamwork,university" alt="Berita 3" class="rounded mb-3 object-cover h-32 w-full">
                <h4 class="font-bold text-lg mb-1">Workshop Penyusunan Dokumen Mutu</h4>
                <p class="text-gray-600 text-sm mb-2">UPM Fakultas Teknik UNIMAmengadakan workshop untuk meningkatkan pemahaman dosen tentang dokumen mutu...</p>
                <span class="text-xs text-gray-400 mb-2">10 Januari 2024</span>
                <a href="#" class="mt-auto text-blue-700 hover:text-orange-500 font-semibold">Baca Selengkapnya</a>
            </div>
        </div>
    </div>

    <!-- Kontak & Lokasi -->
    <div class="mb-16">
        <h3 class="text-xl font-bold mb-4 text-blue-900">Kontak & Lokasi</h3>
        <div class="bg-blue-50 rounded-lg p-6 flex flex-col md:flex-row gap-6 items-center">
            <div class="flex-1">
                <div class="mb-2 flex items-center gap-2 text-gray-700">
                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 01-8 0 4 4 0 018 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7m0 0H9m3 0h3"/></svg>
                    <span>upm.ft@unima.ac.id</span>
                </div>
                <div class="mb-2 flex items-center gap-2 text-gray-700">
                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 12.414a8 8 0 111.414-1.414l4.243 4.243a1 1 0 01-1.414 1.414z"/></svg>
                    <span>Jl. Kampus Unima, Tondano Selatan, Minahasa</span>
                </div>
                <div class="flex gap-3 mt-2">
                    <a href="#" class="text-blue-700 hover:text-orange-500"><i class="fab fa-facebook"></i> Facebook</a>
                    <a href="#" class="text-blue-700 hover:text-orange-500"><i class="fab fa-instagram"></i> Instagram</a>
                </div>
            </div>
            <div class="flex-1">
                <!-- Google Maps Embed (opsional) -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127.123456!2d124.912345!3d1.234567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMcKwMTQnMDIuNCJOIDEyNMKwNTUnMTIuOCJF!5e0!3m2!1sen!2sid!4v1610000000000!5m2!1sen!2sid" width="100%" height="180" style="border:0; border-radius:12px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
