<?php

declare(strict_types=1);

namespace App\Searcher\Application\Command;

use App\Shared\Application\Command\CommandInterface;

final class UpdateIndexCommand implements CommandInterface
{
    private int $candidateId;

    public function __construct($candidateId)
    {
        $this->candidateId = $candidateId;
    }

    public function getCandidateToUpdate(): int
    {
        return $this->candidateId;
    }
}
