<?php

namespace Covid\Resources\Domain;

final class Description extends AttributeWithLength
{
    protected function getMinLength(): int
    {
        return 10;
    }
    
    protected function getMaxLength(): int
    {
        return 1000;
    }

}
