@extends('master')

@section('title', 'Kontak - Fakultas Teknik UNIMA')

@section('content')
<main class="container mx-auto py-16 px-4 min-h-[40vh]">
    <div class="text-center mb-12">
        <h2 class="text-2xl md:text-3xl font-bold text-orange-800 mb-4">Kontak Kami</h2>
        <p class="text-center text-orange-900 max-w-2xl mx-auto">Hubungi kami untuk informasi lebih lanjut tentang Fakultas Teknik Universitas Negeri Manado.</p>
    </div>

    <div class="max-w-6xl mx-auto">
        <!-- Informasi Kontak -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h3 class="text-2xl font-bold text-orange-800 mb-6">Informasi Kontak</h3>
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-orange-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-orange-700 mb-1">Alamat</h4>
                            <p class="text-gray-600">Jl. Kampus UNIMA, Tondano, Minahasa, Sulawesi Utara 95618</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-phone text-orange-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-orange-700 mb-1">Telepon</h4>
                            <p class="text-gray-600">+62 431 325 123</p>
                            <p class="text-gray-600">+62 431 325 124</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-orange-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-orange-700 mb-1">Email</h4>
                            <p class="text-gray-600">ft@unima.ac.id</p>
                            <p class="text-gray-600">humas.ft@unima.ac.id</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-clock text-orange-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-orange-700 mb-1">Jam Kerja</h4>
                            <p class="text-gray-600">Senin - Jumat: 08:00 - 16:00 WITA</p>
                            <p class="text-gray-600">Sabtu: 08:00 - 12:00 WITA</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Kontak -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h3 class="text-2xl font-bold text-orange-800 mb-6">Kirim Pesan</h3>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                        <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-orange-600 text-white py-2 px-4 rounded-md hover:bg-orange-700 transition-colors">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <!-- Peta Lokasi -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
            <h3 class="text-2xl font-bold text-orange-800 mb-6">Lokasi Kami</h3>
            <div class="aspect-video bg-gray-200 rounded-lg flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-map text-4xl text-gray-400 mb-4"></i>
                    <p class="text-gray-600">Peta lokasi akan ditampilkan di sini</p>
                    <p class="text-sm text-gray-500 mt-2">Jl. Kampus UNIMA, Tondano, Minahasa, Sulawesi Utara</p>
                </div>
            </div>
        </div>

        <!-- Kontak Program Studi -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
            <h3 class="text-2xl font-bold text-orange-800 mb-6">Kontak Program Studi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="border border-orange-200 rounded-lg p-4">
                    <h4 class="font-semibold text-orange-700 mb-2">Teknik Informatika</h4>
                    <p class="text-sm text-gray-600 mb-2">Email: ti@unima.ac.id</p>
                    <p class="text-sm text-gray-600">Telp: +62 431 325 125</p>
                </div>
                <div class="border border-orange-200 rounded-lg p-4">
                    <h4 class="font-semibold text-orange-700 mb-2">Pendidikan Teknik Informatika & Komputer</h4>
                    <p class="text-sm text-gray-600 mb-2">Email: ptik@unima.ac.id</p>
                    <p class="text-sm text-gray-600">Telp: +62 431 325 126</p>
                </div>
                <div class="border border-orange-200 rounded-lg p-4">
                    <h4 class="font-semibold text-orange-700 mb-2">Teknik Sipil</h4>
                    <p class="text-sm text-gray-600 mb-2">Email: ts@unima.ac.id</p>
                    <p class="text-sm text-gray-600">Telp: +62 431 325 127</p>
                </div>
                <div class="border border-orange-200 rounded-lg p-4">
                    <h4 class="font-semibold text-orange-700 mb-2">Teknik Mesin</h4>
                    <p class="text-sm text-gray-600 mb-2">Email: tm@unima.ac.id</p>
                    <p class="text-sm text-gray-600">Telp: +62 431 325 128</p>
                </div>
                <div class="border border-orange-200 rounded-lg p-4">
                    <h4 class="font-semibold text-orange-700 mb-2">Teknik Elektro</h4>
                    <p class="text-sm text-gray-600 mb-2">Email: te@unima.ac.id</p>
                    <p class="text-sm text-gray-600">Telp: +62 431 325 129</p>
                </div>
                <div class="border border-orange-200 rounded-lg p-4">
                    <h4 class="font-semibold text-orange-700 mb-2">Arsitektur</h4>
                    <p class="text-sm text-gray-600 mb-2">Email: ars@unima.ac.id</p>
                    <p class="text-sm text-gray-600">Telp: +62 431 325 130</p>
                </div>
            </div>
        </div>

        <!-- Media Sosial -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h3 class="text-2xl font-bold text-orange-800 mb-6">Ikuti Kami</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="#" class="flex items-center justify-center p-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fab fa-facebook-f text-xl mr-2"></i>
                    <span>Facebook</span>
                </a>
                <a href="#" class="flex items-center justify-center p-4 bg-blue-400 text-white rounded-lg hover:bg-blue-500 transition-colors">
                    <i class="fab fa-twitter text-xl mr-2"></i>
                    <span>Twitter</span>
                </a>
                <a href="#" class="flex items-center justify-center p-4 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition-colors">
                    <i class="fab fa-instagram text-xl mr-2"></i>
                    <span>Instagram</span>
                </a>
                <a href="#" class="flex items-center justify-center p-4 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    <i class="fab fa-youtube text-xl mr-2"></i>
                    <span>YouTube</span>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
