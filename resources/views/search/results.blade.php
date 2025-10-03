@extends('master')
@section('title','Hasil Pencarian')

@section('content')
@php
    use Illuminate\Support\Str;

    // helper highlight sederhana (case-insensitive)
    $hl = function (string $text, string $q) {
        $plain = Str::limit(strip_tags($text), 180);
        return preg_replace('/(' . preg_quote($q, '/') . ')/i', '<mark class="bg-yellow-200 rounded px-1">$1</mark>', e($plain));
    };
@endphp
{{-- Panel ringkasan algoritma BM25 --}}
<div class="my-6">
    <details class="group rounded-lg border border-orange-200 bg-white shadow-sm open:shadow-md">
      <summary class="cursor-pointer select-none px-4 py-3 flex items-center justify-between">
        <div class="font-semibold text-secondary">
          Tentang peringkat hasil (BM25)
        </div>
        <span class="text-sm text-gray-500 group-open:hidden">klik untuk lihat</span>
        <span class="text-sm text-gray-500 hidden group-open:inline">klik untuk tutup</span>
      </summary>

      <div class="px-4 pb-4 pt-2 text-sm leading-relaxed text-gray-700 space-y-3">
        <p>
          Mesin pencari ini menggunakan <b>BM25</b> (Best Match 25) untuk memberi skor relevansi
          antara <i>query</i> dan dokumen. Intinya, kata yang sering muncul di dokumen,
          jarang muncul di koleksi, dan cocok dengan panjang dokumen yang pas — akan dapat skor lebih tinggi.
        </p>

        <div class="rounded-md bg-gray-50 border border-gray-200 p-3 overflow-x-auto">
          <div class="text-xs text-gray-600 mb-1">Rumus BM25:</div>
          <p class="mathjax">
            \[
            \text{score}(d,q)=\sum_{t \in q} \mathrm{IDF}(t)\;
            \frac{ f(t,d)\,(k_1+1) }{ f(t,d) + k_1\!\left(1-b + b\,\frac{|d|}{\mathrm{avgdl}}\right) }
            \]
          </p>
          <p class="mathjax">
            \[
            \mathrm{IDF}(t)=\ln\!\left( \frac{N - n_t + 0.5}{n_t + 0.5} + 1 \right)
            \]
          </p>
        </div>

        <ul class="list-disc pl-5">
          <li><b>f(t,d)</b>: frekuensi term <i>t</i> di dokumen <i>d</i></li>
          <li><b>|d|</b>: panjang dokumen (jumlah kata), <b>avgdl</b>: rata-rata panjang dokumen</li>
          <li><b>N</b>: jumlah semua dokumen, <b>n<sub>t</sub></b>: jumlah dokumen yang memuat term <i>t</i></li>
          <li><b>k<sub>1</sub></b> (≈ 1.2–2.0) mengatur pengaruh frekuensi kata; <b>b</b> (≈ 0.75) menormalkan panjang dokumen</li>
        </ul>

        <p class="text-gray-600">
          Praktiknya, hasil dengan kecocokan kata kunci lebih banyak, kata kunci yang lebih “langka”,
          dan panjang artikel yang tidak terlalu pendek/terlalu panjang untuk query — akan muncul lebih tinggi.
        </p>
      </div>
    </details>
  </div>

  {{-- Muat MathJax sekali saja di layout atau di bawah halaman --}}
  @push('scripts')
  <script>
    window.MathJax = { tex: { inlineMath: [['\\(','\\)']], displayMath: [['\\[','\\]']] } };
  </script>
  <script defer src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
  @endpush


<div class="bg-gradient-to-r from-secondary-50 to-white border-b">
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl md:text-3xl font-bold text-secondary mb-2">
      Hasil untuk: “{{ e($q) }}”
    </h1>
    <p class="text-sm text-gray-600">
      {{ $berita->count() + $pengumuman->count() + $prodi->count() }} hasil ditemukan
    </p>

    <div class="mt-4">
      <form action="{{ route('search.index') }}" method="GET" class="max-w-xl flex gap-2">
        <input name="q" value="{{ e($q) }}" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary"
               placeholder="Cari lagi…">
        <button class="px-4 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-accent transition">
          Cari
        </button>
      </form>
    </div>
  </div>
</div>

