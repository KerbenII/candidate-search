<?php

declare(strict_types=1);

namespace App\Searcher\Application\ValueObject;

use App\Shared\Application\ValueObject\BaseValueObject;
use DateTime;

final class BirthdateFilterValueObject extends BaseValueObject
{
    public const DATE_FORMAT = 'd-m-Y';
    private ?DateTime $before;
    private ?DateTime $after;

    public function __construct(?string $before, ?string $after)
    {
        if (null == $before && null == $after) {
            throw new \InvalidArgumentException('Birthdate filter without constraint!');
        }

        try {
            if (null !== $before) {
                $this->before = DateTime::createFromFormat(self::DATE_FORMAT, $before);
            }

            if (null !== $after) {
                $this->after = DateTime::createFromFormat(self::DATE_FORMAT, $after);
            }

            if (null !== $before && null !== $after && $before > $after) {
                throw new \InvalidArgumentException('Before date cannot be grater then after date');
            }
        } catch (\TypeError) {
            throw new \InvalidArgumentException('Invalid birthdate filter date format. Correct format: Day-Month-Year');
        }
    }

    public static function fromPayload(array $payload): BirthdateFilterValueObject
    {
        return new self(
            $payload['before'] ?? null,
            $payload['after'] ?? null
        );
    }
}
