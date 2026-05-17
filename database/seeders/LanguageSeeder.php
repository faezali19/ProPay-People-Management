<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            'English', 'Afrikaans', 'Zulu', 'Xhosa',
            'Sotho', 'Tswana', 'Venda', 'Tsonga',
            'Swati', 'Ndebele', 'Sepedi',
        ];

        foreach ($languages as $language) {
            Language::create(['name' => $language]);
        }
    }
}