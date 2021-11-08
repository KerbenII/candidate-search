<?php

declare(strict_types=1);

namespace App\Searcher\Provider;

use App\Shared\Application\Query\QueryInterface;

interface SearchProviderInterface
{
    public function search(QueryInterface $searchCandidatesQuery);
}
