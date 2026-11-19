{{--
  Standalone layout for the apartment admin: same fonts and colours as the site,
  without its navigation and scripts.
--}}
<!DOCTYPE html>
<html lang="de" class="overflow-y-scroll">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>@yield('title', 'Verwaltung') – Luppmenpark</title>
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  @vite(['resources/css/app.css'])
</head>
<body class="antialiased bg-white font-barlow-medium font-medium text-charcoal text-base leading-[1.45]">

  <div class="mx-auto w-full max-w-6xl px-20 py-30 md:px-30 md:py-40">

    <header class="mb-30 flex flex-wrap items-center justify-between gap-x-20 gap-y-10 border-b border-charcoal pb-15">
      <div>
        <a href="{{ route('admin.apartments.index') }}" class="text-lg font-barlow-bold font-bold uppercase leading-none">Luppmenpark Verwaltung</a>
        @hasSection('subtitle')
          <p class="!mb-0 text-sm opacity-70">@yield('subtitle')</p>
        @endif
      </div>

      @auth
        <div class="flex items-center gap-x-15 text-sm">
          <span class="opacity-70">{{ auth()->user()->name }}</span>
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="underline hover:no-underline">Abmelden</button>
          </form>
        </div>
      @endauth
    </header>

    @if (session('status'))
      <p class="!mb-25 bg-ivory px-15 py-10 text-sm">{{ session('status') }}</p>
    @endif

    @yield('content')

  </div>

</body>
</html>
