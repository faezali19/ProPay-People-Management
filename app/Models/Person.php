<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'sa_id_number',
        'mobile_number',
        'email_address',
        'birth_date',
        'language',
        'interests',
    ];
}