<?php

declare(strict_types=1);

namespace App\Shared\Http\Controller;

use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Command\CommandInterface;
use App\Shared\Application\Query\QueryBusInterface;
use App\Shared\Application\Request\RequestBusInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Throwable;
use App\Shared\Application\Request\RequestInterface;
use App\Shared\Application\Dto\DtoInterface;

abstract class CommandQueryController extends QueryController
{
    private CommandBusInterface $commandBus;
    private QueryBusInterface $queryBus;
    private RequestBusInterface $requestBus;

    public function __construct(
        CommandBusInterface $commandBus,
        QueryBusInterface $queryBus,
        RequestBusInterface $requestBus,
        UrlGeneratorInterface $router
    ) {
        parent::__construct($queryBus, $router);
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
        $this->requestBus = $requestBus;
    }

    /**
     * @throws Throwable
     */
    protected function handle(CommandInterface $command): void
    {
        $this->commandBus->handle($command);
    }

    protected function request(RequestInterface $request): DtoInterface
    {
        return $this->requestBus->handle($request);
    }
}
