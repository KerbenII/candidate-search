<?php

declare(strict_types=1);

namespace App\Searcher\Application\ValueObject;

final class PaginationValueObject
{
    private int $limit;
    private int $page;

    public function __construct(int $limit, int $page)
    {
        if (0 === $page || 0 === $limit) {
            throw new \InvalidArgumentException('page and limit must be positive integers');
        }

        $this->page = $page;
        $this->limit = $limit;
    }

    public static function fromPayload(int $limit, int $page)
    {
        return new self($limit, $page);
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }
}
