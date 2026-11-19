<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Status and prices of the apartments. The apartments themselves come from the
 * Mieterspiegel (config/apartments.php, `apartments:seed`) and are not created
 * or deleted here.
 */
class ApartmentController extends Controller
{
  public function index()
  {
    return view('admin.apartments', [
      'apartments' => Apartment::orderBy('sort')->get()->groupBy('house'),
      'states' => Apartment::STATES,
    ]);
  }

  public function update(Request $request)
  {
    $validated = $request->validate([
      'apartments' => ['required', 'array'],
      'apartments.*.status' => ['required', Rule::in(array_keys(Apartment::STATES))],
      'apartments.*.rent' => ['nullable', 'integer', 'min:0', 'max:100000'],
      'apartments.*.share' => ['nullable', 'integer', 'min:0', 'max:1000000'],
    ], [
      'apartments.*.status.required' => 'Bitte einen Status wählen.',
      'apartments.*.status.in' => 'Unbekannter Status.',
      'apartments.*.rent.integer' => 'Der Mietzins muss eine Zahl sein.',
      'apartments.*.share.integer' => 'Der Wohnanteil muss eine Zahl sein.',
    ]);

    $apartments = Apartment::whereIn('id', array_keys($validated['apartments']))->get()->keyBy('id');
    $changed = 0;

    foreach ($validated['apartments'] as $id => $values) {
      $apartment = $apartments->get($id);

      if (! $apartment) {
        continue;
      }

      // Empty or 0 = "auf Anfrage".
      $values['rent'] = ($values['rent'] ?? null) ?: null;
      $values['share'] = ($values['share'] ?? null) ?: null;

      $apartment->fill($values);

      if ($apartment->isDirty()) {
        $apartment->updated_by = $request->user()->name;
        $apartment->save();
        $changed++;
      }
    }

    return redirect()
      ->route('admin.apartments.index')
      ->with('status', match ($changed) {
        0 => 'Keine Änderungen vorgenommen.',
        1 => '1 Wohnung aktualisiert.',
        default => "{$changed} Wohnungen aktualisiert.",
      });
  }
}
