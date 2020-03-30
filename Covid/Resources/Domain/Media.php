<?php

namespace Covid\Resources\Domain;

final class Media extends AttributeWithOptions
{
    protected function getPossibleOptions(): array
    {
        return [
            'Audio',
            'Social Media',
            'Text',
            'Video',
            'Website',
        ];
    }

}
