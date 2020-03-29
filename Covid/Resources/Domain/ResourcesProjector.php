<?php

namespace Covid\Resources\Domain;

use Illuminate\Database\Connection;
use Covid\Resources\Domain\ResourceRepository;
use Covid\Resources\Domain\Events\ResourceWasCreated;
use Broadway\ReadModel\Projector;

class ResourcesProjector extends Projector
{

    private $db;

    public function __construct(Connection $db, ResourceRepository $resources)
    {
        $this->db       = $db;
        $this->resources = $resources;
    }

    public function applyResourceWasCreated(ResourceWasCreated $event)
    {
        $this->db->table('resources')->insert(
            [
                'id' => (string) $event->getResourceId(),
                'title' => (string) $event->getTitle(),
                'description' => (string) $event->getDescription(),
                'url' => (string) $event->getUrl(),
                'audience' => (string) $event->getAudience(),
                'category' => (string) $event->getCategory(),
                'cost' => (string) $event->getCost(),
                'media' => (string) $event->getMedia(),
                'createdAt' => (string) $event->getCreatedAt()->format('Y-m-d H:i:s'),
            ]
        );
    }


}
