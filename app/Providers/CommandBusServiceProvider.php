<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Covid\Shared\CommandBus;
use Broadway\CommandHandling\SimpleCommandBus;

class CommandBusServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(CommandBus::class, function () {

            return new class(new SimpleCommandBus()) implements CommandBus
            {

                private $bus;

                public function __construct(SimpleCommandBus $bus)
                {
                    $this->bus = $bus;
                }

                public function dispatch($command)
                {
                    $this->bus->dispatch($command);
                }

                public function subscribe($command_handler)
                {
                    $this->bus->subscribe($command_handler);
                }
            };

        });
    }

    public function boot()
    {
        //
    }

}
