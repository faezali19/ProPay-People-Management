<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentityDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'sa_id_number',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}