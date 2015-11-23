<?php

namespace SBAnalysis\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'SBAnalysis\Events\SomeEvent' => [
            'SBAnalysis\Listeners\EventListener',
        ],

        'SBAnalysis\Events\EnviaEmailNovoUsuarioEvent' => [
            'SBAnalysis\Listeners\EnviaEmailNovoUsuarioListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
