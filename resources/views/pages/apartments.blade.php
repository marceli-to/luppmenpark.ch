@extends('app')
@section('seo_title', 'Wohnungen | Alterswohnen Luppmenpark')
@section('seo_description', 'Alle Wohnungen im Luppmenpark in Hittnau: 2.5- bis 4.5-Zimmer-Wohnungen, Studios und Atelier in vier Häusern – mit Fläche, Mietzins, Wohnanteil und Verfügbarkeit.')
@section('content')
@php
  $dots = ['free' => 'bg-emerald', 'reserved' => 'bg-sandstone', 'rented' => 'bg-charcoal/40'];
@endphp
<x-layout.section>
  <x-layout.inner>
    <x-icons.leafes.orange class="hidden lg:block w-32 h-23 absolute top-20 right-0" />
    <h1 class="text-sandstone">Wohnungen</h1>
    <x-layout.article>
      {{-- Placeholder: the client's intro text is still to come. --}}
      <p>In vier Häusern mit individuellem Charakter entstehen im Luppmenpark 39 Wohneinheiten: 2.5-, 3.5- und eine 4.5-Zimmer-Wohnung, zwei Studios sowie ein Atelier. Fahren Sie über die Liste, um das jeweilige Haus im Übersichtsplan zu sehen.</p>
    </x-layout.article>
  </x-layout.inner>
</x-layout.section>

<x-layout.section class="!pt-0">
  <x-layout.inner class="2xl:!max-w-7xl">
    <div
      x-data="{ house: null }"
      class="lg:grid lg:grid-cols-12 lg:gap-x-30 xl:gap-x-40">

      {{-- Overview: neutral plan, one highlighted plan per house on top. --}}
      <div class="lg:col-span-4 mb-20 lg:mb-0">
        <div class="relative max-w-[480px] mx-auto lg:sticky lg:top-30">
          <img
            src="/media/img/isometrie/uebersicht.webp"
            alt="Übersichtsplan der vier Häuser im Luppmenpark"
            width="800" height="800"
            class="block w-full h-auto">
          @foreach ($houses as $key => $house)
            <img
              src="/media/img/isometrie/{{ $house['image'] }}.webp"
              alt=""
              width="800" height="800"
              loading="lazy"
              class="absolute inset-0 block w-full h-auto opacity-0 transition-opacity duration-200 pointer-events-none"
              :class="house === '{{ $key }}' && '!opacity-100'">
          @endforeach
          <svg viewBox="0 0 800 800" class="absolute inset-0 w-full h-full" aria-hidden="true">
            @foreach ($houses as $key => $house)
              <a
                href="#haus-{{ $key }}"
                tabindex="-1"
                class="outline-none focus:outline-none"
                x-on:click.prevent="[...document.querySelectorAll('[data-house={{ $key }}]')].find(el => el.offsetParent)?.scrollIntoView({ behavior: 'smooth' })">
                <polygon
                  points="{{ $house['polygon'] }}"
                  fill="transparent"
                  class="cursor-pointer"
                  x-on:mouseenter="house = '{{ $key }}'"
                  x-on:mouseleave="house = null">
                  <title>{{ $house['label'] }}</title>
                </polygon>
              </a>
            @endforeach
          </svg>
        </div>
      </div>

      {{-- Table --}}
      <div class="lg:col-span-8">
        {{-- Mobile: compact list --}}
        <div class="md:hidden">
          @foreach ($houses as $key => $house)
            <div data-house="{{ $key }}" class="scroll-mt-100">
              <h2 class="pt-20 pb-6 !mb-0 text-sm uppercase text-sandstone border-b border-sandstone">{{ $house['label'] }}</h2>
              @foreach ($house['apartments'] as $apartment)
                <div class="flex items-center gap-x-10 py-8 border-b border-sandstone/40 text-sm {{ $apartment->status === 'rented' ? 'text-charcoal/50' : '' }}">
                  <div class="flex-1 min-w-0">
                    <div>
                      <strong>{{ $apartment->number }}</strong> · {{ $apartment->floor }} · {{ is_numeric($apartment->rooms) ? $apartment->rooms . ' Zi.' : $apartment->rooms }} · {{ $apartment->areaLabel() }} m²
                    </div>
                    <div>
                      @if ($apartment->rent)
                        CHF {{ \App\Models\Apartment::money($apartment->rent) }}* · Wohnanteil {{ \App\Models\Apartment::money($apartment->share) ?? 'auf Anfrage' }}*
                      @else
                        Preis auf Anfrage
                      @endif
                      · <span class="inline-block w-6 h-6 mr-3 align-middle -mt-2 rounded-full {{ $dots[$apartment->status] ?? '' }}"></span>{{ $apartment->statusLabel() }}
                      @if ($plan = $apartment->planUrl())
                        · <a href="{{ $plan }}" target="_blank" class="underline">Plan</a>
                      @endif
                    </div>
                  </div>
                  @if ($apartment->isFree())
                    <a
                      href="{{ $applicationForm }}"
                      target="_blank"
                      class="shrink-0 bg-sandstone hover:bg-emerald text-white transition-colors rounded-sm font-barlow-bold font-bold uppercase text-xs px-10 py-4"
                      title="Bewerbungsformular (PDF)">
                      Bewerben
                    </a>
                  @endif
                </div>
              @endforeach
            </div>
          @endforeach
        </div>

        {{-- From md: table --}}
        <div class="hidden md:block">
          <table class="w-full text-sm xl:text-base text-left border-collapse" x-on:mouseleave="house = null">
            <colgroup>
              <col class="w-[11%]"><col class="w-[9%]"><col class="w-[6%]"><col class="w-[8%]">
              <col class="w-[13%]"><col class="w-[13%]"><col class="w-[15%]"><col class="w-[7%]"><col>
            </colgroup>
            <thead>
              <tr class="border-b-2 border-sandstone font-barlow-bold font-bold align-bottom">
                <th class="py-8 pr-10">Nr.</th>
                <th class="py-8 pr-10">Etage</th>
                <th class="py-8 pr-10">Zi.</th>
                <th class="py-8 pr-10 text-right">m²</th>
                <th class="py-8 pr-10 text-right whitespace-nowrap">Mietzins/Mt.*</th>
                <th class="py-8 pr-10 text-right whitespace-nowrap">Wohnanteil*</th>
                <th class="py-8 pl-20 xl:pl-30 pr-10">Status</th>
                <th class="py-8 pr-10 text-center">Plan</th>
                <th class="py-8"><span class="sr-only">Bewerbung</span></th>
              </tr>
            </thead>
            @foreach ($houses as $key => $house)
              <tbody
                id="haus-{{ $key }}"
                data-house="{{ $key }}"
                class="scroll-mt-100">
                <tr x-on:mouseenter="house = null">
                  <th colspan="9" class="pt-20 pb-6 font-barlow-bold font-bold uppercase text-sandstone border-b border-sandstone">
                    {{ $house['label'] }}
                  </th>
                </tr>
                @foreach ($house['apartments'] as $apartment)
                  <tr
                    x-on:mouseenter="house = '{{ $key }}'"
                    class="border-b border-sandstone/40 hover:bg-ivory transition-colors {{ $apartment->status === 'rented' ? 'text-charcoal/50' : '' }}">
                    <td class="py-8 pr-10 whitespace-nowrap">{{ $apartment->number }}</td>
                    <td class="py-8 pr-10 whitespace-nowrap">{{ $apartment->floor }}</td>
                    <td class="py-8 pr-10">{{ $apartment->rooms }}</td>
                    <td class="py-8 pr-10 text-right">{{ $apartment->areaLabel() }}</td>
                    @if ($apartment->rent)
                      <td class="py-8 pr-10 text-right">{{ \App\Models\Apartment::money($apartment->rent) }}</td>
                      <td class="py-8 pr-10 text-right">{{ \App\Models\Apartment::money($apartment->share) ?? 'auf Anfrage' }}</td>
                    @else
                      <td colspan="2" class="py-8 pr-10 text-right">auf Anfrage</td>
                    @endif
                    <td class="py-8 pl-20 xl:pl-30 pr-10 whitespace-nowrap">
                      <span class="inline-block w-7 h-7 mr-5 align-middle -mt-2 rounded-full {{ $dots[$apartment->status] ?? '' }}"></span>{{ $apartment->statusLabel() }}
                    </td>
                    <td class="py-8 pr-10 text-center">
                      @if ($plan = $apartment->planUrl())
                        <a href="{{ $plan }}" target="_blank" class="inline-block text-sandstone hover:text-emerald" title="Grundriss {{ $apartment->number }} (PDF)">
                          <x-icons.download class="w-18 h-18" />
                          <span class="sr-only">Grundriss {{ $apartment->number }} (PDF)</span>
                        </a>
                      @else
                        <span class="text-charcoal/40" title="Grundriss folgt">–</span>
                      @endif
                    </td>
                    <td class="py-6 text-right">
                      @if ($apartment->isFree())
                        <a
                          href="{{ $applicationForm }}"
                          target="_blank"
                          class="inline-block bg-sandstone hover:bg-emerald text-white transition-colors rounded-sm font-barlow-bold font-bold uppercase text-xs xl:text-sm px-10 py-4 whitespace-nowrap"
                          title="Bewerbungsformular (PDF)">
                          Bewerben
                        </a>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            @endforeach
          </table>
        </div>
        <p class="mt-15 lg:mt-20 text-sm">*Mietzins pro Monat exkl. Nebenkosten. Diese Angaben sind provisorisch und stellen einen Richtwert dar. Die definitive Festlegung des Mietzinses und des Wohnanteils erfolgt, wenn die Baukosten bekannt sind. Alle Preise in CHF.</p>
      </div>

    </div>
  </x-layout.inner>
</x-layout.section>
@endsection
