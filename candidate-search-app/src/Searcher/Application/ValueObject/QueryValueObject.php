<?php

declare(strict_types=1);

namespace App\Searcher\Application\ValueObject;

class QueryValueObject
{
    public const MAX_QUERY_LENGTH = 2_000;
    private string $query;

    public function __construct(string $query)
    {
        if (self::MAX_QUERY_LENGTH < strlen($query)) {
            throw new \InvalidArgumentException('Query is longer than maximum value');
        }

        $this->query = $query;
    }

    public static function fromPayload(string $query)
    {
        return new self($query);
    }
}
