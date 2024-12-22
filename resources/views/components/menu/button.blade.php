<a 
  href="javascript:;" 
  x-on:click="menu = ! menu" {{ $attributes->merge(['class' => 'absolute top-20 right-20 z-20 block text-charcoal w-22 h-19']) }}
  title="Menü anzeigen / verbergen">
  <x-icons.burger data-menu-icon="burger" x-cloak x-show="!menu" />
  <x-icons.cross data-menu-icon="cross" x-cloak x-show="menu" />
</a>