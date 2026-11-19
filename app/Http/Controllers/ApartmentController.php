<?php
namespace App\Http\Controllers;

use App\Models\Apartment;

class ApartmentController extends Controller
{
  public function index()
  {
    $apartments = Apartment::orderBy('sort')->get()->groupBy('house');

    // Houses in config order, only those with apartments.
    $houses = collect(config('apartments.houses'))
      ->filter(fn ($house, $key) => $apartments->has($key))
      ->map(fn ($house, $key) => $house + ['apartments' => $apartments->get($key)]);

    return view('pages.apartments', [
      'houses' => $houses,
      'applicationForm' => asset(config('apartments.application_form')),
    ]);
  }
}
