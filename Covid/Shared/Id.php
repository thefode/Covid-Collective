<?php

namespace Covid\Shared;

use Ramsey\Uuid\Uuid;
use InvalidArgumentException;

class Id
{

    private $uuid;

    public function __construct(string $uuid)
    {
        if (Uuid::isValid($uuid) === false) {
            throw new InvalidArgumentException('Value passed to '.static::class.' was not a valid UUID');
        }

        $this->uuid = $uuid;
    }

    public static function new() : Id
    {
        return new static((string) Uuid::uuid4());
    }

    public function toString() : string
    {
        return (string) $this->uuid;
    }

    public function __toString()
    {
        return $this->uuid;
    }

    public static function fromString(string $string)
    {
        return new static($string);
    }

    public function equals($other)
    {
        return $this->uuid === $other->uuid;
    }

}
