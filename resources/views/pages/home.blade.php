@extends('app')
@section('content')
<x-layout.section class="bg-teal text-white">
  <x-layout.inner>
    <div class="max-w-4xl">
      <h1 class="text-white">Liebenauweg Luzern –<br>Ihr Wohntraum im neuen Glanz!</h1>
      <h2 class="text-white">Erstvermietung</h2>
      <p>Bis zum Sommer 2025 entsteht in zentraler Lage im <a href="https://maps.app.goo.gl/NM69DM1a2uipHqis9" target="_blank" title="Auf Googlemaps anzeigen" class="underline hover:no-underline underline-offset-4 decoration-1">Liebenauweg 6/8</a> Luzern ein neues Umbauprojekt. Die stilvollen 2.5- bis 4.5-Zimmerwohnungen eignen sich perfekt für Paare als auch Familien.</p>
      <p><strong class="uppercase">Sind Sie interessiert?</strong><br>Gerne senden wir Ihnen weitere Informationen, sobald die Vermietung startet. Füllen Sie dazu bitte unser Kontaktformular aus und wir halten Sie auf dem Laufenden.</p>
    </div>
  </x-layout.inner>
</x-layout.section>
<x-layout.section class="bg-ivory">
  <x-layout.inner>
    <h1 class="text-teal">Kontaktformular</h1>
    @livewire('create-inquiry')
  </x-layout.inner>
</x-layout.section>
@endsection