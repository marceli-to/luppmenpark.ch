@extends('admin.layout')
@section('title', 'Wohnungen')
@section('content')

@php
  $dots = ['free' => 'bg-emerald', 'reserved' => 'bg-sandstone', 'rented' => 'bg-charcoal/40'];
  // The dot follows the select without JS: the row checks which option is chosen.
  $liveDot = 'group-has-[option[value=free]:checked]/row:bg-emerald group-has-[option[value=reserved]:checked]/row:bg-sandstone group-has-[option[value=rented]:checked]/row:bg-charcoal/40';
  $field = 'rounded-sm bg-ivory ring-1 ring-transparent focus-within:ring-2 focus-within:ring-sandstone';
@endphp

<h1 class="text-sandstone">Wohnungen</h1>

<div class="mb-25 lg:mb-30">
  <p class="max-w-prose">
    Mietzins, Wohnanteil und Status je Wohnung. Nach dem Speichern erscheinen die Änderungen sofort auf der Seite
    <a href="{{ route('page.apartments') }}" target="_blank" class="underline decoration-1 underline-offset-4 hover:text-sandstone">Wohnungen</a>.
  </p>
</div>

@if ($apartments->isEmpty())

  <p class="rounded-sm bg-ivory px-15 py-12 text-sm">Es sind keine Wohnungen erfasst. Anlegen mit <code>php artisan apartments:seed</code>.</p>

@else

  <form method="POST" action="{{ route('admin.apartments.update') }}">
    @csrf
    @method('PUT')

    @if ($errors->any())
      <p class="!mb-20 rounded-sm bg-red-50 px-15 py-12 text-sm text-red-700" role="alert">
        Die Eingaben konnten nicht gespeichert werden. Bitte prüfen Sie die rot markierten Felder.
      </p>
    @endif

    {{-- Scrolls sideways on small screens; the margins cancel the page padding. --}}
    <div class="-mx-20 -my-8 overflow-x-auto whitespace-nowrap md:-mx-30">
      <div class="inline-block min-w-full px-20 py-8 align-middle md:px-30">
        <table class="w-full border-collapse text-left text-sm">
          <thead>
            <tr class="border-b-2 border-sandstone align-bottom font-barlow-bold font-bold">
              <th class="py-8 pr-15">Nr.</th>
              <th class="py-8 pr-15">Etage</th>
              <th class="py-8 pr-15">Zi.</th>
              <th class="py-8 pr-20 text-right">m²</th>
              <th class="py-8 pr-15">Mietzins/Mt.</th>
              <th class="py-8 pr-15">Wohnanteil</th>
              <th class="py-8 pr-15">Status</th>
              <th class="py-8 pr-15 text-center">Plan</th>
              <th class="py-8 text-right">Zuletzt geändert</th>
            </tr>
          </thead>

          @foreach ($apartments as $house => $group)
            <tbody>
              <tr>
                <th colspan="9" class="border-b border-sandstone pb-6 pt-25 font-barlow-bold text-base font-bold uppercase text-sandstone">
                  {{ config("apartments.houses.$house.label", $house) }}
                </th>
              </tr>

              @foreach ($group as $apartment)
                @php
                  $name = "apartments[{$apartment->id}]";
                  $key = "apartments.{$apartment->id}";
                @endphp
                <tr class="group/row border-b border-sandstone/40 transition-colors hover:bg-ivory/40">
                  <td class="py-8 pr-15 font-barlow-bold font-bold">{{ $apartment->number }}</td>
                  <td class="py-8 pr-15">{{ $apartment->floor }}</td>
                  <td class="py-8 pr-15 tabular-nums">{{ $apartment->rooms }}</td>
                  <td class="py-8 pr-20 text-right tabular-nums">{{ $apartment->areaLabel() }}</td>

                  @foreach (['rent' => 'Mietzins pro Monat', 'share' => 'Wohnanteil'] as $column => $label)
                    <td class="py-6 pr-15">
                      <label class="flex w-140 items-center {{ $field }} @error("$key.$column") !ring-red-700 @enderror" @error("$key.$column") title="{{ $message }}" @enderror>
                        <span class="pl-10 text-xs text-charcoal/60">CHF</span>
                        <input
                          type="number" inputmode="numeric" min="0" step="1"
                          name="{{ $name }}[{{ $column }}]"
                          value="{{ old("$key.$column", $apartment->$column) }}"
                          placeholder="auf Anfrage"
                          aria-label="{{ $label }} {{ $apartment->number }}"
                          class="w-full min-w-0 border-0 bg-transparent px-10 py-8 text-right text-sm tabular-nums text-charcoal placeholder:text-charcoal/50 focus:ring-0 max-sm:text-base [appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none">
                      </label>
                    </td>
                  @endforeach

                  <td class="py-6 pr-15">
                    <div class="flex items-center gap-x-10">
                      <span class="size-9 shrink-0 rounded-full {{ $dots[$apartment->status] ?? '' }} {{ $liveDot }}"></span>
                      <div class="grid w-130 grid-cols-[1fr_2rem] {{ $field }}">
                        <select
                          name="{{ $name }}[status]"
                          aria-label="Status {{ $apartment->number }}"
                          class="col-span-full row-start-1 cursor-pointer appearance-none border-0 bg-transparent bg-none py-8 pl-10 pr-32 text-sm text-charcoal focus:ring-0 max-sm:text-base">
                          @foreach ($states as $value => $label)
                            <option value="{{ $value }}" @selected(old("$key.status", $apartment->status) === $value)>{{ $label }}</option>
                          @endforeach
                        </select>
                        <svg viewBox="0 0 15 10" width="10" height="7" fill="currentColor" aria-hidden="true" class="pointer-events-none col-start-2 row-start-1 place-self-center text-sandstone">
                          <path d="M15 2.615 7.97 9.645.93 2.615 3.05.495l4.92 4.91L12.88.495 15 2.615Z" />
                        </svg>
                      </div>
                    </div>
                  </td>

                  <td class="py-8 pr-15 text-center">
                    @if ($plan = $apartment->planUrl())
                      <a href="{{ $plan }}" target="_blank" class="inline-block text-sandstone hover:text-emerald" title="Grundriss {{ $apartment->number }} (PDF)">
                        <x-icons.download class="size-18" />
                        <span class="sr-only">Grundriss {{ $apartment->number }} (PDF)</span>
                      </a>
                    @else
                      <span class="text-charcoal/40" title="public/downloads/grundrisse/{{ $apartment->number }}.pdf fehlt">–</span>
                    @endif
                  </td>

                  <td class="py-8 text-right text-xs leading-[1.3] text-charcoal/60">
                    @if ($apartment->updated_by)
                      {{ $apartment->updated_at->format('d.m.Y, H:i') }}<br>{{ $apartment->updated_by }}
                    @else
                      –
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          @endforeach
        </table>
      </div>
    </div>

    <div class="sticky bottom-0 z-10 -mx-20 mt-30 flex flex-wrap items-center gap-x-20 gap-y-10 bg-white/95 px-20 py-15 backdrop-blur md:-mx-30 md:px-30">
      <button type="submit" class="rounded-sm bg-sandstone px-25 py-10 font-barlow-bold font-bold uppercase text-white transition-colors hover:bg-emerald">
        Speichern
      </button>
    </div>

  </form>

@endif

@endsection
