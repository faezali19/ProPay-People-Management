<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'language_id',
        'name',
        'surname',
        'birth_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function contactDetail()
    {
        return $this->hasOne(ContactDetail::class);
    }

    public function identityDocument()
    {
        return $this->hasOne(IdentityDocument::class);
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'person_interest');
    }
}