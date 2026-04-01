<form wire:submit="save" class="mt-15 lg:mt-20">
  @if (session()->has('status'))
    <x-form.state />
  @endif

  <x-layout.grid class="sm:gap-y-15 lg:gap-x-25 lg:gap-y-20">
    <x-honeypot />
    <input type="hidden" wire:model="request_type" value="newsletter" />

    <x-layout.span class="relative sm:col-span-full">
      <p class="font-barlow-bold font-bold text-charcoal mb-8">Ich interessiere mich für*</p>
      @error('interest')
        <x-form.error
          message="Bitte wählen Sie mindestens eine Option"
          class="relative right-auto left-0 mb-6" />
      @enderror
      <div class="flex flex-wrap gap-x-20 gap-y-6">
        <div class="flex items-center">
          <x-form.checkbox name="interest" id="interest_25" wire:model="interest" value="2.5-Zimmerwohnung" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="interest_25" class="ml-6 lg:!ml-10">2.5-Zimmerwohnung</x-form.checkbox-label>
        </div>
        <div class="flex items-center">
          <x-form.checkbox name="interest" id="interest_35" wire:model="interest" value="3.5-Zimmerwohnung" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="interest_35" class="ml-6 lg:!ml-10">3.5-Zimmerwohnung</x-form.checkbox-label>
        </div>
        <div class="flex items-center">
          <x-form.checkbox name="interest" id="interest_45" wire:model="interest" value="4.5-Zimmerwohnung" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="interest_45" class="ml-6 lg:!ml-10">4.5-Zimmerwohnung</x-form.checkbox-label>
        </div>
      </div>
      <div class="flex flex-wrap gap-x-20 gap-y-6 mt-6">
        <div class="flex items-center">
          <x-form.checkbox name="interest" id="interest_studio" wire:model="interest" value="Studio" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="interest_studio" class="ml-6 lg:!ml-10">Studio</x-form.checkbox-label>
        </div>
        <div class="flex items-center">
          <x-form.checkbox name="interest" id="interest_atelier" wire:model="interest" value="Atelier" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="interest_atelier" class="ml-6 lg:!ml-10">Atelier</x-form.checkbox-label>
        </div>
      </div>
    </x-layout.span>

    <x-layout.span class="relative sm:col-span-full mt-5 lg:mt-10">
      <p class="font-barlow-bold font-bold text-charcoal mb-8">Bevorzugtes Haus*</p>
      @error('preferred_house')
        <x-form.error
          message="Bitte wählen Sie mindestens eine Option"
          class="relative right-auto left-0 mb-6" />
      @enderror
      <div class="flex flex-wrap gap-x-20 gap-y-6">
        <div class="flex items-center">
          <x-form.checkbox name="preferred_house" id="house_teichhaus" wire:model="preferred_house" value="Teichhaus" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="house_teichhaus" class="ml-6 lg:!ml-10">Teichhaus</x-form.checkbox-label>
        </div>
        <div class="flex items-center">
          <x-form.checkbox name="preferred_house" id="house_gaertnerhaus" wire:model="preferred_house" value="Gärtnerhaus" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="house_gaertnerhaus" class="ml-6 lg:!ml-10">Gärtnerhaus</x-form.checkbox-label>
        </div>
        <div class="flex items-center">
          <x-form.checkbox name="preferred_house" id="house_bachhaus" wire:model="preferred_house" value="Bachhaus" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="house_bachhaus" class="ml-6 lg:!ml-10">Bachhaus</x-form.checkbox-label>
        </div>
        <div class="flex items-center">
          <x-form.checkbox name="preferred_house" id="house_scheune" wire:model="preferred_house" value="Scheune" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="house_scheune" class="ml-6 lg:!ml-10">Scheune</x-form.checkbox-label>
        </div>
      </div>
    </x-layout.span>

    <x-layout.span class="relative sm:col-span-full mt-5 lg:mt-10">
      <p class="font-barlow-bold font-bold text-charcoal mb-8">Bevorzugtes Stockwerk*</p>
      @error('preferred_floor')
        <x-form.error
          message="Bitte wählen Sie mindestens eine Option"
          class="relative right-auto left-0 mb-6" />
      @enderror
      <div class="flex flex-wrap gap-x-20 gap-y-6">
        <div class="flex items-center">
          <x-form.checkbox name="preferred_floor" id="floor_eg" wire:model="preferred_floor" value="Erdgeschoss" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="floor_eg" class="ml-6 lg:!ml-10">Erdgeschoss</x-form.checkbox-label>
        </div>
        <div class="flex items-center">
          <x-form.checkbox name="preferred_floor" id="floor_1og" wire:model="preferred_floor" value="1. Obergeschoss" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="floor_1og" class="ml-6 lg:!ml-10">1. Obergeschoss</x-form.checkbox-label>
        </div>
        <div class="flex items-center">
          <x-form.checkbox name="preferred_floor" id="floor_2og" wire:model="preferred_floor" value="2. Obergeschoss" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="floor_2og" class="ml-6 lg:!ml-10">2. Obergeschoss</x-form.checkbox-label>
        </div>
        <div class="flex items-center">
          <x-form.checkbox name="preferred_floor" id="floor_dg" wire:model="preferred_floor" value="Dachgeschoss" class="mt-2 lg:mt-2 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
          <x-form.checkbox-label for="floor_dg" class="ml-6 lg:!ml-10">Dachgeschoss</x-form.checkbox-label>
        </div>
      </div>
    </x-layout.span>

    <x-layout.span class="relative sm:col-span-full mt-5 lg:mt-10">
      <x-form.input name="firstname" placeholder="Vorname*" isWire="true" class="!bg-ivory" />
      @error('firstname')
        <x-form.error message="{{ $message }}" />
      @enderror
    </x-layout.span>
    <x-layout.span class="relative sm:col-span-full">
      <x-form.input name="name" placeholder="Name*" isWire="true" class="!bg-ivory" />
      @error('name')
        <x-form.error message="{{ $message }}" />
      @enderror
    </x-layout.span>
    <x-layout.span class="relative sm:col-span-full">
      <x-form.input name="address" placeholder="Adresse*" isWire="true" class="!bg-ivory" />
      @error('address')
        <x-form.error message="{{ $message }}" />
      @enderror
    </x-layout.span>
    <x-layout.span class="relative sm:col-span-full">
      <x-form.input name="location" placeholder="PLZ / Ort*" isWire="true" class="!bg-ivory" />
      @error('location')
        <x-form.error message="{{ $message }}" />
      @enderror
    </x-layout.span>
    <x-layout.span class="relative sm:col-span-full">
      <x-form.input name="date_of_birth" type="date" placeholder="Geburtsdatum*" isWire="true" class="!bg-ivory" />
      @error('date_of_birth')
        <x-form.error message="{{ $message }}" />
      @enderror
    </x-layout.span>
    <x-layout.span class="relative sm:col-span-full">
      <x-form.input name="email" type="email" placeholder="E-Mail*" isWire="true" class="!bg-ivory" />
      @error('email')
        <x-form.error message="{{ $message }}" />
      @enderror
    </x-layout.span>
    <x-layout.span class="relative sm:col-span-full">
      <x-form.input name="phone" placeholder="Telefon*" isWire="true" class="!bg-ivory" />
      @error('phone')
        <x-form.error message="{{ $message }}" />
      @enderror
    </x-layout.span>
    <x-layout.span class="relative sm:col-span-full">
      <x-form.input name="household_count" placeholder="Anzahl Personen im Haushalt*" isWire="true" class="!bg-ivory" />
      @error('household_count')
        <x-form.error message="{{ $message }}" />
      @enderror
    </x-layout.span>
    <x-layout.span class="relative sm:col-span-full">
      <x-form.input name="cooperative_member" placeholder="Bereits Genossenschaftler, seit?*" isWire="true" class="!bg-ivory" />
      @error('cooperative_member')
        <x-form.error message="{{ $message }}" />
      @enderror
    </x-layout.span>

    <x-layout.span class="relative sm:col-span-full">
      @error('privacy')
        <x-form.error
          message="Datenschutzerklärung muss akzeptiert werden"
          class="relative right-auto left-0 mb-6"
          />
      @enderror
      <div class="flex items-start">
        <x-form.checkbox name="privacy" id="privacy_newsletter" class="mt-2 lg:mt-6 !bg-ivory checked:!bg-sandstone !text-charcoal !accent-charcoal" />
        <x-form.checkbox-label for="privacy_newsletter" class="ml-6 lg:!ml-10">
          Ich habe die <a href="{{ route('page.privacy') }}" title="Datenschutzerklärung" target="_blank" class="hover:underline underline-offset-2 decoration-1">Datenschutzerklärung</a> gelesen und akzeptiere diese
        </x-form.checkbox-label>
      </div>
    </x-layout.span>
    <x-layout.span class="sm:col-span-full mt-5">
      <x-form.button>
        <div wire:loading>
          <x-form.spinner class="mr-12" />
        </div>
        Newsletter abonnieren
      </x-form.button>
    </x-layout.span>
  </x-layout.grid>
</form>
