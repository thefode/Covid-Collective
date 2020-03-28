<?php

namespace Covid\Groups\Application;

use Illuminate\Database\Connection;
use Covid\Groups\Domain\TrailId;
use Covid\Groups\Domain\GroupId;

class Groups
{

    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }
    
    public function getGroups()
    {
        $groups = $this->db->table('groups')
            ->where([
                'status' => 'active'
            ])
            ->get();

        return $groups->toArray();
    }

    public function getGroupById(GroupId $groupId)
    {
        $group = $this->db->table('groups')
            ->where([
                'id' => $groupId,
                // 'status' => 'active'
            ])
            ->first();

        return (array)$group;
    }
}
