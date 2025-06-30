@extends('master')

@section('title', 'Humas & Kerjasama - Fakultas Teknik UNIMA')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Humas & Kerjasama</h1>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            Fakultas Teknik UNIMA menjalin kerjasama dengan berbagai instansi dan lembaga untuk meningkatkan kualitas pendidikan, penelitian, dan pengabdian kepada masyarakat.
        </p>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Filter Mitra Kerjasama</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="kategoriFilter" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                <select id="kategoriFilter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="semua">Semua Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori }}">{{ $kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="jurusanFilter" class="block text-sm font-medium text-gray-700 mb-2">Jurusan</label>
                <select id="jurusanFilter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="semua">Semua Jurusan</option>
                    @foreach($jurusans as $jurusan)
                        @if($jurusan !== 'Semua Jurusan')
                            <option value="{{ $jurusan }}">{{ $jurusan }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label for="statusFilter" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="statusFilter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="semua">Semua Status</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="searchFilter" class="block text-sm font-medium text-gray-700 mb-2">Cari</label>
                <input type="text" id="searchFilter" placeholder="Cari mitra..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-blue-500 text-white rounded-lg p-6 text-center">
            <div class="text-3xl font-bold mb-2">{{ $mitraKerjasamas->count() }}</div>
            <div class="text-sm">Total Mitra</div>
        </div>
        <div class="bg-green-500 text-white rounded-lg p-6 text-center">
            <div class="text-3xl font-bold mb-2">{{ $mitraKerjasamas->where('kategori', 'Perusahaan')->count() }}</div>
            <div class="text-sm">Perusahaan</div>
        </div>
        <div class="bg-purple-500 text-white rounded-lg p-6 text-center">
            <div class="text-3xl font-bold mb-2">{{ $mitraKerjasamas->where('kategori', 'Universitas')->count() }}</div>
            <div class="text-sm">Universitas</div>
        </div>
        <div class="bg-orange-500 text-white rounded-lg p-6 text-center">
            <div class="text-3xl font-bold mb-2">{{ $mitraKerjasamas->where('kategori', 'Pemerintah')->count() }}</div>
            <div class="text-sm">Pemerintah</div>
        </div>
    </div>

    <!-- Mitra Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Daftar Mitra Kerjasama</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" id="mitraTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Logo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Instansi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bentuk Kerjasama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontak</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($mitraKerjasamas as $mitra)
                    <tr class="mitra-row hover:bg-gray-50" 
                        data-kategori="{{ $mitra->kategori }}"
                        data-jurusan="{{ $mitra->jurusan }}"
                        data-status="{{ $mitra->status }}"
                        data-nama="{{ strtolower($mitra->nama_instansi) }}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex-shrink-0 h-12 w-12">
                                @if($mitra->logo)
                                    <img class="h-12 w-12 rounded-full object-cover lazy-image" 
                                         data-src="{{ asset('storage/' . $mitra->logo) }}" 
                                         alt="{{ $mitra->nama_instansi }}"
                                         loading="lazy">
                                @else
                                    <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500 font-semibold text-sm">{{ substr($mitra->nama_instansi, 0, 2) }}</span>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $mitra->nama_instansi }}</div>
                            @if($mitra->deskripsi)
                                <div class="text-sm text-gray-500 mt-1">{{ Str::limit($mitra->deskripsi, 100) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                @if($mitra->kategori == 'Perusahaan') bg-blue-100 text-blue-800
                                @elseif($mitra->kategori == 'Universitas') bg-green-100 text-green-800
                                @elseif($mitra->kategori == 'Pemerintah') bg-purple-100 text-purple-800
                                @elseif($mitra->kategori == 'Lembaga Penelitian') bg-orange-100 text-orange-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ $mitra->kategori }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                @if($mitra->jurusan == 'Teknik Informatika') bg-blue-100 text-blue-800
                                @elseif($mitra->jurusan == 'Teknik Sipil') bg-green-100 text-green-800
                                @elseif($mitra->jurusan == 'Teknik Elektro') bg-yellow-100 text-yellow-800
                                @elseif($mitra->jurusan == 'Teknik Mesin') bg-red-100 text-red-800
                                @elseif($mitra->jurusan == 'Arsitektur') bg-purple-100 text-purple-800
                                @elseif($mitra->jurusan == 'Teknik Bangunan') bg-indigo-100 text-indigo-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ $mitra->jurusan }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ Str::limit($mitra->bentuk_kerjasama, 80) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                @if($mitra->status == 'aktif') bg-green-100 text-green-800
                                @elseif($mitra->status == 'nonaktif') bg-red-100 text-red-800
                                @else bg-yellow-100 text-yellow-800
                                @endif">
                                {{ ucfirst($mitra->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                @if($mitra->website)
                                    <a href="{{ $mitra->website }}" target="_blank" class="text-blue-600 hover:text-blue-800 block">Website</a>
                                @endif
                                @if($mitra->email)
                                    <a href="mailto:{{ $mitra->email }}" class="text-blue-600 hover:text-blue-800 block">{{ $mitra->email }}</a>
                                @endif
                                @if($mitra->telepon)
                                    <span class="text-gray-600">{{ $mitra->telepon }}</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada data mitra kerjasama yang ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="mt-8 bg-blue-50 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-blue-800 mb-3">Informasi Kerjasama</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium text-blue-700 mb-2">Bentuk Kerjasama yang Tersedia:</h4>
                <ul class="text-sm text-blue-600 space-y-1">
                    <li>• Program Magang dan Praktik Kerja</li>
                    <li>• Penelitian Bersama</li>
                    <li>• Pengembangan SDM</li>
                    <li>• Kuliah Tamu dan Seminar</li>
                    <li>• Beasiswa dan Program Khusus</li>
                    <li>• Konsultasi dan Pelatihan</li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium text-blue-700 mb-2">Keuntungan Kerjasama:</h4>
                <ul class="text-sm text-blue-600 space-y-1">
                    <li>• Akses ke sumber daya dan teknologi terkini</li>
                    <li>• Pengalaman praktis di dunia kerja</li>
                    <li>• Jaringan profesional yang luas</li>
                    <li>• Peluang karir yang lebih baik</li>
                    <li>• Pengembangan kompetensi yang relevan</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
// Optimized JavaScript with debouncing
document.addEventListener('DOMContentLoaded', function() {
    const kategoriFilter = document.getElementById('kategoriFilter');
    const jurusanFilter = document.getElementById('jurusanFilter');
    const statusFilter = document.getElementById('statusFilter');
    const searchFilter = document.getElementById('searchFilter');
    const mitraRows = document.querySelectorAll('.mitra-row');

    // Debug: Log filter elements
    console.log('Filter elements found:', {
        kategori: kategoriFilter,
        jurusan: jurusanFilter,
        status: statusFilter,
        search: searchFilter,
        rows: mitraRows.length
    });

    // Debounce function untuk optimasi performa
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Optimized filter function
    const filterMitra = debounce(function() {
        const kategori = kategoriFilter.value;
        const jurusan = jurusanFilter.value;
        const status = statusFilter.value;
        const search = searchFilter.value.toLowerCase();

        console.log('Filtering with:', { kategori, jurusan, status, search });

        let visibleCount = 0;

        mitraRows.forEach((row, index) => {
            // Gunakan data attributes yang sudah ada
            const namaInstansi = row.dataset.nama || '';
            const kategoriText = row.dataset.kategori || '';
            const jurusanText = row.dataset.jurusan || '';
            const statusText = row.dataset.status || '';

            const matchKategori = kategori === 'semua' || kategoriText === kategori;
            const matchJurusan = jurusan === 'semua' || jurusanText === jurusan;
            const matchStatus = status === 'semua' || statusText === status;
            const matchSearch = search === '' || namaInstansi.includes(search);

            if (matchKategori && matchJurusan && matchStatus && matchSearch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        console.log('Visible count:', visibleCount);

        // Update statistics
        updateStatistics(visibleCount);
    }, 150); // 150ms debounce

    function updateStatistics(visibleCount) {
        const statsElements = document.querySelectorAll('.bg-blue-500 .text-3xl, .bg-green-500 .text-3xl, .bg-purple-500 .text-3xl, .bg-orange-500 .text-3xl');
        if (statsElements.length >= 4) {
            statsElements[0].textContent = visibleCount;
            
            // Recalculate based on visible rows
            const visibleRows = document.querySelectorAll('.mitra-row:not([style*="display: none"])');
            const perusahaanCount = Array.from(visibleRows).filter(row => 
                row.dataset.kategori === 'Perusahaan'
            ).length;
            
            const universitasCount = Array.from(visibleRows).filter(row => 
                row.dataset.kategori === 'Universitas'
            ).length;
            
            const pemerintahCount = Array.from(visibleRows).filter(row => 
                row.dataset.kategori === 'Pemerintah'
            ).length;

            statsElements[1].textContent = perusahaanCount;
            statsElements[2].textContent = universitasCount;
            statsElements[3].textContent = pemerintahCount;
        }
    }

    // Event listeners dengan debouncing
    kategoriFilter.addEventListener('change', filterMitra);
    jurusanFilter.addEventListener('change', filterMitra);
    statusFilter.addEventListener('change', filterMitra);
    searchFilter.addEventListener('input', filterMitra);

    // Lazy loading untuk gambar
    const lazyImages = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('loaded');
                img.removeAttribute('data-src');
                observer.unobserve(img);
            }
        });
    });
    
    lazyImages.forEach(img => imageObserver.observe(img));
});
</script>
@endsection 