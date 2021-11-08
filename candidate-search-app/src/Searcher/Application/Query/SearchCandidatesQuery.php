<?php

declare(strict_types=1);

namespace App\Searcher\Application\Query;

use App\Shared\Application\Query\QueryInterface;
use App\Searcher\Application\ValueObject\SortByValueObject;
use App\Searcher\Application\ValueObject\FiltersValueObject;
use App\Searcher\Application\ValueObject\AdditionalFieldsValueObject;

class SearchCandidatesQuery implements QueryInterface
{
    private string $query;
    private int $limit;
    private int $page;
    private SortByValueObject $sortByValueObject;
    private FiltersValueObject $filtersValueObject;
    private AdditionalFieldsValueObject $additionalFieldsValueObject;

    public function __construct(
        string $query,
        int $limit,
        int $page,
        SortByValueObject $sortByValueObject,
        FiltersValueObject $filtersValueObject,
        AdditionalFieldsValueObject $additionalFieldsValueObject
    ) {
        $this->query = $query;
        $this->limit = $limit;
        $this->page = $page;
        $this->sortByValueObject = $sortByValueObject;
        $this->filtersValueObject = $filtersValueObject;
        $this->additionalFieldsValueObject = $additionalFieldsValueObject;
    }
}
