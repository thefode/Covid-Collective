<?php

namespace Covid\Resources\Application\Commands;

use Symfony\Component\Console\Descriptor\Descriptor;
use DateTimeImmutable;
use Covid\Resources\Domain\Url;
use Covid\Resources\Domain\Title;
use Covid\Resources\Domain\ResourceId;
use Covid\Resources\Domain\Media;
use Covid\Resources\Domain\Description;
use Covid\Resources\Domain\Cost;
use Covid\Resources\Domain\Category;
use Covid\Resources\Domain\Audience;

final class CreateResource
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
}
