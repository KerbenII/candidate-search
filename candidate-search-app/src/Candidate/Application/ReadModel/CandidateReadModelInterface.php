<?php

declare(strict_types=1);

namespace App\Candidate\Application\ReadModel;

use App\Candidate\Infrastructure\Dto\CandidateDetailsDto;

interface CandidateReadModelInterface
{
    //TODO: To powinno być w Repository
    public function GetCandidateDetails(int $candidateId): CandidateDetailsDto;
}
