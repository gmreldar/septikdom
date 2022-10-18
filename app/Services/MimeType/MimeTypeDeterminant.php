<?php
declare(strict_types=1);

namespace App\Services\MimeType;

use App\Services\MimeType\Processors\ImageProcessor;

class MimeTypeDeterminant
{
    private $mimeProcessor;

    public function __construct(
        \App\Services\MimeType\MimeProcessor $mimeProcessor
    ) {
        $this->mimeProcessor = $mimeProcessor;
    }

    public function determine( $path): ?string
    {
        if (is_null($path)) {
            return null;
        }
        foreach ($this->mimeProcessor->getProcessors() as $processor) {
            if ($processor->setFilePath($path)->canProcess()) {
                return $processor->process();
            }
        }
        return null;
    }

    public function isImage(string $path): bool
    {
        $this->mimeProcessor->getProcessor($path, ImageProcessor::TYPE);
    }

    public function isAudio(string $path): bool
    {
        $this->mimeProcessor->getProcessor($path, ImageProcessor::TYPE);
    }

    public function isVideo(string $path): bool
    {
        $this->mimeProcessor->getProcessor($path, ImageProcessor::TYPE);
    }
}