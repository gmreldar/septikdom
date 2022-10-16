<?php
declare(strict_types=1);

namespace App\Services\Vendor;

use Illuminate\Support\Facades\File;

abstract class AbstractParserDi
{
    protected $directory;
    protected $namespace;

    protected function parseProcessors(): array
    {
        $processors = [];
        $classProcessors = $this->loadClasses($this->directory);
        foreach ($classProcessors as $processor) {
            $class = sprintf($this->namespace, $processor->getFilenameWithoutExtension());
            $reflectionClass = new \ReflectionClass($class);
            if ($reflectionClass->isAbstract() || $reflectionClass->isInterface()) {
                continue;
            }
            $processors[] = app($class);
        }
        return $processors;
    }

    protected function loadClasses(string $path): array
    {
        return File::allFiles(base_path($path));
    }
}