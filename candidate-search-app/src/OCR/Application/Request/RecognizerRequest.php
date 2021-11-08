<?php

declare(strict_types=1);

namespace App\OCR\Application\Request;

use App\Shared\Application\Request\RequestInterface;

final class RecognizerRequest implements RequestInterface
{
    private string $fileBlob;

    public function __construct(string $fileBlob)
    {
        $this->fileBlob = $fileBlob;
    }

    public function getFileBlob(): string
    {
        return $this->fileBlob;
    }
}
