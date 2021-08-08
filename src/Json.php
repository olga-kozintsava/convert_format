<?php

declare(strict_types=1);

namespace FileConverter;

class Json extends FormatFactory
{
    public function read(\SplFileObject $file): array
    {
        $contents = $file->fread($file->getSize());
        return json_decode($contents, true);
    }

    public function write(array $content, string $outputFilePath): void
    {
        $jsonData = json_encode($content, JSON_THROW_ON_ERROR);
        file_put_contents($outputFilePath, $jsonData);
    }
}

