@extends('master')

@section('title', 'Download Dokumen - Fakultas Teknik UNIMA')

@section('content')
<!-- Hero Section Modern -->
<section class="relative bg-gradient-to-br from-blue-700 via-blue-500 to-blue-300 text-white py-20 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="md:w-2/3 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight drop-shadow-lg">Download Dokumen</h1>
                <p class="text-lg md:text-2xl mb-6 font-medium drop-shadow">Dokumen-dokumen penting Fakultas Teknik UNIMA untuk mahasiswa, dosen, dan pengunjung.</p>
                <a href="#dokumen" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition duration-300 text-lg">
                    <i class="fas fa-download mr-2"></i>Lihat Dokumen
                </a>
            </div>
            <div class="md:w-1/3 flex justify-center md:justify-end">
                <img src="https://cdn-icons-png.flaticon.com/512/3081/3081559.png" alt="Download Illustration" class="w-56 h-56 object-contain drop-shadow-xl animate-float" loading="lazy">
            </div>
        </div>
    </div>
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-blue-700/60 to-blue-300/30 pointer-events-none"></div>
</section>

<!-- Dokumen Kategori -->
<section id="dokumen" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Kategori Dokumen -->
            <div class="mb-12 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">Dokumen Penting</h2>
                <p class="text-gray-600 text-lg">Pilih kategori dokumen yang ingin Anda unduh:</p>
            </div>

            <!-- Filter Kategori -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <a href="{{ route('download') }}" class="filter-btn {{ !$kategori ? 'active bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-blue-600 hover:text-white' }} px-6 py-3 rounded-lg font-semibold transition-all">
                    <i class="fas fa-th-large mr-2"></i>Semua
                </a>
                @if(isset($kategoris) && $kategoris->count() > 0)
                    @foreach($kategoris as $kat => $label)
                        @php
                            $icon = 'file';
                            switch($kat) {
                                case 'akademik':
                                    $icon = 'graduation-cap';
                                    break;
                                case 'administrasi':
                                    $icon = 'file-alt';
                                    break;
                                case 'penelitian':
                                    $icon = 'microscope';
                                    break;
                                case 'pengabdian':
                                    $icon = 'hands-helping';
                                    break;
                                case 'kerjasama':
                                    $icon = 'handshake';
                                    break;
                            }
                        @endphp
                        <a href="{{ route('download', ['kategori' => $kat]) }}" class="filter-btn {{ $kategori == $kat ? 'active bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-blue-600 hover:text-white' }} px-6 py-3 rounded-lg font-semibold transition-all">
                            <i class="fas fa-{{ $icon }} mr-2"></i>{{ $label }}
                        </a>
                    @endforeach
                @endif
            </div>

            <!-- Grid Dokumen -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="dokumen-grid">
                @if(isset($dokumen) && $dokumen->count() > 0)
                    @foreach($dokumen as $doc)
                        <div class="dokumen-card bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition-all" data-category="{{ $doc->kategori }}">
                            <div class="flex items-start justify-between mb-4">
                                @php
                                    $fileType = strtolower($doc->file_type ?: pathinfo($doc->file_name, PATHINFO_EXTENSION));
                                    $iconClass = 'fas fa-file';
                                    $iconColor = 'text-gray-500';
                                    $badgeColor = 'bg-gray-100 text-gray-800';
                                    
                                    switch($fileType) {
                                        case 'pdf':
                                            $iconClass = 'fas fa-file-pdf';
                                            $iconColor = 'text-red-500';
                                            $badgeColor = 'bg-red-100 text-red-800';
                                            break;
                                        case 'doc':
                                        case 'docx':
                                            $iconClass = 'fas fa-file-word';
                                            $iconColor = 'text-blue-500';
                                            $badgeColor = 'bg-blue-100 text-blue-800';
                                            break;
                                        case 'xls':
                                        case 'xlsx':
                                            $iconClass = 'fas fa-file-excel';
                                            $iconColor = 'text-green-500';
                                            $badgeColor = 'bg-green-100 text-green-800';
                                            break;
                                        case 'ppt':
                                        case 'pptx':
                                            $iconClass = 'fas fa-file-powerpoint';
                                            $iconColor = 'text-orange-500';
                                            $badgeColor = 'bg-orange-100 text-orange-800';
                                            break;
                                        case 'zip':
                                        case 'rar':
                                            $iconClass = 'fas fa-file-archive';
                                            $iconColor = 'text-purple-500';
                                            $badgeColor = 'bg-purple-100 text-purple-800';
                                            break;
                                    }
                                @endphp
                                <i class="{{ $iconClass }} text-3xl {{ $iconColor }}"></i>
                                <span class="{{ $badgeColor }} text-xs px-2 py-1 rounded-full">{{ $doc->file_type ?: strtoupper($fileType) }}</span>
                            </div>
                            <h3 class="font-bold text-lg mb-2">{{ $doc->judul }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $doc->deskripsi ?: 'Dokumen penting Fakultas Teknik UNIMA.' }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-gray-500">{{ $doc->formatted_file_size }} • {{ $doc->created_at->format('d M Y') }}</span>
                                <a href="{{ route('download.file', $doc->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                                    <i class="fas fa-download mr-1"></i>Download
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-full text-center py-12">
                        <i class="fas fa-file-alt text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum ada dokumen</h3>
                        <p class="text-gray-500">Dokumen akan ditampilkan di sini setelah admin mengupload file.</p>
                    </div>
                @endif
            </div>

            @if(isset($dokumen) && $dokumen->count() > 0)
                <!-- Informasi Tambahan -->
                <div class="mt-16 bg-white rounded-xl shadow-lg p-8">
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="text-center">
                            <i class="fas fa-shield-alt text-4xl text-blue-600 mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Aman & Terpercaya</h3>
                            <p class="text-gray-600">Semua dokumen telah diverifikasi dan aman untuk diunduh.</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-clock text-4xl text-green-600 mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Update Berkala</h3>
                            <p class="text-gray-600">Dokumen diperbarui secara berkala sesuai kebutuhan.</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-headset text-4xl text-orange-600 mb-4"></i>
                            <h3 class="font-bold text-lg mb-2">Bantuan</h3>
                            <p class="text-gray-600">Hubungi admin jika ada masalah dalam mengunduh dokumen.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Butuh Dokumen Lain?</h2>
        <p class="text-xl mb-8 opacity-90">Jika Anda tidak menemukan dokumen yang dicari, silakan hubungi kami.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/kontak" class="bg-white text-blue-600 hover:bg-gray-100 font-semibold py-3 px-8 rounded-lg transition duration-300">
                <i class="fas fa-envelope mr-2"></i>Hubungi Kami
            </a>
            <a href="/layanan-akademik" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-600 font-semibold py-3 px-8 rounded-lg transition duration-300">
                <i class="fas fa-info-circle mr-2"></i>Info Layanan
            </a>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    try {
        // Smooth scroll untuk anchor links
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        anchorLinks.forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Animasi untuk dokumen cards
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        const dokumenCards = document.querySelectorAll('.dokumen-card');
        dokumenCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    } catch (error) {
        console.error('Error in download page script:', error);
    }
});
</script>
@endsection

@push('styles')
<style>
.fadein-anim {
  opacity: 0;
  transition: opacity 0.7s;
}
.fadein-anim.opacity-100 {
  opacity: 1;
}

/* Animasi float untuk gambar */
@keyframes float {
  0%, 100% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-10px);
  }
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}

/* Styling untuk filter buttons */
.filter-btn {
  transition: all 0.3s ease;
}

.filter-btn:hover {
  transform: translateY(-2px);
}

/* Dokumen card animations */
.dokumen-card {
  transition: all 0.3s ease;
}

.dokumen-card:hover {
  transform: translateY(-5px);
}
</style>
@endpush 