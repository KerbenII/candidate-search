<?php

declare(strict_types=1);

namespace App\Searcher\Infrastructure\QueryHandler;

use App\Shared\Application\Query\QueryHandlerInterface;
use App\Shared\Application\Dto\DtoInterface;
use App\Searcher\Provider\SearchProviderInterface;

class SearchCandidatesQueryHandler implements QueryHandlerInterface
{
    private SearchProviderInterface $searchProvider;
    public function __construct(SearchProviderInterface $searchProvider)
    {
        $this->searchProvider = $searchProvider;
    }

    public function ask($query): DtoInterface
    {
        //ES query z ReadModel gdzie dokument zawiera tags i notes jako array stringów.
        return $this->searchProvider->search($query);
    }
}
