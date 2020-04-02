<?php

namespace Covid\Resources\Domain;

final class Category extends AttributeWithOptions
{
    protected function getPossibleOptions(): array
    {
        return [
            'Entertainment',
            'Finance',
            'Fitness',
            'Information',
            'Mental heath',
            'News',
            'Research',
            'Social',
            'Support',
            'Teaching',
            'Volunteering',
        ];
    }

}
