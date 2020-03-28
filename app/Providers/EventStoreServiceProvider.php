<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Covid\Shared\EventStore;
use Covid\EventSourcing\RelationalEventStore;
use Covid\EventSourcing\InMemoryEventStore;

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
