<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Broadway\EventHandling\SimpleEventBus;
use Broadway\EventDispatcher\CallableEventDispatcher;
use Boundless\Shared\EventDispatcher;
use Boundless\Shared\EventBus;

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
