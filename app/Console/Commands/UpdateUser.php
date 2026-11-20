<?php
namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

/**
 * Changes name, e-mail and/or password of an /admin login.
 *
 *   php artisan user:update anna@example.com                      (asks for everything)
 *   php artisan user:update anna@example.com --name="Anna Muster"
 *   php artisan user:update anna@example.com --email=neu@example.com
 *   php artisan user:update anna@example.com --password           (asks for the new password)
 *
 * The password is never passed as an option value, so it doesn't end up in the shell history.
 */
class UpdateUser extends Command
{
  protected $signature = 'user:update
                          {email : Current e-mail (login) of the user}
                          {--name= : New name}
                          {--email= : New e-mail (login)}
                          {--password : Set a new password (asked for)}';

  protected $description = 'Change name, e-mail and/or password of an /admin login';

  public function handle(): int
  {
    $user = User::where('email', $this->argument('email'))->first();

    if (! $user) {
      $this->error("Kein Zugang mit der E-Mail {$this->argument('email')} gefunden.");
      $emails = User::orderBy('email')->pluck('email');
      $this->line($emails->isEmpty() ? 'Es sind keine Zugänge erfasst.' : 'Vorhandene Zugänge: ' . $emails->implode(', '));

      return self::FAILURE;
    }

    // No options: ask for everything, with the current values as defaults.
    $interactive = ! $this->option('name') && ! $this->option('email') && ! $this->option('password');

    $name = $this->option('name') ?: ($interactive ? $this->ask('Name', $user->name) : $user->name);
    $email = $this->option('email') ?: ($interactive ? $this->ask('E-Mail', $user->email) : $user->email);

    $password = null;
    if ($this->option('password') || ($interactive && $this->confirm('Passwort ändern?', false))) {
      $password = $this->secret('Neues Passwort (min. 8 Zeichen)');
      if ($password !== $this->secret('Passwort wiederholen')) {
        $this->error('Die Passwörter stimmen nicht überein.');

        return self::FAILURE;
      }
    }

    $validator = Validator::make(
      compact('name', 'email', 'password'),
      [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        'password' => ['nullable', Password::min(8)],
      ],
      ['email.unique' => 'Diese E-Mail wird bereits für einen anderen Zugang verwendet.']
    );

    if ($validator->fails()) {
      foreach ($validator->errors()->all() as $error) {
        $this->error($error);
      }

      return self::FAILURE;
    }

    $user->name = $name;
    $user->email = $email;
    if ($password !== null) {
      $user->password = Hash::make($password);
    }

    $changed = array_keys($user->getDirty());

    if ($changed === []) {
      $this->info('Keine Änderungen.');

      return self::SUCCESS;
    }

    $user->save();

    $labels = ['name' => 'Name', 'email' => 'E-Mail', 'password' => 'Passwort'];
    $this->info("Zugang {$user->email} aktualisiert: " . collect($changed)->map(fn ($field) => $labels[$field] ?? $field)->implode(', ') . '.');

    return self::SUCCESS;
  }
}
