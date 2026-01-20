@extends('app')
@section('seo_title', 'Media | Alterswohnen Luppmenpark')
@section('seo_description', 'Entdecken Sie idyllisches Wohnen im denkmalgeschützten Luppmenpark mit 39 barrierefreien Wohneinheiten. Die Überbauung im Weilerstil bietet einen gemeinschaftlichen Lindenhof, vielfältige Wohnungsgrößen und integrierte Spitex-Dienste.')
@section('content')
<x-layout.section>
  <x-layout.inner>
    <x-icons.leafes.orange class="hidden lg:block w-32 h-23 absolute top-20 right-0" />
    <x-icons.leafes.green class="hidden lg:block w-20 h-37 absolute top-140 right-0" />
    <div>
      <h1 class="text-sandstone">Media</h1>
      <x-layout.article>
        <h2>Hittnau INTERN</h2>
        <ul class="flex flex-col space-y-10">
          <li>
            <a href="{{ asset('storage/HittnauINTERN_182.pdf') }}" target="_blank" class="underline hover:no-underline">Hittnau INTERN Nr. 182 (PDF)</a>
          </li>
          <li>
            <a href="{{ asset('storage/HittnauINTERN_183.pdf') }}" target="_blank" class="underline hover:no-underline">Hittnau INTERN Nr. 183 (PDF)</a>
          </li>
          <li>
            <a href="{{ asset('storage/HittnauINTERN_184.pdf') }}" target="_blank" class="underline hover:no-underline">Hittnau INTERN Nr. 184 (PDF)</a>
          </li>
          <li>
            <a href="{{ asset('storage/HittnauINTERN_185.pdf') }}" target="_blank" class="underline hover:no-underline">Hittnau INTERN Nr. 185 (PDF)</a>
          </li>
          <li>
            <a href="{{ asset('storage/HittnauINTERN_186.pdf') }}" target="_blank" class="underline hover:no-underline">Hittnau INTERN Nr. 186 (PDF)</a>
          </li>
          <li>
            <a href="{{ asset('storage/HittnauINTERN_191.pdf') }}" target="_blank" class="underline hover:no-underline">Hittnau INTERN Nr. 191 (PDF)</a>
          </li>
          <li>
            <a href="{{ asset('storage/HittnauINTERN_192.pdf') }}" target="_blank" class="underline hover:no-underline">Hittnau INTERN Nr. 192 (PDF)</a>
          </li>
          <li>
            <a href="{{ asset('storage/HittnauINTERN_193.pdf') }}" target="_blank" class="underline hover:no-underline">Hittnau INTERN Nr. 193 (PDF)</a>
          </li>
          <li>
            <a href="{{ asset('storage/HittnauINTERN_195.pdf') }}" target="_blank" class="underline hover:no-underline">Hittnau INTERN Nr. 195 (PDF)</a>
          </li>
          <li>
            <a href="{{ asset('storage/HittnauINTERN_196.pdf') }}" target="_blank" class="underline hover:no-underline">Hittnau INTERN Nr. 196 (PDF)</a>
          </li>
          <li>
            <a href="{{ asset('storage/HittnauINTERN_197.pdf') }}" target="_blank" class="underline hover:no-underline">Hittnau INTERN Nr. 197 (PDF)</a>
          </li>
        </ul>
      </x-layout.article>
    </div>
  </x-layout.inner>
</x-layout.section>
@endsection
