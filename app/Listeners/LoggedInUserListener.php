<?php

namespace App\Listeners;

use App\Notifications\LoggedInNotification;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoggedInUserListener implements ShouldQueue, ShouldBeUnique
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
        // Add login activity log
        activity('login')
            ->causedBy($event->user)
            ->event('login')
            ->withProperties([
                'ip' => $event->location->ip,
                'country' => $event->location->countryName,
                'City' => $event->location->cityName
            ])
            ->log('logged in from');

        $event->user->notify(new LoggedInNotification($event->location));
    }
}
