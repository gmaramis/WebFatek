@extends('master')

@section('title', 'Teknik Informatika - Fakultas Teknik UNIMA')

@push('head')
<style>
  /* Gaya spesifik untuk halaman ini */
  .curriculum-card {
    transition: all 0.3s ease-in-out;
  }
  .curriculum-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  }
</style>
@endpush

@section('content')
<main class="bg-gray-100">
    <!-- Hero Section -->
    <section class="relative h-[60vh] bg-cover bg-center text-white flex items-center justify-center" style="background-image: url('{{ asset('img/TI.jpg') }}');">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 text-center px-4 animate-fade-in-up">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 leading-tight">Program Studi Teknik Informatika</h1>
            <p class="text-lg md:text-xl max-w-3xl mx-auto">Mencetak Inovator Digital Unggul dan Berkarakter</p>
            <a href="#profil" class="mt-8 inline-block bg-primary hover:bg-accent text-white font-semibold px-8 py-3 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                Jelajahi Sekarang <i class="fas fa-arrow-down ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Content Section -->
    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-12 gap-8">
            <!-- Main Content -->
            <div class="col-span-12 lg:col-span-8 space-y-12">
                <!-- Profil Section -->
                <section id="profil" class="bg-white p-8 rounded-xl shadow-lg">
                    <h2 class="text-3xl font-bold text-secondary mb-6 border-b-4 border-primary pb-2">Profil Program Studi</h2>
                    <div class="space-y-4 text-gray-700 leading-relaxed">
                        <p>
                            Program Studi Teknik Informatika di Fakultas Teknik Universitas Negeri Manado adalah pusat unggulan pendidikan yang didedikasikan untuk menghasilkan lulusan yang kompeten di bidang teknologi informasi. Kami menggabungkan kurikulum yang relevan dengan industri, fasilitas modern, dan dosen ahli untuk menciptakan lingkungan belajar yang dinamis dan inovatif.
                        </p>
                        <p>
                            Mahasiswa kami tidak hanya dibekali dengan pengetahuan teknis mendalam tentang rekayasa perangkat lunak, kecerdasan buatan, keamanan siber, dan jaringan komputer, tetapi juga diasah kemampuan berpikir kritis, pemecahan masalah, dan kolaborasinya. Dengan fokus pada proyek nyata dan penelitian terapan, kami memastikan setiap lulusan siap menghadapi tantangan global dan menjadi pemimpin di era digital.
                        </p>
                    </div>
                </section>

                <!-- Visi & Misi Section -->
                <section id="visi-misi" class="bg-white p-8 rounded-xl shadow-lg">
                    <h2 class="text-3xl font-bold text-secondary mb-6 border-b-4 border-primary pb-2">Visi & Misi</h2>
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-2xl font-semibold text-primary mb-2 flex items-center"><i class="fas fa-bullseye mr-3"></i>Visi</h3>
                            <p class="text-gray-700">Menjadi program studi unggul dan inovatif dalam bidang Teknik Informatika yang berlandaskan nilai-nilai luhur dan berdaya saing di tingkat nasional dan internasional pada tahun 2030.</p>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold text-primary mb-2 flex items-center"><i class="fas fa-tasks mr-3"></i>Misi</h3>
                            <ol class="list-decimal list-inside text-gray-700 space-y-2 pl-4">
                                <li>Menyelenggarakan pendidikan berkualitas tinggi yang menghasilkan lulusan berkompetensi dalam rekayasa perangkat lunak, kecerdasan buatan, dan keamanan informasi.</li>
                                <li>Melaksanakan penelitian inovatif yang berkontribusi pada pengembangan ilmu pengetahuan dan teknologi serta memberikan solusi bagi permasalahan masyarakat.</li>
                                <li>Menyelenggarakan pengabdian kepada masyarakat berbasis teknologi informasi untuk meningkatkan kesejahteraan dan kemandirian bangsa.</li>
                                <li>Membangun kerjasama yang berkelanjutan dengan industri, pemerintah, dan institusi pendidikan lain di tingkat regional, nasional, dan internasional.</li>
                            </ol>
                        </div>
                    </div>
                </section>

                 <!-- Kurikulum Section -->
                 <section id="kurikulum" class="p-8 rounded-xl shadow-lg bg-gradient-to-br from-secondary to-gray-800 text-white">
                    <h2 class="text-3xl font-bold mb-8 text-center border-b-4 border-accent pb-3">Struktur Kurikulum</h2>
                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Semester 1-4 -->
                        <div class="curriculum-card bg-white/10 p-6 rounded-lg backdrop-blur-sm border border-white/20">
                            <h3 class="text-2xl font-semibold text-accent mb-4">Tahap Dasar (Semester 1-4)</h3>
                            <div class="space-y-3">
                                <p><i class="fas fa-check-circle mr-2 text-green-400"></i>Dasar Pemrograman</p>
                                <p><i class="fas fa-check-circle mr-2 text-green-400"></i>Struktur Data & Algoritma</p>
                                <p><i class="fas fa-check-circle mr-2 text-green-400"></i>Matematika Diskrit</p>
                                <p><i class="fas fa-check-circle mr-2 text-green-400"></i>Sistem Operasi</p>
                                <p><i class="fas fa-check-circle mr-2 text-green-400"></i>Jaringan Komputer</p>
                            </div>
                        </div>
                        <!-- Semester 5-8 -->
                        <div class="curriculum-card bg-white/10 p-6 rounded-lg backdrop-blur-sm border border-white/20">
                            <h3 class="text-2xl font-semibold text-accent mb-4">Tahap Lanjut & Spesialisasi (Semester 5-8)</h3>
                            <div class="space-y-3">
                                <p><i class="fas fa-cogs mr-2 text-blue-400"></i>Rekayasa Perangkat Lunak</p>
                                <p><i class="fas fa-brain mr-2 text-blue-400"></i>Kecerdasan Buatan</p>
                                <p><i class="fas fa-shield-alt mr-2 text-blue-400"></i>Keamanan Informasi</p>
                                <p><i class="fas fa-cloud mr-2 text-blue-400"></i>Komputasi Awan</p>
                                <p><i class="fas fa-project-diagram mr-2 text-blue-400"></i>Proyek Akhir/Skripsi</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Dosen Section -->
                <section id="dosen" class="bg-white p-8 rounded-xl shadow-lg">
                    <h2 class="text-3xl font-bold text-secondary mb-6 border-b-4 border-primary pb-2">Staf Pengajar</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Contoh Dosen 1 -->
                        <div class="text-center p-4 border rounded-lg hover:shadow-md transition-shadow">
                            <img src="{{ asset('img/dosen/dosen1.jpg') }}" alt="Foto Dosen 1" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="font-semibold text-lg text-secondary">Dr. John Doe</h4>
                            <p class="text-primary">Rekayasa Perangkat Lunak</p>
                        </div>
                        <!-- Contoh Dosen 2 -->
                        <div class="text-center p-4 border rounded-lg hover:shadow-md transition-shadow">
                            <img src="{{ asset('img/dosen/dosen2.jpg') }}" alt="Foto Dosen 2" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="font-semibold text-lg text-secondary">Jane Smith, M.Kom.</h4>
                            <p class="text-primary">Kecerdasan Buatan</p>
                        </div>
                        <!-- Contoh Dosen 3 -->
                        <div class="text-center p-4 border rounded-lg hover:shadow-md transition-shadow">
                             <img src="{{ asset('img/dosen/dosen3.jpg') }}" alt="Foto Dosen 3" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="font-semibold text-lg text-secondary">Dr. Alex Johnson</h4>
                            <p class="text-primary">Keamanan Siber</p>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Sidebar -->
            <aside class="col-span-12 lg:col-span-4 space-y-8">
                <!-- Quick Navigation -->
                <div class="sticky top-28 bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-bold text-secondary mb-4">Navigasi Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="#profil" class="flex items-center text-gray-700 hover:text-primary transition-colors"><i class="fas fa-user-circle w-5 mr-3 text-primary"></i>Profil</a></li>
                        <li><a href="#visi-misi" class="flex items-center text-gray-700 hover:text-primary transition-colors"><i class="fas fa-bullseye w-5 mr-3 text-primary"></i>Visi & Misi</a></li>
                        <li><a href="#kurikulum" class="flex items-center text-gray-700 hover:text-primary transition-colors"><i class="fas fa-book-open w-5 mr-3 text-primary"></i>Kurikulum</a></li>
                        <li><a href="#dosen" class="flex items-center text-gray-700 hover:text-primary transition-colors"><i class="fas fa-chalkboard-teacher w-5 mr-3 text-primary"></i>Dosen</a></li>
                    </ul>
                </div>
                 <!-- Back to Home Button -->
                 <div class="sticky top-60 text-center">
                    <a href="{{ url('/') }}" class="inline-block bg-secondary hover:bg-primary text-white font-semibold px-6 py-3 rounded-lg shadow-md transition-all duration-300 w-full">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
                    </a>
                </div>
            </aside>
        </div>
    </div>
</main>
@endsection 