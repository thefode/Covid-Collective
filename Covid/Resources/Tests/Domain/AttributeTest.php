<?php

namespace Covid\Resources\Domain;

use RuntimeException;
use PHPUnit\Framework\TestCase;

class AttributeTest extends TestCase
{
    /*
     *  Attributes with options
     */

    public function test_audience_invalid()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Invalid value for attribute Audience');

        new Audience('invalid');
    }

    public function test_audience()
    {
        $audience = new Audience('parents');

        $this->assertEquals('Parents', (string)$audience);
    }

    public function test_category()
    {
        $category = new Category('fitness');

        $this->assertEquals('Fitness', (string)$category);
    }

    public function test_cost()
    {
        $cost = new Cost('freemium');

        $this->assertEquals('Freemium', (string)$cost);
    }

    public function test_media()
    {
        $media = new Media('audio');

        $this->assertEquals('Audio', (string)$media);
    }

    /*
     *  Attributes with length
     */

    public function test_title_invalid()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Invalid value for attribute Title');

        new Title('A');
    }

    public function test_title()
    {
        $title = new Title('My nice title');

        $this->assertEquals('My nice title', (string)$title);
    }

    public function test_description()
    {
        $description = new Description('My nice description');

        $this->assertEquals('My nice description', (string)$description);
    }

    /*
     *  Attributes with filter
     */

    public function test_url_invalid()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Invalid value for attribute Url');

        new Url('A');
    }

    public function test_url()
    {
        $url = new Url('https://covid-collective.co.uk');

        $this->assertEquals('https://covid-collective.co.uk', (string)$url);
    }
}
