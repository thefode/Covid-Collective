<?php

namespace Covid\Resources\Domain;

final class Title extends AttributeWithLength
{
    protected function getMinLength(): int
    {
        return 5;
    }
    
    protected function getMaxLength(): int
    {
        return 200;
    }

}
