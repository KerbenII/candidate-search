<?php

declare(strict_types=1);

namespace App\Searcher\Application\Query;

use App\Shared\Application\Query\QueryInterface;
use App\Searcher\Application\ValueObject\SortByValueObject;
use App\Searcher\Application\ValueObject\FiltersValueObject;
use App\Searcher\Application\ValueObject\AdditionalFieldsValueObject;
use App\Searcher\Application\ValueObject\QueryValueObject;
use App\Searcher\Application\ValueObject\PaginationValueObject;

class SearchCandidatesQuery implements QueryInterface
{
    private QueryValueObject $queryValueObject;
    private PaginationValueObject $paginationValueObject;
    private SortByValueObject $sortByValueObject;
    private FiltersValueObject $filtersValueObject;
    private AdditionalFieldsValueObject $additionalFieldsValueObject;

    public function __construct(
        QueryValueObject $queryValueObject,
        PaginationValueObject $paginationValueObject,
        SortByValueObject $sortByValueObject,
        FiltersValueObject $filtersValueObject,
        AdditionalFieldsValueObject $additionalFieldsValueObject
    ) {
        $this->queryValueObject = $queryValueObject;
        $this->paginationValueObject = $paginationValueObject;
        $this->sortByValueObject = $sortByValueObject;
        $this->filtersValueObject = $filtersValueObject;
        $this->additionalFieldsValueObject = $additionalFieldsValueObject;
    }

    public function getQueryValueObject(): QueryValueObject
    {
        return $this->queryValueObject;
    }

    public function getPaginationValueObject(): PaginationValueObject
    {
        return $this->paginationValueObject;
    }

    public function getSortByValueObject(): SortByValueObject
    {
        return $this->sortByValueObject;
    }

    public function getFiltersValueObject(): FiltersValueObject
    {
        return $this->filtersValueObject;
    }

    public function getAdditionalFieldsValueObject(): AdditionalFieldsValueObject
    {
        return $this->additionalFieldsValueObject;
    }
}
