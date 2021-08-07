<?php

declare(strict_types=1);

namespace FileConverter;

class Converter{

    public function convert(\SplFileObject $file, string $outputFormat, string $outputFilePath): void
    {
//        $inputFormat = $file->getExtension();
//        $readClass = ucfirst($inputFormat);
//        $readInstance = new $readClass($file, $outputFilePath);
//        $data = $readInstance->read();
//        $writeClass = ucfirst($outputFormat);
//        $writeInstance = new $writeClass($file, $outputFilePath);
//        $writeInstance->write($data);
        $r = new Xml($file, $outputFilePath);
        $data = $r->read();
        $j = new Xml($file, $outputFilePath);
        $j->write($data);
    }
}

