@extends('app')
@section('seo_title', 'Investition | Alterswohnen Luppmenpark')
@section('seo_description', 'Entdecken Sie idyllisches Wohnen im denkmalgeschützten Luppmenpark mit 39 barrierefreien Wohneinheiten. Die Überbauung im Weilerstil bietet einen gemeinschaftlichen Lindenhof, vielfältige Wohnungsgrößen und integrierte Spitex-Dienste.')
@section('content')
<x-media.picture 
  :image="'luppmenpark-bach'" 
  :alt="''"
  class="md:aspect-[16/9]" />
<x-layout.section>
  <x-layout.inner>
    <div>
      <h1 class="text-sandstone">Willkommen im Luppmenpark<br>Wohnen im Alter</h1>
      <x-layout.article>
        <h2>Das Immobilienprojekt</h2>
        <p>Die beschauliche Wohnsiedlung ist eingebettet im wunderbaren, denkmalgeschützten Luppmenpark. Herzstück der Überbauung im Stil eines Weilers bildet der Lindenhof mit seinem einfachen Dorfbrunnen, Bänkchen zum Verweilen und hübschen Blumenbeeten. Der Hof ist barrierefrei zugänglich und Ort der Begegnung und der Gemeinschaft. Hierhin öffnet sich auch der Gemeinschaftsraum mit seinem gedeckten Aussensitzplatz und die Hauszugänge. Darüber hinaus lädt der ganze Park mit seinen alten, schattenspendenden Bäumen zu kleinen Spaziergängen in unmittelbarer Umgebung der Überbauung ein.</p>
        <p>In vier Häusern mit individuellem Charakter werden insgesamt 39 Wohneinheiten realisiert. 17 davon sind 3.5-Zimmer-Wohnungen und 19 sind 2.5-Zimmer-Wohnungen. Ergänzt wird das Angebot durch eine 4.5 -Wohnung sowie zwei Studios. Darüber hinaus werden ein Atelier sowie Räumlichkeiten für die Spitex realisiert, die sich in der Überbauung permanent eingliedern wird. Zu allen Wohneinheiten gehören Kellerabteile und Einstellplätze für Velos. Parkplätze können in der Tiefgarage der Überbauung zugemietet werden.</p>
      </x-layout.article>
    </div>
  </x-layout.inner>
</x-layout.section>
@endsection