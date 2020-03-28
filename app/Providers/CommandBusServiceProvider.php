<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Broadway\CommandHandling\SimpleCommandBus;
use Boundless\Shared\CommandBus;

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
