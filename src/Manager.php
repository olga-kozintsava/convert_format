<?php

declare(strict_types=1);

namespace FileConverter;

class Manager
{
    protected \SplFileObject $file;
    protected string $outputFilePath;

    public function __construct(\SplFileObject $file, string $outputFilePath)
    {
        $this->file = $file;
        $this->outputFilePath = $outputFilePath;
    }
}
