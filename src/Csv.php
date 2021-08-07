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
        $fp = fopen($this->outputFilePath, 'wb');
//      foreach ($content as $fields) {
//            fputcsv($fp, $fields);
        fputcsv($fp, array_keys($content));
        foreach ( $content as $row ) {
            fputcsv($fp, (array)$row);
        }

        }

}