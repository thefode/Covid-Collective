<?php

namespace Covid\Resources\Domain;

use DateTimeImmutable;
use Covid\Resources\Domain\Events\ResourceWasCreated;
use Broadway\EventSourcing\EventSourcedAggregateRoot;

final class Resource extends EventSourcedAggregateRoot
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

    /*
     * Getters
     */

    public function getAggregateRootId(): string
    {
        return $this->resourceId->toString();
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

    /*
     * Methods
     */

    public static function create(
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
        $resource = new static;

        $resource->apply(
            new ResourceWasCreated(
                $resourceId,
                $title,
                $description,
                $url,
                $audience,
                $category,
                $cost,
                $media,
                $createdAt
            )
        );

        return $resource;
    }

    /*
     *   Apply events
     */

    protected function applyResourceWasCreated(ResourceWasCreated $event)
    {
        $this->resourceId = $event->getResourceId();
        $this->title = $event->getTitle();
        $this->description = $event->getDescription();
        $this->url = $event->getUrl();
        $this->audience = $event->getAudience();
        $this->category = $event->getCategory();
        $this->cost = $event->getCost();
        $this->media = $event->getMedia();
        $this->createdAt = $event->getCreatedAt();
    }

}
