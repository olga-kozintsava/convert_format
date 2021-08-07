<?php

declare(strict_types=1);

namespace FileConverter;

class Converter{

    public function convert(\SplFileObject $file,string $inputFormat, string $outputFormat, string $outputFilePath): void
    {
        $readClass = ucfirst($inputFormat);
        $readInstance = new $readClass($file, $outputFilePath);
        $data = $readInstance->read();
        $writeClass = ucfirst($outputFormat);
        $writeInstance = new $writeClass($file, $outputFilePath);
        $writeInstance->write($data);
    }
}

