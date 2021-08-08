<?php

declare(strict_types=1);

namespace FileConverter;



class Converter
{
    private \SplFileObject $file;
    private string $outputFilePath;
    private string $inputFormat;
    private string $outFormat;

    public function __construct(\SplFileObject $file, string $inputFormat, string $outputFormat, string $outputFilePath)
    {
        $this->file = $file;
        $this->inputFormat = $inputFormat;
        $this->outFormat = $outputFormat;
        $this->outputFilePath = $outputFilePath;
    }


    public function convert(): void
    {
        $readClass = FormatFactory::create($this->inputFormat);
        $data = $readClass->read($this->file);
        $writeClass = FormatFactory::create($this->outFormat);
        $writeClass->write($data,$this->outputFilePath);
    }
}

