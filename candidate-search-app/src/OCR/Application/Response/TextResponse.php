<?php

declare(strict_types=1);

namespace App\OCR\Application\Response;

use App\Shared\Application\Dto\DtoInterface;

final class TextResponse implements DtoInterface
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
