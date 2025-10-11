@extends('master')

@section('title', 'Alumni - Fakultas Teknik UNIMA')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-orange-600 via-orange-700 to-orange-800 text-white py-20">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold mb-6" data-aos="fade-up">
                Alumni Fakultas Teknik UNIMA
            </h1>
            <p class="text-xl md:text-2xl text-orange-100 mb-8" data-aos="fade-up" data-aos-delay="200">
                Jaringan Alumni yang Sukses & Berkontribusi untuk Kemajuan Bangsa
            </p>
            <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg px-6 py-3">
                    <span class="text-2xl font-bold">{{ number_format($totalAlumni) }}+</span>
                    <p class="text-sm">Total Alumni</p>
                </div>
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg px-6 py-3">
                    <span class="text-2xl font-bold">{{ $tingkatPenyerapan }}%</span>
                    <p class="text-sm">Tingkat Penyerapan</p>
                </div>
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg px-6 py-3">
                    <span class="text-2xl font-bold">150+</span>
                    <p class="text-sm">Perusahaan Mitra</p>
                </div>
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg px-6 py-3">
                    <span class="text-2xl font-bold">25</span>
                    <p class="text-sm">Tahun Pengalaman</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistik Detail -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4" data-aos="fade-up">
                Statistik Alumni Fakultas Teknik UNIMA
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Data statistik yang menunjukkan keberhasilan dan kontribusi alumni Fakultas Teknik UNIMA di berbagai bidang
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300" data-aos="fade-up">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-users text-2xl text-white"></i>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-2">{{ number_format($totalAlumni) }}+</div>
                <div class="text-gray-600 font-medium">Total Alumni</div>
                <p class="text-sm text-gray-500 mt-2">Tersebar di seluruh Indonesia</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-briefcase text-2xl text-white"></i>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-2">{{ $tingkatPenyerapan }}%</div>
                <div class="text-gray-600 font-medium">Tingkat Penyerapan</div>
                <p class="text-sm text-gray-500 mt-2">Bekerja dalam 6 bulan</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-building text-2xl text-white"></i>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-2">150+</div>
                <div class="text-gray-600 font-medium">Perusahaan Mitra</div>
                <p class="text-sm text-gray-500 mt-2">Nasional & Internasional</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-2xl text-white"></i>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-2">25</div>
                <div class="text-gray-600 font-medium">Tahun Pengalaman</div>
                <p class="text-sm text-gray-500 mt-2">Sejak berdirinya Fakultas Teknik UNIMA</p>
            </div>
        </div>
    </div>
</section>

<!-- Alumni Berprestasi -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4" data-aos="fade-up">
                Alumni Berprestasi
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Beberapa alumni Fakultas Teknik UNIMA yang telah berhasil mencapai kesuksesan di berbagai bidang dan industri
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($alumniBerprestasi as $alumni)
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-8 hover:shadow-xl transition-all duration-300" data-aos="fade-up">
                <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full mx-auto mb-6 flex items-center justify-center">
                    <i class="fas fa-user-tie text-3xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 text-center mb-2">{{ $alumni->nama_lengkap }}</h3>
                <p class="text-blue-600 text-center mb-3">{{ $alumni->program_studi_formatted }} - {{ $alumni->tahun_lulus }}</p>
                <p class="text-gray-600 text-center mb-4">{{ $alumni->jabatan ?? $alumni->pekerjaan }}</p>
                @if($alumni->perusahaan)
                <p class="text-gray-600 text-center mb-4">{{ $alumni->perusahaan }}</p>
                @endif
                <div class="text-center">
                    <span class="inline-block bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                        {{ $alumni->status_kerja_formatted }}
                    </span>
                </div>
                @if($alumni->prestasi)
                <p class="text-sm text-gray-600 text-center mt-4">
                    "{{ Str::limit($alumni->prestasi, 100) }}"
                </p>
                @endif
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-6 flex items-center justify-center">
                    <i class="fas fa-users text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Data Alumni</h3>
                <p class="text-gray-500">Data alumni berprestasi akan ditampilkan di sini</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Jaringan Alumni -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4" data-aos="fade-up">
                Jaringan Alumni
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Ikatan alumni yang aktif dan berbagai kegiatan networking untuk memperkuat hubungan antar alumni
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">
            <div data-aos="fade-right">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Ikatan Alumni Jurusan</h3>
                <div class="space-y-4">
                    <div class="bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-laptop-code text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Ikatan Alumni Teknik Informatika (IATI)</h4>
                                <p class="text-sm text-gray-600">500+ anggota aktif</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-building text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Ikatan Alumni Teknik Sipil (IATS)</h4>
                                <p class="text-sm text-gray-600">450+ anggota aktif</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-cogs text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Ikatan Alumni Teknik Mesin (IATM)</h4>
                                <p class="text-sm text-gray-600">400+ anggota aktif</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-bolt text-red-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Ikatan Alumni Teknik Elektro (IATE)</h4>
                                <p class="text-sm text-gray-600">380+ anggota aktif</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-aos="fade-left">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Kegiatan Alumni</h3>
                <div class="space-y-4">
                    <div class="bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-calendar-alt text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Reuni Akbar Tahunan</h4>
                                <p class="text-sm text-gray-600">Pertemuan tahunan seluruh alumni</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-chalkboard-teacher text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Seminar & Workshop</h4>
                                <p class="text-sm text-gray-600">Pengembangan skill dan pengetahuan</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-users text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Mentoring Program</h4>
                                <p class="text-sm text-gray-600">Bimbingan karir untuk mahasiswa</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-md hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-handshake text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Networking Event</h4>
                                <p class="text-sm text-gray-600">Jejaring bisnis dan profesional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial -->
