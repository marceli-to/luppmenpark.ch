<?php
namespace App\Console\Commands;

use App\Models\Apartment;
use Illuminate\Console\Command;

/**
 * Writes the Mieterspiegel from config/apartments.php to the database. Safe to
 * re-run: facts (floor, rooms, area, sort) are updated, the status set in
 * /admin is kept. Rent and share are only set on creation, or with --prices.
 */
class SeedApartments extends Command
{
  protected $signature = 'apartments:seed {--prices : Also overwrite rent and share from the config}';

  protected $description = 'Create or update the apartments from config/apartments.php';

  public function handle(): int
  {
    $sort = 0;
    $created = 0;

    foreach (config('apartments.units') as $house => $units) {
      foreach ($units as [$number, $floor, $rooms, $area, $rent, $share]) {
        $apartment = Apartment::firstOrNew(['number' => $number]);
        $apartment->fill([
          'house' => $house,
          'floor' => $floor,
          'rooms' => $rooms,
          'area' => $area,
          'sort' => ++$sort,
        ]);

        if (! $apartment->exists || $this->option('prices')) {
          $apartment->rent = $rent ?: null;
          $apartment->share = $share ?: null;
        }

        $created += $apartment->exists ? 0 : 1;
        $apartment->save();
      }
    }

    $this->info("{$sort} Wohnungen abgeglichen, {$created} neu angelegt.");

    return self::SUCCESS;
  }
}
