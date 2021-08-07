<?php

declare(strict_types=1);

namespace FileConverter;

class Csv extends Manager
{
    public function read(): array
    {
        $result = array();
        while (!$this->file->eof()) {
            $result[] = $this->file->fgetcsv();
        }
        return $result;
    }

    public function write($content): void
    {
        $fp = fopen($this->outputFilePath, 'w');
        foreach ($content as $fields) {
            fputcsv($fp, $fields);

        }
    }
}