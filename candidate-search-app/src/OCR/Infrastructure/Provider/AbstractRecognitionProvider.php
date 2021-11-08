<?php

declare(strict_types=1);

namespace App\OCR\Infrastructure\Provider;

use App\OCR\Application\Response\TextResponse;
use App\OCR\Application\Provider\RecognitionProviderInterface;
use JetBrains\PhpStorm\Pure;

abstract class AbstractRecognitionProvider implements RecognitionProviderInterface
{
    protected static array $supportedMimeTypes = [];

    #[Pure] public static function isMimeTypeSupported (string $mimeType): bool
    {
        return in_array($mimeType, static::$supportedMimeTypes);
    }

    abstract public function recognize(string $blob): TextResponse;
}
