<?php

declare(strict_types=1);

namespace App\Searcher\Infrastructure\QueryHandler;

use App\Shared\Application\Query\QueryHandlerInterface;
use App\Shared\Application\Dto\DtoInterface;
use App\Candidate\Infrastructure\ReadModel\Mock\CandidateDetailsReadModel;

class SearchCandidatesQueryHandler implements QueryHandlerInterface
{
    public function ask($query): DtoInterface
    {
        //TODO: Reimplement
        return (new CandidateDetailsReadModel())->byId(1);
    }
}
