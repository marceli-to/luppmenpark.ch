@props(['route', 'title' => ''])
<li>
  <a 
    href="{{ route($route) }}" 
    title="{{ $title }}"
    {{ $attributes->merge(['class' => 'uppercase tracking-wide']) }}>
    {{ $title }}
  </a>
</li>