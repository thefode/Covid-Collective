<?php

namespace Covid\Resources\Domain;

final class Media extends AttributeWithOptions
{
    protected function getPossibleOptions(): array
    {
        return [
            'Website',
            'Video',
            'Audio',
            'Reading',
            'Social Media',
        ];
    }

}
