@extends('master')

@section('title', 'Tentang - Fakultas Teknik UNIMA')

@section('content')
<main class="container mx-auto py-16 px-4 min-h-[40vh]">
    <div class="text-center mb-12">
        <h2 class="text-2xl md:text-3xl font-bold text-orange-800 mb-4">Tentang Fakultas Teknik</h2>
        <p class="text-center text-orange-900 max-w-2xl mx-auto">Fakultas Teknik Universitas Negeri Manado adalah salah satu fakultas unggulan yang menghasilkan lulusan berkualitas di bidang teknik.</p>
    </div>

    <div class="max-w-6xl mx-auto">
        <!-- Sejarah Singkat -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
            <h3 class="text-2xl font-bold text-orange-800 mb-6">Sejarah Singkat</h3>
            <div class="prose max-w-none">
                <p class="text-gray-700 leading-relaxed mb-4">
                    Fakultas Teknik Universitas Negeri Manado didirikan pada tahun 1999 sebagai bagian dari transformasi IKIP Manado menjadi Universitas Negeri Manado. 
                    Sejak awal berdirinya, Fakultas Teknik telah berkomitmen untuk menghasilkan lulusan yang berkualitas dan siap menghadapi tantangan industri.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Saat ini, Fakultas Teknik memiliki 6 program studi yang telah terakreditasi dan terus berinovasi dalam pengembangan kurikulum 
                    serta fasilitas pembelajaran untuk memenuhi standar pendidikan tinggi nasional dan internasional.
                </p>
            </div>
        </div>

        <!-- Program Studi -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
            <h3 class="text-2xl font-bold text-orange-800 mb-6">Program Studi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="border border-orange-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-laptop-code text-2xl text-orange-600"></i>
                    </div>
                    <h4 class="font-semibold text-orange-700 text-center mb-2">Teknik Informatika</h4>
                    <p class="text-sm text-gray-600 text-center">Program studi yang mempelajari pengembangan perangkat lunak dan sistem informasi</p>
                </div>
                <div class="border border-orange-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-chalkboard-teacher text-2xl text-orange-600"></i>
                    </div>
                    <h4 class="font-semibold text-orange-700 text-center mb-2">Pendidikan Teknik Informatika & Komputer</h4>
                    <p class="text-sm text-gray-600 text-center">Program studi untuk menghasilkan guru teknologi informasi yang berkualitas</p>
                </div>
                <div class="border border-orange-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-building text-2xl text-orange-600"></i>
                    </div>
                    <h4 class="font-semibold text-orange-700 text-center mb-2">Teknik Sipil</h4>
                    <p class="text-sm text-gray-600 text-center">Program studi yang mempelajari perencanaan dan pembangunan infrastruktur</p>
                </div>
                <div class="border border-orange-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-cogs text-2xl text-orange-600"></i>
                    </div>
                    <h4 class="font-semibold text-orange-700 text-center mb-2">Teknik Mesin</h4>
                    <p class="text-sm text-gray-600 text-center">Program studi yang mempelajari perancangan dan pengembangan mesin</p>
                </div>
                <div class="border border-orange-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-bolt text-2xl text-orange-600"></i>
                    </div>
                    <h4 class="font-semibold text-orange-700 text-center mb-2">Teknik Elektro</h4>
                    <p class="text-sm text-gray-600 text-center">Program studi yang mempelajari sistem kelistrikan dan elektronika</p>
                </div>
                <div class="border border-orange-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-drafting-compass text-2xl text-orange-600"></i>
                    </div>
                    <h4 class="font-semibold text-orange-700 text-center mb-2">Arsitektur</h4>
                    <p class="text-sm text-gray-600 text-center">Program studi yang mempelajari perancangan bangunan dan lingkungan</p>
                </div>
            </div>
        </div>

        <!-- Fasilitas -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
            <h3 class="text-2xl font-bold text-orange-800 mb-6">Fasilitas</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h4 class="text-lg font-semibold text-orange-700 mb-4">Laboratorium</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange-600 mr-3"></i>
                            <span>Laboratorium Komputer</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange-600 mr-3"></i>
                            <span>Laboratorium Fisika</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange-600 mr-3"></i>
                            <span>Laboratorium Kimia</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange-600 mr-3"></i>
                            <span>Laboratorium Teknik</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-orange-700 mb-4">Fasilitas Lainnya</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange-600 mr-3"></i>
                            <span>Perpustakaan Digital</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange-600 mr-3"></i>
                            <span>WiFi Kampus</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange-600 mr-3"></i>
                            <span>Ruang Seminar</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-orange-600 mr-3"></i>
                            <span>Kantin Kampus</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Prestasi -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h3 class="text-2xl font-bold text-orange-800 mb-6">Prestasi</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="text-3xl font-bold text-orange-600 mb-2">5000+</div>
                    <div class="text-gray-600">Alumni</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-orange-600 mb-2">85%</div>
                    <div class="text-gray-600">Tingkat Penyerapan Kerja</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-orange-600 mb-2">150+</div>
                    <div class="text-gray-600">Perusahaan Mitra</div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection 