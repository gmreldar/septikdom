<?php
declare(strict_types=1);

namespace App\Services\MimeType\Processors;

use App\Services\MimeType\Api\MimeProcessorInterface;

abstract class AbstractProcessor implements MimeProcessorInterface
{
    protected $path;
    protected $mimeTypes;

    public function setFilePath(string $path): MimeProcessorInterface
    {
        $this->path = $path;
        return $this;
    }

    public function canProcess(): bool
    {
        return in_array(mime_content_type($this->path), $this->mimeTypes);
    }
}