<?php
namespace App\Livewire;
use Livewire\Attributes\Validate; 
use Livewire\Component;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactUserEmail;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;

class ContactMember extends Component
{
  public $request_type = 'member';

  #[Validate('required')]
  public $firstname;

  #[Validate('required')]
  public $name;

  #[Validate('required')]
  public $address;

  #[Validate('required')]
  public $location;

  #[Validate(['required', 'email'])]
  public $email;

  #[Validate('required')]
  public $phone;

  #[Validate('required')]
  public $date_of_birth;

  #[Validate('required')]
  public $message;

  #[Validate('accepted')]
  public $privacy;

  #[Validate('accepted')]
  public $commit;

  public function save()
  {
    $this->validate();
    
    $contact = ContactRequest::create(
      $this->only([
        'request_type',
        'name', 
        'firstname',
        'email', 
        'address',
        'location',
        'phone',
        'message',
      ])
    );

    $contact->date_of_birth = $this->validateAndFormatDate($this->date_of_birth);
    $contact->save();

    Notification::route('mail', $contact->email)->notify(new ContactUserEmail($contact));
    session()->flash('status', 'Inquiry was submitted');
    $this->reset();
    redirect()->route('page.project');
  }

  public function render()
  {
    return view('livewire.contact-member');
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
