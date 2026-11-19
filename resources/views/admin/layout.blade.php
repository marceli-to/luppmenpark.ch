{{--
  Standalone layout for the apartment admin: the site's ivory header, logo,
  colours and sandstone footer, without its navigation and scripts.
--}}
<!DOCTYPE html>
<html lang="de" class="h-full bg-white overflow-y-scroll">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>@yield('title', 'Verwaltung') – Luppmenpark</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  @vite(['resources/css/app.css'])
</head>
<body class="antialiased flex min-h-full flex-col font-barlow-medium font-medium text-charcoal text-base leading-[1.45]">

  @hasSection('bare')
  <main class="flex flex-1 items-center justify-center px-20 py-30">
    @yield('content')
  </main>
  @else
  <header class="bg-ivory">
    <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-x-30 gap-y-15 px-20 py-20 md:px-30">
      <a href="{{ route('admin.apartments.index') }}" class="block" title="Luppmenpark Verwaltung">
        <x-icons.logo class="block h-auto w-120 md:w-150" />
      </a>

      @auth
        <div class="text-sm">
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="underline decoration-1 underline-offset-4 hover:text-sandstone">Abmelden</button>
          </form>
        </div>
      @endauth
    </div>
  </header>

  <main class="isolate flex-1">
    <div class="mx-auto max-w-6xl px-20 py-30 md:px-30 md:py-40">

      @if (session('status'))
        <div class="!mb-25 flex items-center gap-x-10 rounded-sm bg-ivory px-15 py-12 text-sm" role="status">
          <span class="size-8 shrink-0 rounded-full bg-emerald"></span>
          <p>{{ session('status') }}</p>
        </div>
      @endif

      @yield('content')

    </div>
  </main>

  <footer class="bg-sandstone text-white">
    <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-x-20 gap-y-5 px-20 py-15 text-sm md:px-30">
      <p><strong>Genossenschaft Alterswohnen</strong> Luppmenpark GAL</p>
      <a href="{{ route('page.apartments') }}" target="_blank" class="hover:underline hover:decoration-1 hover:underline-offset-4">Zur Website</a>
    </div>
  </footer>
  @endif

</body>
</html>
