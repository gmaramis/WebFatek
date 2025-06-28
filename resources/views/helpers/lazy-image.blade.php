@props(['src', 'alt', 'class' => '', 'width' => null, 'height' => null])

<img 
    data-src="{{ asset($src) }}" 
    alt="{{ $alt }}"
    class="lazy-image {{ $class }}"
    @if($width) width="{{ $width }}" @endif
    @if($height) height="{{ $height }}" @endif
    loading="lazy"
> 