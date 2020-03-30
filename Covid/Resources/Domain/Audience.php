<?php

namespace Covid\Resources\Domain;

final class Audience extends AttributeWithOptions
{
    protected function getPossibleOptions(): array
    {
        return [
            'Anyone'
            'Kids',
            'Parents',
            'LGBT',
            'Vulnerable',
            'Business',
        ];
    }

}
