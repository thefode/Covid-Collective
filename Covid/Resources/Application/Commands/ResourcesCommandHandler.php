<?php
namespace Covid\Resources\Application\Commands;

use Covid\Resources\Infrastructure\ResourceRepository;
use Covid\Resources\Domain\Resource;
use Broadway\CommandHandling\SimpleCommandHandler;

class ResourcesCommandHandler extends SimpleCommandHandler
{

    private $resources;

    public function __construct(ResourceRepository $resources)
    {
        $this->resources  = $resources;
    }

    public function handleCreateResource(CreateResource $command)
    {
        $resource = Resource::create(
            $command->getResourceId(),
            $command->getTitle(),
            $command->getDescription(),
            $command->getUrl(),
            $command->getAudience(),
            $command->getCategory(),
            $command->getCost(),
            $command->getMedia(),
            $command->getCreatedAt()
        );

        $this->resources->save($resource);
    }

}
