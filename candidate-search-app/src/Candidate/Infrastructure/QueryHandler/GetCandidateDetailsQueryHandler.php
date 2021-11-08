<?php

declare(strict_types=1);

namespace App\Candidate\Infrastructure\QueryHandler;

use App\Candidate\Application\ReadModel\CandidateDetailsReadModelInterface;
use App\Shared\Application\Dto\DtoInterface;
use App\Shared\Application\Query\QueryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

final class GetCandidateDetailsQueryHandler implements QueryHandlerInterface
{
    private CandidateDetailsReadModelInterface $candidateDetailsReadModel;

    public function __construct(CandidateDetailsReadModelInterface $candidateDetailsReadModel)
    {
        $this->candidateDetailsReadModel = $candidateDetailsReadModel;
    }

    public function ask(QueryInterface $query): DtoInterface
    {
        return $this->candidateDetailsReadModel->byId(1);
    }
}
