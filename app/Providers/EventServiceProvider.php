<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Covid\Shared\EventDispatcher;
use Covid\Shared\EventBus;
use Broadway\EventHandling\SimpleEventBus;
use Broadway\EventDispatcher\CallableEventDispatcher;

class EventServiceProvider extends ServiceProvider
{

    public function register()
    {
        /*
        $this->app->singleton(EventDispatcher::class, function () {
            return new CallableEventDispatcher();
        });
        */

        $this->app->singleton(EventBus::class, function () {
            return new SimpleEventBus();
        });
    }

    public function boot()
    {
        //
    }

}
