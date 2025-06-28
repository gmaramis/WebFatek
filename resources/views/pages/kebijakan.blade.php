@extends('master')

@section('title', 'Kebijakan - Fakultas Teknik UNIMA')

@push('head')
<style>
    /* Prose styling untuk konten HTML */
    .prose {
        color: #374151;
        max-width: none;
    }
    
    .prose h3 {
        color: #1f2937;
        font-size: 1.5rem;
        font-weight: 700;
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .prose h4 {
        color: #374151;
        font-size: 1.25rem;
        font-weight: 600;
        margin-top: 1.25rem;
        margin-bottom: 0.75rem;
    }
    
    .prose p {
        margin-bottom: 1rem;
        line-height: 1.75;
    }
    
    .prose ul {
        margin-top: 0.75rem;
        margin-bottom: 1rem;
        padding-left: 1.5rem;
    }
    
    .prose li {
        margin-bottom: 0.5rem;
        line-height: 1.6;
    }
    
    /* Modal styling */
    .modal-overlay {
        backdrop-filter: blur(4px);
    }
    
    .modal-content {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    /* Loading animation */
    .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid #f3f3f3;
        border-top: 3px solid #ea580c;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endpush

@section('content')
<main class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-orange-600 to-orange-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Kebijakan</h1>
            <p class="text-xl text-orange-100">Kebijakan Fakultas Teknik Universitas Negeri Manado</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container mx-auto px-4 py-12">
        @php
            $kebijakans = App\Models\Kebijakan::active()->get();
        @endphp

        @if($kebijakans->count() > 0)
            <!-- Filter Section -->
            <div class="mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Filter Kebijakan</h3>
                    <div class="flex flex-wrap gap-4">
                        <button class="filter-btn active px-4 py-2 rounded-lg bg-orange-600 text-white" data-kategori="semua">
                            Semua
                        </button>
                        <button class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-orange-100" data-kategori="akademik">
                            Akademik
                        </button>
                        <button class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-orange-100" data-kategori="kemahasiswaan">
                            Kemahasiswaan
                        </button>
                        <button class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-orange-100" data-kategori="kepegawaian">
                            Kepegawaian
                        </button>
                        <button class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-orange-100" data-kategori="keuangan">
                            Keuangan
                        </button>
                        <button class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-orange-100" data-kategori="umum">
                            Umum
                        </button>
                    </div>
                </div>
            </div>

            <!-- Kebijakan List -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="kebijakan-container">
                @foreach($kebijakans as $kebijakan)
                    <div class="kebijakan-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300" data-kategori="{{ $kebijakan->kategori }}">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium 
                                    @if($kebijakan->kategori == 'akademik') bg-blue-100 text-blue-800
                                    @elseif($kebijakan->kategori == 'kemahasiswaan') bg-green-100 text-green-800
                                    @elseif($kebijakan->kategori == 'kepegawaian') bg-yellow-100 text-yellow-800
                                    @elseif($kebijakan->kategori == 'keuangan') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($kebijakan->kategori) }}
                                </span>
                                @if($kebijakan->file_dokumen)
                                    <a href="{{ asset('storage/' . $kebijakan->file_dokumen) }}" 
                                       target="_blank"
                                       class="text-orange-600 hover:text-orange-700">
                                        <i class="fas fa-download"></i>
                                    </a>
                                @endif
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $kebijakan->judul }}</h3>
                            <p class="text-gray-600 mb-4">{{ $kebijakan->deskripsi }}</p>
                            
                            <div class="prose prose-sm max-w-none text-gray-700 mb-4">
                                {!! Str::limit(strip_tags($kebijakan->isi), 150) !!}
                            </div>
                            
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>Diupdate: {{ $kebijakan->updated_at->format('d M Y') }}</span>
                                <button class="text-orange-600 hover:text-orange-700 font-medium" 
                                        onclick="showKebijakanDetail({{ $kebijakan->id }})">
                                    Baca Selengkapnya
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Modal Detail Kebijakan -->
            <div id="kebijakan-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 modal-overlay">
                <div class="flex items-center justify-center min-h-screen p-4">
                    <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto modal-content">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4 border-b pb-4">
                                <h3 class="text-2xl font-bold text-gray-800" id="modal-title"></h3>
                                <button onclick="closeKebijakanModal()" class="text-gray-500 hover:text-gray-700 transition-colors">
                                    <i class="fas fa-times text-2xl"></i>
                                </button>
                            </div>
                            <div id="modal-content" class="prose prose-lg max-w-none">
                                <!-- Content will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <!-- Fallback jika tidak ada data -->
            <div class="max-w-4xl mx-auto text-center">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <i class="fas fa-file-alt text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Data Belum Tersedia</h3>
                    <p class="text-gray-600">Data kebijakan fakultas sedang dalam proses pengisian.</p>
                </div>
            </div>
        @endif
    </div>
</main>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const kebijakanCards = document.querySelectorAll('.kebijakan-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const kategori = this.getAttribute('data-kategori');
            
            // Update active button
            filterBtns.forEach(b => {
                b.classList.remove('active', 'bg-orange-600', 'text-white');
                b.classList.add('bg-gray-200', 'text-gray-700');
            });
            this.classList.add('active', 'bg-orange-600', 'text-white');
            this.classList.remove('bg-gray-200', 'text-gray-700');

            // Filter cards
            kebijakanCards.forEach(card => {
                if (kategori === 'semua' || card.getAttribute('data-kategori') === kategori) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});

// Modal functionality
function showKebijakanDetail(id) {
    // Show loading
    document.getElementById('modal-title').textContent = 'Loading...';
    document.getElementById('modal-content').innerHTML = '<div class="flex items-center justify-center py-8"><div class="loading"></div><span class="ml-3">Memuat data...</span></div>';
    document.getElementById('kebijakan-modal').classList.remove('hidden');
    
    // Fetch data from server
    fetch(`/api/kebijakan/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('modal-title').textContent = data.kebijakan.judul;
                document.getElementById('modal-content').innerHTML = data.kebijakan.isi;
            } else {
                document.getElementById('modal-title').textContent = 'Error';
                document.getElementById('modal-content').innerHTML = '<p class="text-red-600">Gagal memuat data kebijakan.</p>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('modal-title').textContent = 'Error';
            document.getElementById('modal-content').innerHTML = '<p class="text-red-600">Terjadi kesalahan saat memuat data.</p>';
        });
}

function closeKebijakanModal() {
    document.getElementById('kebijakan-modal').classList.add('hidden');
}

// Close modal when clicking outside
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('kebijakan-modal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeKebijakanModal();
            }
        });
    }
});
</script>
@endsection 