@extends('app')
@section('seo_title', 'Projekt | Alterswohnen Luppmenpark')
@section('seo_description', 'Entdecken Sie idyllisches Wohnen im denkmalgeschützten Luppmenpark mit 39 barrierefreien Wohneinheiten. Die Überbauung im Weilerstil bietet einen gemeinschaftlichen Lindenhof, vielfältige Wohnungsgrößen und integrierte Spitex-Dienste.')
@section('content')
@if (session()->has('status'))
<x-form.state />
@endif
<x-media.picture 
  :image="'luppmenpark-park'" 
  :alt="''"
  :sizes="['md', 'lg', 'xl']"
  lazy="false"
  class="md:aspect-[16/7] xl:aspect-[16/5]" />
<x-layout.section>
  <x-layout.inner>
    <a 
      href="#newsletter"
      class="block absolute right-0 lg:right-40 -top-50 -translate-y-1/2 md:-top-30 lg:-top-40 w-100 h-100 md:w-140 md:h-140 lg:w-192 lg:h-192 hover:-rotate-2 transition-transform duration-300"
      aria-label="Newsletter abonnieren">
      <x-icons.badge class="w-full h-auto" />
    </a>
    <x-icons.leafes.orange class="hidden lg:block w-32 h-23 absolute top-20 right-0 z-10" />
    <x-icons.leafes.green class="hidden lg:block w-20 h-37 absolute top-100 right-0 z-10" />
    <x-icons.leafes.medium-green class="hidden lg:block w-34 h-19 absolute top-[270px] z-10 -right-10" />
    <x-icons.leafes.light-green class="hidden lg:block w-20 h-37 absolute top-[1224px] z-10 -right-20 xl:-right-50" />
    <x-icons.leafes.dark-green class="hidden lg:block w-28 h-27 absolute top-[1414px] z-20 -right-10 xl:-right-60" />
    <div>
      <h1 class="text-sandstone">Willkommen im Luppmenpark<br>Wohnen im Alter</h1>
      <x-layout.article>
        <h2>Das Immobilienprojekt</h2>
        <p>Die beschauliche Wohnsiedlung ist eingebettet im wunderbaren, denkmalgeschützten Luppmenpark. Herzstück der Überbauung im Stil eines Weilers bildet der Lindenhof mit seinem einfachen Dorfbrunnen, Bänkchen zum Verweilen und hübschen Blumenbeeten. Der Hof ist barrierefrei zugänglich und Ort der Begegnung und der Gemeinschaft. Hierhin öffnet sich auch der Gemeinschaftsraum mit seinem gedeckten Aussensitzplatz und die Hauszugänge. Darüber hinaus lädt der ganze Park mit seinen alten, schattenspendenden Bäumen zu kleinen Spaziergängen in unmittelbarer Umgebung der Überbauung ein.</p>
        <p>In vier Häusern mit individuellem Charakter werden insgesamt 39 Wohneinheiten realisiert. 17 davon sind 3.5-Zimmer-Wohnungen und 19 sind 2.5-Zimmer-Wohnungen. Ergänzt wird das Angebot durch eine 4.5-Zimmer-Wohnungen sowie zwei Studios. Darüber hinaus werden ein Atelier sowie Räumlichkeiten für die Spitex realisiert, die sich in der Überbauung permanent eingliedern wird. Zu allen Wohneinheiten gehören Kellerabteile und Einstellplätze für Velos. Parkplätze können in der Tiefgarage der Überbauung zugemietet werden.</p>
        <div class="my-20 lg:my-40">
          <a href="/media/img/luppmenpark-situation-lg.jpg" title="Luppmenpark Situation" data-fancybox="galerie">
            <x-media.picture
              :image="'luppmenpark-situation'"
              :alt="''"
              :sizes="['md', 'lg']"
              class="md:aspect-[16/9]" />
          </a>
        </div>
      </x-layout.article>
      <x-layout.grid class="sm:gap-x-20 lg:gap-x-30">
        <x-layout.span>
          <h2>Leuchtturmcharakter</h2>
          <p>Dieses Projekt wird nicht nur attraktiven Wohnraum für ältere Menschen bieten, sondern auch als Symbol der Entwicklung unserer Gemeinde fungieren.</p>
          <h2>Nachhaltige Bauweise</h2>
          <p>Wir setzen auf umweltfreundliche Materialien und innovative Bauweise, die unsere Region langfristig stärken. Zudem verfolgen wir das Ziel, mit lokalen, respektive regionalen Handwerkern zusammen zu arbeiten.</p>
        </x-layout.span>
        <x-layout.span>
          <h2>Gemeinschaft und Zusammenhalt</h2>
          <p>Mit diesem Projekt fördern wir das Zusammenleben in der Gemeinschaft, was unser Zusammengehörigkeitsgefühl stärkt.</p>
          <h2>Die Gemeinde Hittnau als Partnerin</h2>
          <p>Wir konnten die Gemeinde Hittnau zwei Mal als Partnerin gewinnen. Einerseits als Baurechtsgeberin und andererseits als Darlehensgeberin. Dies unterstreicht das Vertrauen der Gemeinde in die Genossenschaft Alterswohnen Luppmenpark und deren Bauprojekt.</p>
        </x-layout.span>
      </x-layout.grid>
    </div>
  </x-layout.inner>
  <div class="my-20 flex flex-col gap-y-20 sm:hidden">
    <div>
      <x-media.picture 
        :image="'luppmenpark-scheune-galerie'" 
        :alt="''"
        class="md:aspect-[16/9]" />
    </div>
    <div>
      <x-media.picture 
        :image="'luppmenpark-dorfplatz-galerie'" 
        :alt="''"
        class="md:aspect-[16/9]" />
    </div>
    <div>
      <x-media.picture 
        :image="'luppmenpark-bachhaus-innen-galerie'" 
        :alt="''"
        class="md:aspect-[16/9]" />
    </div>
  </div>
