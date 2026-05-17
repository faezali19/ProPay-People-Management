<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    public function run(): void
    {
        $interests = [
            'Reading', 'Sports', 'Cooking',
            'Travel', 'Music', 'Technology', 'Art',
        ];

        foreach ($interests as $interest) {
            Interest::create(['name' => $interest]);
        }
    }
}