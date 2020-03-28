<?php
namespace Covid\Shared;

interface CommandBus
{
    public function dispatch($command);

    public function subscribe($commandHandler);
}
