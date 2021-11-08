<?php

declare(strict_types=1);

namespace App\Searcher\Infrastructure\CommandHandler;

use App\Shared\Application\Command\CommandInterface;
use App\OCR\Application\Request\RecognizerRequest;
use App\Shared\Application\Query\QueryBusInterface;
use App\Shared\Application\Request\RequestBusInterface;
use App\Candidate\Infrastructure\Dto\CandidateDetailsDto;
use App\Candidate\Application\Query\GetCandidateDetailsQuery;
use JetBrains\PhpStorm\NoReturn;

final class UpdateIndexCommandHandler
{
    private QueryBusInterface $queryBus;
    private RequestBusInterface $requestBus;

    public function __construct(
        QueryBusInterface $queryBus,
        RequestBusInterface $requestBus,
    ) {
        $this->queryBus = $queryBus;
        $this->requestBus = $requestBus;
    }

    #[NoReturn] public function handle(CommandInterface $command): void
    {
        /** @var CandidateDetailsDto $candidateDetailsDto */
        $candidateDetailsDto = $this->queryBus->ask((new GetCandidateDetailsQuery($command->getCandidateToUpdate())));
        /* Wyciagniete z ReadModel poprzez https://github.com/undecaf/doctrine-file-storage */

        $resumeContent = $this->requestBus->handle(new RecognizerRequest($candidateDetailsDto->getResumeBlob()));

        // Zapis do ES przez ClientBuilder'a i Write Model, natomiast niestety tego już nie zdążę w klasie zamockować
    }
}
