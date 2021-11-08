<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\MessageBus;

use App\Shared\Infrastructure\MessageBus\Exception\HandlerNotFoundException;
use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Command\CommandInterface;

class CommandBus extends AbstractBus implements CommandBusInterface
{
    public function handle(CommandInterface $command): void
    {
        $commandClass = $command::class;
        if (!$this->hasHandler($commandClass)) {
            throw new HandlerNotFoundException("CommandHandler $commandClass not registered");
        }

        $this->handlers[$command::class]->handle($command);
    }
}
