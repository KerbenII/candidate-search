<?php

declare(strict_types=1);

namespace App\Searcher\Application\Enum;

class SortByEnum
{
    public const ALLOWED_FIELDS = [
        'name',
        'firstName',
        'lastName'
    ];

    public const ALLOWED_ORDERS = [
        'asc',
        'desc'
    ];

    public const REQUIRED_PAYLOAD_PARAMETERS = [
        'field',
        'order'
    ];
}
