<?php

namespace Tests\Feature;

use App\Livewire\ContactGeneral;
use App\Livewire\ContactInvestor;
use App\Livewire\ContactMember;
use App\Livewire\Newsletter;
use App\Models\ContactRequest;
use App\Models\NewsletterSubscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;
use Tests\TestCase;

class FormsTest extends TestCase
{
  use RefreshDatabase;

  private array $person = [
    'firstname' => 'Anna',
    'name' => 'Muster',
    'address' => 'Dorfstrasse 1',
    'location' => '8335 Hittnau',
    'email' => 'anna@example.com',
    'phone' => '044 000 00 00',
  ];

  protected function setUp(): void
  {
    parent::setUp();
    Notification::fake();
  }

  public function test_general_contact_form_is_saved(): void
  {
    $component = Livewire::test(ContactGeneral::class);
    foreach ($this->person + ['message' => 'Hallo', 'privacy' => true] as $key => $value) {
      $component->set($key, $value);
    }
    $component->call('save')->assertHasNoErrors()->assertRedirect(route('page.project'));

    $this->assertSame('general', ContactRequest::sole()->request_type);
  }

  public function test_member_contact_form_is_saved(): void
  {
    $component = Livewire::test(ContactMember::class);
    foreach ($this->person + ['date_of_birth' => '1950-05-01', 'message' => 'Hallo', 'privacy' => true, 'commit' => true] as $key => $value) {
      $component->set($key, $value);
    }
    $component->call('save')->assertHasNoErrors();

    $this->assertSame('member', ContactRequest::sole()->request_type);
  }

  public function test_investor_contact_form_is_saved(): void
  {
    $component = Livewire::test(ContactInvestor::class);
    foreach ($this->person + ['message' => 'Hallo', 'privacy' => true] as $key => $value) {
      $component->set($key, $value);
    }
    $component->call('save')->assertHasNoErrors();

    $this->assertSame('investor', ContactRequest::sole()->request_type);
  }

  public function test_contact_form_rejects_an_invalid_email(): void
  {
    Livewire::test(ContactGeneral::class)
      ->set('email', 'not-an-email')
      ->call('save')
      ->assertHasErrors(['email' => 'email']);
  }

  public function test_living_form_is_saved(): void
  {
    $component = Livewire::test(Newsletter::class)
      ->set('interest', ['3.5-Zimmerwohnung'])
      ->set('preferred_house', ['Scheune'])
      ->set('preferred_floor', ['Erdgeschoss'])
      ->set('date_of_birth', '1950-05-01')
      ->set('household_count', '2')
      ->set('cooperative_member', 'nein')
      ->set('privacy', true);
    foreach ($this->person as $key => $value) {
      $component->set($key, $value);
    }
    $component->call('save')->assertHasNoErrors();

    $subscription = NewsletterSubscription::sole();
    $this->assertSame('3.5-Zimmerwohnung', $subscription->interest);
    $this->assertStringStartsWith('1950-05-01', (string) $subscription->date_of_birth);
  }
}
