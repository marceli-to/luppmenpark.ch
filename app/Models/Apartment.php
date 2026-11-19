<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
  public const STATES = [
    'free' => 'frei',
    'reserved' => 'reserviert',
    'rented' => 'vermietet',
  ];

  protected $fillable = [
    'number',
    'house',
    'floor',
    'rooms',
    'area',
    'rent',
    'share',
    'status',
    'sort',
    'updated_by',
  ];

  protected $casts = [
    'area' => 'float',
    'rent' => 'integer',
    'share' => 'integer',
    'sort' => 'integer',
  ];

  public function statusLabel(): string
  {
    return self::STATES[$this->status] ?? $this->status;
  }

  public function houseLabel(): string
  {
    return config("apartments.houses.{$this->house}.label", $this->house);
  }

  public function isFree(): bool
  {
    return $this->status === 'free';
  }

  public function areaLabel(): string
  {
    return number_format($this->area, 1, '.', '');
  }

  /** Formatted CHF amount, or null when there is no price yet ("auf Anfrage"). */
  public static function money(?int $value): ?string
  {
    return $value ? number_format($value, 0, '.', '’') : null;
  }

  /** Floor plan PDF: grundrisse/<number>.pdf if present, else the floor plan from config('apartments.plans'). */
  public function planUrl(): ?string
  {
    $paths = ["downloads/grundrisse/{$this->number}.pdf"];

    foreach (config('apartments.plans', []) as $key => $numbers) {
      if (in_array($this->number, $numbers, true)) {
        $paths[] = "downloads/grundrisse/Luppmenpark_Grundriss_{$key}.pdf";
      }
    }

    foreach ($paths as $path) {
      if (file_exists(public_path($path))) {
        return asset($path);
      }
    }

    return null;
  }
}
