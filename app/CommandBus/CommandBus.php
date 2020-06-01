<?php

namespace App\CommandBus;

use App\Domain\Command\Command;

interface CommandBus
{
    public function dispatch(Command $command): void;
}
