<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
  use RefreshDatabase;

  public function test_updates_name_and_email_via_options(): void
  {
    $user = User::factory()->create(['name' => 'Anna', 'email' => 'anna@example.com']);

    $this->artisan('user:update', ['email' => 'anna@example.com', '--name' => 'Anna Muster', '--email' => 'neu@example.com'])
      ->expectsOutputToContain('aktualisiert: Name, E-Mail')
      ->assertSuccessful();

    $user->refresh();
    $this->assertSame('Anna Muster', $user->name);
    $this->assertSame('neu@example.com', $user->email);
  }

  public function test_updates_password(): void
  {
    $user = User::factory()->create(['email' => 'anna@example.com']);

    $this->artisan('user:update', ['email' => 'anna@example.com', '--password' => true])
      ->expectsQuestion('Neues Passwort (min. 8 Zeichen)', 'ein-neues-passwort')
      ->expectsQuestion('Passwort wiederholen', 'ein-neues-passwort')
      ->assertSuccessful();

    $this->assertTrue(Hash::check('ein-neues-passwort', $user->refresh()->password));
  }

  public function test_interactive_mode_keeps_defaults(): void
  {
    $user = User::factory()->create(['name' => 'Anna', 'email' => 'anna@example.com']);

    $this->artisan('user:update', ['email' => 'anna@example.com'])
      ->expectsQuestion('Name', 'Anna B.')
      ->expectsQuestion('E-Mail', 'anna@example.com')
      ->expectsConfirmation('Passwort ändern?', 'no')
      ->expectsOutputToContain('aktualisiert: Name')
      ->assertSuccessful();

    $this->assertSame('Anna B.', $user->refresh()->name);
  }

  public function test_rejects_mismatched_passwords_short_passwords_and_taken_emails(): void
  {
    User::factory()->create(['email' => 'anna@example.com']);
    User::factory()->create(['email' => 'bea@example.com']);

    $this->artisan('user:update', ['email' => 'anna@example.com', '--password' => true])
      ->expectsQuestion('Neues Passwort (min. 8 Zeichen)', 'ein-neues-passwort')
      ->expectsQuestion('Passwort wiederholen', 'etwas-anderes')
      ->assertFailed();

    $this->artisan('user:update', ['email' => 'anna@example.com', '--password' => true])
      ->expectsQuestion('Neues Passwort (min. 8 Zeichen)', 'kurz')
      ->expectsQuestion('Passwort wiederholen', 'kurz')
      ->assertFailed();

    $this->artisan('user:update', ['email' => 'anna@example.com', '--email' => 'bea@example.com'])
      ->expectsOutputToContain('bereits für einen anderen Zugang')
      ->assertFailed();
  }

  public function test_unknown_user_lists_existing_logins(): void
  {
    User::factory()->create(['email' => 'anna@example.com']);

    $this->artisan('user:update', ['email' => 'niemand@example.com'])
      ->expectsOutputToContain('Vorhandene Zugänge: anna@example.com')
      ->assertFailed();
  }
}
