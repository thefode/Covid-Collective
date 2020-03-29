<?php

namespace Covid\Resources\Domain\Events;

use Symfony\Component\Console\Descriptor\Descriptor;
use DateTimeImmutable;
use Covid\Resources\Domain\Url;
use Covid\Resources\Domain\Title;
use Covid\Resources\Domain\ResourceId;
use Covid\Resources\Domain\Resource;
use Covid\Resources\Domain\Media;
use Covid\Resources\Domain\Description;
use Covid\Resources\Domain\Cost;
use Covid\Resources\Domain\Category;
use Covid\Resources\Domain\Audience;

final class ResourceWasCreated
{
    private $resourceId;
    private $title;
    private $description;
    private $url;
    private $audience;
    private $category;
    private $cost;
    private $media;
    private $createdAt;

    public function __construct(
        ResourceId $resourceId,
        Title $title,
        Description $description,
        Url $url,
        Audience $audience,
        Category $category,
        Cost $cost,
        Media $media,
        DateTimeImmutable $createdAt
    ) {
        $this->resourceId = $resourceId;
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->audience = $audience;
        $this->category = $category;
        $this->cost = $cost;
        $this->media = $media;
        $this->createdAt = $createdAt;
    }

    public function getResourceId()
    {
        return $this->resourceId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getAudience()
    {
        return $this->audience;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function serialize(): string
    {
        return json_encode([
            'resourceId' => (string)$this->resourceId,
            'title' => (string)$this->title,
            'description' => (string)$this->description,
            'url' => (string)$this->url,
            'audience' => (string)$this->audience,
            'category' => (string)$this->category,
            'cost' => (string)$this->cost,
            'media' => (string)$this->media,
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
        ]);
    }

    public static function deserialize(string $json): ResourceWasCreated
    {
        $payload = json_decode($json);

        return new ResourceWasCreated(
            new ResourceId($payload->resourceId),
            new Title($payload->title),
            new Description($payload->description),
            new Url($payload->url),
            new Audience($payload->audience),
            new Category($payload->category),
            new Cost($payload->cost),
            new Media($payload->media),
            new DateTimeImmutable($payload->createdAt)
        );
    }
}
