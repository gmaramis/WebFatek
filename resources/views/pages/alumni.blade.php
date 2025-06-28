@extends('master')

@section('title', 'Alumni - Fakultas Teknik UNIMA')

@section('content')
<main class="container mx-auto py-16 px-4 min-h-[40vh]">
    <div class="text-center mb-12">
        <h2 class="text-2xl md:text-3xl font-bold text-orange-800 mb-4">Alumni</h2>
        <p class="text-center text-orange-900 max-w-2xl mx-auto">Halaman ini berisi informasi mengenai alumni Fakultas Teknik Universitas Negeri Manado, jaringan alumni, dan kontribusi alumni terhadap pengembangan fakultas.</p>
    </div>

    <!-- Statistik Alumni -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="text-3xl font-bold text-orange-600 mb-2">5000+</div>
            <div class="text-gray-600">Total Alumni</div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="text-3xl font-bold text-orange-600 mb-2">85%</div>
            <div class="text-gray-600">Tingkat Penyerapan Kerja</div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="text-3xl font-bold text-orange-600 mb-2">150+</div>
            <div class="text-gray-600">Perusahaan Mitra</div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="text-3xl font-bold text-orange-600 mb-2">25</div>
            <div class="text-gray-600">Tahun Pengalaman</div>
        </div>
    </div>

    <!-- Alumni Berprestasi -->
    <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
        <h3 class="text-2xl font-bold text-orange-800 mb-6">Alumni Berprestasi</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-orange-50 rounded-lg p-6">
                <div class="w-20 h-20 bg-orange-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user-tie text-2xl text-orange-600"></i>
                </div>
                <h4 class="font-semibold text-orange-700 text-center mb-2">Dr. John Doe</h4>
                <p class="text-sm text-gray-600 text-center mb-2">Teknik Informatika - 2010</p>
                <p class="text-sm text-gray-600 text-center">CEO Tech Startup</p>
            </div>
            <div class="bg-orange-50 rounded-lg p-6">
                <div class="w-20 h-20 bg-orange-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user-tie text-2xl text-orange-600"></i>
                </div>
                <h4 class="font-semibold text-orange-700 text-center mb-2">Jane Smith</h4>
                <p class="text-sm text-gray-600 text-center mb-2">Teknik Sipil - 2012</p>
                <p class="text-sm text-gray-600 text-center">Project Manager</p>
            </div>
            <div class="bg-orange-50 rounded-lg p-6">
                <div class="w-20 h-20 bg-orange-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user-tie text-2xl text-orange-600"></i>
                </div>
                <h4 class="font-semibold text-orange-700 text-center mb-2">Mike Johnson</h4>
                <p class="text-sm text-gray-600 text-center mb-2">Teknik Mesin - 2015</p>
                <p class="text-sm text-gray-600 text-center">Senior Engineer</p>
            </div>
        </div>
    </div>

    <!-- Jaringan Alumni -->
    <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
        <h3 class="text-2xl font-bold text-orange-800 mb-6">Jaringan Alumni</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h4 class="text-lg font-semibold text-orange-700 mb-4">Ikatan Alumni</h4>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <i class="fas fa-users text-orange-600 mr-3"></i>
                        <span>Ikatan Alumni Teknik Informatika (IATI)</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-users text-orange-600 mr-3"></i>
                        <span>Ikatan Alumni Teknik Sipil (IATS)</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-users text-orange-600 mr-3"></i>
                        <span>Ikatan Alumni Teknik Mesin (IATM)</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-users text-orange-600 mr-3"></i>
                        <span>Ikatan Alumni Teknik Elektro (IATE)</span>
                    </li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold text-orange-700 mb-4">Kegiatan Alumni</h4>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <i class="fas fa-calendar text-orange-600 mr-3"></i>
                        <span>Reuni Akbar Tahunan</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-calendar text-orange-600 mr-3"></i>
                        <span>Seminar dan Workshop</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-calendar text-orange-600 mr-3"></i>
                        <span>Mentoring Program</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-calendar text-orange-600 mr-3"></i>
                        <span>Networking Event</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Kontribusi Alumni -->
    <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
        <h3 class="text-2xl font-bold text-orange-800 mb-6">Kontribusi Alumni</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-2xl text-orange-600"></i>
                </div>
                <h4 class="font-semibold text-orange-700 mb-2">Beasiswa</h4>
                <p class="text-sm text-gray-600">Menyediakan beasiswa untuk mahasiswa berprestasi</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-briefcase text-2xl text-orange-600"></i>
                </div>
                <h4 class="font-semibold text-orange-700 mb-2">Magang & Kerja</h4>
                <p class="text-sm text-gray-600">Membuka peluang magang dan kerja di perusahaan</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-chalkboard-teacher text-2xl text-orange-600"></i>
                </div>
                <h4 class="font-semibold text-orange-700 mb-2">Mentoring</h4>
                <p class="text-sm text-gray-600">Memberikan bimbingan dan mentoring mahasiswa</p>
            </div>
        </div>
    </div>

    <!-- Form Pendaftaran Alumni -->
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h3 class="text-2xl font-bold text-orange-800 mb-6">Daftar Sebagai Alumni</h3>
        <form class="max-w-2xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Program Studi</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option>Teknik Informatika</option>
                        <option>Pendidikan Teknik Informatika & Komputer</option>
                        <option>Teknik Sipil</option>
                        <option>Teknik Mesin</option>
                        <option>Teknik Elektro</option>
                        <option>Arsitektur</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Lulus</label>
                    <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Saat Ini</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>
            <div class="text-center">
                <button type="submit" class="bg-orange-600 text-white px-6 py-2 rounded-md hover:bg-orange-700 transition-colors">
                    Daftar Alumni
                </button>
            </div>
        </form>
    </div>
</main>
@endsection 