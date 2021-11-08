<?php

namespace App\Shared\Application\Request;

use App\Shared\Application\Dto\DtoInterface;

interface RequestBusInterface
{
    public function handle(RequestInterface $request): DtoInterface;
}
