<?php
declare(strict_types=1);

namespace App\Services\MimeType;

use App\Services\MimeType\Api\MimeProcessorInterface;

class ParserDi extends \App\Services\Vendor\AbstractParserDi
{
    protected $directory = 'app/Services/MimeType/Processors';
    protected $namespace = '\App\Services\MimeType\Processors\%s';

    /**
     * @return MimeProcessorInterface[]
     */
    public function matchProcessors(): array
    {
        return $this->parseProcessors();
    }
}