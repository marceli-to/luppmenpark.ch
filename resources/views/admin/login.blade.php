@extends('admin.layout')
@section('title', 'Anmelden')
@section('bare', true)
@section('content')

@php
  // Borderless white field on ivory, like the contact form on the site.
  $input = 'w-full rounded-sm border-0 bg-white px-12 py-10 text-charcoal ring-1 ring-transparent focus:ring-2 focus:ring-sandstone [&:-webkit-autofill]:shadow-[inset_0_0_0_100px_#fff]';
@endphp

<div class="w-full max-w-sm">

  <div>
    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-y-15 rounded-sm bg-ivory p-20 md:p-25">
      @csrf

      <h1 class="!mb-5 text-sandstone">Anmelden</h1>

      <div>
        <label for="email" class="mb-6 block text-sm">E-Mail</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
          class="{{ $input }} @error('email') !ring-red-700 @enderror">
        @error('email')
          <p class="mt-5 text-sm text-red-700">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password" class="mb-6 block text-sm">Passwort</label>
        <input id="password" type="password" name="password" required autocomplete="current-password"
          class="{{ $input }} @error('password') !ring-red-700 @enderror">
        @error('password')
          <p class="mt-5 text-sm text-red-700">{{ $message }}</p>
        @enderror
      </div>


      <button type="submit" class="mt-5 rounded-sm bg-sandstone px-20 py-10 font-barlow-bold font-bold uppercase text-white transition-colors hover:bg-emerald">
        Anmelden
      </button>

    </form>
  </div>

</div>

@endsection
