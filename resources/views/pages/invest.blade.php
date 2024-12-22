@extends('app')
@section('seo_title', 'Investition | Alterswohnen Luppmenpark')
@section('seo_description', 'Entdecken Sie idyllisches Wohnen im denkmalgeschützten Luppmenpark mit 39 barrierefreien Wohneinheiten. Die Überbauung im Weilerstil bietet einen gemeinschaftlichen Lindenhof, vielfältige Wohnungsgrößen und integrierte Spitex-Dienste.')
@section('content')
<x-media.picture 
  :image="'luppmenpark-bach'" 
  :alt="''"
  :sizes="['md', 'lg', 'xl']"
  class="md:aspect-[16/9] xl:aspect-[16/7]" />
<x-layout.section>
  <x-layout.inner>
    <div>
      <h1 class="text-sandstone">Nachhaltige Investition</h1>
      <x-layout.article class="mb-20 lg:mb-30">
        <p><strong>Sie möchten das Bauprojekt in Hittnau ZH der Genossenschaft Alterswohnen Luppmenpark (GAL) finanziell unterstützen? Dann sind Sie herzlich willkommen. Dabei haben Sie die Möglichkeit, Anteilscheinkapital zu zeichnen und/oder ein Darlehen zur Verfügung zu stellen.</strong></p>
        <h2>Projektfinanzierung</h2>
        <p>Das Immobilienprojekt wird nachhaltig finanziert. Dabei setzt die GAL auf eine diversifizierte Fälligkeits- und Gläubigerstruktur.</p>
        <table class="my-20">
          <tr>
            <td class="pr-15">Genossenschaftskapital</td>
            <td class="pr-15">CHF</td>
            <td class="text-right">3’200’000</td>
          <tr>
          <tr>
            <td class="pr-15">Baufinanzierung</td>
            <td class="pr-15">CHF</td>
            <td class="text-right">17’400’000</td>
          <tr>
          <tr>
            <td class="pr-15">Darlehen Gemeinde</td>
            <td class="pr-15">CHF</td>
            <td class="text-right">2’300’000</td>
          <tr>
          <tr>
            <td class="pr-15 pb-3">Weitere Darlehen</td>
            <td class="pr-15 pb-3">CHF</td>
            <td class="text-right pb-3">1’700’000</td>
          </tr>
          <tr class="font-barow-bold font-bold border-t-2 border-sandstone">
            <td class="pr-15 pt-3">Anlagekosten</td>
            <td class="pr-15 pt-3">CHF</td>
            <td class="text-right pt-3">24’600’000</td>
          </tr>
        </table>
      </x-layout.article>
      <x-layout.article class="mb-20 lg:mb-30">
        <h2>Risikobeurteilung</h2>
        <p>Ihre Geldanlage ist frei von Spekulation. Die GAL beabsichtigt, die Immobilie zu behalten und den Bewohnenden ein sicheres und nachhaltiges Zuhause zu geben.</p>
      </x-layout.article>
      <x-layout.article class="mb-20 lg:mb-30">
        <h2>Gut zu wissen</h2>
        <p>Vorsondierungen bei verschiedenen Banken haben gezeigt, dass die Baufinanzierung auf vorerwähnter Finanzierungsbasis realisierbar ist.<br>Ferner halten wir fest, dass die Gemeinde Hittnau ein langlaufendes Darlehen von CHF 2’300’000 zur Verfügung stellt und damit zeigt, dass sie hinter dem GAL- Projekt steht.</p>
      </x-layout.article>
      <div>
        <h2>So legen Sie an</h2>
        <div>
          <div></div>
          <div></div>
        </div>
      </div>
    </div>
  </x-layout.inner>
</x-layout.section>
@endsection