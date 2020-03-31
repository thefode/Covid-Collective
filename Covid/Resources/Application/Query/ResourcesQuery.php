<?php
namespace Covid\Resources\Application\Query;

use Illuminate\Database\Connection;
use Covid\Resources\Domain\Url;
use Covid\Resources\Domain\ResourceId;
use Covid\Resources\Domain\Exceptions\ResourceNotFound;

class ResourcesQuery
{

    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function getResources(array $filter = []): array
    {
        $query = $this->db->table('resources');

        foreach ($filter as $field => $options) {
            if ($field === 'url' && is_string($options)) {
                $url = new Url($options);

                $query->where('url', 'LIKE', "%{$url}%");
                continue;
            }

            $field = strtolower($field);
            if (!in_array($field, ['category', 'audience', 'cost', 'media'])) {
                continue;
            }
            
            $options = array_filter($options, fn($val) => is_string($val) && strlen($val) < 20);
            if (count($options) == 0) {
                continue;
            }

            $query->whereIn($field, $options);
        }
        
        $result = $query->get();

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
