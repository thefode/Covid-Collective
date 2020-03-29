<?php

namespace Covid\Resources\Domain;

use RuntimeException;
use ReflectionClass;

abstract class AttributeWithLength extends Attribute
{
    abstract protected function getMinLength(): int;

    abstract protected function getMaxLength(): int;

    protected function validateValue(string $value): string
    {
        if (strlen($value) > $this->getMaxLength() || strlen($value) < $this->getMinLength()) {
            $reflect = new ReflectionClass($this);
            throw new RuntimeException('Invalid value for attribute '.$reflect->getShortName());
        }

        return $value;
    }
}
