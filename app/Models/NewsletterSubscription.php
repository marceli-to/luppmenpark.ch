<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscription extends Model
{
  protected $fillable = [
    'interest',
    'firstname',
    'name',
    'address',
    'location',
    'email',
    'phone',
    'date_of_birth',
    'household_count',
    'cooperative_member',
  ];

  protected $casts = [
    'date_of_birth' => 'date:d.m.Y',
  ];
}
