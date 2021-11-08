<?php

declare(strict_types=1);

namespace App\Candidate\Application\Query;

use App\Shared\Application\Query\QueryInterface;

final class GetCandidateDetailsQuery implements QueryInterface
{
    private int $candidateId;

    public function __construct($candidateId)
    {
        $this->candidateId = $candidateId;
    }

    public function getCandidateId(): int
    {
        return $this->candidateId;
    }
}
