<?php
declare(strict_types=1);

namespace App\Services\MimeType\Processors;

use App\Services\MimeType\Api\MimeProcessorInterface;

class ImageProcessor extends AbstractProcessor implements MimeProcessorInterface
{
    const TYPE = 'image';

    protected $mimeTypes = [
        'image/gif',
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/svg+xml',
        'image/tiff',
        'image/vnd.microsoft.icon',
        'image/vnd.wap.wbmp',
        'image/webp',
    ];

    public function process(): string
    {
        return self::TYPE;
    }
}