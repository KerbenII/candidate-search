<?php

declare(strict_types=1);

namespace App\Candidate\Infrastructure\QueryHandler;

use App\Candidate\Application\ReadModel\CandidateReadModelInterface;
use App\Shared\Application\Dto\DtoInterface;
use App\Shared\Application\Query\QueryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

final class GetCandidateDetailsQueryHandler implements QueryHandlerInterface
{
    private CandidateReadModelInterface $candidateDetailsReadModel;

    public function __construct(CandidateReadModelInterface $candidateDetailsReadModel)
    {
        $this->candidateDetailsReadModel = $candidateDetailsReadModel;
    }

    public function ask(QueryInterface $query): DtoInterface
    {
        return $this->candidateDetailsReadModel->GetCandidateDetails(1);
    }
}
