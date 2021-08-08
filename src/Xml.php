<?php

declare(strict_types=1);

namespace FileConverter;

use SimpleXMLElement;

class Xml extends FormatFactory
{
    public function read(\SplFileObject $file):array
    {
        $contents = $file->fread($file->getSize());
        return (array)simplexml_load_string($contents);
    }

    public function write(array $content, string $outputFilePath, $xml = false): void
    {
        if($xml === false){
            $xml = new SimpleXMLElement('<root/>');
        }
        foreach($content as $key => $value){
            if(is_array($value)){
                $this->write($value, $outputFilePath,$xml->addChild($key));
            }else{
                $xml->addChild($key, $value);
            }
        }
        file_put_contents($outputFilePath, $xml->asXML());
    }
}