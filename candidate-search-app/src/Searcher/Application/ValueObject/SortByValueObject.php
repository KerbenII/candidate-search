<?php

declare(strict_types=1);

namespace App\Searcher\Application\ValueObject;

use App\Shared\Application\ValueObject\BaseValueObject;
use App\Searcher\Application\Enum\SortByEnum;

class SortByValueObject extends BaseValueObject
{
    private string $field;
    private string $order;

    public function __construct(string $field, string $order)
    {
        if (!in_array($field, SortByEnum::ALLOWED_FIELDS)) {
            throw new \InvalidArgumentException(
                "Invalid SortBy field value: $field. " .
                $this->printAllowedValues(SortByEnum::ALLOWED_FIELDS)
            );
        }

        if (!in_array($order, SortByEnum::ALLOWED_ORDERS)) {
            throw new \InvalidArgumentException(
                "Invalid order field value: $order. " .
                $this->printAllowedValues(SortByEnum::ALLOWED_ORDERS)
            );
        }

        $this->field = $field;
        $this->order = $order;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getOrder(): string
    {
        return $this->order;
    }

    public static function fromPayload(array $sortBy): SortByValueObject
    {
        $missingRequiredFields = array_diff(SortByEnum::REQUIRED_PAYLOAD_PARAMETERS, array_keys($sortBy));
        if (!empty($missingRequiredFields)) {
            throw new \InvalidArgumentException(self::printMissingValues($missingRequiredFields));
        }
        return new self($sortBy['field'], $sortBy['order']);
    }
}
