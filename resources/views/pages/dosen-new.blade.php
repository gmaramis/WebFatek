@extends('master')

@section('title', 'Dosen - Fakultas Teknik UNIMA')

@section('content')
<main class="container mx-auto py-16 px-4 min-h-[40vh]">
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-bold text-orange-800 mb-4">Dosen</h1>
        <p class="text-lg text-orange-900 max-w-3xl mx-auto">
            Daftar dosen Fakultas Teknik Universitas Negeri Manado yang terdiri dari dosen tetap dan dosen tidak tetap
        </p>
    </div>

    <!-- Search Bar -->
    <div class="mb-8 bg-white rounded-lg shadow-md p-6">
        <div class="max-w-md mx-auto">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" id="searchInput" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-200" placeholder="Cari nama atau NIP dosen...">
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="mb-8 bg-white rounded-lg shadow-md p-6">
        <div class="flex flex-wrap gap-4 items-center justify-center">
            <button class="filter-btn active px-4 py-2 rounded-lg bg-orange-600 text-white hover:bg-orange-700 transition-all duration-300 ease-out" data-jurusan="all">
                Semua Jurusan
            </button>
            <button class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-orange-600 hover:text-white transition-all duration-300 ease-out" data-jurusan="teknik-informatika">
                Teknik Informatika
            </button>
            <button class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-orange-600 hover:text-white transition-all duration-300 ease-out" data-jurusan="teknik-sipil">
                Teknik Sipil
            </button>
            <button class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-orange-600 hover:text-white transition-all duration-300 ease-out" data-jurusan="teknik-elektro">
                Teknik Elektro
            </button>
            <button class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-orange-600 hover:text-white transition-all duration-300 ease-out" data-jurusan="teknik-mesin">
                Teknik Mesin
            </button>
            <button class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-orange-600 hover:text-white transition-all duration-300 ease-out" data-jurusan="arsitektur">
                Arsitektur
            </button>
            <button class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-orange-600 hover:text-white transition-all duration-300 ease-out" data-jurusan="teknik-bangunan">
                Teknik Bangunan
            </button>
        </div>
    </div>

    @php
        $jurusanList = [
            'teknik-informatika' => 'JURUSAN TEKNIK INFORMATIKA',
            'teknik-sipil' => 'JURUSAN TEKNIK SIPIL',
            'teknik-elektro' => 'JURUSAN TEKNIK ELEKTRO',
            'teknik-mesin' => 'JURUSAN TEKNIK MESIN',
            'arsitektur' => 'JURUSAN ARSITEKTUR',
            'teknik-bangunan' => 'JURUSAN TEKNIK BANGUNAN'
        ];
        
        $dosens = App\Models\Dosen::active()->orderBy('nama')->get()->groupBy('jurusan');
    @endphp

    @foreach($jurusanList as $jurusanKey => $jurusanLabel)
        @if($dosens->has($jurusanKey) && $dosens[$jurusanKey]->count() > 0)
            <div class="jurusan-section mb-12" data-jurusan="{{ $jurusanKey }}">
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 ease-out">
                    <div class="bg-orange-600 text-white px-6 py-4">
                        <h2 class="text-xl font-bold">{{ $jurusanLabel }}</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">No.</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">NIP</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Nama</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Pendidikan Terakhir</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($dosens[$jurusanKey] as $index => $dosen)
                                    <tr class="dosen-row hover:bg-gray-50 transition-colors duration-200" data-nama="{{ $dosen->nama }}" data-nip="{{ $dosen->nip }}">
                                        <td class="px-4 py-3 text-sm text-gray-900">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900">{{ $dosen->nip }}</td>
                                        <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $dosen->nama_lengkap }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900">{{ $dosen->pendidikan_terakhir }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900">{{ $dosen->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <!-- Info Section -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mt-8">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <i class="fas fa-info-circle text-blue-600 text-xl"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-blue-800">Informasi</h3>
                <div class="mt-2 text-sm text-blue-700">
                    <p>• Data dosen diupdate secara berkala sesuai dengan perubahan status dan data terbaru</p>
                    <p>• Untuk informasi lebih detail, silakan hubungi bagian akademik Fakultas Teknik</p>
                    <p>• Dosen yang berstatus "Tugas Belajar" sedang menempuh pendidikan lanjutan</p>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
/* Smooth filter transitions */
.jurusan-section {
    transition: opacity 0.25s ease-in-out;
    opacity: 1;
}

.jurusan-section.hidden {
    opacity: 0;
    pointer-events: none;
}

/* Search highlight */
.dosen-row.highlight {
    background-color: #fef3c7 !important;
    border-left: 4px solid #f59e0b;
}

.dosen-row.hidden {
    display: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const jurusanSections = document.querySelectorAll('.jurusan-section');
    const searchInput = document.getElementById('searchInput');
    const dosenRows = document.querySelectorAll('.dosen-row');

    // Filter by jurusan
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetJurusan = this.getAttribute('data-jurusan');
            
            // Update active button
            filterBtns.forEach(b => {
                b.classList.remove('active', 'bg-orange-600', 'text-white');
                b.classList.add('bg-gray-200', 'text-gray-700');
            });
            this.classList.add('active', 'bg-orange-600', 'text-white');
            this.classList.remove('bg-gray-200', 'text-gray-700');

            // Simple fade filter
            jurusanSections.forEach(section => {
                if (targetJurusan === 'all' || section.getAttribute('data-jurusan') === targetJurusan) {
                    section.style.display = 'block';
                    section.style.opacity = '1';
                } else {
                    section.style.opacity = '0';
                    setTimeout(() => {
                        section.style.display = 'none';
                    }, 250);
                }
            });
        });
    });

    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        dosenRows.forEach(row => {
            const nama = row.getAttribute('data-nama').toLowerCase();
            const nip = row.getAttribute('data-nip');
            
            if (searchTerm === '' || nama.includes(searchTerm) || nip.includes(searchTerm)) {
                row.classList.remove('hidden');
                if (searchTerm !== '') {
                    row.classList.add('highlight');
                } else {
                    row.classList.remove('highlight');
                }
            } else {
                row.classList.add('hidden');
                row.classList.remove('highlight');
            }
        });
    });

    // Clear search when filter changes
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            searchInput.value = '';
            dosenRows.forEach(row => {
                row.classList.remove('hidden', 'highlight');
            });
        });
    });
});
</script>
@endsection 