<?php

namespace Covid\Resources\Domain;

final class Category extends AttributeWithOptions
{
    protected function getPossibleOptions(): array
    {
        return [
            'Fitness',
            'Mental heath',
            'Teaching',
            'Social',
            'Entertainment',
            'Information',
            'Finance',
            'Support',
            'News',
        ];
    }

}
