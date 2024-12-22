@props(['route', 'title' => ''])
<li>
  <a 
    href="{{ route($route) }}" 
    title="{{ $title }}"
    {{ $attributes->merge(['class' => 'uppercase']) }}>
    {{ $title }}
  </a>
</li>