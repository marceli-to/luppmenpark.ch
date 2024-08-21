@props(['type' => 'text', 'placeholder' => '', 'name', 'isWire' => false])
@if ($isWire)
  <input 
    type="{{ $type }}" 
    wire:model="{{ $name }}" 
    placeholder="{{ $placeholder }}" 
    class="bg-white rounded-sm px-10 py-10 w-full ring-0 focus:ring-0 border-none font-barlow-medium text-charcoal placeholder:text-charcoal">
@else
  <input 
    type="{{ $type }}" 
    name="{{ $name }}" 
    placeholder="{{ $placeholder }}" 
    class="bg-white rounded-sm px-10 py-10 w-full ring-0 focus:ring-0 border-none font-barlow-medium text-charcoal placeholder:text-charcoal">
@endif