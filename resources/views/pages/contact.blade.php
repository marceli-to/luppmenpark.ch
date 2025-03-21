@extends('app')
@section('seo_title', 'Kontakt | Alterswohnen Luppmenpark')
@section('seo_description', 'Entdecken Sie idyllisches Wohnen im denkmalgeschützten Luppmenpark mit 39 barrierefreien Wohneinheiten. Die Überbauung im Weilerstil bietet einen gemeinschaftlichen Lindenhof, vielfältige Wohnungsgrößen und integrierte Spitex-Dienste.')
@section('content')
<x-media.picture 
  :image="'luppmenpark-dorfplatz'" 
  :alt="''"
  :sizes="['md', 'lg', 'xl']"
  class="md:aspect-[16/9] xl:aspect-[16/7]" />
<x-layout.section>

  <x-layout.inner>
    <x-icons.leafes.orange class="hidden lg:block w-32 h-23 absolute top-20 right-0" />
    <x-icons.leafes.green class="hidden lg:block w-20 h-37 absolute top-140 right-0" />
    <div>
      <h1 class="text-sandstone">Kontakt</h1>
      <x-layout.article>
        <h2>Das Immobilienprojekt</h2>
        <p>Haben Sie Interesse das Bauvorhaben finanziell zu unterstützen? Oder möchten Sie mehr darüber erfahren?</p>
        <p>Kontaktieren Sie uns für zusätzliche Informationen. Auf Wunsch präsentieren wir Ihnen die Möglichkeiten und das Projekt persönlich.</p>
      </x-layout.article>
    </div>
  </x-layout.inner>
</x-layout.section>
<x-layout.section class="bg-ivory">
  <x-layout.inner>
    <x-icons.leafes.medium-green class="hidden lg:block w-34 h-19 absolute top-20 -right-10" />
    <x-icons.leafes.light-green class="hidden lg:block w-20 h-37 absolute top-[200px] -right-10" />
    <x-icons.leafes.dark-green class="hidden lg:block w-28 h-27 absolute top-[540px] right-0" />
    <div x-data="{ selectedForm: 'general' }" class="max-w-3xl">
      <h1 class="text-charcoal">Kontaktformular</h1>
      <x-layout.span class="relative sm:col-span-full">
        <x-form.select name="form_type" class="w-full" x-model="selectedForm">
          <option value="general">Allgemein</option>
          <option value="member">Mitglied</option>
          <option value="investor">Investor</option>
        </x-form.select>
      </x-layout.span>
      <div x-show="selectedForm === 'general'">
        @livewire('contact-general')
      </div>
      <div x-show="selectedForm === 'member'">
        @livewire('contact-member')
      </div>
      <div x-show="selectedForm === 'investor'">
        @livewire('contact-investor')
      </div>
    </div>
  </x-layout.inner>
</x-layout.section>
@endsection