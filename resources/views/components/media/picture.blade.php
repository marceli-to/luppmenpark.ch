@props([
  'image', 
  'alt' => '', 
  'width' => '1050', 
  'height' => '1600',
  'extension' => '.jpg', 
  'sizes' => [],
  'lazy' => true])
<picture class="w-full">
  @if (in_array('xl', $sizes))
    <source media="(min-width: 1280px)" srcset="/media/img/{{ $image }}-xl.avif" type="image/avif" />
    <source media="(min-width: 1280px)" srcset="/media/img/{{ $image }}-xl{{ $extension }}">
  @endif
  @if (in_array('lg', $sizes))
    <source media="(min-width: 1024px)" srcset="/media/img/{{ $image }}-lg.avif" type="image/avif" />
    <source media="(min-width: 1024px)" srcset="/media/img/{{ $image }}-lg{{ $extension }}">
  @endif
  @if (in_array('md', $sizes))
    <source media="(min-width: 768px)" srcset="/media/img/{{ $image }}-md.avif" type="image/avif" />
    <source media="(min-width: 768px)" srcset="/media/img/{{ $image }}-md{{ $extension }}">
  @endif
  <source srcset="/media/img/{{ $image }}.avif" type="image/avif" />
  <img 
    src="/media/img/{{ $image }}{{ $extension }}" 
    alt="{{ $alt }}" 
    title="{{ $alt }}" 
    height="{{ $width}}" 
    width="{{ $height }}"
    @if ($lazy) loading="lazy"@endif
    {{ $attributes->merge(['class' => 'block w-full object-cover']) }}>
</picture>