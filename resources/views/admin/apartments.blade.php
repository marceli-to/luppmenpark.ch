@extends('admin.layout')
@section('title', 'Wohnungen')
@section('subtitle', 'Wohnungen – Status und Preise')
@section('content')

@php
  $dots = ['free' => 'bg-emerald', 'reserved' => 'bg-sandstone', 'rented' => 'bg-charcoal/40'];
  // Header and rows share the same column definition.
  $grid = 'md:grid md:grid-cols-[5rem_4rem_4.5rem_4.5rem_8rem_8rem_10rem_1fr] md:items-center md:gap-x-15';
@endphp

@if ($apartments->isEmpty())

  <p>Es sind keine Wohnungen erfasst. Anlegen mit <code>php artisan apartments:seed</code>.</p>

@else

  <form method="POST" action="{{ route('admin.apartments.update') }}">
    @csrf
    @method('PUT')

    @if ($errors->any())
      <p class="!mb-20 bg-red-50 px-15 py-10 text-sm text-red-700">
        Die Eingaben konnten nicht gespeichert werden. Bitte prüfen Sie die markierten Felder.
      </p>
    @endif

    @foreach ($apartments as $house => $group)
      <h2 class="mt-30 first:mt-0 mb-10 text-sandstone uppercase">{{ config("apartments.houses.$house.label", $house) }}</h2>

      {{-- Column headers from md; below, the apartments stack as cards. --}}
      <div class="{{ $grid }} hidden bg-ivory px-15 py-8 text-sm font-barlow-bold font-bold">
        <span>Nr.</span>
        <span>Etage</span>
        <span>Zimmer</span>
        <span class="text-right">m²</span>
        <span>Mietzins/Mt.</span>
        <span>Wohnanteil</span>
        <span>Status</span>
        <span class="text-right">Plan</span>
      </div>

      <div class="border-t border-charcoal md:border-t-0">
        @foreach ($group as $apartment)
          @php
            $name = "apartments[{$apartment->id}]";
            $field = "apartments.{$apartment->id}";
          @endphp
          <div class="{{ $grid }} border-b border-charcoal/30 px-15 py-10">

            <span class="flex items-center gap-x-8 font-barlow-bold font-bold">
              <span class="inline-block h-9 w-9 shrink-0 rounded-full {{ $dots[$apartment->status] ?? '' }}"></span>
              {{ $apartment->number }}
            </span>

            <span class="text-sm"><span class="md:hidden opacity-70">Etage: </span>{{ $apartment->floor }}</span>
            <span class="text-sm"><span class="md:hidden opacity-70">Zimmer: </span>{{ $apartment->rooms }}</span>
            <span class="text-sm md:text-right"><span class="md:hidden opacity-70">Fläche: </span>{{ $apartment->areaLabel() }} m²</span>

            <label class="mt-8 block md:mt-0">
              <span class="mb-3 block text-xs opacity-70 md:hidden">Mietzins/Mt. (CHF)</span>
              <input
                type="number" inputmode="numeric" min="0" step="1"
                name="{{ $name }}[rent]"
                value="{{ old("$field.rent", $apartment->rent) }}"
                placeholder="auf Anfrage"
                class="h-40 w-full border px-8 text-sm @error("$field.rent") border-red-700 @else border-charcoal @enderror">
            </label>

            <label class="mt-8 block md:mt-0">
              <span class="mb-3 block text-xs opacity-70 md:hidden">Wohnanteil (CHF)</span>
              <input
                type="number" inputmode="numeric" min="0" step="1"
                name="{{ $name }}[share]"
                value="{{ old("$field.share", $apartment->share) }}"
                placeholder="auf Anfrage"
                class="h-40 w-full border px-8 text-sm @error("$field.share") border-red-700 @else border-charcoal @enderror">
            </label>

            <label class="mt-8 block md:mt-0">
              <span class="mb-3 block text-xs opacity-70 md:hidden">Status</span>
              <select name="{{ $name }}[status]" class="h-40 w-full cursor-pointer border border-charcoal bg-white px-8 text-sm">
                @foreach ($states as $value => $label)
                  <option value="{{ $value }}" @selected(old("$field.status", $apartment->status) === $value)>{{ $label }}</option>
                @endforeach
              </select>
            </label>

            <span class="mt-10 block text-sm md:mt-0 md:text-right">
              @if ($plan = $apartment->planUrl())
                <a href="{{ $plan }}" target="_blank" class="underline hover:no-underline">Grundriss</a>
              @else
                <span class="opacity-40" title="public/downloads/grundrisse/{{ $apartment->number }}.pdf fehlt">–</span>
              @endif
            </span>

            @if ($apartment->updated_by)
              <span class="col-span-full mt-5 block text-xs opacity-50">
                Zuletzt geändert von {{ $apartment->updated_by }} am {{ $apartment->updated_at->format('d.m.Y, H:i') }} Uhr
              </span>
            @endif

          </div>
        @endforeach
      </div>
    @endforeach

    <div class="sticky bottom-0 mt-25 flex flex-wrap items-center gap-x-20 gap-y-10 bg-white py-15 border-t border-charcoal">
      <button type="submit" class="h-46 bg-sandstone hover:bg-emerald text-white transition-colors rounded-sm px-25 font-barlow-bold font-bold uppercase">
        Speichern
      </button>
      <p class="!mb-0 text-sm opacity-70">
        Änderungen erscheinen sofort auf der Seite <a href="{{ route('page.apartments') }}" target="_blank" class="underline">Wohnungen</a>. Leerer Mietzins = «auf Anfrage».
      </p>
    </div>

  </form>

@endif

@endsection
