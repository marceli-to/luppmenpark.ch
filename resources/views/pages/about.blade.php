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
      <h1 class="text-sandstone">Wir sind GAL</h1>
      <x-layout.article>
        <p>An der Gründungsversammlung vom 14. Mai 2013 wurde die gemeinnützige Genossenschaft Alterswohnen Luppmenpark (GAL) aus der Taufe gehoben. Sie verfolgt den Zweck, vor allem älteren Personen von Hittnau gesunden, hindernisarmen und preisgünstigen Wohnraum zu verschaffen – so wie es die frühere Emil-Spörri-Stiftung vorsah. Die GAL fördert damit das Zusammenleben im Sinne einer gesamtgesellschaftlichen Verantwortung sowie gegenseitiger Solidarität.</p>
        <p>Der Vorstand, der Kompetenzen in den Bereichen Bau, Recht, Finanzen, Kommunikation und Soziales einbringt und darüber hinaus von unabhängigen Immobilien- und Finanzierungsexperten begleitet wird, geniesst die Unterstützung der mittlerweile mehr als 120 Genossenschafter. Gemeinsam haben sie einen langen und hindernisreichen Weg hin zur Realisierung des Projektes zurückgelegt.</p>
      </x-layout.article>
      <x-layout.grid class="mt-20 lg:mt-40 max-w-prose xs:grid xs:grid-cols-12 xs:gap-16 lg:gap-20">
        <x-layout.span class="xs:!col-span-4">
          <figure>
            <x-media.picture 
              :image="'luppmenpark-team-dummy'" 
              :alt="''"
              class="aspect-square" />
              <figcaption class="pt-5 lg:pt-10">
                <h3 class="font-barow-bold font-bold">Max Mustermann</h3>
                <div>Position</div>
                <div class="mt-5 lg:mt-10">E-Mail</div>
              </figcaption>
          </figure>
        </x-layout.span>
        <x-layout.span class="xs:!col-span-4">
          <figure>
            <x-media.picture 
              :image="'luppmenpark-team-dummy'" 
              :alt="''"
              class="aspect-square" />
              <figcaption class="pt-5 lg:pt-10">
                <h3 class="font-barow-bold font-bold">Max Mustermann</h3>
                <div>Position</div>
                <div class="mt-5 lg:mt-10">E-Mail</div>
              </figcaption>
          </figure>
        </x-layout.span>
        <x-layout.span class="xs:!col-span-4">
          <figure>
            <x-media.picture 
              :image="'luppmenpark-team-dummy'" 
              :alt="''"
              class="aspect-square" />
              <figcaption class="pt-5 lg:pt-10">
                <h3 class="font-barow-bold font-bold">Max Mustermann</h3>
                <div>Position</div>
                <div class="mt-5 lg:mt-10">E-Mail</div>
              </figcaption>
          </figure>
        </x-layout.span>
      </x-layout.grid>
    </div>
  </x-layout.inner>
</x-layout.section>
@endsection