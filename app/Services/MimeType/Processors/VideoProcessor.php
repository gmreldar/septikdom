<?php
declare(strict_types=1);

namespace App\Services\MimeType\Processors;

use App\Services\MimeType\Api\MimeProcessorInterface;

class VideoProcessor extends AbstractProcessor implements MimeProcessorInterface
{
    const TYPE = 'video';

    protected $mimeTypes = [
        'video/mpeg',
        'video/mp4',
        'video/ogg',
        'video/quicktime',
        'video/webm',
        'video/x-ms-wmv',
        'video/x-flv',
        'video/x-msvideo',
        'video/3gpp',
        'video/3gpp2',
    ];

    public function process(): string
    {
        return self::TYPE;
    }
}