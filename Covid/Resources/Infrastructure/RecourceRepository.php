<?php

namespace Covid\Resources\Infrastructure;

use Covid\Resources\Domain\ResourceRepository as ResourceRepositoryInterface;
use Covid\Resources\Domain\Resource;
use Covid\Resources\Domain\Exceptions\ResourceNotFound;
use Broadway\EventStore\EventStore;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventHandling\EventBus;
use Broadway\Domain\AggregateRoot;

class ResourceRepository extends EventSourcingRepository implements ResourceRepositoryInterface
{
    public function __construct(EventStore $eventStore, EventBus $eventBus)
    {
        parent::__construct($eventStore, $eventBus, Resource::class, new PublicConstructorAggregateFactory());
    }

    public function find($id) : Resource
    {
        $resource = parent::load($id);

        if ($resource->getPlayhead() === -1) {
            throw new ResourceNotFound('Resource '.$id.' not found');
        }

        return $resource;
    }

    public function save(AggregateRoot $resource) : void
    {
        parent::save($resource);
    }

}
