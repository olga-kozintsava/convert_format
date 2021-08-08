<?php

declare(strict_types=1);

namespace FileConverter;

class Csv extends FormatFactory
{
    public function read(\SplFileObject $file): array
    {
        $result = array();
        while (!$file->eof()) {
            $result[] = $file->fgetcsv();
        }
        return $result;
    }

    public function write(array $content, string $outputFilePath): void
    {
        $fp = fopen($outputFilePath, 'w');
        foreach ($content as $fields) {
            fputcsv($fp, $fields);
        }
    }
}