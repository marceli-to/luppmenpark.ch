<?php
namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

/**
 * Creates a login for /admin (or resets its password). A command rather than a
 * seeder, so no default password ends up in the repository.
 */
class CreateUser extends Command
{
  protected $signature = 'user:create
                          {--name= : Name}
                          {--email= : E-mail (login)}';

  protected $description = 'Create a login for /admin or reset its password';

  public function handle(): int
  {
    $name = $this->option('name') ?: $this->ask('Name');
    $email = $this->option('email') ?: $this->ask('E-Mail');
    $password = $this->secret('Passwort (min. 8 Zeichen)');

    $validator = Validator::make(
      compact('name', 'email', 'password'),
      [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', Password::min(8)],
      ]
    );

    if ($validator->fails()) {
      foreach ($validator->errors()->all() as $error) {
        $this->error($error);
      }

      return self::FAILURE;
    }

    $user = User::updateOrCreate(
      ['email' => $email],
      ['name' => $name, 'password' => Hash::make($password)]
    );

    $this->info($user->wasRecentlyCreated
      ? "Zugang angelegt: {$user->email}"
      : "Passwort aktualisiert: {$user->email}");

    return self::SUCCESS;
  }
}
