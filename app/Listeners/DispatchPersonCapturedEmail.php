<?php

namespace App\Listeners;

use App\Events\PersonCaptured;
use App\Jobs\SendPersonCapturedEmailJob;

class DispatchPersonCapturedEmail
{
    public function handle(PersonCaptured $event): void
    {
        SendPersonCapturedEmailJob::dispatch($event->person);
    }
}