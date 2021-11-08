<?php

declare(strict_types=1);

namespace App\Searcher\Application\ValueObject;

use App\Searcher\Application\ValueObject\Filters\FilterValueObjectInterface;
use App\Searcher\Application\Enum\FiltersEnum;
use App\Shared\Application\ValueObject\BaseValueObject;
use JetBrains\PhpStorm\Pure;

final class FiltersValueObject extends BaseValueObject
{
    /** @var \App\Searcher\Application\ValueObject\Filters\FilterValueObjectInterface[] */
    private array $items;
    private int $count;

    /**
     * FiltersValueObject constructor.
     * @param FilterValueObjectInterface[] $filterValueObject
     */
    #[Pure] public function __construct(array $filterValueObject)
    {
        $this->items = $filterValueObject;
        $this->count = count($filterValueObject);
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getBirthdayDateFilter(): ?FilterValueObjectInterface
    {
        return $this->items[FiltersEnum::BIRTHDAY_DATE_FILTER_KEY] ?? null;
    }

    public static function fromPayload(array $filtersArray)
    {
        $filtersKeys = array_keys($filtersArray);
        $notAllowedFilters = array_diff($filtersKeys, FiltersEnum::ALLOWED_FILTERS);
        if (!empty($notAllowedFilters)) {
            throw new \InvalidArgumentException(
                "Invalid filters provided: " .
                self::printAllowedValues(FiltersEnum::ALLOWED_FILTERS)
            );
        }

        $filters = [];
        foreach ($filtersKeys as $filterKey) {
            // sprawdz czy filtr wlaczony
            // zrob instancje filtra po kluczu
            // teraz na szybko:

            if ($filterKey === FiltersEnum::BIRTHDAY_DATE_FILTER_KEY) {
                $filters[$filterKey] = BirthdateFilterValueObject::fromPayload($filtersArray[$filterKey]);
            }
        }

        return new self($filters);
    }
}
