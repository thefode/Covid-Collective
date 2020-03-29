<?php
namespace Covid\Resources\Application\Query;

use Illuminate\Database\Connection;
use Covid\Resources\Domain\ResourceId;
use Covid\Resources\Domain\Exceptions\ResourceNotFound;

class ResourcesQuery
{

    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function getResources()
    {
        $result = $this->db->table('resources')->get();

        if (!$result) {
            throw new ResourceNotFound();
        }

        return (array) $result->toArray();
    }

    public function find(ResourceId $resourceId)
    {
        $result = $this->db->table('resources')->where('id', (string) $resourceId)->first();

        if (!$result) {
            throw new ResourceNotFound();
        }

        return (array) $result;
    }

}