</x-layout.section>

<x-layout.section class="bg-ivory">
  <x-layout.inner>
    <div class="max-w-3xl">
      <h1 class="text-charcoal">Grundrissplan Muster</h1>
      <p>Pro Gebäude ist ein exemplarischer Grundriss dargestellt, der einen ersten Eindruck der Wohnungsaufteilung vermittelt.</p>
      <ul class="flex flex-col space-y-10 mt-15 lg:mt-20">
        <li>
          <a href="{{ asset('downloads/Luppmenpark_Vermietungsplan_Teichhaus.pdf') }}" target="_blank" class="underline hover:no-underline">
            Grundriss Muster Teichhaus (PDF)
          </a>
        </li>
        <li>
          <a href="{{ asset('downloads/Luppmenpark_Vermietungsplan_Gaertnerhaus.pdf') }}" target="_blank" class="underline hover:no-underline">
            Grundriss Muster Gärtnerhaus (PDF)
          </a>  
        </li>
        <li>
          <a href="{{ asset('downloads/Luppmenpark_Vermietungsplan_Bachhaus.pdf') }}" target="_blank" class="underline hover:no-underline">
            Grundriss Muster Bachhaus (PDF)
          </a>
        </li>
        <li>
          <a href="{{ asset('downloads/Luppmenpark_Vermietungsplan_Scheune.pdf') }}" target="_blank" class="underline hover:no-underline">
            Grundriss Muster Scheune (PDF)
          </a>
        </li>
      </ul>
    </div>
  </x-layout.inner>
</x-layout.section>


<x-layout.section id="newsletter">
  <x-layout.inner>
    <div class="max-w-3xl">
      <h1 class="text-charcoal">Newsletter</h1>
      <p><strong>Haben Sie interesse an einer Wohnung?</strong><br>Füllen Sie das Kontaktformular unverbindlich aus. Gerne senden wir Ihnen weitere Informationen zu, sobald die Vermietung startet.</p>
      <livewire:newsletter />
    </div>
  </x-layout.inner>
</x-layout.section>


<div class="sm:my-20 hidden sm:grid sm:grid-cols-3 sm:gap-20">
  <div class="sm:col-span-1">
    <a href="/media/img/luppmenpark-scheune-galerie-lg.jpg" title="Luppmenpark Scheune" data-fancybox="galerie">
      <x-media.picture 
        :image="'luppmenpark-scheune-galerie-xs'" 
        :alt="''"
        class="sm:aspect-[3/4]" />
    </a>
  </div>
  <div class="sm:col-span-1">
    <a href="/media/img/luppmenpark-dorfplatz-galerie-lg.jpg" title="Luppmenpark Dorfplatz" data-fancybox="galerie">
      <x-media.picture 
        :image="'luppmenpark-dorfplatz-galerie-xs'" 
        :alt="''"
        class="sm:aspect-[3/4]" />
    </a>
  </div>
  <div class="sm:col-span-1">
    <a href="/media/img/luppmenpark-bachhaus-innen-galerie-lg.jpg" title="Luppmenpark Bachhaus" data-fancybox="galerie">
      <x-media.picture 
        :image="'luppmenpark-bachhaus-innen-galerie-xs'" 
        :alt="''"
        class="sm:aspect-[3/4]" />
    </a>
  </div>
</div>
@endsection