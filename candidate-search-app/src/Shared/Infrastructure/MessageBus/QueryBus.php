<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\MessageBus;

use App\Shared\Infrastructure\MessageBus\Exception\HandlerNotFoundException;
use App\Shared\Application\Query\QueryInterface;
use App\Shared\Application\Dto\DtoInterface;
use App\Shared\Application\Query\QueryBusInterface;

class QueryBus extends AbstractBus implements QueryBusInterface
{
    /**
     * @param \App\Shared\Application\Query\QueryInterface $query
     * @return \App\Shared\Application\Dto\DtoInterface
     */
    public function ask(QueryInterface $query): DtoInterface
    {
        $queryClass = $query::class;
        if (!$this->hasHandler($queryClass)) {
            throw new HandlerNotFoundException("QueryHandler $queryClass not registered");
        }

        return $this->handlers[$query::class]->ask($query);
    }
}
