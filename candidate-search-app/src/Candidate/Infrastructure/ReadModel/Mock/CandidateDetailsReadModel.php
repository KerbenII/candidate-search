<?php

declare(strict_types=1);

namespace App\Candidate\Infrastructure\ReadModel\Mock;

use App\Candidate\Application\ReadModel\CandidateDetailsReadModelInterface;
use App\Candidate\Infrastructure\Dto\CandidateDetailsDto;

// TODO: extends MockRepository
final class CandidateDetailsReadModel implements CandidateDetailsReadModelInterface
{
    public function byId (int $candidateId): CandidateDetailsDto
    {
        return new CandidateDetailsDto(
            $candidateId,
            'sample@email.domain',
            'Roman',
            'Wójcicki',
            new \DateTime('now'),
            'asasda' //todo: probably another column for resumeMimeType
        );
    }
}
