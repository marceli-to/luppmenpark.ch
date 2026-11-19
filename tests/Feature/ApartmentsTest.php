<?php

namespace Tests\Feature;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApartmentsTest extends TestCase
{
  use RefreshDatabase;

  protected function setUp(): void
  {
    parent::setUp();
    $this->artisan('apartments:seed')->assertSuccessful();
  }

  public function test_seed_creates_the_mieterspiegel_and_keeps_status_on_rerun(): void
  {
    $this->assertSame(40, Apartment::count());
    $this->assertSame(['scheune', 'gaertnerhaus', 'teichhaus', 'bachhaus'], Apartment::orderBy('sort')->pluck('house')->unique()->values()->all());

    Apartment::where('number', '10-001')->update(['status' => 'rented', 'rent' => 2300]);
    $this->artisan('apartments:seed')->assertSuccessful();

    $apartment = Apartment::where('number', '10-001')->first();
    $this->assertSame('rented', $apartment->status);
    $this->assertSame(2300, $apartment->rent);
    $this->assertSame(40, Apartment::count());
  }

  public function test_apartments_page_lists_houses_prices_and_apply_buttons(): void
  {
    Apartment::where('number', '10-101')->update(['status' => 'reserved']);
    Apartment::where('number', '10-102')->update(['status' => 'rented']);

    $html = $this->get('/wohnungen')
      ->assertOk()
      ->assertSee('Gärtnerhaus')
      ->assertSee('10-001')
      ->assertSee('2’250')
      ->assertSee('40’000')
      ->assertSee('auf Anfrage')
      ->assertSee('reserviert')
      ->assertSee('vermietet')
      ->assertSee('Diese Angaben sind provisorisch')
      ->getContent();

    // "Bewerben" only for free apartments: 40 minus one reserved, one rented (table + mobile list).
    $this->assertSame(76, substr_count($html, 'title="Bewerbungsformular (PDF)"'));
  }

  public function test_navigation_and_home_link_to_apartments(): void
  {
    $this->get('/')
      ->assertOk()
      ->assertSee(route('page.apartments'))
      ->assertSee('Alle Wohnungen')
      ->assertDontSee('Formular für Interessenten');
  }

  public function test_contact_page_offers_the_living_form(): void
  {
    $this->get('/kontakt?formular=wohnen')
      ->assertOk()
      ->assertSee('<option value="living">Wohnen</option>', false)
      ->assertSee('Ich interessiere mich für');
  }

  public function test_admin_requires_login(): void
  {
    $this->get('/admin')->assertRedirect('/admin/login');
    $this->get('/admin/login')->assertOk()->assertSee('Anmelden');
  }

  public function test_admin_updates_status_and_prices(): void
  {
    $user = User::factory()->create(['name' => 'Vermietung']);
    $apartment = Apartment::where('number', '20-001')->first();
    $other = Apartment::where('number', '20-002')->first();

    $this->actingAs($user)->get('/admin')->assertOk()->assertSee('20-001');

    $this->actingAs($user)
      ->put('/admin', ['apartments' => [
        $apartment->id => ['status' => 'reserved', 'rent' => '1900', 'share' => ''],
        $other->id => ['status' => $other->status, 'rent' => $other->rent, 'share' => $other->share],
      ]])
      ->assertRedirect('/admin')
      ->assertSessionHas('status', '1 Wohnung aktualisiert.');

    $apartment->refresh();
    $this->assertSame('reserved', $apartment->status);
    $this->assertSame(1900, $apartment->rent);
    $this->assertNull($apartment->share);
    $this->assertSame('Vermietung', $apartment->updated_by);
  }

  public function test_admin_rejects_unknown_status(): void
  {
    $user = User::factory()->create();
    $apartment = Apartment::first();

    $this->actingAs($user)
      ->put('/admin', ['apartments' => [$apartment->id => ['status' => 'sold']]])
      ->assertSessionHasErrors("apartments.{$apartment->id}.status");
  }
}
