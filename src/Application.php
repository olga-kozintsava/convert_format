<?php

declare(strict_types=1);

namespace FileConverter;

class Application
{
    public function run(string $filename, string $outputFormat, string $outputFilePath): void
    {

        $file = new \SplFileObject($filename, 'r');
        $inputFormat = $file->getExtension();
        $converter = new Converter($file, $inputFormat, $outputFormat, $outputFilePath);
        $converter->convert();
    }
}
