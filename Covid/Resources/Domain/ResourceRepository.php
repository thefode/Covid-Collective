<?php

namespace Covid\Resources\Domain;

use Broadway\Domain\AggregateRoot;

interface ResourceRepository
{
    public function find($id): Resource;

    public function save(AggregateRoot $payment);
}
