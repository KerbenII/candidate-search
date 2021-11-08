<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\MessageBus;

use App\Shared\Infrastructure\MessageBus\Exception\HandlerNotFoundException;
use App\Shared\Application\Request\RequestBusInterface;
use App\Shared\Application\Request\RequestInterface;
use App\Shared\Application\Dto\DtoInterface;

final class RequestBus extends AbstractBus implements RequestBusInterface
{
    public function handle(RequestInterface $request): DtoInterface
    {
        $requestClass = $request::class;
        if (!$this->hasHandler($requestClass)) {
            throw new HandlerNotFoundException("RequestHandler $requestClass not registered");
        }

        return $this->handlers[$request::class]->handle($request);
    }
}
