<?php

namespace App\Providers;

use App\Repositories\Contracts\PersonRepositoryInterface;
use App\Repositories\PersonRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
    }

    public function boot(): void
    {
        //
    }
}