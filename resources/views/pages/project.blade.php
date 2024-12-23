@extends('app')
@section('seo_title', 'Projekt | Alterswohnen Luppmenpark')
@section('seo_description', 'Entdecken Sie idyllisches Wohnen im denkmalgeschützten Luppmenpark mit 39 barrierefreien Wohneinheiten. Die Überbauung im Weilerstil bietet einen gemeinschaftlichen Lindenhof, vielfältige Wohnungsgrößen und integrierte Spitex-Dienste.')
@section('content')
<x-media.picture 
  :image="'luppmenpark-park'" 
  :alt="''"
  :sizes="['md', 'lg', 'xl']"
  lazy="false"
  class="md:aspect-[16/9] xl:aspect-[16/7]" />
<x-layout.section>
  <x-layout.inner>
    <x-icons.leafes.orange class="hidden lg:block w-32 h-23 absolute top-20 right-0" />
    <x-icons.leafes.green class="hidden lg:block w-20 h-37 absolute top-100 right-0" />
    <x-icons.leafes.medium-green class="hidden lg:block w-34 h-19 absolute top-[270px] -right-10" />
    <x-icons.leafes.light-green class="hidden lg:block w-20 h-37 absolute top-[1224px] -right-50" />
    <x-icons.leafes.dark-green class="hidden lg:block w-28 h-27 absolute top-[1414px] -right-60" />
    <div>
      <h1 class="text-sandstone">Willkommen im Luppmenpark<br>Wohnen im Alter</h1>
      <x-layout.article>
        <h2>Das Immobilienprojekt</h2>
        <p>Die beschauliche Wohnsiedlung ist eingebettet im wunderbaren, denkmalgeschützten Luppmenpark. Herzstück der Überbauung im Stil eines Weilers bildet der Lindenhof mit seinem einfachen Dorfbrunnen, Bänkchen zum Verweilen und hübschen Blumenbeeten. Der Hof ist barrierefrei zugänglich und Ort der Begegnung und der Gemeinschaft. Hierhin öffnet sich auch der Gemeinschaftsraum mit seinem gedeckten Aussensitzplatz und die Hauszugänge. Darüber hinaus lädt der ganze Park mit seinen alten, schattenspendenden Bäumen zu kleinen Spaziergängen in unmittelbarer Umgebung der Überbauung ein.</p>
        <p>In vier Häusern mit individuellem Charakter werden insgesamt 39 Wohneinheiten realisiert. 17 davon sind 3.5-Zimmer-Wohnungen und 19 sind 2.5-Zimmer-Wohnungen. Ergänzt wird das Angebot durch eine 4.5 -Wohnung sowie zwei Studios. Darüber hinaus werden ein Atelier sowie Räumlichkeiten für die Spitex realisiert, die sich in der Überbauung permanent eingliedern wird. Zu allen Wohneinheiten gehören Kellerabteile und Einstellplätze für Velos. Parkplätze können in der Tiefgarage der Überbauung zugemietet werden.</p>
      </x-layout.article>
      <div class="my-20 lg:my-40">
        <x-media.picture 
          :image="'luppmenpark-situation'" 
          :alt="''"
          :sizes="['md', 'lg', 'xl']"
          class="md:aspect-[16/9]" />
      </div>
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
        :image="'luppmenpark-scheune-galerie'" 
        :alt="''"
        class="md:aspect-[16/9]" />
    </div>
  </div>
</x-layout.section>
<div class="sm:my-20 hidden sm:grid sm:grid-cols-3 sm:gap-20">
  <div class="sm:col-span-1">
    <a href="/media/img/luppmenpark-scheune-galerie-lg.jpg" data-fancybox="galerie">
      <x-media.picture 
        :image="'luppmenpark-scheune-galerie-xs'" 
        :alt="''"
        class="sm:aspect-[3/4]" />
    </a>
  </div>
  <div class="sm:col-span-1">
    <a href="/media/img/luppmenpark-dorfplatz-galerie-lg.jpg" data-fancybox="galerie">
      <x-media.picture 
        :image="'luppmenpark-dorfplatz-galerie-xs'" 
        :alt="''"
        class="sm:aspect-[3/4]" />
    </a>
  </div>
  <div class="sm:col-span-1">
    <a href="/media/img/luppmenpark-bachhaus-innen-galerie-lg.jpg" data-fancybox="galerie">
      <x-media.picture 
        :image="'luppmenpark-bachhaus-innen-galerie-xs'" 
        :alt="''"
        class="sm:aspect-[3/4]" />
    </a>
  </div>
</div>
@endsection