<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisteredUserListener implements ShouldQueue, ShouldBeUnique
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Add user registeration activity log
        activity('register')
            ->causedBy($event->user)
            ->event('register')
            ->withProperties([
                'ip' => $event->location->ip,
                'country' => $event->location->countryName,
                'City' => $event->location->cityName
            ])
            ->log('Registered successfully');
    }
}
