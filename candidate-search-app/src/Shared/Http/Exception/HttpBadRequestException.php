<?php

declare(strict_types=1);

namespace App\Shared\Http\Exception;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Throwable;

class HttpBadRequestException extends BadRequestException
{
    public function __construct(Throwable $previous)
    {
        parent::__construct($previous->getMessage(), Response::HTTP_BAD_REQUEST, $previous);
    }
}
