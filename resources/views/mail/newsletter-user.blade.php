<x-mail::message>
  <div class="text-base pb-base">
    Guten Tag<br><br>Vielen Dank für Ihre Newsletter-Anmeldung. Wir werden Sie informieren, sobald die Vermietung startet.
  </div>
  <br>
  <div class="text-base pb-base">
    <strong>Ihre Angaben:</strong>
  </div>
  <div class="text-base pb-base">
    <strong>Interesse</strong><br>
    {{ $data->interest }}
  </div>
  <div class="text-base pb-base">
    <strong>Vorname</strong><br>
    {{ $data->firstname }}
  </div>
  <div class="text-base pb-base">
    <strong>Name</strong><br>
    {{ $data->name }}
  </div>
  <div class="text-base pb-base">
    <strong>Adresse</strong><br>
    {{ $data->address ?? '–' }}
  </div>
  <div class="text-base pb-base">
    <strong>PLZ/Ort</strong><br>
    {{ $data->location ?? '–' }}
  </div>
  <div class="text-base pb-base">
    <strong>E-Mail</strong><br>
    {{ $data->email }}
  </div>
  <div class="text-base pb-base">
    <strong>Telefon</strong><br>
    {{ $data->phone ?? '–' }}
  </div>
  <div class="text-base pb-base">
    <strong>Geburtsdatum</strong><br>
    {{ $data->date_of_birth ? $data->date_of_birth->format('d.m.Y') : '–' }}
  </div>
  <div class="text-base pb-base">
    <strong>Anzahl Personen im Haushalt</strong><br>
    {{ $data->household_count }}
  </div>
  <div class="text-base pb-base">
    <strong>Bereits Genossenschaftler, seit?</strong><br>
    {{ $data->cooperative_member }}
  </div>
</x-mail::message>
