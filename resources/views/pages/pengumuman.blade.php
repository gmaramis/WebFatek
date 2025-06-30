@extends("master")

@section("title", "Pengumuman - Fakultas Teknik UNIMA")

@section("content")
<main class="container mx-auto py-16 px-4 min-h-[40vh]">
    <div class="text-center mb-12">
        <h2 class="text-2xl md:text-3xl font-bold text-orange-800 mb-4">Pengumuman</h2>
        <p class="text-center text-orange-900 max-w-2xl mx-auto">Informasi terbaru dan pengumuman penting dari Fakultas Teknik Universitas Negeri Manado.</p>
    </div>

    <div class="max-w-6xl mx-auto">
        <!-- Filter dan Pencarian -->
        <form method="GET" class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cari Pengumuman</label>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Ketik kata kunci..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="kategori" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoriList as $kategori)
                            <option value="{{ $kategori }}" @if(request('kategori') == $kategori) selected @endif>{{ ucfirst($kategori) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Urutkan</label>
                    <select name="sort" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option value="latest" @if(request('sort')=='latest') selected @endif>Terbaru</option>
                        <option value="oldest" @if(request('sort')=='oldest') selected @endif>Terlama</option>
                        <option value="title" @if(request('sort')=='title') selected @endif>Judul A-Z</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 text-right">
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded hover:bg-accent transition">Terapkan</button>
            </div>
        </form>

        <!-- Daftar Pengumuman -->
        <div class="space-y-6">
            @forelse($pengumumans as $pengumuman)
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ ucfirst($pengumuman->kategori) }}</span>
                        <span class="text-sm text-gray-500">{{ $pengumuman->tanggal_posting->diffForHumans() }}</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-orange-800 mb-3">
                    <a href="{{ route('pengumuman.detail', $pengumuman->id) }}" class="hover:text-orange-600 transition-colors">
                        {{ $pengumuman->judul }}
                    </a>
                </h3>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    {!! Str::limit(strip_tags($pengumuman->isi), 200) !!}
                </p>
                @if($pengumuman->file_lampiran)
                    <a href="{{ asset('storage/' . $pengumuman->file_lampiran) }}" target="_blank" class="inline-flex items-center text-primary hover:text-accent font-semibold"><i class="fas fa-paperclip mr-2"></i>Lampiran</a>
                @endif
            </div>
            @empty
            <div class="text-center text-gray-500 py-12">Belum ada pengumuman.</div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $pengumumans->links() }}
        </div>
    </div>
</main>
@endsection
