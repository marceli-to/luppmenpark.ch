@extends('app')
@section('seo_title', 'Wir sind GAL | Alterswohnen Luppmenpark')
@section('seo_description', 'Entdecken Sie idyllisches Wohnen im denkmalgeschützten Luppmenpark mit 39 barrierefreien Wohneinheiten. Die Überbauung im Weilerstil bietet einen gemeinschaftlichen Lindenhof, vielfältige Wohnungsgrößen und integrierte Spitex-Dienste.')
@section('content')
<x-media.picture 
  :image="'luppmenpark-obstbaum'" 
  :alt="''"
  :sizes="['md', 'lg', 'xl']"
  class="md:aspect-[16/9] xl:aspect-[16/7]" />
<x-layout.section>
  <x-layout.inner>
    <x-icons.leafes.orange class="hidden lg:block w-32 h-23 absolute top-20 right-0" />
    <x-icons.leafes.green class="hidden lg:block w-20 h-37 absolute top-100 right-0" />
    <x-icons.leafes.medium-green class="hidden lg:block w-34 h-19 absolute top-[270px] -right-10" />
    <div>
      <h1 class="text-sandstone">Genossenschaft</h1>
      <x-layout.article>
        <p>An der Gründungsversammlung vom 14. Mai 2013 wurde die gemeinnützige Genossenschaft Alterswohnen Luppmenpark (GAL) aus der Taufe gehoben. Sie verfolgt den Zweck, vor allem älteren Personen von Hittnau gesunden, hindernisarmen und preisgünstigen Wohnraum zu verschaffen – so wie es die frühere Emil-Spörri-Stiftung vorsah. Die GAL fördert damit das Zusammenleben im Sinne einer gesamtgesellschaftlichen Verantwortung sowie gegenseitiger Solidarität.</p>
        <p>Der Vorstand, der Kompetenzen in den Bereichen Bau, Recht, Finanzen, Kommunikation und Soziales einbringt und darüber hinaus von unabhängigen Immobilien- und Finanzierungsexperten begleitet wird, geniesst die Unterstützung der mittlerweile mehr als 120 Genossenschafter. Gemeinsam haben sie einen langen und hindernisreichen Weg hin zur Realisierung des Projektes zurückgelegt.</p>
        <div class="space-y-15 xs:space-y-0 xs:flex xs:gap-x-15 mt-15 lg:mt-20">
          <a 
            href="/downloads/luppmenpark-statuten.pdf"
            title="Download Statuten" 
            target="_blank" 
            class="bg-emerald hover:bg-sandstone text-ivory hover:text-white rounded-sm font-barlow-bold font-bold text-md md:text-lg inline-flex uppercase py-5 px-15 transition-all w-auto">
            Statuten
          </a>
        </div>
      </x-layout.article>
      <x-layout.grid class="mt-20 lg:mt-40 max-w-prose xs:grid xs:grid-cols-12 xs:gap-16 lg:gap-20">
        <x-layout.span class="xs:!col-span-4">
          <figure>
            <x-media.picture 
              :image="'luppmenpark-team-Bruno-Schiess'" 
              :alt="'Bruno Schiess'"
              width="400"
              height="400"
              class="aspect-square" />
              <figcaption class="pt-5 lg:pt-10">
                <h3 class="font-barow-bold font-bold">Bruno Schiess</h3>
                <div>Präsident</div>
                <div>
                  <a href="mailto:praesident@luppmenpark.ch" class="underline underline-offset-4 decoration-1 hover:no-underline">E-Mail</a>
                </div>
              </figcaption>
          </figure>
        </x-layout.span>
        <x-layout.span class="xs:!col-span-4">
          <figure>
            <x-media.picture 
              :image="'luppmenpark-team-Felix-Jucker'" 
              :alt="'Felix Jucker'"
              width="400"
              height="400"
              class="aspect-square" />
              <figcaption class="pt-5 lg:pt-10">
                <h3 class="font-barow-bold font-bold">Felix Jucker</h3>
                <div>Vizepräsident/Vorsteher Baukommission</div>
                <div>
                  <a href="mailto:bauen@luppmenpark.ch" class="underline underline-offset-4 decoration-1 hover:no-underline">E-Mail</a>
                </div>
              </figcaption>
          </figure>
        </x-layout.span>
        <x-layout.span class="xs:!col-span-4">
          <figure>
            <x-media.picture 
              :image="'luppmenpark-team-Christoph-Berweger'" 
              :alt="'Christoph Berweger'"
              width="400"
              height="400"
              class="aspect-square" />
              <figcaption class="pt-5 lg:pt-10">
                <h3 class="font-barow-bold font-bold">Christoph Berweger</h3>
                <div>Vorsteher Finanzkommission</div>
                <div>
                  <a href="mailto:finanzen@luppmenpark.ch" class="underline underline-offset-4 decoration-1 hover:no-underline">E-Mail</a>
                </div>
              </figcaption>
          </figure>
        </x-layout.span>
        <x-layout.span class="xs:!col-span-4">
          <figure>
            <x-media.picture 
              :image="'luppmenpark-team-Susanne-Brunner'" 
              :alt="'Susanne Brunner'"
              width="400"
              height="400"
              class="aspect-square" />
              <figcaption class="pt-5 lg:pt-10">
                <h3 class="font-barow-bold font-bold">Susanne Brunner</h3>
                <div>Buchhaltung</div>
                <div>
                  <a href="mailto:susanne.brunner@luppmenpark.ch" class="underline underline-offset-4 decoration-1 hover:no-underline">E-Mail</a>
                </div>
              </figcaption>
          </figure>
        </x-layout.span>
        <x-layout.span class="xs:!col-span-4">
          <figure>
            <x-media.picture 
              :image="'luppmenpark-team-Reto-Huber'" 
              :alt="'Reto Huber'"
              width="400"
              height="400"
              class="aspect-square" />
              <figcaption class="pt-5 lg:pt-10">
                <h3 class="font-barow-bold font-bold">Reto Huber</h3>
                <div>Delegierter<br>Gemeinde Hittnau</div>
                <div>
                  <a href="mailto:reto.huber@luppmenpark.ch" class="underline underline-offset-4 decoration-1 hover:no-underline">E-Mail</a>
                </div>
              </figcaption>
          </figure>
        </x-layout.span>
        <x-layout.span class="xs:!col-span-4">
          <figure>
            <x-media.picture 
              :image="'luppmenpark-team-Elisabeth-Meyer'" 
              :alt="'Elisabeth Meyer'"
              width="400"
              height="400"
              class="aspect-square" />
              <figcaption class="pt-5 lg:pt-10">
                <h3 class="font-barow-bold font-bold">Elisabeth Meyer</h3>
                <div>Aktuarin</div>
                <div>
                  <a href="mailto:info@luppmenpark.ch" class="underline underline-offset-4 decoration-1 hover:no-underline">E-Mail</a>
                </div>
              </figcaption>
          </figure>
        </x-layout.span>
        <x-layout.span class="xs:!col-span-4">
          <figure>
            <x-media.picture 
              :image="'luppmenpark-team-Pia-Wertheimer'" 
              :alt="'Pia Wertheimer'"
              width="400"
              height="400"
              class="aspect-square" />
              <figcaption class="pt-5 lg:pt-10">
                <h3 class="font-barow-bold font-bold">Pia Wertheimer</h3>
                <div>Vorsteherin Kommunikation</div>
                <div>
                  <a href="mailto:kommunikation@luppmenpark.ch" class="underline underline-offset-4 decoration-1 hover:no-underline">E-Mail</a>
                </div>
              </figcaption>
          </figure>
        </x-layout.span>
        <x-layout.span class="xs:!col-span-4">
          <figure>
            <x-media.picture 
              :image="'luppmenpark-team-Bert-Brauer'" 
              :alt="'Bert Brauer'"
              width="400"
              height="400"
              class="aspect-square" />
              <figcaption class="pt-5 lg:pt-10">
                <h3 class="font-barow-bold font-bold">Bert Brauer</h3>
                <div>Kommunikation</div>
                <div>
                  <a href="mailto:bert.brauer@luppmenpark.ch" class="underline underline-offset-4 decoration-1 hover:no-underline">E-Mail</a>
                </div>
              </figcaption>
          </figure>
        </x-layout.span>
      </x-layout.grid>
    </div>
  </x-layout.inner>
</x-layout.section>
@endsection