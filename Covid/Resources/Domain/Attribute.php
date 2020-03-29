<?php

namespace Covid\Resources\Domain;

use RuntimeException;
use ReflectionClass;

abstract class Attribute
{
    private $value;

    public function __construct(string $value)
    {
        $value = $this->validateValue($value);

        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }

    abstract protected function validateValue(string $value): string;
}
