<?php

declare(strict_types=1);

namespace App\Searcher\Application\ValueObject;

use App\Shared\Application\ValueObject\BaseValueObject;
use App\Searcher\Application\Enum\AdditionalFieldsEnum;

final class AdditionalFieldsValueObject extends BaseValueObject
{
    /** @var string[] */
    private array $additionalFields;

    /**
     * FiltersValueObject constructor.
     * @param string[] $additionalFields
     */
    public function __construct(array $additionalFields)
    {
        $notAllowedAdditionalFields = array_diff($additionalFields, AdditionalFieldsEnum::ALLOWED_FIELDS);
        if (!empty($notAllowedAdditionalFields)) {
            throw new \InvalidArgumentException(
                "Invalid additional fields provided: " .
                self::printAllowedValues(AdditionalFieldsEnum::ALLOWED_FIELDS)
            );
        }

        $this->additionalFields = $additionalFields;
    }
    public static function fromPayload(array $additionalFields)
    {
        return new self($additionalFields);
    }

    /**
     * @return string[]
     */
    public function getAdditionalFields(): array
    {
        return $this->additionalFields;
    }
}
