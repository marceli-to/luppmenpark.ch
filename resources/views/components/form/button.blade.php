@props(['type' => 'submit'])
<button type="{{ $type }}" {{ $attributes->merge(['class' => 'bg-terracotta hover:bg-teal text-white rounded-sm font-poppins-medium text-md md:text-lg font-medium flex uppercase py-5 px-15 transition-all']) }}>
  {{ $slot}}
</button>