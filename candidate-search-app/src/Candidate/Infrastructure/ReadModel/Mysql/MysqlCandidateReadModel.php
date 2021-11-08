<?php

declare(strict_types=1);

namespace App\Candidate\Infrastructure\ReadModel\Mock;

use App\Candidate\Application\ReadModel\CandidateReadModelInterface;
use App\Candidate\Infrastructure\Dto\CandidateDetailsDto;
use App\Shared\Infrastructure\ReadModel\MysqlRepository;

final class MysqlCandidateReadModel extends MysqlRepository implements CandidateReadModelInterface
{
    protected function setEntityManager(): void
    {
        // TODO: Implement setEntityManager() method.
    }

    public function GetCandidateDetails(int $candidateId): CandidateDetailsDto
    {
        //query pobierajace pod index
        return $this->oneOrException();
    }
}
