@extends('app')
@section('seo_title', 'Projekt | Alterswohnen Luppmenpark')
@section('seo_description', 'Entdecken Sie idyllisches Wohnen im denkmalgeschützten Luppmenpark mit 39 barrierefreien Wohneinheiten. Die Überbauung im Weilerstil bietet einen gemeinschaftlichen Lindenhof, vielfältige Wohnungsgrößen und integrierte Spitex-Dienste.')
@section('content')
<x-media.picture 
  :image="'luppmenpark-park'" 
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
      <div class="my-30">
        <video controls class="w-full max-w-3xl">
          <source src="{{ asset('/media/luppmenpark.mp4') }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <h2>Wir sind GAL</h2>
      <p>An der Gründungsversammlung vom 14. Mai 2013 wurde die gemeinnützige Genossenschaft Alterswohnen Luppmenpark (GAL) aus der Taufe gehoben. Sie verfolgt den Zweck vor allem älteren Personen von Hittnau gesunden, hindernisarmen und preisgünstigen Wohnraum zu verschaffen – ganz im Sinne der früheren Emil-Spörri-Stiftung. Die GAL fördert damit das Zusammenleben im Sinne einer gesamtgesellschaftlichen Verantwortung sowie gegenseitige Solidarität.</p>
      <p>Der Vorstand, der Kompetenzen in den Bereichen Bau, Recht, Finanzen, Kommunikation und Soziales einbringt und darüber hinaus von unabhängigen Immobilien- und Finanzierungsexperten begleitet wird, geniesst die Unterstützung der mittlerweile mehr als 120 Genossenschafter. Gemeinsam haben sie einen langen und hindernisreichen Weg hin zur Realisierung des Projektes zurückgelegt.</p>
      <p>Haben Sie Interesse das Bauvorhaben finanziell zu unterstützen? Oder möchten Sie mehr darüber erfahren?</p>
      <p>Kontaktieren Sie uns für zusätzliche Informationen. Auf Wunsch präsentieren wir Ihnen die Möglichkeiten und das Projekt persönlich.</p>
    </div>
  </x-layout.inner>
</x-layout.section>
@endsection