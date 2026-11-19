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

  /** Floor plan PDF, placed by hand as public/downloads/grundrisse/<number>.pdf. */
  public function planUrl(): ?string
  {
    $path = "downloads/grundrisse/{$this->number}.pdf";

    return file_exists(public_path($path)) ? asset($path) : null;
  }
}
