@extends('master')

@section('title', 'Magang & KKN - Fakultas Teknik UNIMA')

@section('content')
<main class="bg-gray-50">
    <!-- Hero Section -->
    <section class="pt-20 bg-gradient-to-br from-orange-600 to-orange-800">
        <div class="container mx-auto px-4 py-16">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Magang & KKN</h1>
                <p class="text-xl text-orange-100 max-w-3xl mx-auto leading-relaxed">
                    Program pengembangan diri mahasiswa melalui pengalaman kerja langsung dan pengabdian kepada masyarakat
                </p>
            </div>
        </div>
    </section>

    <!-- Magang Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-briefcase text-white text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800">Program Magang</h2>
                    </div>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Magang merupakan salah satu program pengembangan diri yang memberikan kesempatan bagi mahasiswa untuk memperoleh pengalaman kerja secara langsung di dunia industri, instansi pemerintah, maupun organisasi non-profit.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-orange-600 mt-1 mr-3"></i>
                            <span class="text-gray-700">Menerapkan ilmu yang telah dipelajari dalam situasi nyata</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-orange-600 mt-1 mr-3"></i>
                            <span class="text-gray-700">Mengembangkan keterampilan profesional</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-orange-600 mt-1 mr-3"></i>
                            <span class="text-gray-700">Membangun jaringan yang bermanfaat untuk karier</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-orange-600 mt-1 mr-3"></i>
                            <span class="text-gray-700">Memahami dinamika dunia kerja</span>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8 border border-orange-200">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-orange-600 mb-2">500+</div>
                                <div class="text-gray-600">Mahasiswa Magang</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-orange-600 mb-2">50+</div>
                                <div class="text-gray-600">Perusahaan Mitra</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-orange-600 mb-2">95%</div>
                                <div class="text-gray-600">Tingkat Penyerapan</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-orange-600 mb-2">12</div>
                                <div class="text-gray-600">Bulan Program</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KKN Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="relative order-2 lg:order-1">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 border border-blue-200">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600 mb-2">800+</div>
                                <div class="text-gray-600">Mahasiswa KKN</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600 mb-2">25+</div>
                                <div class="text-gray-600">Desa Binaan</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600 mb-2">15</div>
                                <div class="text-gray-600">Program Utama</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600 mb-2">3</div>
                                <div class="text-gray-600">Bulan Durasi</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-6 order-1 lg:order-2">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-hands-helping text-white text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800">Kuliah Kerja Nyata (KKN)</h2>
                    </div>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        KKN adalah bentuk pengabdian kepada masyarakat yang dilakukan oleh mahasiswa sebagai bagian dari proses pembelajaran di luar kampus. Mahasiswa turun langsung ke lapangan untuk merancang dan melaksanakan program-program yang dapat memberikan dampak positif bagi masyarakat.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                            <span class="text-gray-700">Program pengabdian di bidang pendidikan, kesehatan, lingkungan</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                            <span class="text-gray-700">Pemberdayaan ekonomi masyarakat</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                            <span class="text-gray-700">Belajar bersosialisasi dan beradaptasi</span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                            <span class="text-gray-700">Menumbuhkan rasa empati dan kepedulian</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Areas -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Bidang Program</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Program magang dan KKN mencakup berbagai bidang yang relevan dengan kebutuhan industri dan masyarakat
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 border border-green-200 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-industry text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-green-800 mb-3">Industri</h3>
                    <p class="text-gray-600">Magang di perusahaan manufaktur, konstruksi, dan teknologi</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 border border-purple-200 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-building text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-purple-800 mb-3">Pemerintahan</h3>
                    <p class="text-gray-600">Pengalaman kerja di instansi pemerintah dan BUMN</p>
                </div>
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-6 border border-orange-200 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-orange-800 mb-3">Masyarakat</h3>
                    <p class="text-gray-600">Pengabdian langsung kepada masyarakat desa</p>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-leaf text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-800 mb-3">Lingkungan</h3>
                    <p class="text-gray-600">Program pelestarian dan pemberdayaan lingkungan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Berita Terkini</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Informasi terbaru seputar program magang dan KKN Fakultas Teknik UNIMA
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="h-48 bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center">
                        <i class="fas fa-newspaper text-white text-4xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Penarikan Mahasiswa KKN Unima Tahun 2025</h3>
                        <p class="text-gray-600 mb-4">806 mahasiswa rampungkan pengabdian, Fatek tegaskan komitmen untuk masyarakat</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>Januari 2025</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-4xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Program Magang Industri 2025</h3>
                        <p class="text-gray-600 mb-4">Kerjasama dengan 50+ perusahaan untuk program magang mahasiswa</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>Februari 2025</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <i class="fas fa-award text-white text-4xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Prestasi Mahasiswa Magang</h3>
                        <p class="text-gray-600 mb-4">Mahasiswa teknik raih penghargaan terbaik program magang nasional</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>Maret 2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-gradient-to-br from-orange-600 to-orange-800">
        <div class="container mx-auto px-4">
            <div class="text-center text-white">
                <h2 class="text-3xl font-bold mb-6">Informasi Lebih Lanjut</h2>
                <p class="text-xl text-orange-100 mb-8 max-w-2xl mx-auto">
                    Untuk informasi detail mengenai program magang dan KKN, silakan hubungi koordinator program
                </p>
                <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
                        <i class="fas fa-envelope text-2xl mb-4"></i>
                        <h3 class="font-semibold mb-2">Email</h3>
                        <p>magang@fatek.unima.ac.id</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
                        <i class="fas fa-phone text-2xl mb-4"></i>
                        <h3 class="font-semibold mb-2">Telepon</h3>
                        <p>+62-431-123456</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
                        <i class="fas fa-map-marker-alt text-2xl mb-4"></i>
                        <h3 class="font-semibold mb-2">Lokasi</h3>
                        <p>Gedung Fatek Lt. 2</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection 