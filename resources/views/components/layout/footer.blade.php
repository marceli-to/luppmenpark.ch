@if (!Route::is('page.privacy') && !Route::is('page.imprint'))
<footer class="bg-sandstone text-white relative px-15 py-20 md:px-25 md:py-30 lg:px-40">
  <x-layout.inner class="md:grid md:grid-cols-12">
    <div class="md:flex md:justify-start md:items-end md:space-x-30 md:col-span-8">
      <address class="not-italic mb-15 md:mb-0">
        <strong>Genossenschaft Alterswohnen</strong><br>
        Luppmenpark GAL<br>
        8335 Hittnau
      </address>
      <div>
        Telefon 
        <a 
          href="tel:044 950 12 21" 
          title="Rufen Sie uns an"
          class="hover:underline hover:decoration-1 hover:underline-offset-4">
          044 950 12 21
        </a>
        <br>
        <a 
          href="mailto:info@luppmenpark.ch" 
          title="Schreiben Sie uns eine E-Mail"
          class="hover:underline hover:decoration-1 hover:underline-offset-4">
          info@luppmenpark.ch
        </a>
      </div>
    </div>
    <div class="mt-20 md:mt-0 md:col-span-4 md:flex md:justify-end md:items-end">
      <nav class="text-sm md:text-base">
        <ul class="flex flex-col gap-x-15 lg:gap-x-20">
          <li>
            <a 
              href="{{ route('page.imprint') }}" 
              title="Impressum"
              class="hover:underline hover:decoration-1 hover:underline-offset-4">
              Impressum
            </a>
          </li>
          <li>
            <a 
              href="{{ route('page.privacy') }}" 
              title="Datenschutz"
              class="hover:underline hover:decoration-1 hover:underline-offset-4">
              Datenschutz
            </a>
          </li>
          <li>
            <a 
              href="https://stoz.ch" 
              title="design by stoz"
              target="_blank"
              class="hover:underline hover:decoration-1 hover:underline-offset-4">
              design by stoz
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </x-layout.inner>
</footer>
@endif
@livewireScripts
@vite('resources/js/app.js')
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-SE839VVBCP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-SE839VVBCP');
</script> --}}
</body>
</html>
<!-- made with ❤ by stoz.ch & marceli.to -->