<?php

declare(strict_types=1);

namespace App\Shared\Http\Controller;

use App\Shared\Application\Query\QueryBusInterface;
use App\Shared\Application\Query\QueryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Shared\Application\Dto\DtoInterface;

abstract class QueryController extends AbstractController
{
    private QueryBusInterface $queryBus;

    private UrlGeneratorInterface $router;

    public function __construct(
        QueryBusInterface $queryBus,
        UrlGeneratorInterface $router
    ) {
        $this->queryBus = $queryBus;
        $this->router = $router;
    }


    protected function ask(QueryInterface $query): DtoInterface
    {
        return $this->queryBus->ask($query);
    }

    protected function route(string $name, array $params = []): string
    {
        return $this->router->generate($name, $params);
    }
}
