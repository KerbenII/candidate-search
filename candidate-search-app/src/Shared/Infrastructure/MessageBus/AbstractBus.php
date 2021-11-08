<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\MessageBus;

use JetBrains\PhpStorm\Pure;

class AbstractBus
{
    protected array $handlers = [];

    public function __construct(array $handlers)
    {
        foreach ($handlers as $handlerClass => $handler) {
            $this->registerHandler($handlerClass, $handler);
        }
    }

    /**
     * @param string $handlerClassName
     * @param $handler
     */
    protected function registerHandler(string $handlerClassName, $handler)
    {
        if ($this->hasHandler($handlerClassName)) {
            return;
        }

        $this->handlers[$handlerClassName] = $handler;
    }

    #[Pure] protected function hasHandler(string $className): bool
    {
        return in_array($className, array_keys($this->handlers));
    }
}
