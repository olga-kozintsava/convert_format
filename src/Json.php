<?php

declare(strict_types=1);

namespace FileConverter;

class Json extends Manager
{
    public function read(): array
    {
        $contents = $this->file->fread($this->file->getSize()); #string
        return json_decode($contents, true);
    }

    public function write(array $content): void
    {
        $jsonData = json_encode($content, JSON_THROW_ON_ERROR);
        file_put_contents($this->outputFilePath, $jsonData);
    }
}

