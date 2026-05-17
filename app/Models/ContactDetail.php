<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'email_address',
        'mobile_number',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}