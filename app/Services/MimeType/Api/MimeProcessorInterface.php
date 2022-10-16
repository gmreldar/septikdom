<?php
declare(strict_types=1);

namespace App\Services\MimeType\Api;

interface MimeProcessorInterface
{
    public function setFilePath(string $path): MimeProcessorInterface;
    public function canProcess(): bool;
    public function process(): string;
}