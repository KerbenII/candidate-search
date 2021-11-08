<?php

declare(strict_types=1);

namespace App\OCR\Infrastructure\Provider;

use App\OCR\Application\Response\TextResponse;
use JetBrains\PhpStorm\Pure;
use App\OCR\Application\Provider\RecognitionProviderInterface;

class DummyPdfRecognitionProvider extends AbstractRecognitionProvider implements RecognitionProviderInterface
{
    protected static array $supportedMimeTypes = [
        'application/pdf'
    ];

    #[Pure] public function recognize(string $blob): TextResponse
    {
        return new TextResponse('Dummy text response from DummyPdfRecogniser');
    }
}
