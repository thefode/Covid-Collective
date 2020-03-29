<?php

namespace Covid\Resources\Domain;

use RuntimeException;
use PHPUnit\Framework\TestCase;
use DateTimeImmutable;

class ResourcesTest extends TestCase
{

    public function test_resource_create()
    {
        $resource = Resource::create(
            ResourceId::new(),
            new Title('Title'),
            new Description('Description'),
            new Url('https://example.com'),
            new Audience('parents'),
            new Category('fitness'),
            new Cost('freemium'),
            new Media('video'),
            new DateTimeImmutable()
        );

        $this->assertInstanceOf(Resource::class, $resource);
    }
}
