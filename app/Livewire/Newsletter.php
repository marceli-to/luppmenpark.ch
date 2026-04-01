<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\NewsletterSubscription;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewsletterUserEmail;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;

class Newsletter extends Component
{
  public $interest = [];
  public $preferred_house = [];
  public $preferred_floor = [];
  public $firstname;
  public $name;
  public $address;
  public $location;
  public $date_of_birth;
  public $email;
  public $phone;
  public $household_count;
  public $cooperative_member;
  public $privacy;

  protected function rules()
  {
    return [
      'interest' => 'required',
      'preferred_house' => 'required',
      'preferred_floor' => 'required',
      'firstname' => 'required',
      'name' => 'required',
      'address' => 'required',
      'location' => 'required',
      'date_of_birth' => 'required|date',
      'email' => 'required|email',
      'phone' => 'required',
      'household_count' => 'required',
      'cooperative_member' => 'required',
      'privacy' => 'accepted',
    ];
  }

  protected function validationAttributes()
  {
    return [
      'interest' => 'Interesse',
      'preferred_house' => 'Bevorzugtes Haus',
      'preferred_floor' => 'Bevorzugtes Stockwerk',
      'firstname' => 'Vorname',
      'name' => 'Name',
      'address' => 'Adresse',
      'location' => 'PLZ / Ort',
      'date_of_birth' => 'Geburtsdatum',
      'email' => 'E-Mail',
      'phone' => 'Telefon',
      'household_count' => 'Anzahl Personen im Haushalt',
      'cooperative_member' => 'Bereits Genossenschaftler, seit?',
      'privacy' => 'Datenschutzerklärung',
    ];
  }

  public function save()
  {
    $this->validate();

    $subscription = NewsletterSubscription::create([
      'interest' => implode(', ', $this->interest),
      'preferred_house' => implode(', ', $this->preferred_house),
      'preferred_floor' => implode(', ', $this->preferred_floor),
      'firstname' => $this->firstname,
      'name' => $this->name,
      'email' => $this->email,
      'address' => $this->address,
      'location' => $this->location,
      'phone' => $this->phone,
      'household_count' => $this->household_count,
      'cooperative_member' => $this->cooperative_member,
    ]);

    $subscription->date_of_birth = $this->validateAndFormatDate($this->date_of_birth);
    $subscription->save();

    Notification::route('mail', $subscription->email)->notify(new NewsletterUserEmail($subscription));
    session()->flash('status', 'Inquiry was submitted');
    $this->reset();
    redirect()->route('page.project');
  }

  public function render()
  {
    return view('livewire.newsletter');
  }

  private function validateAndFormatDate($date)
  {
    if (empty($date))
    {
      return null;
    }

    try
    {
      $carbonDate = Carbon::createFromFormat('Y-m-d', $date);
      return $carbonDate->format('Y-m-d');
    }
    catch (InvalidFormatException $e)
    {
      return null;
    }
  }
}
