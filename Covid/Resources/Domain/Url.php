<?php

namespace Covid\Resources\Domain;

final class Url extends AttributeWithFilter
{
    protected function getFilter(): string
    {
        return FILTER_VALIDATE_URL;
    }

}
