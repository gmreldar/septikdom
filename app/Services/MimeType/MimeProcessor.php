<?php
declare(strict_types=1);

namespace App\Services\MimeType;

use App\Services\MimeType\Api\MimeProcessorInterface;

class MimeProcessor
{
    private $parserDi;

    public function __construct(
        \App\Services\MimeType\ParserDi $parserDi
    ) {
        $this->parserDi = $parserDi;
    }

    /**
     * @return MimeProcessorInterface[]
     */
    public function getProcessors(): array
    {
        return $this->parserDi->matchProcessors();
    }

    public function getProcessor(string $path, string $processorName): MimeProcessorInterface
    {
        $processors = $this->parserDi->matchProcessors();
    }
}