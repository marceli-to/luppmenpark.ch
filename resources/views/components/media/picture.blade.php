@props([
  'image', 
  'alt' => '', 
  'width' => '1050', 
  'height' => '1600',
  'format' => '.jpg', 
  'lazy' => true])
<picture class="w-full">
  <source media="(min-width: 1280px)" srcset="/media/img/{{ $image }}-xl.avif" type="image/avif" />
  <source media="(min-width: 1280px)" srcset="/media/img/{{ $image }}-xl{{ $format }}">
  <source media="(min-width: 1024px)" srcset="/media/img/{{ $image }}-lg.avif" type="image/avif" />
  <source media="(min-width: 1024px)" srcset="/media/img/{{ $image }}-lg{{ $format }}">
  <source media="(min-width: 768px)" srcset="/media/img/{{ $image }}-md.avif" type="image/avif" />
  <source media="(min-width: 768px)" srcset="/media/img/{{ $image }}-md{{ $format }}">
  <source srcset="/media/img/{{ $image }}-sm.avif" type="image/avif" />
  <img 
    src="/media/img/{{ $image }}-sm{{ $format }}" 
    alt="{{ $alt }}" 
    title="{{ $alt }}" 
    height="1600" 
    width="1050"
    @if ($lazy)
    loading="lazy"
    @endif
    {{ $attributes->merge(['class' => 'block w-full object-cover']) }}>
</picture>