<nav 
  x-show="menu" 
  x-cloak class="bg-ivory fixed left-0 top-100 z-40 md:top-0 w-full p-20 md:p-0 md:relative md:!block">
  <ul class="flex flex-col gap-y-20 items-center md:flex-row md:justify-center md:gap-30 xl:gap-40 md:mt-30">
    <x-menu.item :route="'page.project'" :title="'Projekt'" class="{{ Route::is('page.project') ? 'font-barlow-bold font-bold' : '' }}" />
    <x-menu.item :route="'page.about'" :title="'Wir sind GAL'" class="{{ Route::is('page.about') ? 'font-barlow-bold font-bold' : '' }}" />
    <x-menu.item :route="'page.invest'" :title="'Investition'" class="{{ Route::is('page.invest') ? 'font-barlow-bold font-bold' : '' }}" />
    <x-menu.item :route="'page.contact'" :title="'Kontakt'" class="{{ Route::is('page.contact') ? 'font-barlow-bold font-bold' : '' }}" />
  </ul>
</nav>