<div class="container mx-auto px-4 py-8" x-data="{ tab: 'all' }">
  {{-- Tabs --}}
  <div class="flex flex-wrap gap-2 mb-6">
    @php
      $tabs = [
        'all'        => ['label' => 'Semua',        'count' => $berita->count()+$pengumuman->count()+$prodi->count()],
        'berita'     => ['label' => 'Berita',       'count' => $berita->count()],
        'pengumuman' => ['label' => 'Pengumuman',   'count' => $pengumuman->count()],
        'prodi'      => ['label' => 'Program Studi','count' => $prodi->count()],
      ];
    @endphp
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @foreach($tabs as $key => $meta)
      <button
        @click="tab='{{ $key }}'"
        :class="tab==='{{ $key }}' ? 'bg-primary text-white' : 'bg-white text-secondary border'"
        class="px-3 py-1.5 rounded-full text-sm font-semibold shadow-sm transition">
        {{ $meta['label'] }}
        <span class="ml-1 inline-flex items-center justify-center text-xs bg-black/10 rounded-full px-2 py-0.5">
          {{ $meta['count'] }}
        </span>
      </button>
    @endforeach
  </div>

  {{-- SEMUA --}}
  <div x-show="tab==='all'" x-cloak>
    @php
      $all = collect()
        ->merge($berita->map(fn($x)=>[
            'type'=>'Berita',
            'title'=>$x->judul,
            'date'=> optional($x->tanggal)->format('d M Y'),
            'badge'=>'BERITA',
            'url'=> url('/berita/'.$x->slug),
            'text'=> $x->isi,
            'icon'=>'fa-newspaper',
        ]))
        ->merge($pengumuman->map(fn($x)=>[
            'type'=>'Pengumuman',
            'title'=>$x->judul,
            'date'=> optional($x->tanggal_posting)->format('d M Y'),
            'badge'=> strtoupper($x->kategori ?? 'PENGUMUMAN'),
            'url'=> route('pengumuman.detail', $x->id),
            'text'=> $x->isi,
            'icon'=>'fa-bullhorn',
        ]))
        ->merge($prodi->map(fn($x)=>[
            'type'=>'Program Studi',
            'title'=>$x->nama,
            'date'=> null,
            'badge'=>'PRODI',
            'url'=> route('jurusan.show', $x->id),
            'text'=> $x->deskripsi ?? '',
            'icon'=>'fa-graduation-cap',
        ]));
    @endphp

    @if($all->isEmpty())
      @include('search._empty')
    @else
      <div class="grid md:grid-cols-2 gap-5">
        @foreach($all as $item)
          <a href="{{ $item['url'] }}"
             class="block bg-white rounded-xl border border-gray-100 hover:shadow-lg transition group">
            <div class="p-5">
              <div class="flex items-center justify-between mb-2">
                <span class="inline-flex items-center gap-2 text-xs font-bold px-2 py-1 rounded-full
                            bg-secondary-100 text-secondary">
                  <i class="fas {{ $item['icon'] }}"></i> {{ $item['badge'] }}
                </span>
                @if($item['date'])
                  <span class="text-xs text-gray-500"><i class="far fa-calendar"></i> {{ $item['date'] }}</span>
                @endif
              </div>
              <h3 class="text-lg md:text-xl font-semibold text-secondary group-hover:text-primary transition">
                {{ $item['title'] }}
              </h3>
              <p class="mt-2 text-gray-600 text-sm leading-relaxed">
                {!! $hl($item['text'], $q) !!}
              </p>
              <div class="mt-3 text-primary font-semibold text-sm">Baca selengkapnya →</div>
            </div>
          </a>
        @endforeach
      </div>
    @endif
  </div>

  {{-- BERITA --}}
  <div x-show="tab==='berita'" x-cloak>
    @include('search._list_cards', [
      'items' => $berita->map(fn($x)=>[
        'title'=>$x->judul,
        'url'=> url('/berita/'.$x->slug),
        'date'=> optional($x->tanggal)->format('d M Y'),
        'badge'=> 'BERITA',
        'icon'=> 'fa-newspaper',
        'text'=> $x->isi,
      ]),
      'q' => $q
    ])
  </div>

  {{-- PENGUMUMAN --}}
  <div x-show="tab==='pengumuman'" x-cloak>
    @include('search._list_cards', [
      'items' => $pengumuman->map(fn($x)=>[
        'title'=>$x->judul,
        'url'=> route('pengumuman.detail', $x->id),
        'date'=> optional($x->tanggal_posting)->format('d M Y'),
        'badge'=> strtoupper($x->kategori ?? 'PENGUMUMAN'),
        'icon'=> 'fa-bullhorn',
        'text'=> $x->isi,
      ]),
      'q' => $q
    ])
  </div>

  {{-- PRODI --}}
  <div x-show="tab==='prodi'" x-cloak>
    @include('search._list_cards', [
      'items' => $prodi->map(fn($x)=>[
        'title'=>$x->nama,
        'url'=> route('jurusan.show', $x->id),
        'date'=> null,
        'badge'=> 'PRODI',
        'icon'=> 'fa-graduation-cap',
        'text'=> $x->deskripsi ?? '',
      ]),
      'q' => $q
    ])
  </div>
</div>
@endsection
