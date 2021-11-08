<?php

declare(strict_types=1);

namespace App\OCR\Infrastructure\Provider;

use App\OCR\Application\Response\TextResponse;
use JetBrains\PhpStorm\Pure;
use App\OCR\Application\Provider\RecognitionProviderInterface;

class TextRecognitionProvider extends AbstractRecognitionProvider implements RecognitionProviderInterface
{
    protected static array $supportedMimeTypes = [
        'text/plain'
    ];

    #[Pure] public function recognize(string $blob): TextResponse
    {
        return new TextResponse($blob);
    }
}
