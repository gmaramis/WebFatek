@extends('master')

@section('title', 'Pedoman Akademik - Fakultas Teknik UNIMA')

@section('content')
<main class="bg-gray-50">
    <!-- Hero Section -->
    <section class="pt-20 bg-gradient-to-br from-orange-600 to-orange-800">
        <div class="container mx-auto px-4 py-16">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Pedoman Akademik</h1>
                <p class="text-xl text-orange-100 max-w-3xl mx-auto leading-relaxed">
                    Panduan lengkap tata tertib, aturan, dan prosedur akademik Fakultas Teknik Universitas Negeri Manado
                </p>
            </div>
        </div>
    </section>

    @php
        $pedomanAkademiks = App\Models\PedomanAkademik::active()->ordered()->get();
    @endphp

    @if($pedomanAkademiks->count() > 0)
        <!-- Pedoman List Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Dokumen Pedoman Akademik</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        Berikut adalah dokumen-dokumen pedoman akademik yang berlaku di Fakultas Teknik UNIMA
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @foreach($pedomanAkademiks as $pedoman)
                        <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 border border-orange-200 hover:shadow-lg transition-all duration-300">
                            <div class="text-center mb-6">
                                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-file-pdf text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-orange-800 mb-3">{{ $pedoman->judul }}</h3>
                                <p class="text-orange-700 text-sm mb-4">{{ $pedoman->deskripsi }}</p>
                            </div>

                            <div class="space-y-3 mb-6">
                                @if($pedoman->file_size)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Ukuran:</span>
                                        <span class="font-semibold text-gray-800">{{ $pedoman->file_size }}</span>
                                    </div>
                                @endif
                                @if($pedoman->jumlah_halaman)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Halaman:</span>
                                        <span class="font-semibold text-gray-800">{{ $pedoman->jumlah_halaman }}</span>
                                    </div>
                                @endif
                                @if($pedoman->format_file)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Format:</span>
                                        <span class="font-semibold text-gray-800">{{ $pedoman->format_file }}</span>
                                    </div>
                                @endif
                                @if($pedoman->tanggal_update_formatted)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Update:</span>
                                        <span class="font-semibold text-gray-800">{{ $pedoman->tanggal_update_formatted }}</span>
                                    </div>
                                @endif
                            </div>

                            @if($pedoman->file_url)
                                <a href="{{ $pedoman->file_url }}" 
                                   target="_blank" 
                                   class="block w-full text-center px-4 py-3 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                    <i class="fas fa-download mr-2"></i>
                                    Download {{ $pedoman->format_file }}
                                </a>
                            @endif

                            @if($pedoman->catatan)
                                <div class="mt-4 p-3 bg-amber-50 border border-amber-200 rounded-lg">
                                    <p class="text-xs text-amber-800">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        {{ $pedoman->catatan }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <!-- No Data Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center">
                    <div class="w-20 h-20 bg-gray-300 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-file-alt text-gray-500 text-3xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Belum Ada Pedoman Akademik</h2>
                    <p class="text-gray-600 max-w-md mx-auto">
                        Saat ini belum ada dokumen pedoman akademik yang tersedia. Silakan cek kembali nanti.
                    </p>
                </div>
            </div>
        </section>
    @endif

    <!-- Content Overview -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Isi Pedoman Akademik</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Pedoman akademik mencakup berbagai aspek penting yang perlu diketahui oleh seluruh civitas akademika Fakultas Teknik
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Tata Tertib Akademik</h3>
                    <p class="text-gray-600">Aturan dan ketentuan yang berlaku dalam kegiatan akademik mahasiswa dan dosen</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-calendar-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Kalender Akademik</h3>
                    <p class="text-gray-600">Jadwal kegiatan akademik, ujian, dan periode penting dalam tahun akademik</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-book text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Prosedur Administrasi</h3>
                    <p class="text-gray-600">Tata cara pengurusan dokumen akademik dan administrasi mahasiswa</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 bg-teal-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Hak dan Kewajiban</h3>
                    <p class="text-gray-600">Hak dan kewajiban mahasiswa, dosen, dan tenaga kependidikan</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Sanksi Akademik</h3>
                    <p class="text-gray-600">Jenis sanksi dan tindakan disipliner untuk pelanggaran akademik</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-clipboard-list text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Evaluasi dan Penilaian</h3>
                    <p class="text-gray-600">Sistem evaluasi, penilaian, dan kriteria kelulusan mahasiswa</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Important Notes -->
    <section class="py-16 bg-white">
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
                                    <span>Pedoman akademik wajib dibaca dan dipahami oleh seluruh mahasiswa Fakultas Teknik</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-amber-600 mt-1 mr-3"></i>
                                    <span>Perubahan pedoman akan diumumkan melalui website resmi dan media sosial fakultas</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-amber-600 mt-1 mr-3"></i>
                                    <span>Ketidaktahuan terhadap pedoman tidak dapat dijadikan alasan untuk pelanggaran</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-amber-600 mt-1 mr-3"></i>
                                    <span>Untuk pertanyaan lebih lanjut, silakan hubungi bagian akademik fakultas</span>
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
                    Jika Anda memiliki pertanyaan seputar pedoman akademik, silakan hubungi bagian akademik Fakultas Teknik
                </p>
                <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
                        <i class="fas fa-envelope text-2xl mb-4"></i>
                        <h3 class="font-semibold mb-2">Email</h3>
                        <p>akademik@fatek.unima.ac.id</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
                        <i class="fas fa-phone text-2xl mb-4"></i>
                        <h3 class="font-semibold mb-2">Telepon</h3>
                        <p>+62-431-123456</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 border border-white/20">
                        <i class="fas fa-map-marker-alt text-2xl mb-4"></i>
                        <h3 class="font-semibold mb-2">Lokasi</h3>
                        <p>Gedung Fatek Lt. 1</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection 