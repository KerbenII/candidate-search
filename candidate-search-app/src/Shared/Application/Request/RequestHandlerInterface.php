<?php

declare(strict_types=1);

namespace App\Shared\Application\Request;

use App\Shared\Application\Dto\DtoInterface;

interface RequestHandlerInterface
{
    public function handle(RequestInterface $request): DtoInterface;
}
