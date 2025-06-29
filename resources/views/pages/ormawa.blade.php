@extends('master')

@section('title', 'ORMAWA - Fakultas Teknik UNIMA')

@section('content')
@php
    use App\Models\Ormawa;
    $bem = Ormawa::where('jenis', 'bem')->active()->first();
    $himpunans = Ormawa::where('jenis', 'himpunan')->active()->ordered()->get();
    $ukms = Ormawa::where('jenis', 'ukm')->active()->ordered()->get();
    $allOrmawa = Ormawa::active()->ordered()->get();
@endphp

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-orange-600 via-orange-700 to-orange-800 text-white py-20">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold mb-6" data-aos="fade-up">
                Organisasi Mahasiswa
            </h1>
            <p class="text-xl md:text-2xl text-orange-100 mb-8" data-aos="fade-up" data-aos-delay="200">
                Wadah Pengembangan Potensi & Kepemimpinan Mahasiswa Fatek UNIMA
            </p>
            <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg px-6 py-3">
                    <span class="text-2xl font-bold">{{ $allOrmawa->count() }}</span>
                    <p class="text-sm">Organisasi Aktif</p>
                </div>
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg px-6 py-3">
                    <span class="text-2xl font-bold">{{ $himpunans->count() }}</span>
                    <p class="text-sm">Himpunan Jurusan</p>
                </div>
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-lg px-6 py-3">
                    <span class="text-2xl font-bold">{{ $ukms->count() }}</span>
                    <p class="text-sm">Unit Kegiatan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Struktur Organisasi -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4" data-aos="fade-up">
                Struktur Organisasi Mahasiswa
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Organisasi kemahasiswaan Fatek UNIMA terdiri dari berbagai unit yang saling mendukung dalam pengembangan potensi mahasiswa
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if($bem)
            <!-- BEM -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden" data-aos="fade-up">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold">{{ $bem->nama }}</h3>
                            <p class="text-blue-100">{{ $bem->jenis_label }}</p>
                        </div>
                        <i class="{{ $bem->icon ?? 'fas fa-users' }} text-3xl opacity-80"></i>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">
                        {{ Str::limit($bem->deskripsi, 150) }}
                    </p>
                    <div class="space-y-2 text-sm">
                        @if($bem->ketua)
                        <div class="flex items-center text-gray-500">
                            <i class="fas fa-user-tie mr-2 text-orange-500"></i>
                            <span>Ketua: {{ $bem->ketua }}</span>
                        </div>
                        @endif
                        @if($bem->email)
                        <div class="flex items-center text-gray-500">
                            <i class="fas fa-envelope mr-2 text-orange-500"></i>
                            <span>{{ $bem->email }}</span>
                        </div>
                        @endif
                        @if($bem->lokasi)
                        <div class="flex items-center text-gray-500">
                            <i class="fas fa-map-marker-alt mr-2 text-orange-500"></i>
                            <span>{{ $bem->lokasi }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <!-- Himpunan Jurusan -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-gradient-to-r from-green-600 to-green-700 p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold">Himpunan Jurusan</h3>
                            <p class="text-green-100">{{ $himpunans->count() }} Himpunan Aktif</p>
                        </div>
                        <i class="fas fa-graduation-cap text-3xl opacity-80"></i>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">
                        Himpunan mahasiswa jurusan yang fokus pada pengembangan akademik dan profesional di bidang masing-masing.
                    </p>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @foreach($himpunans->take(6) as $himpunan)
                        <div class="bg-orange-50 text-orange-700 px-2 py-1 rounded text-xs">{{ $himpunan->singkatan ?? $himpunan->nama }}</div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- UKM -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold">Unit Kegiatan</h3>
                            <p class="text-purple-100">Mahasiswa (UKM)</p>
                        </div>
                        <i class="fas fa-star text-3xl opacity-80"></i>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">
                        Wadah pengembangan minat dan bakat mahasiswa dalam berbagai bidang non-akademik.
                    </p>
                    <div class="space-y-2 text-sm">
                        @foreach($ukms->take(3) as $ukm)
                        <div class="flex items-center text-gray-500">
                            <i class="fas fa-star mr-2 text-purple-500"></i>
                            <span>{{ $ukm->nama }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Prestasi & Pencapaian -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4" data-aos="fade-up">
                Prestasi & Pencapaian
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Berbagai prestasi membanggakan yang telah diraih oleh mahasiswa Fatek UNIMA melalui organisasi kemahasiswaan
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Prestasi Akademik -->
            <div class="bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl p-6 text-white" data-aos="fade-up">
                <div class="flex items-center mb-4">
                    <i class="fas fa-trophy text-3xl mr-4"></i>
                    <div>
                        <h3 class="text-xl font-bold">Prestasi Akademik</h3>
                        <p class="text-yellow-100">Kompetisi Nasional</p>
                    </div>
                </div>
                <ul class="space-y-2 text-sm">
                    @php
                        $prestasiAkademik = collect();
                        foreach($himpunans as $himpunan) {
                            if($himpunan->prestasi) {
                                foreach($himpunan->prestasi as $prestasi => $tahun) {
                                    if(str_contains(strtolower($prestasi), 'kompetisi') || str_contains(strtolower($prestasi), 'competition') || str_contains(strtolower($prestasi), 'paper')) {
                                        $prestasiAkademik->push(['nama' => $prestasi, 'tahun' => $tahun]);
                                    }
                                }
                            }
                        }
                        $prestasiAkademik = $prestasiAkademik->take(3);
                    @endphp
                    @forelse($prestasiAkademik as $prestasi)
                    <li class="flex items-center">
                        <i class="fas fa-medal mr-2"></i>
                        <span>{{ $prestasi['nama'] }}</span>
                    </li>
                    @empty
                    <li class="flex items-center">
                        <i class="fas fa-medal mr-2"></i>
                        <span>Juara 1 Kompetisi Robotik Nasional 2024</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-medal mr-2"></i>
                        <span>Juara 2 Programming Competition</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-medal mr-2"></i>
                        <span>Best Paper di Konferensi Nasional</span>
                    </li>
                    @endforelse
                </ul>
            </div>

            <!-- Prestasi Non-Akademik -->
            <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl p-6 text-white" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center mb-4">
                    <i class="fas fa-award text-3xl mr-4"></i>
                    <div>
                        <h3 class="text-xl font-bold">Prestasi Non-Akademik</h3>
                        <p class="text-blue-100">Seni, Olahraga & Sosial</p>
                    </div>
                </div>
                <ul class="space-y-2 text-sm">
                    @php
                        $prestasiNonAkademik = collect();
                        foreach($allOrmawa as $ormawa) {
                            if($ormawa->prestasi) {
                                foreach($ormawa->prestasi as $prestasi => $tahun) {
                                    if(str_contains(strtolower($prestasi), 'lomba') || str_contains(strtolower($prestasi), 'futsal') || str_contains(strtolower($prestasi), 'paduan suara') || str_contains(strtolower($prestasi), 'community')) {
                                        $prestasiNonAkademik->push(['nama' => $prestasi, 'tahun' => $tahun]);
                                    }
                                }
                            }
                        }
                        $prestasiNonAkademik = $prestasiNonAkademik->take(3);
                    @endphp
                    @forelse($prestasiNonAkademik as $prestasi)
                    <li class="flex items-center">
                        <i class="fas fa-star mr-2"></i>
                        <span>{{ $prestasi['nama'] }}</span>
                    </li>
                    @empty
                    <li class="flex items-center">
                        <i class="fas fa-star mr-2"></i>
                        <span>Juara 1 Lomba Paduan Suara</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-star mr-2"></i>
                        <span>Juara 2 Futsal Antar Fakultas</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-star mr-2"></i>
                        <span>Best Community Service Award</span>
                    </li>
                    @endforelse
                </ul>
            </div>

            <!-- Program Unggulan -->
            <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-xl p-6 text-white" data-aos="fade-up" data-aos-delay="400">
                <div class="flex items-center mb-4">
                    <i class="fas fa-lightbulb text-3xl mr-4"></i>
                    <div>
                        <h3 class="text-xl font-bold">Program Unggulan</h3>
                        <p class="text-green-100">Inovasi & Pengabdian</p>
                    </div>
                </div>
                <ul class="space-y-2 text-sm">
                    @php
                        $programUnggulan = collect();
                        foreach($allOrmawa as $ormawa) {
                            if($ormawa->program_unggulan) {
                                foreach($ormawa->program_unggulan as $program => $deskripsi) {
                                    $programUnggulan->push(['nama' => $program, 'deskripsi' => $deskripsi]);
                                }
                            }
                        }
                        $programUnggulan = $programUnggulan->take(3);
                    @endphp
                    @forelse($programUnggulan as $program)
                    <li class="flex items-center">
                        <i class="fas fa-handshake mr-2"></i>
                        <span>{{ $program['nama'] }}</span>
                    </li>
                    @empty
                    <li class="flex items-center">
                        <i class="fas fa-handshake mr-2"></i>
                        <span>Fatek Mengajar</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-handshake mr-2"></i>
                        <span>Teknologi untuk Desa</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-handshake mr-2"></i>
                        <span>Startup Competition</span>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Galeri Kegiatan -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4" data-aos="fade-up">
                Galeri Kegiatan
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Dokumentasi berbagai kegiatan dan program yang telah diselenggarakan oleh organisasi kemahasiswaan Fatek UNIMA
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $kegiatan = [
                    ['icon' => 'fas fa-users', 'title' => 'Rapat Koordinasi BEM', 'desc' => 'Rapat koordinasi bulanan BEM Fatek untuk membahas program kerja dan evaluasi kegiatan.', 'color' => 'orange', 'category' => 'Kegiatan Rutin'],
                    ['icon' => 'fas fa-graduation-cap', 'title' => 'Seminar Teknologi', 'desc' => 'Seminar nasional tentang perkembangan teknologi terkini yang diselenggarakan HMTI.', 'color' => 'blue', 'category' => 'Seminar'],
                    ['icon' => 'fas fa-tree', 'title' => 'Penghijauan Kampus', 'desc' => 'Program penghijauan kampus yang diinisiasi oleh UKM Lingkungan Hidup.', 'color' => 'green', 'category' => 'Sosial'],
                    ['icon' => 'fas fa-music', 'title' => 'Pentas Seni', 'desc' => 'Pentas seni tahunan yang menampilkan bakat mahasiswa dalam bidang seni dan budaya.', 'color' => 'purple', 'category' => 'Seni & Budaya'],
                    ['icon' => 'fas fa-futbol', 'title' => 'Turnamen Olahraga', 'desc' => 'Turnamen olahraga antar jurusan yang diselenggarakan setiap semester.', 'color' => 'red', 'category' => 'Olahraga'],
                    ['icon' => 'fas fa-laptop-code', 'title' => 'Workshop Programming', 'desc' => 'Workshop programming untuk meningkatkan skill mahasiswa di bidang teknologi.', 'color' => 'indigo', 'category' => 'Workshop'],
                ];
            @endphp
            
            @foreach($kegiatan as $index => $item)
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" @if($index > 0) data-aos-delay="{{ $index * 100 }}" @endif>
                <div class="h-48 bg-gradient-to-br from-{{ $item['color'] }}-400 to-{{ $item['color'] }}-600 flex items-center justify-center">
                    <i class="{{ $item['icon'] }} text-6xl text-white opacity-80"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $item['title'] }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $item['desc'] }}</p>
                    <span class="text-xs text-{{ $item['color'] }}-600 bg-{{ $item['color'] }}-100 px-2 py-1 rounded">{{ $item['category'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Informasi Kontak & Bergabung -->
<section class="py-16 bg-gradient-to-br from-orange-600 to-orange-800 text-white">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    Bergabung dengan ORMAWA Fatek
                </h2>
                <p class="text-xl text-orange-100 mb-8">
                    Mari bergabung dengan organisasi kemahasiswaan Fatek UNIMA untuk mengembangkan potensi, kepemimpinan, dan jaringan yang bermanfaat untuk masa depan Anda.
                </p>
                
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-2xl text-orange-200 mr-4"></i>
                        <span class="text-lg">Pengembangan soft skill dan leadership</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-2xl text-orange-200 mr-4"></i>
                        <span class="text-lg">Networking dengan mahasiswa dan alumni</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-2xl text-orange-200 mr-4"></i>
                        <span class="text-lg">Kesempatan mengikuti kompetisi nasional</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-2xl text-orange-200 mr-4"></i>
                        <span class="text-lg">Pengalaman organisasi yang berharga</span>
                    </div>
                </div>
            </div>

            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-8" data-aos="fade-left">
                <h3 class="text-2xl font-bold mb-6">Informasi Kontak</h3>
                
                <div class="space-y-6">
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-2xl text-orange-200 mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold mb-1">Kantor ORMAWA</h4>
                            <p class="text-orange-100">Gedung Fakultas Teknik Lt. 1<br>Universitas Negeri Manado</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <i class="fas fa-envelope text-2xl text-orange-200 mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold mb-1">Email</h4>
                            <p class="text-orange-100">ormawa@fatek.unima.ac.id</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <i class="fas fa-phone text-2xl text-orange-200 mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold mb-1">Telepon</h4>
                            <p class="text-orange-100">+62-431-123456 ext. 123</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <i class="fas fa-clock text-2xl text-orange-200 mr-4 mt-1"></i>
                        <div>
                            <h4 class="font-semibold mb-1">Jam Operasional</h4>
                            <p class="text-orange-100">Senin - Jumat: 08:00 - 16:00<br>Sabtu: 08:00 - 12:00</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="mailto:ormawa@fatek.unima.ac.id" class="inline-flex items-center bg-white text-orange-600 px-6 py-3 rounded-lg font-semibold hover:bg-orange-50 transition-colors">
                        <i class="fas fa-envelope mr-2"></i>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gray-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6" data-aos="fade-up">
            Siap Bergabung dengan ORMAWA Fatek?
        </h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Bergabunglah dengan organisasi kemahasiswaan Fatek UNIMA dan kembangkan potensi Anda bersama ribuan mahasiswa lainnya.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="400">
            <a href="mailto:ormawa@fatek.unima.ac.id" class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors inline-flex items-center">
                <i class="fas fa-envelope mr-2"></i>
                Daftar Sekarang
            </a>
            <a href="{{ url('/kontak') }}" class="border-2 border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white px-8 py-4 rounded-lg font-semibold transition-colors inline-flex items-center">
                <i class="fas fa-info-circle mr-2"></i>
                Informasi Lebih Lanjut
            </a>
        </div>
    </div>
</section>
@endsection 