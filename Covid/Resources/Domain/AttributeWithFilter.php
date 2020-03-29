<?php

namespace Covid\Resources\Domain;

use RuntimeException;
use ReflectionClass;

abstract class AttributeWithFilter extends Attribute
{
    abstract protected function getFilter(): string;

    protected function validateValue(string $value): string
    {
        if (!filter_var($value, $this->getFilter())) {
            $reflect = new ReflectionClass($this);
            throw new RuntimeException('Invalid value for attribute '.$reflect->getShortName());
        }

        return $value;
    }
}
