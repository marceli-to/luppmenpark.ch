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
    <x-icons.leafes.orange class="hidden lg:block w-32 h-23 absolute top-20 right-0" />
    <x-icons.leafes.green class="hidden lg:block w-20 h-37 absolute top-100 right-0" />
    <x-icons.leafes.medium-green class="hidden lg:block w-34 h-19 absolute top-[270px] -right-10" />
    <x-icons.leafes.light-green class="hidden lg:block w-20 h-37 absolute top-[840px] -right-40" />
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
        <x-layout.grid class="sm:gap-20 lg:gap-30 mt-5 md:mt-10 mb-20 lg:mb-30">
          <x-layout.span class="border-2 border-sandstone p-10 lg:p-15">
            <h3 class="font-barow-bold font-bold">Freies Anteilsscheinkapital*</h3>
            <p>«Ich bestimme mit»</p>
            <ul class="mt-15 lg:mt-20 text-pretty">
              <li>Ab CHF 10’000</li>
              <li>Laufzeit: keine</li>
              <li class="text-pretty">Zinssatz: 1.5% (Stand 2.12.2024 und bis auf weiteres gültig)<br>Aktueller Zinssatz auf Anfrage</li>
          </x-layout.span>
          <x-layout.span class="border-2 border-sandstone p-10 lg:p-15">
            <h3 class="font-barow-bold font-bold">Darlehen*</h3>
            <p>«Ich lege bewusst mein Geld an»</p>
            <ul class="mt-15 lg:mt-20 text-pretty">
              <li>Ab CHF 50’000</li>
              <li>Laufzeit: keine; 5 Jahre; 10 Jahre</li>
              <li>Zinssatz: 0.75%; 1.10%; 1.40% (Stand 2.12.2024 und bis auf weiteres gültig)<br>Aktueller Zinssatz auf Anfrage</li>
            </ul>
          </x-layout.span>
        </x-layout.grid>
        <div class="text-sm">* Informativer Charakter, Änderungen vorbehalten.</div>
      </div>
    </div>
  </x-layout.inner>
</x-layout.section>

<x-layout.section class="bg-ivory">
  <x-layout.inner>
    <div>
      <h2>Absichtserklärung</h2>
      <x-layout.article>
        <p>Füllen Sie eine der beiden Absichtserklärungen für ein «Darlehen» oder «Darlehen mit Umwandlung in freies Anteilsscheinkapital nach Bauende» aus und schicken Sie uns diesen per Post oder Mail zu.</p>
        <div class="space-y-15 xs:space-y-0 xs:flex xs:gap-x-15 mt-15 lg:mt-20">
          <a 
            href="/downloads/luppmenpark-absichtserklaerung-darlehen.pdf"
            title="Download Absichtserklärung Darlehen" 
            target="_blank" 
            class="bg-emerald hover:bg-sandstone text-ivory hover:text-white rounded-sm font-barlow-bold font-bold text-md md:text-lg inline-flex uppercase py-5 px-15 transition-all w-auto">
            Darlehen
          </a>
          <a 
            href="/downloads/luppmenpark-absichtserklaerung-freies-anteilsscheinkapital.pdf"
            title="Download Absichtserklärung Freies Anteilsscheinkapital" 
            target="_blank" 
            class="bg-emerald hover:bg-sandstone text-ivory hover:text-white rounded-sm font-barlow-bold font-bold text-md md:text-lg inline-flex uppercase py-5 px-15 transition-all">
            Freies Anteilsscheinkapital
          </a>
        </div>
      </x-layout.article>
    </div>
  </x-layout.inner>
</x-layout.section>

<x-layout.section>
  <x-layout.inner>
    <x-icons.leafes.dark-green class="hidden lg:block w-28 h-27 absolute top-0 -right-50" />
    <div>
      <h2>Interessiert?</h2>
      <x-layout.article>
        <p>Wenn Sie in eine sinnstiftende Branche und in ein inspirierendes Immobilienprojekt investieren wollen, dann freuen wir uns auf Ihre finanzielle Unterstützung in Form von Anteilsscheinkapital und/oder Darlehen.</p>
        <p>Kontaktieren Sie uns für zusätzliche Informationen. Auf Wunsch präsentieren wir Ihnen das Projekt persönlich.</p>
        <p><a href="mailto:finanzen@luppmenpark.ch" target="_blank" title="Schreiben Sie uns eine E-Mail" class="font-barlow-bold font-bold no-underline hover:underline underline-offset-4">finanzen@luppmenpark.ch</a>
      </x-layout.article>
    </div>
  </x-layout.inner>
</x-layout.section>
@endsection