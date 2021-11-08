<?php

declare(strict_types=1);

namespace App\Candidate\Application\ReadModel;

use App\Candidate\Infrastructure\Dto\CandidateDetailsDto;

interface CandidateReadModelInterface
{
    public function GetCandidateDetails(int $candidateId): CandidateDetailsDto;
}
