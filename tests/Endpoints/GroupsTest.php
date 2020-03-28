<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupsTest extends TestCase
{
    public function test_get_groups()
    {
        $response = $this->get('/groups');

        $response->assertStatus(200);
        $response->assertJson([]);
    }

    public function test_get_group_by_id()
    {
        $response = $this->get('/groups/bd2b3e2f-74a9-4eb6-9a70-853af14a7510');

        $response->assertStatus(200);
        $response->assertJson([
            'id' => 'bd2b3e2f-74a9-4eb6-9a70-853af14a7510',
            //
        ]);
    }

    
}
