<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Boundless\Shared\EventStore;
use Boundless\EventSourcing\RelationalEventStore;
use Boundless\EventSourcing\InMemoryEventStore;

class EventStoreServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(EventStore::class, function () {
            //return new InMemoryEventStore();

            return new RelationalEventStore(
                app('db')->connection()
            );
        });
    }

    public function boot()
    {
        //
    }

}
