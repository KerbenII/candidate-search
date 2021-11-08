<?php

declare(strict_types=1);

namespace App\Candidate\Infrastructure\ReadModel\Mock;

use App\Candidate\Application\ReadModel\CandidateReadModelInterface;
use App\Candidate\Infrastructure\Dto\CandidateDetailsDto;

final class MockCandidateReadModel implements CandidateReadModelInterface
{
    public function GetCandidateDetails(int $candidateId): CandidateDetailsDto
    {
        return new CandidateDetailsDto(
            $candidateId,
            'sample@email.domain',
            'Roman',
            'Wójcicki',
            new \DateTime('now'),
            'asasda'
        );
    }
}
