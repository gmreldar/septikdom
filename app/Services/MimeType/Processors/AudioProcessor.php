<?php
declare(strict_types=1);

namespace App\Services\MimeType\Processors;

use App\Services\MimeType\Api\MimeProcessorInterface;

class AudioProcessor extends AbstractProcessor implements MimeProcessorInterface
{
    const TYPE = 'audio';

    protected $mimeTypes = [
        'audio/basic',
        'audio/L24',
        'audio/mid',
        'audio/aac',
        'audio/mpeg',
        'audio/mp4',
        'audio/x-aiff',
        'audio/x-mpegurl',
        'audio/vnd.rn-realaudio',
        'audio/ogg',
        'audio/vorbis',
        'audio/vnd.wav',
        'audio/x-ms-wma',
        'audio/x-ms-wax',
        'audio/vnd.wave',
        'audio/webm',
    ];

    public function process(): string
    {
        return self::TYPE;
    }
}