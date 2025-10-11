@extends('master')

@section('title', 'Kalender Akademik - Fakultas Teknik UNIMA')

@section('content')
<main class="bg-gray-50">
    <!-- Hero Section -->
    <section class="pt-20 bg-gradient-to-br from-orange-600 to-orange-800">
        <div class="container mx-auto px-4 py-16">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Kalender Akademik</h1>
                <p class="text-xl text-orange-100 max-w-3xl mx-auto leading-relaxed">
                    Jadwal lengkap kegiatan akademik, ujian, dan periode penting dalam tahun akademik Fakultas Teknik UNIMA
                </p>
            </div>
        </div>
    </section>

    @php
        $kalenderAkademiks = App\Models\KalenderAkademik::active()->ordered()->get();
    @endphp

    @if($kalenderAkademiks->count() > 0)
        <!-- Current Academic Year Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Tahun Akademik {{ $kalenderAkademiks->first()->tahun_akademik }}</h2>
                        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                            Kalender akademik yang berlaku untuk semester ganjil dan genap tahun akademik {{ $kalenderAkademiks->first()->tahun_akademik }}
                        </p>
                    </div>

                    <!-- Calendar List -->
                    <div class="grid lg:grid-cols-2 gap-12">
                        @foreach($kalenderAkademiks as $kalender)
                            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8 border border-orange-200">
                                <div class="text-center mb-6">
                                    <div class="w-20 h-20 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-calendar-alt text-white text-3xl"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-orange-800 mb-2">{{ $kalender->judul }}</h3>
                                    <p class="text-orange-700">{{ $kalender->deskripsi }}</p>
                                </div>

                                <!-- Preview Container -->
                                <div class="bg-white rounded-xl p-4 shadow-lg mb-6">
                                    <div class="aspect-[4/3] bg-gray-100 rounded-lg flex items-center justify-center border-2 border-dashed border-gray-300">
                                        <div class="text-center">
                                            <i class="fas fa-image text-gray-400 text-4xl mb-4"></i>
                                            <p class="text-gray-500 text-sm">Preview {{ $kalender->judul }}</p>
                                            <p class="text-gray-400 text-xs mt-2">Klik untuk memperbesar</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Download Buttons -->
                                <div class="space-y-4">
                                    @if($kalender->pdf_url)
                                        <a href="{{ $kalender->pdf_url }}"
                                           target="_blank"
                                           class="block w-full text-center px-6 py-4 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                            <i class="fas fa-file-pdf mr-3 text-xl"></i>
                                            Download PDF
                                        </a>
                                    @endif
                                    @if($kalender->jpg_url)
                                        <a href="{{ $kalender->jpg_url }}"
                                           target="_blank"
                                           class="block w-full text-center px-6 py-4 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                            <i class="fas fa-file-image mr-3 text-xl"></i>
                                            Download JPG
                                        </a>
                                    @endif
                                </div>

                                @if($kalender->catatan)
                                    <div class="mt-4 p-3 bg-amber-50 border border-amber-200 rounded-lg">
                                        <p class="text-xs text-amber-800">
                                            <i class="fas fa-info-circle mr-1"></i>
                                            {{ $kalender->catatan }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @else
        <!-- No Data Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center">
                    <div class="w-20 h-20 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-alt text-gray-500 text-3xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Belum Ada Kalender Akademik</h2>
                    <p class="text-gray-600 max-w-md mx-auto">
                        Saat ini belum ada kalender akademik yang tersedia. Silakan cek kembali nanti.
                    </p>
                </div>
            </div>
        </section>
    @endif

    <!-- Academic Schedule Overview -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Jadwal Akademik Penting</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Periode-periode penting dalam tahun akademik yang perlu diperhatikan
                </p>
            </div>

            @php
                $jadwalAkademiks = App\Models\JadwalAkademik::active()->ordered()->get();
            @endphp

            @if($jadwalAkademiks->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @foreach($jadwalAkademiks as $jadwal)
                        <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="w-12 h-12 bg-{{ $jadwal->warna }}-600 rounded-lg flex items-center justify-center mb-4">
                                @if($jadwal->icon)
                                    <i class="{{ $jadwal->icon }} text-white text-xl"></i>
                                @else
                                    <i class="fas fa-calendar-day text-white text-xl"></i>
                                @endif
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $jadwal->judul }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $jadwal->deskripsi }}</p>

                            @if($jadwal->periode_formatted)
                                <div class="mb-3">
                                    <span class="inline-block bg-{{ $jadwal->warna }}-100 text-{{ $jadwal->warna }}-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        {{ $jadwal->periode_formatted }}
                                    </span>
                                </div>
                            @endif

                            @if($jadwal->jadwal_detail_formatted)
                                <div class="space-y-2 text-sm text-gray-600">
                                    @foreach($jadwal->jadwal_detail_formatted as $detail)
                                        <p><strong>{{ $detail['label'] }}:</strong> {{ $detail['value'] }}</p>
                                    @endforeach
                                </div>
                            @endif

                            @if($jadwal->catatan)
                                <div class="mt-4 p-3 bg-amber-50 border border-amber-200 rounded-lg">
                                    <p class="text-xs text-amber-800">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        {{ $jadwal->catatan }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-alt text-gray-500 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Jadwal Akademik</h3>
                    <p class="text-gray-600 max-w-md mx-auto">
                        Saat ini belum ada jadwal akademik yang tersedia. Silakan cek kembali nanti.
                    </p>
                </div>
            @endif
        </div>
    </section>

    <!-- Important Dates Timeline -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Timeline Akademik 2024/2025</h2>
                    <p class="text-lg text-gray-600">
                        Urutan waktu kegiatan akademik yang perlu diperhatikan
                    </p>
                </div>

                @php
                    $timelineAkademiks = App\Models\TimelineAkademik::active()->ordered()->get();
                @endphp

                @if($timelineAkademiks->count() > 0)
                    <div class="relative">
                        <!-- Timeline Line -->
                        <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gray-300"></div>

                        <!-- Timeline Items -->
                        <div class="space-y-8">
                            @foreach($timelineAkademiks as $timeline)
                                <div class="relative flex items-start">
                                    <div class="absolute left-6 w-4 h-4 bg-{{ $timeline->warna }}-600 rounded-full border-4 border-white shadow-lg"></div>
                                    <div class="ml-16">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $timeline->judul }}</h3>
                                        <p class="text-{{ $timeline->warna }}-600 font-medium">{{ $timeline->bulan }} {{ $timeline->tahun }}</p>
                                        <p class="text-gray-600 mt-2">{{ $timeline->deskripsi }}</p>
                                        @if($timeline->catatan)
                                            <p class="text-sm text-gray-500 mt-1">
                                                <i class="fas fa-info-circle mr-1"></i>
                                                {{ $timeline->catatan }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clock text-gray-500 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum Ada Timeline</h3>
                        <p class="text-gray-600">Timeline akademik akan ditampilkan di sini</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Important Notes -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-2xl p-8 border border-amber-200">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-amber-600 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-amber-800 mb-4">Penting untuk Diperhatikan</h3>
                            <div class="space-y-3 text-amber-700">
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-amber-600 mt-1 mr-3"></i>
                                    <span>Kalender akademik dapat berubah sesuai dengan kebijakan universitas</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-amber-600 mt-1 mr-3"></i>
                                    <span>Perubahan jadwal akan diumumkan melalui website resmi dan media sosial fakultas</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-amber-600 mt-1 mr-3"></i>
                                    <span>Mahasiswa wajib mengikuti jadwal yang telah ditentukan</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-amber-600 mt-1 mr-3"></i>
                                    <span>Untuk informasi lebih detail, silakan hubungi bagian akademik fakultas</span>
                                </div>
                            </div>
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
                <h2 class="text-3xl font-bold mb-6">Butuh Bantuan?</h2>
                <p class="text-xl text-orange-100 mb-8 max-w-2xl mx-auto">
                    Jika Anda memiliki pertanyaan seputar kalender akademik, silakan hubungi bagian akademik Fakultas Teknik
                </p>
                <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
                        <i class="fas fa-envelope text-2xl mb-4"></i>
                        <h3 class="font-semibold mb-2">Email</h3>
                        <p>akademik@ft.unima.ac.id</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
                        <i class="fas fa-phone text-2xl mb-4"></i>
                        <h3 class="font-semibold mb-2">Telepon</h3>
                        <p>+62-431-123456</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
                        <i class="fas fa-map-marker-alt text-2xl mb-4"></i>
                        <h3 class="font-semibold mb-2">Lokasi</h3>
                        <p>Gedung Fakultas Teknik Lt. 1</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Modal for Image Preview -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-4xl max-h-full overflow-auto">
        <div class="p-4 border-b flex justify-between items-center">
            <h3 class="text-lg font-semibold">Kalender Akademik</h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="p-4">
            <div class="aspect-[4/3] bg-gray-100 rounded-lg flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-image text-gray-400 text-6xl mb-4"></i>
                    <p class="text-gray-500">Preview Kalender Akademik</p>
                    <p class="text-gray-400 text-sm mt-2">Gambar kalender akan ditampilkan di sini</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('imageModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>
@endsection
