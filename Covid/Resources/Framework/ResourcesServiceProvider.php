<?php

namespace Covid\Resources\Framework;

use Illuminate\Support\ServiceProvider;
use Covid\Shared\EventStore;
use Covid\Shared\EventBus;
use Covid\Shared\CommandBus;
use Covid\Resources\Infrastructure\ResourceRepository;
use Covid\Resources\Domain\ResourcesProjector;
use Covid\Resources\Domain\ResourceRepository as ResourceRepositoryInterface;
use Covid\Resources\Application\ResourcesQuery;
use Covid\Resources\Application\Commands\ResourcesCommandHandler;

class ResourcesServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $eventBus = $this->app->get(EventBus::class);

        $eventBus->subscribe(
            new ResourcesProjector(
                $this->app->make('db')->connection(),
                $this->app->get(ResourceRepositoryInterface::class)
            )
        );
        
        /* 
        $eventBus->subscribe(
            new EventHandler($this->app->make(CommandBus::class))
        );
        */

        /*
         *  Register the commands
         */
        $commandBus = $this->app->get(CommandBus::class);

        $ResourcesCommandHandler = new ResourcesCommandHandler(
            $this->app->get(ResourceRepositoryInterface::class)
        );

        // Create a command bus and subscribe the command handler at the command bus
        $commandBus->subscribe($ResourcesCommandHandler);
    }

    public function register()
    {
        $this->app->bind(
            ResourceRepositoryInterface::class,
            function () {
                return new ResourceRepository(
                    $this->app->get(EventStore::class),
                    $this->app->get(EventBus::class)
                );
            }
        );

        $this->app->bind(
            ResourcesQuery::class,
            function () {
                return new ResourcesQuery(
                    $this->app->make('db')->connection()
                );
            }
        );

    }

}
