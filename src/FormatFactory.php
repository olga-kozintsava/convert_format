<?php

declare(strict_types=1);

namespace FileConverter;


abstract class FormatFactory
{
    public static function create($format):?object
    {
        return match ($format) {
            'json' => new Json(),
            'csv' => new Csv(),
            'xml' => new Xml(),
            default => null,
        };
    }

    abstract public function read(\SplFileObject $file):array;

    abstract public function write(array $content, string $outputFilePath):void;
}