<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\MessageBus\Exception;

use RuntimeException;
use Throwable;

class HandlerNotFoundException extends RuntimeException
{
    public function __construct($message = "", Throwable $previous = null)
    {
        parent::__construct($message, 1, $previous);
    }
}
