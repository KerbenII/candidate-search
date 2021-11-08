<?php

declare(strict_types=1);

namespace App\OCR\Infrastructure\Detector;

use JetBrains\PhpStorm\Pure;
use App\OCR\Application\Detector\MimeTypeDetectorInterface;

final class MimeTypeDetector implements MimeTypeDetectorInterface
{
    private \finfo $detector;

    /**
     * MimeTypeDetector constructor.
     * If we would like to add another detector in the future, we will add a new Detector type class
     * than we will inject something here.
     */
    public function __construct()
    {
        $this->detector = new \finfo(FILEINFO_MIME_TYPE);
    }

    #[Pure] public function detect(string $fileBlob): string
    {
        return $this->detector->buffer($fileBlob);
    }
}
