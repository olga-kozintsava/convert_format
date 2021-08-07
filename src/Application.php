<?php

declare(strict_types=1);

namespace FileConverter;

class Application
{
    public function run(string $filename, string $outputFormat, string $outputFilePath): void
    {
        $converter = new Converter;
        $fileInfo = new \SplFileInfo($filename);
        $file = new \SplFileObject($filename, 'r');
        $inputFormat = $fileInfo->getExtension();
        $converter->convert($file, $inputFormat, $outputFormat, $outputFilePath);
    }
}
