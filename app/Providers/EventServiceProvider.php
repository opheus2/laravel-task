<?php

namespace App\Providers;

use App\Events\LoggedIn;
use App\Events\RegisteredUser;
use App\Listeners\LoggedInUserListener;
use App\Listeners\RegisteredUserListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        RegisteredUser::class => [
            SendEmailVerificationNotification::class,
            RegisteredUserListener::class
        ],
        LoggedIn::class => [
            LoggedInUserListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
