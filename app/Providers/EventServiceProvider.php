<?php

namespace App\Providers;

use App\Events\PersonCaptured;
use App\Listeners\DispatchPersonCapturedEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        PersonCaptured::class => [
            DispatchPersonCapturedEmail::class,
        ],
    ];

    public function boot(): void {}
}