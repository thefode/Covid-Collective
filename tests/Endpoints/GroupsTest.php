<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupsTest extends TestCase
{
    public function test_get_groups()
    {
        $response = $this->get('/api/groups');

        $response->assertStatus(200);
        $response->assertJson([]);
    }

    public function test_get_group_by_id()
    {
        $response = $this->get('/api/groups/9ae30e83-4e5a-4eca-a74c-4f7663c84cea');

        $response->assertStatus(200);
        $response->assertJson([
            'id' => '9ae30e83-4e5a-4eca-a74c-4f7663c84cea',
            //
        ]);
    }

    
}
