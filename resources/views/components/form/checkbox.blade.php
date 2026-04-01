@props(['id' => '', 'name', 'value' => null, 'class' => ''])
<input
  type="checkbox"
  @if(!$attributes->whereStartsWith('wire:model')->first())
  wire:model="{{ $name }}"
  @endif
  name="{{ $name }}"
  id="{{ $id }}"
  @if($value)
  value="{{ $value }}"
  @endif
  {{ $attributes->whereStartsWith('wire:model') }}
  class="appearance-none rounded-sm w-14 h-14 lg:w-15 lg:h-15 ring-0 focus:ring-0 !ring-offset-0 !outline-none !border-none text-sandstone bg-white accent-sandstone {{ $class }}">