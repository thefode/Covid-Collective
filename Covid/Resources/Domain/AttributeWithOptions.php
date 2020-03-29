<?php

namespace Covid\Resources\Domain;

use RuntimeException;
use ReflectionClass;

abstract class AttributeWithOptions extends Attribute
{
    abstract protected function getPossibleOptions(): array;

    protected function validateValue(string $value): string
    {
        $possible = $this->getPossibleOptions();
        $clean = false;

        foreach ($possible as $p) {
            if (strtolower($p) === strtolower($value)) {
                $clean = $p;
                break;
            }
        }

        if ($clean === false) {
            $reflect = new ReflectionClass($this);
            throw new RuntimeException('Invalid value for attribute '.$reflect->getShortName());
        }

        return $clean;
    }
}
