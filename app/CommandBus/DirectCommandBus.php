<?php

namespace App\CommandBus;

use App\CommandBus\Exception\HandlerNotFoundException;
use App\Domain\Command\Command;

final class DirectCommandBus implements CommandBus
{
    /**
     * Array of command handlers mapped by command classes, e.g.:
     * [CreateProduct::class => CreateProductService (callable)]
     */
    private static array $commandHandlers = [];

    public function dispatch(Command $command): void
    {
        $commandClass = get_class($command);
        if (!isset(self::$commandHandlers[$commandClass])) {
            throw new HandlerNotFoundException(sprintf(
                'Command "%s" has no handler registered.',
                $commandClass
            ));
        }

        $callable = self::$commandHandlers[$commandClass];
        $callable($command);
    }

    public static function registerHandler(string $commandClass, callable $handler): void
    {
        self::$commandHandlers[$commandClass] = $handler;
    }
}
