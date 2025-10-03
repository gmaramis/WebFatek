@php
    use Illuminate\Support\Str;

    // helper highlight sama persis seperti di parent
    $hl = function (string $text, string $q) {
        $plain = Str::limit(strip_tags($text), 180);
        return preg_replace(
            '/(' . preg_quote($q, '/') . ')/i',
            '<mark class="bg-yellow-200 rounded px-1">$1</mark>',
            e($plain)
        );
    };
@endphp

@if(collect($items)->isEmpty())
  @include('search._empty')
@else
  <div class="grid md:grid-cols-2 gap-5">
    @foreach($items as $item)
      <a href="{{ $item['url'] }}"
         class="block bg-white rounded-xl border border-gray-100 hover:shadow-lg transition group">
        <div class="p-5">
          <div class="flex items-center justify-between mb-2">
            <span class="inline-flex items-center gap-2 text-xs font-bold px-2 py-1 rounded-full
                          bg-secondary-100 text-secondary">
              <i class="fas {{ $item['icon'] }}"></i> {{ $item['badge'] }}
            </span>
            @if(!empty($item['date']))
              <span class="text-xs text-gray-500">
                <i class="far fa-calendar"></i> {{ $item['date'] }}
              </span>
            @endif
          </div>

          <h3 class="text-lg md:text-xl font-semibold text-secondary group-hover:text-primary transition">
            {{ $item['title'] }}
          </h3>

          <p class="mt-2 text-gray-600 text-sm leading-relaxed">
            {!! $hl($item['text'] ?? '', $q) !!}
          </p>

          <div class="mt-3 text-primary font-semibold text-sm">Baca selengkapnya →</div>
        </div>
      </a>
    @endforeach
  </div>
@endif
