@extends('master')

@section('title', 'Akreditasi - Fakultas Teknik UNIMA')

@section('content')
<main class="container mx-auto py-16 px-4 min-h-[40vh] flex flex-col items-center justify-center">
    <h2 class="text-2xl md:text-3xl font-bold text-orange-800 mb-4">Akreditasi</h2>
    <p class="text-center text-orange-900 max-w-2xl">Halaman ini berisi informasi dan tautan terkait akreditasi institusi dan program studi di Fakultas Teknik Universitas Negeri Manado.</p>
    
    <!-- Informasi Akreditasi -->
    <div class="mt-8 w-full max-w-4xl">
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-orange-800 mb-4">Akreditasi Institusi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-orange-50 p-4 rounded-lg">
                    <h4 class="font-semibold text-orange-700 mb-2">Universitas Negeri Manado</h4>
                    <p class="text-sm text-gray-600 mb-3">Akreditasi institusi perguruan tinggi</p>
                    <div class="flex items-center">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Terakreditasi</span>
                        <span class="ml-2 text-sm text-gray-500">BAN-PT</span>
                    </div>
                </div>
                <div class="bg-orange-50 p-4 rounded-lg">
                    <h4 class="font-semibold text-orange-700 mb-2">Fakultas Teknik</h4>
                    <p class="text-sm text-gray-600 mb-3">Akreditasi fakultas</p>
                    <div class="flex items-center">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Terakreditasi</span>
                        <span class="ml-2 text-sm text-gray-500">BAN-PT</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-orange-800 mb-4">Akreditasi Program Studi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="border border-orange-200 p-4 rounded-lg">
                    <h4 class="font-semibold text-orange-700 mb-2">Teknik Informatika</h4>
                    <p class="text-sm text-gray-600 mb-2">Program Studi S1</p>
                    <div class="flex items-center justify-between">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">A</span>
                        <span class="text-xs text-gray-500">2024-2029</span>
                    </div>
                </div>
                <div class="border border-orange-200 p-4 rounded-lg">
                    <h4 class="font-semibold text-orange-700 mb-2">Pendidikan Teknik Informatika & Komputer</h4>
                    <p class="text-sm text-gray-600 mb-2">Program Studi S1</p>
                    <div class="flex items-center justify-between">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">A</span>
                        <span class="text-xs text-gray-500">2024-2029</span>
                    </div>
                </div>
                <div class="border border-orange-200 p-4 rounded-lg">
                    <h4 class="font-semibold text-orange-700 mb-2">Teknik Sipil</h4>
                    <p class="text-sm text-gray-600 mb-2">Program Studi S1</p>
                    <div class="flex items-center justify-between">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">B</span>
                        <span class="text-xs text-gray-500">2023-2028</span>
                    </div>
                </div>
                <div class="border border-orange-200 p-4 rounded-lg">
                    <h4 class="font-semibold text-orange-700 mb-2">Teknik Mesin</h4>
                    <p class="text-sm text-gray-600 mb-2">Program Studi S1</p>
                    <div class="flex items-center justify-between">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">B</span>
                        <span class="text-xs text-gray-500">2023-2028</span>
                    </div>
                </div>
                <div class="border border-orange-200 p-4 rounded-lg">
                    <h4 class="font-semibold text-orange-700 mb-2">Teknik Elektro</h4>
                    <p class="text-sm text-gray-600 mb-2">Program Studi S1</p>
                    <div class="flex items-center justify-between">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">B</span>
                        <span class="text-xs text-gray-500">2023-2028</span>
                    </div>
                </div>
                <div class="border border-orange-200 p-4 rounded-lg">
                    <h4 class="font-semibold text-orange-700 mb-2">Arsitektur</h4>
                    <p class="text-sm text-gray-600 mb-2">Program Studi S1</p>
                    <div class="flex items-center justify-between">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">B</span>
                        <span class="text-xs text-gray-500">2023-2028</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-semibold text-orange-800 mb-4">Link Terkait</h3>
            <div class="space-y-3">
                <a href="https://banpt.or.id" target="_blank" class="flex items-center p-3 border border-orange-200 rounded-lg hover:bg-orange-50 transition-colors">
                    <i class="fas fa-external-link-alt text-orange-600 mr-3"></i>
                    <div>
                        <h4 class="font-semibold text-orange-700">Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT)</h4>
                        <p class="text-sm text-gray-600">Situs resmi BAN-PT untuk informasi akreditasi</p>
                    </div>
                </a>
                <a href="https://sinta.kemdikbud.go.id" target="_blank" class="flex items-center p-3 border border-orange-200 rounded-lg hover:bg-orange-50 transition-colors">
                    <i class="fas fa-external-link-alt text-orange-600 mr-3"></i>
                    <div>
                        <h4 class="font-semibold text-orange-700">SINTA (Science and Technology Index)</h4>
                        <p class="text-sm text-gray-600">Sistem informasi kinerja penelitian dan publikasi</p>
                    </div>
                </a>
                <a href="https://unima.ac.id" target="_blank" class="flex items-center p-3 border border-orange-200 rounded-lg hover:bg-orange-50 transition-colors">
                    <i class="fas fa-external-link-alt text-orange-600 mr-3"></i>
                    <div>
                        <h4 class="font-semibold text-orange-700">Website Resmi UNIMA</h4>
                        <p class="text-sm text-gray-600">Informasi lengkap tentang Universitas Negeri Manado</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection 