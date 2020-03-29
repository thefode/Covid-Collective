<?php

namespace Covid\Resources\Domain;

final class Cost extends AttributeWithOptions
{
    protected function getPossibleOptions(): array
    {
        return [
            'Free',
            'Freemium',
            'Paid',
        ];
    }

}
