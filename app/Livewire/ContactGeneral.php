<?php
namespace App\Livewire;
use Livewire\Attributes\Rule; 
use Livewire\Component;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactGeneralUserEmail;

class ContactGeneral extends Component
{
  public $request_type = 'general';

  #[Rule('required')]
  public $firstname;

  #[Rule('required')]
  public $name;

  public $address;

  public $location;

  #[Rule('required', 'email')]
  public $email;

  public $phone;

  public $date_of_birth;

  public $message;

  #[Rule('required')]
  public $privacy;

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
        'date_of_birth',
        'message',
      ])
    );

    Notification::route('mail', $contact->email)->notify(new ContactGeneralUserEmail($contact));
    session()->flash('status', 'Inquiry was submitted');
    $this->reset();
    $this->render();
  }

  public function render()
  {
    return view('livewire.contact-general');
  }
}
