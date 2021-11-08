<?php

declare(strict_types=1);

namespace App\OCR\Infrastructure\RequestHandler;

use App\OCR\Application\Response\TextResponse;
use App\OCR\Application\Detector\MimeTypeDetectorInterface;
use App\OCR\Application\Exception\UnsupportedMimeTypeException;
use App\Shared\Application\Request\RequestHandlerInterface;
use App\Shared\Application\Request\RequestInterface;
use App\OCR\Application\Request\RecognizerRequestInterface;

class RecognizerRequestHandler implements RequestHandlerInterface
{
    private MimeTypeDetectorInterface $mimeTypeDetector;
    private array $recognitionProviders;

    /**
     * RecognizerRequestHandler constructor.
     * @param \App\OCR\Application\Detector\MimeTypeDetectorInterface $mimeTypeDetector
     * @param \App\OCR\Application\Provider\RecognitionProviderInterface[] $recognitionProviders
     */
    public function __construct(MimeTypeDetectorInterface $mimeTypeDetector, array $recognitionProviders)
    {
        $this->mimeTypeDetector = $mimeTypeDetector;
        $this->recognitionProviders = $recognitionProviders;
    }

    public function handle(RequestInterface $request): TextResponse
    {
        $fileBlob = $request->getFileBlob();
        $mimeType = $this->mimeTypeDetector->detect($fileBlob);

        //TODO: Czy nie powinienem tutaj ::class mieć, sprawdzać static i dopiero robić instancje?
        $selectedProvider = null;
        foreach ($this->recognitionProviders as $recognitionProvider) {
            if ($recognitionProvider::isMimeTypeSupported($mimeType)) {
                $selectedProvider = $recognitionProvider;
                break;
            }
        }

        if (null === $selectedProvider) {
            throw new UnsupportedMimeTypeException();
        }

        return $selectedProvider->recognize($fileBlob);
    }
}
