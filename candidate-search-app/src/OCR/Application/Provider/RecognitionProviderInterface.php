<?php

declare(strict_types=1);

namespace App\OCR\Application\Provider;

use App\OCR\Application\Response\TextResponse;

interface RecognitionProviderInterface
{
    public static function isMimeTypeSupported(string $mimeType): bool;
    public function recognize(string $blob): TextResponse;
}
