<?php

declare(strict_types=1);

namespace FileConverter;

abstract class FormatFactory
{
    public static function create($format)
    {
        switch ($format) {
            case 'json':
                return new Json();
            case 'csv':
                return new Csv();
            case 'xml':
                return new Xml();
        }
    }

    abstract public function read(\SplFileObject $file);

    abstract public function write(array $content, string $outputFilePath);
}