<section class="py-16 bg-gradient-to-br from-orange-600 to-orange-800 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4" data-aos="fade-up">
                Testimonial Alumni
            </h2>
            <p class="text-xl text-orange-100 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Apa kata alumni tentang pengalaman mereka di Fakultas Teknik UNIMA dan kontribusinya terhadap kesuksesan karir
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-8" data-aos="fade-up">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-orange-200 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-quote-left text-orange-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold">Ahmad Fadillah</h4>
                        <p class="text-orange-200 text-sm">CEO TechStart Indonesia</p>
                    </div>
                </div>
                <p class="text-orange-100 italic">
                    "Fakultas Teknik UNIMA memberikan fondasi yang kuat untuk karir saya di dunia teknologi."
                </p>
            </div>

            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-8" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-orange-200 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-quote-left text-orange-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold">Sarah Putri</h4>
                        <p class="text-orange-200 text-sm">Project Manager</p>
                    </div>
                </div>
                <p class="text-orange-100 italic">
                    "Dosen-dosen di Fakultas Teknik UNIMA sangat supportive dan memberikan pengetahuan praktis yang langsung bisa diterapkan di dunia kerja."
                </p>
            </div>

            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-8" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-orange-200 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-quote-left text-orange-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold">Budi Santoso</h4>
                        <p class="text-orange-200 text-sm">Senior Engineer</p>
                    </div>
                </div>
                <p class="text-orange-100 italic">
                    "Jaringan alumni Fakultas Teknik UNIMA sangat membantu dalam membuka peluang karir. Komunitas yang solid dan saling mendukung."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Galeri Kegiatan Alumni -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4" data-aos="fade-up">
                Galeri Kegiatan Alumni
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Dokumentasi berbagai kegiatan dan acara yang diselenggarakan oleh jaringan alumni Fakultas Teknik UNIMA
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                    <i class="fas fa-users text-6xl text-white opacity-80"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Reuni Akbar 2024</h3>
                    <p class="text-gray-600 text-sm mb-3">Reuni akbar tahunan yang dihadiri 500+ alumni dari berbagai angkatan.</p>
                    <span class="text-xs text-blue-600 bg-blue-100 px-2 py-1 rounded">Reuni</span>
                </div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                    <i class="fas fa-chalkboard-teacher text-6xl text-white opacity-80"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Career Workshop</h3>
                    <p class="text-gray-600 text-sm mb-3">Workshop karir untuk mahasiswa dengan pembicara alumni sukses.</p>
                    <span class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded">Workshop</span>
                </div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                    <i class="fas fa-handshake text-6xl text-white opacity-80"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Networking Event</h3>
                    <p class="text-gray-600 text-sm mb-3">Acara networking untuk memperluas koneksi bisnis dan profesional.</p>
                    <span class="text-xs text-purple-600 bg-purple-100 px-2 py-1 rounded">Networking</span>
                </div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up">
                <div class="h-48 bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-6xl text-white opacity-80"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Mentoring Program</h3>
                    <p class="text-gray-600 text-sm mb-3">Program mentoring untuk mahasiswa oleh alumni berpengalaman.</p>
                    <span class="text-xs text-orange-600 bg-orange-100 px-2 py-1 rounded">Mentoring</span>
                </div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="h-48 bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center">
                    <i class="fas fa-trophy text-6xl text-white opacity-80"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Alumni Awards</h3>
                    <p class="text-gray-600 text-sm mb-3">Penghargaan untuk alumni berprestasi di berbagai bidang.</p>
                    <span class="text-xs text-red-600 bg-red-100 px-2 py-1 rounded">Awards</span>
                </div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="h-48 bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center">
                    <i class="fas fa-heart text-6xl text-white opacity-80"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Social Service</h3>
                    <p class="text-gray-600 text-sm mb-3">Kegiatan sosial dan pengabdian masyarakat oleh alumni.</p>
                    <span class="text-xs text-teal-600 bg-teal-100 px-2 py-1 rounded">Social</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Form Pendaftaran Alumni -->
