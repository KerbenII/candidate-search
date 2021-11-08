<?php

declare(strict_types=1);

namespace App\OCR\Application\Detector;

interface MimeTypeDetectorInterface
{
    public function detect(string $fileBlob): string;
}
