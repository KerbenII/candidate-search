<?php

declare(strict_types=1);

namespace App\Candidate\Application\ReadModel;

use App\Candidate\Infrastructure\Dto\CandidateDetailsDto;

interface CandidateDetailsReadModelInterface
{
    //TODO: To powinno być w Repository
    public function byId(int $candidateId): CandidateDetailsDto;
}