<section class="py-16 bg-gray-50" id="form">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4" data-aos="fade-up">
                    Bergabung dengan Jaringan Alumni
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                    Daftarkan diri Anda sebagai alumni Fakultas Teknik UNIMA dan bergabung dengan jaringan alumni yang luas
                </p>
            </div>

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6" data-aos="fade-up">
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6" data-aos="fade-up">
                <strong>Error!</strong>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up">
                <form action="{{ route('alumni.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                            <input type="text" name="nama_lengkap" required value="{{ old('nama_lengkap') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">NIM *</label>
                            <input type="text" name="nim" required value="{{ old('nim') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Program Studi *</label>
                            <select name="program_studi" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                                <option value="">Pilih Program Studi</option>
                                <option value="ti" {{ old('program_studi') == 'ti' ? 'selected' : '' }}>Teknik Informatika</option>
                                <option value="ptik" {{ old('program_studi') == 'ptik' ? 'selected' : '' }}>Pendidikan Teknik Informatika & Komputer</option>
                                <option value="ts" {{ old('program_studi') == 'ts' ? 'selected' : '' }}>Teknik Sipil</option>
                                <option value="tm" {{ old('program_studi') == 'tm' ? 'selected' : '' }}>Teknik Mesin</option>
                                <option value="te" {{ old('program_studi') == 'te' ? 'selected' : '' }}>Teknik Elektro</option>
                                <option value="ars" {{ old('program_studi') == 'ars' ? 'selected' : '' }}>Arsitektur</option>
                                <option value="ptb" {{ old('program_studi') == 'ptb' ? 'selected' : '' }}>Pendidikan Teknik Bangunan</option>
                                <option value="pkk" {{ old('program_studi') == 'pkk' ? 'selected' : '' }}>Pendidikan Kesejahteraan Keluarga</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Lulus *</label>
                            <input type="number" name="tahun_lulus" min="1990" max="{{ date('Y') }}" required value="{{ old('tahun_lulus') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="tel" name="nomor_telepon" value="{{ old('nomor_telepon') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Saat Ini</label>
                        <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all" placeholder="Contoh: Software Engineer di Google">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Perusahaan/Instansi</label>
                        <input type="text" name="perusahaan" value="{{ old('perusahaan') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all" placeholder="Contoh: Google Indonesia">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all" placeholder="Alamat lengkap Anda">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="newsletter" name="newsletter" class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                        <label for="newsletter" class="ml-2 text-sm text-gray-700">
                            Saya ingin menerima newsletter dan informasi kegiatan alumni
                        </label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors inline-flex items-center">
                            <i class="fas fa-user-plus mr-2"></i>
                            Daftar Sebagai Alumni
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gray-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6" data-aos="fade-up">
            Terhubung dengan Alumni Fakultas Teknik UNIMA
        </h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Bergabunglah dengan jaringan alumni terbesar di Sulawesi Utara dan dapatkan berbagai manfaat untuk pengembangan karir Anda.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="400">
            <a href="#form" class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors inline-flex items-center">
                <i class="fas fa-user-plus mr-2"></i>
                Daftar Sekarang
            </a>
            <a href="mailto:alumni@ft.unima.ac.id" class="border-2 border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white px-8 py-4 rounded-lg font-semibold transition-colors inline-flex items-center">
                <i class="fas fa-envelope mr-2"></i>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection
